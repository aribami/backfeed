@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
	    <button type="button" class="mr-2 mt-2 btn btn-dark text-light" data-bs-toggle="modal" data-bs-target="#myModel" id="shareBtn" data-bs-placement="top" title="Click Me!"> Share Feedback submission page </button> <!-- Modal -->
		<div class="modal fade" id="myModel" tabindex="-1" aria-labelledby="myModelLabel" aria-hidden="true">
		    <div class="modal-dialog">
			<div class="modal-content">
			    <div class="modal-header">
				<h5 class="modal-title" id="myModelLabel">Share the link to your feedback submission page</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			    </div>
			    <div class="modal-body">
				<h6>Share this link via</h6>
				<div class="d-flex mr-1 my-1 align-items-center">
				@php
					$personal_submission_page_url=URL::to("/feedback/$user->unique_handle");
				@endphp
					 <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/sharer/sharer.php?u={{$personal_submission_page_url}}&t=Send me your feedback on backfeed!" class="fs-5 mr-1 d-flex align-items-center justify-content-center"><i class="text-dark fs-2 m-1 bi bi-facebook"></i></a>
					 <a target="_blank" rel="noopener noreferrer" href="https://twitter.com/share?url={{$personal_submission_page_url}}&text=Send me your feedback on backfeed!" class="fs-5 mr-1 d-flex align-items-center justify-content-center"><i class="text-dark fs-2 m-1 bi bi-twitter"></i></a>
					 <a target="_blank" rel="noopener noreferrer" href="mailto:?subject=Send me your feedback on backfeed!&body={{$personal_submission_page_url}}" class="fs-5 mr-1 d-flex align-items-center justify-content-center"><i class="text-dark fs-2 m-1 bi bi-envelope"></i></a>
					 <a target="_blank" rel="noopener noreferrer" href="whatsapp://send?text={{$personal_submission_page_url}}" class="fs-5 mr-1 d-flex align-items-center justify-content-center"><i class="text-dark fs-2 m-1 bi bi-whatsapp"></i></a>
					 <a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/shareArticle?mini=true&url={{$personal_submission_page_url}}&t=Send me your feedback on backfeed!" class="fs-5 mr-1 d-flex align-items-center justify-content-center"><i class="text-dark fs-2 m-1 bi bi-linkedin"></i></a>
				 </div>
				<h6>Or copy link</h6>
				<div class="field m-1 d-flex align-items-center justify-content-between border rounded">
					<i class="p-1 m-1 bi bi-link-45deg text-dark"></i> <input readonly class="form-control border-0" type="text" value="{{$personal_submission_page_url}}">
					<button type="button" class="btn btn-clipboard" title="Copy to clipboard">
						<i class="bi bi-clipboard text-dark"></i>
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
        {{$feedbacks->links()}}
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
		copyBtn.innerHTML = '<i class="bi bi-clipboard text-dark"></i>';
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




















































