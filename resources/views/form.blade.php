@extends("layouts.app")
@section("content")
<div class="container">
@if(session('success'))
    <div class="alert alert-success">
        Feedback submitted successfully
    </div>    
@endif
<form method="POST" action="/feedback/{{$user_id}}">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input name="name" class="form-control" type="name" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">please include a name if you want the creator to respond to you.</div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">feedback</label>
        <textarea name="feedback-text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">include my name</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


@endsection
