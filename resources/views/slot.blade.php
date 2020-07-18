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
          <h4 class="modal-title">Edit the TimeTable Slot</h4>
        </div>
        <div class="modal-body">
        <form id ="edit-form" method="post" action="" enctype="multipart/form-data">
					{{ csrf_field() }}
				<input type="text" name="instructorName" id="editInstructorName" placeholder="Write Survey Title" class="form-control" required>

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
                <a href="home" class="simple-text">
                    Automated TimeTable
                </a>
            </div>

            <ul class="nav">
            <li class="">
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
                <li class="active">
                    <a href="slot">
                        <i class="pe-7s-note2"></i>
                        <p>Create a TimeTable Slot</p>
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
                    <a class="navbar-brand" href="#">Managing the TimeTable Slot</a>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-md-10">
                    @if(session()->has('message'))
                <div class="alert alert-success">
                        {{ session()->get('message') }}
                </div>
                @endif
                    <!-- credentials for the user -->
                    <div class="credential-div">

                        <h4>Create a new TimeTable Slot</h4>

									     <form method="post" action="/slot" enctype="multipart/form-data">
											{{ csrf_field() }}
											<span syle = "">Select a Department</span>
											<select class="form-control" id = "departmentName" name="departmentName" required>
												<option value="">Choose a department</option>
												@foreach($dept as $dep)
												<option value="{{ $dep->deptId }}">{{$dep->deptName}}</option>
                        @endforeach
											</select>
											<br>
											<span>Select the Room</span>
											<select class="form-control" id = "roomName" name="roomName" required>

											</select>
                    	<br>
											<span>Select the Instructor</span>
											<select class="form-control" name="instructorName" id = "InstructorName" required>
												@foreach($teacher as $teach)
												<option value="{{ $teach->instrutorId}}">{{$teach->instructorname }}</option>
                        @endforeach
											</select>
											<br>
											<span>Select the Course</span>
											<select class="form-control" name="courseName" id = "courseName" required>
												@foreach($course as $cou)
												<option value="{{ $cou->courseId}}">{{$cou->courseName }}</option>
												@endforeach
											</select>
											<br>
											<span>Select the Semester</span>
											<select class="form-control" id = "semesterName" name="semesterName" required>
												<option value=""></option>
											</select>
											<br>
											<span>Select the Day of the week</span>
											<select class="form-control" name="day" required>
												<option value="Monday">Monday</option>
												<option value="Tuesday">Tuesday</option>
												<option value="Wednesday">Wednesday</option>
												<option value="Thursday">Thursday</option>
												<option value="Friday">Friday</option>
												<option value="Saturday">Saturday</option>
												<option value="Sunday">Sunday</option>
											</select>
												<br>
											<span>Select the TimeSlot</span>
										<select class="form-control" name="timeSlot" required>
										<option value="08:00AM">08:00AM</option>
										<option value="08:40AM">08:40AM</option>
										<option value="09:20AM">09:20AM</option>
										<option value="10:00AM">10:00AM</option>
										<option value="10:40AM">10:40AM</option>
										<option value="11:20AM">11:20AM</option>
										<option value="12:00PM">12:00PM</option>
										<option value="12:40PM">12:40PM</option>
										<option value="01:20PM">01:20PM</option>
										<option value="02:00PM">02:00PM</option>
										<option value="02:40PM">02:40PM</option>
										<option value="03:00PM">03:00PM</option>
										<option value="03:40PM">03:40PM</option>
										<option value="04:20PM">04:20PM</option>
										<option value="05:00PM">05:00PM</option>
										<option value="05:40PM">05:40PM</option>
										<option value="06:20PM">06:20PM</option>
										<option value="07:00PM">07:00PM</option>
										<option value="07:40PM">07:40PM</option>

											</select>

                        <div class="text-right">
                        <button type="submit" class="btn btn-primary" style = "margin-top: 30px;">
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
                            <th>Department</th>
														<th>Semester</th>
														<th>Instructor</th>
														<th>Room</th>
														<th>Course</th>
														<th>TimeSlot</th>
														<th>Day</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($inst as $var)
                        <tr>
                            <td class = "slot_id"> {{ $var->slotId}}</td>
                            <td class = "department_name"> {{ $var->deptName }}</td>
														<td class = "slot_id"> {{ $var->semesterName}}</td>
														<td class = "department_name"> {{ $var->instructorname }}</td>
														<td class = "slot_id"> {{ $var->roomname}}</td>
														<td class = "slot_id"> {{ $var->courseName}}</td>
														<td class = "department_name"> {{ $var->timeSlot }}</td>
														<td class = "department_name"> {{ $var->Day }}</td>

                            <td>
                            <a href = "editslot/{{$var->slotId}}">Edit</a> |
                            <a href="deleteslot/{{$var->slotId}}">Delete</a>
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
  <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <script>
     $(document).ready(function () {

			 $("#departmentName").change(function(){
				 var id = $(this).children("option:selected"). val(); // get value of the selected option
           // for the rooms options
				 $.ajax({url: "ajaxrequestroom/" +id , success: function(result){
					 $("#roomName").empty(); // empty the list
          for(let i =0; i< result.length; i++){ // append new options to the select element
            $("#roomName").append("<option value = "+result[i].roomid+">"+result[i].roomname+"</option>");
					}
			   }});
          // for the semesters of the department
					$.ajax({url: "ajaxrequestsemester/" +id , success: function(result){
					$("#semesterName").empty(); // empty the list
	 				for(let i =0; i< result.length; i++){ // append new options to the select element
	 					$("#semesterName").append("<option value = "+result[i].semesterId+">"+result[i].semesterName+"</option>");
	 				}
	 			 }});


			 });

     });
    </script>


</html>
