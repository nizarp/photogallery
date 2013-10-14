<?php

/*
 * Comment Model Class
 */

Class Comment_model extends MY_Model
{
    
    public $_table = 'comments';
    
    function getAllByPhoto($photoId)
    {
        $this->db->select('comments.*, user.name')
                ->from('comments')
                ->join('user', 'user.id = comments.user_id', 'left')
                ->where(array('photo_id' => $photoId));
        $query = $this->db->get();

        return $query->result_array();
    }
    
    function deleteUserComment($userId, $photoId)
    {
        $this->db->where('user_id', $userId);
        $this->db->where('photo_id', $photoId);
        
        $this->db->delete($this->_table);
    }
    
}
?>
