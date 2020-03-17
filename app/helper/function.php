<?php 
 function showErrors($errors,$name){
 	if($errors->has($name)){
 		return '
 			<div class="alert alert-danger" role="alert">
								<strong>'.$errors->first($name).'</strong>
			</div>

 		';
 	}
 }