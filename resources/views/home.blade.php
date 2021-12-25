@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
	    <div class="card mt-3">
                <div class="card-header">
                    welcome!
                </div>

                <div class="card-body">
                    <a href="/feedback/{{$user_id}}">click here to go to your feedback submission page, share that page with your friends to receive their feedback</a>
                </div>
            </div>

            @foreach ($feedbacks as $feedback )
            <div class="card mt-3">
                <div class="card-header">
                    {{$feedback->title}}
                </div>

                <div class="card-body">
                    {{$feedback->content}}

		</div>
                <div class="card-footer">
                    {{$feedback->created_at->diffForHumans()}}
                </div>
            </div>

	    @endforeach
	   
        </div>
    </div>
</div>
@endsection




















































