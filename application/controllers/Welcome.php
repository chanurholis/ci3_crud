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
		$this->form_validation->set_rules('nisn', 'NISN', 'required|is_unique[tbl_pelajar.nisn]|trim|min_length[10]|max_length[10]', [
			'required' => 'NISN harus diisi.',
			'is_unique' => 'NISN sudah digunakan.',
			'min_length' => 'NISN hanya boleh berisi 10 karakter.',
			'max_length' => 'NISN hanya boleh berisi 10 karakter.'
		]);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama harus diisi.'
		]);

		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
			'required' => 'Jenis Kelamin harus dipilih.'
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Murid Baru';
			$this->load->view('partials/header', $data);
			$this->load->view('siswa/muridBaru', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mt-3" role="alert">
				Data berhasil ditambahkan!
			</div>');

			$nisn = htmlspecialchars($this->input->post('nisn'));
			$nama = htmlspecialchars(strtoupper($this->input->post('nama')));
			$jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));

			$data = [
				'nisn' => $nisn,
				'nama' => $nama,
				'jenis_kelamin' => $jenis_kelamin
			];

			$this->db->insert('tbl_pelajar', $data);

			redirect('/');
		}
	}

	public function detail($id)
	{
		$where = ['pelajar_id' => $id];

		$data['judul'] = 'Detail Pelajar';
		$data['result'] = $this->Pelajar_model->detail($where)->result();

		$this->load->view('partials/header', $data);
		$this->load->view('siswa/detailPelajar', $data);
	}

	public function delete($id)
	{
		$where = ['pelajar_id' => $id];

		$this->Pelajar_model->delete_pelajar($where);

		$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mt-3" role="alert">
		Data berhasil dihapus!
		</div>');

		redirect('/');
	}

	public function update($id)
	{
		$where = ['pelajar_id' => $id];

		$data['judul'] = 'Update Pelajar';
		$data['pelajar'] = $this->Pelajar_model->update($where)->result();

		$this->load->view('partials/header', $data);
		$this->load->view('siswa/updatePelajar', $data);
	}

	public function aksi_update()
	{
		$this->form_validation->set_rules('nisn', 'NISN', 'required|is_unique[tbl_pelajar.nisn]|trim|min_length[10]|max_length[10]', [
			'required' => 'NISN harus diisi.',
			'is_unique' => 'NISN sudah digunakan.',
			'min_length' => 'NISN hanya boleh berisi 10 karakter.',
			'max_length' => 'NISN hanya boleh berisi 10 karakter.'
		]);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama harus diisi.'
		]);

		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
			'required' => 'Jenis Kelamin harus dipilih.'
		]);

		if ($this->form_validation->run() == false) {
			$id = htmlspecialchars($this->input->post('id'));

			$where = ['pelajar_id' => $id];

			$data['judul'] = 'Update Pelajar';
			$data['pelajar'] = $this->Pelajar_model->update($where)->result();

			$this->load->view('partials/header', $data);
			$this->load->view('siswa/updatePelajar', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mt-3" role="alert">
			Data berhasil diubah!
			</div>');

			$id = htmlspecialchars($this->input->post('id'));

			$where = ['pelajar_id' => $id];

			$nisn = htmlspecialchars($this->input->post('nisn'));
			$nama = htmlspecialchars(strtoupper($this->input->post('nama')));
			$jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));

			$data = [
				'nisn' => $nisn,
				'nama' => $nama,
				'jenis_kelamin' => $jenis_kelamin
			];

			$this->db->where($where);
			$this->db->update('tbl_pelajar', $data);

			redirect('/');
		}
	}
}
