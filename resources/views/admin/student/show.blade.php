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
    <div class="container">
        {{-- Call message to display on success or failiure --}}
        @include('snippets.messages')
    </div>
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
                                                        <img src="{{ asset($student->student_image) }}" alt="upload image." class="img-circle" height=120px width=120px>
                                                        <h4><a href="#" title="UNDER DEVELOPMENT :)" class="btn btn-default btn-mini"><i class="glyphicon glyphicon-pencil"></i>Edit profile...</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-sm-4 col-xs-6 card bg-grey">
                                                <div class="content">
                                                    <p><b>Full Name:</b> {{ $student->full_name }}</p>
                                                    <p><b>Student Class:</b> {{ $student->studentClass->name }}</p>
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
                                <h3 class="box-title">Student Subjects</h3><button  data-toggle="modal" data-target="#modal-default" class="btn btn-primary add-button" title="Add Student Subjects"><i class="glyphicon glyphicon-plus"></i>ADD SUBJECTS</button>
                                </div>

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <p>List all student subjects here</p>
                                     <table id="example1" class="table table-bordered table-striped table-hoverable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Coefficient</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($student->subjects) > 0)
                                                @foreach($student->subjects as $subject)
                                                    <tr>
                                                        <td> {{ $subject->id }} </td>
                                                        <td> {{ $subject->name }} </td>
                                                        <td> {{ $subject->coefficient }} </td>
                                                        <td> {{ $subject->description }} </td>
                                                        <td>
                                                            <a href="{{ url('admin/student-remove-subject/'.$subject->id) }}" ><button title="UnAssign This subject to this Student" class="btn btn-danger delete-record btn-mini" ><i class="glyphicon glyphicon-remove"></i></button></a>
                                                        </td>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td><h5 class="text-success">No Subject Has Been Added  For this Student Yet</h5></td>
                                                </tr>
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Coefficient</th>
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
            <h4 class="modal-title">Add Student Subjects</h4>
        </div>
        <div class="modal-body">
            <p>Select all that apply</p>
            <form action="{{ url('admin/student-assign-subject') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                        <input type="hidden"  name="student_id" value="{{ $student->id }}">
                    @foreach ($subjects as $subject)
                    <input type="checkbox" name="subject_id[]" multiple="multiple" value="{{ $subject->id }}">
                    <label for="subjects">{{ ucfirst($subject->name) }}</label>
                    @endforeach

                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>SUBMIT</button>
        </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
 </div>

@endsection
