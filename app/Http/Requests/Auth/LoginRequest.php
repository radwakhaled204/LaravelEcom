<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{


    public function authorize() : bool
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules() : array 
    {
        return [
            'email' => ['required' , 'string' , 'email'],
            'password' => ['required' , 'string'],
        ];

    }


    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }



    public function throttleKey() : string
    {
       return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
    

    public function authenticate() : void
    {
        $this->ensureIsNotRateLimited();
        if(!Auth::attempt($this->only('email' , 'password'), $this->boolean('remember')))
        {
            Ratelimit::hit($this->throttleKey());
           throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
           ]);
           Ratelimit::clear($this->throttleKey());
        }

    }
}
