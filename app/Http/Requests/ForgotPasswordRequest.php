<?php

namespace App\Http\Requests;

use App\Enums\ApiOutputStatus;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ForgotPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'captcha' => 'required',
            'attempts' => 'required|numeric'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $data = [
            'status' => ApiOutputStatus::FORM_VALIDATION_ERROR,
            'message' => $validator->errors()->first(),
            'data' => []
        ];

        throw new HttpResponseException(response()->json($data, 406));
    }
}
