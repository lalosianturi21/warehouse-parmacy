<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;

class Categories extends BaseController
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

        $categories_model = new CategoriesModel();
        $search = $this->request->getVar('search') ?? '';
        $data['categories'] = $categories_model->search_data($search);
        $data['pager'] = $categories_model->pager;
        if($this->request->isAJAX()) {
            return view('categories/_categories', $data);
        } else {
            $data['main_view'] ='categories/index';
            return view('layout', $data);
        }
        }

        public function new()
        {
            $data['main_view'] = 'categories/new';
            return view('layout', $data);
        }
    
        public function create()
        {
            if(!$this->validate([
                'name' => 'required|alpha_numeric_space',
                'description' => 'required|alpha_numeric_space',
                'status_id' => 'required|integer'
    
            ])){
                $data['main_view'] = 'categories/new';
                $data['errors'] = $this->validator;
                return view('layout', $data);
            }
            
           $categories_model = new CategoriesModel();
           $categories_model->create_data($this->request);
            $this->session->setFlashdata('success', 'Barang berhasil disimpan');
            return redirect()->to('/categories');
    
        }
        public function delete($id) {
            if ($this->request->isAJAX()) {
                $id = $this->request->getVar('id');
               $categories_model = new CategoriesModel();
                if($categories_model->delete($id)) {
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
               $categories_model = new CategoriesModel();
                $data['main_view'] = 'categories/edit';
                $data['categorie'] =$categories_model->get_data($id);
                return view('layout', $data);
            }
    
            public function update($id){
                if(!$this->validate([
                    'name' => 'required|alpha_numeric_space',
                    'description' => 'required|alpha_numeric_space',
                    'status_id' => 'required|integer'
                ])) {
                   $categories_model = new CategoriesModel();
                    $data['main_view'] = 'categories/edit';
                    $data['errors'] = $this->validator;
                    $data['categorie'] =$categories_model->get_data($id);
                    return view('layout', $data);
                }
        
               $categories_model = new CategoriesModel();
               $categories_model->update_data($id, $this->request);
                $this->session->setFlashdata('success', 'Barang berhasil diperbarui');
                return redirect()->to('/categories');
            }
    
            public function show($id) {
               $categories_model = new CategoriesModel();
                $data['categorie'] =$categories_model->get_data($id);
                return view('categories/show', $data);
            }
        
    }
    


