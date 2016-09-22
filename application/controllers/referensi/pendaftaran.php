<?php
class Pendaftaran extends Public_Controller
{
    public $data = array(
        'halaman' => 'pendaftaran',
        'main_view' => 'pendaftaran_form',
        'title'  => 'Pendaftaran',
    );

    public function index()
    {
        // Hapus data session user yang sudah berhasil daftar.
        $this->pendaftaran->reset_pendaftaran();

        // Data input dari user.
        $anggota = (object) $this->input->post(null, true);

        // Data untuk form.
        if (! $_POST) {
            $this->data['values'] = (object) $this->pendaftaran->default_values;
        } else {
            $this->data['values'] = $anggota;
        }

        // Validasi.
        if (! $this->pendaftaran->validate('form_rules')) {
            // Buat captcha baru.
            $this->data['captcha'] = $this->pendaftaran->buat_captcha();
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Proses pendaftaran.
        if($this->pendaftaran->daftar($anggota)) {
            redirect('pendaftaran-sukses');
        } else {
            $this->session->set_flashdata('pesan_error', 'Maaf, pendaftaran gagal. Kami mengalami gangguan, coba ' . anchor('pendaftaran', 'ulangi', 'class="alert-link"') .' beberapa saat lagi.');
            redirect('pendaftaran-error');
        }
    }

    // Pendaftaran sukses, tampilkan info akun pendaftar.
    public function sukses()
    {
        $this->data['main_view'] = 'pendaftaran_sukses';
        $this->load->view($this->layout, $this->data);
    }

    // Jika pendaftaran error, tampilkan informasi mengenai error.
    public function error()
    {
        $this->data['main_view'] = 'error';
        $this->data['title'] = 'Pendaftaran Error';
        $this->load->view($this->layout, $this->data);
    }

    // Callback validasi captcha.
    public function _validate_captcha()
    {
        // Jika nilai captcha di session sama dengan input user, maka betul.
        if ($this->session->userdata('captcha') == $this->input->post('captcha', true)) {
            return true;
        } else {
            $this->form_validation->set_message('_validate_captcha', 'Captcha salah.');
            return false;
        }
    }

    public function cetak_form()
    {
        $id = $this->session->userdata('nomor_anggota');
        $no_anggota = get_nomor_pengguna($id);
        
        $anggota = $this->pendaftaran->get(array('id_anggota' => $no_anggota));
        $data['anggota'] = $anggota;

        // Template untuk PDF, return view sbg string
        $html = $this->load->view('cetak_form_pdf', $data, true);
        // Nomor anggota (untuk nama file)
        $no_anggota = format_no_anggota($anggota->id_anggota);

        // Cetak dengan html2pdf
        require(APPPATH."/third_party/html2pdf_4_03/html2pdf.class.php");
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array('20', '5', '20', '5'));
            $html2pdf->WriteHTML($html);
            $html2pdf->Output('form pendaftaran_'.$no_anggota.'.pdf');
        } catch (HTML2PDF_exception $e) {
            // echo $e;
            $this->session->set_flashdata('pesan_error', 'Maaf, kami mengalami kendala teknis. Coba ' . anchor('dashboard/biodata-preview', 'ulangi ', 'class="alert-link"') . ' beberapa saat lagi!');
            redirect('pendaftaran-cetak_form-error');
        }   
    }
}