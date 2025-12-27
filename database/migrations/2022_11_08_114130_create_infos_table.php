<?php

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
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('object');
            $table->string('spn');
            $table->string('description');
            $table->decimal('square-meter');
            $table->integer('floor');
            $table->integer('spaces');
            $table->integer('bathroom');
            $table->string('street');
            $table->string('homenumber');
            $table->string('zip');
            $table->string('city');
            $table->string('country');
            $table->string('managementtype');
            $table->decimal('coldrent');
            $table->decimal('deposit');
            $table->decimal('heatingcost');
            $table->decimal('aclsp');
            $table->decimal('clspo');
            $table->date('builddate');
            $table->boolean('kitchen')->default(false);
            $table->boolean('balcon')->default(false);
            $table->boolean('guest-toilt')->default(false);
            $table->boolean('garden')->default(false);
            $table->boolean('cellar')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('disabledaccess')->default(false);
            $table->boolean('animals')->default(false);
            $table->string('quantityequipment');
            $table->string('buildingstyle');
            $table->date('lastrenovation');
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
        Schema::dropIfExists('infos');
    }
};
