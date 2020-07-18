<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>MX 100 Job Portal</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  </head>
  <body class="text-center">

<div class="container login" id="main-container">
    <form  orm class="form-signin" id="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

      <button class="btn btn-lg btn-primary btn-block" type="button" id="sign">Sign in</button>
      <a class="" type="button" id="sign-up">Dont Have accout? Sign Up Here</a>

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>
</div>


<div class="container register" id="main-container">
  <div class="col-md-6">
    <form  orm class="form-signup" id="form-signup">
      <h1 class="h3 mb-3 font-weight-normal">Register New User</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmailRegister" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPasswordRegister" class="form-control" placeholder="Password" required>

      <button class="btn btn-lg btn-primary btn-block sign-up" type="button" id="sign-up">Register</button>
      <a class="" type="button" id="sign-in">Sign In</a>

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>
  </div>
</div>

</body>
<footer>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  @include('utilities.scriptMain')
</footer>
</html>
