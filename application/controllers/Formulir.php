<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {

        $this->load->view('formulir/list');
    }

    // Pelacakan Permohonan
    public function pelacakan()
    {

        $this->load->view('formulir/pelacakan');
    }

    // Hasil Pelacakan Permohonan
    public function hasil()
    {

        $this->load->view('formulir/hasil');
    }
}
