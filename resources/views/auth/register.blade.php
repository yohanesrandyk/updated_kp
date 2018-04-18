<form class="form-horizontal" method="POST" action="{{ route('register') }}">{{ csrf_field() }}
<input type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
@if ($errors->has('username')) {{ $errors->first('username') }} @endif <br>
<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
@if ($errors->has('email')) {{ $errors->first('email') }} @endif <br>
<input type="password" class="form-control" name="password" required>
@if ($errors->has('password')) {{ $errors->first('password') }} @endif <br>
<input type="password" class="form-control" name="password_confirmation" required>
@if ($errors->has('password_confirmation')) {{ $errors->first('password_confirmation') }} @endif <br>
<button type="submit" class="btn btn-primary">Register</button>
</form>
