@extends('app')

@section('content')

	<h1 class ="page-heading">Confirm Notice below</h1>
	{!! Form::open(['action' => 'NoticesController@store']) !!}

		<!-- Form Input-->
		<div class="form-group">
		 {!! Form::textarea('template', $template, ['class' => 'form-control']) !!}
		</div>	

		<div class="form-group">
		 {!! Form::submit('Confirm Notice',['class' => 'btn btn-primary form-control']) !!}
		</div>
	
	{!! Form::close() !!}
	@include('errors.list')
	
@endsection

