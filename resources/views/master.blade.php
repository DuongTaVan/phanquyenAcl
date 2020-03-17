<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản trị - Store</title>
	<base href="{{asset('')}}">
	<!-- css -->
	<link href="source/backend/css/bootstrap.min.css" rel="stylesheet">
	
	<link href="source/backend/css/styles.css" rel="stylesheet">
	<!--Icons-->
	<script src="source/backend/js/lumino.glyphs.js"></script>
	<link rel="stylesheet" href="source/backend/Awesome/css/all.css">
</head>
<body>
	<!-- header -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>DuongGA </span>admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{Auth::user()->name}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu"><li><a href="Admin/information"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Thông tin</a></li>
						<li><a href="Logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<!-- header -->
	<!-- sidebar left-->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
		</form>
               		<ul class="nav menu">
						<li class="active"><a href="{{route('user.list')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>  Modul User</a></li>
						<li class="active"><a href="{{route('role.list')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>  Modul Role</a></li>
						
					</ul>

	</div>
	<!--/. end sidebar left-->

	<!--main-->
	@yield('content')
	<!--end main-->

	<!-- javascript -->
	<script src="source/backend/js/jquery-1.11.1.min.js"></script>
	<script src="source/backend/js/bootstrap.min.js"></script>
	<script src="source/backend/js/chart.min.js"></script>
	<script src="source/backend/js/chart-data.js"></script>

</body>

</html>

<script>
     function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});


	function Del_Prd(prd_code){
		return confirm('Bạn muốn xóa sản phẩm có mã: '+prd_code);
	}
	function del_cat(){
		return confirm('Bạn muốn xóa danh mục sản phẩm  ');
	}


    </script>
