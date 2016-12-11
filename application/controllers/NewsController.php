<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsController extends CI_Controller {


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
		$this->load->model('NewsModel');
		$this->load->library('session');
		$this->load->library('upload');
    }

	public function index()
	{
		if(!empty($this->session->userdata("login"))){
			$this->loadNews();
		}else{
			$this->load->view('news');
		}
	}

	public function getAllNewsWS(){
		$data = $this->NewsModel->getAllNews();
		$data = json_encode($data);
		echo $data;
	}

	public function loadNews(){
		$data['news'] = $this->NewsModel->getAllNews();
		$this->load->view('news',$data);
	}

	public function addNews(){
		if(!empty($this->session->userdata("login"))){
			$this->load->view('addNews');
		}else{
			$this->load->view('login');
		}
	}

	public function deleteNews($id){
		if(!empty($this->session->userdata("login"))){
			//echo $id;
			$result = $this->NewsModel->deleteNews($id);
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
                        if(!empty($_POST['name']) && !empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['content']) ){
                        	//echo "string"; die;
							$name = $_POST['name'];
							$title = $_POST['title'];
							$date = $_POST['date'];
							$content = $_POST['content'];

							$preview = !empty($_POST['preview']) ? $_POST['preview'] : null;
							$video = !empty($_POST['video']) ? $_POST['video'] : null;

							$data = array(
								'author_name' => $name,
								'date' => $date,
								'title' => $title,
								'description' => $preview,
								'content' => $content,
								'video' => $video,
								'image' => $file_address
							);
							$result = $this->NewsModel->addNews($data);

							$strMessage = "News added successfully";
							$this->session->set_flashdata("success", $strMessage);
							redirect("addNews");

						}else{
							//echo "string1";die;
							$strMessage = "Unable to save News! * Marked fields are compulsory";
							$this->session->set_flashdata("failure", $strMessage);
							redirect("addNews");
						}
                }
        }
}
