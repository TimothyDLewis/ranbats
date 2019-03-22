@extends("layouts.default")

@section("title")
:: Series
@endsection

@section("styles")
<style type="text/css">
	tr.series-row > td.game-boxart {
		width: 1%; min-width: 100px;
	}
</style>
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / Series
@endsection

@section("content")
@if($showAdminControls)
<div class="row form-group admin-control">
	<div class="col-12 text-right">
		<a href="{{ url("/series/create") }}" class="btn btn-info btn-sm btn-fill"><i class="fa fa-plus"></i> Create Series</a>
	</div>
</div>
@endif
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="mt-0 card-title">Browse Series</h3>
			</div>
			<div class="card-body table-responsive">
				<table class="table table-bordered mb-1">
					<thead class="thead-light">
						<tr>
							<th>Name</th>
							<th class="game-row" colspan="2">Game</th>
							<th>Entrants</th>
							<th>Tournaments</th>
							<th>Date</th>
							@if($showAdminControls)
							<th>Actions</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@if(count($series) == 0)
						<tr>
							<td colspan="{{ $showAdminControls ? 7 : 6 }}">
								No Series to Display...
							</td>
						</tr>
						@else
						@foreach($series AS $sSeries)
						@include("components.series-row", ["series" => $sSeries])
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection