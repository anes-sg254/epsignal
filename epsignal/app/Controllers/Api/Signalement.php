<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Signalement extends ResourceController
{
    protected $modelName = 'App\Models\Msignalement';
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
    
    public function create()
    {
        $json_datas = file_get_contents('php://input');
        $datas = json_decode($json_datas);
        $result = $this->model->createSignalement($datas);
        if ($result != null) {
            return $this->respond($result, 201);
        } else {
            return $this->respond($datas, 400);
        }
    }

    public function update($prmId = null)
    {
        $json_datas = file_get_contents('php://input');
        $data = json_decode($json_datas, true);
        $result = $this->model->updateSignalement($data, $prmId);
        if ($result != null) {
            return $this->respond($result, 202);
        } else {
            return $this->respond($data, 400);
        }
    }
}
