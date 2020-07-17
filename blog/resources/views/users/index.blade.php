@extends('layouts.app')

@section('content')

<div class="clearfix">

<div>
	
	<table class="table">
		<thead>
			<tr>
				<th>image</th>
				<th>username</th>
				<th>role</th>
			</tr>
		</thead>
		<tbody>
	       
				@foreach($users as $user)
				<tr>
					<td>
						
	                    <img src=" {{$user->hasPicture() ?  asset('storage/'. $user->getPicture()) : $user->getGravatar()}}" style='border-radius: 25%' width='25%' heught='25%'>
					</td>
					
					<td>{{$user->name}}</td>
					<td>
						@if(!$user->isAdmin())
						   <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
						   	 @csrf
						    <button type="submit" class="btn btn-success">add</button>
						   </form> 
						 

						  
						@else
						  {{$user->role}}

						@endif  

					</td>
				
				</tr>
	            @endforeach
	 
	            

          
		</tbody>
	</table>
</div>
@endsection