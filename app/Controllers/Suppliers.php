<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuppliersModel;

class Suppliers extends BaseController
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

       
        $suppliers_model = new SuppliersModel();
        $search = $this->request->getVar('search') ?? '';
        $data['suppliers'] = $suppliers_model->search_data($search);
        $data['pager'] = $suppliers_model->pager;
        if($this->request->isAJAX()) {
            return view('suppliers/_suppliers', $data);
        } else {
            $data['main_view'] ='suppliers/index';
            return view('layout', $data);
        }

    }

        public function new()
        {
            $data['main_view'] = 'suppliers/new';
            return view('layout', $data);
        }
    
        public function create()
        {
            if(!$this->validate([
                'name' => 'required|alpha_numeric_space',
                'status_id' => 'required|integer'
    
            ])){
                $data['main_view'] = 'suppliers/new';
                $data['errors'] = $this->validator;
                return view('layout', $data);
            }
            
           $suppliers_model = new SuppliersModel();
           $suppliers_model->create_data($this->request);
            $this->session->setFlashdata('success', 'Barang berhasil disimpan');
            return redirect()->to('/suppliers');
    
        }
        public function delete($id) {
            if ($this->request->isAJAX()) {
                $id = $this->request->getVar('id');
               $suppliers_model = new SuppliersModel();
                if($suppliers_model->delete($id)) {
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
               $suppliers_model = new SuppliersModel();
                $data['main_view'] = 'suppliers/edit';
                $data['supplier'] =$suppliers_model->get_data($id);
                return view('layout', $data);
            }
    
            public function update($id){
                if(!$this->validate([
                    'name' => 'required|alpha_numeric_space',
                    'status_id' => 'required|integer'
                ])) {
                   $suppliers_model = new SuppliersModel();
                    $data['main_view'] = 'suppliers/edit';
                    $data['errors'] = $this->validator;
                    $data['supplier'] =$suppliers_model->get_data($id);
                    return view('layout', $data);
                }
        
               $suppliers_model = new SuppliersModel();
               $suppliers_model->update_data($id, $this->request);
                $this->session->setFlashdata('success', 'Barang berhasil diperbarui');
                return redirect()->to('/suppliers');
            }
    
            public function show($id) {
               $suppliers_model = new SuppliersModel();
                $data['supplier'] =$suppliers_model->get_data($id);
                return view('suppliers/show', $data);
            }
        
}
