<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Beverages Admin | Edit Category</title>

	<!-- Bootstrap -->
	<link href="{{ asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="{{ asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<!-- NProgress -->
	<link href="{{ asset('assets/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
	<!-- iCheck -->
	<link href="{{ asset('assets/admin/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="{{ asset('assets/admin/vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
	<!-- Select2 -->
	<link href="{{ asset('assets/admin/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
	<!-- Switchery -->
	<link href="{{ asset('assets/admin/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
	<!-- starrr -->
	<link href="{{ asset('assets/admin/vendors/starrr/dist/starrr.css') }}" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="{{ asset('assets/admin/build/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="{{ route('main') }}" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Beverages Admin</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="{{ asset('assets/admin/images/img.jpg') }}" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2>{{ Auth::user()->name }}</h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('home') }}">Users List</a></li>
										<li><a href="{{ route('addUser') }}">Add User</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-edit"></i> Categories <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('addCategory') }}">Add Category</a></li>
										<li><a href="{{ route('categories') }}">Categories List</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-desktop"></i> Beverages <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('addBeverage') }}">Add Beverage</a></li>
										<li><a href="{{ route('beverages') }}">Beverages List</a></li>
									</ul>
								</li> 
								<li><a><i class="fa fa-desktop"></i> Messages <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('messages') }}">Messages List</a></li>
									</ul>
								</li>
							</ul>
						</div>

					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<img src="{{ asset('assets/admin/images/img.jpg') }}" alt="">{{ Auth::user()->name }}
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="javascript:;"> Profile</a>
									<a class="dropdown-item" href="javascript:;">
										<span class="badge bg-red pull-right">50%</span>
										<span>Settings</span>
									</a>
									<a class="dropdown-item" href="javascript:;">Help</a>
									<a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
								</div>
							</li>

							<li role="presentation" class="nav-item dropdown open">
								<a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-envelope-o"></i>
									<span class="badge bg-green">{{$unreadMessages}}</span>
								</a>
								<ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
									@foreach($messages as $message)
										@if(!$message->is_read)
											<li class="nav-item">
												<a href="{{ route('showMessage', $message->id) }}" class="dropdown-item">
													<span class="image"><img src="{{ asset('assets/admin/images/img.jpg') }}" alt="Profile Image" /></span>
													<span>
														<span>{{$message->name}}</span>
														<!-- <span class="time">3 mins ago</span> -->
													</span>
													<span class="message">
													{{ Str::limit($message->message, 30) }}
													</span>
												</a>
											</li>
										@endif
									@endforeach
									<li class="nav-item">
										<div class="text-center">
											<a href="{{ route('messages') }}" class="dropdown-item">
												<strong>See All Alerts</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Edit Category</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit Category</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" method="POST" action="{{ route('updateCategories', $category->id) }}" data-parsley-validate class="form-horizontal form-label-left">
									@csrf
									@method('put')
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="add-category">Edit Category <span class="required">*</span>
											</label>
											<p style="color: red">
												@error('category_name')
													{{ $message }}
												@enderror
											</p>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="add-category" name="category_name" value="{{ old('category_name', $category->category_name) }}" required="required" class="form-control ">
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary"><a href="{{ route('categories') }}"></a> Cancel</button>
												<button type="submit" class="btn btn-success">Update</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<footer>
				<div class="pull-right">
					Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
	<script src="{{ asset('assets/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('assets/admin/vendors/fastclick/lib/fastclick.js') }}"></script>
	<!-- NProgress -->
	<script src="{{ asset('assets/admin/vendors/nprogress/nprogress.js') }}"></script>
	<!-- bootstrap-progressbar -->
	<script src="{{ asset('assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
	<!-- iCheck -->
	<script src="{{ asset('assets/admin/vendors/iCheck/icheck.min.js') }}"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="{{ asset('assets/admin/vendors/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="{{ asset('assets/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/google-code-prettify/src/prettify.js') }}"></script>
	<!-- jQuery Tags Input -->
	<script src="{{ asset('assets/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
	<!-- Switchery -->
	<script src="{{ asset('assets/admin/vendors/switchery/dist/switchery.min.js') }}"></script>
	<!-- Select2 -->
	<script src="{{ asset('assets/admin/vendors/select2/dist/js/select2.full.min.js') }}"></script>
	<!-- Parsley -->
	<script src="{{ asset('assets/admin/vendors/parsleyjs/dist/parsley.min.js') }}"></script>
	<!-- Autosize -->
	<script src="{{ asset('assets/admin/vendors/autosize/dist/autosize.min.js') }}"></script>
	<!-- jQuery autocomplete -->
	<script src="{{ asset('assets/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
	<!-- starrr -->
	<script src="{{ asset('assets/admin/vendors/starrr/dist/starrr.js') }}"></script>
	<!-- Custom Theme Scripts -->
	<script src="{{ asset('assets/admin/build/js/custom.min.js') }}"></script>

</body></html>
