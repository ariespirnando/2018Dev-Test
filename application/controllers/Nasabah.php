<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends CI_Controller {
	public function index()
	{
		$data = array();
		$data['result'] = $this->db->query("SELECT * FROM nasabah")->result_array();
		$this->template->load('template_wp','nasabah/nasabah', $data);
	}
	function add(){
		$data = array();
		$data['action'] = base_url().'index.php/Nasabah/save';
		$data['name'] = '';
		$data['id'] = '';
		$data['btn'] = 'Add';
		$this->template->load('template_wp','nasabah/formnasabah', $data);
	}
	function save(){
		$data['name'] = $this->input->post('name');
		$this->db->insert('nasabah',$data);
		redirect('Nasabah');
	}
	function edit($id){
		$sql = "SELECT * FROM nasabah n where n.account_id='".$id."'";
		$dt = $this->db->query($sql)->row_array();
		$data = array();
		$data['action'] = base_url().'index.php/Nasabah/Ubah';
		$data['name'] = $dt['name'];
		$data['btn'] = 'Ubah';
		$data['id'] = $id;
		$this->template->load('template_wp','nasabah/formnasabah', $data); 
	}
	function Ubah(){
		$data['name'] = $this->input->post('name');
		$id = $this->input->post('id');
		$this->db->where('account_id',$id);
		$this->db->update('nasabah',$data);
		redirect('Nasabah');
	}
	function hapus($id){
		$this->db->where('account_id',$id);
		$this->db->delete('nasabah');
		redirect('Nasabah');
	}
}
?>