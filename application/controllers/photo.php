<?php

/**
 * Photo controller
 */

session_start(); //we need to call PHP's session object to access it through CI
class Photo extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('photo_model');
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
        
        $data['title'] = 'Photos';
        $data['tab'] = 'Photos';
        
        $this->config->load('ap_settings');
        $limit = $this->config->item('records_per_page');
        
        $data['photos'] = $this->photo_model->getAll(($offset-1)*$limit, $limit, $keyword);
        $data['keyword'] = $keyword;

        $config['base_url'] = base_url(). 'index.php/photo/page';
        $config['total_rows'] = $this->photo_model->getCount($keyword);
        $config['per_page'] = $limit;        
        $this->pagination->initialize($config);
        
        $this->load->view('templates/header', $data);
        $this->load->view('photo/photo_view', $data);
        $this->load->view('templates/footer');
    }
    
    function search()
    {
        $keyword = $this->input->post('search');
        
        redirect('photo/page/1?search='.$keyword);
    }
    
    function delete($id)
    {
        $userData = parent::requireLogin();
        
        $photo = $this->photo_model->get($id);
        
        if($userData['username'] == 'admin' || $photo['user_id'] == $userData['id']) {
            $this->photo_model->delete($id);
            unlink('C:/wamp/www/photogallery'.$photo['photo']);
            echo 'success';
        }
    }
    
    function display($id)
    {
        $this->load->model('comment_model');
        $this->load->model('rating_model');
        $this->load->helper('text');
        
        $userData = parent::requireLogin();
        
        $data['photo'] = $this->photo_model->get($id);
        
        if(empty($data['photo'])) {
            redirect('photo', 'refresh');
        }
        
        $data['title'] = ucfirst($data['photo']['title']);
        $data['tab'] = 'Photos';        
        $data['photo']['comments'] = $this->comment_model->getAllByPhoto($id);
        $data['photo']['rating'] = $this->rating_model->getRatingByPhoto($id);
        
        $data['username'] = $userData['username'];
        $data['userId'] = $userData['id'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('photo/display_view', $data);
        $this->load->view('templates/footer');
    }
    
    function rate()
    {
        $data = $this->input->post('data');        
        $this->load->model('rating_model');
        
        $this->rating_model->deleteUserRating($data['user_id'], $data['photo_id']);
        $this->rating_model->create($data);
        
        echo round($this->rating_model->getRatingByPhoto($data['photo_id']));
        
    }
    
    function deletecomment($commentId)
    {
        $this->load->model('comment_model');
        echo $this->comment_model->delete($commentId);
    }
    
    function comment()
    {
        $data = $this->input->post('data');        
        $data['posted_on'] = date('Y-m-d h:i:s');
        $this->load->model('comment_model');
        
        echo $this->comment_model->create($data);
        
    }
    
    function add($albumId)
    {
        $userData = parent::requireLogin();
        
        $this->load->helper('form');
        $this->load->library('form_validation');     
        $this->load->model('photo_model');
        $this->load->model('album_model');
        
        $album = $this->album_model->get($albumId);
        if($album['user_id'] != $userData['id'] && $userData['username'] != 'admin') {
            redirect('album/display/'.$albumId, refresh);
        }
        
        $this->form_validation->set_error_delimiters('<div class="red">', '</div>');
        $data['title'] = 'Upload Photo';
        $data['tab'] = 'Photos';
        $data['formName'] = "photo/add/".$albumId;        
        
        $data['photo'] = array(
            'title' => '',
            'description' => '',
            'photo' => ''
        );
        $data['album_id'] = $albumId;
        $data['error'] = '';
        
        if ($this->form_validation->run('photo_form') == FALSE)
		{
			$this->load->view('templates/header', $data);
            $this->load->view('photo/photo_form', $data);
            $this->load->view('templates/footer');
            
		} else {
            
            $config['upload_path'] = 'C:/wamp/www/photogallery/photos/';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('photo'))
            {
                $data['error'] = $this->upload->display_errors();
                
                $this->load->view('templates/header', $data);
                $this->load->view('photo/photo_form', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $uploadData = $this->upload->data();

                $photo = '/photos/'.$uploadData['file_name'];
                $data = array(
                    "title" => $this->input->post('title'),
                    "photo" => $photo,
                    "description" => $this->input->post('description'),
                    "album_id" => $albumId,
                    "user_id" => $userData['id'],
                    "created_on" => date('Y-m-d h:i:s')
                );

                $this->photo_model->create($data);
                redirect('album/display/'.$albumId, 'refresh');
            }

        }
    }        
        
    function edit($id)
    {        
        $userData = parent::requireLogin();
        $photo = $this->photo_model->get($id);
        
        if($userData['username'] == 'admin' || $album['user_id'] == $userData['id']) {

            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="red">', '</div>');
            $data['title'] = 'Edit Photo';
            $data['tab'] = 'Photos';
            $data['formName'] = 'photo/edit/'.$id;        
            $data['photo'] = $photo;

            if ($this->form_validation->run('photo_form') == FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('photo/photo_edit_form', $data);
                $this->load->view('templates/footer');

            } else {

                $data = array(
                    "title" => $this->input->post('title'),
                    "description" => $this->input->post('description')
                );

                $this->photo_model->update($id, $data);                
                redirect('photo/display/'.$id, 'refresh');
            }
        } else {        
            redirect('photo', 'refresh');        
        }
    }
    
}

?>