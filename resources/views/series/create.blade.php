@extends("layouts.default")

@section("title")
:: Create Series
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / <a href="{{ url("/series") }}">Series</a> / Create
@endsection

@section("content")
<form method="POST">
	{{ csrf_field() }}
	<div class="row form-group admin-control">
		<div class="col-12 text-right">
			<button type="submit" class="btn btn-info btn-sm btn-fill"><i class="fa fa-check"></i> Save</button>
			<a href="{{ url("/series") }}" class="btn btn-default btn-sm btn-fill">Cancel</a>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="mt-0">Create Series</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control {{ $errors->has("slug") ? "is-invalid" : "" }}" value="{{ old("name") }}" />
							<div class="invalid-feedback">
								{{ $errors->first("slug") }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 form-group">
							<label>Game</label>
							<select class="form-control {{ $errors->has("game") ? "is-invalid" : "" }}" name="game">
								<option value="">- Select a Game -</option>
								@foreach($games AS $game)
								<option value="{{ $game->id }}" {{ old("game") == $game->id ? "selected" : "" }}>{{ $game->name }}</option>
								@endforeach
							</select>
							<div class="invalid-feedback">
								{{ $errors->first("slug") }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 form-group">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection