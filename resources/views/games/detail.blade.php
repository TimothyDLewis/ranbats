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
					<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 form-group">
						<div class="row">
							<div class="col-12">
								<img src="{{ $game->boxartSrc() }}" class="img-fluid img-thumbnail"/>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-md-8 col-lg-8 col-xl-9">
						<div class="row">
							<div class="col-12">
								<h3 class="mt-0">Description</h3>
								<p>{!! nl2br($game->description) !!}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<h3 class="mt-0">Release Date</h3>
								<p>{{ $game->release_date->format("F jS, Y") }}</p>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<h3 class="mt-0">Platforms</h3>
								<p>{!! $game->renderPlatforms() !!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection