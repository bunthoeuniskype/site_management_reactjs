<?php

namespace App\Api\Requests;

use Config;
//use Dingo\Api\Http\FormRequest;
use Illuminate\Http\Request;

class LoginRequest extends Request
{
    public function rules()
    {
        return Config::get('boilerplate.login.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
