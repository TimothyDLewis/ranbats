@if(session()->get("feedback"))
<div class="alert alert-{{ session()->get("feedback")->class }} alert-with-icon pt-4 pb-4" data-notify="container">
	<button type="button" aria-hidden="true" class="close" data-dismiss="alert">
		<i class="nc-icon nc-simple-remove"></i>
	</button>
	<span data-notify="icon" class="{{ session()->get("feedback")->icon }}"></span>
	<h5 class="mb-0" data-notify="message">{!! session()->get("feedback")->message !!}</h5>
</div>
@endif