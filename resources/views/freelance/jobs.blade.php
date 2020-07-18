<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Freelance</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
      .container{
        margin-top: 100px;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a href="{{ route('signOut') }}" class="mr-5">Log Out</a>
  <a href="#" class="btn-complete-profile" data-toggle="modal" data-target="#exampleModal">Complete Your Profile</a>
</nav>


<main role="main">
  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
        @foreach($result->data as $key => $value)
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="card" style="width: 18rem;">
                <div class="card-header">
                  <h3>
                    {{ $value->jobTitle }}
                  </h3>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><h6>Category : </h6>{{ $value->category }}</li>
                  <li class="list-group-item"><h6>sallary :</h6>{{ $value->sallary }}</li>
                  <li class="list-group-item"><h6>Job Desk :</h6>{{ $value->jobdesk }}</li>
                  <li class="list-group-item"><h6>Level Requirement :</h6>{{ $value->level_requirement }}</li>
                </ul>
                <input type="hidden" value="{{ $value->id }}">
                <button class="btn btn-success center btn-apply">Apply</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    <hr>

  </div> <!-- /container -->

</main>  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Your Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="card">
                <div class="card-body">     
                    <form id="form-update-profile" action="">                
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" class="form-control" id="name-update"  placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">age</label>
                              <input type="text" class="form-control" id="age-update" placeholder="age">
                            </div>
                            <div class="form-group">
                                <label for="address">address</label>
                                <textarea class="form-control" id="address-update" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="skills">skills</label>
                                <textarea class="form-control" id="skills-update" rows="3"></textarea>
                            </div>
                    </form>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-save-complete-profile">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<footer class="container">
  <p>&copy; Company 2017-2020</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" 
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@include('utilities.scriptMain')
</body>
</html>

























