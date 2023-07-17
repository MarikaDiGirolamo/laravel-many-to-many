<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

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
            // "type_id" => "nullable|exists:types,id",
            "image" => ["nullable", File::types(["png", "jpg"])->max(20 * 1024)], //questo metodo mi permete di settare le proprietà delle mie immagini
            "link" => "nullable|url|max:255",
            "technologies" => "nullable|exists:technologies,id"
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
