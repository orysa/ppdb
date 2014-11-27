<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{		
                $this->load->view('admin/login_view');                
	}
        
        public function dashboard()
        {
                $this->load->view('admin/header_view');
                $this->load->view('admin/dashboard_view');
                $this->load->view('admin/footer_view');
        }
        
        public function coba()
        {
            $this->load->view('admin/coba');
        }
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */