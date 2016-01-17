@include('partials.errors')

{!! Form::model($profile, ['url' => url($target), 'method' => $method, 'files' => true]) !!}
	{!! Form::text('name', null, ['placeholder' => 'full name', 'class' => 'form-control']) !!}
	{!! Form::email('email', null, ['placeholder' => 'e-mail address', 'class' => 'form-control']) !!}
	{!! Form::password('password', ['placeholder' => 'password', 'class' => 'form-control']) !!}
	{!! Form::password('password_confirmation', ['placeholder' => 'confirm password', 'class' => 'form-control']) !!}
	<div class="btn-group">
		<div class="btn btn-primary btn-file">
			choose image* {!! Form::file('image') !!}
		</div>
		{!! Form::submit($acceptButtonText, ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}