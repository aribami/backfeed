@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            @foreach ( $all_feedbacks as $feedback )
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




















































