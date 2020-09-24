<?php

use App\Admin;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = [

            'name'  => 'jone doe',
            'email'  =>'jone@gmail.com',
            'password'  => Hash::make(123456789),
            'phone' => 12276473,
            'email_verified_at' => now(),
        ];
        Admin::create($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
