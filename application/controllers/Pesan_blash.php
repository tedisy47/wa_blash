<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pesan_blash extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('M_pesan_keluar','pesan_keluar');
        $this->load->model('M_kontak','kontak');
        $this->load->model('M_kontak_grup','kontak_grup');
         
        $option  = array();
         if ($this->uri->segment(2)=='insert') {
            $kontak_grup = $this->kontak_grup->get();
            // print_r($kontak_grup);die;
            foreach ($kontak_grup as $key => $value) {
                $option[$key]['id'] = $value['id'];
                $option[$key]['grup_nama'] = $value['grup_nama'];
            }
         }
          $this->field = array(
            array('label' => 'ID','class'=>'form-control', 'col'=>'col-md-12','type'=>'HIDDEN','name'=>'id', 'table_show'=>'HIDDEN'),
            array('label' => 'Grup','class'=>'form-control judul', 'col'=>'col-md-12','type'=>'select','name'=>'grup_id','table_show'=>'SHOW','option'=>$option,'key_value'=>'id','key_label'=>'grup_nama'),
            array('label' => 'pesan_blash','class'=>'form-control', 'col'=>'col-md-12','type'=>'TEXTAREA','name'=>'pesan','table_show'=>'SHOW'),
        );
    }

    public function insert($id=0)
    {
        $data['title_page'] = 'Kirim pesan';
        $data['url_save'] = site_url('pesan_blash/kirim_cuy');
       
        $data['form'] = formbuilder($this->field,array());
        $this->load->view('admin/form',$data);
    }
    public function kirim_cuy()
    {
        $post = $this->input->post();
            # code...
        // print_r($post);die;
        if (empty($post['grup_id'])) {
            # code...
            $kontak = $this->kontak->get();
        }
        else {
            $kontak = $this->kontak->get_by_group($post['grup_id']);
        }
        print_r($kontak);
        foreach ($kontak as $key => $value) {
            # code...
            $pesan[$key]['no'] = $value['no'].'@c.us';
            $pesan[$key]['pesan'] = $post['pesan'];
        }
        print_r($pesan);
        $pesan_keluar = $this->pesan_keluar->insert_batch($pesan);
        // die;
        $this->session->set_flashdata('msg','<script>swal("Berhasil", "Pesan berhasil Terkirim ", "success");</script>');
        redirect('pesan_blash/insert');
    }
}
