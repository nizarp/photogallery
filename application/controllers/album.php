<?php

/**
 * Album controller
 */

session_start(); //we need to call PHP's session object to access it through CI
class Album extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('album_model');
    }

    function index()
    {
        $userData = parent::requireLogin();
        
        $this->load->library('pagination');
        $this->load->helper('text');
        $this->load->helper('form');
        
        $data['username'] = $userData['username'];
        $data['userId'] = $userData['id'];
        
        $offset = $this->uri->segment(3, 1);
        $keyword = $this->input->get('search');
        
        $data['title'] = 'Albums';
        $data['tab'] = 'Albums';
        
        $this->config->load('ap_settings');
        $limit = $this->config->item('records_per_page');
        
        $data['albums'] = $this->album_model->getAll(($offset-1)*$limit, $limit, $keyword);
        $data['keyword'] = $keyword;

        $config['base_url'] = base_url(). 'index.php/album/page';
        $config['total_rows'] = $this->album_model->getCount($keyword);
        $config['per_page'] = $limit;        
        $this->pagination->initialize($config);
        
        $this->load->view('templates/header', $data);
        $this->load->view('album/album_view', $data);
        $this->load->view('templates/footer');
    }
    
    function search()
    {
        $keyword = $this->input->post('search');
        
        redirect('album/page/1?search='.$keyword);
    }
    
    function create()
    {
        $userData = parent::requireLogin();
        
        $this->load->helper('form');
        $this->load->library('form_validation');     
        $this->load->model('album_model');
        
        $this->form_validation->set_error_delimiters('<div class="red">', '</div>');
        $data['title'] = 'Create Album';
        $data['tab'] = 'Albums';
        $data['formName'] = "album/create";        
        
        $data['album'] = array(
            'title' => '',
            'description' => ''
        );
        
        if ($this->form_validation->run('album_form') == FALSE)
		{
			$this->load->view('templates/header', $data);
            $this->load->view('album/album_form', $data);
            $this->load->view('templates/footer');
            
		} else {
            $data = array(
                "title" => $this->input->post('title'),
                "description" => $this->input->post('description'),
                "user_id" => $userData['id'],
                "created_on" => date('Y-m-d h:i:s')
            );
            
            $this->album_model->create($data);
            
            redirect('album', 'refresh');
        }
    }
    
    function delete($id)
    {
        $userData = parent::requireLogin();
        
        $album = $this->album_model->get($id);
        
        if($userData['username'] == 'admin' || $album['user_id'] == $userData['id']) {
            $this->album_model->delete($id);
        } else {        
            redirect('album', 'refresh');            
        }
        
        redirect('album', 'refresh');
    }
    
    function edit($id)
    {        
        $userData = parent::requireLogin();
        $album = $this->album_model->get($id);
        
        if($userData['username'] == 'admin' || $album['user_id'] == $userData['id']) {

            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="red">', '</div>');
            $data['title'] = 'Edit Album';
            $data['tab'] = 'Albums';
            $data['formName'] = 'album/edit/'.$id;        
            $data['album'] = $album;

            if ($this->form_validation->run('album_form') == FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('album/album_form', $data);
                $this->load->view('templates/footer');

            } else {

                $data = array(
                    "title" => $this->input->post('title'),
                    "description" => $this->input->post('description')
                );

                $this->album_model->update($id, $data);                
                redirect('album/display/'.$id, 'refresh');
            }
        } else {        
            redirect('album', 'refresh');        
        }
    }
    
    function display($id)
    {        
        $this->load->model('photo_model');
        $this->load->helper('text');
        
        $userData = parent::requireLogin();
        $album = $this->album_model->get($id);
        
        if(empty($album)) {
            redirect('album', 'refresh');
        }        
        $photos = $this->photo_model->getByAlbum($id);
        
        $data['title'] = ucfirst($album['title']);
        $data['tab'] = 'Albums';
        $data['album'] = $album;
        $data['album']['photos'] = $photos;
        
        $data['username'] = $userData['username'];
        $data['userId'] = $userData['id'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('album/display_view', $data);
        $this->load->view('templates/footer');
    }
    
}

?>