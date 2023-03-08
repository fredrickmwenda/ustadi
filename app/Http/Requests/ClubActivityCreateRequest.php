<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubActivityCreateRequest extends FormRequest
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
            'activities_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'club_id' => 'required|integer',
            'activity_type_id' => 'required|integer'
        ];
    }
}
