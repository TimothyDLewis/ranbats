@extends("layouts.default")

@section("title")
- Login
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / Forgot Password
@endsection

@section("content")
<div class="row">
	<div class="col-12">
		<form method="POST">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Forgot Password</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" value="{{ old("email") }}" />
							<div class="invalid-feedback">
								{{ $errors->first("email") }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 form-group">
							<button type="submit" class="btn btn-secondary btn-fill mr-2">Send Password Reset</button>
							<a href="{{ url("/") }}" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section("scripts")
@endsection
