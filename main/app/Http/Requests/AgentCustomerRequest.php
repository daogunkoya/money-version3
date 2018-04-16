<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentCustomerRequest extends FormRequest
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
            'fname'=>'required',
            'lname' => 'required',
            'email' => 'required',
            'search' => 'required',
            //
        ];
    }

     public function messages()
    {
        return [
            'fname.required'=>'First name is required',
            'lname.required' =>'last name is required',
            'email.required' =>'Email name is required',
            'search.required' =>'Please enter your Address or Postcode',
            //
        ];
    }





}
