<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Attempt to authenticate with 'remember' functionality
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();
    
            // Redirect to the intended route or fallback to dashboard
            return redirect()->intended(route('dashboard'));
        }
    
        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
