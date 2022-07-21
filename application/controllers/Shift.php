<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Shift extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Shift_model');
	}
	function index()
	{
		$data['judul'] = "Halaman Shift";
		$data['shift'] = $this->Shift_model->get();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layouts/header",$data);
		$this->load->view("shift/vw_shift", $data);
        $this->load->view("layouts/footer",$data);

	}
	function tambah()
	{
		$data['judul'] = "Halaman Tambah Pegawai";
		$this->load->view("layouts/header");
		$this->load->view("shift/vw_tambah_shift", $data);
        $this->load->view("layouts/footer");
	}
	function upload()
	{

		$data = [
			'nama' => $this->input->post('nama'),
			'posisi' => $this->input->post('posisi'),
			'email' => $this->input->post('email'),
		];
		$this->Shift_model->insert($data);
		redirect('Shift');
		

	}function edit($id)
	{
		$data['judul'] = "Halaman Edit Shift Pegawai";
		$data['shift'] = $this->Shift_model->getById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view("layouts/header",$data);
		$this->load->view("shift/vw_edit_shift", $data);
        $this->load->view("layouts/footer",$data);
	}
	function update()
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'posisi' => $this->input->post('posisi'),
			'email' => $this->input->post('email'),
		];
		$id = $this->input->post('id');
		$this->Shift_model->update(['id' => $id], $data);
		redirect('Shift');
	}
	public function hapus($id)
	{
		$this->Shift_model->delete($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Barista tidak dapat dihapus (sudah berelasi)!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Barista Berhasil Dihapus!</div>');
		}
		redirect('Shift');
	}

}