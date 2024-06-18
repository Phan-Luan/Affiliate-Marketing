<?php

namespace App\Http\Controllers\User;

use App\Components\Partners\Tele;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Cart;

class AccountController extends Controller
{
    protected $tele;
    public function __construct(Tele $tele)
    {
        $this->tele = $tele;
    }
    public function profile()
    {
        return view('user.account.profile');
    }
    public function profile_update(Request $request)
    {
        $data = $request->only('name', 'year_of_birth', 'gender', 'email', 'address');
        $user = users()->user();
        $check_mail = User::where('email', $request->email)->where('id', '!=', $user->id)->first();
        if ($check_mail) {
            session()->flash('error', 'Email đã tồn tại!');
            return redirect()->back();
        }
        $update = $user->update($data);
        if ($update) {
            session()->flash('success', 'Cập nhật thành công!');
            return redirect()->back();
        } else {
            session()->flash('error', 'Cập nhật thất bại!');
            return redirect()->back();
        }
    }
    public function bank()
    {
        return view('user.account.bank');
    }
    public function bank_update(Request $request)
    {
        $data = $request->only('bank', 'name', 'number', 'branch');
        $check_bank = Bank::where('user_id', users()->user()->id)->first();
        if ($check_bank) {
            $check_bank->update($data);
            session()->flash('success', 'Cập nhật tài khoản ngân hàng thành công!');
        } else {
            $data['user_id'] = users()->user()->id;
            Bank::create($data);
            session()->flash('success', 'Thêm tài khoản ngân hàng thành công!');
        }
        return redirect()->back();
    }
    public function changepassword()
    {
        return view('user.account.changepassword');
    }
    public function change_password(Request $request)
    {
        $user = users()->user();
        if (Hash::check($request->oldPassword, $user->password)) {
            if ($request->newPassword == $request->confirmNewPassword) {
                $user->password = Hash::make($request->newPassword);
                $user->save();
                session()->flash('success', 'Cập nhật mật khẩu thành công!');
                return redirect()->back();
            } else {
                session()->flash('error', 'Hai mật khẩu không khớp!');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Mật khẩu cũ không đúng!');
            return redirect()->back();
        }
    }
    public function checkmember()
    {
        $order = Order::where('user_id', users()->user()->id)->where('pro_type', 4)->first();
        return view('user.account.nopPhiThanhVien')->with(compact('order'));
    }
    public function upload_bill(Request $request)
    {
        if ($request->image) {
            $user = users()->user();

            $arg = [
                'user_id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'address' => $user->address,
                'total_money' => 1900000,
                'gift_money' => 1900000,
                'pro_type' => 4,
            ];


            $order = Order::create($arg);
            if ($order) {
                $order->bill = $this->uploadFile($request->image);
                $order->save();
                session()->flash('success', 'Thành công. Vui lòng đợi quản trị viên xét duyệt!');
                return redirect()->route('us.checkmember');
            } else {
                session()->flash('error', 'Có lỗi. Vui lòng thử lại sau!');
                return redirect()->route('us.checkmember');
            }

            //            dd($this->uploadFile($request->image));
            //            $this->tele->send_bill($user,0,$order->bill);
        } else {
            session()->flash('info', 'Vui lòng gửi ảnh chuyển khoản của bạn để được xét duyệt nhanh hơn!');
            return redirect()->back();
        }
    }
    public function memberconnect()
    {
        $order = Order::where('user_id', users()->user()->id)->where('pro_type', 2)->first();
        $total_money = Order::where('user_id', users()->user()->id)
            ->where('pro_type', 2)
            ->where('status', 1)
            ->sum('total_money');
        $totalvip = '';
        $money_recharge = 0;
        $vipnext = '';

        // Xác định loại thành viên dựa trên tổng total_money
        if ($total_money >= 1000000 && $total_money <= 2999999) {
            $totalvip = '1';
            $vipnext = "2";
            $money_recharge = 3000000 - $total_money;
        } elseif ($total_money >= 3000000 && $total_money <= 5999999) {
            $totalvip = '2';
            $vipnext = "3";
            $money_recharge = 6000000 - $total_money;
        } elseif ($total_money >= 6000000 && $total_money <= 49999999) {
            $totalvip = '3';
            $vipnext = "4";
            $money_recharge = 50000000 - $total_money;
        } elseif ($total_money >= 50000000 && $total_money <= 99999999) {
            $totalvip = '4';
            $vipnext = "5";
            $money_recharge = 100000000 - $total_money;
        } elseif ($total_money >= 100000000) {
            $totalvip = '5';
            $vipnext = "MAX";
            $money_recharge = 0;
        } else {
            $totalvip = '0';
            $vipnext = "1";
            $money_recharge = 1000000;
        }

        // Truyền dữ liệu sang view
        return view('user.account.thanhVienKetNoi', compact('order', 'total_money', 'totalvip', 'money_recharge', 'vipnext'));
    }

    public function memberconnect_bill(Request $request)
    {
        if ($request->image) {
            $user = users()->user();

            $arg = [
                'user_id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'address' => $user->address,
                'total_money' => $request->money,
                'gift_money' => $request->money,
                'pro_type' => 2,
                'pro_star' => $request->star,
            ];
            // dd($request->all());


            $order = Order::create($arg);
            if ($order) {
                $order->bill = $this->uploadFile($request->image);
                $order->save();
                session()->flash('success', 'Thành công. Vui lòng đợi quản trị viên xét duyệt!');
                return redirect()->route('us.memberconnect');
            } else {
                session()->flash('error', 'Có lỗi. Vui lòng thử lại sau!');
                return redirect()->route('us.memberconnect');
            }
        } else {
            session()->flash('info', 'Vui lòng gửi ảnh chuyển khoản của bạn để được xét duyệt!');
            return redirect()->back();
        }
    }
    public function represent()
    {
        $order = Order::where('user_id', users()->user()->id)->where('pro_type', 3)->first();
        $total_money = Order::where('user_id', users()->user()->id)
            ->where('pro_type', 3)
            ->where('status', 1)
            ->sum('total_money');
        $totalvip = '';
        $money_recharge = 0;
        $vipnext = '';

        // Xác định loại thành viên dựa trên tổng total_money
        if ($total_money >= 68000000 && $total_money <= 29999999) {
            $totalvip = 'Xã/Phường';
            $vipnext = "Quận/Huyện";
            $money_recharge = 30000000 - $total_money;
        } elseif ($total_money >= 30000000 && $total_money <= 2999999999) {
            $totalvip = 'Quận/Huyện';
            $vipnext = "Tỉnh";
            $money_recharge = 3000000000 - $total_money;
        } elseif ($total_money >= 3000000000) {
            $totalvip = 'Tỉnh';
            $vipnext = "MAX - Tỉnh";
            $money_recharge = 0;
        } else {
            $totalvip = 'Bạn Chưa Là Điểm Đại Diện ⭐⭐⭐⭐⭐';
            $vipnext = "Xã/Phường";
            $money_recharge = 68000000;
        }

        // Truyền dữ liệu sang view
        return view('user.account.nopPhiDaiDien', compact('order', 'total_money', 'totalvip', 'money_recharge', 'vipnext'));
    }

    public function represent_bill(Request $request)
    {
        // dd($request->all());
        if ($request->image) {
            $user = users()->user();

            $arg = [
                'user_id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'address' => $user->address,
                'total_money' => $request->money,
                'gift_money' => $request->money,
                'pro_type' => 3,
            ];
            // dd($request->all());


            $order = Order::create($arg);
            if ($order) {
                $order->bill = $this->uploadFile($request->image);
                $order->save();
                session()->flash('success', 'Thành công. Vui lòng đợi quản trị viên xét duyệt!');
                return redirect()->route('us.represent');
            } else {
                session()->flash('error', 'Có lỗi. Vui lòng thử lại sau!');
                return redirect()->route('us.represent');
            }
        } else {
            session()->flash('info', 'Vui lòng gửi ảnh chuyển khoản của bạn để được xét duyệt nhanh hơn!');
            return redirect()->back();
        }
    }
    // Quỹ Phụ Nữ
    public function womenfund()
    {
        $order = Order::where('user_id', users()->user()->id)->where('pro_type', 5)->first();
        $total_money = Order::where('user_id', users()->user()->id)
            ->where('pro_type', 5)
            ->where('status', 1)
            ->sum('total_money');
        // Truyền dữ liệu sang view
        return view('user.account.quyPhuNu', compact('order', 'total_money'));
    }

    public function womenfund_bill(Request $request)
    {
        // dd($request->all());
        if ($request->image) {
            $user = users()->user();

            $arg = [
                'user_id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'address' => $user->address,
                'total_money' => $request->money,
                'gift_money' => $request->money,
                'pro_type' => 5,
            ];
            // dd($request->all());


            $order = Order::create($arg);
            if ($order) {
                $order->bill = $this->uploadFile($request->image);
                $order->save();
                session()->flash('success', 'Thành công. Vui lòng đợi quản trị viên xét duyệt!');
                return redirect()->route('us.womenfund');
            } else {
                session()->flash('error', 'Có lỗi. Vui lòng thử lại sau!');
                return redirect()->route('us.womenfund');
            }
        } else {
            session()->flash('info', 'Vui lòng gửi ảnh chuyển khoản của bạn để được xét duyệt nhanh hơn!');
            return redirect()->back();
        }
    }
    // Quỹ Đầu Tư Sản Xuất
    public function manufacture()
    {
        $order60 = Order::where('user_id', users()->user()->id)->where('pro_type', 60)->first();
        $order61 = Order::where('user_id', users()->user()->id)->where('pro_type', 61)->first();
        $order62 = Order::where('user_id', users()->user()->id)->where('pro_type', 62)->first();
        $order63 = Order::where('user_id', users()->user()->id)->where('pro_type', 63)->first();
        $order64 = Order::where('user_id', users()->user()->id)->where('pro_type', 64)->first();
        $order65 = Order::where('user_id', users()->user()->id)->where('pro_type', 65)->first();
        $order66 = Order::where('user_id', users()->user()->id)->where('pro_type', 66)->first();
        $order67 = Order::where('user_id', users()->user()->id)->where('pro_type', 67)->first();
        $order68 = Order::where('user_id', users()->user()->id)->where('pro_type', 68)->first();
        $order69 = Order::where('user_id', users()->user()->id)->where('pro_type', 69)->first();

        // Tính tổng tiền cho từng pro_type
        $total_money60 = Order::where('user_id', users()->user()->id)->where('pro_type', 60)->where('status', 1)->sum('total_money');
        $total_money61 = Order::where('user_id', users()->user()->id)->where('pro_type', 61)->where('status', 1)->sum('total_money');
        $total_money62 = Order::where('user_id', users()->user()->id)->where('pro_type', 62)->where('status', 1)->sum('total_money');
        $total_money63 = Order::where('user_id', users()->user()->id)->where('pro_type', 63)->where('status', 1)->sum('total_money');
        $total_money64 = Order::where('user_id', users()->user()->id)->where('pro_type', 64)->where('status', 1)->sum('total_money');
        $total_money65 = Order::where('user_id', users()->user()->id)->where('pro_type', 65)->where('status', 1)->sum('total_money');
        $total_money66 = Order::where('user_id', users()->user()->id)->where('pro_type', 66)->where('status', 1)->sum('total_money');
        $total_money67 = Order::where('user_id', users()->user()->id)->where('pro_type', 67)->where('status', 1)->sum('total_money');
        $total_money68 = Order::where('user_id', users()->user()->id)->where('pro_type', 68)->where('status', 1)->sum('total_money');
        $total_money69 = Order::where('user_id', users()->user()->id)->where('pro_type', 69)->where('status', 1)->sum('total_money');

        // Truyền dữ liệu sang view
        return view(
            'user.account.quySanXuat',
            compact(
                'order60',
                'order61',
                'order62',
                'order63',
                'order64',
                'order65',
                'order66',
                'order67',
                'order68',
                'order69',
                'total_money60',
                'total_money61',
                'total_money62',
                'total_money63',
                'total_money64',
                'total_money65',
                'total_money66',
                'total_money67',
                'total_money68',
                'total_money69'
            )
        );
    }

    public function manufacture_bill(Request $request)
    {
        // dd($request->all());
        if ($request->image) {
            $user = users()->user();
            $manufacture = $request->manufacture;
            $arg = [
                'user_id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
                'address' => $user->address,
                'total_money' => $request->money,
                'gift_money' => $request->money,
                'pro_type' => $manufacture,
            ];
            // dd($request->all());


            $order = Order::create($arg);
            if ($order) {
                $order->bill = $this->uploadFile($request->image);
                $order->save();
                session()->flash('success', 'Thành công. Vui lòng đợi quản trị viên xét duyệt!');
                return redirect()->route('us.manufacture');
            } else {
                session()->flash('error', 'Có lỗi. Vui lòng thử lại sau!');
                return redirect()->route('us.manufacture');
            }
        } else {
            session()->flash('info', 'Vui lòng gửi ảnh chuyển khoản của bạn để được xét duyệt nhanh hơn!');
            return redirect()->back();
        }
    }

    public function agent()
    {
        $products = Product::orderBy('id', 'DESC')->where('display', 1)->get();
        return view('user.account.agent')->with(compact('products'));
    }

    public function buy_agent(Request $request)
    {
        if ($request->all()['listProduct'] && $request->all()['listQuantity'][0]) {
            $datas = array();
            foreach ($request->all()['listProduct'] as $key => $listProduct) {
                $datas[$key]['product_id'] = $listProduct;
                $datas[$key]['qty'] = $request->all()['listQuantity'][$key];
            }
            //            $total_money = 0;
            foreach ($datas as $data) {
                $product_id = $data['product_id'];
                $qty = intval($data['qty']);

                $product = Product::find($product_id);

                Cart::add($product_id, $product->name, $qty, $product->price, 0, ['image' => $product->image]);
            }
            $json['code'] = 200;
            return response($json, 200)
                ->header('Content-Type', 'text/plain');
        } else {
            $json['code'] = 0;
            $json['msg'] = 'Có lỗi, vui lòng thử lại!';
            return response($json, 200)
                ->header('Content-Type', 'text/plain');
        }
    }

    // Giải Pháp Vay Vốn
    public function loansolutions()
    {
        // $order = Order::where('user_id', users()->user()->id)->where('pro_type', 4)->first();
        return view('user.account.giaiPhapVayVon');
    }

    public function checkout_agent()
    {
        $carts['carts'] = Cart::content();
        $carts['total'] = Cart::subtotal();
        //        dd($carts['carts']);
        return view('user.account.checkout')->with(compact('carts'));
    }

    public function reset_agent()
    {
        Cart::destroy();
        return redirect()->route('us.account.agent');
    }

    public function store(Request $request)
    {
        $carts = Cart::content();
        $total = (float) str_replace(',', '', Cart::subtotal());
        $user = users()->user();
        $order['user_id'] = $user->id;
        $order['name'] = $request->name;
        $order['phone'] = $request->phone;
        $order['address'] = $request->address;
        $order['status'] = 0;
        $order['total_money'] = $total;
        $order['pro_type'] = 1;
        $order['payment_method'] = $request->ShipType;
        $order['note'] = $request->txtNote;
        $status = Order::create($order);
        if ($status) {
            foreach ($carts as $cart) {
                $order_detail['order_id'] = $status->id;
                $order_detail['product_id'] = $cart->id;
                $order_detail['qty'] = $cart->qty;
                $order_detail['money'] = $cart->price;
                OrderDetail::create($order_detail);
            }
            Cart::destroy();
            session()->flash('success', 'Đặt hàng thành công!');
            return redirect()->route('us.order.index');
        } else {
            session()->flash('info', 'Có lỗi sảy ra. Vui lòng thử lại sau!');
            return redirect()->back();
        }
    }

    public function kyc()
    {
        return view('user.account.kyc');
    }
    public function post_kyc(Request $request)
    {
        if ($request->cccd_before && $request->cccd_after && $request->cccd_me) {
            $user = users()->user();
            $user->cccd_before = $this->uploadFile($request->cccd_before);
            $user->cccd_after = $this->uploadFile($request->cccd_after);
            $user->cccd_me = $this->uploadFile($request->cccd_me);
            $user->save();
            session()->flash('success', 'KYC thành công. Vui lòng đợi quản trị viên phê duyệt!');
            return redirect()->back();
        } else {
            session()->flash('info', 'Vui lòng tải lên đủ 3 ảnh để KYC');
            return redirect()->back();
        }
    }
}
