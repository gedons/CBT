@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- main content -->
<main class="main-content mt-1 border-radius-lg">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">Add Exams Course</h6>
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
               <form action="{{ route('course.save')}}" method="post" enctype="multipart/form-data">
                   @csrf
                       <div class="row">
                            <center><label for="course" class="col-form-label">Name</label></center>
                            <input id="course" type="text" name="course" class="form-control @error('course') is-invalid @enderror" autocomplete="course" autofocus>
                            @error('course')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
                            <center><label for="department" class="col-form-label">Select Department</label></center>
                            <select name="department_id" class="col-form-label" aria-label="select">

                                <option selected>Select</option> 
                                    @foreach ($departments as $department)
                                        <option value="{{$department->id}}">
                                        {{$department->name}}
                                    </option>
                                    @endforeach
                                
                             </select>
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