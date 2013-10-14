<?php

/*
 * Rating Model Class
 */

Class Rating_model extends MY_Model
{
    
    public $_table = 'rating';
    
    function getRatingByPhoto($photoId)
    {
        $this->db->select('AVG(rating) as rating');
        $query = $this->db->get_where($this->_table, array('photo_id' => $photoId));        
        $data = $query->row_array();
        return $data['rating'];
    }
    
    function deleteUserRating($userId, $photoId)
    {
        $this->db->where('user_id', $userId);
        $this->db->where('photo_id', $photoId);
        
        $this->db->delete($this->_table);
    }
    
}
?>
