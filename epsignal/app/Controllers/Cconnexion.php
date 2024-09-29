<?php

namespace App\Controllers;

use App\Models\Mconnexion;

class Cconnexion extends BaseController
{
  public function index()
  {
    $page['contenu'] = view('v_connexion');
    return view('Commun/v_template', $page);
  }


  public function authentication()
  {
    $session = session();
    $request = \Config\Services::request();
    $model = new Mconnexion();

    // Récupérer le login et le mdp
    $login = $request->getPost("login");
    $password = $request->getPost("password");

    // Chercher les informations dans la base de données
    $data = $model->search($login);

    // Vérifier si le mdp saisi correspond à celui stocké dans la bdd
    // 'password_verify' compare le mdp haché avec le mdp saisi
    $verify = password_verify($password, $data[0]['password']);

    if ($verify == true) {
      $data_session = [
        'login' => $login,
        'role' => $data[0]['role']
      ];
      // Redirection en fonction du rôle
      $session->set($data_session);
      if ($data_session['role'] == 'admin') {
        $redirect = 'Cdemarrer';
      } else if ($data_session['role'] == 'etudiant') {
        $redirect = 'Carreter';
      }
    } else {
      $redirect = 'Cconnexion';
    }
    return redirect()->to($redirect);
  }

  public function logout()
  {
    $session = session();
    $data_session = [
      'login' => null,
      'role' => null
    ];
    $session->set($data_session);
    $session->destroy();
    return redirect()->to('Cconnexion');
  }

  public function refresh()
  {
    return redirect()->to($_SERVER['REQUEST_URI'], 'refresh');
  }
}
