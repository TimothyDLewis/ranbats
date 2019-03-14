@extends("layouts.default")

@section("title")
:: Create Tournament
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / <a href="{{ url("/series") }}">Series</a> / <a href="{{ url("/series/".$series->slug) }}">{{ $series->name }}</a> / Create Tournament
@endsection

@section("content")
<form method="POST">
	{{ csrf_field() }}
	<div class="row form-group admin-control">
		<div class="col-12 text-right">
			<button type="submit" class="btn btn-info btn-sm btn-fill"><i class="fa fa-check"></i> Save</button>
			<a href="{{ url("/series/".$series->slug) }}" class="btn btn-default btn-sm btn-fill">Cancel</a>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title">Create Tournament</h2>
				</div>
				<div class="card-body">

				</div>
			</div>
		</div>
	</div>
</form>
@endsection