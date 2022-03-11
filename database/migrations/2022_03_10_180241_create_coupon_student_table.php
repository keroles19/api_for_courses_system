<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponStudentTable extends Migration {

	public function up()
	{
		Schema::create('coupon_student', function(Blueprint $table) {
			$table->increments('id', true);
			$table->integer('student_id')->unsigned();
			$table->integer('coupon_id')->unsigned();
            $table->integer('timer')->default(1);

        });
	}

	public function down()
	{
		Schema::drop('coupon_student');
	}
}
