<?php
namespace App\Models;
use CodeIgniter\Model;

class Mconnexion extends Model
{
  protected $table = 'user';
  protected $primaryKey = 'id';
  protected $returnType = 'array';

  public function search($prmLogin)
  {
    $query = $this->select('login,password,role')->where(['login'=>$prmLogin]);
    $returnVal = $query->findall();
    if (count($returnVal)==0) {
      $returnVal[0]['password'] = null;
    }
    return $returnVal;
  }
}