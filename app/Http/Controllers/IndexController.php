<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Alert;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Noticia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function indexPage()
    {
        $alert = Alert::where('ativo', 1)->first();
    
        $user = null;
    
        if (Auth::check()) {
            $user = User::with('UserDetails')->find(Auth::user()->id);
        }
    
        $noticias = Noticia::all();
    
        return view('index', isset($user) ? compact('user', 'alert', 'noticias') : compact('alert', 'noticias'));
    }
    
    
    public function feedback(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userId = $user->id;
    
            // Get message from the POST form
            $mensagem = $request->input('message');
    
            // Insert comment into the table
            DB::table('comentarios')->insert([
                'id' => null,
                'id_utilizador' => $userId,
                'texto_comentario' => $mensagem,
                'created_at' => null,
            ]);
    
            try {
                // Get the subject and message from the form
                $subject = $request->input('subject');
    
                // Load the content of the email template
                $html = file_get_contents('../resources/views/emails/feedback.blade.php');
    
                // Replace the placeholders with form values
                $html = str_replace("texto", $mensagem, $html);
                $html = str_replace('assunto', $subject, $html);
    
                // Save the modified content to the file
                file_put_contents('../resources/views/emails/feedback.blade.php', $html);
    
                // Send the email
                \Mail::send('emails.feedback', ['user' => $user], function ($mail) use ($user, $subject, $mensagem) {
                    $mail->to("racingmania2023@gmail.com");
                    $mail->subject($subject);
                    $mail->html($mensagem);
                });
    
                session()->flash('success', 'Email enviado com sucesso!');
    
                $html = str_replace($mensagem, 'texto', $html);
                $html = str_replace($subject, 'assunto', $html);

                // Save the modified content to the file
                file_put_contents('../resources/views/emails/feedback.blade.php', $html);

            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }
    }
    
    



}