<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UtilizadorVeiculo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $userDetails = new UserDetails();
        $userDetails->user_id = $user->id;
        $userDetails->first_name = $data['primeiro_nome'];
        $userDetails->last_name = $data['ultimo_nome'];
        $userDetails->nivel = 1;
        $userDetails->voltas_realizadas = 0;
        $userDetails->corridas_realizadas = 0;
        $userDetails->num_moedas = 0;
        $userDetails->numero_telemovel = $data['phone_number'];
        $userDetails->tempo_jogado = 0;
        $userDetails->imagem = 'img\imagens_utilizadores\logo.png';
        $userDetails->save();

        $utilizadorVeiculo = new UtilizadorVeiculo;
        $utilizadorVeiculo->id_utilizador = $user->id;
        $utilizadorVeiculo->id_veiculo = 1;
        $utilizadorVeiculo->save();

        //Manda o email de boas-vindas
        \Mail::send('emails.welcome', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email, $user->name);
            $message->subject('Welcome to our website');
        });
        
        

        return $user;
    }


}