@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">
                    your user id is {{$user_id}}
                </div>

                <div class="card-body">
                    your feedback submission link is
                    <a href="/feedback/{{$user_id}}">
                        this.
                    </a>
                    share it with your friends.
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
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection




















































