<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Automated Time Table</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
   <link rel="stylesheet" href="/assets/css/custom.css">


</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="/assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="home" class="simple-text">
                    Automated TimeTable
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/home">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="/manage">
                        <i class="pe-7s-user"></i>
                        <p>Manage admin</p>
                    </a>
                </li>
                <li class="">
                    <a href="/slot">
                        <i class="pe-7s-note2"></i>
                        <p>Create a Time Table</p>
                    </a>
                </li>
                <li class="">
                    <a href="/instructor">
                        <i class="pe-7s-users"></i>
                        <p>Instructor</p>
                    </a>
                </li>
                <li class="">
                    <a href="/department">
                        <i class="pe-7s-culture"></i>
                        <p>Department</p>
                    </a>
                </li>
                <li class="">
                    <a href="/semester">
                        <i class="pe-7s-bookmarks"></i>
                        <p>Semester</p>
                    </a>
                </li>
                <li class="">
                    <a href="/course">
                        <i class="pe-7s-notebook"></i>
                        <p> Course</p>
                    </a>
                </li>
                <li class="">
                    <a href="/room">
                        <i class="pe-7s-box2"></i>
                        <p>Room</p>
                    </a>
                </li>

                <li class="">
                    <!-- <a href="/">

                        <p>log out</p>
                    </a> -->
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
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">

                </div>
            </div>
        </nav>





        <div class="content div-box-dashboard">
<!-- displaying the  time table here -->
<div style = "width: 70px;">
<table class = "table table-bordered table-responsive">
	<thead>
		<tr>
			<th>Time</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td>
				<div style = "height: 130px;">
					08:00AM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					09:00AM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					10:00AM
				</div>

			</td>
		</tr>
		<tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					11:00AM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					12:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					01:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					02:00PM
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					03:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					04:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					05:00PM
				</div>

			</td>
		</tr>

	</tbody>

</table>
</div>
<div class="second-table">
	<table class = "table table-responsive table-bordered">
		<thead>
		<tr>

				<th>Monday</th>
				<th>Tuesday</th>
				<th>Wednesday</th>
				<th>Thursday</th>
				<th>Friday</th>
				<th>Saturday</th>
				<th>Sunday</th>
		</tr>
		</thead>
		<tbody>
			@for($i = 1; $i < 11; $i++) <!-- checking timeslot -->
        <tr>
			@for($a = 1; $a < 8; $a++)  <!-- checking day or whatever -->
          <td class = "">
						<div style="height: 130px; width: 100%;" class="text-center">
							@foreach($result as $res)
							@if($res->timeSlot == $i && $res->Day == $a)
						      Department:	{{ $res->deptName  }}
							<ul style="margin:0; padding:0; list-style: none;" >
								<li>Instructor: {{ $res->instructorname}} </li>
								<li>Room: {{$res->roomname}}</li>
								<li>Course: {{$res->courseName}}</li>

							</ul>
							@else

							@endif
							@endforeach
						</div>
					</td>
				@endfor
       </tr>
			@endfor

		</tbody>

	</table>

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
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="">Automated TimeTable</a>, made for a better world
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>




</html>
