<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\BloogerRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\UserRoleEnum;

class RegisterController extends Controller
{
    public function registerView()
    {
        return view('website.auth.register');
    }

    public function register(BloogerRequest $request)
    {
        $user = User::create(array_merge($request->validated(), [
            'role' => UserRoleEnum::BLOGGER->value
        ]));

        if ($request->hasFile('photo')) {
            $request->file('photo')->storeAs('posts', $user->id . '.' . $request->file('photo')->extension(), 'public');
            $user->photo = 'user$users/' . $user->id . '.' . $request->file('photo')->extension();
            $user->save();
        }

       $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
          return redirect()->route('website.home');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

}
