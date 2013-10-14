<?php

/*
 * Photo Model Class
 */

Class Photo_model extends MY_Model
{
    
    public $_table = 'photo';
    
    function get($id) {
        $data = parent::get($id);
        if(!empty($data)) {
            $this->load->model('user_model');
            $user = $this->user_model->get($data['user_id']);        
            $data['user'] = $user['name'];
        }
        
        return $data;
    }
    
    function getByAlbum($albumId)
    {
        $this->db->select('photo.*,
            (select AVG(rating) from rating where photo_id = photo.id) as avg_rating,
            (select COUNT(id) from comments where photo_id = photo.id) as comment_count,
            user.name as name,
            user.id as user');
        $this->db->join('user', 'user.id = photo.user_id', 'left');
        $query = $this->db->get_where($this->_table, array('photo.album_id' => $albumId));
        return $query->result_array();
    }
    
    function getAll($offset = 0, $limit = 0, $keyword = '') {
        $this->db->select('photo.*,
            (select AVG(rating) from rating where photo_id = photo.id) as avg_rating,
            (select COUNT(id) from comments where photo_id = photo.id) as comment_count,
            user.name as name,
            user.id as user');
        $this->db->join('user', 'user.id = photo.user_id', 'left');
        if($keyword != '') {
            $this->db->like('photo.id', $keyword);
            $this->db->or_like('photo.title', $keyword);
            $this->db->or_like('photo.description', $keyword);
        }
        $this->db->order_by("photo.id", "desc");
        $this->db->group_by('photo.id');
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
    
    function topPhotos()
    {
        $this->db->select('photo.*, AVG(rating.rating) as rating')
                ->from($this->_table)
                ->join('rating', 'rating.photo_id = photo.id', 'left')
                ->group_by('photo.id')
                ->order_by('rating', 'desc')
                ->limit(5);
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    function latestPhotos()
    {
        $this->db->order_by('created_on', 'desc')->limit(5);
        $query = $this->db->get($this->_table);
        
        return $query->result_array();
    }
}
?>
