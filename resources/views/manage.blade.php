<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Know corona web portal</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
   <link rel="stylesheet" href="assets/css/custom.css">


</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/" class="simple-text">
                    Automated TimeTable
                </a>
            </div>

            <ul class="nav">
            <li class="">
                    <a href="/home">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="manage">
                        <i class="pe-7s-users"></i>
                        <p>Manage admin</p>
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <i class="pe-7s-file"></i>
                        <p>Create a Time Table</p>
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <i class="pe-7s-news-paper"></i>
                        <p>University</p>
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <i class="pe-7s-file"></i>
                        <p>Department</p>
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <i class="pe-7s-file"></i>
                        <p>Class</p>
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <i class="pe-7s-file"></i>
                        <p> Course</p>
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <i class="pe-7s-file"></i>
                        <p>Room</p>
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <i class="pe-7s-file"></i>
                        <p>Time Slot</p>
                    </a>
                </li>
                <li class="">
									<a class="dropdown-item" href="{{ route('logout') }}"
										 onclick="event.preventDefault();
																	 document.getElementById('logout-form').submit();">
																		 <i class="pe-7s-back"></i>
											<p>{{ __('Logout') }} </p>
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>
                </li>



            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Managing the admin</a>
                </div>

            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-md-8">
										 @if(session()->has('message'))
										<div class="alert alert-success">
												{{ session()->get('message') }}
										</div>
										@endif
                    <!-- credentials for the user -->
                    <div class="credential-div">

                        <h4>Update your Credentials</h4>
												<form method="post" action="/updateuser" enctype="multipart/form-data">
																{{ csrf_field() }}
                        <input type="email" name="user"  class="form-control" value="{{ $user[0]->email }}">
                        <input type="password" name="password" class="form-control" placeholder="Write your New Password" value="">
								        <div class="text-right">
													<button type="submit" class="btn btn-primary">
															Update User
													</button>
								        </div>

											</form>
                    </div>
                    <hr/>
										@if(session()->has('messagetwo'))
									 <div class="alert alert-success">
											 {{ session()->get('messagetwo') }}
									 </div>
									 @endif
                      <h4> Update logo and heading </h4>

                    <!-- the logo for login page -->
										<form method="post" action="/logoupload" enctype="multipart/form-data">
												{{ csrf_field() }}
                    <div class="credential-div">
                       <div class="" style="max-width: 400px;">
                        <img style="margin-bottom: 10px; height: 200px;"  src="{{ $info[0]->Path }}" alt="loading image" required>
                        <br>
                        <br>
                     </div>
                       <input type="file" class = "form-control" name ="logo" value="" required  accept="image/*" />
                    </div>

                    <!-- the title for the login page -->
                    <div class="credential-div">
                        <!-- <h4>Title of the Login Page</h4> -->
                        <input type="text" class="form-control"  name ="siteheading" value="{{ $info[0]->Heading }}" />

                     </div>
                     <div class="update-btn text-right">
                        <button type="submit" class="btn btn-primary">
                        Update Info
                        </button>
                     </div>

									 </form>

                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>

                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="/">Know Corona</a>, made with love for a better world
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
