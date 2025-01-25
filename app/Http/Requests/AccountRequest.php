<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100'],
            'description' => ['max:1000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nom',
            'description' => 'Description',
        ];
    }
}
