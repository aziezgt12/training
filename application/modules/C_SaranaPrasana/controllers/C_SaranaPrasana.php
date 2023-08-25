<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_SaranaPrasana extends BaseController
{

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

	/**
	 * [__construct description]
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		// Load the constructer from MY_Controller
		parent::__construct();
		$this->load->model("Obat", "Obat");
	}

	/**
	 * [index description]
	 *
	 * @method index
	 *
	 * @return [type] [description]
	 */
	public function index()
	{

		$data['title'] = "Sarana dan Prasarana";

		$data['list'] = $this->db->get('sarana_prasarana')->result();


		$this->layout('index', $data);
	}


	function save()
	{
		try {
			$param = $this->input->post();

			$config['upload_path'] = './assets/berkas_ppid/';
			$config['allowed_types'] = '*';
			$config['max_size'] = 2048; // 2MB
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			$file_name = null; // Initialize file_name variable

			if ($_FILES && $_FILES['file']['name'] && $this->upload->do_upload('file')) {
				$data = $this->upload->data(); // Get uploaded file information
				$file_name = $data['file_name']; // Get uploaded file name
			}

			$insert_data = [
				'file' => $file_name,
			];

			$this->db->insert('sarana_prasarana', $insert_data);

			if ($file_name !== null || !$this->upload->display_errors()) {
				echo $this->httpResponseCode("200", "Update Data Successfully");
			} else {
				$error = array('error' => $this->upload->display_errors());
				echo $error['error'];
				echo $this->httpResponseCode("400", $error);
			}
		} catch (\Throwable $th) {
			echo $this->httpResponseCode(400, $th->getMessage());
		}
	}

	function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$sql = $this->db->delete('sarana_prasarana');
		if ($sql) {
			echo $this->httpResponseCode("200", "Delete Data Successfully");
		} else {
			echo $this->httpResponseCode("400", "Database Error");
		}
	}
}
