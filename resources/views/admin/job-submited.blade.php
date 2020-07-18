
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Job Portal</title>

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
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">MX-100</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{ route('signOut') }}">Sign out</a>
    </li>
  </ul>
</nav>

  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a id="dashboard-nav" class="nav-link active" href="{{ route('admin') }}">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a  class="nav-link job-nav" href="{{ route('jobs') }}">
              <span data-feather="job"></span>
              Job
            </a>
          </li>
          <li class="nav-item">
            <a  class="nav-link job-submited-nav" href="{{ route('show-job-submit') }}">
              <span data-feather="job-submited"></span>
              Job Submited
            </a>
          </li> 
        </ul>
      </div>
    </nav>

    <div class="container-fluid" id="main-container">
      {{-- SHOW ALLS JOB SUBMITED --}}

      <main id="job-submited" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Job Submitted</h1>
        </div>

        <canvas id="myChart"></canvas>

        <div class="table-responsive">
          <table id="job-table" class="table table-hover table-responsive">
            <thead>
              <tr>
                <th>No</th>
                <th>Job Title</th>
                <th>Level Requirement</th>
                <th>Freelance Name</th>
                <th>Freelance Age</th>
              </tr>
            </thead>
            @php($i = 1)
            <tbody>
              @foreach($result->data as $value)
              <input type="hidden" id="job-submit-id" value="{{ $value->job_submit_id }}">
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $value->job_title }}</td>
                <td>{{ $value->job_level_requirement }}</td>
                <td>{{ $value->user_name }}</td>
                <td>{{ $value->user_age }}</td>
                <td>
                  <button type="button" class="btn btn-sm btn-info view" data-toggle="modal" data-target="#exampleModal" id="view">View Detail</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </main>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="card" style="width: 12rem;">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Name</li>
                    <li class="list-group-item">Email</li>
                    <li class="list-group-item">Age</li>
                    <li class="list-group-item">Address</li>
                    <li class="list-group-item">Skills</li>
                    <li class="list-group-item">Job Title</li>
                    <li class="list-group-item">Job Level Requirement</li>
                    <li class="list-group-item">Job Sallary</li>
                    <li class="list-group-item">Job Status</li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card" style="width: 29rem; margin-left:-150px;">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item list-loading list-name"></li>
                    <li class="list-group-item list-loading list-email"></li>
                    <li class="list-group-item list-loading list-age"></li>
                    <li class="list-group-item list-loading list-address"></li>
                    <li class="list-group-item list-loading list-skills"></li>
                    <li class="list-group-item list-loading list-job-title"></li>
                    <li class="list-group-item list-loading list-job-level-requirement"></li>
                    <li class="list-group-item list-loading list-job-sallary"></li>
                    <li class="list-group-item list-loading list-job-status"></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Accept</button>
      </div>
    </div>
  </div>
</div>
      {{-- END SHOW ALLS JOB SUBMITED --}}
     
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous">
</script>

{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> --}}
        {{-- <script src="{{ asset('js/dashboard.js') }}"></script> --}}
    </body>
    @include('utilities.scriptMain')
</html>
      {{-- END SHOW ALL JOBS --}}



    