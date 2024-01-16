<!DOCTYPE html>
<html lang="en">
<head>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('public/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('public/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('public/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
@extends('layouts.app')

@section('content')



<div class="wrapper">

  <!-- Preloader -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1 >Pastors List (Total :  {{ $getRecord->total() }} ) </h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/pastors/add') }}" class="btn btn-primary">Add New Pastor</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>          
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">

            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
              <h3 class="card-title"> Search Pastor </h3> 
              </div>
              <form method="get" action=""> 
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-2">
                    <label>Name</label>
                    <input type="text" class="form-control"  name="name" value="{{ Request::get('name') }}" placeholder="Name">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Cluster</label>
                    <input type="text" class="form-control" name="cluster" value="{{ Request::get('cluster') }}"  placeholder="Cluster">
                  </div>
                  <div class="form-group col-md-2">
                        <label>Gender<span style="color: red;"></span></label>
                        <select class="form-control"  name="gender">
                            <option value="">Gender</option>
                            <option {{ (Request::get('gender') =='Male') ? 'selected' : '' }} value="Male">Male</option>
                            <option {{ (Request::get('gender') =='Female') ? 'selected' : '' }} value="Female">Female</option>
                        </select>
                  </div>
                  <div class="form-group col-md-2">
                  <label>NHIF<span style="color: red;"></span></label>
                        <select class="form-control"  name="nhif">
                            <option value="">NHIF?</option>
                            <option  {{ (Request::get('nhif') =='Yes') ? 'selected' : '' }} value="Yes">Yes</option>
                            <option  {{ (Request::get('nhif') =='No') ? 'selected' : '' }} value="No">No</option>
                        </select>
                  </div>
                  <div class="form-group col-md-2">
                  <label>Status<span style="color: red;"></span></label>
                        <select class="form-control"  name="status">
                            <option value="">Status</option>
                            <option  {{ (Request::get('status') =='0') ? 'selected' : '' }} value="0">Active</option>
                            <option  {{ (Request::get('status') =='1') ? 'selected' : '' }} value="1">Inactive</option>
                        </select>
                  </div>
                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top:32px">Search</button>
                    <a href="{{ url('admin/pastors/list') }}" class="btn btn-success"  style="margin-top:32px">Reset</a>
                  </div>

                  </div>
                  

                </div>
            

              </form>
            </div>
              @include('_message')


          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pastors List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>profile</th>
                      <th>Name</th>
                      <th>Cluster</th>
                      <th>Gender</th>
                      <th>Recidence</th>
                      <th>Phone</th>
                      <th>Department</th>
                      <th>Status</th>
                      <th>NHIF</th>
                      <th>Joined</th>
                      <th>Created</th>

                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>{{ $value->id}}</td>
                        <td>
                          @if(!empty($value->getProfile()))
                          <img src="{{ $value->getProfile() }}" style="width: 50px; height: 50px; border-radius: 50px;">
                          @endif
                        </td>
                        <td>
                          {{ $value->name }} 
                          {{ $value->last_name }}
                        </td>
                        <td>{{ $value->cluster_name }}</td>
                        <td>{{ $value->gender }}</td>
                        <td>{{ $value->location }}</td>
                        <td>{{ $value->mobile_number }}</td>
                        <td>{{ $value->department }}</td>
                        <td>{{ ($value->status ==0) ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $value->nhif }}</td>
                        <td>
                          @if(!empty($value->join_date))
                            {{ date('d-m-y', strtotime($value->join_date )) }}
                          @endif
                        </td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td style="min-width: 150px;">
                          <a href="{{ url('admin/pastors/edit/'.$value->id)  }}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ url('admin/pastors/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                  <div style="padding: 10px; float: right;">
                   {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                  </div>
              </div>
              <!-- /.card-body -->
            </div>


          </div>

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Content Wrapper. Contains page content -->

  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('public/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('public/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('public/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('public/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('public/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('public/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('public/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('public/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('public/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('public/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('public/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('public/dist/js/pages/dashboard.js')}}"></script>


@endsection