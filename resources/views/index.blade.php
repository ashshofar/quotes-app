@extends('layouts.master')
 
@section('title')
	Trending Quotes
@endsection

@section('styles')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
	<br>
	<div class="jumbotron">
		<center>
			<h1>Latest Quotes</h1>
			<br>
			<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Quote</a>
		</center>
	</div>
	
	@if(count($errors) > 0)
		<div class="alert alert-dismissible alert-danger">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
			@foreach($errors->all() as $error)
				{{ $error }}
			@endforeach
		</div>
	@endif

	@if(Session::has('success'))
		<div class="alert alert-dismissible alert-success">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ Session::get('success') }}
		</div>
	@endif

	@for($i = 0; $i < count($quotes); $i++)
		<div class="alert alert-dismissible alert-info">
		 	<div class="close"><a href="{{ route('delete', ['quote_id' => $quotes[$i]->id]) }}">&times;</a></div>
		 	<center>
			  "{{ $quotes[$i]->quote }}" <br><br>
			  Created By <a href="#" class="alert-link">{{ $quotes[$i]->author->name }}</a> <br>
			  On {{ $quotes[$i]->created_at }}
			</center>
		</div>
	@endfor
	
	

	<div class="modal fade" id="myModal" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add Quote</h4>
	      </div>
	      <div class="modal-body">
	        <form class="form-horizontal" method="post" action="{{ route('create') }}">
			  <fieldset>
			    <div class="form-group">
			      <label for="author" class="col-lg-2 control-label">Name</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control" id="author" name="author" placeholder="Name">
			      </div>
			    </div>
			   
			    <div class="form-group">
			      <label for="quote" class="col-lg-2 control-label">Quote</label>
			      <div class="col-lg-10">
			        <textarea class="form-control" rows="3" id="quote" name="quote" placeholder="Quote"></textarea>
			      </div>
			    </div>
			    
			    
			  </fieldset>
			
	      </div>
	      <div class="modal-footer">
	        	<button type="submit" class="btn btn-primary">Submit Quote</button>
			    <input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection