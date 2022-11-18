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

{{-- Project Modal --}}
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Milestones <small id="project_name">Loading...</small></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover milestones_datatable">
          <thead>
          <tr class="tr-table">
            <th>SL No</th>
            <th>Title</th>
            <th>Date From</th>
            <th>Due Date</th>
            <th>View Comments</th>
          </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

{{-- Default modal for milestones --}}
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">Default Modal</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
        <div class="modal-body">
          
          <div class="row">
            <div class="col-md-12">
               <div class="timeline">
                  <div class="time-label">
                     <span class="bg-red">10 Feb. 2014</span>
                  </div>
                  <div>
                     <i class="fas fa-envelope bg-blue"></i>
                     <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                        <div class="timeline-body">
                           Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                           weebly ning heekya handango imeem plugg dopplr jibjab, movity
                           jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                           quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                           <a class="btn btn-primary btn-sm">Read more</a>
                           <a class="btn btn-danger btn-sm">Delete</a>
                        </div>
                     </div>
                  </div>
                  <div>
                     <i class="fas fa-user bg-green"></i>
                     <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                     </div>
                  </div>
                  <div>
                     <i class="fas fa-comments bg-yellow"></i>
                     <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                        <div class="timeline-body">
                           Take me to your leader!
                           Switzerland is small and neutral!
                           We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                           <a class="btn btn-warning btn-sm">View comment</a>
                        </div>
                     </div>
                  </div>
                  <div class="time-label">
                     <span class="bg-green">3 Jan. 2014</span>
                  </div>
                  <div>
                     <i class="fa fa-camera bg-purple"></i>
                     <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                        <div class="timeline-body">
                           <img src="https://placehold.it/150x100" alt="...">
                           <img src="https://placehold.it/150x100" alt="...">
                           <img src="https://placehold.it/150x100" alt="...">
                           <img src="https://placehold.it/150x100" alt="...">
                           <img src="https://placehold.it/150x100" alt="...">
                        </div>
                     </div>
                  </div>
                  <div>
                     <i class="fas fa-video bg-maroon"></i>
                     <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>
                        <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>
                        <div class="timeline-body">
                           <div class="embed-responsive embed-responsive-16by9">
                              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" allowfullscreen></iframe>
                           </div>
                        </div>
                        <div class="timeline-footer">
                           <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                        </div>
                     </div>
                  </div>
                  <div>
                     <i class="fas fa-clock bg-gray"></i>
                  </div>
               </div>
            </div>
         </div>

        </div>
        <div class="modal-footer justify-content-between">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary">Save changes</button>
        </div>
     </div>
  </div>
</div>

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
  $(document).ready(function(){
    getProjects();
  });

  getProjects = () => {
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
  }

  milestones = (project_id) =>{
    try{
      const project_name = $('#test' + project_id).attr("data-id");
      $('#project_name').text('('+ project_name +')');
      $('.milestones_datatable').dataTable().fnDestroy();
      getMilestones(project_id);
    }catch(err){
      console.log(err);
    }
  }

  getMilestones = (project_id) => {
    var table = $('.milestones_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/managers/get-milestones') }}/"+ project_id +"",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'from', name: 'from'},
            {data: 'to', name: 'to'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
  }
</script>