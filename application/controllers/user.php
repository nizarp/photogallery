<?php

/**
 * User controller
 */

session_start(); //we need to call PHP's session object to access it through CI
class User extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }
    
    function signup()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');     
        $this->form_validation->set_error_delimiters('<div class="red">', '</div>');
        $data['title'] = 'Sign Up';
        $data['tab'] = 'Sign Up';
        $data['formName'] = 'user/signup';
        
        $data['user'] = array(
            "id" => '',
            "username" => '',
            "password" => '',
            "name" => '',
            "email" => '',
            "contact" => '',            
            "dob" => '',
            "location" => '',
            "role" => ''
        );        
        
        $this->form_validation->set_message('alpha_space', 
                'The %s field may only contain alphabetic and space characters.');
        
        if ($this->form_validation->run('signup_form') == FALSE)
		{
			$this->load->view('templates/header', $data);
            $this->load->view('user/signup_form', $data);
            $this->load->view('templates/footer');
            
		} else {
            $dob = $this->input->post('dob');
            $userData = array(
                "username" => $this->input->post('username'),
                "password" => $this->input->post('password'),
                "name" => $this->input->post('name'),                
                "email" => $this->input->post('email'),
                "contact" => $this->input->post('contact'),
                "dob" => 
                  (!empty($dob)) 
                    ? date('Y-m-d', strtotime(str_replace('/', '-', $dob)))
                    : '',
                "location" => $this->input->post('location'),
                "role" => 'user'
            );
            
            $this->user_model->create($userData);
            
            $data['message'] = 'Thank you for registering with PhotoGallery. '.
                    'Please click here to <a href="/index.php/login">Login</a>.';
            $this->load->view('templates/header', $data);
            $this->load->view('user/success_view', $data);
            $this->load->view('templates/footer');
            
        }
        
    }

    function forgot()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');     
        $this->form_validation->set_error_delimiters('<div class="red">', '</div>');
        $data['title'] = 'Forgot Password';
        $data['tab'] = 'Sign Up';
        $data['formName'] = 'user/forgot';
        
        $data['email'] = '';
        
        if ($this->form_validation->run('forgot_form') == FALSE)
		{
			$this->load->view('templates/header', $data);
            $this->load->view('user/forgot_form', $data);
            $this->load->view('templates/footer');
            
		} else {
            $email = $this->input->post('email');
            
            $password = $this->user_model->getPasswordbyEmail($email);
            
            if($password) {            
                $subject = 'Your password for Photo Gallery';
                $message = <<<EOL
Hi,
    
    Your password is: {$password}
        
Thanks,

EOL;
                mail($email, $subject, $message);

                $data['message'] = 'Your password has been sent to your email. '.
                        'Please click here to <a href="/index.php/login">Login</a>.';
                $this->load->view('templates/header', $data);
                $this->load->view('user/success_view', $data);
                $this->load->view('templates/footer');
            } else {
                $data['error'] = 'Invalid email. Please try again';
                $this->load->view('templates/header', $data);
                $this->load->view('user/forgot_form', $data);
                $this->load->view('templates/footer');
            }            
        }

    }
    
    function edit()
    {
        $user = parent::requireLogin();
        
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->load->library('form_validation');     
        $this->form_validation->set_error_delimiters('<div class="red">', '</div>');
        $data['title'] = 'My Account';
        $data['tab'] = 'My Account';
        $data['formName'] = 'user/edit';
        
        $data['user'] = $this->user_model->get($user['id']);        

        if($data['user']['dob'] != '0000-00-00'){
            $data['user']['dob'] = date('d/m/Y', strtotime($data['user']['dob']));
        } else {
            $data['user']['dob'] = '';
        }
        
        $this->form_validation->set_message('alpha_space', 
                'The %s field may only contain alphabetic and space characters.');
        
        if ($this->form_validation->run('signup_form') == FALSE)
		{
			$this->load->view('templates/header', $data);
            $this->load->view('user/signup_form', $data);
            $this->load->view('templates/footer');
            
		} else {
            $dob = $this->input->post('dob');
            $userData = array(
                "password" => $this->input->post('password'),
                "name" => $this->input->post('name'),                
                "email" => $this->input->post('email'),
                "contact" => $this->input->post('contact'),
                "dob" => 
                  (!empty($dob)) 
                    ? date('Y-m-d', strtotime(str_replace('/', '-', $dob)))
                    : '',
                "location" => $this->input->post('location')
            );
            
            $this->user_model->update($user['id'], $userData);
            
            redirect('home', 'refresh');
            
        }
        
    }
    
    
    /*function edit($id)
    {
        parent::requireLogin();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="red">', '</div>');
        $data['title'] = 'Edit Staff';
        $data['tab'] = 'Staff';
        $data['formName'] = 'staff/edit/'.$id;        
        $data['staff'] = $this->staff_model->get($id);
        
        $data['roles'] = $this->staff_model->getAllRoles();
        
        if ($this->form_validation->run('staff_form') == FALSE)
		{
			$this->load->view('templates/header', $data);
            $this->load->view('staff/staff_form', $data);
            $this->load->view('templates/footer');
            
		} else {
            
            $data = array(
                "name" => $this->input->post('name'),
                "role" => $this->input->post('role'),
                "address" => $this->input->post('address'),
                "contact" => $this->input->post('contact'),
                "email" => $this->input->post('email'),
                "notes" => $this->input->post('notes'),
                "salary" => $this->input->post('salary')
            );
            
            $this->staff_model->update($id, $data);
            
            redirect('staff', 'refresh');
        }
        
    }*/

}

?>