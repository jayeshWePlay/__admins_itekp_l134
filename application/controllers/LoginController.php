<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {


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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->model('AdminUsersModel');
		$this->load->model('TeamsModel');
		$this->load->library('session');
		$this->load->library('upload');
    }

	public function index()
	{
		if(!empty($this->session->userdata("login"))){
			$this->loadTeam();
		}else{
			$this->load->view('login');
		}
	}

	public function login()
	{
		if(!empty($_POST['username']) && !empty($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			//echo "credentials entered<br/>";
			//echo "Username ".$username;
			//echo "<br/> Password ".$password."<br/>";
			$verified = $this->AdminUsersModel->verify_admin($username,$password);
			//print_r($verified);
			if(!empty($verified)){
				$sess = $this->session->userdata("login");
				$data['teams'] = $this->TeamsModel->getAllTeams();
				$this->setSession($verified);
				$this->load->view('home',$data);
			}else{
				$data['message'] = "Invalid credentials. Please try again.";
				$this->load->view('login',$data);
			}
			//set session 
			
			//get session
			/*$sess = $this->session->userdata("verified");
			print_r($sess['book_id']);*/

			//unset session
			/*$this->session->unset_userdata('some_name');*/

			//destroy session
			/*$this->session->sess_destroy();*/

		}else{
			$this->load->view('login');
		}
	}

	public function getAllTeamsWS(){
		$data = $this->TeamsModel->getAllTeams();
		$data = json_encode($data);
		echo $data;
	}

	public function loadTeam(){
		$data['teams'] = $this->TeamsModel->getAllTeams();
		$this->load->view('home',$data);
	}

	public function addTeam(){
		if(!empty($this->session->userdata("login"))){
			$this->load->view('addTeam');
		}else{
			$this->load->view('login');
		}
	}

	public function deleteTeam($id){
		if(!empty($this->session->userdata("login"))){
			//echo $id;
			$result = $this->TeamsModel->deleteTeam($id);
			$this->index();
		}else{
			$this->load->view('login');
		}
	}

	public function saveTeam(){
		if(!empty($this->session->userdata("login"))){
			if(!empty($_POST['name']) && !empty($_POST['home']) && !empty($_POST['away']) && isset($_FILES['logo']) && $_FILES['logo']['size'] > 0){
				$name = $_POST['name'];
				$home = $_POST['home'];
				$away = $_POST['away'];
				$logo = $_FILES['logo'];

				$result = $this->upload->do_upload($logo);
				print_r($result);die;

			}else{
				$strMessage = "Unable to save Team! All fields are compulsory";
				$this->session->set_flashdata("failure", $strMessage);die;
				redirect("addTeam");
			}
		}else{
			$this->load->view('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		$data['messageLogout'] = "You have been successfully logged out.";
		$this->load->view('login',$data);
	}

	public function setSession($data){
		$session_data = $this->session->userdata('login');
		$session_data['admin_data'] = $data;
		$this->session->set_userdata("login", $session_data);
	}

	public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 500;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
                $config['file_name'] 			= time();

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('logo'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $filename = $data['upload_data']['file_name'];
                        $file_address = base_url().'/uploads/'.$filename;
                        
                        if(!empty($_POST['name']) && !empty($_POST['home']) && !empty($_POST['away']) ){
							$name = $_POST['name'];
							$home = $_POST['home'];
							$away = $_POST['away'];

							$data = array(
								'tm_code' => time(),
								'tm_name' => $name,
								'tm_logo' => $file_address,
								'tm_home_color' => $home,
								'tm_away_color' => $away
							);
							$result = $this->TeamsModel->addTeam($data);

							$strMessage = "Team added successfully";
							$this->session->set_flashdata("success", $strMessage);
							redirect("addTeam");

						}else{
							$strMessage = "Unable to save Team! All fields are compulsory";
							$this->session->set_flashdata("failure", $strMessage);
							redirect("addTeam");
						}
                }
        }
}
