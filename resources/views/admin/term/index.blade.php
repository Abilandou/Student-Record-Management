@extends('layout.appLayout.app_design')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Terms
        <small>All Terms</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">school requirements</a></li>
        <li class="active">terms</li>
      </ol>
    </section>
    @include('snippets.messages')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Terms </h3><button  data-toggle="modal" data-target="#modal-default" class="btn btn-primary add-button" title="Add New Term"><i class="glyphicon glyphicon-plus"></i>ADD NEW</button>
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
                        @if(count($terms) > 0)
                        @extends('layout.appLayout.app_design')
                        @section('content')

                         <!-- Content Wrapper. Contains page content -->
                         <div class="content-wrapper">
                            <!-- Content Header (Page header) -->
                            <section class="content-header">
                              <h1>
                                Terms
                                <small>All Terms</small>
                              </h1>
                              <ol class="breadcrumb">
                                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                <li><a href="#">school requirements</a></li>
                                <li class="active">terms</li>
                              </ol>
                            </section>
                            @include('snippets.messages')

                            <!-- Main content -->
                            <section class="content">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="box">
                                    <div class="box-header">
                                      <h3 class="box-title">Terms </h3><button  data-toggle="modal" data-target="#modal-default" class="btn btn-primary add-button" title="Add New Term"><i class="glyphicon glyphicon-plus"></i>ADD NEW</button>
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
                                                @if(count($terms) > 0)
                                                    @foreach($terms as $term)
                                                        <tr>
                                                            <td>{{ $term->id }}</td>
                                                            <td>{{ $term->name }}</td>
                                                            <td>{{ $term->description }}</td>
                                                            <td>
                                                                <button data-toggle="modal" data-target="#modal-default{{ $term->id }}" title="Edit term" class="btn btn-primary btn-mini"><i class="glyphicon glyphicon-pencil"></i></button>
                                                                <form action="{{ url('admin/terms/'.$term->id) }}" method="post">
                                                                    <input type="hidden" name="_method" value="delete" />
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                                    <button type="submit" title="Delete term" class="btn btn-danger btn-mini delete-record"><i class="glyphicon glyphicon-trash"></i> </button>
                                                                </form>
                                                            </td>
                                                        </tr>

                                                        <div class="modal fade" id="modal-default{{ $term->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title">Editing... {{ $term->name }}</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Required Field(s) is(are) marked<b class="text-danger">*</b></p>
                                                                    <form action="{{ url('/admin/terms/'.$term->id) }}" method="post">

                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="_method" value="put" />
                                                                    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
                                                                    <div class="form-group has-feedback">
                                                                        <label for="name">term Name<b class="text-danger">*</b> </label>
                                                                        <input type="text" value="{{ $term->name }}" required name="name" class="form-control" placeholder="Class Name">
                                                                    </div>
                                                                    <div class="form-group has-feedback">
                                                                        <label for="name">term Description(optional) </label>
                                                                        <textarea name="description" placeholder="description" class="form-control">{{ $term->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Edit term</button>
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
                                                        <td><h5 class="text-success">No term Has Been Added Yet</h5></td>
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
                                    <h4 class="modal-title">Add New term</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Required Field(s) is(are) marked<b class="text-danger">*</b></p>
                                    <form action="{{ url('admin/terms') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group has-feedback">
                                            <label for="name">term Name<b class="text-danger">*</b> </label>
                                            <input type="text" required name="name" class="form-control" placeholder="Class Name">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="name">term Coefficient<b class="text-danger">*</b> </label>
                                            <input type="number" required name="coefficient" class="form-control" placeholder="term Coefficient">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="name">term Type<b class="text-danger">*</b> </label>
                                            <select name="type" required class="form-control">
                                                <option value="" disabled selected>Select term Type</option>
                                                <option value="R">School Requirement</option>
                                                <option value="C">Compolsary</option>
                                            </select>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="name">term Description(optional) </label>
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
                          @foreach($terms as $term)
                                <tr>
                                    <td>{{ $term->id }}</td>
                                    <td>{{ $term->name }}</td>
                                    <td>{{ $term->description }}</td>
                                    <td>
                                        <a href="{{ url('admin/terms/'.$term->id) }}" title="View Term's Details" class="btn btn-success btn-mini"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <button data-toggle="modal" data-target="#modal-default{{ $term->id }}" title="Edit term" class="btn btn-primary btn-mini"><i class="glyphicon glyphicon-pencil"></i></button>
                                        <form action="{{ url('admin/terms/'.$term->id) }}" method="post">
                                            <input type="hidden" name="_method" value="delete" />
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <button type="submit" title="Delete term" class="btn btn-danger btn-mini delete-record"><i class="glyphicon glyphicon-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-default{{ $term->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Editing... {{ $term->name }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Required Field(s) is(are) marked<b class="text-danger">*</b></p>
                                            <form action="{{ url('/admin/terms/'.$term->id) }}" method="post">

                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="put" />
                                            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
                                            <div class="form-group has-feedback">
                                                <label for="name">term Name<b class="text-danger">*</b> </label>
                                                <input type="text" value="{{ $term->name }}" required name="name" class="form-control" placeholder="Class Name">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="name">term Description(optional) </label>
                                                <textarea name="description" placeholder="description" class="form-control">{{ $term->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Edit term</button>
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
                                <td><h5 class="text-success">No term Has Been Added Yet</h5></td>
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
            <h4 class="modal-title">Add New term</h4>
        </div>
        <div class="modal-body">
            <p>Required Field(s) is(are) marked<b class="text-danger">*</b></p>
            <form action="{{ url('admin/terms') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <label for="name">term Name<b class="text-danger">*</b> </label>
                    <input type="text" required name="name" class="form-control" placeholder="Class Name">
                </div>
                <div class="form-group has-feedback">
                    <label for="name">term Description(optional) </label>
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
