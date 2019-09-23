@include('beforeauth.header')


<div class="login-box">
        <div class="login-logo">
                <b>STUDENT</b>RECORD
                {{-- Messages --}}
{{--  @include('snippets.messages')  --}}
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="../../index2.html" method="post">
            <div class="form-group has-feedback">
              <input type="email" class="form-control" placeholder="Email">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          {{-- <a href="#">I forgot my password</a><br> --}}
          <a href="{{ url('teacher-register') }}" class="text-center">I donot have and account yet</a>

        </div>
        <!-- /.login-box-body -->
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


