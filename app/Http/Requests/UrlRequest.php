<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UrlRequest extends FormRequest
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
        $rule = [];

        $route = Route::currentRouteAction();
        $name = explode('@', $route);
        switch (end($name)) {
            case 'store':
                $rule['url'] = ['required', 'url'];
                break;
        }

       return $rule;
    }
}
