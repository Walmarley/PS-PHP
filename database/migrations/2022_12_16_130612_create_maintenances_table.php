<?php

use App\Models\Vehicle;
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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vehicle::class)->references('id')->on('vehicles')->onDelete('CASCADE');
            $table->string('maintenance');
            $table->string('description');
            $table->date('scheduling');
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
        Schema::table('maintenances', function(Blueprint $table){
            $table->dropForeignIdFor(Vehicle::class);
        });
        Schema::dropIfExists('maintenances');
    }
};
