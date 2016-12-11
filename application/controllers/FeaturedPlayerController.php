<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeaturedPlayerController extends CI_Controller {


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
		$this->load->model('FeaturedPlayerModel');
		$this->load->library('session');
		$this->load->library('upload');
    }

	public function index()
	{
		if(!empty($this->session->userdata("login"))){
			$this->loadFeaturedPlayers();
		}else{
			$this->load->view('login');
		}
	}

	public function getAllFeaturedPlayersWS(){
		$data = $this->FeaturedPlayerModel->getAllFeaturedPlayers();
		$data = json_encode($data);
		echo $data;
	}

	public function loadFeaturedPlayers(){
		$data['featured'] = $this->FeaturedPlayerModel->getAllFeaturedPlayers();
		$this->load->view('featuredPlayers',$data);
	}

	public function addFeaturedPlayer(){
		if(!empty($this->session->userdata("login"))){
			$this->load->view('addFeaturedPlayer');
		}else{
			$this->load->view('login');
		}
	}

	public function deleteFeaturedPlayer($id){
		if(!empty($this->session->userdata("login"))){
			//echo $id;
			$result = $this->FeaturedPlayerModel->deleteFeaturedPlayer($id);
			$this->index();
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

                if ( ! $this->upload->do_upload('file'))
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
                        if(!empty($_POST['name']) && !empty($_POST['team'])){
                        	//echo "string"; die;
							$name = $_POST['name'];
							$team = $_POST['team'];

							$position = !empty($_POST['position']) ? $_POST['position'] : null;
							$matches = !empty($_POST['matches']) ? $_POST['matches'] : 0;
							$goals = !empty($_POST['goals']) ? $_POST['goals'] : 0;
							$yellow = !empty($_POST['yellow']) ? $_POST['yellow'] : 0;
							$red = !empty($_POST['red']) ? $_POST['red'] : 0;

							$data = array(
								'player_name' => $name,
								'player_pos' => $position,
								'player_team' => $team,
								'matches_played' => $matches,
								'goals_scored' => $goals,
								'yellow_cards' => $yellow,
								'red_cards' => $red,
								'image' => $file_address
							);
							$result = $this->FeaturedPlayerModel->addFeaturedPlayer($data);

							$strMessage = "Player added successfully";
							$this->session->set_flashdata("success", $strMessage);
							redirect("addFeaturedPlayer");

						}else{
							//echo "string1";die;
							$strMessage = "Unable to save Player! * Marked fields are compulsory";
							$this->session->set_flashdata("failure", $strMessage);
							redirect("addFeaturedPlayer");
						}
                }
        }
}
