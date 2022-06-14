@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- main content -->
<main class="main-content mt-1 border-radius-lg">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">Add New CBT</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
         
        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-flex align-items-center">
            <a href="{{route('admin.logout')}}" class="nav-link text-body font-weight-bold px-0">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none">Logout</span>
            </a>
          </li>
    
         
          <li class="nav-item dropdown px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell cursor-pointer"></i>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="{{ asset('images/admin_images/team-2.jpg') }}" class="avatar avatar-sm  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New message</span> from Laur
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        13 minutes ago
                      </p>
                    </div>
                  </div>
                </a>
              </li>
            
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <div class="container-fluid py-4">
      <hr>

      <div class="card">
          <div class="card-header">
                
           </div>

           <div class="card-body">
               <form action="{{ route('cbt.save')}}" method="post" enctype="multipart/form-data">
                   @csrf
                       <div class="row">
                            <center><label for="exam" class="col-form-label">Name</label></center>
                            <input id="exam" type="text" name="exam" class="form-control @error('exam') is-invalid @enderror" autocomplete="exam" autofocus>
                            @error('exam')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
                            <center><label for="course" class="col-form-label">Select Course</label></center>
                            <select name="course_id" class="col-form-label" aria-label="select">

                                <option selected>Select</option> 
                                    @foreach ($courses as $course)
                                        <option value="{{$course->id}}">
                                        {{$course->course}}
                                    </option>
                                    @endforeach
                                
                             </select>
                        </div>

                        <div class="row">
                            <center><label for="exam_date" class="col-form-label">Date</label></center>
                            <input id="exam_date" type="date" name="exam_date" class="form-control @error('exam_date') is-invalid @enderror" autocomplete="exam_date" autofocus>
                            @error('exam_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
                            <center><label for="exam_time" class="col-form-label">Time</label></center>
                            <input id="exam_time" type="time" name="exam_time" class="form-control @error('exam_time') is-invalid @enderror" autocomplete="exam_time" autofocus>
                            @error('exam_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
                            <center><label for="exam_hours" class="col-form-label">Duration</label></center>
                            <input id="exam_hours" type="number" name="exam_hours" placeholder="Hours" class="form-control @error('exam_hours') is-invalid @enderror" autocomplete="exam_hours" autofocus>
                            @error('exam_hours')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div><br>

                        <div class="row">
                            <input id="exam_minutes" type="number" name="exam_minutes" placeholder="Minutes" class="form-control @error('exam_minutes') is-invalid @enderror" autocomplete="exam_minutes" autofocus>
                            @error('exam_minutes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="row pt-4">
                            <button class="btn btn-primary btn-sm mb-0">Save</button>
                        </div>
               </form>
           </div>
        </div>
            
       <hr>


    <!-- footer -->
    @include('layouts.admin_layout.admin_footer')
  </div>
</main>
<!-- end main content -->
@endsection