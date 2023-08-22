<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Home extends BaseController
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
		$this->db->from('tb_mst_training');
		$data['totalTraining'] = $this->db->count_all_results();

		$this->db->from('tb_mst_training');
		$this->db->where('is_active', 1);
		$data['totalAktif'] = $this->db->count_all_results();

		$this->db->from('tb_mst_training');
		$this->db->where('is_active', 0);
		$data['totalNotAktif'] = $this->db->count_all_results();

		$this->db->select('*'); // Pilih kolom yang ingin Anda ambil dari tabel
		$this->db->from('tb_mst_training');
		$data['listTraining'] = $this->db->order_by('kode', 'desc')->limit(10)->get()->result(); // Menggunakan get() untuk mendapatkan hasil query


		$data['totalSertifikat'] = $this->db->from('tb_trn_pesert')->count_all_results();

		$this->db->select('nama_perusahaan, COUNT(*) as jumlah_peserta');
		$this->db->from('tb_trn_pesert');
		$this->db->where('nama_perusahaan IS NOT NULL');
		$this->db->group_by('nama_perusahaan');
		$query = $this->db->get();

		$data['listCompany'] = $query->result();

		// $this->db->where('durasi >=', date('Y-m-01')); // Misalnya, hanya menghitung data yang dimulai bulan ini
		// $data['totalBulanIni'] = $this->db->count_all_results();

		// print_r($data);
		// die;

		$this->argon('index', $data);
	}
	
}
