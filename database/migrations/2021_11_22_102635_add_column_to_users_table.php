<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('school')->nullable();
            $table->string('dob')->nullable();
            $table->string('zila')->nullable();
            $table->string('designation')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('current_address')->nullable();
            $table->string('blood')->nullable();
            $table->string('bikash')->nullable();
            $table->string('fb')->nullable();
            $table->string('picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
