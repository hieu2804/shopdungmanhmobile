<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\login_request;
use Auth;
use App\User;
use Carbon\Carbon;
use Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
class loginController extends Controller
{
	public function getLogin(Request $request)
    {
    	return view('login');
    }
    public function postLogin(Request $request)
    {
    	// return dd($request);
    	$request ->validate([
    		'email' => 'required|email',
    		'password'=>'required|min:6|max:32'


    	],[
    		'email.required' =>'Bạn chưa nhập email',
    		'email.email' =>'Email chưa đúng định dạng',
    		'password.required' =>'Bạn chưa nhập password',
    		'password.min' =>'Password ít nhất 6 ký tự',
    		'password.max' =>'Password nhiều nhất 32 ký tự'
    	]);

    	// $remember = $request->has('remember') ? true : false ;

    	$email['info'] = $request->email;
    	$pass = $request->password;
    	if(Auth::attempt(['email'=>$email, 'password'=>$pass]))
    	{
    		return view('layout',$email)->with('ok','email');
    	}
    	else
    	{
    		return redirect()->back()->with('danger','tài khoản hoặc mật khẩu không chính xác');
    	}
    }
    public function logout(){
    	Auth::logout();
    	return redirect('login');
    }
    public function getForgotpassword(){
    	return view('forgotpassword');
    }

    public function postForgotpassword(Request $request){
    	$email = $request->email;
    	$checkUser = User::where('email',$email)->first();
    	if(!$checkUser){
    		return redirect()->back()->with('danger','Email không tồn tại');
    	}

    	$code  = bcrypt(md5(time().$email));
    	$checkUser->code = $code;
    	$checkUser->time_code = Carbon::now();
    	$checkUser->save();

    	
    	// cach2:  	$url = route('reset_password',['code'=>$checkUser->code,'email'=>$email]);

    	// $data =[
    	// 	'route' =>$url
    	// ];
    	//    Mail::send('reset_password', $data, function($message) use ($email){ $message->to($email, 'Reset Password')->subject('Lấy lại mật khẩu');
    	// });
    	// cach 1: Mail::to($email)->send(new \App\Mail\send_email($details));
    	return redirect()->route('login.test','$email')->with('success','Thành Công! Link lấy lại mật khẩu đã được gửi vào email của bạn');
    }
    public function testpassword(Request $request){
    	return view('configpassword');
    }
    public function getConfirmpassword(Request $request){
    	//ckeck email and code

    }
    public function postConfirmpassword(Request $request){
            $email = $request->email;
            $checkUser = User::where('email',$email)->first();
            if(!$checkUser){
                return redirect()->back()->with('danger','Email không tồn tại');
            }

            $code  = bcrypt(md5(time().$email));
            $checkUser->code = $code;
            $checkUser->time_code = Carbon::now();
            $checkUser->save();
    	$request->validate([
    		'password' =>'required|min:6|max:32',
    		'password_confirm' =>'required|same:password|min:6|max:32'
    	],
    	[
    		'password.required' =>'Mật khẩu không được để trống',
            'password.min' =>'Mật khẩu ít nhất 6 ký tự',
            'password.max' =>'Mật khẩu nhiều nhất 32 ký tự',
            'password_confirm.required' =>'Mật khẩu mới không được để trống',
            'password_confirm.same' =>'Mật khẩu không giống nhau',
            'password_confirm.min' =>'Mật khẩu mới ít nhất 6 ký tự',
            'password_confirm.max' =>'Mật khẩu mới nhiều nhất 32 ký tự',
    	]);
    	$password = $request->password;
    	
    	$checkUser= DB::table('taikhoan')
		            ->where('email', $email)
		            ->update(['password' => bcrypt($password)]);
    	return redirect()->route('login')->with('sucsess','Thay đổi mật khẩu thành công!');
    }	
}
