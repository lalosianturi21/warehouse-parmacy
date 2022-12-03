<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SalesModel;
use App\Models\SaleItemModel;

class Sales extends BaseController
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

       
        $sales_model = new SalesModel();
        $search = $this->request->getVar('search') ?? '';
        $data['sales'] = $sales_model->search_data($search);
        $data['pager'] = $sales_model->pager;
        if($this->request->isAJAX()) {
            return view('sales/_sales', $data);
        } else {
            $data['main_view'] ='sales/index';
            return view('layout', $data);
        }

    }

    public function new()
    {
        $data['main_view'] = 'sales/new';
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
            $data['main_view'] = 'sales/new';
            $data['errors'] = $this->validator;
            return view('layout', $data);
        }
        
        $sales_model = new SalesModel();
        $sales_model->create_data($this->request);
        $this->session->setFlashdata('success', 'Barang berhasil disimpan');
        return redirect()->to('/sales');
    }

    public function delete($id) {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $sales_model = new SalesModel();
            if($sales_model->delete($id)) {
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
        $sales_model = new SalesModel();
        $data['main_view'] = 'sales/edit';
        $data['sale'] = $sales_model->get_data($id);
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
            $sales_model = new SalesModel();
            $data['main_view'] = 'sales/edit';
            $data['errors'] = $this->validator;
            $data['sale'] = $sales_model->get_data($id);
            return view('layout', $data);
        }

        $sales_model = new SalesModel();
        $sales_model->update_data($id, $this->request);
        $this->session->setFlashdata('success', 'Barang berhasil diperbarui');
        return redirect()->to('/sales');
    }

    public function show($id) {
        $sales_model = new SalesModel();
        $sale_item_model = new SaleItemModel();
        $data['sale'] = $sales_model->get_data($id);
        $data['sale_items'] = $sale_item_model->get_data_by_sale($id);
        $data['main_view'] = 'sales/show';
        return view('layout', $data);
        
    }
    
}


    


