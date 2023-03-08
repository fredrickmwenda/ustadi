<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class schoolCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'school_name' => 'required|string|max:255',
            'county_id' => 'required|integer',
            'phone'=> 'required|string',
            'email'=> 'required|email|max:255',
            'motto' => 'required|string|max:255',
        ];
    }
}
