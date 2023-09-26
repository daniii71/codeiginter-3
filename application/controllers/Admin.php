<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
		// if ($this->session->userdata('logged_in') != true) {
		// 	redirect(base_url() . 'auth');
		// }
	}

	public function index()
	{
		$this->load->view('admin/index');
	}
	public function siswa()
	{
		$data['siswa'] = $this->m_model->get_data('siswa')->result();
		$this->load->view('admin/siswa', $data);
	}
	public function guru()
	{
		$data['guru'] = $this->m_model->get_data('guru')->result();
		$this->load->view('admin/guru', $data);
	}
  public function tambah_siswa()
    {
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/tambah_siswa', $data);
    }


    public function upload_img($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './images/siswa/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        
        $this->load->library('upload', $config); // Load library 'upload' with config
        
        if (!$this->upload->do_upload($value)) {
            return array(false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array(true, $nama);
        }
    }
    
    public function aksi_tambah_siswa()
    {
        $foto = $this->upload_img('foto');
        
        if ($foto[0] == false) {
            $data = [
                'foto' => 'User.png',
                'nama_siswa' => $this->input->post('nama'),
                'nisn' => $this->input->post('nisn'),
                'gender' => $this->input->post('gender'),
                'id_kelas' => $this->input->post('kelas'),
            ];
            $this->m_model->tambah_data('siswa', $data);
            redirect(base_url('admin/siswa'));
        } else {
            $data = [
                'foto' => $foto[1],
                'nama_siswa' => $this->input->post('nama'),
                'nisn' => $this->input->post('nisn'),
                'gender' => $this->input->post('gender'),
                'id_kelas' => $this->input->post('kelas'),
            ];
            $this->m_model->tambah_data('siswa', $data);
            redirect(base_url('admin/siswa'));
        }
    }

  public function detail_siswa($id_siswa)
  {
	  
	  $data['detail_jabatan']=$this->m_model->get_by_id('siswa', $id_siswa)->result();
	  $this->load->view('admin/siswa/detail_siswa', $data);
  }


  public function ubah_siswa($id_siswa)
    {
        
		$data['siswa']=$this->m_model->get_by_id('siswa', 'id_siswa', $id_siswa)->result();
        $data['kelas'] = $this->m_model->get_data('kelas');
        $this->load->view('admin/ubah_siswa', $data);
    }

    public function aksi_ubah_siswa()
    {
        $data = array(
			'nama_siswa' => $this->input->post('nama'),
			'nisn' => $this->input->post('nisn'),
			'gender' => $this->input->post('gender'),
			'id_kelas' => $this->input->post('kelas'),
		);
        $eksekusi=$this->m_model->ubah_data('siswa', $data, array('id_siswa'=>$this->input->post('id_siswa')));
        if($eksekusi)
        {
            $this->session->set_flashdata('sukses', 'berhasil');
            redirect(base_url('admin/siswa'));
        }
        else
        {
            $this->session->set_flashdata('error', 'gagal..');
			redirect(base_url('admin/ubah_siswa/' . $this->input->post('id_siswa')));
        }
    }

	public function hapus_siswa($id) {
		$this->m_model->delete('siswa', 'id_siswa', $id);
		redirect(base_url('admin/siswa'));
	}

// akun anda
  public function akun()
{
  $data['admin'] = $this->m_model->get_by_id('admin', 'id', $this->session->userdata('id'))->result();
    $this->load->view('akun/ubah_akun', $data);
}

// untuk tambah akun
public function tambah_akun()
{
    
    $this->load->view('admin/tambah_akun', $data);
}


// untuk aksi mengubah akun 
public function aksi_ubah_akun()
{
    $data = array(
        'password_baru' => $this->input->post('password_baru'),
        'konfirmasi_password' => $this->input->post('konfirmasi_password'),
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
    );
    $eksekusi = $this->m_model->ubah_data('akun', $data, array('id_akun' => $this->input->post('id_akun')));
    if ($eksekusi) {
        $this->session->set_flashdata('sukses', 'berhasil');
        redirect(base_url('admin/akun'));
    } else {
        $this->session->set_flashdata('error', 'gagal..');
        redirect(base_url('admin/ubah_akun/' . $this->input->post('id_akun')));
    }
}

// untuk menghapus akun
public function hapus_akun($id)
{
    $this->m_model->delete('akun', 'id_akun', $id);
    $this->session->set_flashdata('success', 'Akun Anda Berhasi Hapus');
    redirect(base_url('admin/akun'));
}

}
?>