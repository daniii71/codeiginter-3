<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{

    public function guru()
	{
		$data['guru'] = $this->m_model->get_data('guru')->result();
		$data['kelas'] = $this->m_model->get_data('kelas')->result();
		$data['mapel'] = $this->m_model->get_data('mapel')->result();
		$this->load->view('admin/guru', $data);
	}

    public function export_guru()
    {
        $data['data_guru'] = $this-> m_model->get_data('guru')->result();
        $data['nama'] = 'guru';
        if($this->uri->segment(3) == "pdf"){
         $this->load->library('pdf');
         $this->pdf->load_view('admin/export_data_guru', $data);
         $this->pdf->render();
         $this->pdf->stream("data_guru.pdf", array("Attachment"=> false));
        }else{
         $this->load->view('admin/download_data_guru', $data);
        }
       }

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
 $foto = $this->upload_img('foto');
 if ($foto[0] == false) {
  $data = [
   'foto' => 'User.png',
   'nama_siswa' => $this->input->post('nama'),
   'nisn' => $this->input->post('nisn'),
   'gender' => $this->input->post('gender'),
   'id_kelas' => $this->input->post('kelas'),
  ];
  $this->m_model->tambah_data('id_siswa', $data);
  redirect(base_url('admin/id_siswa'));
 } else {
  $data = [
   'foto' => $foto[1],
   'nama_siswa' => $this->input->post('nama'),
   'nisn' => $this->input->post('nisn'),
   'gender' => $this->input->post('gender'),
   'id_kelas' => $this->input->post('id_kelas'),
  ];
   $eksekusi=$this->m_model->ubah_data
   ('siswa', $data, array('id_siswa'=>$this->input->post('id_siswa')));
   if($eksekusi)
   {
    redirect(base_url('admin/siswa'));
   }
   else
   {
    redirect(base_url('admin/ubah_siswa/'.$this->input->post('id_siswa')));
   }
  }
}

	public function hapus_siswa($id) 
    {
        $siswa = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->row();
        if($siswa) {
            if ($siswa->foto !== 'User.png'){
                $file_path = './images/siswa/' . $siswa->foto;

                if(file_exists($file_path)) {
                    if(unlink($file_path)) {
                        $this->m_model->delete('siswa', 'id_siswa', $id);
                        redirect(base_url('admin/siswa'));
                    } else {
                        echo "Gagal menghapus file.";
                    }
                } else {
                    echo "File tidak ditemukan.";
                }
            } else {
                $this->m_model->delete('siswa', 'id_siswa', $id);
		        redirect(base_url('admin/siswa'));
            }
        } else {
            echo "Siswa tidak ditemukan.";
        }
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

public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' =>
                    \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' =>
                    \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $style_row = [
            'font' => ['bold' => true],
            'alignment' => [
                'vertical' =>
                    \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' =>
                        \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $sheet->setCellValue('A1', 'DATA SISWA');
        $sheet->mergeCells('A1:E1');
        $sheet
            ->getStyle('A1')
            ->getFont()
            ->setBold(true);

        $sheet->setCellValue('A3', 'ID');
        $sheet->setCellValue('B3', 'NAMA');
        $sheet->setCellValue('C3', 'NISN');
        $sheet->setCellValue('D3', 'GENDER');
        $sheet->setCellValue('E3', 'KELAS');

        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);

        $data = $this->m_model->getDataSiswa();

        $no = 1;
        $numrow = 4;
        foreach ($data as $data) {
            $sheet->setCellValue('A' . $numrow, $data->id_siswa);
            $sheet->setCellValue('B' . $numrow, $data->nama_siswa);
            $sheet->setCellValue('C' . $numrow, $data->nisn);
            $sheet->setCellValue('D' . $numrow, $data->gender);
            $sheet->setCellValue(
                'E' . $numrow,
                $data->tingkat_kelas . ' ' . $data->jurusan_kelas
            );

            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

            $no++;
            $numrow++;
        }

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);

        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        $sheet
            ->getPageSetup()
            ->setOrientation(
                \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE
            );

        $sheet->setTitle('DATA SISWA');

        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );
        header('Content-Disposition: attachment; filename="Data Siswa.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function import()
    {
        if (isset($_FILES['file']['name'])) {
            $path = $_FILES['file']['tmp_name'];
            $object = PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $id_siswa = $worksheet
                        ->getCellByColumnAndRow(1, $row)
                        ->getValue();
                    $nama_siswa = $worksheet
                        ->getCellByColumnAndRow(2, $row)
                        ->getValue();
                    $nisn = $worksheet
                        ->getCellByColumnAndRow(3, $row)
                        ->getValue();
                    $gender = $worksheet
                        ->getCellByColumnAndRow(4, $row)
                        ->getValue();
                    $kelas = $worksheet
                        ->getCellByColumnAndRow(5, $row)
                        ->getValue();
    
                    list($tingkat_kelas, $jurusan_kelas) = explode(
                        ' ',
                        $kelas,
                        2
                    );
    
                    $id_kelas = $this->m_model->getKelasByTingkatJurusan(
                        $tingkat_kelas,
                        $jurusan_kelas
                    );
    
                    if ($id_kelas) {
                        $file_name = 'User.png';
    
                        if (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])) {
                            $file_name = $_FILES['foto']['name'];
                            $file_temp = $_FILES['foto']['tmp_name'];
                            $kode = round(microtime(true) * 1000);
                            $file_name = $kode . '_' . $file_name;
                            $upload_path = './images/siswa/' . $file_name;
    
                            if (move_uploaded_file($file_temp, $upload_path)) {
                            } else {
                                $file_name = 'User.png';
                            }
                        }
    
                        $data = [
                            'nama_siswa' => $nama_siswa,
                            'nisn' => $nisn,
                            'gender' => $gender,
                            'id_kelas' => $id_kelas,
                            'foto' => $file_name,
                        ];
    
                        $this->m_model->tambah_data('siswa', $data);
    
                        $siswa_exist = $this->m_model->get_by_nisn($nisn);
                    }
                }
            }
            redirect(base_url('admin/siswa'));
        } else {
            echo 'Invalid File';
        }
    }
}
?>