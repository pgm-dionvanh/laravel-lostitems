<?php

namespace App\Http\Controllers;
use App\Managers\User\UserManager;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Dtos\User\NewUserDto;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function __construct(
        private Request $request,
        private UserManager $userManager
    ) {
    }
    /**
     * Login a user.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function login(LoginRequest $request)
    {
        $user =  $this->userManager->attemptLogin($request->get('email'), $request->get('password'));

        if($user) {
            Auth::login($user);

            return $this->authenticated($request, $user);
        }
    }

    public function register(Request $request)
    {
        
        $loginDto = $this->userManager->createUser(new NewUserDto(
            $request->get('email'),
            $request->get('password'),
            $request->userAgent()
        ));

        return $this->authenticated($request, $loginDto);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }

    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
