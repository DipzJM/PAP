<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Alert;
use Illuminate\Http\Request;
use App\Models\User;
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

        return view('index', isset($user) ? compact('user') : [], compact('alert'));
    }

    public function feedback(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userId = $user->id;

            // Obter mensagem do formulário POST
            $mensagem = $request->input('message');

            // Inserir comentário na tabela
            DB::table('comentarios')->insert([
                'id' => null,
                'id_utilizador' => $userId,
                'texto_comentario' => $mensagem,
                'created_at' => null,
            ]);


            try {
                // Obtém o assunto e a mensagem do formulário
                $subject = $request->input('subject');
                $mensagem = $request->input('mensagem');
            
                // Carrega o conteúdo do modelo de email
                $html = file_get_contents('../resources/views/emails/feedback.blade.php');
            
                // Substitui as palavras-chave no modelo pelos valores do formulário
                $html = str_replace("texto", $mensagem, $html);
                $html = str_replace('Subject', $subject, $html);
            
                // Grava o conteúdo modificado no arquivo
                file_put_contents('../resources/views/emails/feedback.blade.php', $html);
                
                // Envia o email
                \Mail::send('emails.feedback', ['user' => $user], function ($message) use ($user, $subject, $mensagem) {
                    $message->to($user->email, $user->name);
                    $message->subject($subject);
                    $message->html($mensagem);
                });
            
                return redirect()->to('/');
            } catch (Exception $e) {
                // Trata exceções
                $errorMessage = $e->getMessage();
                // Faça algo com a mensagem de erro, como registrá-la em um arquivo de log ou exibi-la para o usuário
            }
            

        }
    }



}