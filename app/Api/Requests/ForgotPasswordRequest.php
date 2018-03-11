<?php

namespace App\Api\Requests;

use Config;
//use Dingo\Api\Http\FormRequest;
use Illuminate\Http\Request;

class ForgotPasswordRequest extends Request
{
    public function rules()
    {
        return Config::get('boilerplate.forgot_password.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
