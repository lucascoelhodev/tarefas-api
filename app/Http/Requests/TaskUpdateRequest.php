<?php

namespace App\Http\Requests;

use App\Enum\StatusEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
            'titulo' => 'nullable|string',
            'descricao' => 'nullable|string',
            'status' => ['nullable', 'integer', new EnumValue(StatusEnum::class)],
        ];
    }
    public function getOnlyData(): array
    {
        return $this->only(['titulo', 'descricao', 'status']);
    }
}
