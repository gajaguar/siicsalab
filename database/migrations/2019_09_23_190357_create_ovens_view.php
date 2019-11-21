<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateOvensView extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    DB::statement('
      CREATE
        ALGORITHM = UNDEFINED
        -- DEFINER = root@localhost
        SQL SECURITY DEFINER
        VIEW `ovens` AS
        SELECT `id`,
               `general_equipment_name` AS `oven_name`
        FROM   `general_equipment`
        WHERE  `equipment_type_id` = 13 AND `equipment_status_id` = 1;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `ovens`;');
  }
}
