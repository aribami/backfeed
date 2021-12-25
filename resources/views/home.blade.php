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
	    <button type="button" class="m-2 btn btn-dark text-light" data-bs-toggle="modal" data-bs-target="#myModel" id="shareBtn" data-bs-placement="top" title="Click Me!"> Share </button> <!-- Modal -->
		<div class="modal fade" id="myModel" tabindex="-1" aria-labelledby="myModelLabel" aria-hidden="true">
		    <div class="modal-dialog">
			<div class="modal-content">
			    <div class="modal-header">
				<h5 class="modal-title" id="myModelLabel">Share</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			    </div>
			    <div class="modal-body">
				<h6>Share this link via</h6>
				<div class="d-flex m-1 align-items-center">
					 <a href="#" class="fs-5 m-1 d-flex align-items-center justify-content-center"><i class="text-dark fs-2 m-1 bi bi-facebook"></i></a>
					 <a href="#" class="fs-5 m-1 d-flex align-items-center justify-content-center"><i class="text-dark fs-2 m-1 bi bi-twitter"></i></a>
					 <a href="#" class="fs-5 m-1 d-flex align-items-center justify-content-center"><i class="text-dark fs-2 m-1 bi bi-instagram"></i></a>
					 <a href="#" class="fs-5 m-1 d-flex align-items-center justify-content-center"><i class="text-dark fs-2 m-1 bi bi-whatsapp"></i></a>
					 <a href="#" class="fs-5 m-1 d-flex align-items-center justify-content-center"><i class="text-dark fs-2 m-1 bi bi-telegram"></i></a>
				 </div>
				<h6>Or copy link</h6>
				@php
					$personal_submission_page_url=URL::to("/feedback/$user_id");
				@endphp
				<div class="field m-1 d-flex align-items-center justify-content-between border">
					<i class="bi bi-link-45deg"></i> <input readonly class="form-control border-0" type="text" value="{{$personal_submission_page_url}}">
					<button type="button" class="btn btn-clipboard" title="Copy to clipboard">
						<i class="bi bi-clipboard"></i> 
					</button>
				</div>
			    </div>
			</div>
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
<script>
document.addEventListener('DOMContentLoaded',function(e){
	let field = document.querySelector('.field');
	let input = document.querySelector('input');
	let copyBtn = document.querySelector('.field button');

	copyBtn.onclick = () =>{
	input.select();

   	/* Copy the text inside the text field */
	copyToClipboard(input.Value);

	field.classList.add('active');
	copyBtn.innerHTML = '<i class="bi bi-clipboard-check text-success"></i>';
	setTimeout(()=>{
		field.classList.remove('active');
		copyBtn.innerHTML = '<i class="bi bi-clipboard"></i>';
		},5000)
	}
})
// Copies a string to the clipboard. Must be called from within an
// event handler such as click. May return false if it failed, but
// this is not always possible. Browser support for Chrome 43+,
// Firefox 42+, Safari 10+, Edge and Internet Explorer 10+.
// Internet Explorer: The clipboard feature may be disabled by
// an administrator. By default a prompt is shown the first
// time the clipboard is used (per session).
function copyToClipboard(text) {
    if (window.clipboardData && window.clipboardData.setData) {
        // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
        return window.clipboardData.setData("Text", text);

    }
    else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in Microsoft Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
            return document.execCommand("copy");  // Security exception may be thrown by some browsers.
        }
        catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
            return prompt("Copy to clipboard: Ctrl+C, Enter", text);
        }
        finally {
            document.body.removeChild(textarea);
        }
    }
}
</script>
@endsection




















































