@extends("layouts.default")

@section("title")
:: {{ $game->name }}
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / <a href="{{ url("/games") }}">Games</a> / {{ $game->name }}
@endsection

@section("content")
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title">{{ $game->name }}</h2>
			</div>
			<div class="card-body">
				<div class="row">
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection