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
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">

                </div>
            </div>
        </nav>





        <div class="content div-box-dashboard">
<!-- displaying the  time table here -->
<div style = "width: 70px;">
<table class = "table table-bordered table-responsive">
	<thead>
		<tr>
			<th>Time</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td>
				<div style = "height: 130px;">
					08:00AM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					09:00AM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					10:00AM
				</div>

			</td>
		</tr>
		<tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					11:00AM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					12:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					01:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					02:00PM
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					03:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					04:00PM
				</div>

			</td>
		</tr>
		<tr>
			<td>
				<div style = "height: 130px;">
					05:00PM
				</div>

			</td>
		</tr>

	</tbody>

</table>
</div>
<div class="second-table">
	<table class = "table table-responsive table-bordered">
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
			@for($i = 1; $i < 11; $i++) <!-- checking timeslot -->
        <tr>
			@for($a = 1; $a < 8; $a++)  <!-- checking day or whatever -->
          <td class = "">
						<div style="height: 130px; width: 100%;" class="text-center">
							@foreach($result as $res)
							@if($res->timeSlot == $i && $res->Day == $a)
						      Department:	{{ $res->deptName  }}
							<ul style="margin:0; padding:0; list-style: none;" >
								<li>Instructor: {{ $res->instructorname}} </li>
								<li>Room: {{$res->roomname}}</li>
								<li>Course: {{$res->courseName}}</li>

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
