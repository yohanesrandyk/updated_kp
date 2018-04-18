<form class="form-horizontal" method="POST" action="{{ route('password.email') }}">{{ csrf_field() }}
<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
<button type="submit" class="btn btn-primary">Send Password Reset Link</button>
</form>
