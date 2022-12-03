<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MedicineModel;

class Medicine extends BaseController
{

    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if(!$this->session->get('user_id')){
            $this->session->setFlashdata('danger', 'Anda harus login terlebih dahulu');
            return redirect()->to('/');
        }

        $medicine_model = new MedicineModel();
        $search = $this->request->getVar('search') ?? '';
        $data['medicines'] = $medicine_model->search_data($search);
        $data['pager'] = $medicine_model->pager;
        if($this->request->isAJAX()) {
            return view('medicine/_medicine', $data);
        } else {
            $data['main_view'] ='medicine/index';
            return view('layout', $data);
        }
    }

    public function new()
    {
        $data['main_view'] = 'medicine/new';
        return view('layout', $data);
    }

    public function create()
    {
        if(!$this->validate([
            'code' => "required|integer",
            'name' => 'required|alpha_numeric_space',
            'description' => 'required|alpha_numeric_space',
            'min-stock' => 'required|integer',
            'max-stock' => 'required|integer',
            'current_stock' => 'required|integer',
            'price' => 'required|integer',
            'status_id' => 'required|integer',
            'item_unit_id' => 'required|integer',
            'image_upload' => 'uploaded[image_upload]'

        ])){
            $data['main_view'] = 'medicine/new';
            $data['errors'] = $this->validator;
            return view('layout', $data);
        }
        
        $medicine_model = new MedicineModel();
        $medicine_model->create_data($this->request);
        $this->session->setFlashdata('success', 'Barang berhasil disimpan');
        return redirect()->to('/medicine');

    }
    public function delete($id) {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $medicine_model = new MedicineModel();
            if($medicine_model->delete($id)) {
                $data = [
                    'status' => 200,
                    'message' => 'Barang berhasil dihapus',
                    'id' => $id
                ];
            } else {
                $data = [
                    'status' => 500,
                    'message' => 'Barang gagal dihapus karena tidak ditemukan. Coba refresh kembali!!',
                    'id'=> $id
                ];
            }
            } else {
                $data = [
                    'status' => 500,
                    'message' => 'Anda tidak diizinkan untuk menghapus data',
                    'id' => null
                ];
            }
        echo json_encode($data);
    }

        public function edit($id){
            $medicine_model = new MedicineModel();
            $data['main_view'] = 'medicine/edit';
            $data['medicine'] = $medicine_model->get_data($id);
            return view('layout', $data);
        }

        public function update($id){
            if(!$this->validate([
                'code' => "required|integer",
                'name' => 'required|alpha_numeric_space',
                'description' => 'required|alpha_numeric_space',
                'min-stock' => 'required|integer',
                'max-stock' => 'required|integer',
                'current_stock' => 'required|integer',
                'price' => 'required|integer',
                'status_id' => 'required|integer',
                'item_unit_id' => 'required|integer',
                'image_upload' => 'uploaded[image_upload]'
            ])) {
                $medicine_model = new MedicineModel();
                $data['main_view'] = 'medicine/edit';
                $data['errors'] = $this->validator;
                $data['medicine'] = $medicine_model->get_data($id);
                return view('layout', $data);
            }
    
            $medicine_model = new MedicineModel();
            $medicine_model->update_data($id, $this->request);
            $this->session->setFlashdata('success', 'Barang berhasil diperbarui');
            return redirect()->to('/medicine');
        }

        public function show($id) {
            $medicine_model = new MedicineModel();
            $data['medicine'] = $medicine_model->get_data($id);
            return view('medicine/show', $data);
        }

        public function get_autocomplete(){
            $medicine_model = new MedicineModel();
            $search = $this->request->getVar('term') ?? '';
            $results = $medicine_model->search_data($search);
            foreach($results as $row):
                $arr_result[] = [
                    'id' => $row['id'],
                    'label' => $row['name']
                ];
            endforeach;
            echo json_encode($arr_result);
        }

}
