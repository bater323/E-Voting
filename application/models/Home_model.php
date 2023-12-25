<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
	
	function get_post_header(){
		$this->db->select('tbl_post.*, user_name');
		$this->db->from('tbl_post');
		$this->db->join('tbl_user', 'post_user_id=user_id','left');
		$this->db->order_by('post_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	function get_all_category(){
		$result = $this->db->get('tbl_category');
		return $result; 
	}
	function get_all_tag(){
		$result = $this->db->get('tbl_tags');
		return $result; 
	}
	function get_category(){
		$query = $this->db->query("SELECT COUNT(post_id)jumlah,category_name FROM `tbl_category` a
		RIGHT JOIN `tbl_post` b ON a.category_id=b.post_category_id 		
		GROUP BY a.`category_id`");
		return $query;
	}


	function get_post_header_2(){
		$this->db->select('tbl_post.*, user_name');
		$this->db->from('tbl_post');
		$this->db->join('tbl_user', 'post_user_id=user_id','left');
		$this->db->order_by('post_id', 'DESC');
		$this->db->limit(2,1);
		$query = $this->db->get();
		return $query;
	}


	function get_ig(){
		$hsl=$this->db->query("SELECT * FROM tbl_instagram");
		return $hsl;
	}

	function site(){
		$hsl=$this->db->query("SELECT * FROM tbl_site");
		return $hsl;
	}
	function get_post_header_3(){
		$this->db->select('tbl_post.*, user_name');
		$this->db->from('tbl_post');
		$this->db->join('tbl_user', 'post_user_id=user_id','left');
		$this->db->order_by('post_id', 'DESC');
		$this->db->limit(3,3);
		$query = $this->db->get();
		return $query;
	}

	function get_latest_post(){
		$query = $this->db->query("SELECT tbl_post.*,user_name,COUNT(comment_id) AS komen,tbl_category.* FROM tbl_post 
		LEFT JOIN tbl_user ON post_user_id=user_id
		LEFT JOIN tbl_comment ON post_id=comment_post_id
		LEFT JOIN tbl_category ON post_category_id=category_id
		 GROUP BY post_id desc limit 3");
	return $query;
	}

	function latest_post(){
		$this->db->select('tbl_post.*, category_name');
		$this->db->from('tbl_post');
		$this->db->join('tbl_category', 'category_id=post_category_id','left');
		$this->db->order_by('post_id', 'ASC');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query;
	}

	function get_video(){
		$this->db->select('tbl_post_video.*,tbl_category_video.*');
		$this->db->from('tbl_post_video');
		$this->db->join('tbl_category_video', 'category_id=post_category_id','left');
		$this->db->order_by('post_id', 'DESC');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query;
	}

	function get_event(){
		$this->db->select('tbl_post_event.*');
		$this->db->from('tbl_post_event');
		$this->db->order_by('post_id', 'DESC');
		// $this->db->limit(6);
		$query = $this->db->get();
		return $query;
	}
	function slider_event(){
		$this->db->select('tbl_post_event.*');
		$this->db->from('tbl_post_event');
		$this->db->order_by('post_id', 'DESC');
		// $this->db->limit(6);
		$query = $this->db->get();
		return $query;
	}


	function slider(){
		$this->db->select('tbl_slider.*');
		$this->db->from('tbl_slider');
		$this->db->order_by('id_slider', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	function get_all_slider(){
		$hsl=$this->db->query("SELECT id_slider,gambar, deskripsi FROM tbl_slider ORDER BY id_slider DESC");
		return $hsl;
	}


	function checking_email($email){
		$query = $this->db->query("SELECT * FROM tbl_subscribe WHERE subscribe_email='$email'");
		return $query;
	}

	function save_subcribe($email){
		$query = $this->db->query("INSERT INTO tbl_subscribe (subscribe_email) VALUES ('$email')");
		return $query;
	}
	function get_slider(){
		$hsl=$this->db->query("SELECT * FROM tbl_slider where status_img='1'");
		return $hsl;
		}
	
		function get_data_live(){
			$this->db->select('tbl_post_live.*,tbl_pengguna.*');
			$this->db->from('tbl_post_live');
			$this->db->join('tbl_pengguna', 'post_user_id=pengguna_id','left');
				$this->db->order_by('post_id', 'DESC');
				$query = $this->db->get();
			return $query;
			}

}