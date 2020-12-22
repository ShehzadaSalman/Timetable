<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Automated Time Table</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


   <!-- styles -->

<!-- calling the style files here -->
@component('layouts.components.style')  
@endcomponent
</head>
<body>

<div class="wrapper">
   <!-- sidebar -->
   @component('layouts.components.sidebar')  
@slot('manage')
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

<!-- the page content starts here -->


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

                        <h4>Update your Credentials</h4>
												<form method="post" action="/updateuser" enctype="multipart/form-data">
																{{ csrf_field() }}
                        <input type="email" name="user"  class="form-control" value="{{ $user[0]->email }}">
                        <input type="password" name="password" class="form-control" placeholder="Write your New Password" value="">
								        <div class="text-right">
													<button type="submit" class="btn btn-primary">
															Update User
													</button>
								        </div>

											</form>
                    </div>
                    <hr/>
										@if(session()->has('messagetwo'))
									 <div class="alert alert-success">
											 {{ session()->get('messagetwo') }}
									 </div>
									 @endif
                      <h4> Update logo and heading </h4>

                    <!-- the logo for login page -->
										<form method="post" action="/logoupload" enctype="multipart/form-data">
												{{ csrf_field() }}
                    <div class="credential-div">
                       <div class="" style="max-width: 400px;">
                        <img style="margin-bottom: 10px; height: 200px;"  src="{{ $info[0]->Path }}" alt="loading image" required>
                        <br>
                        <br>
                     </div>
                       <input type="file" class = "form-control" name ="logo" value="" required  accept="image/*" />
                    </div>

                    <!-- the title for the login page -->
                    <div class="credential-div">
                        <!-- <h4>Title of the Login Page</h4> -->
                        <input type="text" class="form-control"  name ="siteheading" value="{{ $info[0]->Heading }}" />

                     </div>
                     <div class="update-btn text-right">
                        <button type="submit" class="btn btn-primary">
                        Update Info
                        </button>
                     </div>

									 </form>

                    </div>
                </div>
<!--- the page content ends here -->


@component('layouts.components.footer')  
@endcomponent




<!-- footer -->

</div>
</div>


</body>

 <!-- scripts -->
 @component('layouts.components.script')  
@endcomponent



</html>
