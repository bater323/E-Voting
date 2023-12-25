<?php

class M_pengunjung extends CI_Model{






    function statistik_pengujung(){
        date_default_timezone_set('Asia/Jakarta');
        $date = date_create('');
        $waktu_skrg = date_format($date, 'Y');
        $query = $this->db->query("SELECT DATE_FORMAT(tgl_register,'%d-%m-%Y') AS tgl,COUNT(id) AS jumlah FROM tblregister WHERE MONTH(tgl_register)=MONTH(CURDATE()) AND left(tgl_register,4)='$waktu_skrg' GROUP BY DATE(tgl_register)");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }





    function cek_ip($user_ip){

    	$hsl=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_ip='$user_ip' AND DATE(pengunjung_tanggal)=CURDATE()");

    	return $hsl;

    }



    function count_visitor(){

        $user_ip=$_SERVER['REMOTE_ADDR'];

        if ($this->agent->is_browser()){

            $agent = $this->agent->browser();

        }elseif ($this->agent->is_robot()){

            $agent = $this->agent->robot(); 

        }elseif ($this->agent->is_mobile()){

            $agent = $this->agent->mobile();

        }else{

            $agent='Other';

        }

        $cek_ip=$this->db->query("SELECT * FROM tbl_register WHERE id='$user_ip' AND DATE(tgl_dftr)=CURDATE()");

        if($cek_ip->num_rows() <= 0){

            $hsl=$this->db->query("INSERT INTO tbl_register (id,pengunjung_perangkat) VALUES('$user_ip','$agent')");

            return $hsl;

        }

    }

	

}