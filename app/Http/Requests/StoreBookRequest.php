<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreBookRequest extends FormRequest
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
            'title' => [
                'required', 'string',
            ],
            'author' => [
                'required', 'string',
            ],
            'publication_year' => [
                'required', 'string',
            ],
            'book_page' => [
                'required', 'string',
            ],
            'publisher' => [
                'required', 'string',
            ],
            'isbn' => [
                'required', 'string',
            ],
            'status' => [
                'required', 'integer',
            ],
        ];
    }
}
