<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
        function __construct(){
                // $this->load->model(['auth/users']);
                parent::__construct();
                $this->lang->load('tank_auth');
                if(!$this->tank_auth->is_logged_in()){
                        redirect('/auth/login/');
                }
	}

	function index(){
        $this->load->view('dashboard/index');
	}
}