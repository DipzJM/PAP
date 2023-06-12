# PapLaravel
Site com a framework laravel

composer require laravel/ui

php artisan ui bootstrap

php artisan ui bootstrap --auth

php artisan serve

npm run dev

php artisan migrate 

php artisan migrate:refresh --seed


# JWT Authentication
composer require tymon/jwt-auth
## Generate a JWT secret key
php artisan jwt:secret

# MAILJET
MAIL_DRIVER=smtp
MAIL_HOST=in-v3.mailjet.com
MAIL_PORT=465
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS="no-reply@jarg.pt"
MAIL_FROM_NAME="mBot Quiz"  
MAIL_ENCRYPTION=ssl



MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=racingmania2023@gmail.com
MAIL_PASSWORD=ibjjnjheeklqswfu
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="racingmania2023@gmail.com"
MAIL_FROM_NAME="Racing Mania"


composer require illuminate/filesystem


SMS
VONAGE_API_KEY=0410f541
VONAGE_API_SECRET=y5PS4zOevomGwqei
VONAGE_PHONE_NUMBER=933107871



AuthenticatesUsers.php

<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\Message;
use Vonage\Message\TextMessage;
use Vonage\SMS\Message\SMS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait AuthenticatesUsers
{
    use RedirectsUsers, ThrottlesLogins;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        try {
            $this->validateLogin($request);

            if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                if ($request->hasSession()) {
                    $request->session()->put('auth.password_confirmed_at', time());
                }

                $user = Auth::user();

                if ($user->userDetails->{'2fa'} == 1) {
                    // Send the code to the user via SMS
                    $phoneNumber = $user->userDetails->numero_telemovel;
                    if ($phoneNumber) {
                        define('BRAND_NAME', 'RacingMania');
                        $basic = new \Vonage\Client\Credentials\Basic("0410f541", "y5PS4zOevomGwqei");
                        $client = new \Vonage\Client($basic);

                        $code = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

                        // Salvar o código de verificação no banco de dados
                        $user->userDetails->vCode = $code;
                        $user->userDetails->save();
                        
                        $response = $client->sms()->send(
                            new \Vonage\SMS\Message\SMS('351'.$phoneNumber, BRAND_NAME, 'Your verification code is: ' . $code)
                        );

                        $message = $response->current();

                        return view('2fa');
                    }
                }

                return redirect('/perfil');
            }

            $this->incrementLoginAttempts($request);

            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }catch (\Exception $e) {
            return redirect('/login')->withErrors([
                $this->username() => trans('auth.failed'),
            ]);
        }
        
    }
    
    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->boolean('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);
    
        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }
        
         
    }


    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
