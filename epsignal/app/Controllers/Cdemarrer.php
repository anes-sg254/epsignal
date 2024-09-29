<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Cdemarrer extends BaseController
{
    public function index(): string
    {
        $data['page_title'] = "Les echantillons de vêtements";
        $data['titre1'] = "Transport d'echantillons";
        $page['contenu'] = view('v_demarrer', $data);
        return view('Commun/v_template', $page);
    }

}