@extends('app')

@section('content')
	create a new notice
	<h1 class ="page-heading">Prepare a DMCA Notice</h1>
	{!! Form::open(['method' => 'get' , 'action' => 'NoticesController@confirm']) !!}
		<!-- Form Input-->
		<div class="form-group">
		 {!! Form::label('provider_id','Provider_id:') !!}
		 {!! Form::select('provider_id', $providers, null,  ['class' => 'form-control']) !!}
		</div>		
		<!-- Form Input-->
		<div class="form-group">
		 {!! Form::label('infringing_title','Infringing_title:') !!}
		 {!! Form::text('infringing_title', null, ['class' => 'form-control']) !!}
		</div>	
		<!-- Form Input-->
		<div class="form-group">
		 {!! Form::label('infringing_link','Infringing_link:') !!}
		 {!! Form::text('infringing_link', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Form Input-->
		<div class="form-group">
		 {!! Form::label('original_link','Original_link:') !!}
		 {!! Form::text('original_link', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Form Input-->
		<div class="form-group">
		 {!! Form::label('original_description','Original_description:') !!}
		 {!! Form::textarea('original_description', null, ['class' => 'form-control']) !!}
		</div>	

		<div class="form-group">
		 {!! Form::submit('Preview Notice',['class' => 'btn btn-primary form-control']) !!}
		</div>
	
	{!! Form::close() !!}
	@include('errors.list')
	
@endsection

