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
            <h1>Edit Assign Accountability</h1>
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
                  <div class="form-group">
                    <label>Cluster Name</label>
                    <select class="form-control" name="cluster_id" required>
                        <option value="">Select Cluster</option>
                        @foreach($getCluster as $cluster)
                        <option {{ ($getRecord->cluster_id == $cluster->id) ? 'selected' : ''}} value="{{ $cluster->id }}">{{ $cluster->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Accountability Group</label>
                        @foreach($getAccountability as $accountability)
                            @php
                                $checked = "";
                            @endphp

                            @foreach($getAssignAccountabilityID as $accountabilityAssign)
                                @if($accountabilityAssign->accountability_id == $accountability->id)
                                    @php
                                        $checked = "checked";
                                    @endphp
                                @endif
                            @endforeach
                          <div>
                            <label style="font-weight:normal;">
                              <input {{ $checked }} type="checkbox" value="{{ $accountability->id }}" name="accountability_id[]"> {{ $accountability->name }}
                            </label>
                          </div>
                        @endforeach
                    
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option {{ ($getRecord->status == 0) ? 'selected' : ''}} value="0">Active</option>
                        <option {{ ($getRecord->status == 1) ? 'selected' : ''}}  value="1">Inactive</option>
                    </select>
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