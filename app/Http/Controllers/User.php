<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Controller {

	public function show() {
		if (Auth::check()) {
			return redirect()->route('home');
		}
		return view('user.login');
	}

	public function login(Request $request) {
		$request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();

			return redirect()->intended('home');
		}

		return back()->withErrors([
			'email' => 'The provided credentials do not match our records.',
		]);
	}

	public function logout(Request $request) {
		Auth::logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect('/');
	}

}
