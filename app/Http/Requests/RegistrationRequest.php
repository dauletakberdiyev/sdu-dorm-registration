<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'first_name'    => 'required',
            'last_name' => 'required',
            'father' => 'string',
            'birth_date' => 'date',
            'city' => 'required',
            'type_of_study' => 'required',
            'faculty_code' => 'required',
            'program_code' => 'required',
            'course' => 'required|integer',
            'school' => 'required',
            'address' => 'required',
            'father_number' => 'string',
            'mother_number' => 'string',
            'self_number' => 'string',
            //'check' => 'required|image|mimes:jpeg,jpg,png'
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
