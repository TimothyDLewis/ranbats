@extends("layouts.default")

@section("title")
:: Profile
@endsection

@section("styles")
@endsection

@section("breadcrumb")
<a href="{{ url("/") }}">Home</a> / Profile
@endsection

@section("content")
<div class="row">
	<div class="col-12">
		<form method="POST">
			<input type="hidden" name="action" value="account"/>
			{{ csrf_field() }}
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<h3 class="mt-0">Account Settings</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-12 form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" value="{{ old("email", $user->email) }}" />
							<div class="invalid-feedback">
								{{ $errors->first("email") }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-6 form-group">
							<label>First Name</label>
							<input type="text" name="first_name" class="form-control {{ $errors->has("first_name") ? "is-invalid" : "" }}" value="{{ old("first_name", $user->first_name) }}" />
							<div class="invalid-feedback">
								{{ $errors->first("first_name") }}
							</div>
						</div>
						<div class="col-12 col-sm-6 form-group">
							<label>Last Name</label>
							<input type="text" name="last_name" class="form-control {{ $errors->has("last_name") ? "is-invalid" : "" }}" value="{{ old("last_name", $user->last_name) }}" />
							<div class="invalid-feedback">
								{{ $errors->first("last_name") }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-secondary btn-fill mr-2">Save</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<form method="POST">
			<input type="hidden" name="action" value="password"/>
			{{ csrf_field() }}
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<h3 class="mt-0">Password Settings</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-6 form-group">
							<label>Password</label>
							<input type="password" name="new_password" class="form-control {{ $errors->has("new_password") ? "is-invalid" : "" }}"/>
							<div class="invalid-feedback">
								{{ $errors->first("new_password") }}
							</div>
						</div>
						<div class="col-12 col-sm-6 form-group">
							<label>Password Confirmation</label>
							<input type="password" name="new_password_confirmation" class="form-control {{ $errors->has("new_password") ? "is-invalid" : "" }}"/>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-secondary btn-fill mr-2">Save</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@if($user->inRole("user"))
<div class="row">
	<div class="col-12">
		<form method="POST">
			<input type="hidden" name="action" value="player"/>
			{{ csrf_field() }}
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<h3 class="mt-0">Player Settings</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-6 form-group">
							<label>Prefix</label>
							<input type="text" name="prefix" class="form-control {{ $errors->has("prefix") ? "is-invalid" : "" }}" value="{{ old("prefix", ($player ? $player->prefix : "")) }}" />
							<div class="invalid-feedback">
								{{ $errors->first("prefix") }}
							</div>
						</div>
						<div class="col-12 col-sm-6 form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" value="{{ old("name", ($player ? $player->name : "")) }}" />
							<div class="invalid-feedback">
								{{ $errors->first("name") }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-secondary btn-fill mr-2">Save</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endif
@endsection