<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtendedWork extends Model
{
  public function extendedClient()
  {
    return $this->belongsTo(ExtendedClient::class);
  }

  public function indexWork()
  {
    return $this
      ->select(
        'id',
        'work_name',
        'work_orders')
      ->get();
  }

  public function showWork(int $id)
  {
    return $this
      ->select(
        'id',
        'client_id',
        'client_name',
        'work_name',
        'work_nickname',
        'work_location')
      ->findOrFail($id);
  }

  public function worksByClient(int $id)
  {
    return $this
      ->select(
        'id',
        'work_name',
        'work_orders')
      ->where('client_id', $id)
      ->get();
  }

  public function workNames()
  {
    return $this
      ->select(
          'id',
          'work_name')
      ->get();
  }
}
