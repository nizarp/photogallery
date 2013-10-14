<?php

/**
 * Search page controller
 */

session_start();
class Search extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {        
        $this->load->model('search_model');
        $this->load->helper('form');
        
        $userData = parent::requireLogin();
        $data['username'] = $userData['username'];

        $data['title'] = 'Search';
        $data['tab'] = 'Search';
        $data['formName'] = 'search/index';
        
        $data['keyword'] = trim($this->input->post('keyword'));
        
        if($data['keyword'] != '') {
            $data['keyword'] = $this->input->post('keyword');
            $data['photos'] = $this->search_model->getFromFlickr($data['keyword']);
        }
            
        $this->load->view('templates/header', $data);
        $this->load->view('search/search_view', $data);
        $this->load->view('templates/footer');
        
    }
    
}

?>


