<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Point extends CI_Controller {
	public function index()
	{
		$data = array(); 
		$data['result'] = $this->db->query("SELECT * FROM nasabah")->result_array();
		$this->template->load('template_wp','point/point', $data);
	}
	function detail($id){
		$data = array();
		$data['result1'] = $this->db->query("SELECT t.Amount, j.ijenis, t.transaction_date, j.description  FROM transaksi t 
                        JOIN nasabah n on n.account_id = t.account_id
                        JOIN jenis_transaksi j on j.ijenis = t.ijenis 
                        WHERE j.ijenis =2 AND n.account_id = '".$id."'
                        ORDER BY t.itransaksi")->result_array();
		$data['result2'] = $this->db->query("SELECT t.Amount, j.ijenis, t.transaction_date, j.description  FROM transaksi t 
                        JOIN nasabah n on n.account_id = t.account_id
                        JOIN jenis_transaksi j on j.ijenis = t.ijenis 
                        WHERE j.ijenis =3 AND n.account_id = '".$id."'
                        ORDER BY t.itransaksi")->result_array();

		$sql = "select * from nasabah n where n.account_id='".$id."'";
		$data['nasabah'] = $this->db->query($sql)->row_array();
		$this->template->load('template_wp','point/detail', $data);
	}
	 
}
?>