<?php

namespace BB\Modules\Common;

Trait CompanyFiter
{

    public function scopeFiltersData($query, Request $request)
    {
        if($companyId = $request->user()->company_id){
            return $query->where('company_id', $companyId );
        }

    }

}