<?php

class Addressmodel extends CI_Model {

    var $idt_address = '';
    var $street = '';
    var $co = '';
    var $postalcode = '';
    var $city = '';
    var $phoneprivate = '';
    var $phonebusiness = '';
    var $mobileprivate = '';
    var $mobilebusiness = '';
    var $emailprivate = '';
    var $emailbusiness = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_active_entries()
    {

		$query = $this->db->get('t_address');
        return $query->result();
		
    }

}

?>