@extends('manager/components/layout')
@section('content')
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color: #315b80; color:#fff">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Update Project</h3>
                            </div>
                            <div class="col-md-6">
                                <a type="button" class="close" href="{{ route('/projects') }}">×</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('/add-projects') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project Name:</label>
                                        <div class="input-group">
                                           <input type="text" class="form-control" name="name" placeholder="Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Initiated Date:</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                           <input type="text" name="initiataion_date" class="form-control datetimepicker-input" data-target="#reservationdate">
                                           <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                              <div class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                </div>
                            </div>
                            
                           <div class="form-group mt-2">
                            <label>MILESTONES:</label>
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Title</th>
                                    <th>Date Range</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="milestones[0][title]" placeholder="Title" />
                                        </div>
                                    </td>
                                    <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right reservation" name="milestones[0][date_range]">
                                        </div>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn btn-sm" id="add-btn">
                                        Add More
                                    </button>
                                    </td>
                                </tr>
                            </table>
                           </div>
    
                           <div class="form-group">
                                <label>Programming Languages Used: <small>(Separate languages with comma...)</small>!!</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="technologies_used" placeholder="Technologies used" />
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label>Developers Assigned: <small>(Separate Developers with comma...)</small>!!</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="developers_assigned" placeholder="Developers Assigned" />
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Client Name:</label>
                                        <div class="input-group">
                                           <input type="text" class="form-control" name="client_info" placeholder="Client Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Due Date:</label>
                                        <div class="input-group date reservationdate" data-target-input="nearest">
                                           <input type="text" name="due_date" class="form-control datetimepicker-input" data-target=".reservationdate">
                                           <div class="input-group-append" data-target=".reservationdate" data-toggle="datetimepicker">
                                              <div class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                </div>
                            </div>
    
                           <button type="submit" class="btn btn-primary">Add Project</button>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
<script src="{{ url('/') }}/manager/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var i = 0;
    $("#add-btn").click(function(){
        ++i;

        $("#dynamicAddRemove").append('<tr><td><div class="input-group"><input type="text" class="form-control" name="milestones['+i+'][title]" placeholder="Title" /></div></td><td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div><input type="text" class="form-control float-right reservation" name="milestones['+i+'][date_range]"></div></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">Remove</button></td></tr>');
        $('.reservation').daterangepicker()    
    });

    $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
    });
});
    
    </script>