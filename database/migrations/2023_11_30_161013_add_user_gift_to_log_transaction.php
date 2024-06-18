<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserGiftToLogTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_transactions', function (Blueprint $table) {
            $table->bigInteger('user_gift')->nullable()->after('user_id');
            $table->text('reason')->nullable()->after('wallet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_transactions', function (Blueprint $table) {
            //
        });
    }
}
