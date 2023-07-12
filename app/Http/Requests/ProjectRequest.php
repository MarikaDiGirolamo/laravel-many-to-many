<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            "title" => "required|min:3|max:50",
            "content" => "min:5|max:255",
            // "type_id" => "nullable|exist:types,id",
            "image" => "nullable|url|max:255",
            "link" => "nullable|url|max:255"
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Il titolo è richiesto",
            // "name.required" => "Please Choose One"
        ];
    }
}
