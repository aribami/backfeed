@extends("layouts.app")
@section("content")
<div class="container">
<form method="POST" action="/feedback/{{$user_id}}/submit">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">please include a name if you want the creator to respond to you.</div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">feedback</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">include my name</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


@endsection
