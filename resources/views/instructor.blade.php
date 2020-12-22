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
          <h4 class="modal-title">Edit the Instructor</h4>
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
   <!-- sidebar goes here -->
   @component('layouts.components.sidebar')  
@slot('instructor')
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
                    <a class="navbar-brand" href="#">Managing the Instructor</a>
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

                        <h4>Create a new Instructor</h4>

	     <form method="post" action="/instructor" enctype="multipart/form-data">
			{{ csrf_field() }}
                        <input type="text" name="instructorName"  class="form-control"
                        placeholder = "create a new Instructor" required>

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
                            <th>Full Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($inst as $var)
                        <tr>
                            <td class = "instructor_id"> {{ $var->instrutorId}}</td>
                            <td class = "instructor_name"> {{ $var->instructorname }}</td>
                            <td>
                            <a class = "edit-btn">Edit</a> |
                            <a href="deleteinstructor/{{$var->instrutorId}}">Delete</a>
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

     <!-- footer goes here  -->

    </div>
</div>


</body>

  <!-- script goes here  -->
  @component('layouts.components.script')  
@endcomponent
    <script>

     $(document).ready(function () {

$('.edit-btn').click(function () {
// $("#editSurveyModal").modal()
var title_name =   $(this).parent().parent().find('.instructor_name').html();
var title_id = $(this).parent().parent().find('.instructor_id').html();

$('#editInstructorName').val(title_name);
$('#edit-form').attr('action' ,'editinstructor/' +title_id);
$("#editModal").modal();


});

});


    </script>


</html>
