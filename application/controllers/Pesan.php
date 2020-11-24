<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('M_pesan_masuk','pesan_masuk');
        $this->load->model('M_pesan_keluar','pesan_keluar');
         
          $this->field = array(
            array('label' => 'ID','class'=>'form-control', 'col'=>'col-md-12','type'=>'HIDDEN','name'=>'id', 'table_show'=>'HIDDEN'),
            array('label' => 'no','class'=>'form-control', 'col'=>'col-md-12','type'=>'text','name'=>'no','table_show'=>'SHOW',),
            array('label' => 'pesan','class'=>'form-control', 'col'=>'col-md-12','type'=>'TEXTAREA','name'=>'pesan','table_show'=>'SHOW'),
        );
    }

    public function insert($id=0)
    {
        $data['title_page'] = 'Kirim pesan';
        $data['url_save'] = site_url('pesan/kirim_cuy');
       
        $data['form'] = formbuilder($this->field,array());
        $this->load->view('admin/form',$data);
    }
    public function kirim_cuy()
    {
        $post = $this->input->post();
            # code...
            $pesan['no'] = $post['no'];
            $pesan['pesan'] = $post['pesan'];
        // print_r($pesan);
        $pesan_keluar = $this->pesan_keluar->insert($pesan);
        // die;
        $this->session->set_flashdata('msg','<script>swal("Berhasil", "Pesan berhasil Terkirim ", "success");</script>');
        redirect('Pesan/insert');
    }
}
