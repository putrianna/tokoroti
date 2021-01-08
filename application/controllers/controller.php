<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class controller extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->model('model');
            $this->load->helper('url');
            $this->load->helper('date');
        }

        function index(){
            $this->load->view('home');
        }

        function login_view(){
            $this->load->view('login_view');
        }
        function login(){
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $tingkat = "";
            $where = array(
                'username' => $username,
                'password' => $password
            );
            $data = $this->model->cekuser("user",$where);
            $cek = $data->num_rows();
            $row = $data->row_array();
            if(isset ($row)){
                $tingkat = $row['tingkat'];
            }
            if($cek > 0){ 
                $data = array('username' => $username);
                $data = $this->model->cekuser("user",$data);
                $row = $data->row_array();
                if(isset ($row)){
                    $id = $row['id'];
                }
                $data_session = array(
                    'nama' => $username,
                    'id' => $id,
                    'status' => "login"
                    );             
                if($tingkat == "admin"){
                    $this->session->set_userdata($data_session);
                    redirect(base_url("controller/admin_page"));
                }else if($tingkat == "kasir"){
                    $this->session->set_userdata($data_session);
                    redirect(base_url("controller/kasir_page"));
                }else if($tingkat == "pelanggan"){
                    $this->session->set_userdata($data_session);
                    redirect(base_url("controller/pelanggan_page"));
                }else{
                    echo "gagal";
                    echo $tingkat;
                }                    
            }else{
                echo "Username dan password salah !";
            }
        }

        function register_view(){
            $this->load->view('register_view');
        }
        function register(){
            $username = $this->input->post("username");
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $confirm = $this->input->post("confirm");
            $tingkat = $this->input->post("tingkat");

            $data = array(
				'username' => $username,
				'password' => $password,
				'tingkat' => $tingkat
			);
            $this->model->input_data('user', $data);

            $id = "";
            $data = array('username' => $username);
            $data = $this->model->cekuser("user",$data);
            $row = $data->row_array();
            if(isset ($row)){
                $id = $row['id'];
            }
            $data = array(
                'id' => $id,
				'email' => $email
            );
            
            $this->model->input_data($tingkat, $data);
			redirect(base_url("controller/login_view"));
        }
        function logout(){
			$this->session->unset_userdata(
				array('username' => '')
			);
			redirect(' ');
		}

    ///////////// wilayah pelanggan ///////////////
        function pelanggan_page(){
            $this->load->view('pelanggan/header');
            $u = $this->session->userdata('id');
            $uk = "";

            $data = array('id' => $u);
            $data = $this->model->cekuser("pelanggan",$data);
            $row = $data->row_array();
            if(isset ($row)){
                $uk = $row['id_pelanggan'];
            } 
            $id = array('id_pelanggan'=>$uk);
            $data = $this->model->select_data('pembelian', $id);
            $data = array('data' => $data);
            $this->load->view('pelanggan/pelanggan_page', $data);
        }
        function katalog(){
            $this->load->view('pelanggan/header');
            $data = $this->model->view_data('produk');
            $data = array('data' => $data);
			$this->load->view('pelanggan/katalog', $data);
        }
        function detail_produk(){
            $this->load->view('pelanggan/header');
            $id = $this->input->post("id");
            $id = array('id_produk'=>$id);
            $data = $this->model->select_data('produk', $id);
            $ukuran = $this->model->view_data('ukuran');
            $data = array('data' => $data, 'ukuran' => $ukuran);
            $this->load->view('pelanggan/produk_detail', $data);
        }
        function keranjang(){
            $ukuran = $this->input->post("ukuran");
            $jumlah = $this->input->post("jumlah");
            $harga = $this->input->post("harga");
            $username = $this->input->post("username");
            $id = $this->input->post("id");
            
            $data = array('id' => $username);
            $data = $this->model->cekuser("pelanggan",$data);
            $row = $data->row_array();
            if(isset ($row)){
                $u = $row['id_pelanggan'];
            }    
            
            $data = array('id_ukuran' => $ukuran);
            $data = $this->model->cekuser("ukuran",$data);
            $row = $data->row_array();
            if(isset ($row)){
                $uk = $row['tambah_harga'];
            } 

            $data = array(
                'id_pelanggan' => $u,
				'id_produk' => $id,
				'id_ukuran' => $ukuran,
                'jumlah' => $jumlah,
                'total' => $jumlah * ($harga + $uk)
			);
            $this->model->input_data('keranjang', $data);
            redirect(base_url("controller/keranjang_view"));
        }
        function keranjang_view(){
            $this->load->view('pelanggan/header');
            $u = $this->session->userdata('id');
            $uk = "";

            $data = array('id' => $u);
            $data = $this->model->cekuser("pelanggan",$data);
            $row = $data->row_array();
            if(isset ($row)){
                $uk = $row['id_pelanggan'];
            }             
            $data = $this->model->selectJoin($uk);
            $t = $this->model->sum($uk);
            $data = array('data'=>$data, 't'=>$t);
			$this->load->view('pelanggan/keranjang', $data);
        }
        function deleteKeranjang(){
            $where = $this->input->post('id_keranjang');
            $where = array('id_keranjang'=>$where);
			$this->model->delete_data('keranjang', $where);
			redirect(base_url("controller/keranjang_view"));
        }
        function pembelian(){
            $this->load->view('pelanggan/header');
            $u = $this->session->userdata('id');
            $uk = "";

            $data = array('id' => $u);
            $data = $this->model->cekuser("pelanggan",$data);
            $row = $data->row_array();
            if(isset ($row)){
                $uk = $row['id_pelanggan'];
            }  
            $total = $this->input->post('total');
            $format = "%Y-%m-%d";        
            $date = @mdate($format);
            $data = array(
                'id_pelanggan' => $uk,
				'total' => $total,
				'date' => $date
            );
            $this->db->empty_table('keranjang');
            $this->load->view('pelanggan/pembayaran', $data);
        }
        function prosesBayar(){
            $id_pelanggan = $this->input->post('id_pelanggan');
            $total = $this->input->post('total');
            $date = $this->input->post('date');
            $data = array(
                'tanggal' => $date,
                'id_pelanggan' => $id_pelanggan,
                'total' => $total
            );
            $this->model->input_data('pembelian', $data);            
            $where = array(
                'id_pelanggan' => $id_pelanggan,
                'status' => 'B'
            );

            $uk = "";
            $data = $this->model->cekuser("pembelian",$where);
            $row = $data->row_array();
            if(isset ($row)){
                $uk = $row['id_beli'];
            } 

            $data = array(
                'status' => 'W',
                'id_beli' => $uk
            );
            $data2 = array(
                'status' => 'W'
            );
            $this->model->updatestatus('keranjang', $where, $data);
            $this->model->updatestatus('pembelian', $where, $data2);
            redirect(base_url("controller/pelanggan_page"));
        }
    }
?>