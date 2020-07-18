<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Job Portal</title>


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

        {{-- SHOW ALL JOBS --}}

    <main id="job" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Jobs</h1>
      </div>

      <form style="margin-bottom:-130px;" id="form-create-new-job" action="">
        <label for="" class="text-nowrap bg-light" >Create New Job Here</label>
        <div class="form-group row col-md-6">

          <label for="inputtext" class="col-sm-2 col-form-label">Job Title</label>
            <div class="col-sm-10">
              <input type="text" name="job_title" class="form-control mb-3" id="job-title">
            </div>
          <label for="inputtext" class="col-sm-2 col-form-label">category</label>
            <div class="col-sm-10">
              <input type="text"  name="category" class="form-control mb-3" id="category">
            </div>
          <label for="inputtext" class="col-sm-2 col-form-label">level requirement</label>
            <div class="col-sm-10">
              <input type="text"  name="level_requirement" class="form-control mb-3" id="level-requirement">
            </div>
          <label for="inputtext" class="col-sm-2 col-form-label">Job Desk</label>
            <div class="col-sm-10">
              <input type="text"  name="job_desk" class="form-control mb-3" id="job-desk">
            </div>
          <label for="inputtext" class="col-sm-2 col-form-label">Sallary</label>
            <div class="col-sm-10">
              <input type="text"  name="job_sallary" class="form-control mb-3" id="job-sallary">
            </div>
        </div>
      </form>
      <button type="button" class="btn btn-sm btn-success mb-3 save" id="save">Save</button>
      
      <canvas id="myChart"></canvas>

      
      <table  class="table table-hover table-responsive">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Job Title</th>
            <th scope="col">Category</th>
            <th scope="col">level Requirement</th>
            <th scope="col">Sallary</th>
            <th scope="col">Jobdesk</th>
            <th scope="col">status</th>
            <th scope="col">Created At</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody id="body-jobs">
          @php($i = 1)
          @foreach($result->data as $key => $value)
          <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $value->jobTitle }}</td>
            <td>{{ $value->category }}</td>
            <td>{{ $value->level_requirement }}</td>
            <td>{{ $value->sallary }}</td>
            <td>{{ $value->jobdesk }}</td>
            <td>{{ $value->status }}</td>
            <td>{{ $value->created_at }}</td>
            <input type="hidden" value="{{ $value->id }}" class="job-id">
              @if($value->status != "published")
                <td>
                  <a href='#' class='btn btn-sm btn-warning btn-publish'>Publish</a>
                </td>
              @endif
          </tr>
          @endforeach
        </tbody>
      </table>

    </main>  
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


