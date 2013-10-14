<?php
$config = array(
    'jobsheet_form' => array(
        array(
              'field'   => 'name', 
              'label'   => 'Name', 
              'rules'   => 'required|alpha_space'
           ),
        array(
              'field'   => 'contact', 
              'label'   => 'Contact', 
              'rules'   => 'required|numeric|min_length[6]'
           ),
        array(
              'field'   => 'promised_date', 
              'label'   => 'Promised Date', 
              'rules'   => 'required'
           ),
        array(
              'field'   => 'estimated_amount', 
              'label'   => 'Estimated Amount', 
              'rules'   => 'numeric'
           ),
        array(
              'field'   => 'mileage', 
              'label'   => 'Mileage', 
              'rules'   => 'required|numeric'
           ),
        array(
              'field'   => 'reg_no', 
              'label'   => 'Registration Number', 
              'rules'   => 'required|registration_check|min_length[5]'
           )        
    ),
    'album_form' => array(
        array(
              'field'   => 'title', 
              'label'   => 'Title', 
              'rules'   => 'required'
           )
    ),
    'photo_form' => array(
        array(
              'field'   => 'title', 
              'label'   => 'Title', 
              'rules'   => 'required'
           )
    ),
    'signup_form' => array(
        array(
              'field'   => 'name', 
              'label'   => 'Name', 
              'rules'   => 'required|alpha_space'
           ),
        array(
              'field'   => 'username', 
              'label'   => 'Username', 
              'rules'   => 'required|alphanumeric|min_length[5]'
           ),
        array(
              'field'   => 'password', 
              'label'   => 'Password', 
              'rules'   => 'required|alphanumeric|min_length[5]'
           ) ,
        array(
              'field'   => 'contact', 
              'label'   => 'Contact', 
              'rules'   => 'numeric|min_length[6]'
           ),
        array(
              'field'   => 'email', 
              'label'   => 'Email', 
              'rules'   => 'required|valid_email'
           )              
    ),
    'forgot_form' => array(
        array(
              'field'   => 'email', 
              'label'   => 'Email', 
              'rules'   => 'required|valid_email'
           )
    ),
    'part_form' => array(
        array(
              'field'   => 'name', 
              'label'   => 'Name', 
              'rules'   => 'required'
           ),
        array(
              'field'   => 'dealer_price', 
              'label'   => 'Dealer Price', 
              'rules'   => 'required|numeric'
           ),
        array(
              'field'   => 'mrp', 
              'label'   => 'MRP', 
              'rules'   => 'required|numeric'
           )
    )
);
?>
