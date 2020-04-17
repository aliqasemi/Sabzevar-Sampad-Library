<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
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

        $before_date = new Verta($before_date);
        $before_date = $before_date->format('Y-n-j');

        $after_date = new Verta($after_date);
        $after_date = $after_date->format('Y-n-j');

        switch ($this->method()){
            case 'POST':
                return [
                    //
                ];
            case 'PATCH':
            case 'PUT':
                return [
                    'lending_date' => 'required',
                ];
                break;
        }
    }
}
