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

    function get_address( $requiredID )
    {

 		$query = $this->db->get_where('t_address', array('idt_address' => $requiredID), 1, 0);

		return $query->first_row();

    }

    function insert_entry()
    {

		$this->street   = $_POST['street'];
        $this->co = $_POST['co'];
        $this->postalcode = $_POST['postalcode'];
        $this->city = $_POST['city'];
        $this->phoneprivate    = $_POST['phoneprivate'];
        $this->phonebusiness    = $_POST['phonebusiness'];
        $this->mobileprivate    = $_POST['mobileprivate'];
        $this->mobilebusiness    = $_POST['mobilebusiness'];
        $this->emailprivate    = $_POST['emailprivate'];
        $this->emailbusiness    = $_POST['emailbusiness'];

		$this->db->insert('t_address', $this);


		if ($this->db->_error_message() != "")
		{
			// generate an error... or use the log_message() function to log your error
			$this->session->set_flashdata('appmessage', 'Problem: ' . $this->db->_error_message());
		} else {

			$this->session->set_flashdata('appmessage', 'Neue Adresse angelegt.' );

		}

	}

    function update_entry()
    {

		$data = array(
		   'street' => $_POST['street'],
		   'co' => $_POST['co'],
		   'postalcode' => $_POST['postalcode'],
		   'city' => $_POST['city'],
		   'phoneprivate' => $_POST['phoneprivate'],
		   'phonebusiness' => $_POST['phonebusiness'],
		   'mobileprivate' => $_POST['mobileprivate'],
		   'mobilebusiness' => $_POST['mobilebusiness'],
		   'emailprivate' => $_POST['emailprivate'],
		   'emailbusiness' => $_POST['emailbusiness']
		);

		$this->db->where('idt_address', $_POST['addresseditid']);
		$this->db->update('t_address', $data);


		if ($this->db->_error_message() != "")
		{
			// generate an error... or use the log_message() function to log your error
			$this->session->set_flashdata('appmessage', 'Problem: ' . $this->db->_error_message());
		} else {

			$this->session->set_flashdata('appmessage', 'Neue Adresse angelegt.' );

		}

	}








}

?>