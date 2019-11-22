@extends('layout.appLayout.app_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h3>
            Detail Information For:
            <small>{{ $class->name }}</small>
        </h3>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">class detail</li>
        </ol>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h4>Name</h4>
                        <p>{{ $class->name }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-sm-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                    <h4>Number Of Students<sup style="font-size: 10px"></sup></h4>

                    {{-- <h4 class="btn btn-primary">{{ $students->count() }}</h4> --}}
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-sm-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h4>Description</h4>
                        <p>{{ $class->description }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-xs-6">
                <!-- small box -->
                <div class="card">
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                <h3 class="box-title">Subjects Of <b class="text-success">{{ $class->name }}</b></h3><button  data-toggle="modal" data-target="#assign-class-subjcets" class="btn btn-primary add-button" title="Assign Subjects To This Class"><i class="glyphicon glyphicon-plus"></i>ASSIGN SUBJECTS</button>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped table-hoverable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Date of Birth</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->full_name }}</td>
                                            <td>{{ $student->student_address }}</td>
                                            <td>{{ $student->student_phone }}</td>
                                            <td>{{ $student->date_of_birth }}</td>
                                            <td>
                                                <a href="{{ url('admin/students/'.$student->id) }}" title="View Student Details" class="btn btn-success btn-mini"><i class="glyphicon glyphicon-eye-open"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Date of Birth</th>
                                        <th>Action</th>
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

            <div class="col-sm-12 col-xs-6">
                <!-- small box -->
                <div class="card">
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                <h3 class="box-title">Students In {{ $class->name }} </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped table-hoverable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Date of Birth</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->full_name }}</td>
                                            <td>{{ $student->student_address }}</td>
                                            <td>{{ $student->student_phone }}</td>
                                            <td>{{ $student->date_of_birth }}</td>
                                            <td>
                                                <a href="{{ url('admin/students/'.$student->id) }}" title="View Student Details" class="btn btn-success btn-mini"><i class="glyphicon glyphicon-eye-open"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Date of Birth</th>
                                        <th>Action</th>
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

<div class="modal fade" id="assign-class-subjcets">
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
                        <input type="hidden" name="class_id" value="{{ $class->id }}" />
                        <label for="country">Assign Subjects To This Class</label><br/>
                        @foreach ($subjects as $subject)
                            <input type="checkbox" name="subject_id[]" multiple="multiple" value="{{ $subject->id }}">
                            <label for="subjects">{{ ucfirst($subject->name) }}</label>
                        @endforeach
                    </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>ASSIGN SELECTED SUBJECTS</button>
        </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
