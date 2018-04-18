<form class="form-horizontal" method="POST" action="{{ route('password.request') }}">{{ csrf_field() }}
<input type="hidden" name="token" value="{{ $token }}">
<input type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
<input type="password" class="form-control" name="password" required>
<input type="password" class="form-control" name="password_confirmation" required>
<button type="submit" class="btn btn-primary">Reset Password</button>
</form>
