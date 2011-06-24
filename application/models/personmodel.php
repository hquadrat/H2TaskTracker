<?php

class Personmodel extends CI_Model {

    var $firstname = '';
    var $lastname = '';
    var $t_address_idt_address = '';
    var $t_persontype_idt_persontype = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_active_entries()
    {

		$query = $this->db->get('t_person');
        return $query->result();
		
    }

    function insert_entry()
    {

		$this->firstname   = $_POST['firstname'];
		$this->lastname   = $_POST['lastname'];
        $this->t_address_idt_address = $_POST['address'];
        $this->t_persontype_idt_persontype    = $_POST['persontype'];

		$this->db->insert('t_person', $this);

	}


    function get_persontypes()
    {

		$query = $this->db->get('t_persontype');
        return $query->result();

    }

}

?>