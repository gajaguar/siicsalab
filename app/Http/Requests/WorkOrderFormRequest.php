<?php

namespace Sislab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkOrderFormRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'id' => 'required|integer',
      'work_id' => 'required|integer',
      'employee_id' => 'required|integer',
      'work_order_date' => 'required|date|before:tomorrow'
    ];
  }
}