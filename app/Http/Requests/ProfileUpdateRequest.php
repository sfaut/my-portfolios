<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'last_name' => 'Nom',
            'first_name' => 'Prénom',
            'email' => 'E-mail',
        ];
    }

    public function rules(): array
    {
        return [

            'last_name' => [
                'required',
                'string',
                'max:30',
            ],

            'first_name' => [
                'required',
                'string',
                'max:30',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:100',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }
}
