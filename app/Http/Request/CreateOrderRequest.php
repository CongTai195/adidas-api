<?php

namespace App\Http\Request;

use App\Helpers\ErrorCodeHelper;
use App\Helpers\HttpCode;
use App\Helpers\ResponseHelper;
use App\Helpers\Status;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class CreateOrderRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'transaction_id' => 'required|integer',
            'product_id' => 'required|integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'transaction_id.required' => ErrorCodeHelper::REQUIRED,
            'product_id.required' => ErrorCodeHelper::REQUIRED,
            'transaction_id.integer' => ErrorCodeHelper::INTEGER,
            'product_id.integer' => ErrorCodeHelper::INTEGER,
        ];
    }

    /**
     * handle response validate.
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = [];
        $fields = array_keys($this->rules());
        $validator_errors = (new ValidationException($validator))->errors();
        foreach ($fields as $field) {
            if ($validator_errors[$field] ?? 0) {
                $errors[$field] = $validator_errors[$field][0];
            }
        }
        throw new HttpResponseException(
            ResponseHelper::send([], Status::NG, HttpCode::UNPROCESSABLE_ENTITY, $errors)
        );
    }
}
