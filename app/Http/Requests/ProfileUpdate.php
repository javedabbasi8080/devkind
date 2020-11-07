<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class ProfileUpdate extends FormRequest
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
            'password' => 'required|string|min:8|confirmed',
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
        ];
    }

    public function process()
    {
         User::find(Auth::user()->id)->update([
            'name'     => $this->name,
            'password' => Hash::make($this->password),
        ]);

        return redirect()->back()->with('message', 'Profile updated successfully');
    }
}
