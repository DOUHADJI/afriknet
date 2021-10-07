<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerUserRequest extends FormRequest
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
            "name" => ["required"],
            "prenoms"=> ["required"],
            "email" => ["required"],
            "contact"=> ["required"],
            "pays"=> ["required"],
            "ville"=> ["required"],
            "password" => ["required"],
            "type" => ["required"],
            "password_confirmation" => ["required"],
            "statut"=> ["required"]
        ];
    }
}
