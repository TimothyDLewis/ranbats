@extends("layouts.default")

@section("title")
- Login
@endsection

@section("styles")
@endsection

@section("breadcrumb")
Reset Password
@endsection

@section("content")
<div class="row">
	<div class="col-12">
		<form method="POST">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Reset Password</h4>
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
							<button type="submit" class="btn btn-secondary btn-fill">Reset Password</button>
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
