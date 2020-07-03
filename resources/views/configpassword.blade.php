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
         	width: 550px;
         	height: auto;
            margin-top: 36%;
             margin-left: -32%;
         }
         .input-group-addon{
            box-sizing: border-box;
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
                        <div class="panel-body">
                           <form id="register-form" role="form" autocomplete="off" class="form" method="POST" action="{{route('login.postConfirm')}}">
                              @csrf()
                              <div class="form-group">
                                 Yêu cầu nhập Thông tin:
                                  <div class="input-group">

                                    <span class="input-group-addon">
                                       Nhập Email của bạn: 
                                    </span>

                                    <input name="email" placeholder="Nhập email của bạn" class="form-control"  type="email">
                                    
                                 </div>
                                 @if(session('danger'))
                                     <div class="alert alert-danger">
                                       {{session('danger')}}
                                     </div>  
                                 @endif<br>
                                 <div class="input-group">

                                    <span class="input-group-addon">
                                       Nhập mật khẩu mới: 
                                    </span>

                                    <input name="password" placeholder="Nhập mật khẩu mới" class="form-control"  type="password">
                                    
                                 </div>
                                 @if($errors->has('password'))
                                        <div class="alert alert-danger">
                                            <p>{{$errors->first('password')}}</p> 
                                          @endif
                                          </div><br>
                                 <div class="input-group">
                                     <span class="input-group-addon">
                                       Nhập lại mật khẩu: &nbsp
                                    </span>
                                           
                                    <input  name="password_confirm" placeholder="Nhập lại mật khẩu" class="form-control"  type="password">
                                   
                                 </div>
                                  @if($errors->has('password_confirm'))
                                        <div class="alert alert-danger">
                                         <p>{{$errors->first('password_confirm')}}</p>
                                          @endif
                                          </div>
                              </div>
                              <div class="form-group">
                                  
                                 <input class="btn btn-lg btn-primary btn-block" value="Xác Nhận" type="submit">
                              </div>
                              
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

