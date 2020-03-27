<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class lendingRequest extends FormRequest
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
        $before_date = Carbon::now()->subDays(0)->toDateString();
        $after_date = Carbon::now()->addDays(15)->toDateString();

        switch ($this->method()){
            case 'POST':
                return [
                    //
                    'lending_date' => 'required|date|after:yesterday',
                    'return_date' => 'required|date|before:' . $after_date . '|after:' . $before_date,
                ];
            case 'PATCH':
            case 'PUT':
                return [
                    'lending_date' => 'required',
                    'return_date' => 'required|date|before:' . $after_date . '|after:' . $before_date,
                ];
                break;
        }
    }
}
