@extends("layouts.app")
@section("content")
<div class="container">
@foreach ($errors->all() as $error)
    <div class="alert alert-danger">{!! $errors->first() !!}</div>
@endforeach
@if(session('success'))
    <div class="alert alert-success">
        Feedback submitted successfully
    </div>
@endif
<form method="POST" action="/feedback/create/{{$user->unique_handle}}">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name/Nickname</label>
      <input name="name" id="nameField" class="form-control" type="name" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Feedback</label>
        <textarea name="feedback-text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
    <div class="mb-3 form-check">
      <input type="checkbox" onclick="disableEnableField()" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Remain Anonymous</label>
    </div>
    {!! RecaptchaV3::field('register') !!}
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script>
var disabled=0;
function disableEnableField(){

    if(disabled==0){ //disable
     document.getElementById('nameField').disabled = true;
       disabled=1;
     }
    else{  //enable again
     document.getElementById('nameField').disabled = false;
      disabled=0;
    }
}
</script>


@endsection
