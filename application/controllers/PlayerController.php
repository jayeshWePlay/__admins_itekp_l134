<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlayerController extends CI_Controller {


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
		$this->load->model('PlayerModel');
		$this->load->library('session');
		$this->load->library('upload');
    }

	public function index()
	{
		if(!empty($this->session->userdata("login"))){
			$this->loadPlayers();
		}else{
			$this->load->view('players');
		}
	}

	public function getAllPayersWS(){
		$data = $this->PlayerModel->getAllPlayers();
		$data = json_encode($data);
		echo $data;
	}

	public function loadPlayers(){
		$data['players'] = $this->PlayerModel->getAllPlayers();
		$this->load->view('players',$data);
	}

	public function deletePlayer($id){
		if(!empty($this->session->userdata("login"))){
			//echo $id;
			$result = $this->PlayerModel->deletePlayer($id);
			$this->index();
		}else{
			$this->load->view('login');
		}
	}

	public function addPlayer(){
		if(!empty($this->session->userdata("login"))){
			$this->load->view('addPlayer');
		}else{
			$this->load->view('login');
		}
	}

	public function savePlayer(){
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

	public function do_upload()
        {
                $config['upload_path']          = './uploads/players';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 500;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
                $config['file_name'] 			= time();

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('dp'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $filename = $data['upload_data']['file_name'];
                        $file_address = base_url().'uploads/players/'.$filename;
                        //print_r($data);die;
                        echo $_POST['difficulty'];
                        if(!empty($_POST['name']) && !empty($_POST['team']) ){
                        	//echo "string"; die;
							$name = $_POST['name'];
							$team = $_POST['team'];

							$email = !empty($_POST['email']) ? $_POST['email'] : null;
							$dob = !empty($_POST['dob']) ? $_POST['dob'] : null;
							$mobile = !empty($_POST['mobile']) ? $_POST['mobile'] : null;

							$data = array(
								'usr_name' => $name,
								'usr_dob' => $dob,
								'usr_email' => $email,
								'usr_mobile_number' => $mobile,
								'usr_mobile_number' => $mobile,
								'usr_team_code' => $team,
								'usr_profile_pic' => $file_address
							);
							$result = $this->PlayerModel->addPlayer($data);

							$strMessage = "Player added successfully";
							$this->session->set_flashdata("success", $strMessage);
							redirect("addPlayer");

						}else{
							//echo "string1";die;
							$strMessage = "Unable to save Players! All fields are compulsory";
							$this->session->set_flashdata("failure", $strMessage);
							redirect("addPlayer");
						}
                }
        }
}
