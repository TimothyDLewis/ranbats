@extends("layouts.default")

@section("title")
:: Games
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / Games
@endsection

@section("content")
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title">Browse Games</h2>
			</div>
			<div class="card-body">
				<div class="row">
					@if(count($games) == 0)
					<div class="col-12">
						<h4>No Games to Display...</h4>
					</div>
					@else
					@foreach($games AS $game)
					@include("components.game-card", ["game" => $game])
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection