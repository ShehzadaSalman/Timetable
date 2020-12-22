<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Automated TimeTable</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


<!-- style goes here -->

<!-- calling the style files here -->
@component('layouts.components.style')  
@endcomponent
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
  </div>
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
<div class="wrapper">
   <!-- sidebar goes here -->
   @component('layouts.components.sidebar')  
@slot('slot')
active
@endslot
@endcomponent
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

                        <h4>Edit a TimeTable Slot</h4>

									     <form method="post" action="/editslotpost" enctype="multipart/form-data">
											{{ csrf_field() }}

												@foreach($inst as $instu)
												<h5>Department: {{$instu->deptName}}</h5>
                        @endforeach
											<br>
											<!-- for the slot id -->
											@foreach($inst as $instu)
											<input type="text" style="display:none;" name="SLOTID" value="{{ $instu->slotId }}">
											@endforeach



											<span>Select the Room</span>
											<select class="form-control" id = "roomName" name="roomName" required>

												<option value=""></option>
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
											<select class="form-control" name="day" id = "day_select" required>
										    @foreach($day as $da)
												<option value="{{ $da->dayId  }}">{{ $da->dayName  }}</option>
												@endforeach
											</select>
												<br>
											<span>Select the TimeSlot</span>
										<select class="form-control" name="timeSlot" id = "timeslot_select" required>
											@foreach($time as $tim)
										<option value="{{ $tim->timeId}}">{{$tim->timeName}}</option>
										@endforeach

											</select>

                        <div class="text-right">
                        <button type="submit" class="btn btn-primary" style = "margin-top: 30px;">
                                Update
                        </button>
                        </div>

                            </form>
                    </div>
                    <hr/>
                    <div class = "instructor-list bg-white">
                    <table style = "display: none;" class="table">
                        <thead>
                        <tr>
                            <th>id</th>
														<th>deptId</th>
                            <th>Dept</th>
														<th>Semester</th>
														<th>Instruc id</th>
														<th>Instructor</th>
														<th>room id</th>
														<th>Room</th>
														<th>courseid</th>
														<th>Course</th>
														<th>TimeSlot</th>
														<th>Day</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($inst as $var)
                        <tr>
                            <td id = "slot_id"> {{ $var->slotId}}</td>
														<td id = "department_id"> {{ $var->deptId }}</td>
                            <td id = "department_name"> {{ $var->deptName }}</td>
														<td id = "semester_name"> {{ $var->semesterName}}</td>
														<td id = "instructor_id">{{ $var->instructorId  }}</td>
														<td id = "instructor_name"> {{ $var->instructorname }}</td>
														<td id = "room_id"> {{ $var->roomId}}</td>
														<td id = "room_name"> {{ $var->roomname}}</td>
														<td id = "course_id">{{ $var->courseId}}</td>
														<td id = "course_name"> {{ $var->courseName}}</td>
														<td id = "timeslot"> {{ $var->timeSlot }}</td>
														<td id = "day"> {{ $var->dayId }}</td>

                            <td>
                            <a class = "edit-btn">Edit</a> |
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

 <!-- footer goes here -->
 @component('layouts.components.footer')  
@endcomponent
    </div>
</div>


</body>

<!-- script goes here -->
   
@component('layouts.components.script')  
@endcomponent
   
    <script>

// displaying the data according to the data

// select for the room of the department


// select for the day of the week
let dayName = document.getElementById('day').innerHTML;
dayName = parseInt(dayName);
document.getElementById('day_select').value = dayName;

// select for the timeslot
let SlotName = document.getElementById('timeslot').innerHTML;
SlotName = SlotName.trim();
document.getElementById('timeslot_select').value = SlotName;


// select the instructor
let instructID = document.getElementById('instructor_id').innerHTML;
instructID = parseInt(instructID);
console.log('the id of the instructor is:' +instructID);
document.getElementById('InstructorName').value = instructID;

// select the course
let courseID = document.getElementById('course_id').innerHTML;
courseID = parseInt(courseID);
console.log('the id of the course is:' +courseID);
document.getElementById('courseName').value = courseID;


// select for the department
let departmentID = document.getElementById('department_id').innerHTML;
let newdeptID = parseInt(departmentID);



     $(document).ready(function () {
			 let roomName = document.getElementById('room_id').innerHTML;
			 roomName = parseInt(roomName);
			 $.ajax({url: "/ajaxrequestroom/" +newdeptID , success: function(result){
				 $("#roomName").empty(); // empty the list
				for(let i =0; i< result.length; i++){ // append new options to the select element
					$("#roomName").append("<option value = "+result[i].roomid+">"+result[i].roomname+"</option>");
				}
				document.getElementById('roomName').value = roomName; // show the selected room
			}});






			 $.ajax({url: "/ajaxrequestsemester/" +newdeptID , success: function(result){
	 		$("#semesterName").empty(); // empty the list
	 		for(let i =0; i< result.length; i++){ // append new options to the select element
	 			$("#semesterName").append("<option value = "+result[i].semesterId+">"+result[i].semesterName+"</option>");
	 		}
	 	 }});


			 $("#departmentName").change(function(){
				 var id = $(this).children("option:selected"). val(); // get value of the selected option
           // for the rooms options

          // for the semesters of the department


			 });

     });
    </script>


</html>
