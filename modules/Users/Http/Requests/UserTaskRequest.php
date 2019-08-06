<?php

namespace Modules\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserTaskRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string|max:5000',
            'category_id'   => 'required|integer|exists:categories,id',
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