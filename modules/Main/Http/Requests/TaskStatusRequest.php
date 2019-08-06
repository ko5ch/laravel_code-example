<?php

namespace Modules\Main\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class TaskStatusRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'status' => 'required|boolean',
        ];
    }

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}