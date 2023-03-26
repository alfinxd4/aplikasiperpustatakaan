<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Include library PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// controller buku
class Buku extends CI_Controller
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
        $this->load->model('Mod_buku');
        //load library
        $this->load->library('form_validation');
    }

    // main function
    function index()
    {
        //load function cek kode buku to create unique id
        $urutdb = $this->Mod_buku->cekKodeBuku();
        // angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($urutdb, 3, 4);
        // first unique id
        $count = 1;
        // format unique id
        $kodeBukuBaru = (int) $nourut + (int) $count;

        //data array kode buku 
        $data = array('kode_buku' => $kodeBukuBaru);

        // GET function from buku model
        $data['buku'] = $this->Mod_buku->getbuku();
        if ($this->session->userdata('access') == 'Admin') {
            // view page masterdata/buku
            $this->load->view('masterdata/buku', $data);
        }
        // forbidden access
        else {
            $this->load->view('errors/403');
        }
    }

    // funtion add
    public function add()
    {
        //validate the form data 
        $this->form_validation->set_rules('kode_buku', 'ID', 'required');
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Buku', 'required');

        if ($this->form_validation->run() == FALSE) {
        } else {

            //get the form values
            $data['kode_buku'] = $this->input->post('kode_buku', TRUE);
            $data['judul'] = $this->input->post('judul', TRUE);
            $data['pengarang'] = $this->input->post('pengarang', TRUE);
            $data['deskripsi'] = $this->input->post('deskripsi', TRUE);


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

            if (!$this->upload->do_upload('foto_buku')) {
            } else {

                //file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();

                //get the uploaded file name
                $data['foto_buku'] = $upload_data['file_name'];

                // load model
                $this->Mod_buku->add($data);
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Data Berhasil Ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('buku');
                // redirect('/');
            }
        }
    }

    // function update
    public function update()
    {
        //validate the form data 

        //validate the form data 
        $this->form_validation->set_rules('kode_buku', 'ID', 'required');
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Buku', 'required');


        if ($this->form_validation->run() == FALSE) {
        } else {

            //get the form values
            $this->form_validation->set_rules('kode_buku', 'ID', 'required');
            $data['kode_buku'] = $this->input->post('kode_buku', TRUE);
            $data['judul'] = $this->input->post('judul', TRUE);
            $data['pengarang'] = $this->input->post('pengarang', TRUE);
            $data['deskripsi'] = $this->input->post('deskripsi', TRUE);

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


            if (!$this->upload->do_upload('foto_buku')) {
            } else {

                //file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();
                //get the uploaded file name
                $data['foto_buku'] = $upload_data['file_name'];

                // load model
                $this->Mod_buku->update($data);
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Data Berhasil Diupdate
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('buku');
            }
        }
    }


    //function to delete 
    public function delete()
    {
        $data = $this->uri->segment(3);
        // load model
        $this->Mod_buku->delete($data);
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Data Berhasil Dihapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('buku');
    }

    function exportpdf()
    {
        // load library in application/libraries
        $this->load->library('pdf');
        // get data from model buku
        $data['buku'] = $this->Mod_buku->getBuku();
        // set orientation print         
        $this->pdf->setPaper('A4', 'potrait');
        // set name file downloaded
        $this->pdf->filename = "masterdata-buku-perpusrekayasatu.pdf";
        // load view page
        $this->pdf->load_view('pdf/buku', $data);
    }

    //function export excel
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

        $sheet->setCellValue('A3', "Data Buku Perpustakaan Rekayasatu"); // Set kolom A1 dengan tulisan "Data Buku Perpustakaan Rekayasatu"
        $sheet->mergeCells('A3:D3'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A3')->applyFromArray($style_title);
        $sheet->getStyle('A3')->getFont()->setBold(true); // Set bold kolom A1

        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A5', "No"); // Set kolom A3 dengan tulisan "No"
        $sheet->setCellValue('B5', "Kode Buku"); // Set kolom B3 dengan tulisan "Kode buku"
        $sheet->setCellValue('C5', "Judul Buku"); // Set kolom C3 dengan tulisan "Nama Lengkap"
        $sheet->setCellValue('D5', "Pengarang"); // Set kolom D3 dengan tulisan "Jenis Kelamin"

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A5')->applyFromArray($style_col);
        $sheet->getStyle('B5')->applyFromArray($style_col);
        $sheet->getStyle('C5')->applyFromArray($style_col);
        $sheet->getStyle('D5')->applyFromArray($style_col);

        // load model getdata
        $buku = $this->Mod_buku->getbuku();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($buku->result() as $row) { // Lakukan looping pada variabel siswa
            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $row->kode_buku);
            $sheet->setCellValue('C' . $numrow, $row->judul);
            $sheet->setCellValue('D' . $numrow, $row->pengarang);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);


            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom No
        $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom ID buku
        $sheet->getColumnDimension('C')->setWidth(70); // Set width kolom Judul Buku
        $sheet->getColumnDimension('D')->setWidth(25); // Set width kolom Pengarang

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $sheet->setTitle("Laporan Data Buku");

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Buku.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
