<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	public function index()
	{
		$data = array();
		$data['action'] = base_url().'index.php/Transaksi/save';
		$data['resnasabah'] = $this->db->query("SELECT * FROM nasabah")->result_array();
		$this->template->load('template_wp','report/report_header', $data);
	}
	function report_data(){
		$transaction_date_awal = $this->input->post('transaction_date_awal');
		$transaction_date_akhir = $this->input->post('transaction_date_akhir');
		$account_id = $this->input->post('account_id');

		$amo_credit = "SELECT SUM(t.Amount) as Amount FROM transaksi t 
			JOIN nasabah n on n.account_id = t.account_id
			JOIN jenis_transaksi j on j.ijenis = t.ijenis
			WHERE j.debitcredit = 'C' AND  t.account_id = '".$account_id."' AND t.transaction_date < '".$transaction_date_awal."' 
			ORDER BY t.itransaksi";
		$row_credit = $this->db->query($amo_credit)->row_array();

		$amo_debit = "SELECT SUM(t.Amount) as Amount FROM transaksi t 
			JOIN nasabah n on n.account_id = t.account_id
			JOIN jenis_transaksi j on j.ijenis = t.ijenis
			WHERE j.debitcredit = 'D' AND  t.account_id = '".$account_id."' AND t.transaction_date < '".$transaction_date_awal."' 
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

		$data['saldo'] = $credit - $debit;
		$sql = "SELECT t.itransaksi, t.transaction_date, t.Amount, n.name, j.description, j.debitcredit FROM transaksi t 
			JOIN nasabah n on n.account_id = t.account_id
			JOIN jenis_transaksi j on j.ijenis = t.ijenis
			WHERE t.transaction_date >= '".$transaction_date_awal."' AND t.transaction_date <= '".$transaction_date_akhir."'
			AND t.account_id = '".$account_id."'
			ORDER BY t.itransaksi";
		$data['result'] = $this->db->query($sql)->result_array();
		echo $this->load->view('report/report_det',$data,TRUE);
		exit;
	}
}
?>