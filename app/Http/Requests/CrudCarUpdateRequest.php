<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrudCarUpdateRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'class_id' => ['required'],
          'body_type_id' => ['required'],
          'fuel_type_id' => ['required'],
          'drive_type_id' => ['required'],
          'name' => ['required'],
          'seat_count' => ['required'],
          'avg_fuel_consumption' => ['required'],
          'engine_volume' => ['required'],
          'year' => ['required'],
          'min_cost' => ['required'],
          'doors_count' => ['required'],
          'transmission_name' => ['required'],
          'images' => []
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
