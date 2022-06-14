<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Mode;
use App\Models\Level;
use App\Models\Department;
use App\Notifications\NewUserNotification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $modes = Mode::all();
        $levels = Level::all();
        $departments = Department::all();
        return view('auth.register', compact('modes','levels','departments'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mode_id' => $request->mode_id,
            'level_id' => $request->level_id,
            'department_id' => $request->department_id,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

       // auth()->user()->notify(new NewUserNotification());

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
