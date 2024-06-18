<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{
  public function view(): View
  {
    // Lấy danh sách tất cả người dùng
    $users = User::orderBy('id', 'DESC')->get();

    // Thêm cột tổng doanh số cho mỗi người dùng
    foreach ($users as $user) {
      $user->total_revenue = $user->count_money($user->id);
    }

    return view('admin.users.export', [
      'users' => $users,
    ]);
  }
}
