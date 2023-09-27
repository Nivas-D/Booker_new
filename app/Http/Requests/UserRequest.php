<?php
namespace App\Http\Requests;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
    public function authorize(){
        return auth()->check();
    }
    public function rules(){
        return [
            'name' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'role_id' => [
                'required', 'exists:'.(new Role)->getTable().',id'
            ],
            'password' => [
                $this->route()->user ? 'nullable' : 'required', 'confirmed', 'min:6'
            ]
        ];
    }
    public function attributes(){
        return [
            'role_id' => 'role',
        ];
    }
}
