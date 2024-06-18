<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $login = $request->only('phone', 'password');
        if (Auth::guard('user')->attempt($login)) {
            session()->flash('success', 'Đăng nhập thành công');
            return redirect()->route('us.index');
        } else {
            session()->flash('error', 'Tên đăng nhập hoặc Mật khẩu không chính xác');
            return redirect()->route('us.login');
        }
    }

    public function register(Request $request)
    {
        if ($request->href) {
            $user = User::where('phone', $request->href)->first();
            if ($user) {
                return view('user.register')->with(compact('user'));
            }
        }
        return view('user.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->only('name', 'address', 'phone', 'year_of_birth', 'gender');
        if ($request->invite_user != '') {
            $f1 = User::where('phone', $request->invite_user)->first();
            if (!$f1) {
                session()->flash('error', 'Không tìm thấy người giới thiệu');
                return redirect()->back();
            } else {
                $data['invite_user'] = $f1->id;

                $f2 = User::where('id', $f1->id)->first();

                if ($f2) {
                    $data['f2_id'] = $f2->invite_user;

                    $f3 = User::where('id', $f2->invite_user)->first();
                    if ($f3) {
                        $data['f3_id'] = $f3->invite_user;
                    }
                }
            }
        }
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if ($user) {

            //            Auth::guard('user')->login($user);
            //            session()->flash('success', 'Đăng ký thành công');
            //            return redirect()->route('us.index');
            // Tạo đơn hàng phí thành viên
            $order['user_id'] = $user->id;
            $order['name'] = $user->name;
            $order['phone'] = $user->phone;
            $order['address'] = $user->address;
            $order['total_money'] = 1000000;
            $order['gift_money'] = 1000000;
            $order['payment_method'] = 0;
            $order['pro_type'] = 1;
            $store = Order::create($order);
            if ($store) {
                Auth::guard('user')->login($user);
                session()->flash('success', 'Đăng ký thành công');
                return redirect()->route('us.index');
            } else {
                session()->flash('error', 'Đăng ký thất bại! Vui lòng thử lại!');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Đăng ký thất bại! Vui lòng thử lại!');
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('us.login');
    }

    public function forgotPass()
    {
        return view('user.forgotPass');
    }
    public function forgotPass_post(Request $request)
    {
        //        dd($request->all());
        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            if ($user->email != null) {
                $password = time();
                $user->password = Hash::make($password);
                $user->save();
                //                dd($password,$user->email);
                SendEmail::dispatch($password, $user->email)->delay(now()->addMinute(1));

                session()->flash('success', 'Mật khẩu mới đã được gửi đến email : ' . $user->email . ' ');
                return redirect()->back();
            } else {
                session()->flash('error', 'Tài khoản của bạn chưa cập nhật Email. vui lòng liên hệ với quản trị viên!');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Không tìm thấy thành viên. Vui lòng kiểm tra lại số điện thoại!');
            return redirect()->back();
        }
    }
}
