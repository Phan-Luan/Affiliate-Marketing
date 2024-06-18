<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    protected $guard = 'user';
    protected $gender = [
        1 => 'Nữ',
        2 => 'Nam'
    ];
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'password', 'year_of_birth', 'address', 'money', 'point', 'invite_user', 'type', 'level', 'avatar', 'gender', 'point_buy', 'star', 'cccd_before', 'cccd_after', 'cccd_me', 'kyc', 'f2_id', 'f3_id'];
    protected $hidden = [
        'password'
    ];

    public function invite($id)
    {
        return User::find($id);
    }
    public function bank()
    {
        return $this->hasOne(Bank::class, 'user_id', 'id');
    }
    public function count_invite($id)
    {
        $count = 0;
        $counted_users = collect();

        $invite_users = User::where('invite_user', $id)->pluck('id');

        $count += $invite_users->count();
        $counted_users = $counted_users->merge($invite_users);

        foreach ($invite_users as $userId) {
            $invite_users1 = User::where(function ($query) use ($userId) {
                $query->where('f2_id', $userId)
                    ->orWhere('f3_id', $userId);
            })->pluck('id');

            $new_invite_users1 = $invite_users1->diff($counted_users);

            $count += $new_invite_users1->count();
            $counted_users = $counted_users->merge($new_invite_users1);
        }

        return $count;
    }

    public function count_money($id)
    {
        $totalMoney = 0;
        $countedUsers = collect();

        // Lấy danh sách tất cả các user đã mời bởi user có id là $id thông qua f2_id hoặc f3_id
        $invitedUsers = User::where('invite_user', $id)->pluck('id');

        // Tính tổng tiền của các user đã mời
        $invitedUsersMoney = User::whereIn('id', $invitedUsers)->sum('money');

        // Cộng vào tổng doanh số
        $totalMoney += $invitedUsersMoney;

        // Thêm các user đã mời vào danh sách đã đếm
        $countedUsers = $countedUsers->merge($invitedUsers);

        foreach ($invitedUsers as $userId) {
            // Lấy danh sách các user mà user hiện tại đã mời thông qua f2_id hoặc f3_id
            $subInvitedUsers = User::where(function ($query) use ($userId) {
                $query->where('f2_id', $userId)
                    ->orWhere('f3_id', $userId);
            })->pluck('id');

            // Lọc ra các user chưa được đếm trước đó
            $newSubInvitedUsers = $subInvitedUsers->diff($countedUsers);

            // Tính tổng tiền của các user mà user hiện tại đã mời thông qua f2_id hoặc f3_id
            $subInvitedUsersMoney = User::whereIn('id', $newSubInvitedUsers)->sum('money');

            // Cộng vào tổng doanh số
            $totalMoney += $subInvitedUsersMoney;

            // Thêm các user mới vào danh sách đã đếm
            $countedUsers = $countedUsers->merge($newSubInvitedUsers);
        }
        return $totalMoney;
    }


    // Đếm số thành viên đã giới thiệu và đã active
    public function count_invite_active($id)
    {
        return User::where('invite_user', $id)->where('type', 2)->count();
    }
    // Đếm đơn hàng cá nhân đã thanh toán
    public function count_order_active($id)
    {
        return Order::where('user_id', $id)->where('status', 1)->count();
    }
    // Doanh số cá nhân
    public function total_order_active($id)
    {
        return Order::where('user_id', $id)->where('status', 1)->sum('total_money');
    }
    // Tổng thưởng theo type
    public function total_money_type($id, $type)
    {
        return LogTransaction::where('user_id', $id)->where('type', $type)->where('add', 0)->where('status', 1)->sum('money');
    }
    // Doanh số thẻ theo thời gian
    public function total_sale_product_time($id, $time)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        if ($time == 'yesterday') {
            $dt->subDays(1);
            $dt->toDateTimeString();
            $timeStart = $dt->toDateString() . ' 00:00:00';
            $timeEnd = $dt->toDateString() . ' 23:59:59';
        } elseif ($time == 'today') {
            $dt->toDateTimeString();
            $timeStart = $dt->toDateString() . ' 00:00:00';
            $timeEnd = $dt->toDateString() . ' 23:59:59';
        } elseif ($time == 'thisMonth') {
            $dt->firstOfMonth();
            $timeStart = $dt->toDateString() . ' 00:00:00';

            $dt->lastOfMonth();
            $timeEnd = $dt->toDateString() . ' 23:59:59';
        } elseif ($time == 'lastMonth') {
            $dt->subMonth()->firstOfMonth();
            $timeStart = $dt->toDateString() . ' 00:00:00';

            $dt->lastOfMonth();
            $timeEnd = $dt->toDateString() . ' 23:59:59';
        }
        return Order::where('user_id', $id)->where('status', 1)->where('pro_type', 0)->where('time_confirm', '>=', $timeStart)->where('time_confirm', '<=', $timeEnd)->sum('gift_money');
    }
    // Doanh số sản phẩm theo thời gian
    public function total_sale_card_time($id, $time)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        if ($time == 'yesterday') {
            $dt->subDays(1);
            $dt->toDateTimeString();
            $timeStart = $dt->toDateString() . ' 00:00:00';
            $timeEnd = $dt->toDateString() . ' 23:59:59';
        } elseif ($time == 'today') {
            $dt->toDateTimeString();
            $timeStart = $dt->toDateString() . ' 00:00:00';
            $timeEnd = $dt->toDateString() . ' 23:59:59';
        } elseif ($time == 'thisMonth') {
            $dt->firstOfMonth();
            $timeStart = $dt->toDateString() . ' 00:00:00';

            $dt->lastOfMonth();
            $timeEnd = $dt->toDateString() . ' 23:59:59';
        } elseif ($time == 'lastMonth') {
            $dt->subMonth()->firstOfMonth();
            $timeStart = $dt->toDateString() . ' 00:00:00';

            $dt->lastOfMonth();
            $timeEnd = $dt->toDateString() . ' 23:59:59';
        }
        $users = User::where('invite_user', $id)->get();
        $total_sale = 0;
        if ($users->count() > 0) {
            foreach ($users as $user) {
                $total_sale += Order::where('user_id', $user->id)->where('pro_type', 1)->where('status', 1)->where('time_confirm', '>=', $timeStart)->where('time_confirm', '<=', $timeEnd)->sum('total_money');
            }
        }
        return $total_sale;
    }
    // Hàm để tìm các con bên dưới và cộng tổng doanh số
    function find_child($id, $money)
    {
        $childs = User::where('invite_user', $id)->get();
        if ($childs->count() > 0) {
            foreach ($childs as $child) {
                $child_money = Order::where('user_id', $child->id)->where('status', 1)->sum('total_money');
                $money += $child_money;
                $user_child = User::where('invite_user', $child->id)->get();
                if ($user_child->count() > 0) {
                    $money = $this->find_child($child->id, $money);
                }
            }
        }
        return $money;
    }

    // Tìm số lượng f1, f2, f3
    public function count_3Tang($id)
    {
        $count_f1 = User::where('invite_user', $id)->count();
        $count_f2 = User::where('f2_id', $id)->count();
        $count_f3 = User::where('f3_id', $id)->count();

        return $count_f1 + $count_f2 + $count_f3;
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function user_invite()
    {
        return $this->hasMany(User::class, 'invite_user', 'id');
    }
    public function find_invite($user_id)
    {
        return User::find($user_id);
    }
}
