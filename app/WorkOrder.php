<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

/**
 * @property mixed id
 * @property mixed work_id
 * @property mixed employee_id
 * @property mixed work_order_date
 */
class WorkOrder extends Model
{
  public function work()
  {
    return $this->belongsTo(Work::class);
  }

  public function employee()
  {
    return $this->belongsTo(Employee::class);
  }

  public function samples()
  {
    return $this->hasMany(Sample::class);
  }

  public function isValid(Request $request)
  {
    $request->validate([
      'id' => 'required|integer',
      'work_id' => 'required|integer',
      'employee_id' => 'required|integer',
      'work_order_date' => 'required|date|before:tomorrow'
    ]);
  }

  public function show(int $id)
  {
    return $this
      ->select(
        'id',
        'work_id',
        'employee_id',
        'work_order_date')
      ->where('id', $id)
      ->first();
  }

  public function saveWorkOrder(Request $request, WorkOrder $workOrder)
  {
    $workOrder->id = $request->get('id');

    $workOrder->work_id = $request->get('work_id');

    $workOrder->employee_id = $request->get('employee_id');

    $workOrder->work_order_date = $request->get('work_order_date');

    $workOrder->save();
  }

  public function deleteWorkOrder(int $id)
  {
    $this
      ->find($id)
      ->delete();
  }
}
