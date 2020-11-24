<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kontak extends CI_Controller {

	function __construct()
    {
        parent::__construct();
         if (!$this->session->userdata('login_id')) {
         	redirect('Login');
         }

         // load model
        $this->load->model('M_kontak','kontak');
        $this->load->model('M_kontak_grup','kontak_grup');

         $option  = array();
         if ($this->uri->segment(2)=='form') {
         	$kontak_grup = $this->kontak_grup->get();
         	// print_r($kontak_grup);
         	foreach ($kontak_grup as $key => $value) {
         		$option[$key]['id'] = $value['id'];
         		$option[$key]['grup_nama'] = $value['grup_nama'];
         	}
         }
        $this->field = array(
   			array('label' => 'ID','class'=>'form-control', 'col'=>'col-md-12','type'=>'HIDDEN','name'=>'id', 'table_show'=>'HIDDEN'),
   			array('label' => 'Grup','class'=>'form-control judul', 'col'=>'col-md-12','type'=>'select','name'=>'grup_id','table_show'=>'SHOW','option'=>$option,'key_value'=>'id','key_label'=>'grup_nama'),
   			array('label' => 'nama','class'=>'form-control pasal', 'col'=>'col-md-12','type'=>'text','name'=>'nama','table_show'=>'SHOW',),
   			array('label' => 'NO (ex: 62821234561234)','class'=>'form-control', 'col'=>'col-md-12','type'=>'text','name'=>'no','table_show'=>'SHOW'),
   		);
         
    }
	public function index()
	{
		$data['title_page'] = 'kontak';
		$data['link_form'] = site_url('kontak/form');
		$data['field'] = $this->field;
		$data['kontak'] = $this->kontak->get();
		$data['page'] ='admin/pages/kontak';
		$this->load->view('admin/table',$data);
	}
	public function form($id=0)
	{		
		$data['title_page'] = 'kontak';
		$data['url_save'] = site_url('kontak/save');
		if ($id==0) {
			# code...
			$kontak = array();
		}else{
			$kontak = $this->kontak->by_id($id);
			// print_r($kontak);die;
		}
		$data['form'] = formbuilder($this->field,$kontak);
		$this->load->view('admin/form',$data);
	}
	public function save()
	{
		$post = $this->input->post();
		// print_r($post);
		$data  = array(
			'nama' =>$post['nama'],
			'no' =>$post['no'],
			'grup_id' =>$post['grup_id'],
		);
		if (empty($post['id'])) {
			# code...
			$this->kontak->insert($data);
			$this->session->set_flashdata('msg','<script>swal("Berhasil", "Data berhasil di input", "success");</script>');
		}else{
			$this->kontak->update($data,$post['id']);
			$this->session->set_flashdata('msg','<script>swal("Berhasil", "Data berhasil di update", "success");</script>');
		}
		redirect('kontak');
	}
	public function delete($id=0)
	{
		$this->kontak->delete($id);
		$this->session->set_flashdata('msg','<script>swal("Berhasil", "Data berhasil di update", "success");</script>');
		redirect('kontak');
	}
}
