@extends('backend.auth.layout')
@section('content')

<h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Easily Using</span></h6>
<div class="card-body pt-0">
	
	@errors
	<form class="form-horizontal" method="POST" action="{{route('auth.auth')}}">
		@csrf
		<fieldset class="form-group floating-label-form-group">
			<label for="user-name">Your Email</label>
			<input type="email" name="email" class="form-control" id="user-name" placeholder="Your Email" required>
		</fieldset>
		<fieldset class="form-group floating-label-form-group mb-1">
			<label for="user-password">Enter Password</label>
			<input type="password" name="password" class="form-control" id="user-password" placeholder="Enter Password" required>
		</fieldset>
		<div class="form-group row">
			<div class="col-md-6 col-12 text-center text-sm-left">
				<fieldset>
					<input type="checkbox" name="remember_me" id="remember-me" class="chk-remember">
					<label for="remember-me"> Remember Me</label>
				</fieldset>
			</div>
		</div>
		<button type="submit" class="btn btn-outline-primary btn-block"><i class="ft-unlock"></i> Login</button>
	</form>
</div>

	
@endsection