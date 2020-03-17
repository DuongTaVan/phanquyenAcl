@extends('master')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<form class="col-md-8" method="POST" action="{{route('role.postedit',['id'=>$roles->id])}}">
				@csrf
				<div class="form-group">
					    <label style="margin-top: 30px;" for="exampleInputEmail1">Name</label>
					    <input name="name" class="form-control" value="{{$roles->name}}"  placeholder="name">
					    
				  </div>
				  <div class="form-group">
					    <label style="margin-top: 30px;" for="exampleInputEmail1">Display Name</label>
					    <input value="{{$roles->display_name}}" name="display_name" class="form-control"   placeholder="Display name">
					    
				  </div>
				  @foreach($permission as $p)
				 <div class="form-check">
				 	<input
				 	{{$getallPer->contains($p->id)? 'checked' : ''}}
				 	 type="checkbox" class="form-check-input" value="{{$p->id}}" name="permission[]">
				 	<label class="form-check-label">{{$p->display_name}}</label>
				 </div>
				 @endforeach
				  
				 
				  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>

@endsection