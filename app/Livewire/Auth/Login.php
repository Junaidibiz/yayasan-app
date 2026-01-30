<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout; // 1. Tambahkan import ini

#[Title('Login - Core Multazam')]
#[Layout('layouts.app')] // 2. Pindahkan deklarasi layout ke sini
class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            /** @var User $user */
            $user = Auth::user();

            if ($user->isStaff()) {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/');
        }

        $this->addError('email', 'Email atau password salah.');
    }

    public function render()
    {
        // 3. Sekarang render() cukup mengembalikan view saja
        return view('livewire.auth.login');
    }
}
