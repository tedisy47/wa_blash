<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kontak_grup extends CI_Controller {

	function __construct()
    {
        parent::__construct();
         if (!$this->session->userdata('login_id')) {
         	redirect('Login');
         }

         // load model\
        $this->load->model('M_kontak_grup','kontak_grup');
        $this->field = array(
   			array('label' => 'ID','class'=>'form-control', 'col'=>'col-md-12','type'=>'HIDDEN','name'=>'id', 'table_show'=>'HIDDEN'),
   			array('label' => 'nama','class'=>'form-control pasal', 'col'=>'col-md-12','type'=>'text','name'=>'grup_nama','table_show'=>'SHOW'),
   		);
         
    }
	public function index()
	{
		$data['title_page'] = 'Grup Kontak';
		$data['link_form'] = site_url('kontak_grup/form');
		$data['field'] = $this->field;
		$data['kontak'] = $this->kontak_grup->get();
		$data['page'] ='admin/pages/kontak_grup';
		$this->load->view('admin/table',$data);
	}
	public function form($id=0)
	{		
		$data['title_page'] = 'kontak';
		$data['url_save'] = site_url('kontak_grup/save');
		if ($id==0) {
			# code...
			$kontak = array();
		}else{
			$kontak = $this->kontak_grup->by_id($id);
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
			'grup_nama' =>$post['grup_nama'],
		);
		if (empty($post['id'])) {
			# code...
			$this->kontak_grup->insert($data);
			$this->session->set_flashdata('msg','<script>swal("Berhasil", "Data berhasil di input", "success");</script>');
		}else{
			$this->kontak_grup->update($data,$post['id']);
			$this->session->set_flashdata('msg','<script>swal("Berhasil", "Data berhasil di update", "success");</script>');
		}
		redirect('kontak_grup');
	}
	public function delete($id=0)
	{
		$this->kontak_grup->delete($id);
		$this->session->set_flashdata('msg','<script>swal("Berhasil", "Data berhasil di update", "success");</script>');
		redirect('kontak_grup');
	}
}
