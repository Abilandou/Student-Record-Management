@extends('layout.appLayout.app_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h3>
            Detail Information For:
            <small>{{ $student->full_name }}</small>
        </h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">student detail</li>
        </ol>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-sm-12 col-xs-6">
                <!-- small box -->
                <div class="card">
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Personal Information</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-3 col-xs-6">
                                                <!-- small box -->
                                                <div class="small-box">
                                                    <div class="inner">
                                                    <img src="{{ $student->student_image }}" class="img-circle" alt="User Image">
                                                        <h4><a href="#" title="UNDER DEVELOPMENT :)" class="btn btn-default btn-mini"><i class="glyphicon glyphicon-pencil"></i>Edit profile...</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-sm-4 col-xs-6 card bg-grey">
                                                <div class="content">
                                                    <p><b>Full Name:</b> {{ $student->full_name }}</p>
                                                    <p><b>Student Class:</b> {{ $student->student_class->name }}</p>
                                                    <p><b>Date of Birth:</b> {{ $student->date_of_birth }}</p>
                                                    <p><b>Place of Birth:</b> {{ $student->place_of_birth }}</p>
                                                    <p><b>Gender:</b> {{ $student->sex }}</p>
                                                    <p><b>Student Address:</b> {{ $student->student_address }}</p>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-sm-4 col-xs-6">
                                                <div class="content">
                                                    <p><b>Parent(Guidian) Address:</b> {{ $student->parent_address }}</p>
                                                    <p><b>Student Phone:</b> {{ $student->student_phone }}</p>
                                                    <p><b>Parent(Guidian) Phone:</b> {{ $student->parent_phone }}</p>
                                                    <p><b>Student Email:</b> {{ $student->student_email }}</p>
                                                    <p><b>School Last Attended:</b> {{ $student->school_last_attended }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </section>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-sm-12 col-xs-6">
                <!-- small box -->
                <div class="card">
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                <h3 class="box-title">Other Attributes</h3><button  data-toggle="modal" data-target="#modal-default" class="btn btn-primary add-button" title="Add Student Attributes"><i class="glyphicon glyphicon-plus"></i>ADD ATTRIBUTES</button>
                                </div>

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <p>List all student subjects here</p>
                                     <table id="example1" class="table table-bordered table-striped table-hoverable">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Instructor</th>
                      <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                        {{-- @if(count($classes) > 0)
                            @foreach($classes as $class) --}}
                                <tr>
                                    <td> classid </td>
                                    <td> classname </td>
                                    <td> classdescription </td>
                                    <td>
                                        <!-- <a href="{{ url('admin/classes/') }}" title="View Class Details" class="btn btn-success btn-mini"><i class="glyphicon glyphicon-eye-open"></i></a>

                                        <button data-toggle="modal" data-target="#modal-default" title="Edit Class" class="btn btn-primary btn-mini"><i class="glyphicon glyphicon-edit"></i></button>

                                        <form action="{{ url('admin/classes/') }}" method="post">
                                        <input type="hidden" name="_method" value="delete" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <button type="submit" title="Delete class" class="btn btn-danger btn-mini delete-record"><i class="glyphicon glyphicon-trash"></i> </button>
                                        </form>
                                       -->
                                        </td>
                                    </td>
                                </tr>

                          {{--  @endforeach
                         @else
                            <tr>
                                <td><h5 class="text-success">No Class Has Been Added Yet</h5></td>
                            </tr>
                        @endif --}}
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
                </div>
            </div>
        </div>
    </section>
</div>

 <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Student Attributes</h4>
        </div>
        <div class="modal-body">
            <p>Required Field(s) is(are) marked<b class="text-danger">*</b></p>
            <form action="{{ url('admin/classes') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <label for="name">Matricle Number(Unique Identification Number)<b class="text-danger">*</b> </label>
                    <input type="text" required name="name" class="form-control" placeholder="Class Name">

                </div>
                <div class="form-group has-feedback">
                    <label for="name">Subjects<b class="text-danger">*</b> </label>
                    <input type="text" required name="name" class="form-control" placeholder="Class Name">

                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>SUBMIT ATTRIBUTES</button>
        </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
 </div>

@endsection
