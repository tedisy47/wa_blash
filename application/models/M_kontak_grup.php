<?php 
	
class M_kontak_grup extends MY_Model{

	function __construct()
    {
        // parent::__construct();
       $this->table  = array(
        	'name' => 'group_kontak',
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

}