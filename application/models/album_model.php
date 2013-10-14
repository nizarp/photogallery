<?php

/*
 * Album Model Class
 */

Class Album_model extends MY_Model
{
    
    public $_table = 'album';
    
    function getAll($offset = 0, $limit = 0, $keyword = '') {
        $this->db->select('album.*,
            photo.photo,
            (select count(id) from photo where album_id = album.id) as count,
            user.name as name,
            user.id as user');
        $this->db->join('photo', 'photo.album_id = album.id', 'left');
        $this->db->join('user', 'user.id = album.user_id', 'left');
        if($keyword != '') {
            $this->db->like('album.id', $keyword);
            $this->db->or_like('album.title', $keyword);
            $this->db->or_like('album.description', $keyword);
        }
        $this->db->order_by("album.id", "desc");
        $this->db->group_by('album.id');
        if($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        $data = $this->db->get($this->_table);
        return $data->result_array();
    }
    
    function getCount($keyword)
    {
        if($keyword != '') {
            $this->db->like('id', $keyword);
            $this->db->or_like('title', $keyword);
            $this->db->or_like('description', $keyword);
        }
        $this->db->from($this->_table);
        return $this->db->count_all_results();
        
    }
            
}
?>
