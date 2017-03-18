<?php

namespace BB\Modules\Users;

class UsersDefinition
{
    public function validation() {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'mimes:jpeg,bmp,png',
        ];
    }


    public function updateValidation($id = '') {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'. $id . '',
            'avatar' => 'mimes:jpeg,bmp,png',
        ];
    }

    public function requestFields(){
        return [
            'name',
            'email',
            'password',
            'avatar',
            'role_id',
        ];
    }

}