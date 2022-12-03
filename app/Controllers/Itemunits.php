<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemunitsModel;

class Itemunits extends BaseController
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

        $itemunits_model = new ItemunitsModel();
        $search = $this->request->getVar('search') ?? '';
        $data['itemunits'] = $itemunits_model->search_data($search);
        $data['pager'] = $itemunits_model->pager;
        if($this->request->isAJAX()) {
            return view('itemunits/_itemunits', $data);
        } else {
            $data['main_view'] ='itemunits/index';
            return view('layout', $data);
        }
    }
    
    public function new()
    {
        $data['main_view'] = 'itemunits/new';
        return view('layout', $data);
    }

    public function create()
    {
        if(!$this->validate([
            'name' => "required|alpha_numeric_space"
        ])){
            $data['main_view'] = 'itemunits/new';
            $data['errors'] = $this->validator;
            return view('layout', $data);
        }
        
        $itemunits_model = new ItemunitsModel();
        $itemunits_model->create_data($this->request);
        $this->session->setFlashdata('success', 'Barang berhasil disimpan');
        return redirect()->to('/itemunits');
    }

    public function delete($id) {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $itemunits_model = new ItemunitsModel();
            if($itemunits_model->delete($id)) {
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
        $itemunits_model = new ItemunitsModel();
        $data['main_view'] = 'itemunits/edit';
        $data['itemunit'] = $itemunits_model->get_data($id);
        return view('layout', $data);
    }

    public function update($id){
        if(!$this->validate([
            'name' => "required|alpha_numeric_space"
        ])) {
            $itemunits_model = new ItemunitsModel();
            $data['main_view'] = 'itemunits/edit';
            $data['errors'] = $this->validator;
            $data['itemunit'] = $itemunits_model->get_data($id);
            return view('layout', $data);
        }

        $itemunits_model = new ItemunitsModel();
        $itemunits_model->update_data($id, $this->request);
        $this->session->setFlashdata('success', 'Barang berhasil diperbarui');
        return redirect()->to('/itemunits');
    }

    public function show($id) {
        $itemunits_model = new ItemunitsModel();
        $data['itemunit'] = $itemunits_model->get_data($id);
        return view('itemunits/show', $data);
    }
}


