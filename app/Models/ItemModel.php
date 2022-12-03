<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'tanggal', 'staff', 'harga', 'stock', 'image_name', 'expired'];

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
        $query = $this->like('LOWER(nama)', strtolower($search));
        $query = $query->orLike('LOWER(staff)', strtolower($search));
        $query = $query->orLike('LOWER(harga)', strtolower($search));
        $query = $query->orLike('LOWER(stock)', strtolower($search));
        $query = $query->orLike('LOWER(harga)', strtolower($search));
        $query = $query->orLike('LOWER(tanggal)', strtolower($search));
        $query = $query->orLike('LOWER(expired)', strtolower($search));
        $query = $query->orderBy('nama', 'ASC');
        return $query->paginate(5, 'items');
    }



    

    public function create_data($params){
        $uploaded_file = $params->getFile('image_upload');
        $image_name = $uploaded_file->getRandomName();
        $uploaded_file->move('assets/images', $image_name);

        $data = [
            'nama' => $params->getVar('nama'),
            'tanggal' => $params->getVar('tanggal'),
            'staff' => $params->getVar('staff'),
            'harga' => $params->getVar('harga'),
            'stock' => $params->getVar('stock'),
            'image_name' => $image_name,
            'expired' => $params->getVar('expired'),
        ];
        return $this->save($data);
    }

    public function update_data($id, $params) {
        $uploaded_file = $params->getFile('image_upload');
        $image_name = $uploaded_file->getRandomName();
        $uploaded_file->move('assets/images', $image_name);

        $data = [
            'nama' => $params->getVar('nama'),
            'tanggal' => $params->getVar('tanggal'),
            'staff' => $params->getVar('staff'),
            'harga' => $params->getVar('harga'),
            'stock' => $params->getVar('stock'),
            'image_name' => $image_name,
            'expired' => $params->getVar('expired')
        ];
        return $this->update($id, $data);
    }

}
