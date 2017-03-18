<?php

namespace BB\Modules\Users;

use Auth;

use BB\Modules\ModuleController;
use BB\Modules\Products\Product;
use BB\Modules\Roles\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends ModuleController
{
    protected $resourceName = 'users';
    protected $viewPath = 'users';

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware('applicant')->only('index');
    }

    public function profile()
    {
        return view('panel.users.profile', ['model' => $this->user]);
    }

    public function profileUpdate(Request $request)
    {

        parent::update($request, $request->user()->id);
        return response()->redirectToRoute('company.profile');
    }

    public function store(Request $request)
    {
        $roleRepository = $this->getRepository('Roles');
        $role = $roleRepository->model()->find($request->role_id);
        $this->checkAndSaveUser($role,$request);
        return response()->redirectToRoute('users.index');

    }

    public function removeFromCompany($userId){

        $usr = $this->repository->model()->find($userId);
        $this->authorize('edit',$usr);
        $this->repository->removeUserCompanyAndRole($usr);
        return response()->redirectToRoute('users.index');
    }

    private function checkAndSaveUser($role,$request){
        if($role && Gate::allows('Admin')){
            $createdUser = parent::storeAndGet($request,$this->companyId);
            $createdUser->role()->associate($role)->save();
        }
    }

}