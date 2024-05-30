<?php

namespace App\Http\Requests\LessonController;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequestStep2 extends FormRequest
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
    public function rules()
    {
        return [
            'content_type' => 'required|string|exists:lessons_types,id',
            'media' => Rule::requiredIf(in_array($this->content_type, [2, 3, 4])) . '|file|mimes:mp4,mp3,pdf,txt,png,jpg,jpeg|max:10485760',
            'content' => Rule::requiredIf($this->content_type == 5) . '|json',
        ];
    }
}
