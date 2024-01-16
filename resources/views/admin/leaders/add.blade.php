@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="en">

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add New Leader</h1>
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
            <div class="card card-primary">
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6"  >
                        <label>First Name<span style="color: red;">*</span></label>
                        <input type="text" class="form-control"  name="name" value="{{ old('name') }}" required placeholder="First Name">
                        <div style="color:red">{{ $errors->first('name') }}</div>
                    </div>
                    <div class="form-group col-md-6"  >
                        <label> Last Name<span style="color: red;">*</span></label>
                        <input type="text" class="form-control"  name="last_name" value="{{ old('last_name') }}" required placeholder="Last Name">
                        <div style="color:red">{{ $errors->first('last_name') }}</div>
                    </div>
                    <div class="form-group col-md-6"  >
                        <label>Roll Number<span style="color: red;">*</span></label>
                        <input type="text" class="form-control"  name="roll_number" value="{{ old('roll_number') }}" required placeholder="Roll Number">
                        <div style="color:red">{{ $errors->first('roll_number') }}</div>
                    </div>
                    <div class="form-group col-md-6"  >
                        <label>Cluster<span style="color: red;">*</span></label>
                        <select class="form-control" required name="cluster_id">
                            <option value="">Select Cluster</option>
                            @foreach($getCluster as $value)
                              <option {{ (old('cluster_id') == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                        <div style="color:red">{{ $errors->first('cluster_id') }}</div>
                    </div>
                    <div class="form-group col-md-6"  >
                        <label>Gender<span style="color: red;">*</span></label>
                        <select class="form-control" required name="gender">
                            <option value="">Select Gender</option>
                            <option {{ (old('gender') =='Male') ? 'selected' : '' }} value="Male">Male</option>
                            <option {{ (old('gender') =='Female') ? 'selected' : '' }} value="Female">Female</option>
                        </select>
                        <div style="color:red">{{ $errors->first('gender') }}</div>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Date Of Birth<span style="color: red;"></span></label>
                        <input type="date" class="form-control"  name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                        <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                    </div>
                    <div class="form-group col-md-6"  >
                        <label>Location<span style="color: red;">*</span></label>
                        <input type="text" class="form-control"  name="location" value="{{ old('location') }}" required placeholder="Location">
                        <div style="color:red">{{ $errors->first('location') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Date Joined<span style="color: red;">*</span></label>
                        <input type="date" class="form-control"  name="join_date" value="{{ old('join_date') }}" required>
                        <div style="color:red">{{ $errors->first('join_date') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Previous Altar<span style="color: red;">*</span></label>
                        <input type="text" class="form-control"  name="prev_altar" value="{{ old('prev_altar') }}" required placeholder="Previous Altar">
                        <div style="color:red">{{ $errors->first('prev_altar') }}</div>
                    </div>
                    <div class="form-group col-md-6"  >
                        <label>Department<span style="color: red;"></span></label>
                        <input type="text" class="form-control"  name="department" value="{{ old('department') }}" required placeholder="Department">
                        <div style="color:red">{{ $errors->first('department') }}</div>
                    </div>
                    <div class="form-group col-md-6"  >
                        <label>Profile Picture<span style="color: red;">*</span></label>
                        <input type="file" class="form-control"  name="profile_pic" value="{{ old('profile_pic') }}"  placeholder="Profile Picture">
                        <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                    </div>
                    <div class="form-group col-md-6"  >
                        <label>Mobile Number<span style="color: red;">*</span></label>
                        <input type="text" class="form-control"  name="mobile_number" value="{{ old('mobile_number') }}" required placeholder="Mobile Number">
                        <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                    </div>
                    <div class="form-group col-md-6"  >
                        <label>NHIF<span style="color: red;">*</span></label>
                        <select class="form-control" required name="nhif">
                            <option value="">Do you Have NHIF?</option>
                            <option  {{ (old('nhif') =='Yes') ? 'selected' : '' }}value="Yes">Yes</option>
                            <option  {{ (old('nhif') =='No') ? 'selected' : '' }} value="No">No</option>
                        </select>
                        <div style="color:red">{{ $errors->first('nhif') }}</div>
                    </div>
                    <div class="form-group col-md-6"  >
                        <label>Status<span style="color: red;">*</span></label>
                        <select class="form-control" required name="status">
                            <option value="">Select Status</option>
                            <option  {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                            <option  {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                        </select>
                        <div style="color:red">{{ $errors->first('status') }}</div>
                    </div>
                
                  </div>
                  <hr />
                  <div class="form-group">
                    <label>Email<span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
                    <div style="color:red">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Password<span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                  </div>


                </div>
            
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



          </div>
        
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>



@endsection