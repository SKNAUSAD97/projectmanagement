@extends('manager/components/layout')
@section('content')
<style>
  .tr-table{
    background: #315b80;
    color: #fff;
  }
  .more{
    background-color: #315b80;
    border-color: #315b80;
  }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
        </div>
      </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content mt-2">
        <div class="container-fluid">
          <div class="row">
            @if ($message = Session::get('success-message'))
            <div class="col-12">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i>
                {{ $message }}
             </div>
            </div>
            @endif

            @if ($message = Session::get('error-message'))
            <div class="col-12">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-ban"></i>
                {{ $message }}
             </div>
            </div>
            @endif
            
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">Projects List</h3>
                    </div>

                    <div class="col-md-6">
                        <h3 class="card-title" style="float: right">
                            <a class="btn btn-primary more btn btn-sm" href="{{ route('/add-projects') }}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </h3>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-hover project_datatable">
                    <thead>
                    <tr class="tr-table">
                      <th>SL No</th>
                      <th>Name</th>
                      <th>Initiation Date</th>
                      <th>Technologies Used</th>
                      <th>Client Name</th>
                      <th>Developers Assigned</th>
                      <th>Due Date</th>
                      <th>
                        Action
                      </th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
@endsection
<script src="{{ url('/') }}/manager/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(function () {
    var table = $('.project_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('/get-projects') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'initiataion_date', name: 'initiataion_date'},
            {data: 'technologies_used', name: 'technologies_used'},
            {data: 'client_info', name: 'client_info'},
            {data: 'developers_assigned', name: 'developers_assigned'},
            {data: 'due_date', name: 'due_date'},
            {data: 'action', name: 'action', orderable: false, searchable: false, width : '70px'},
        ],
    });
  });
</script>