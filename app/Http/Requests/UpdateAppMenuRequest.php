<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppMenuRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'menu_title' => 'required|string|max:100',
            'menu_no' => 'required|integer',
            'menu_parent_no' => 'nullable|integer',
            'depth' => 'required|integer',
            'is_delete' => 'boolean',
            'updated_by' => 'required|string|max:100',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
