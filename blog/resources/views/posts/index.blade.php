@extends('layouts.app')

@section('content')

<div class="clearfix">
	<a class="btn btn-success float-right" href="{{ route('posts.create') }}">Create post</a>
</div>
<div>
	
	<table class="table">
		<thead>
			<tr>
				<th>image</th>
				<th>title</th>
				<th>actions</th>
			</tr>
		</thead>
		<tbody>
	
			@foreach($posts as $post)
			<tr>
				<td>
					<img src="{{asset('storage/'.$post->image)}}" width="120px" height="40px">
				</td>
				<td>{{$post->title}}</td>
			
				<td>
				<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
				@csrf
				@method('DELETE')
				<button class="btn btn-danger float-right ml-2">
				{{$post->trashed() ? "delete" : "trashed"}}
			    </button>
				</form>	
				@if (!$post->trashed())
				<a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary float-right">Edit</a>
				@else
				<a href="{{route('trashed.restore',$post->id)}}" class="btn btn-primary float-right">Restore</a>
				@endif
				</td>
			</tr>
            @endforeach

          
		</tbody>
	</table>
</div>
@endsection