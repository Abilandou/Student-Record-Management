@extends('layout.appLayout.app_design')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Teachers
        <small>All Teachers</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">school requirements</a></li>
        <li class="active">teachers</li>
      </ol>
    </section>
    @include('snippets.messages')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">teachers </h3><button  data-toggle="modal" data-target="#modal-default" class="btn btn-primary add-button" title="Add New Teacher"><i class="glyphicon glyphicon-plus"></i>ADD NEW</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped table-hoverable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Profile</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($teachers) > 0)
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $teacher->id }}</td>
                                    <td>{{ $teacher->full_name }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->phone }}</td>
                                    <td><img src="{{ asset($teacher->teacher_image) }}" alt="upload image." class="img-circle" height=60px width=60px></td>
                                    <td class='center'>
                                        <a href="{{ url('admin/teachers/'.$teacher->id) }}" title="View Teacher's Details" class="btn btn-success btn-mini"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <button data-toggle="modal" data-target="#modal-default{{ $teacher->id }}" title="Edit Teacher's Information" class="btn btn-primary btn-mini"><i class="glyphicon glyphicon-pencil"></i></button>
                                        <form action="{{ url('admin/teachers/'.$teacher->id) }}" method="post">
                                            <input type="hidden" name="_method" value="delete" />
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <button type="submit" title="Delete This Teacher" class="btn btn-danger btn-mini delete-record"><i class="glyphicon glyphicon-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-default{{ $teacher->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Editing... <b class="text-success">{{ $teacher->full_name }}</b></h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Required Field(s) is(are) marked<b class="text-danger">*</b></p>
                                            <form action="{{ url('/admin/teachers/'.$teacher->id) }}" method="post" enctype="multipart/form-data" >

                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="put" />
                                            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
                                            <div class="form-group has-feedback">
                                                <label for="name">Name<b class="text-danger">*</b> </label>
                                                <input type="text" value="{{ $teacher->full_name }}" required name="full_name" class="form-control" placeholder="Class Name">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="email">Email<b class="text-danger">*</b> </label>
                                                <input type="text" value="{{ $teacher->email }}" required name="email" class="form-control" placeholder="teacher Coefficient">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="country">Country<b class="text-danger">*</b> </label>
                                                <select name="country" required class="form-control">
                                                    <option value="" disabled selected>Select country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->country_name }}" @if($country->country_name == $teacher->country) selected @endif>{{ $country->country_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="phone">Phone </label>
                                                <input name="phone" value="{{ $teacher->phone }}" required placeholder="phone" class="form-control" />
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="address"> Address </label>
                                                <input name="address" value="{{ $teacher->address }}" required placeholder="address" class="form-control" />
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="teacher_image"> Teacher's Profile Photo(Optional) </label>
                                                <input name="teacher_image" value="{{ $teacher->teacher_image }}" type="file" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>SUBMIT EDIT</button>
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
                                <td><h5 class="text-success">No Teacher Has Been Added Yet</h5></td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Profile</th>
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
            <h4 class="modal-title">Add New Teacher</h4>
        </div>
        <div class="modal-body">
            <p>Required Field(s) is(are) marked<b class="text-danger">*</b></p>
            <form action="{{ url('admin/teachers') }}" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                        <label for="name">Name<b class="text-danger">*</b> </label>
                        <input type="text" required name="full_name" class="form-control" placeholder="Teacher's Full Name">
                    </div>
                    <div class="form-group has-feedback">
                        <label for="email">Email<b class="text-danger">*</b> </label>
                        <input type="text" required name="email" class="form-control" placeholder="Teacher's Email">
                    </div>
                    <div class="form-group has-feedback">
                        <label for="country">Country<b class="text-danger">*</b> </label>
                        <select name="country" required class="form-control">
                            <option value="" disabled selected>Select country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="phone">Phone<b class="text-danger">*</b> </label>
                        <input name="phone" required placeholder="Teacher's Phone" class="form-control" />
                    </div>
                    <div class="form-group has-feedback">
                        <label for="address"> Address<b class="text-danger">*</b> </label>
                        <input name="address" required placeholder=" Teacher's Address" class="form-control" />
                    </div>
                    <div class="form-group has-feedback">
                        <label for="teacher_image"> Teacher's Profile Photo(Optional) </label>
                        <input name="teacher_image" type="file" class="form-control" />
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
