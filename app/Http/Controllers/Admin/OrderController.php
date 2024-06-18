<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Log_refund_warehouse;
use App\Models\LogTransaction;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->pro_type != NULL) {
            $orders = Order::orderBy('id', 'DESC')->where('pro_type', $request->pro_type)->paginate(10);
        } else {
            $orders = Order::orderBy('id', 'DESC')->paginate(10);
        }
        return view('admin.orders.index')->with(compact('orders'));
    }
    public function log_refund_warehouse($user_id, $order_id, $money, $reason)
    {
        $log['user_id'] = $user_id;
        $log['order_id'] = $order_id;
        $log['money'] = $money;
        $log['reason'] = $reason;

        Log_refund_warehouse::create($log);
    }


    public function deleteOrder($id)
    {
        $order = Order::find($id);
        if (!$order) {
            session()->flash('error', 'Không tìm thấy đơn hàng!');
            return redirect()->back();
        }

        $order->delete();

        session()->flash('success', 'Xóa đơn hàng thành công!');
        return redirect()->back();
    }


    public function update_status(Request $request, $id)
    {


        $order = Order::find($id);
        if ($request->status == 2) {
            $order->status = 2;
            $order->save();
            session()->flash('success', 'Hủy đơn hàng thành công!');
            return redirect()->back();
        }
        if ($order) {
            if ($order->status == 0) {
                // Tìm user mua hàng
                $user = User::find($order->user_id);
                if ($user) {
                    switch ($order->pro_type) {
                        case 1: // Pro_type = 1 : Hội Viên
                            $user->level = 1;
                            break;
                        case 2: // Pro_type = 2 : Thành Viên Kết Nối
                            $user->level = 2;
                            break;
                        case 3: // Pro_type = 3 : Đăng Ký Đại Diện
                            $user->level = 3;
                            break;
                        case 4: // Pro_type = 4: Nhà Sản Xuất Kinh Doanh
                            $user->level = 4;
                            break;
                        default:
                            // Default level or handle other cases if necessary
                            break;
                    }
                    if ($order->pro_type == 2) {
                        $user->star = $order->pro_star;
                    }



                    // Now, handle combined levels if needed
                    if ($order->pro_type == 2) { // Level 5: Hội Viên, Thành Viên Kết Nối (1, 2)
                        $user->level = 5;
                    } elseif ($order->pro_type == 3) { // Level 6: Hội Viên, Đăng Ký Đại Diện (1, 3)
                        $user->level = 6;
                    } elseif ($order->pro_type == 4) { // Level 7: Hội Viên, Nhà Sản Xuất Kinh Doanh (1, 4)
                        $user->level = 7;
                    } elseif ($order->pro_type == 2 && $order->pro_type == 3) { // Level 8: Thành Viên Kết Nối, Đăng Ký Đại Diện (2, 3)
                        $user->level = 8;
                    } elseif ($order->pro_type == 2 && $order->pro_type == 4) { // Level 9: Thành Viên Kết Nối, Nhà Sản Xuất Kinh Doanh (2, 4)
                        $user->level = 9;
                    } elseif ($order->pro_type == 3 && $order->pro_type == 4) { // Level 10: Đăng Ký Đại Diện, Nhà Sản Xuất Kinh Doanh (3, 4)
                        $user->level = 10;
                    } elseif ($order->pro_type == 2 && $order->pro_type == 3) { // Level 11: Hội Viên, Thành Viên Kết Nối, Đăng Ký Đại Diện (1, 2, 3)
                        $user->level = 11;
                    } elseif ($order->pro_type == 2 && $order->pro_type == 4) { // Level 12: Hội Viên, Thành Viên Kết Nối, Nhà Sản Xuất Kinh Doanh (1, 2, 4)
                        $user->level = 12;
                    } elseif ($order->pro_type == 3 && $order->pro_type == 4) { // Level 13: Hội Viên, Đăng Ký Đại Diện, Nhà Sản Xuất Kinh Doanh (1, 3, 4)
                        $user->level = 13;
                    } elseif ($order->pro_type == 2 && $order->pro_type == 3 && $order->pro_type == 4) { // Level 14: Thành Viên Kết Nối, Đăng Ký Đại Diện, Nhà Sản Xuất Kinh Doanh (2, 3, 4)
                        $user->level = 14;
                    } elseif ($order->pro_type == 2 && $order->pro_type == 3 && $order->pro_type == 4) { // Level 15: Hội Viên, Thành Viên Kết Nối, Đăng Ký Đại Diện, Nhà Sản Xuất Kinh Doanh (1, 2, 3, 4)
                        $user->level = 15;
                    }
                    // Tìm id @F0 của thằng đang duyệt
                    //                    $idF1_star = User::where('invite_user', $user->id)->value('invite_user');
                    //                    $manyUserF1s = User::where('invite_user', $idF1_star)->pluck('id');
                    //
                    //                    foreach ($manyUserF1s as $manyUserF1) {
                    //                        $f1_star = Order::where('pro_type', 2)->where('status', 1)->where('user_id', $manyUserF1)->id;
                    //                    }
                    $admin = auth()->user();

                    if ($order->pro_type == 5 || $order->pro_type == 60) {
                        $admin->refund_warehouse += $order->total_money * 0.02;
                        $reason = '';
                        $admin->save();
                        if ($order->pro_type == 5) {
                            $reason = "Hoàn tiền quỹ phụ nữ khởi nghiệp";
                        } elseif ($order->pro_type == 60) {
                            $reason = "Hoàn tiền quỹ đầu tư sản xuất";
                        }
                        $this->log_refund_warehouse($order->user_id, $order->id, $order->total_money * 0.02,  $reason);
                    }
                    if ($order->pro_type == 0) {
                        $profit = 0;
                        $order_details = OrderDetail::where('order_id', $order->id)->get();
                        if ($order_details) foreach ($order_details as $order_detail) {
                            $product = Product::find($order_detail->product_id);
                            if ($product) {
                                $profit += ($product->price - $product->origin) * $order_detail->qty;
                            }
                        }
                        if ($profit > 0) {
                            $admin->refund_warehouse += $profit * 0.1;
                            $admin->save();
                            $this->log_refund_warehouse($order->user_id, $order->id, $profit * 0.1,  'Hoàn tiền mua hàng');
                        }
                    }
                    if ($order->pro_type != 0) {
                        if ($order->pro_type == 2) {
                            $admin->refund_warehouse += $order->total_money * 0.03;
                            $admin->save();
                            $this->log_refund_warehouse($order->user_id, $order->id,  $order->total_money * 0.03,  'Hoàn tiền thành viên kết nối');
                            if ($order->total_money <= 6000000) {
                                $user->point = $user->point + $order->total_money;
                            }
                        } else {
                            $user->point = $user->point + $order->total_money;
                        }
                    }
                    // if ($order->pro_type == 0) {
                    //     $admin->refund_warehouse += $order->total_money * 0.02;
                    //     $admin->save();
                    // }


                    $user_invite = User::find($user->invite_user);

                    if ($user_invite) {
                        if ($order->pro_type == 2) {
                            if ($order->pro_star == 1) {
                                $money_give = ($order->total_money * 50) / 100;
                                $user_invite->money +=  $money_give;
                                $user_invite->save();
                                // Lưu log
                                $this->log($user_invite, $user_invite, $money_give, 1, 0, 1, 'Thưởng thành viên kết nối 1 sao');

                                // $user_f2 = User::find($user_invite->invite_user);
                                // if ($user_f2) {
                                //     if ($user_f2->star == 3 || $user_f2->star == 2) {
                                //         $money_give_f2 = ($order->total_money * 5) / 100;
                                //         $user_f2->money = $user_f2->money + $money_give_f2;
                                //         $user_f2->save();
                                //         // Lưu log
                                //         $this->log($user_f2, $user_f2, $money_give_f2, 1, 0, 1, 'Thưởng thành viên kết nối 1 sao - gián tiếp @F2');
                                //     }
                                //     $user_f3 = User::find($user_f2->invite_user);
                                //     if ($user_f3) {
                                //         if ($user_f3->star == 3 || $user_f3->star == 2) {
                                //             $money_give_f3 = ($order->total_money * 2) / 100;
                                //             $user_f3->money = $user_f3->money + $money_give_f3;
                                //             $user_f3->save();
                                //             // Lưu log
                                //             $this->log($user_f3, $user_f3, $money_give_f3, 1, 0, 1, 'Thưởng thành viên kết nối 1 sao - gián tiếp @F3');
                                //         }
                                //     }
                                // }
                            } elseif ($order->pro_star == 2) {
                                $money_give = ($order->total_money * 50) / 100;
                                $user_invite->money =  $user_invite->money + $money_give;
                                $user_invite->save();
                                // Lưu log
                                $this->log($user_invite, $user_invite, $money_give, 1, 0, 1, 'Thưởng thành viên kết nối 2 sao');

                                $user_f2 = User::find($user_invite->invite_user);
                                if ($user_f2) {
                                    if ($user_f2->star == 1 || $user_f2->star == 2) {
                                        $money_give_f2 = ($order->total_money * 5) / 100;
                                        $user_f2->money = $user_f2->money + $money_give_f2;
                                        $user_f2->save();
                                        // Lưu log
                                        $this->log($user_f2, $user_f2, $money_give_f2, 1, 0, 1, 'Thưởng thành viên kết nối 1 sao - gián tiếp @F2');
                                    }
                                    $user_f3 = User::find($user_f2->invite_user);
                                    if ($user_f3) {
                                        if ($user_f3->star == 1 || $user_f3->star == 2) {
                                            $money_give_f3 = ($order->total_money * 2) / 100;
                                            $user_f3->money = $user_f3->money + $money_give_f3;
                                            $user_f3->save();
                                            // Lưu log
                                            $this->log($user_f3, $user_f3, $money_give_f3, 1, 0, 1, 'Thưởng thành viên kết nối 1 sao - gián tiếp @F3');
                                        }
                                    }
                                }
                            } elseif ($order->pro_star == 3) {
                                if ($user_invite->star == 1) {
                                    $money_give = ($order->total_money * 50) / 100;
                                } elseif ($user_invite->star == 2) {
                                    $money_give = ($order->total_money * 50) / 100;
                                } elseif ($user_invite->star == 3) {
                                    $money_give = ($order->total_money * 35) / 100;
                                } else $money_give = 0;
                                if ($money_give > 0) {
                                    $user_invite->money =  $user_invite->money + $money_give;
                                    $user_invite->save();
                                    // Lưu log
                                    $this->log($user_invite, $user_invite, $money_give, 1, 0, 1, 'Thưởng thành viên kết nối 3 sao');
                                }
                                $user_f2 = User::find($user_invite->invite_user);
                                if ($user_f2) {
                                    if ($user_f2->star == 3) {
                                        $money_give_f2 = ($order->total_money * 3) / 100;
                                        $user_f2->money = $user_f2->money + $money_give_f2;
                                        $user_f2->save();
                                        // Lưu log
                                        $this->log($user_f2, $user_f2, $money_give_f2, 1, 0, 1, 'Thưởng thành viên kết nối 3 sao - gián tiếp @F2');
                                    } elseif ($user_f2->star == 2 || $user_f2->star == 1) {
                                        $money_give_f2 = ($order->total_money * 5) / 100;
                                        $user_f2->money = $user_f2->money + $money_give_f2;
                                        $user_f2->save();
                                        // Lưu log
                                        $this->log($user_f2, $user_f2, $money_give_f2, 1, 0, 1, 'Thưởng thành viên kết nối 3 sao - gián tiếp @F2');
                                    }
                                    $user_f3 = User::find($user_f2->invite_user);
                                    if ($user_f3) {
                                        if ($user_f3->star == 3) {
                                            $money_give_f3 = ($order->total_money * 2) / 100;
                                            $user_f3->money = $user_f3->money + $money_give_f3;
                                            $user_f3->save();
                                            // Lưu log
                                            $this->log($user_f3, $user_f3, $money_give_f3, 1, 0, 1, 'Thưởng thành viên kết nối 3 sao - gián tiếp @F3');
                                        } elseif ($user_f3->star == 2) {
                                            $money_give_f3 = ($order->total_money * 2) / 100;
                                            $user_f3->money = $user_f3->money + $money_give_f3;
                                            $user_f3->save();
                                            // Lưu log
                                            $this->log($user_f3, $user_f3, $money_give_f3, 1, 0, 1, 'Thưởng thành viên kết nối 3 sao - gián tiếp @F3');
                                        }
                                    }
                                }
                            }
                            //                            elseif ($order->pro_star == 4) {
                            //                                $money_give = ($order->total_money*50)/100;
                            //                                $user_invite->money =  $user_invite->money + $money_give;
                            //                                $user_invite->save();
                            //                                // Lưu log
                            //                                $this->log($user_invite,$user_invite,$money_give,1,0,1,'Phí thành viên kết nối 4 sao');
                            //                            } elseif ($order->pro_star == 5) {
                            //                                $money_give = ($order->total_money*50)/100;
                            //                                $user_invite->money =  $user_invite->money + $money_give;
                            //                                $user_invite->save();
                            //                                // Lưu log
                            //                                $this->log($user_invite,$user_invite,$money_give,1,0,1,'Phí thành viên kết nối 5 sao');
                            //                            }
                        } elseif ($order->pro_type == 4) {
                            if ($user_invite->star == 1) {
                                $money_give = ($order->total_money * 20) / 100;
                                $user_invite->money =  $user_invite->money + $money_give;
                                $user_invite->save();
                                // Lưu log
                                $this->log($user_invite, $user_invite, $money_give, 2, 0, 1, 'Thưởng kết nối nhà Sản Xuất, Kinh doanh');
                            } elseif ($user_invite->star == 2) {
                                $money_give = ($order->total_money * 25) / 100;
                                $user_invite->money =  $user_invite->money + $money_give;
                                $user_invite->save();
                                // Lưu log
                                $this->log($user_invite, $user_invite, $money_give, 2, 0, 1, 'Thưởng kết nối nhà Sản Xuất, Kinh doanh @F1');

                                $user_f2 = User::find($user_invite->invite_user);
                                if ($user_f2) {
                                    $money_give_f2 = ($order->total_money * 5) / 100;
                                    $user_f2->money = $user_f2->money + $money_give_f2;
                                    $user_f2->save();
                                    // Lưu log
                                    $this->log($user_f2, $user_f2, $money_give_f2, 2, 0, 1, 'Thưởng kết nối nhà Sản Xuất, Kinh doanh @F2');

                                    $user_f3 = User::find($user_f2->invite_user);
                                    if ($user_f3) {
                                        $money_give_f3 = ($order->total_money * 2) / 100;
                                        $user_f3->money = $user_f3->money + $money_give_f3;
                                        $user_f3->save();
                                        // Lưu log
                                        $this->log($user_f3, $user_f3, $money_give_f3, 2, 0, 1, 'Thưởng kết nối nhà Sản Xuất, Kinh doanh @F3');
                                    }
                                }
                            } elseif ($user_invite->star == 3) {
                                $money_give = ($order->total_money * 25) / 100;
                                $user_invite->money =  $user_invite->money + $money_give;
                                $user_invite->save();
                                // Lưu log
                                $this->log($user_invite, $user_invite, $money_give, 2, 0, 1, 'Thưởng kết nối nhà Sản Xuất, Kinh doanh @F1');

                                $user_f2 = User::find($user_invite->invite_user);
                                if ($user_f2) {
                                    $money_give_f2 = ($order->total_money * 5) / 100;
                                    $user_f2->money = $user_f2->money + $money_give_f2;
                                    $user_f2->save();
                                    // Lưu log
                                    $this->log($user_f2, $user_f2, $money_give_f2, 2, 0, 1, 'Thưởng kết nối nhà Sản Xuất, Kinh doanh @F2');

                                    $user_f3 = User::find($user_f2->invite_user);
                                    if ($user_f3) {
                                        $money_give_f3 = ($order->total_money * 2) / 100;
                                        $user_f3->money = $user_f3->money + $money_give_f3;
                                        $user_f3->save();
                                        // Lưu log
                                        $this->log($user_f3, $user_f3, $money_give_f3, 2, 0, 1, 'Thưởng kết nối nhà Sản Xuất, Kinh doanh @F3');
                                    }
                                }
                            }
                        } elseif ($order->pro_type == 3) {
                            if ($user_invite->star == 1) {
                                $money_give = ($order->total_money * 5) / 100;
                                $user_invite->money =  $user_invite->money + $money_give;
                                $user_invite->save();
                                // Lưu log
                                $this->log($user_invite, $user_invite, $money_give, 3, 0, 1, 'Thưởng kết nối điểm đại diện');
                            } elseif ($user_invite->star == 2) {
                                $money_give = ($order->total_money * 8) / 100;
                                $user_invite->money =  $user_invite->money + $money_give;
                                $user_invite->save();
                                // Lưu log
                                $this->log($user_invite, $user_invite, $money_give, 3, 0, 1, 'Thưởng kết nối điểm đại diện @F1');

                                $user_f2 = User::find($user_invite->invite_user);
                                if ($user_f2) {
                                    $money_give_f2 = ($order->total_money * 3) / 100;
                                    $user_f2->money = $user_f2->money + $money_give_f2;
                                    $user_f2->save();
                                    // Lưu log
                                    $this->log($user_f2, $user_f2, $money_give_f2, 3, 0, 1, 'Thưởng kết nối điểm đại diện @F2');

                                    $user_f3 = User::find($user_f2->invite_user);
                                    if ($user_f3) {
                                        $money_give_f3 = ($order->total_money * 2) / 100;
                                        $user_f3->money = $user_f3->money + $money_give_f3;
                                        $user_f3->save();
                                        // Lưu log
                                        $this->log($user_f3, $user_f3, $money_give_f3, 3, 0, 1, 'Thưởng kết nối điểm đại diện @F3');
                                    }
                                }
                            } elseif ($user_invite->star == 3) {
                                $money_give = ($order->total_money * 8) / 100;
                                $user_invite->money =  $user_invite->money + $money_give;
                                $user_invite->save();
                                // Lưu log
                                $this->log($user_invite, $user_invite, $money_give, 3, 0, 1, 'Thưởng kết nối điểm đại diện @F1');

                                $user_f2 = User::find($user_invite->invite_user);
                                if ($user_f2) {
                                    $money_give_f2 = ($order->total_money * 3) / 100;
                                    $user_f2->money = $user_f2->money + $money_give_f2;
                                    $user_f2->save();
                                    // Lưu log
                                    $this->log($user_f2, $user_f2, $money_give_f2, 3, 0, 1, 'Thưởng kết nối điểm đại diện @F2');

                                    $user_f3 = User::find($user_f2->invite_user);
                                    if ($user_f3) {
                                        $money_give_f3 = ($order->total_money * 2) / 100;
                                        $user_f3->money = $user_f3->money + $money_give_f3;
                                        $user_f3->save();
                                        // Lưu log
                                        $this->log($user_f3, $user_f3, $money_give_f3, 3, 0, 1, 'Thưởng kết nối điểm đại diện @F3');
                                    }
                                }
                            }
                        } elseif ($order->pro_type == 0) {
                            $profit = 0;
                            $order_details = OrderDetail::where('order_id', $order->id)->get();
                            if ($order_details) foreach ($order_details as $order_detail) {
                                $product = Product::find($order_detail->product_id);
                                if ($product) {
                                    $profit += ($product->price - $product->origin) * $order_detail->qty;
                                }
                            }
                            // dd($profit);
                            if ($profit > 0) {
                                if ($user_invite->star == 1) {
                                    $money_give = ($profit * 20) / 100;
                                    $user_invite->money =  $user_invite->money + $money_give;
                                    $user_invite->save();
                                    // Lưu log
                                    $this->log($user_invite, $user_invite, $money_give, 4, 0, 1, 'Thưởng lợi nhuận đơn hàng #' . $order->id . '');
                                } elseif ($user_invite->star == 2) {
                                    $money_give = ($profit * 25) / 100;
                                    $user_invite->money =  $user_invite->money + $money_give;
                                    $user_invite->save();
                                    // Lưu log
                                    $this->log($user_invite, $user_invite, $money_give, 4, 0, 1, 'Thưởng lợi nhuận đơn hàng #' . $order->id . '');

                                    $user_f2 = User::find($user_invite->invite_user);
                                    if ($user_f2) {
                                        $money_give_f2 = ($profit * 5) / 100;
                                        $user_f2->money = $user_f2->money + $money_give_f2;
                                        $user_f2->save();
                                        // Lưu log
                                        $this->log($user_f2, $user_f2, $money_give_f2, 4, 0, 1, 'Thưởng lợi nhuận đơn hàng #' . $order->id . ' @F2');

                                        $user_f3 = User::find($user_f2->invite_user);
                                        if ($user_f3) {
                                            $money_give_f3 = ($profit * 2) / 100;
                                            $user_f3->money = $user_f3->money + $money_give_f3;
                                            $user_f3->save();
                                            // Lưu log
                                            $this->log($user_f3, $user_f3, $money_give_f3, 4, 0, 1, 'Thưởng lợi nhuận đơn hàng #' . $order->id . ' @F#');
                                        }
                                    }
                                } elseif ($user_invite->star == 3) {
                                    $money_give = ($profit * 30) / 100;
                                    $user_invite->money =  $user_invite->money + $money_give;
                                    $user_invite->save();
                                    // Lưu log
                                    $this->log($user_invite, $user_invite, $money_give, 4, 0, 1, 'Thưởng lợi nhuận đơn hàng #' . $order->id . '');

                                    $user_f2 = User::find($user_invite->invite_user);
                                    if ($user_f2) {
                                        $money_give_f2 = ($profit * 5) / 100;
                                        $user_f2->money = $user_f2->money + $money_give_f2;
                                        $user_f2->save();
                                        // Lưu log
                                        $this->log($user_f2, $user_f2, $money_give_f2, 4, 0, 1, 'Thưởng lợi nhuận đơn hàng #' . $order->id . ' @F2');

                                        $user_f3 = User::find($user_f2->invite_user);
                                        if ($user_f3) {
                                            $money_give_f3 = ($profit * 2) / 100;
                                            $user_f3->money = $user_f3->money + $money_give_f3;
                                            $user_f3->save();
                                            // Lưu log
                                            $this->log($user_f3, $user_f3, $money_give_f3, 4, 0, 1, 'Thưởng lợi nhuận đơn hàng #' . $order->id . ' @F#');
                                        }
                                    }
                                }
                            }
                        }
                    }

                    $user->save();
                    $order->status = 1;
                    $order->time_confirm = Carbon::now('Asia/Ho_Chi_Minh');
                    $order->save();

                    session()->flash('success', 'Duyệt thành công!');
                } else {
                    session()->flash('error', 'Không tìm thấy thành viên!');
                }
                return redirect()->back();
            } else {
                session()->flash('error', 'Đơn hàng đã được duyệt');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Không tìm thấy đơn hàng!');
            return redirect()->back();
        }
    }

    protected function log($user, $user_gift, $money, $type, $add, $wallet, $reason)
    {
        // Lưu log
        $log['user_id'] = $user->id;
        $log['user_gift'] = $user_gift->id;
        $log['before'] = $user->money - $money;
        $log['money'] = $money;
        $log['after'] = $user->money;
        $log['status'] = 0;
        $log['type'] = $type;
        $log['add'] = $add;
        $log['wallet'] = $wallet;
        $log['reason'] = $reason;
        LogTransaction::create($log);
    }


    public function update_progress(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->progress = $request->progress;
            $order->save();
            session()->flash('success', 'Cập nhật thành công!');
            return redirect()->back();
        } else {
            session()->flash('error', 'Không tìm thấy đơn hàng!');
            return redirect()->back();
        }
    }
    public function rose_on_rose($user, $money, $i = 0)
    {
        if ($user->invite_user && $i < 3) {
            $user_invite = User::find($user->invite_user);
            $percent = 50;
            $money = ($money * $percent) / 100;
            $user_invite->money = $user_invite->money + $money;
            $user_invite->save();
            // Lưu Log
            $log['user_id'] = $user_invite->id;
            $log['before'] = $user_invite->money - $money;
            $log['money'] = $money;
            $log['after'] = $user_invite->money;
            $log['status'] = 1;
            $log['type'] = 1;
            $log['add'] = 0;
            $log['wallet'] = 0;
            $log['reason'] = 'Thưởng thu nhập / thu nhập từ TV ' . $user->name . '';
            LogTransaction::create($log);
            if ($user_invite->invite_user && $money >= 1000) {
                $this->rose_on_rose($user_invite, $money, $i++);
            }
        }
    }

    public function order_refund(Request $request)
    {

        if ($request->refund == 1) {
            $orders = Order::orderBy('id', 'DESC')->where('pro_type', 0)->where('is_refund', 1)->paginate(10);
        } else {
            $orders = Order::orderBy('id', 'DESC')->where('pro_type', 0)->where('is_refund', 0)->paginate(10);
        }
        return view('admin.orders.index')->with(compact('orders'));
    }

    public function refundOrder($id)
    {
        $order = Order::where('id', $id)->first();

        if ($order) {

            $admin = Auth()->user();
            $total_point = $order->total_money * 1.5;
            if ($admin->refund_warehouse < $total_point) {
                return response()->json(['error' => 'Kho hoàn tiền không đủ số dư!']);
            } else {
                $order->is_refund = 1;
                $order->save();
                $admin->refund_warehouse -= $total_point;
                $admin->save();
                $user = User::where('id', $order->user_id)->first();
                if ($user) {
                    $user->money += $order->total_money;
                    $user->save();

                    $invite_user = User::where('id', $user->invite_user)->first();
                    $invite_user->money += $order->total_money * 0.5;
                    $invite_user->save();
                    return response()->json(['success' => 'Đã hoàn tiền!']);
                } else {
                    return response()->json(['error' => 'Không tìm thấy thành viên!']);
                }
            }
        } else {
            session()->flash('error', 'Không tìm thấy đơn hàng!');
            return redirect()->back();
        }
    }

    public function exportOrders($type)
    {
        return Excel::download(new OrderExport($type), 'orders.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //        dd($order->order_detail);
        return view('admin.orders.edit')->with(compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
