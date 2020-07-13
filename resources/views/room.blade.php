<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Automated TimeTable</title>

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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit the Room</h4>
        </div>
        <div class="modal-body">
        <form id ="edit-form" method="post" action="" enctype="multipart/form-data">
					{{ csrf_field() }}
                    <select name="departmentName" id="editDepartmentName" class = "form-control">
                    @foreach($dept as $dep)
                        <option value="{{$dep->deptId}}">{{ $dep->deptName }}</option>
                   @endforeach
                    </select>
			<br>
                <input type="text" name="roomName" id="editRoomName"  class="form-control" required>

			<button type="submit" class="btn btn-default">Update</button>
				</form>


        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><
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
                <li class="">
                    <a href="manage">
                        <i class="pe-7s-user"></i>
                        <p>Manage admin</p>
                    </a>
                </li>
                <li class="">
                    <a href="#">
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
                <li class="active">
                    <a href="room">
                        <i class="pe-7s-box2"></i>
                        <p>Room</p>
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
                    <a class="navbar-brand" href="#">Managing the Rooms</a>
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

                        <h4>Create a new Room</h4>
	     <form method="post" action="/room" enctype="multipart/form-data">
			{{ csrf_field() }}
                        <select name="departmentID" id="departmentName" class = "form-control">
                        @foreach($dept as $dep)
                        <option value="{{$dep->deptId}}">{{ $dep->deptName }}</option>
                        @endforeach
                        </select>
                        <span style = "color: #8e8e8e; padding-left: 20px;">Select the department for this room</span>
                        <input style = " margin-top: 20px;"
                            type="text" name="roomName"  class="form-control"
                        placeholder = "Name of the Room" required>


                        <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                                Submit
                        </button>
                        </div>

                            </form>
                    </div>
                    <hr/>
                    <div class = "instructor-list">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Department Name</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($inst as $var)
                        <tr>
                            <td class = "room_id"> {{ $var->ID}} </td>
                            <td class = "department_id" style ="display: none;"> {{ $var->DEPTID }}</td>
                            <td class = "department_name">{{ $var->DEPARTMENT}}</td>
                            <td class = "room_name"> {{ $var->NAME}}</td>
                            <td>
                            <a class = "edit-btn">Edit</a> |
                            <a href="deleteroom/{{$var->ID}}">Delete</a>
                            </td>
                        </tr>

                    @endforeach
                        </tbody>
                    </table>


                    </div>




                    </div>
                </div>
            </div>
        </div>
<!-- Modal -->


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>

                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="/">Automated TimeTable</a>, made with love for a better world
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <script>

     $(document).ready(function () {

$('.edit-btn').click(function () {

var dept_id =   $(this).parent().parent().find('.department_id').html();
var dept_name = $(this).parent().parent().find('.department_name').html();
var room_id = $(this).parent().parent().find('.room_id').html();
var room_name = $(this).parent().parent().find('.room_name').html();

var department_id = parseInt(dept_id);

$('#editRoomName').val(room_name);
$('#editDepartmentName').val(department_id);
$('#edit-form').attr('action' ,'editroom/' +room_id);
$("#editModal").modal();


});

});


    </script>


</html>
