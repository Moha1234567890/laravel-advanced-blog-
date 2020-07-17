@extends('layouts.app')

@section('content')


<div class="card card-default">
	<div class="card-header">
		profile
	</div>
	<div class="card-body">
		<form action="{{ route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
			    @csrf
		 <div class="form-group">
		    <label> name</label>
		    <input type="text" name="name"  value="{{ $user->name  }}" class="form-control">
          </div>
          <div class="form-group">
		    <label>email</label>
		    <input type="text" name="email"  value="{{ $user->email }}" class="form-control">
		  </div>
		  <div class="form-group">
		      <label>about</label>
		      <textarea  class="form-control" name="about" rows="2">{{$profile->about}}</textarea>
		  </div>
		  <div class="form-group">
		   	<label> facebook</label>
		    <input type="text"  class="form-control" name="facebook"  value="{{$profile->facebook}}">
		  </div>
		  <div class="form-group">
		   	<label>twitter</label>

		    <input type="text" class="form-control" name="twitter"  value="{{$profile->twitter}}">		   
		  </div>
		  <div class="form-group">
		  	<label>pic</label>
            <img class="form-control" src="{{$user->hasPicture() ?  asset('storage/'. $user->getPicture()) : $user->getGravatar()}}" width="140px" height="10px"> 

		    <input type="file" class="form-control" name="picture">
		  </div>
		  <div>
		    <button class="btn btn-success">Update</button>
		  </div>
		</form>
	</div>

</div>


@endsection