<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model('videos_model');
	}


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
		$this->hashtag();
	}

	public function hashtag($ht="") {
		
		$this->load->helper('url');

		$data = array();
		$data["frontend"]= array();
		if ($ht == "") {
			$data["frontend"]["title"] = "Tweet Yout Tube";	
		} else {
			$data["frontend"]["title"] = $ht;	
		}
		
		$this->load->model('Videos_model', 'vm');


		
		$data["hashtags"] = $this->vm->getMyHashtag(0);
		if ($ht == "") {
			$data["videos"] = $this->vm->get_my_last_videos(0);
		} else {
			$data["videos"] = $this->vm->get_my_videos_by_hashtag($ht, 0);
		}
		

		$this->load->view('block/html_head', $data);
		$this->load->view('block/header');
		$this->load->view('block/content', $data);
		$this->load->view('block/footer');

	}

	public function migrate() {
		$this->load->library('migration');
		try {
			if ( $this->migration->current() === FALSE) {
				show_error($this->migration->error_string());
			} else {
				$row = $this->db->get('migrations')->row();
				$version_now = $row ? $row->version : 0;
				echo "Migration DONE to ".$version_now;
			}

		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}
		public function migrateversion($version) {
		$this->load->library('migration');
		try {
			if ( $this->migration->version($version) === FALSE) {
				show_error($this->migration->error_string());
			} else {
				echo "Migration DONE to ".$version;
			}

		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */