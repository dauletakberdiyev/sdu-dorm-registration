<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class RegistrationRequest extends FormRequest
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
            'firstName'    => 'required',
            'lastName' => 'required',
            'father' => 'string',
            'birthDate' => 'date',
            'city' => 'required',
            'typeOfStudy' => 'required',
            'facultyCode' => 'required',
            'programCode' => 'required',
            'course' => 'required|integer',
            'school' => 'required',
            'address' => 'required',
            'fatherNumber' => 'string',
            'motherNumber' => 'string',
            'selfNumber' => 'string',
            'checkPhoto' => 'required|image|mimes:jpeg,jpg,png'
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        $data = [
            'status' => 'error',
            'message' => $validator->errors()->first(),
            'data' => []
        ];

        throw new HttpResponseException(response()->json($data, 406));
    }
}
