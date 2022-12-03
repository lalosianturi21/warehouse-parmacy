<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\PurchasesModel;

class PurchaseItemModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'purchase_items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['purchase_id', 'medicine_id', 'price', 'quantity', 'subtotal'];

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

    public function get_data_by_sale($purchase_id){
        $query = $this->where('purchase_id', $purchase_id);
        $query = $this->join('medicine', 'medicine.id = purchase_items.medicine_id');
        $query = $this->select(
            'purchase_items.*, medicine.name AS medicine_name'
        );
        return $query->get()->getResult();
    }

public function get_data($id){
    return $this->find($id);
}

public function create_data($params){
    $subtotal = $params->getVar('quantity') * $params->getVar('price');
    $data = [
        'purchase_id' => $params->getVar('purchase_id'),
        'medicine_id' => $params->getVar('medicine_id'),
        'quantity' => $params->getVar('quantity'),
        'price' => $params->getVar('price'),
        'subtotal' => $subtotal
    ];
    if($this->save($data)) {
        $purchase_item_model = new PurchasesModel() ;
        return $purchase_item_model->update_grand_total($params->getVar('purchase_id'));
       } else {
        return false;
       }
}
}