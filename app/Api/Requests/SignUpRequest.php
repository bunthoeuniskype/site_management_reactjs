<?php

namespace App\Api\Requests;

use Config;
//use Dingo\Api\Http\FormRequest;
use Illuminate\Http\Request;

class SignUpRequest extends Request
{
    public function rules()
    {
        return Config::get('boilerplate.sign_up.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
