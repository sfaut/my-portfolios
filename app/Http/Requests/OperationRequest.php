<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperationRequest extends FormRequest
{
    protected $errorBag = 'default';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description' => ['required', 'string', 'max:100'],
            'amount' => ['required', 'numeric', 'max:99999999', 'decimal:0,2'],
            'delivery_at' => ['required', 'date'], // https://laravel.com/docs/11.x/validation#rule-date-format
        ];
    }

    public function attributes(): array
    {
        return [
            'description' => 'Description',
            'amount' => 'Montant',
            'delivery_at' => 'Date de livraison',
        ];
    }
}
