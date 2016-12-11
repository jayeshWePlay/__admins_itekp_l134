<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefereeController extends CI_Controller {


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
		$this->load->model('RefereeModel');
		$this->load->library('session');
		$this->load->library('upload');
    }

	public function index()
	{
		if(!empty($this->session->userdata("login"))){
			$this->loadReferees();
		}else{
			$this->load->view('referees');
		}
	}

	public function loadReferees(){
		$data['referees'] = $this->RefereeModel->getAllReferee();
		$this->load->view('referees',$data);
	}

	public function addReferee(){
		if(!empty($this->session->userdata("login"))){
			$this->load->view('addReferee');
		}else{
			$this->load->view('login');
		}
	}

	public function saveReferee(){
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
                $config['upload_path']          = './uploads/referees';
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
                        $file_address = base_url().'uploads/referees/'.$filename;
                        //print_r($data);die;
                        echo $_POST['difficulty'];
                        if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['difficulty']) ){
                        	//echo "string"; die;
							$name = $_POST['name'];
							$matches = $_POST['matches'];
							$difficulty = $_POST['difficulty'];
							$dob = $_POST['dob'];

							$data = array(
								'ref_name' => $name,
								'ref_dob' => $dob,
								'ref_matches' => $matches,
								'ref_difficulty_lvl' => $difficulty,
								'ref_profile_pic' => $file_address
							);
							$result = $this->RefereeModel->addReferee($data);

							$strMessage = "Refree added successfully";
							$this->session->set_flashdata("success", $strMessage);
							redirect("addReferee");

						}else{
							//echo "string1";die;
							$strMessage = "Unable to save Refree! All fields are compulsory";
							$this->session->set_flashdata("failure", $strMessage);
							redirect("addReferee");
						}
                }
        }
}
