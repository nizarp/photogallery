<?php

/**
 * Home page controller
 */

session_start();
class Home extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->model('photo_model');
        
        $userData = parent::requireLogin();
        $data['username'] = $userData['username'];

        $data['title'] = 'Home';
        $data['tab'] = 'Home';
        
        $data['top_photos'] = $this->photo_model->topPhotos();
                
        $data['latest_photos'] = $this->photo_model->latestPhotos();

        $this->load->view('templates/header', $data);
        $this->load->view('home/home_view', $data);
        $this->load->view('templates/footer');
    }
    
}

?>


