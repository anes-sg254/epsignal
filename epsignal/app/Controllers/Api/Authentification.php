<?php namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Authentification extends ResourceController
{
    protected $modelName = 'App\Models\Mshield';
    protected $model;
    protected $format = 'json';

    public function index()
    {
        $result = $this->model->getAll();
        return $this->respond($result);
    }

    public function show($id = null)
    {
        $result = $this->model->getDetail($id);
        if ($result != null) {
            return $this->respond($result);
        } else {
            return $this->respond($result, 400);
        }
    }

}
