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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-5">Welcome to backfeed :)</h1>
            <p class="text-dark">
                You can use backfeed to collect anonymous feedback.
                Please keep in mind that the person receiving your feedback is human too.
                Please be kind and keep the discourse civil.
                Thankyou.
            </p>
        </div>
    </div>
</div>


@endsection
