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
@if($showAdminControls)
<div class="row form-group admin-control">
	<div class="col-12 text-right">
		<a href="{{ url("/series/".$series->slug."/create-tournament") }}" class="btn btn-info btn-sm btn-fill"><i class="fa fa-plus"></i> Create Tournament</a>
	</div>
</div>
@endif
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
					<form id="standingsForm" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="standingsSort"/>
						<input type="hidden" name="standingsOrder"/>
					</form>
					<ul class="nav nav-tabs nav-justified standingsTabs">
						@foreach(["points", "wins", "losses", "ties"] AS $standingsTab)
						<li class="nav-item" data-sort="{{ $standingsTab }}">
							@if($standingsSort == $standingsTab)
							<a class="nav-link active" href="#">
								{{ ucfirst($standingsTab) }}
								@if($standingsOrder == "ASC")
								<span class="fa fa-caret-up"></span>
								@else
								<span class="fa fa-caret-down"></span>
								@endif
							</a> 
							@else
							<a class="nav-link" href="#">{{ ucfirst($standingsTab) }}</a> 
							@endif
						</li>
						@endforeach
					</ul>
					<thead class="thead-light">
						<tr>
							<th class="rank-col"></th>
							<th>Player</th>
							<th>{{ ucfirst($standingsSort) }}</th>
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
						<?php if($previous !== $entrant->pivot->{$standingsSort}){ $rank++; } $previous = $entrant->pivot->{$standingsSort}; ?>
						@include("components.standings-row", ["player" => $entrant, "column" => $standingsSort])
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section("scripts")
<script type="text/javascript">
	let oldSort = "{{ $standingsSort }}";
	let oldOrder = "{{ $standingsOrder }}";

	$(document).ready(function(){
		$(".standingsTabs").find(".nav-item").on("click", function(e){
			e.preventDefault();

			let newSort = $(this).attr("data-sort");
			let newOrder = null;

			if(newSort != oldSort){
				if(newSort == "losses"){
					newOrder = "ASC";
				} else {
					newOrder = "DESC";
				}

				$("input[name=standingsSort]").val(newSort);
				$("input[name=standingsOrder]").val(newOrder);

				$("#standingsForm").submit();
			}
		});
	});
</script>
@endsection