@extends('layout.appLayout.app_design')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Classes
        <small>All classes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">school requirements</a></li>
        <li class="active">Classes</li>
      </ol>
    </section>
    @include('snippets.messages')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Classes </h3><button  data-toggle="modal" data-target="#modal-default" class="btn btn-primary add-button" title="Add New Class"><i class="glyphicon glyphicon-plus"></i>ADD NEW</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped table-hoverable">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                        @if(count($classes) > 0)
                            @foreach($classes as $class)
                                <tr>
                                    <td class="table-data-item">{{ $class->id }}</td>
                                    <td class="table-data-item">{{ $class->name }}</td>
                                    <td class="table-data-item">{{ $class->description }}</td>
                                    <td id="data-actions">
                                        <a href="{{ url('admin/classes/'.$class->id) }}" title="View Class Details" class="btn btn-success btn-mini"><i class="glyphicon glyphicon-eye-open"></i></a>

                                        <button data-toggle="modal" data-target="#modal-default{{ $class->id }}" title="Edit Class" class="btn btn-primary btn-mini"><i class="glyphicon glyphicon-pencil"></i></button>

                                        <form action="{{ url('admin/classes/'.$class->id) }}" method="post">
                                        <input type="hidden" name="_method" value="delete" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <button type="submit" title="Delete class" class="btn btn-danger btn-mini delete-record"><i class="glyphicon glyphicon-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-default{{ $class->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Editing... <b class="text-success">{{ $class->name }}</b></h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Required Field(s) is(are) marked<b class="text-danger">*</b></p>
                                            <form action="{{ url('/admin/classes/'.$class->id) }}" method="post">

                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="put" />
                                            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
                                                <div class="form-group has-feedback">
                                                    <label for="name">Class Name<b class="text-danger">*</b> </label>
                                                    <input type="text" name="name" value="{{ $class->name }}" class="form-control" placeholder="Class Name">

                                                </div>
                                                <div class="form-group has-feedback">
                                                        <label for="name">Class Description </label>

                                                        <textarea name="description" placeholder="description" class="form-control">{{ $class->description }}</textarea>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                            <button type="submit" title="Submit edited data" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>SUBMIT EDIT</button>
                                        </form>
                                        </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            @endforeach
                        @else
                            <tr>
                                <td><h5 class="text-success">No Class Has Been Added Yet</h5></td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  {{-- Modal for adding New Class --}}

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add New Class</h4>
        </div>
        <div class="modal-body">
            <p>Required Field(s) is(are) marked<b class="text-danger">*</b></p>
            <form action="{{ url('admin/classes') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <label for="name">Class Name<b class="text-danger">*</b> </label>
                    <input type="text" required name="name" class="form-control" placeholder="Class Name">

                </div>
                <div class="form-group has-feedback">
                    <label for="name">Class Description </label>
                    <textarea name="description" placeholder="description" class="form-control"></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>SUBMIT DATA</button>
        </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>

  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
@endsection
