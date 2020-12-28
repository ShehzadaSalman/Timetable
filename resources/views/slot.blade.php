<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>TimeTable Maker</title>

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
<div class="wrapper">
 <!-- sidebar goes here  -->
 @component('layouts.components.sidebar')  
@slot('timetable')
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
                   <div class="col-md-12">
                    @if(session()->has('message'))
                <div class="alert alert-success">
                        {{ session()->get('message') }}
                </div>
                @endif
                    <!-- credentials for the user -->
                    <div class="credential-div">

                        <h4 class = "">
                            <strong>
                              Create A New Slot
                            </strong>
                          </h4>

									     <form method="post" action="/slot" enctype="multipart/form-data">
											{{ csrf_field() }}
										
									 
                    <div class="row">
                      <div class="col-md-6 mb-3">
                      <span syle = "">Select a Department</span>
                      <select class="form-control" id = "departmentName" name="departmentName" required>
												<option value="">Choose a department</option>
												@foreach($dept as $dep)
												<option value="{{ $dep->deptId }}">{{$dep->deptName}}</option>
                        @endforeach
											</select>
                      </div>
                      <div class="col-md-6 mb-3">
                      	<span>Select the Room</span>
											<select class="form-control" id = "roomName" name="roomName" required>
                    	</select>
                      </div>

                      <div class="col-md-6 mb-3">
                      <span>Select the Teacher</span>
											<select class="form-control" name="instructorName" id = "InstructorName" required>
												@foreach($teacher as $teach)
												<option value="{{ $teach->instrutorId}}">{{$teach->instructorname }}</option>
                        @endforeach
											</select>
                      </div>
                    
                      <div class="col-md-6 mb-3">
                      <span>Select the Subject</span>
											<select class="form-control" name="courseName" id = "courseName" required>
												@foreach($course as $cou)
												<option value="{{ $cou->courseId}}">{{$cou->courseName }}</option>
												@endforeach
											</select>
                      </div>


                      <div class="col-md-6 mb-3">
                      <span>Select the Class</span>
											<select class="form-control" id = "semesterName" name="semesterName" required>
												<option value=""></option>
											</select>
                      </div>


                      <div class="col-md-6 mb-3">
                      <span>Select the Day of the week</span>
											<select class="form-control" name="day" required>
												@foreach($day as $da)
												<option value="{{$da->dayId}}">{{ $da->dayName }}</option>
												@endforeach
											</select>
                      </div>

                      <div class="col-md-12 mb-3">
                      <span>Select the TimeSlot</span>
										<select class="form-control" name="timeSlot" required>
											@foreach($time as $ti)
									   	<option value="{{$ti->timeId}}">{{ $ti->timeName}}</option>
							        @endforeach
											</select>
                      </div>


                    
                    </div>
                  
              
									
                 
								
							

							

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
                            <td class = "slot_id">{{ $loop->index + 1 }}</td>
                            <td class = "department_name"> {{ $var->deptName }}</td>
														<td class = "slot_id"> {{ $var->semesterName}}</td>
														<td class = "department_name"> {{ $var->instructorname }}</td>
														<td class = "slot_id"> {{ $var->roomname}}</td>
														<td class = "slot_id"> {{ $var->courseName}}</td>
														<td class = "department_name"> {{ $var->timeName }}</td>
														<td class = "department_name"> {{ $var->dayName }}</td>

                            <td>
                            <a class = "edit-btn" href = "editslot/{{$var->slotId}}">Edit</a> |
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
     $(document).ready(function () {

			 $("#departmentName").change(function(){
				 var id = $(this).children("option:selected"). val(); // get value of the selected option
           // for the rooms options
				 $.ajax({url: "/ajaxrequestroom/" +id , success: function(result){
					 $("#roomName").empty(); // empty the list
          for(let i =0; i< result.length; i++){ // append new options to the select element
            $("#roomName").append("<option value = "+result[i].roomid+">"+result[i].roomname+"</option>");
					}
			   }});
          // for the semesters of the department
					$.ajax({url: "/ajaxrequestsemester/" +id , success: function(result){
					$("#semesterName").empty(); // empty the list
	 				for(let i =0; i< result.length; i++){ // append new options to the select element
	 					$("#semesterName").append("<option value = "+result[i].semesterId+">"+result[i].semesterName+"</option>");
	 				}
	 			 }});


			 });

     });
    </script>


</html>
