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
	    <h1 class="display-5">Simple</h1>
	    <h1 class="display-5">No BS</h1>
	    <h1 class="display-5">Feedback.</h1>
	    <p class="text-dark">
		Start collecting organic feedback in just a couple of steps.
	    </p>
	    <p class="text-dark">
		Sign up for backfeed using your email id, share your unique feedback form link with your target audience and start collecting feedback right away.
	    </p>
	    <p class="text-dark"> 
		When you submit your feedback on backfeed, only the data that you provide is recorded and nothing else. You may even opt to remain anonymous.
	    </p>
	    <p class="text-dark">
		Get started with backfeed today. 
	    </p>
            <p class="text-secondary">
                Please keep in mind that the person receiving your feedback is human too.
                Please be kind and keep the discourse civil.
                Thankyou.
            </p>

                <a  href="/home">
                    <button class="btn btn-dark">
                go to your dashboard
            </button>

            </a>

        </div>
    </div>
</div>


@endsection
