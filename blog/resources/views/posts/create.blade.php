@extends('layouts.app')

@section('content')

@section('stylesheet')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" rel="stylesheet">
@endsection  

<div class="card card-default">
	<div class="card-header">
		{{isset($post) ? "update" : "create"}}
	</div>
	<div class="card-body">
		<form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			@if (isset($post))
			  @method('PUT')
			
            @endif 
		  <div class="form-group">
		    <label for="exampleInputEmail1">Title: </label>
		    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter category" value="{{ isset ($post) ? $post->title : '' }}">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Desc: </label>
		   <textarea class="form-control" name="description" rows="2">{{ isset($post) ? $post->description : "" }}</textarea>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Content: </label>
		   
		   <input type="hidden" id="x" name="content" value="{{ isset($post) ? $post->content : '' }}">
		   <trix-editor input="x"></trix-editor>
		  </div>

		  @if(isset($post))
			  <div class="form-group">
			  	 <img src="{{ asset('storage/' . $post->image)}}" width="100%">
			  </div>
		  @endif
		  <div class="form-group">
		    <label for="exampleInputEmail1">Image: </label>

		   <input type="file" name="image" class="form-control"> 
		  </div>
		    <div class="form-group">
			    <label for="selectCategory">select category:</label>
			    <select class="form-control" id="selectcategory" name="categoryID">		      	
			    @foreach($categories as $category)	
				       <option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach 			  
			    </select>
			</div>
			@if(!$tags->count() <= 0)
				<div class="form-group">
				    <label for="selectTag">select tag:</label>
				    <select class="form-control" id="selecttag" name="tags[]" multiple>		      	
				    @foreach($tags as $tag)	
				      <option value="{{ $tag->id }}"
				      	@foreach($posts as $post)
					      	@if($post->hasTag($tag->id)) 
					      	   selected
					      	@endif   
				      	@endforeach 
				      	  >{{ $tag->name }}</option>
					@endforeach 			  
				    </select>
				</div>
			@else 
			  <div class="alert alert-danger">no tags</div>
			@endif

		  <div class="form-group">
		    <button class="btn btn-success" type="submit">Add</button>
		  </div>
		</form>
	</div>

</div>


@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>

@endsection