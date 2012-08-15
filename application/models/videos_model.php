<?php
class Videos_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function getMyHashtag($id, $alsoPublic = true) {
    $this->db->select('hashtag, count(id) AS quanti');
    $this->db->from('hashtags');
    $this->db->group_by("hashtag"); 
    $this->db->order_by('quanti DESC');
    $this->db->where('user_id', $id);
    if ($alsoPublic) {
      $this->db->or_where('user_id', 0); 
    }
    $query = $this->db->get();
    return $query;
  }

  public function insert_video($videoid, $title, $tweet, $userid) {
    $data = array(
     'videoid' => $videoid ,
     'title' => $title ,
     'tweet' => $tweet ,
     'user_id' => $userid
    );
    $retval = $this->db->insert('videos', $data);
    if ($retval !== FALSE) {
      return $this->db->insert_id();
    } else {
      return FALSE;
    }
  }

  public function  insert_hashtag($hashtag, $video_id, $user_id) {
    $data = array(
      'hashtag' => $hashtag ,
      'video_id' => $video_id ,
      'user_id' => $user_id 
    );
    $this->db->insert('hashtags', $data);
    $id_hashtag = $this->db->insert_id();
    log_message('debug',__METHOD__." hashtag created ".$id_hashtag);
    return $id_hashtag;

  }

  public function remove_hashtags_by_id_video($id_video) {
    $this->db->delete('hashtags', array('video_id' => $id_video));

  }

  public function insert_hashtags($listofhahtags, $id_video, $id_user) {
    $this->remove_hashtags_by_id_video($id_video);
    if (is_array($listofhahtags)) {
      foreach ($listofhahtags as $ht) {
        $this->insert_hashtag($ht, $id_video, $id_user);
      }
    }

  }

  public function saveVideo($videoid, $title, $tweet, $userid =0) {
    preg_match_all("/#(\\w+)/", $tweet, $array_ofhastag);
    $id_video = $this->insert_video($videoid, $title, $tweet, $userid);
    log_message('debug',__METHOD__." video created ".$id_video);
    if ($id_video !== FALSE) {
      $this->insert_hashtags($array_ofhastag[1], $id_video, $userid);
      log_message('debug',__METHOD__." video created ".$id_video);
    }

  }

  public function get_my_last_videos($user_id, $also_public = TRUE) {
    $this->db->select('id, videoid, title, img, tweet');
    $this->db->from('videos');
    $this->db->order_by('id DESC');
    $this->db->where('user_id', $user_id);
    if ($also_public) {
      $this->db->or_where('user_id', 0); 
    }
    $query = $this->db->get();
    return $query;
  }

  public function get_my_videos_by_hashtag($hashtag, $user_id, $also_public = TRUE) {
    $extra_query = "";
    if ($also_public) {
      $extra_query = " OR v.user_id = 0 ";
    }
    $sql = "SELECT v.id, v.videoid, v.title, v.img, v.tweet 
    FROM videos as v INNER JOIN hashtags as h ON v.id = h.video_id
    WHERE (v.user_id = $user_id  $extra_query)
    AND (h.hashtag = '".$this->db->escape_str($hashtag)."')
    ORDER BY v.id DESC

    ";

    $query = $this->db->query ($sql);
    /*
    $this->db->select('v.id, v.videoid, v.title, v.img, v.tweet');
    $this->db->from('videos as v');
    $this->db->order_by('v.id DESC');
    $this->db->where('v.user_id', $user_id);

    $this->db->join('hashtags as h', 'hashtags as h');

    if ($also_public) {
      $this->db->or_where('user_id', 0); 
    }
    $query = $this->db->get();
    */
    return $query;
  }

  
}