<?php 
namespace App\http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        dd(request()->all());
        
        return[
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'role'=> 'required',
        ];
    }
}