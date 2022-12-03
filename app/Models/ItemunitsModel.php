<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemunitsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'itemunits';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function get_all_data(){
        return $this->get()->getResult();
}

public function get_data($id){
    return $this->find($id);
}

public function search_data($search){
    $query = $this->like('LOWER(name)', strtolower($search));
    return $query->paginate(5, 'itemunits');
}





public function create_data($params){
    $data = [
        'name' => $params->getVar('name'),
    ];
    return $this->save($data);
}

public function update_data($id, $params) {

    $data = [
        'name' => $params->getVar('name'),
    ];
    return $this->update($id, $data);
}

}
