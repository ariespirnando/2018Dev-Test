<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	/*public function index()
	{
		$data = array();
		$data['result'] = $this->db->query("SELECT * FROM nasabah")->result_array();
		$this->template->load('template_wp','nasabah/nasabah', $data);
	}*/
	function index(){
		$data = array();
		$data['action'] = base_url().'index.php/Transaksi/save';
		$data['itransaksi'] = '';
		$data['account_id'] = '';
		$data['transaction_date'] = date('Y-m-d H:i:s'); 
		$data['ijenis'] = '';
		$data['Amount'] = '';
		$data['btn'] = 'Add'; 

		$data['resnasabah'] = $this->db->query("SELECT * FROM nasabah")->result_array();
		$data['resjenis'] = $this->db->query("SELECT * FROM jenis_transaksi")->result_array();

		$sql = "SELECT t.itransaksi, t.transaction_date, t.Amount, n.name, j.description, j.debitcredit FROM transaksi t 
			JOIN nasabah n on n.account_id = t.account_id
			JOIN jenis_transaksi j on j.ijenis = t.ijenis
			ORDER BY t.itransaksi DESC limit 10";

		$data['result'] = $this->db->query($sql)->result_array();
		$this->template->load('template_wp','transaksi/transaksi_header', $data);
	}
	function save(){ 
		$data['itransaksi'] = $this->input->post('itransaksi');
		$data['account_id'] = $this->input->post('account_id');
		$data['transaction_date'] = $this->input->post('transaction_date');
		$data['ijenis'] = $this->input->post('ijenis');
		$data['Amount'] = $this->input->post('Amount');


		$amo_credit = "SELECT SUM(t.Amount) as Amount FROM transaksi t 
			JOIN nasabah n on n.account_id = t.account_id
			JOIN jenis_transaksi j on j.ijenis = t.ijenis
			WHERE j.debitcredit = 'C' AND  t.account_id = '".$data['account_id']."' 
			ORDER BY t.itransaksi";
		$row_credit = $this->db->query($amo_credit)->row_array();

		$amo_debit = "SELECT SUM(t.Amount) as Amount FROM transaksi t 
			JOIN nasabah n on n.account_id = t.account_id
			JOIN jenis_transaksi j on j.ijenis = t.ijenis
			WHERE j.debitcredit = 'D' AND  t.account_id = '".$data['account_id']."'
			ORDER BY t.itransaksi";
		$row_debit = $this->db->query($amo_debit)->row_array();

		if(empty($row_debit['Amount'])){
			$debit = 0;
		}else{
			$debit = $row_debit['Amount'];
		}

		if(empty($row_credit['Amount'])){
			$credit = 0;
		}else{
			$credit = $row_credit['Amount'];
		}

		$saldo = $credit - $debit; 
		$sqlC = "SELECT j.debitcredit FROM jenis_transaksi j where j.debitcredit='D' AND j.ijenis ='".$data['ijenis']."'";
		if($this->db->query($sqlC)->num_rows()>0){
			if($data['Amount']<$saldo){ 
				$this->db->insert('transaksi',$data);
			}else{
				redirect('Transaksi');
			}
		}else{
			$this->db->insert('transaksi',$data);
		}
		redirect('Transaksi');
	}
	 
	function hapus($id){
		$this->db->where('itransaksi',$id);
		$this->db->delete('transaksi');
		redirect('Transaksi');
	}

}
?>