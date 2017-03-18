<?php

namespace BB\Core\Database;

use Illuminate\Support\Facades\Storage;

abstract class  Repository
{
    public $definition;

    protected $model;

    protected $shouldBeFilterd = false;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->initDefinition($model);

    }

    public function model()
    {
        if (isset($this->model)) {
            return $this->model;
        }
        return null;
    }

    public function query()
    {
        return $this->model()->query();
    }

    public function store($attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($attributes, $id)
    {
        $model = $this->model->find($id);
        $model->update($attributes);
        return $model;
    }

    public function destroy($id)
    {
        $this->model->destroy($id);
    }

    //to fix
    public function deleteImage($id, $image, $field = null)
    {
        $field = is_null($field) ? $this->model->imageField : $field;

        if (is_null($field)) {
            throw new \Exception('Image deletion failed!');
        }

        $currentModel = $this->model->find($id);
        $currentModel->setAttribute($field, '');
        $currentModel->save();

        Storage::delete($image);
    }

    protected function initDefinition($model)
    {

        $modelClass = get_class($model);

        $pluralClass = str_plural($modelClass);
        if (class_exists($pluralClass . 'Definition')) {
            $this->definition = app($pluralClass . 'Definition');
        }
    }

    public function getAll($filter = ''){

        return $this->model()->when($this->shouldBeFilterd, function ($query) use ($filter) {
            return $query->where($filter);
        })->orderBy("created_at", "DESC")->get();
    }


}