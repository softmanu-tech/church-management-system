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
            <h1>Edit Visitor</h1>
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
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class= "row">

                    <div class="form-group col-md-12">
                      <label>Visitor Name</label>
                      <input type="text" class="form-control"  name="name" value="{{ $getRecord->name }}" required placeholder="visitor Name">
                      <hr />
                    </div>
                    <div class="form-group col-md-6">
                      <label>Category</label>
                      <select class="form-control" name="category" required>
                          <option value="">Select Category</option>
                          <option {{ ($getRecord->category == 'First-Time') ? 'selected' : ''}}  value="First-Time">First-Time</option>
                          <option {{ ($getRecord->category == 'Second-Time') ? 'selected' : ''}}  value="Second-Time">Second-Time</option>
                          <option {{ ($getRecord->category == 'Third-Time') ? 'selected' : ''}}  value="Third-Time">Third-Time</option>
                          <option {{ ($getRecord->category == 'One-Month') ? 'selected' : ''}}  value="One-Month">One-Month</option>
                          <option {{ ($getRecord->category == 'Two-Month') ? 'selected' : ''}}  value="Two-Month">Two-Month</option>
                          <option {{ ($getRecord->category == 'Three-Month') ? 'selected' : ''}}  value="Three-Month">Three-Month</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Date</label>
                      <input type="date" class="form-control"  name="visiting_date" value="{{ $getRecord->visiting_date }}" required placeholder="Date">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Status</label>
                      <select class="form-control" name="status">
                          <option {{ ($getRecord->status == 0) ? 'selected' : ''}} value="0">Active</option>
                          <option {{ ($getRecord->status == 1) ? 'selected' : ''}} value="1">Inactive</option>
                      </select>
                    </div>

                    <div class="form-group col-md-6">
                      <label>Location</label>
                      <input type="text" class="form-control"  name="location" value="{{ $getRecord->location }}" required placeholder="Location">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Phone</label>
                      <input type="text" class="form-control"  name="phone" value="{{ $getRecord->phone }}" required placeholder="Phone">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Prev-Altar</label>
                      <input type="text" class="form-control"  name="pre_church" value="{{ $getRecord->pre_church }}" required placeholder="Previous Church">
                    </div>

                  </div>
                  


                </div>
            
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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