<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class model extends CI_Model {
        public function __construct()
        {
            parent::__construct();
        }
        function cekuser($table, $where){
            return $this->db->get_where($table,$where);
        }
        function input_data($table, $data){
            $this->db->insert($table, $data);
        }
        function view_data($table){
            return $this->db->get($table)->result_array();
        }
        function select_data($table, $id){
            return $this->db->get_where($table, $id)->result_array();
        }
        function update_data($table, $id, $data){
            $this->db->where('id', $id);
            $this->db->update($table, $data);
        }
        function delete_data($table, $where){
            return $this->db->delete($table, $where);
        }
        function selectJoin($id){
            $this->db->select('*');
            $this->db->from('keranjang');
            $this->db->join('produk', 'keranjang.id_produk = produk.id_produk');
            $this->db->join('ukuran', 'keranjang.id_ukuran = ukuran.id_ukuran');
            $this->db->where('id_pelanggan', $id);
            return $this->db->get()->result_array();
        }
        function sum($id){
            $this->db->select('SUM(total) as sum');
            $this->db->from('keranjang');
            $this->db->where('id_pelanggan', $id);
            return $this->db->get()->result_array();
        }
        function updatestatus($table, $where, $data){
            $this->db->where($where);
            $this->db->update($table, $data);
        }
        function select_beli(){
            $this->db->select('*, keranjang.total as keranjangtotal');
            $this->db->from('keranjang');
            $this->db->join('pembelian', 'keranjang.id_beli = pembelian.id_beli');
            $this->db->join('produk', 'keranjang.id_produk = produk.id_produk');
            $this->db->join('ukuran', 'keranjang.id_ukuran = ukuran.id_ukuran');
            $this->db->where('keranjang.status', 'L');
            return $this->db->get()->result_array();
        }
    }
?>