@extends("layouts.default")

@section("title")
:: {{ $series->name }}
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / <a href="{{ url("/series") }}">Series</a> / {{ $series->name }}
@endsection

@section("content")
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title">{{ $series->name }}</h2>
			</div>
			<div class="card-body table-responsive">
				<table class="table table-bordered mb-1">
					<thead class="thead-light">
						<tr>
							<th>Tournament</th>
							<th>Entrants</th>
							<th>Date</th>
							<th>Overview</th>
							@if($showAdminControls)
							<th>Actions</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@if(count($series->tournaments) == 0)
						<tr>
							<td colspan="{{ $showAdminControls ? 5 : 4 }}">
								No Tournaments to Display...
							</td>
						</tr>
						@else
						@foreach($series->tournaments AS $tournament)
						@include("components.tournament-row", ["tournament" => $tournament])
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title">Standings</h2>
			</div>
			<div class="card-body table-responsive">
				<table class="table table-bordered mb-1">
					<thead class="thead-light">
						<tr>
							<th class="rank-col"></th>
							<th>Player</th>
							<th>Points</th>
							@foreach($series->tournaments AS $tournament)
							<th>{{ $tournament->name }}</th>
							@endforeach
						</tr>
					</thead>
					<tbody>
						@if(count($series->entrants) == 0)
						<tr>
							<td colspan="{{ 3 + count($series->tournaments) }}">
								No Standings to Display...
							</td>
						</tr>
						@else
						<?php $rank = 0; $previous = null; ?>
						@foreach($series->entrants AS $entrant)
						<?php if($previous !== $entrant->pivot->points){ $rank++; } $previous = $entrant->pivot->points; ?>
						@include("components.standings-row", ["player" => $entrant])
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection