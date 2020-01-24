<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pelajar_model');
	}

	public function index()
	{
		$data['judul'] = 'Daftar Siswa';
		$data['pelajar'] = $this->Pelajar_model->daftar_pelajar()->result();
		$this->load->view('partials/header', $data);
		$this->load->view('siswa/daftarPelajar', $data);
	}

	public function murid_baru()
	{
		$this->form_validation->set_rules('nisn', 'NISN', 'required|is_unique[tbl_pelajar.nisn]|trim', [
			'required' => 'NISN harus diisi.',
			'is_unique' => 'NISN sudah digunakan.'
		]);

		$this->form_validation->set_rules('nama', 'NAMA', 'required|trim', [
			'required' => 'NAMA harus diisi.'
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Murid Baru';
			$this->load->view('partials/header', $data);
			$this->load->view('siswa/muridBaru', $data);
		} else {
			echo 'Data berhasil ditambahkan.';
		}
	}
}
