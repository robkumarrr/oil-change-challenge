<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CarStoreRequest extends FormRequest
{
    private mixed $current_odometer;
    private mixed $odometer_at_prev_oil_change;

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
            'current_odometer' => 'required|int',
            'date_of_prev_oil_change' => 'required|date',
            'odometer_at_prev_oil_change' => 'required|int'
        ];
    }

    /**
     * @return mixed
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($this->current_odometer <= $this->odometer_at_prev_oil_change) {
                    $validator->errors()->add(
                        'current_odometer',
                        'Current odometer can not be less than the odometer at the previous oil change.'
                    );
                }
            }
        ];
    }
}
