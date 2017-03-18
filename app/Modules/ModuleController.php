<?php

namespace BB\Modules;

use BB\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

abstract class ModuleController extends Controller
{
    protected $viewPath;
    protected $resourceName;
    protected $repository;
    protected $redirectTo;
    protected $user;
    protected $companyId;

    public function __construct(Request $request)
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();
            $this->companyId = array('company_id' => $this->user->company_id);
            return $next($request);

        });

        if (!isset($this->resourceName)) {
            throw new \LogicException(get_class($this) . ' err $resourceName not found');
        }

        if (!isset($this->viewPath)) {
            $this->viewPath = $this->resourceName;
        }

        $this->repository = $this->instantiateRepository();

    }

    private function instantiateRepository()
    {
        $capital = ucfirst(camel_case($this->resourceName));
        $className = 'BB\Modules\\' . $capital . '\\' . $capital . 'Repository';

        return app($className);
    }

    protected function getRepository($repoName)
    {

        $capital = ucfirst(camel_case($repoName));
        $className = 'BB\Modules\\' . $capital . '\\' . $capital . 'Repository';

        return app($className);
    }

    public function index()
    {

        $models = $this->repository->getAll($this->companyId);
        return view("panel.{$this->viewPath}.index")->with(compact('models'));
    }

    public function create()
    {
        return view("panel.{$this->viewPath}.create");
    }

    public function store(Request $request)
    {

        $this->storeAndGet($request);

        if ($this->redirectTo) {
            return response()->redirectTo($this->redirectTo);
        }

        return response()->redirectToRoute("panel.{$this->viewPath}.index");
    }

    public function edit($id)
    {

        $model = $this->repository->model()->find($id);
        $this->authorize('edit', $model);
        return view("panel.{$this->viewPath}.edit")->with(compact('model'));
    }

    public function update(Request $request, $id)
    {

        $this->updateAndGet($request, $id);

        if ($this->redirectTo) {
            return response()->redirectTo($this->redirectTo);
        }

        return response()->redirectToRoute($this->viewPath . ".index");
    }


    public function destroy($id)
    {

        try {
            $this->repository->destroy($id);
            return back();

        } catch (\Illuminate\Database\QueryException $e) {
            $msgBack = 'Cant delete that item';
            return back()->withErrors($msgBack);
        }
    }

    protected function storeFile($file, $prefix = "file_")
    {
        $fileName = uniqid($prefix) . '.' . $file->guessExtension();

        $filePath = $this->resourceName . '/' . $fileName;

        Storage::put('/public/' . $filePath, File::get($file));

        return $filePath;
    }

    public function storeAndGet(Request $request, $extraData = null)
    {
        if (isset($this->repository->definition)) $this->validate($request, $this->repository->definition->validation());
        $attributes = $request->all();
        is_array($extraData) ? $attributes = array_merge($attributes, $extraData) : '';

        $this->checkRequestFields($attributes);
        $this->checkAndStoreFiles($attributes, $request->files);

        return $this->repository->store($attributes);
    }

    public function updateAndGet(Request $request, $id, $extraData = null)
    {

        if (isset($this->repository->definition)) {
            $validationRules = $this->repository->definition->updateValidation($id);
            $this->validate($request, $validationRules);

        }

        $attributes = $request->only($this->repository->definition->requestFields());
        $this->checkRequestFields($attributes);
        $this->checkAndStoreFiles($attributes, $request->files);

        return $this->repository->update($attributes, $id);

    }

    private function checkRequestFields(& $atributes)
    {


        foreach ($atributes as $name => $field) {

            if (empty($atributes[$name])) {

                unset($atributes[$name]);
            }

            if ($name === "password" && !empty($atributes[$name])) {

                $atributes[$name] = bcrypt($atributes[$name]);
            }
        }


    }

    private function checkAndStoreFiles(& $atributes, $files)
    {

        foreach ($files as $attribute => $file) {

            if (!is_array($file)) {
                $prefix = str_contains($file->getMimeType(), "image") ? "img_" : "file_";
                $atributes[$attribute] = $this->storeFile($file, $prefix);

            }
        }
    }

}
