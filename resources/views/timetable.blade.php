<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Automated Time Table</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

<!-- style goes here  -->
<!-- calling the style files here -->
@component('layouts.components.style')  
@endcomponent

</head>
<body>
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
<div class="wrapper">
<!-- sidebar goes here -->
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
                    <a class="navbar-brand" href="#">TimeTable</a>
                </div>
                <div class="collapse navbar-collapse">

                </div>
            </div>
        </nav>


<div class="content div-box-dashboard">
<!-- displaying the  time table here -->


<div class="" style="display:flex; overflow: hidden;">
<table   id="timing-table" style="width: 80px;" class = "table table-bordered  background-white">
	<thead>
		<tr>
			<th>Time</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td>
				<div style = "height: 100px; display: flex; justify-content:center; align-items:center; ">
					08:00AM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 100px;  display: flex; justify-content:center; align-items:center; ">
					09:00AM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 100px;  display: flex; justify-content:center; align-items:center;">
					10:00AM
				</div>

			</td>
		</tr>
		<tr>
		<tr>
			<td>
				<div style = "height: 100px;  display: flex; justify-content:center; align-items:center;">
					11:00AM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 100px;  display: flex; justify-content:center; align-items:center;">
					12:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 100px;  display: flex; justify-content:center; align-items:center;">
					01:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 100px;  display: flex; justify-content:center; align-items:center;">
					02:00PM
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 100px;  display: flex; justify-content:center; align-items:center;">
					03:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 100px;  display: flex; justify-content:center; align-items:center;">
					04:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 100px;  display: flex; justify-content:center; align-items:center;">
					05:00PM
				</div>

			</td>
		</tr>

	</tbody>

</table> 

<div class="second-table table-responsive">
	<table class = "table table-bordered table-striped background-white">
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
			@for($i = 1; $i < 11; $i++) 
        <tr>
			@for($a = 1; $a < 8; $a++) 
          <td class = "">
						<div  style=" height: 100px;  display: flex; justify-content: center; flex-direction: column; align-items: center;">
							@foreach($result as $res)
							@if($res->timeSlot == $i && $res->Day == $a)
						      <strong>Department</strong> 	{{ $res->deptName  }}
							<ul style="margin:0; padding:0; list-style: none;" >
								<li><strong>Teacher:</strong>  {{ $res->instructorname}} </li>
								<li> <strong>Room:</strong> {{$res->roomname}}</li>
								<li> <strong>Subject:</strong>  {{$res->courseName}}</li>
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





  
        </div>


 <!-- footer goes here -->
 @component('layouts.components.footer')  

@endcomponent
    </div>
</div>


</body>

  <!-- script goes here -->

  @component('layouts.components.script')  
@endcomponent


</html>
