<?php

namespace BB\Modules\Companies;


class CompaniesDefinition
{
    public function validation() {
        return [
            'name' => 'required|unique:companies|max:255',
            'email' => 'required|email|unique:companies',
            'contact' => 'required',
            'phone' => 'required',
        ];
    }


    public function updateValidation($id = '') {
        return [
            'name' => 'required|unique:companies,name,'. $id .'|max:255',
            'email' => 'required|email|unique:companies,email,' .$id  ,
            'contact' => 'required',
            'phone' => 'required',
        ];
    }

    public function requestFields(){
        return [
            'name',
            'email',
            'contact',
            'phone',
        ];
    }

}