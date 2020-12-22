<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Automated Time Table</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


<!-- styles go here -->

<!-- calling the style files here -->
@component('layouts.components.style')  
@endcomponent
</head>
<body>

<div class="wrapper">
 <!-- sidebar goes here -->
 @component('layouts.components.sidebar')  
@slot('dashboard')
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
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">

                </div>
            </div>
        </nav>




<div class="content container-fluid">
<h3>Your TimeTables Are Listed here!</h3>
<hr>
@if(session()->has('message'))
<div class="alert alert-success">
		{{ session()->get('message') }}
</div>
@endif
<div class="row">


@if($timetable->isEmpty())
<div class="Text-center" style = "padding-top: 30px; padding-bottom: 30px;">
    <p class  ="text-center">There are no Timetables created yet <br>
		<a href ="/slot">Click here</a> to create a timeslot for your Time Table </p>
</div>
@endif

	@foreach($timetable as $time)
<div class="col-md-3  col-lg-4">
	<div class="timetable-card well" style = "padding: 20px;">
		
          <h5 class = "mt-0"> <strong>Class Name:</strong> 
         
          {{$time->semesterName}}</h5>   
         
		   
			 <!-- <h5>
             <strong>Class:</strong>   {{$time->semesterName}}
             </h5> -->
              <a href="/timetable/{{$time->semesterId}}">
	       <button type = "button" class = "btn btn-primary">View</button>
			</a>
			<a href="/timetableremove/{{$time->semesterId}}">
				<button type = "button" class = "btn btn-secondary">Remove</button>
			</a>

	</div>
</div>
@endforeach

</div>



@component('layouts.components.footer')  
@endcomponent
<!-- footer goes here -->

    </div>
</div>


</body>

  <!-- scripts goes here -->

  @component('layouts.components.script')  
@endcomponent


</html>
