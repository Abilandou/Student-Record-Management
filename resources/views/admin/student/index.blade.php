@extends('layout.appLayout.app_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Students
        <small>All students</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">school requirements</a></li>
        <li class="active">Students</li>
      </ol>
    </section>
    @include('snippets.messages')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Select Class
                <form action="{{ url('admin/student-class') }}" method="post">
                  {{ csrf_field() }}

                  <select name="student_class" class="form-control">
                    @foreach($classes as $class)
                      <option value="{{ $class->name }}">{{ $class->name }}</option>
                    @endforeach
                  </select>
                  <button class="btn btn-primary">view</button>
                </form>
              </h3><a href="{{ url('admin/students/create') }}" class="btn btn-primary add-button" title="Add New Student"><i class="glyphicon glyphicon-plus"></i>ADD NEW</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-responsive table-striped table-hoverable">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Class</th>
                  <th>Phone</th>
                  <th>Image</th>
                  <th>Date of Birth</th>
                  <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                    @if(count($students) > 0)
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->full_name }}</td>
                                <td>{{ $student->studentClass->name }}</td>
                                <td>{{ $student->student_phone }}</td>
                                <td><img src="{{ asset($student->student_image) }}" alt="upload image." class="img-circle" height=60px width=60px></td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td>
                                    <a href="{{ url('admin/students/'.$student->id) }}" title="View Student Details" class="btn btn-success btn-mini"><i class="glyphicon glyphicon-eye-open"></i></a>

                                    <a href="{{ url('admin/students/'.$student->id.'/edit') }}" title="Edit Student" class="btn btn-primary btn-mini"><i class="glyphicon glyphicon-pencil"></i></a>


                                    <form action="{{ url('admin/students/'.$student->id) }}" method="post">
                                    <input type="hidden" name="_method" value="delete" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <button type="submit" title="Delete Student" class="btn btn-danger btn-mini delete-record"><i class="glyphicon glyphicon-trash"></i> </button>
                                    </form>

                                    </td>
                                </td>
                            </tr>

                        @endforeach
                    @else
                        <tr>
                            <td><h5 class="text-success">No Student Has Been Added Yet</h5></td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Class</th>
                  <th>Phone</th>
                  <th>Image</th>
                  <th>Date of Birth</th>
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
@endsection
