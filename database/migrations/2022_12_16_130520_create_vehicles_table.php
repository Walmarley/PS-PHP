<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('CASCADE');
            $table->string('mark');
            $table->string('version');
            $table->string('model');
            $table->string('color');
            $table->string('plate')->unique();
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
        Schema::table('vehicles', function(Blueprint $table){
            $table->dropForeignIdFor(User::class);
        });

        Schema::dropIfExists('vehicles');
    }
};
