<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreLoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'loan_date' => [
                'required', 'date',
            ],
            'return_date' => [
                'required', 'date',
            ],
            'status' => [
                'required', 'integer',
            ],
            'book_id' => [
                'required', 'integer',
            ],
            'user_id' => [
                'required', 'integer',
            ],
        ];
    }
}
