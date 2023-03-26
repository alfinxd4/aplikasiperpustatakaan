<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Include library PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// controller member
class Member extends CI_Controller
{
    // autentication user login
    function __construct()
    {
        //validasi if the user is not login
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        //load model
        $this->load->model('Mod_member');
        //load library
        $this->load->library('form_validation');
    }

    // main function
    function index()
    {
        //load function cek kode member to create unique id
        $urutdb = $this->Mod_member->cekKodeMember();
        // angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($urutdb, 3, 4);
        // first unique id
        $count = 1;
        // format unique id
        $kodeMemberBaru = (int) $nourut + (int) $count;

        //data array kode buku 
        $data = array('kode_member' => $kodeMemberBaru);

        // GET function from member model
        $data['member'] = $this->Mod_member->getMember();
        if ($this->session->userdata('access') == 'Admin') {
            // view page masterdata/member
            $this->load->view('masterdata/member', $data);
        }
        // forbidden access
        else {
            $this->load->view('errors/403');
        }
    }

    // function add 
    public function add()
    {
        //validate the form data 

        $this->form_validation->set_rules('kode_member', 'ID', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
        } else {

            //get the form values
            $data['kode_member'] = $this->input->post('kode_member');
            $data['nama'] = $this->input->post('nama', TRUE);
            $data['ttl'] = $this->input->post('ttl', TRUE);
            $data['jk'] = $this->input->post('jk', TRUE);
            $data['alamat'] = $this->input->post('alamat', TRUE);

            //file upload code 
            //set file upload settings 
            // file storage upload
            $config['upload_path']          = APPPATH . '../upload/';
            // allowed types files upload
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            // set maxsize file upload (kb
            $config['max_size']             = 100000;

            //load library
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto_member')) {
            } else {

                //file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();

                //get the uploaded file name
                $data['foto_member'] = $upload_data['file_name'];

                //load model
                $this->Mod_member->add($data);
                // set alert success add data
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Data Berhasil Ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('member');
            }
        }
    }

    // function update
    public function update()
    {
        //validate the form data 

        $this->form_validation->set_rules('kode_member', 'ID', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');


        if ($this->form_validation->run() == FALSE) {
        } else {

            //get the form values
            $data['kode_member'] = $this->input->post('kode_member', NULL);
            $data['nama'] = $this->input->post('nama', TRUE);
            $data['ttl'] = $this->input->post('ttl', TRUE);
            $data['jk'] = $this->input->post('jk', TRUE);
            $data['alamat'] = $this->input->post('alamat', TRUE);

            //file upload code 
            //set file upload settings 
            // file storage upload
            $config['upload_path']          = APPPATH . '../upload/';
            // allowed types files upload
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            // set maxsize file upload (kb
            $config['max_size']             = 100000;
            // library upload
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto_member')) {
                $error = array('error' => $this->upload->display_errors());
                // $this->load->view('addMahasiswa', $error);
            } else {

                //file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();
                //get the uploaded file name
                $data['foto_member'] = $upload_data['file_name'];

                // load model
                $this->Mod_member->update($data);
                // set alert success add data
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Berhasil!</strong> Data Berhasil Diupdate
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>');
                redirect('member');
            }
        }
    }


    //function to delete 
    public function delete()
    {
        $data = $this->uri->segment(3);
        // load model
        $this->Mod_member->delete($data);
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Data Berhasil Dihapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('member');
    }

    //  function export pdf
    function exportpdf()
    {
        // load library in application/libraries
        $this->load->library('pdf');
        // get data from model member
        $data['member'] = $this->Mod_member->getMember();
        // set orientation print 
        $this->pdf->setPaper('A4', 'potrait');
        // set name file downloaded
        $this->pdf->filename = "masterdata-member-perpusrekayasatu.pdf";
        // load view page
        $this->pdf->load_view('pdf/member', $data);
    }

    // function export excel
    public function exportexcel()
    {
        //load library
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // style column ms.excel
        $style_title = [
            'font' => [
                'bold' => true
            ], // Set bold font
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text center
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text vertical-align middle
            ],
        ];

        // style column ms.excel
        $style_col = [
            'font' => ['bold' => true], // Set bold font
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text center
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text vertical-align middle
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // set border top
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right 
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom 
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left
            ]
        ];

        // style row ms.excel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // Set vertical align middle
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER // Set text center
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top 
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right 
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom 
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left 
            ]
        ];

        // style row ms.excel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // Set vertical align middle
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER // Set text center
            ],
            'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top 
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right 
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom 
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left 
            ]
        ];

        $sheet->setCellValue('A3', "Data Member Perpustakaan Rekayasatu"); // Set kolom A1 dengan tulisan "Data Member Perpustakaan Rekayasatu"
        $sheet->mergeCells('A3:F3'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A3')->applyFromArray($style_title);
        $sheet->getStyle('A3')->getFont()->setBold(true); // Set bold kolom A1

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A5', "No"); // Set kolom A3 dengan tulisan "No"
        $sheet->setCellValue('B5', "Kode Member"); // Set kolom B3 dengan tulisan "Kode Member"
        $sheet->setCellValue('C5', "Nama Lengkap"); // Set kolom C3 dengan tulisan "Nama Lengkap"
        $sheet->setCellValue('D5', "Jenis Kelamin"); // Set kolom D3 dengan tulisan "Jenis Kelamin"
        $sheet->setCellValue('E5', "Tanggal Lahir"); // Set kolom D3 dengan tulisan "Tanggal Lahir"
        $sheet->setCellValue('F5', "Alamat"); // Set kolom E3 dengan tulisan "Alamat"



        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A5')->applyFromArray($style_col);
        $sheet->getStyle('B5')->applyFromArray($style_col);
        $sheet->getStyle('C5')->applyFromArray($style_col);
        $sheet->getStyle('D5')->applyFromArray($style_col);
        $sheet->getStyle('E5')->applyFromArray($style_col);
        $sheet->getStyle('F5')->applyFromArray($style_col);

        // load model getdata
        $member = $this->Mod_member->getMember();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($member->result() as $row) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $row->kode_member);
            $sheet->setCellValue('C' . $numrow, $row->nama);
            $sheet->setCellValue('D' . $numrow, $row->jk);
            $sheet->setCellValue('E' . $numrow, $row->ttl);
            $sheet->setCellValue('F' . $numrow, $row->alamat);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom No
        $sheet->getColumnDimension('B')->setWidth(20); // Set width kolom ID Member
        $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom Nama Lengkap
        $sheet->getColumnDimension('D')->setWidth(15); // Set width kolom Jenis Kelamin
        $sheet->getColumnDimension('E')->setWidth(15); // Set width kolom Tanggal Lahir
        $sheet->getColumnDimension('F')->setWidth(15); // Set width kolom Alamat

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $sheet->setTitle("Laporan Data Member");

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Member.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
