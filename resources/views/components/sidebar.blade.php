<div class="logo">
	<a href="{{ url("/") }}" class="simple-text">
		&nbsp; <!-- TODO: Addming Image -->
	</a>
</div>
<hr style="border-top: 1px solid rgba(255, 255, 255, 0.2);"/>
@if($authUser)
@if($authUser->inRole("superuser") || $authUser->inRole("admin"))
<ul class="nav">
	<li class="nav-item">
		<label class="ml-3" class="simple-text">
			<strong>Admin Actions</strong>
		</label>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/dashboard") }}">
			<span class="no-icon">Dashboard</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/users") }}">
			<span class="no-icon">Users</span>
		</a>
	</li>
</ul>
<hr style="border-top: 1px solid rgba(255, 255, 255, 0.2);"/>
@endif
<ul class="nav">
	<li class="nav-item">
		<label class="ml-3" class="simple-text">
			<strong>User Actions</strong>
		</label>
	</li>
</ul>
<hr style="border-top: 1px solid rgba(255, 255, 255, 0.2);"/>
<ul class="nav">
	<li class="nav-item">
		<label class="ml-3" class="simple-text">
			<strong>Welcome, {{ $authUser->first_name }}!</strong>
		</label>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/profile") }}">
			<span class="no-icon">My Profile</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/settings") }}">
			<span class="no-icon">Settings</span>
		</a>
	</li>
</ul>
<hr style="border-top: 1px solid rgba(255, 255, 255, 0.2);"/>
<ul class="nav">
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/logout") }}">
			<span class="no-icon">Logout</span>
		</a>
	</li>
</ul>
<hr style="border-top: 1px solid rgba(255, 255, 255, 0.2);"/>
@else
<ul class="nav">
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/register") }}">
			<span class="no-icon">Register</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ url("/login") }}">
			<span class="no-icon">Login</span>
		</a>
	</li>
</ul>
<hr style="border-top: 1px solid rgba(255, 255, 255, 0.2);"/>
@endif