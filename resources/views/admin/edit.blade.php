@extends('master')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<form class="col-md-8" method="POST" action="{{route('user.postedit',['id'=>$user->id])}}">
				@csrf
				<div class="form-group">
					    <label style="margin-top: 30px;" for="exampleInputEmail1">Name</label>
					    <input name="name" class="form-control" value="{{$user->name}}"   placeholder="Enter email">
					    
				  </div>
				  <div class="form-group">
					    <label for="exampleInputEmail1">Email </label>
					    <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Enter ">
					    
				  </div>
				  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" value="{{$user->password}}" name="password" class="form-control" placeholder="Password">
				  </div>
				  <select style="margin-bottom: 20px" class="form-control" name="roles[]" multiple="multiple">
				  	@foreach($roles as $r)
				  		<option
				  			{{$listRole->contains($r->id)? 'selected' : ''}}
				  			 value="{{$r->id}}">
				  			 	{{$r->display_name}}
				  		</option>
				  	@endforeach
				  	
				  </select>
				  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>

@endsection