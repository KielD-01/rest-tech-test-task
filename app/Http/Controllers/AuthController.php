<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function signIn(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->route('tenant.movies.index');
        }

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function signUp(Request $request)
    {
        $user = new User($request->post());
        $user->save(); // Yes, here could/should be a Service usage, but no

        if ($user instanceof User) {
            Auth::login($user, true);

            return redirect()->route('tenant.movies.index');
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
