@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- main content -->
<main class="main-content mt-1 border-radius-lg">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">CBT</h6>
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
        <!-- Users -->
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header">
                @if (session()->has('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <a href="{{ route('cbt.add')}}">
                <button class="btn btn-outline-primary btn-sm mb-0" style="float: right">Add New</button>
                </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CBT Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">CBT Course</th>
                        
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time</th>
                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Started</th>
                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($exams as $exam)
                           <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              {{$exam->exam}}
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"></h6>
                              <p class="text-xs text-secondary mb-0"></p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$exam->course->course}}</p>          
                        </td>
                        
                       
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{$exam->exam_date}}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{$exam->exam_time}}</span>
                        </td>
                         <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-danger">No</span>
                        </td>
                        <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0">{{$exam->created_at->diffForHumans()}}</p>          
                          </td>
                        <td class="align-middle">
                          <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            View
                          </a>
                        </td>
                        <td class="align-middle">
                          <a href="{{route('question.add')}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            <span class="badge badge-sm bg-gradient-danger">No Question</span>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
            
       <hr>


    <!-- footer -->
    @include('layouts.admin_layout.admin_footer')
  </div>
</main>
<!-- end main content -->
@endsection