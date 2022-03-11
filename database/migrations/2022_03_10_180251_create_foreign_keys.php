<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('students', function(Blueprint $table) {
			$table->foreign('stage_id')->references('id')->on('students')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('courses', function(Blueprint $table) {
			$table->foreign('teacher_id')->references('id')->on('teachers')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('courses', function(Blueprint $table) {
			$table->foreign('stage_id')->references('id')->on('stages')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('exames', function(Blueprint $table) {
			$table->foreign('course_id')->references('id')->on('courses')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('exames', function(Blueprint $table) {
			$table->foreign('teacher_id')->references('id')->on('teachers')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('coupons', function(Blueprint $table) {
			$table->foreign('cource_id')->references('id')->on('courses')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('coupons', function(Blueprint $table) {
			$table->foreign('teacher_id')->references('id')->on('teachers')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('coupon_student', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('coupon_student', function(Blueprint $table) {
			$table->foreign('coupon_id')->references('id')->on('coupons')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('course_student', function(Blueprint $table) {
			$table->foreign('course_id')->references('id')->on('courses')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('course_student', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('students_stage_id_foreign');
		});
		Schema::table('courses', function(Blueprint $table) {
			$table->dropForeign('courses_teacher_id_foreign');
		});
		Schema::table('courses', function(Blueprint $table) {
			$table->dropForeign('courses_stage_id_foreign');
		});
		Schema::table('exames', function(Blueprint $table) {
			$table->dropForeign('exames_course_id_foreign');
		});
		Schema::table('exames', function(Blueprint $table) {
			$table->dropForeign('exames_teacher_id_foreign');
		});
		Schema::table('coupons', function(Blueprint $table) {
			$table->dropForeign('coupons_cource_id_foreign');
		});
		Schema::table('coupons', function(Blueprint $table) {
			$table->dropForeign('coupons_teacher_id_foreign');
		});
		Schema::table('coupon_student', function(Blueprint $table) {
			$table->dropForeign('coupon_student_student_id_foreign');
		});
		Schema::table('coupon_student', function(Blueprint $table) {
			$table->dropForeign('coupon_student_coupon_id_foreign');
		});
		Schema::table('course_student', function(Blueprint $table) {
			$table->dropForeign('course_student_course_id_foreign');
		});
		Schema::table('course_student', function(Blueprint $table) {
			$table->dropForeign('course_student_student_id_foreign');
		});
	}
}