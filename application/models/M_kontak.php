<?php 
	
class M_kontak extends MY_Model{

	function __construct()
    {
        // parent::__construct();
       $this->table  = array(
        	'name' => 'kontak',
        	'primary_key' => 'id'
        );
         
    }
	public function get()
	{
		$query = $this->db
		->join('group_kontak','group_kontak.id = kontak.grup_id')
		->get($this->table['name'])
		->result_array();
		return $query;
	}

	public function get_by_group($grup)
	{
		$query = $this->db
		->where('grup_id',$grup)
		->get($this->table['name'])
		->result_array();
		return $query;
	}

}