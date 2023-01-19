<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $user = $this->route('user');

        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->route('user')->id, 'id')->where(function ($query) {
                return $query->where('email', $this->email);
                }),
            ],
            'username' => [
                'string',
                'required',
                Rule::unique('users')->ignore($this->route('user')->id, 'id')->where(function ($query) {
                    return $query->where('username', $this->username);
                }),
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
