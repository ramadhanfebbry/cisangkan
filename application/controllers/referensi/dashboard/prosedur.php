<?php
class Prosedur extends Dashboard_Controller
{
    public $data = array(
        'halaman' => 'prosedur',
        'main_view' => 'prosedur',
        'title' => 'Prosedur PSB',
    );

    public function index()
    {
        $this->load->view($this->layout, $this->data);
    }
}