<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrudNewsStoreRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'title' => 'max:255|required',
            'teaser' =>'max:65535',
            'teaser2' =>'max:65535',
            'content' =>'max:65535',
            'is_enabled' => 'boolean',
            'slug' => 'unique:news,slug',
            'seo_title' => 'max:255',
            'seo_description' => 'max:255'
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
