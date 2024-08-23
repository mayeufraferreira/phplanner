<?php

namespace App\Http\Requests;

use App\Enums\GoalDuration;
use App\Enums\GoalStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GoalCreateRequest extends FormRequest
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
            'title' => ['required', 'string'],
			'description' => ['required', 'string'],
			'start' => ['required', 'date_format:Y-m-d H:i:s', 'string'],
			'duration' => ['required', Rule::enum(GoalDuration::class)],
			'status' => ['required', Rule::enum(GoalStatus::class)],
        ];
    }
}
