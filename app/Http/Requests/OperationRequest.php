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
            'label' => ['required', 'string', 'max:150'],
            'amount' => ['required', 'numeric', 'max:99999999', 'decimal:0,2'],
            'delivery_at' => ['required', 'date'], // https://laravel.com/docs/11.x/validation#rule-date-format
        ];
    }

    public function attributes(): array
    {
        return [
            'label' => 'Libellé',
            'amount' => 'Montant',
            'delivery_at' => 'Date effective',
        ];
    }
}
