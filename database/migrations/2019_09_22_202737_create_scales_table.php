<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScalesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('scales', function (Blueprint $table) {
      
      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('unit_id');
      $table->string('scale_name', 6);
      $table->unsignedSmallInteger('scale_capacity')
        ->nullable()
        ->default(null);
      $table->decimal('scale_precision', 5, 3)
        ->nullable()
        ->default(null);
      $table->boolean('scale_type')
        ->nullable()
        ->default('0');
      $table->string('scale_trademark', 25)
        ->nullable()
        ->default(null);
      $table->date('scale_verified_at')
        ->nullable()
        ->default(null);
      $table->date('scale_valid_to')
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->unique('scale_name');

      // Foreign keys
      $table->foreign('unit_id')
        ->references('id')
        ->on('units')
        ->onDelete('cascade')
        ->onUpdate('cascade');
    });
    Schema::enableForeignKeyConstraints();
  }
  
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('scales');
    Schema::enableForeignKeyConstraints();
  }
}