@extends('layout.appLayout.app_design')
@section('content')

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Editing...
        <small><b class="text-success">{{ $student->full_name }}</b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">school requirements</a></li>
        <li class="active">add student</li>
      </ol>
    </section>
    @include('snippets.messages')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-12 col-sm-12">
          <div class="box">
            <div class="box-header">
              <p><i>Required Fields are marked</i><b class="text-danger">*</b></p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <form action="{{ url('admin/students/'.$student->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put" />
                <div class="container">

                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                            </div>
                            <label>First Name<b class="text-danger">*</b></label>
                            <input type="text" placeholder="first name" min="3" value="{{ $student->first_name }}" name="first_name" autofocus="" required="" class="form-control">
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>

                       <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                            </div>
                            <label>Middle Name<b class="text-danger">*</b></label>
                            <input type="text" value="{{ $student->middle_name }}" placeholder="middle name" min="3" name="middle_name" required="" class="form-control" >
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                            </div>
                            <label>Last Name(optional)</label>
                            <input type="text" value="{{ $student->last_name }}" placeholder="last name" min="3" name="last_name" class="form-control">
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>

                       <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <label>Date of Birth<b class="text-danger">*</b></label>
                             <input type="date" value="{{ $student->date_of_birth }}" required="" placeholder="date of birth" name="date_of_birth" class="form-control" id="datepicker">
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-map"></i>
                            </div>
                            <label>Place of Birth<b class="text-danger">*</b></label>
                            <input type="text" value="{{ $student->place_of_birth }}" required="" placeholder="place of birth" name="place_of_birth" class="form-control">
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>

                       <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-bed"></i>
                            </div>
                            <label>Gender<b class="text-danger">*</b></label>
                             <select name="sex" class="form-control" required="">
                               <option value="{{ $student->sex }}" selected="">{{ $student->sex }}</option>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                               <option value="Other">Prefer Not to say</option>
                             </select>
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            <label>Parent(Guidian) Phone<b class="text-danger">*</b></label>
                            <input type="text" value="{{ $student->parent_phone }}" placeholder="guidian phone number" name="parent_phone" required="" class="form-control">
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>

                       <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            <label>Student Phone(Optional)</label>
                            <input type="text" value="{{ $student->student_phone }}" placeholder="student phone number" name="student_phone" class="form-control" >
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-building"></i>
                            </div>
                            <label>Parent(Guidian) Address<b class="text-danger">*</b></label>
                            <input type="text" value="{{ $student->parent_address }}" placeholder="parent(guidian) address" name="parent_address" required="" class="form-control">
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>

                       <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-building"></i>
                            </div>
                            <label>Student Address<b class="text-danger">*</b></label>
                            <input type="text" value="{{ $student->student_address }}" placeholder="student address" name="student_address" required="" class="form-control" >
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-envelope"></i>
                            </div>
                            <label>Student Email(Optional)</label>
                            <input type="email" value="{{ $student->student_email }}" placeholder="student email" name="student_email" class="form-control">
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>

                       <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-book"></i>
                            </div>
                            <label>School Last Attended(Optional)</label>
                            <input type="text" value="{{ $student->school_last_attended }}" placeholder="school last attended" name="school_last_attended" class="form-control" >
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-building"></i>
                            </div>
                            <label>Student Class</label>
                            <select name="class_id" class="form-control" required="">
                               <option value="" selected="" disabled="">Select Student Class</option>
                               @foreach($classes as $class)
                                <option value="{{ $class->id }}" @if($class->id == $student->class_id) selected @endif>{{ $class->name }}</option>
                               @endforeach

                             </select>
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>

                       <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-profile"></i>
                            </div>
                            <label>Student Profile Picture(Optional)</label>
                            <input type="file" value="{{ $student->student_image }}" name="student_image" class="form-control" >
                          </div>
                        <!-- /.input group -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <div class="input-group">
                       <input type="hidden" name="full_name" >
                        <button type="submit" title="Submit edited student data" class="btn btn-success pull-right submit-button "><i class="glyphicon glyphicon-pencil"></i>SUBMIT EDIT</button>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </form>
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
