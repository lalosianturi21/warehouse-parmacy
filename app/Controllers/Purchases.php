<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PurchasesModel;
use App\Models\PurchaseItemModel;


class Purchases extends BaseController
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

       $purchases_model = new PurchasesModel();
        $search = $this->request->getVar('search') ?? '';
        $data['purchases'] =$purchases_model->search_data($search);
        $data['pager'] =$purchases_model->pager;
        if($this->request->isAJAX()) {
            return view('purchases/_purchases', $data);
        } else {
            $data['main_view'] ='purchases/index';
            return view('layout', $data);
        }

    }

    public function new()
    {
        $data['main_view'] = 'purchases/new';
        return view('layout', $data);
    }

    public function create()
    {
        if(!$this->validate([
            // 'invoice_no' => "required|integer",
            'invoice_date' => 'required|valid_date',
            'supplier_id' => 'required|integer',
            //'grand_total' => 'required|integer',
            //'user_id' => 'required|integer'
        ])){
            $data['main_view'] = 'purchases/new';
            $data['errors'] = $this->validator;
            return view('layout', $data);
        }
        
        $purchases_model = new PurchasesModel();
        $purchases_model->create_data($this->request);
        $this->session->setFlashdata('success', 'Barang berhasil disimpan');
        return redirect()->to('/purchases');
    }

    public function delete($id) {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $purchases_model = new PurchasesModel();
            if($purchases_model->delete($id)) {
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
        $purchases_model = new PurchasesModel();
        $data['main_view'] = 'purchases/edit';
        $data['purchase'] = $purchases_model->get_data($id);
        return view('layout', $data);
    }

    public function update($id){
        if(!$this->validate([
            // 'invoice_no' => "required|integer",
            'invoice_date' => 'required|valid_date',
            'supplier_id' => 'required|integer',
            //'grand_total' => 'required|integer',
            'user_id' => 'required|integer'
        ])) {
            $purchases_model = new PurchasesModel();
            $data['main_view'] = 'purchases/edit';
            $data['errors'] = $this->validator;
            $data['purchase'] = $purchases_model->get_data($id);
            return view('layout', $data);
        }

        $purchases_model = new PurchasesModel();
        $purchases_model->update_data($id, $this->request);
        $this->session->setFlashdata('success', 'Barang berhasil diperbarui');
        return redirect()->to('/purchases');
    }

    public function show($id) {
        $purchases_model = new PurchasesModel();
        $purchase_item_model = new PurchaseItemModel();
        $data['purchase'] = $purchases_model->get_data($id);
        $data['purchase_items'] = $purchase_item_model->get_data_by_sale($id);
        $data['main_view'] = 'purchases/show';
        return view('layout', $data);
        
    }
    
}


    
