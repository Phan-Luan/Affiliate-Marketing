<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('before');
            $table->integer('money');
            $table->integer('after');
            $table->tinyInteger('status')->default(0)->comment('0: Chưa thành công | 1: Thành công | 2: Hủy');
            $table->tinyInteger('type')->comment('0: Điểm Voucher Mua | 1: Điểm Voucher tặng | 2: Tiền ');
            $table->tinyInteger('add')->comment('0: Cộng | 1: Trừ ');
            $table->tinyInteger('wallet')->comment('0: Ví rút tiền | 1: Ví voucher mua | 2: Ví Voucher tặng ');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_transactions');
    }
}
