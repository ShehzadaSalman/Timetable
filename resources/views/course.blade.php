<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Automated TimeTale</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

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
          <h4 class="modal-title">Update the Subject</h4>
        </div>
        <div class="modal-body">
        <form id ="edit-form" method="post" action="" enctype="multipart/form-data">
					{{ csrf_field() }}
				<input type="text" name="courseName" id="editCourseName" placeholder="Write Course Title" class="form-control" required>
          <textarea name="courseDescription" cols="80" class="form-control" id = "editCourseDescription" required></textarea>
			<button type="submit" class="btn btn-default"  style = "margin-top: 20px;" >Update</button>
				</form>

        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
<div class="wrapper">
<!-- calling the sideba component here -->
@component('layouts.components.sidebar')  
@slot('course')
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
                    <a class="navbar-brand" href="#">Managing the Subject</a>
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
                            <h4>
                              <strong>Add A New Subject </strong>
                            </h4>
			     <form method="post" action="/course" enctype="multipart/form-data">
					{{ csrf_field() }}
		                    <input type="text" name="courseName"  class="form-control"
		                     placeholder = "create a new Course" required>
                        <textarea name="courseDescription" cols="80" class="form-control" required> A little description about the course</textarea>
                        <div class="text-right">
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">
                                Submit
                        </button>
                        </div>

          </form>
                    </div>
                    <hr/>
                    <div class = "instructor-list bg-white">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
														<th>description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($inst as $var)
                        <tr>
                            <td class = "course_id"> {{ $var->courseId}}</td>
                            <td class = "course_title"> {{ $var->courseName }}</td>
														<td class = "course_description"> {{ $var->courseDescription }}</td>
                            <td>
                            <a class = "edit-btn">Edit</a> |
                            <a href="deletecourse/{{$var->courseId}}">Delete</a>
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

   

    </div>
</div>




</body>
<!-- calling the scripts here -->
<!-- calling the style files here -->
@component('layouts.components.script')  
@endcomponent
    <script>

     $(document).ready(function () {
$('.edit-btn').click(function () {
// $("#editSurveyModal").modal()
var title_name =   $(this).parent().parent().find('.course_title').html();
var title_description =   $(this).parent().parent().find('.course_description').html();
var title_id = $(this).parent().parent().find('.course_id').html();
$('#editCourseName').val(title_name);
$('#editCourseDescription').val(title_description);
$('#edit-form').attr('action' ,'editcourse/' +title_id);
$("#editModal").modal();


});

});


    </script>


</html>
