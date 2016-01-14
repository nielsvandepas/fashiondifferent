{!! Form::model($element, ['url' => $target, 'method' => $method, 'files' => true]) !!}
	@include('partials.errors')

	<div class="form-group">
		{!! Form::text('name', null, ['placeholder' => 'name*', 'class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::textarea('description', null, ['placeholder' => 'description', 'class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::select('type', $types, null, ['placeholder' => 'type*', 'class' => 'form-control']) !!}
	</div>

	<div class="btn-group" role="group">
		<div class="btn btn-primary btn-file">
			choose image* {!! Form::file('image') !!}
		</div>
		{!! Form::submit('upload', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}