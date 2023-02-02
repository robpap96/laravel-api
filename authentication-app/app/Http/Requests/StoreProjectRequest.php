<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            "name" => "required|unique:projects|string|max:100",
            "content" => "required|string",
            "cover_image" => "nullable|image|max:2048",
            "created_on" => "required|date",
            "customer" => "required|string",
            "private" => "required|boolean",
            "type_id" => "nullable|exists:types,id",
            "technologies" => "nullable|exists:technologies,id"

        ];
    }
}
