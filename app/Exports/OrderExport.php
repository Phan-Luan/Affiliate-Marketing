<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{

    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function view(): View
    {
        $order = Order::where('pro_type', $this->type)->with('order_detail')->get();

        return view('admin.orders.export', [
            'orders' => $order
        ]);
    }
}
