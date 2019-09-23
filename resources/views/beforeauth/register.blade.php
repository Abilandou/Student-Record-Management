@include('beforeauth.header')

<div class="register-box card bg-info">
        <div class="register-logo">
          <b>STUDENT</b>RECORD
        </div>

        <div class="register-box-body">
          <p class="login-box-msg">Register a new teacher</p>

          <form action="{{ url('register') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
              <input type="text" name="name" class="form-control" placeholder="Full name">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" name="email" class="form-control" placeholder="Email">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="passwrd_confirmation" class="form-control" placeholder="Retype password">
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat float-right">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <br/>

          <a href="{{ url('teacher-login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
      </div>


      <script>
            $(function () {
              $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
              });
            });
          </script>
