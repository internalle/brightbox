<?php

namespace BB\Modules\Companies;

use BB\Modules\ModuleController;
use Illuminate\Http\Request;
use BB\Modules\Companies\Jobs\AddUserToCompany;

class CompaniesController extends ModuleController
{

    protected $resourceName = 'companies';
    protected $viewPath = 'company';
    protected $user;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware("company")->except(["chooseOption","create","index","store","joinCompany"]);
    }

    public function profile(){
        return view('panel.company.profile');
    }

    public function editCompany(){
      return  parent::edit($this->companyId['company_id']);
    }

    public function store(Request $request)
    {

        if (empty($this->user->company_id)) {
            $company = $this->storeAndGet($request);
            $this->repository->associateUserToCompany($company,$this->user,1);
            return response()->redirectToRoute($this->viewPath . ".index");
        }

        return abort(401);

    }

    public function chooseOption(){
        return view('panel.company.show');
    }

    public function joinCompany($companyId){

          $company = $this->repository->model()->find($companyId);
          $this->repository->associateUserToCompany($company,$this->user);

          return response()->redirectToRoute($this->viewPath . ".index");
    }

}