<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');
	}
	function index()
	{
		$data['judul'] = "Halaman Menu";
		$data['menu'] = $this->Menu_model->get();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();	
        $this->load->view("layouts/header",$data);
		$this->load->view("menu/vw_menu", $data);
        $this->load->view("layouts/footer",$data);

	}
	function tambah()
	{
		$data['judul'] = "Halaman Tambah Menu";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('nama', 'Nama Coffee', 'required', [
			'required' => 'Nama Coffee Wajib di isi'
		]);
		$this->form_validation->set_rules('stok', 'Stok', 'required', [
			'required' => 'Stok Wajib di isi'
		]);
		$this->form_validation->set_rules('harga', 'Harga', 'required', [
			'required' => 'Harga Wajib di isi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layouts/header", $data);
			$this->load->view("menu/vw_tambah_menu", $data);
			$this->load->view("layouts/footer");
		} else {

			$data = [
				'nama' => $this->input->post('nama'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),

			];
			$upload_image = $_FILES['gambar']['nama'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/menu/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->Coffee_model->insert($data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Menu Coffee Berhasil Ditambah!</div>');
			redirect('Menu');
		}
	}
	public function edit($id)
    {
        $data['judul'] = "Halaman Edit Menu";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Menu_model->getById($id);
        $this->form_validation->set_rules('nama', 'Nama Menu', 'required', [
            'required' => 'Nama Menu Wajib di isi'
        ]);
        $this->form_validation->set_rules('stok', 'Stock', 'required', [
            'required' => 'Stock Wajib di isi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Harga Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layouts/header", $data);
            $this->load->view("menu/vw_edit_menu", $data);
            $this->load->view("layouts/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('ruangan'),
                'harga' => $this->input->post('jurusan'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/menu/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['menu']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/menu/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Menu_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Menu Berhasil Diubah!</div>');
            redirect('Menu');
            $id = $this->input->post('id');
            $this->Menu_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Menu Berhasil DiUbah!</div>');
            redirect('Menu');
        }
	}
	function update()
	{
		$data['judul'] ="Halaman Edit Menu";
		//$data['menu'] = $this->Menu_model->getById($id);
		$data = [
			'nama' => $this->input->post('nama'),
			'stok' => $this->input->post('stok'),
			'harga' => $this->input->post('harga'),
			'gambar' => $this->input->post('gambar'),
		];
		$id = $this->input->post('id');
		$this->Menu_model->update(['id' => $id], $data);
		redirect('Menu');
	}
	public function hapus($id)
	{
		$this->Menu_model->delete($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Menu tidak dapat dihapus (sudah berelasi)!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Menu Berhasil Dihapus!</div>');
		}
		redirect('Menu');
	}

}