@extends('layouts.app')

@section('content')


<div class="card card-default">
	<div class="card-header">
		{{ isset($tag->id) ? "Update tag" : "Create tag" }}
	</div>
	<div class="card-body">
		<form action="{{ isset ($tag) ? route('tags.update',$tag->id) : route('tags.store')}}" method="POST">
			@csrf
			@if (isset($tag))
			     @method('PUT')
			@endif     
		  <div class="form-group">
		    <label for="exampleInputEmail1">{{ isset($tag) ? "Update tag" : "Enter tag" }}</label>
		    <input type="text" class="@error('name') is-invalid @enderror form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter tag" value="{{ isset ($tag) ? $tag->name : '' }}">
		    @error('name')
		    <div class = "alert alert-danger">
		    	{{ $message }}
		    </div>
		    @enderror		
		   
		  </div>
		  <div class="form-group">
		    <button class="btn btn-success">{{ isset($tag->id) ? "Update" : "Add" }}</button>
		  </div>
		</form>
	</div>

</div>


@endsection