<?php
Class Login_m extends CI_Model{
	
	function checkAgentLogin($uname,$pass)
	{
		$q = $this->db->select('USERNAME,PASSWORD')
                            ->from('travel_agent')
                            ->where('USERNAME', $uname)
                          /*  ->where('PASSWORD',md5($pass));*/
							->where('PASSWORD',($pass));
        $query = $q->get()->result();
		if($query)
	    	return 1;
		else
	    	return 0;
	}	
	
	function getAgentID($uname)
	{
		$q = $this->db->select('id')
                            ->from('travel_agent')
                            ->where('username',$uname);
        $tmp = $q->get()->result();
	    foreach($tmp as $t)
	    {
			return $t->id;
	    }
	}
}
?>