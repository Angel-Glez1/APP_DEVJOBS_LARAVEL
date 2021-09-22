@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center mt-20">

        <div class="text-4xl my-5 text-center">{{ __('Verify Your Email Address') }}</div>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <div class="text-2xl">
            <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
            <p>{{ __('If you did not receive the email') }}</p>
        </div>
                
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit"
                 class="bg-indigo-500 
                        max-w-sm
                        hover:bg-indigo-700 
                        text-gray-100 
                        p-3 
                        mt-10
                        focus:outline-none 
                        focus:shadow-outline 
                        uppercase
                        font-bold">
                {{ __('click here to request another') }}
            </button>.
        </form>


    </div>
@endsection
