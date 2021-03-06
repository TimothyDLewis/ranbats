@extends("layouts.default")

@section("title")
:: Login
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / Login
@endsection

@section("content")
<div class="row">
	<div class="col-12">
		<form method="POST">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-header">
					<h3 class="mt-0 card-title">Login</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 col-sm-6 form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" value="{{ old("email") }}" />
							<div class="invalid-feedback">
								{{ $errors->first("email") }}
							</div>
						</div>
						<div class="col-12 col-sm-6 form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}"/>
							<div class="invalid-feedback">
								{{ $errors->first("password") }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-secondary btn-fill mr-2">Login</button>
							<a href="{{ url("/remind") }}" class="btn btn-secondary">Forgot Password</a>
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
