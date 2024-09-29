<?php

namespace App\Models;

use CodeIgniter\Model;

class Msignalement extends Model
{
    protected $table = 'signalement';
    protected $primaryKey = 'id';
    protected $returnType = 'array';


    public function getAll()
    {
        $requete = $this->select('id, etudiant, motif, lieu, horaire, commentaire, idEtudiant, statut');
        return $requete->paginate(10);
    }

    public function getDetail($prmTransport)
    {
        $requete = $this->select('*')
            ->where(['numTransport' => $prmTransport]);
        return $requete->findAll();
    }
    
    public function createSignalement($prmData)
    {
        $this->allowedFields = ['id', 'etudiant', 'motif', 'lieu', 'horaire', 'commentaire', 'idEtudiant'];
        $this->insert($prmData);
        $retour['lastInsertId'] = $this->insertID('Id');
        return $retour;
    }

    public function updateSignalement($prmData, $prmId)
    {
        $this->allowedFields = ['statut'];
        $this->update($prmId, $prmData);
        $requete = $this->select('*')
            ->where(['id' => $prmId]);
        return $requete->first();
    }
}
