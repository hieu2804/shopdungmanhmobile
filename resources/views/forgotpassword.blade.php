<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <style type="text/css">
         body{
         background-image:  url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
             background-size: cover;
         }
         .panel{
         	width: 350px;
         	height: auto;
         	margin-top: 27%;
         }
      </style>
   </head>
   <body>
      <div class="form-gap"></div>
      <div class="container">
         <div class="row">
            <div class="col-md-4 col-md-offset-4">
               <div class="panel panel-default">
                  <div class="panel-body">
                     <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Quên mật khẩu</h2>
                        <p>Vui lòng nhập địa chỉ email của bạn</p>
                         @if(session('danger'))
                                     <div class="alert alert-danger">
                                       {{session('danger')}}
                                     </div>  
                                 @endif
                                  @if(session('success'))
                                     <div class="alert alert-success">
                                       {{session('success')}}
                                       <p><a href="{{route('login.test')}}">Ấn vào đây để lấy lại mật khẩu</a></p>
                                     </div>  
                                 @endif
                        
                        <div class="panel-body">
                           <form id="register-form" role="form" autocomplete="off" class="form" method="POST" action="{{route('forgotpasswordpost')}}">
                           	@csrf()
                              <div class="form-group">
                                 <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="email" name="email" placeholder="Nhập địa chỉ email" class="form-control"  type="email">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Xác Nhận" type="submit">
                              </div>
                              <!-- <input type="hidden" class="hide" name="token" id="token" value="">  -->
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>

