<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicineModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'medicine';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['code', 'name', 'description', 'min-stock', 'max-stock', 'current_stock', 'price', 'status_id', 'item_unit_id', 'image_name'];

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
    $query = $this->like('LOWER(code)', strtolower($search));
    $query = $query->orLike('LOWER(name)', strtolower($search));
    $query = $query->orLike('LOWER(description)', strtolower($search)); 
    $query = $query->orLike('LOWER(current_stock)', strtolower($search));
    $query = $query->orLike('LOWER(price)', strtolower($search));
    $query = $query->orLike('LOWER(status_id)', strtolower($search));
    $query = $query->orLike('LOWER(item_unit_id)', strtolower($search));
    return $query->paginate(5, 'medicine');
}

public function create_data($params){
    $uploaded_file = $params->getFile('image_upload');
    $image_name = $uploaded_file->getRandomName();
    $uploaded_file->move('assets/images', $image_name);
    
    $data = [
        'code' => $params->getVar('code'),
        'name' => $params->getVar('name'),
        'description' => $params->getVar('description'),
        'min-stock' => $params->getVar('min-stock'),
        'max-stock' => $params->getVar('max-stock'),
        'current_stock' => $params->getVar('current_stock'),
        'price' => $params->getVar('price'),
        'status_id' => $params->getVar('status_id'),
        'item_unit_id' => $params->getVar('item_unit_id'),
        'image_name' => $image_name
    ];
    return $this->save($data);
}

public function update_data($id, $params) {
    $uploaded_file = $params->getFile('image_upload');
    $image_name = $uploaded_file->getRandomName();
    $uploaded_file->move('assets/images', $image_name);
    
    $data = [
        'code' => $params->getVar('code'),
        'name' => $params->getVar('name'),
        'description' => $params->getVar('description'),
        'min-stock' => $params->getVar('min-stock'),
        'max-stock' => $params->getVar('max-stock'),
        'current_stock' => $params->getVar('current_stock'),
        'price' => $params->getVar('price'),
        'status_id' => $params->getVar('status_id'),
        'item_unit_id' => $params->getVar('item_unit_id'),
        'image_name' => $image_name
    ];
    return $this->update($id, $data);
}

}