<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sales';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['invoice_no', 'invoice_date', 'supplier_id', 'grand_total', 'user_id'];

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
    $query = $this->like('LOWER(invoice_no)', strtolower($search));
    $query = $query->orLike('LOWER(invoice_date)', strtolower($search)); 
    $query = $query->orLike('LOWER(supplier_id)', strtolower($search));
    return $query->paginate(5, 'sales');
}

public function create_data($params){

    $prefix = 'SL' . date('y') . date('m');
    $query = $this->like('invoice_no', $prefix)->orderBy('invoice_no', 'desc')->get()->getRow();
    if($query == NULL){
        $number = '00001';
    } else {
        $number = intval(str_replace($prefix, '', $query->invoice_no)) + 1;
        $number = str_pad($number, 5, '0', STR_PAD_LEFT);
    }
    $invoice_no = $prefix . $number;
    

    $data = [
        'invoice_no' => $invoice_no,
        'invoice_date' => $params->getVar('invoice_date'),
        'supplier_id' => $params->getVar('supplier_id'),
        'user_id' => current_user() ['id'],
        
    ];
    return $this->save($data);
}

public function update_data($id, $params) {
    $data = [
        'invoice_no' => $params->getVar('invoice_no'),
        'invoice_date' => $params->getVar('invoice_date'),
        'supplier_id' => $params->getVar('supplier_id')
    
    ];
    return $this->update($id, $data);
}

public function update_grand_total($id) {
    $query = $this->where('sales.id', $id);
    $query = $query->join('sale_items', 'sale_items.sale_id = sales.id');
    $query = $query->selectSum('subtotal', 'grand_total');
    $query = $query->get()->getRow();
    $data = [
        'grand_total'  => $query->grand_total
    ];
    return $this->update($id, $data);
}

}

