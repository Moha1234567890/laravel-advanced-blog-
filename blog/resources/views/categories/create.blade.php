@extends('layouts.app')

@section('content')


<div class="card card-default">
	<div class="card-header">
		{{ isset($category->id) ? "Update cate" : "Create Cate" }}
	</div>
	<div class="card-body">
		<form action="{{ isset ($category) ? route('categories.update',$category->id) : route('categories.store')}}" method="POST">
			@csrf
			@if (isset($category))
			     @method('PUT')
			@endif     
		  <div class="form-group">
		    <label for="exampleInputEmail1">{{ isset($category) ? "Update category" : "Enter Category" }}</label>
		    <input type="text" class="@error('name') is-invalid @enderror form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter category" value="{{ isset ($category) ? $category->name : '' }}">
		    @error('name')
		    <div class = "alert alert-danger">
		    	{{ $message }}
		    </div>
		    @enderror		
		   
		  </div>
		  <div class="form-group">
		    <button class="btn btn-success">{{ isset($category->id) ? "Update" : "Add" }}</button>
		  </div>
		</form>
	</div>

</div>


@endsection