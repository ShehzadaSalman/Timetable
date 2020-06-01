<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Automated TimeTable</title>
      <!-- Bootstrap core CSS     -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Bootstrap core CSS     -->

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
  <!-- main div starts here-->
<div class="main">



<div class="container-fluid2">
<div class="login-container">
    <div class="login-div">
        <!-- title of the page starts here -->
        <h2 class="text-center">{{ $info[0]->Heading }}</h2>
        <!-- company logo -->
         <div class="login-logo text-center">

             <img  style=" height:200px;"   src="{{ $info[0]->Path }}" alt="know corona">
         </div>
         <!-- form starts here -->
         <form method="POST" action="{{ route('login') }}">
          @csrf
        <!-- Email Address starts here -->
          <!-- <input type="email" name="email" id="" class="form-control" placeholder="Enter Username"> -->
          <input id="email" type="email" placeholder="Enter Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror


          <!-- Password starts here -->
          <!-- <input type="password" name="password" id="" class="form-control" placeholder="Enter Password"> -->
          <input id="password" type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror




            <button id = "login-btn" type="submit"  class="form-control btn-primary">Submit</button>

        </form>

     </div>
</div>

</div>


<!-- main div ends here -->
</body>
</html>
