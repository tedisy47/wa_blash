<?php 
	
class M_pesan_masuk extends MY_Model{

	function __construct()
    {
        // parent::__construct();
       $this->table  = array(
        	'name' => 'api_recived',
        	'primary_key' => 'id'
        );
         
    }
	public function get()
	{
		$query = $this->db
		->get($this->table['name'])
		->result_array();
		return $query;
	}
	public function get_status($status)
	{
		$query = $this->db
		->where('status',$status)
		->get($this->table['name'])
		->result_array();
		return $query;
	}

}