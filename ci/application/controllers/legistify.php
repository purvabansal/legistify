<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legistify extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		  $config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => "smtp.gmail.com",
		  'smtp_port' => 465,
		  'smtp_user' => 'purva.bansal@gmail.com', // change it to yours
		  'smtp_pass' => '9214697744papa01', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);

			$message = '';
			$this->load->library('email', $config);
			mail('purva.bansal@gmail.com', 'hi','yoyo');
			
			$this->email->set_newline("\r\n");
			$this->email->set_crlf("\r\n");
			$this->email->from('purva.bansal@gmail.com');
			$this->email->to('purva.bansal@gmail.com');
			$this->email->subject('legistify response');
			$this->email->message("hi");
			if ($this->email->send()) {
				 echo "Mail Send";
				 
			}
			else 
			{
				 show_error($this->email->print_debugger());
			}
			
	}
}