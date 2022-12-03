<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;

class Items extends BaseController
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

        $item_model = new ItemModel();
        $search = $this->request->getVar('search') ?? '';
        $data['items'] = $item_model->search_data($search);
        $data['pager'] = $item_model->pager;
        if($this->request->isAJAX()) {
            return view('items/_items', $data);
        } else {
            $data['main_view'] ='items/index';
            return view('layout', $data);
        }

    }

    public function new()
    {
        $data['main_view'] = 'items/new';
        return view('layout', $data);
    }

    public function create()
    {
        if(!$this->validate([
            'nama' => "required|alpha_numeric_space",
            'tanggal' => 'required|valid_date',
            'staff' => 'required|alpha_numeric_space',
            'harga' => 'required|integer',
            'stock' => 'required|integer',
            'image_upload' => 'uploaded[image_upload]',
            'expired' => 'required|alpha_numeric_space'
        ])){
            $data['main_view'] = 'items/new';
            $data['errors'] = $this->validator;
            return view('layout', $data);
        }
        
        $item_model = new ItemModel();
        $item_model->create_data($this->request);
        $this->session->setFlashdata('success', 'Barang berhasil disimpan');
        return redirect()->to('/items');
    }

    public function delete($id) {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $item_model = new ItemModel();
            if($item_model->delete($id)) {
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
        $item_model = new ItemModel();
        $data['main_view'] = 'items/edit';
        $data['item'] = $item_model->get_data($id);
        return view('layout', $data);
    }

    public function update($id){
        if(!$this->validate([
            'nama' => "required|alpha_numeric_space",
            'tanggal' => 'required|valid_date',
            'staff' => 'required|alpha_numeric_space',
            'harga' => 'required|integer',
            'stock' => 'required|integer',
            'image_upload' => 'uploaded[image_upload]',
            'expired' => 'required|alpha_numeric_space'
        ])) {
            $item_model = new ItemModel();
            $data['main_view'] = 'items/edit';
            $data['errors'] = $this->validator;
            $data['item'] = $item_model->get_data($id);
            return view('layout', $data);
        }

        $item_model = new ItemModel();
        $item_model->update_data($id, $this->request);
        $this->session->setFlashdata('success', 'Barang berhasil diperbarui');
        return redirect()->to('/items');
    }

    public function show($id) {
        $item_model = new ItemModel();
        $data['item'] = $item_model->get_data($id);
        return view('items/show', $data);
    }
}
