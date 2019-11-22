@extends('layout.appLayout.app_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h3>
            Detail Information For:
            <small>{{ $teacher->full_name }}</small>
        </h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Teacher detail</li>
        </ol>
    </section>

    {{-- Call message to display on success or failiure --}}
    @include('snippets.messages')

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
                                                    <img src="{{ $teacher->teacher_image }}" class="img-circle" title="STILL UNDER DEVELOPMENT" alt="User Image">
                                                        <h4><a href="#" class="btn btn-default btn-mini" title="STILL UNDER DEVELOPMENT :)"><i class="glyphicon glyphicon-edit"></i>Edit profile...</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-sm-4 col-xs-6 card bg-grey">
                                                <div class="content">
                                                    <p><b>Full Name:</b> {{ $teacher->full_name }}</p>
                                                    <p><b>Address:</b> {{ $teacher->address }}</p>
                                                    <p><b>Email:</b> {{ $teacher->email }}</p>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-sm-4 col-xs-6">
                                                <div class="content">
                                                    <p><b>Country:</b> {{ $teacher->country }}</p>
                                                    <p><b>Phone:</b> {{ $teacher->phone }}</p>
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
                                        <h3 class="box-title">Teachers Subjects</h3><button  data-toggle="modal" data-target="#assign-subjcets" class="btn btn-primary add-button" title="Assign subjects to this Teacher"><i class="glyphicon glyphicon-plus"></i>Assign Subjects</button>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <p>List of all Teacher's subjects that he teaches</p>
                                        <table id="example1" class="table table-bordered table-striped table-hoverable">
                                            <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Coefficient</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @if(count($teachers) > 0) --}}
                                                    @foreach($teacher->subjects as $subject)
                                                        <tr>
                                                            <td>{{ $subject->id }} </td>
                                                            <td> {{ $subject->name }} </td>
                                                            <td> {{ $subject->description }} </td>
                                                            <td> {{ $subject->coefficient }} </td>
                                                            <td> {{ $subject->type }} </td>
                                                            <td>
                                                                <form action="{{ url('admin/classes/') }}" method="post">
                                                                    <input type="hidden" name="_method" value="delete" />
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                                    <button type="submit" title="UnAssign This subject To This Teacher" class="btn btn-danger btn-mini delete-record"><i class="glyphicon glyphicon-remove"></i> </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                 @endforeach
                                                {{-- @else
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
                                            <th>Coefficient</th>
                                            <th>Type</th>
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
                                        <h3 class="box-title">Teachers Classes</h3><button  data-toggle="modal" data-target="#assign-class" class="btn btn-primary add-button" title="Assign classes to this Teacher"><i class="glyphicon glyphicon-plus"></i>Assign Classes</button>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <p>List of all Teacher's classes</p>
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
                                                    {{-- @if(count($teacher_classes) > 0) --}}
                                                        @foreach($teacher->classes as $class)
                                                            <tr>
                                                                <td>{{ $class->id }} </td>
                                                                <td> {{ $class->name }} </td>
                                                                <td> {{ $class->description }} </td>
                                                                <td>
                                                                    <form action="{{ url('admin/remove-class/'.$class->id) }}" method="post">
                                                                    <input type="hidden" name="_method" value="delete" />
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                                    <button type="submit" title="UnAssign This class to this Teacher" class="btn btn-danger btn-mini delete-record"><i class="glyphicon glyphicon-remove"></i> </button>
                                                                    </form>
                                                                    </td>
                                                                </td>
                                                            </tr>
                                                     @endforeach
                                                    {{-- @else
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

 <div class="modal fade" id="assign-subjcets">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Assign Subjects</h4>
            </div>
            <div class="modal-body">
                <p>Select All That Apply</p>
                <form action="{{ url('/admin/assign-subject') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <input type="hidden" name="teacher_id" value="{{ $teacher->id }}" />
                        <label for="country">Assign Subjects To This Teacher</label><br/>
                        @foreach ($subjects as $subject)
                            <input type="checkbox" name="subject_id[]" multiple="multiple" value="{{ $subject->id }}">
                            <label for="subjects">{{ ucfirst($subject->name) }}</label>
                        @endforeach
                    </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Assign Selected Subjects</button>
        </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="assign-class">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Assign Classes To This Teacher</h4>
            </div>
            <div class="modal-body">
                <p>Select All That Apply</p>
                <form action="{{ url('/admin/assign-class') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group has-feedback">
                        <input type="hidden" name="teacher_id" value="{{ $teacher->id }}" />
                        <label for="teacherClass">Assign Classes To This Teacher</label><br/>
                        @foreach ($classes as $class)
                            <input type="checkbox" name="student_class_id[]" value="{{ $class->id }}">
                            <label for="class">{{ ucfirst($class->name) }}</label>
                        @endforeach
                    </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign Selected Classes</button>
                </form>
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection
{{-- *860*32# --}}
