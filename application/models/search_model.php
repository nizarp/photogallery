<?php

/*
 * Search Model Class
 */

Class Search_model extends CI_Model
{
    public $_table = 'user';
    
    function getFromFlickr($keyword)
    {
        $key = urlencode($keyword);
        
        $url = "http://api.flickr.com/services/rest/?method=flickr.photos.search".
                "&api_key=b52dbafc4702cd2c4bf72f765e5bb175&safe_search=1".
                "&tags={$key}&per_page=20&page=1&format=json&nojsoncallback=1";
            
        $jsonResponse = file_get_contents($url);
        $photos = array();
        
        if($jsonResponse != '') {
            $data = json_decode($jsonResponse);
            $results = $data->photos->photo;

            $i = 0;
            foreach ($results as $result){
                $photos[$i]['title'] = $result->title;
                $photos[$i]['thumbnail'] = "http://farm{$result->farm}.staticflickr.com/".
                        "{$result->server}/{$result->id}_{$result->secret}_m.jpg";
                $photos[$i]['photo'] = "http://farm{$result->farm}.staticflickr.com/".
                        "{$result->server}/{$result->id}_{$result->secret}_b.jpg";
                $i++;
            }
        }
        return $photos;
    }

}
?>
