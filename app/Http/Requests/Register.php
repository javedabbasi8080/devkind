<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\User;

class Register extends FormRequest
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

            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'dob'  => 'before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
        
            
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'      => 'Name is required.',
            'email.required'     => "Email is required",
            'dob.before_or_equal'       => 'Age shoud be atleast 18 years old',
        ];
    }

    public function process()
    {

         User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            'dob'      => $this->dob
        ]);

        return redirect()->back()->with('message', 'Register Successfully');
    }
}
