<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Automated TimeTable</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

  <!-- style -->
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
          <h4 class="modal-title">Update the Room</h4>
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
  </div>
<div class="wrapper">
    <!-- sidebar -->
    @component('layouts.components.sidebar')  
@slot('room')
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
                    <a class="navbar-brand" href="#">Managing ClassRooms</a>
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

                        <h4><strong>Add A New Room</strong></h4>
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
                            <td class = "room_id"> {{ $loop->index + 1 }} </td>
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
@component('layouts.components.footer')  
@endcomponent

   <!-- footer -->

    </div>
</div>


</body>


<!-- scripts -->
@component('layouts.components.script')  
@endcomponent

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
