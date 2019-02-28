@extends("layouts.default")

@section("title")
:: Register
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / Register
@endsection

@section("content")
<div class="row">
	<div class="col-12">
		<form method="POST">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Register</h4>
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
						<div class="col-12 col-sm-6 form-group">
							<label>First Name</label>
							<input type="text" name="first_name" class="form-control {{ $errors->has("first_name") ? "is-invalid" : "" }}" value="{{ old("first_name") }}" />
							<div class="invalid-feedback">
								{{ $errors->first("first_name") }}
							</div>
						</div>
						<div class="col-12 col-sm-6 form-group">
							<label>Last Name</label>
							<input type="text" name="last_name" class="form-control {{ $errors->has("last_name") ? "is-invalid" : "" }}" value="{{ old("last_name") }}" />
							<div class="invalid-feedback">
								{{ $errors->first("last_name") }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-6 form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}"/>
							<div class="invalid-feedback">
								{{ $errors->first("password") }}
							</div>
						</div>
						<div class="col-12 col-sm-6 form-group">
							<label>Password Confirmation</label>
							<input type="password" name="password_confirmation" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}"/>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 form-group">
							<button type="submit" class="btn btn-secondary btn-fill mr-2">Register</button>
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
