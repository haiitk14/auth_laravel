<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Validator;
use Lang;
use Hash;
use Auth;

class AuthController extends Controller
{
   
    /**
     * AuthController constructor
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct()
    {
    }

    /**
     * Show login from
     *
     * @return View
     */
    public function login()
    {   
        return view('admin.auth.login');
    }

    /**
     * Operation login
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $rules = [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ];

        $messages = [
            'username.required' => __('Vui lòng nhập Tên đăng nhập.'),
            'password.required' => __('Vui lòng nhập Tên mật khẩu.'),
            'password.min'      => __('Mật khẩu phải chứa ít nhất 6 ký tự.'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages())->withInput();
        }

        $userData = array(
            'username'  => $request->get('username'),
            'password' => $request->get('password')
        );

        // if (Auth::attempt($userData)) {
            
        //     if (Auth::user()->is_admin == 0) {
        //         Auth::logout();
        //         return response('Unauthorized action.', 403);
        //     } else {
                return redirect()->intended('/admin');
        //     }
        // } else {
        //     return back()->with('error', __('Tên đăng nhập hoặc mật khẩu không đúng.'));
        // }

    } 

    /**
     * Logout admin
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        // Auth::logout();
        return redirect('admin/login');
    }
}
