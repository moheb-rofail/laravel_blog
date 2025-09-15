<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => [
                "required",
                "min:10", 
                Rule::unique('posts', 'title')->ignore($this->post) // ignores comparing with the title of current post (when update)
            ],
            "body"=> ["min:100","string","required"],
            "user_id" => ["integer", "gt:0"],
            //'_method' => ['required'] // in postman, we have to use post, so we send _method as PUT in the body
            //'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }
}
