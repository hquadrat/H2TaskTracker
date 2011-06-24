<?php

class Clientmodel extends CI_Model {

    var $idt_client = 0;
    var $name = '';
    var $t_person_idt_person = 0;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_active_entries()
    {

		$query = $this->db->get('t_client');
        return $query->result();
		
    }

    function get_client_overview()
    {

		$this->db->select('t_client.name AS clientname, t_person.firstname AS CRfirstname, t_person.lastname AS CRlastname');
		$this->db->from('t_client, t_person');
		$this->db->where('t_client.t_person_idt_person = t_person.idt_person');

		$query = $this->db->get();

		return $query->result();

    }


    function insert_entry()
    {

		$this->name   = $_POST['name'];
        $this->t_person_idt_person    = $_POST['person'];

		$this->db->insert('t_client', $this);

	}

}

?>