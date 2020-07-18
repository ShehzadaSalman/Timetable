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
                <a href="home" class="simple-text">
                    Automated TimeTable
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="home">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="manage">
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
                    <a href="instructor">
                        <i class="pe-7s-users"></i>
                        <p>Instructor</p>
                    </a>
                </li>
                <li class="">
                    <a href="department">
                        <i class="pe-7s-culture"></i>
                        <p>Department</p>
                    </a>
                </li>
                <li class="">
                    <a href="semester">
                        <i class="pe-7s-bookmarks"></i>
                        <p>Semester</p>
                    </a>
                </li>
                <li class="">
                    <a href="course">
                        <i class="pe-7s-notebook"></i>
                        <p> Course</p>
                    </a>
                </li>
                <li class="">
                    <a href="room">
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


<div class="testing-data">
	<!-- @foreach($result as $res)
	<h5>{{ $res->Day}}</h5>
	@endforeach
 -->

	<table width = "500px;"  cellspacing = "0px;">
		<thead>
		<tr>
			<th></th>
				<th>Monday</th>
				<th>Tuesday</th>
				<th>Wednesday</th>
				<th>Thursday</th>
				<th>Friday</th>
				<th>Saturday</th>
				<th>Sunday</th>

		</tr>
		</thead>
			<?php

			for ($x=0; $x < 8; $x++) {
					echo "<tr>";
					for ($y=0; $y < 8; $y++) {
					 $total = $x + $y;

					 if($total%2 == 0){
					 echo "<td height=50px width=50px bgcolor=#ffffff ></td>";
					 }else{
						echo "<td height=50px width=50px bgcolor=#000000 ></td>";
					 }


					}
					echo "</tr>";
			}


?>
	</table>
</div>



<div class="second-table">
	<table class = "table">
		<thead>
		<tr>
			<th></th>
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
			@for($i = 0; $i < 8; $i++)
        <tr>
			@for($a = 0; $a < 8; $a++)
          <td>

@foreach($result as $res)
{{ $res->deptName  }}
@endforeach
					</td>
				@endfor
       </tr>
			@endfor

		</tbody>

	</table>

</div>
        <div class="content div-box-dashboard">
<!-- displaying the  time table here -->
<table class="table">
	<thead>
	<tr>
		<th></th>
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
        <tr>
          <th>08:00AM</th>
          <td>
						@if($result[0]->Day == 'Wednesday' && $result[0]->timeSlot == '11:20AM')
											<h4>This is wednesday</h4>
						@endif
					</td>
        	<td>2</td>
        	<td>3</td>
					<td>4</td>
					<td>5</td>
					<td></td>
					<td></td>
        </tr>
<tr>
			<th>08:40AM</th>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
			<td></td>
			<td></td>
		</tr>
<tr>
		<th>09:20AM</th>
		<td>1</td>
		<td>2</td>
		<td>3</td>
		<td>4</td>
		<td>5</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
	<th>10:00AM</th>
	<td>1</td>
	<td>2</td>
	<td>3</td>
	<td>4</td>
	<td>5</td>
	<td></td>
	<td></td>
</tr>
<tr>
<th>10:40AM</th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td></td>
<td></td>
</tr>
<tr>
<th>11:20AM</th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td></td>
<td></td>
</tr>
<tr>
<th>12:00PM</th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td></td>
<td></td>
</tr>

<tr>
<th>12:40PM</th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td></td>
<td></td>
</tr>

<tr>
<th>01:20PM</th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td></td>
<td></td>
</tr>

<tr>
<th>02:00PM</th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td></td>
<td></td>
</tr>

<tr>
<th>02:40PM</th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td></td>
<td></td>
</tr>

<tr>
<th>03:00PM</th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td></td>
<td></td>
</tr>

<tr>
<th>03:40PM</th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td></td>
<td></td>
</tr>

<tr>
<th>04:20PM</th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td></td>
<td></td>
</tr>
<tr>
<th>05:00PM</th>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td></td>
<td></td>
</tr>

    </tbody>
</table>

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
