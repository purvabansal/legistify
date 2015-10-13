<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		
		if ( $this->load->database() === FALSE )
		{
		   exit('not able to connect to database');
		}
		$this->load->model("legistifymodel");   
		$results = $this->legistifymodel->get_user_queries(); 
		$msg = 0;
		$data=array("results" => $results,
			"msg" => $msg);
	    $this->load->view('legistify/index',$data);
	}

	function do_upload()
	{
		$config['upload_path'] = './application/views/upload/';
		$config['allowed_types'] = 'docx';
		$config['max_size']	= '3072';

		$this->load->library('upload', $config);
		
		if ( $this->load->database() === FALSE )
			{
			   exit('not able to connect to database');
			}
			$this->load->model("legistifymodel");   
			$results = $this->legistifymodel->get_user_queries(); 
		
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			
			$msg = "Upload failed.. Please, try again";
			
			$data=array("results" => $results,
				"msg" => $msg,);
			$this->load->view('legistify/result_failed',$data);
		}
		else
		{	
			$config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'purva.bansal@gmail.com', // change it to yours
                'smtp_pass' => 'xxx', // change it to yours
                'smtp_timeout'=>20,
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
               );
			 
			$this->load->library('email');
			$this->email->initialize($config);
						
			$this->email->attach($upload_data['full_path']);
			$this->email->set_newline("\r\n");
			$this->email->set_crlf("\r\n");
			$this->email->from('purva.bansall@gmail.com','purva.bansal');
			$email = $results[0]->email;
			$this->email->to($email);
			$this->email->subject('legistify response');
			$this->email->message($this->input->post('message'));
			
			$msg = "Successfuly send";
			$upload_data = $this->upload->data();
			if ($this->email->send())
			{
				 $this->load->model("legistifymodel");   
				$results = $this->legistifymodel->remove_query(); 
				 $data = array("results" => $results,"msg"=>$msg);
				$this->load->view('legistify/send_success', $data);
			}
			else 
			{
				 show_error($this->email->print_debugger());
			}
				
			
		}
		
	}
}
?>