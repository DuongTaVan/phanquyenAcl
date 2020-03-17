@extends('master')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="{{route('user.add')}}" role="button">Add</a>
			</div>
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Email</th>
			      <th scope="col">Edit</th>
			      <th scope="col">Delete</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($user as $user)
			    <tr>
			    	
			      <th scope="row">{{$user->id}}</th>
			      <td>{{$user->name}}</td>
			      <td>{{$user->email}}</td>
				  <td><a class="btn btn-success" href="{{route('user.edit',['id'=>$user->id])}}" role="button">Edit</a></td>
				  <td><a class="btn btn-danger" href="{{route('user.delete',['id'=>$user->id])}}" role="button">Delete</a></td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
		</div>
	</div>

@endsection