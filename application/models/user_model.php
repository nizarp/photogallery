<?php

/*
 * User Model Class
 */

Class User_model extends MY_Model
{
    
    public $_table = 'user';
    
    function getPasswordbyEmail($email)
    {
        $this->db->where('email',$email);
        $query = $this->db->get('user');

        if ($query->num_rows() > 0){
            $data = $query->row_array();
            return $data['password'];
        }
        else{
            return false;
        }
    }
    
}
?>
