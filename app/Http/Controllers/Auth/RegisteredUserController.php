<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\usuario;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'pass' => ['required'],
        ]);


        $user = usuario::create([
            "idUsu" => null,
            'nombre' => $request->nombre,
            //'password' => Hash::make($request->password),
            'password' => Hash::make($request->pass),
            'perfil' => 0,
        ]);

        event(new Registered($user));
        
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
