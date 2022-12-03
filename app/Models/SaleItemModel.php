<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\SalesModel;

class SaleItemModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sale_items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['sale_id', 'medicine_id', 'price', 'quantity', 'subtotal'];

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

    public function get_data_by_sale($sale_id){
        $query = $this->where('sale_id', $sale_id);
        $query = $this->join('medicine', 'medicine.id = sale_items.medicine_id');
        $query = $this->select(
            'sale_items.*, medicine.name AS medicine_name'
        );
        return $query->get()->getResult();
    }

    public function get_data($id){
        return $this->find($id);
    }

    public function create_data($params){
        $subtotal = $params->getVar('quantity') * $params->getVar('price');
        $data = [
            'sale_id' => $params->getVar('sale_id'),
            'medicine_id' => $params->getVar('medicine_id'),
            'quantity' => $params->getVar('quantity'),
            'price' => $params->getVar('price'),
            'subtotal' => $subtotal
        ];
       if($this->save($data)) {
        $sales_model = new SalesModel() ;
        return $sales_model->update_grand_total($params->getVar('sale_id'));
       } else {
        return false;
       }
    }

    public function update_data($id, $params) {
        $data = [
            'sale_id' => $params->getVar('sale_id'),
            'medicine_id' => $params->getVar('medicine_id'),
            'quantity' => $params->getVar('quantity'),
            'price' => $params->getVar('price'),
            'subtotal' => $subtotal
        
        ];
        return $this->update($id, $data);
    }
}
