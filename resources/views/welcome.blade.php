@extends("layouts.app")
@section("login")
@if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

@endsection
@section("content")
<div class="container">
        <h1 class="display-5">drop your datty comments here in primvate</h1>
        <p class="text-dark">
            backfeed is an app where you can give anonymous feedback, go ahead and write your feedback here. Please dont be cumshy, and definitely
            not pumshy, because cumshy@pumshy is already smobaby and my eveeethiiingggg.
        </p>
</div>


@endsection
