<?php

namespace App\Controllers;

use App\Models\Mcontainer;
use App\Models\Mshield;

class Clogin extends BaseController
{
    public function index(): string
    {
        $model = new Mcontainer();
        $data['result'] = $model->getAll();
        $page['contenu'] = view('v_connexion', $data);
        return view('Commun/v_template', $page);
    }
}