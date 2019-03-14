@extends("layouts.default")

@section("title")
:: {{ $tournament->name }}
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / <a href="{{ url("/series") }}">Series</a> / <a href="{{ url("/series/".$series->slug) }}">{{ $series->name }}</a> / {{ $tournament->name }}
@endsection

@section("content")
@if($showAdminControls)
<div class="row form-group admin-control">
	<div class="col-12 text-right">
		<a href="{{ url("/series/".$series->slug."/".$tournament->slug."/add-player") }}" class="btn btn-info btn-sm btn-fill"><i class="fa fa-plus"></i> Add Player</a>
	</div>
</div>
@endif
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title">{{ $tournament->name }}</h2>
			</div>
			<div class="card-body table-responsive">
				<table class="table table-bordered mb-1">
					<thead class="thead-light">
						<tr>
							<th class="rank-col"></th>
							<th>Player</th>
							<th>Points</th>
							<th>Wins</th>
							<th>Losses</th>
							<th>Ties</th>
							@if($showAdminControls)
							<th>Actions</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@if(count($tournament->entrants) == 0)
						<tr>
							<td colspan="{{ $showAdminControls ? 7 : 6 }}">
								No Entrants to Display...
							</td>
						</tr>
						@else
						<?php $rank = 0; $previous = null; ?>
						@foreach($tournament->entrants AS $entrant)
						<?php if($previous !== $entrant->pivot->points){ $rank++; } $previous = $entrant->pivot->points; ?>
						@include("components.entrant-row", ["player" => $entrant])
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection