<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestCreateRequest extends FormRequest
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
            'mentor_id' => 'required|integer',
            'school_id' => 'required|integer',
            'proposed_date_time' => 'required|date',
            'school_club_activity_id' => 'required|integer'       
        ];
    }
}
