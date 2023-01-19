<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('manage-users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email',
            ],
            'username' => [
                'string',
                'required',
                'unique:users,username',
            ],
            'password' => [
                'required',
            ],
            'role_id' => [
                'required',
                'integer',
            ],
            'kelas' => [
                'string',
                'nullable',
            ],
            'jurusan' => [
                'string',
                'nullable',
            ],
            'lokasi' => [
                'string',
                'nullable',
            ],
        ];
    }
}
