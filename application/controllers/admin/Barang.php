<?php
class Barang extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model('My','m');
        $this->load->helpers('form');
        $this->load->helpers('url');

        if($this->session->userdata('user_level') != 'admin'){
            redirect('auth/profile');
        }

        $this->user_id = $this->session->userdata('user_id');
    }


    function index(){
        $data['title'] = 'Semua Barang';

        $this->template->load('template','admin/barang/index',$data);

    }



    function merek(){
        $data['title'] = 'Merek';

        $this->template->load('template','admin/barang/merek',$data);

    }

    function kategori(){
        $data['title'] = 'Kategori';

        $this->template->load('template','admin/barang/kategori',$data);

    }


    public function data(){
        $requestData	= $_REQUEST;

        $search = $requestData['search']['value'];
        $limit = $requestData['length'];
        $start = $requestData['start'];
        $order_index = $requestData['order'][0]['column'];
        $order_field = $requestData['columns'][$order_index]['data'];
        $order_ascdesc = $requestData['order'][0]['dir'];

        $query = $this->db->select('*')->from('barang')->get();

        $data = array();
        $total = 0;
        foreach ($query->result_array() as $row){

            $nestedData = array();
            $nestedData[]	= $total+1;
            $nestedData[]   = $row['barang_nomor_kode'];
            $nestedData[]   = $row['barang_nama'];
            $nestedData[]   = $row['barang_kategori'];
            $nestedData[]   = $row['barang_merk'];
            $nestedData[]   = $row['barang_jumlah'];
            $nestedData[]   = $row['barang_harga'];
            $nestedData[]   = $row['barang_kondisi_saatini'];
            $nestedData[]   = $row['barang_keterangan'];
            $nestedData[]	= "<div class='text-center'><a class='btn success' href='#formDialog' data-toggle='modal' onClick='formDialog(".$row['barang_id'].")'><i class='fa fa-pen'></i></a> <a class='btn danger' href='#' onClick='submitHapus(".$row['barang_id'].")'><i class='fa fa-trash'></i></a></div>";

            $data[] = $nestedData;
            $total++;
        }


        //$search, $limit, $start, $order_field, $order_ascdesc
        $callback = array(
            'draw'=>$requestData['draw'],
            'recordsTotal'=>$total,
            'recordsFiltered'=>$total,
            'data'=>$data
        );
        header('Content-Type: application/json');
        echo json_encode($callback);

    }

    public function simpan(){

        $barang_id 	= $this->input->post('barang_id');
        $barang_nama		= $this->input->post('barang_nama');
        $barang_nomor_kode		= $this->input->post('barang_nomor_kode');
        $barang_nomor_register	= $this->input->post('barang_nomor_register');
        $barang_nomor_seripabrik			= $this->input->post('barang_nomor_seripabrik');
        $barang_merk			= $this->input->post('barang_merk');
        $barang_ukuran			= $this->input->post('barang_ukuran');
        $barang_bahan			= $this->input->post('barang_bahan');
        $barang_tahun_pembelian			= $this->input->post('barang_tahun_pembelian');
        $barang_kondisi			= $this->input->post('barang_kondisi');
        $barang_harga			= $this->input->post('barang_harga');
        $barang_keterangan			= $this->input->post('barang_keterangan');
        $barang_kondisi_saatini			= $this->input->post('barang_kondisi_saatini');

        if(empty($barang_id))
        {
            $this->query_error("Kode Barang Kosong");
        }
        else
        {
            //insert nota
            $baris = array();
            $baris['barang_id'] = $barang_id;
            $baris['barang_nama'] = $barang_nama;
            $baris['barang_nomor_kode'] = $barang_nomor_kode;
            $baris['barang_nomor_register'] = $barang_nomor_register;
            $baris['barang_nomor_seripabrik'] = $barang_nomor_seripabrik;
            $baris['barang_merk'] = $barang_merk;
            $baris['barang_ukuran'] = $barang_ukuran;
            $baris['barang_bahan'] = $barang_bahan;
            $baris['barang_tahun_pembelian'] = $barang_tahun_pembelian;
            $baris['barang_kondisi'] = $barang_kondisi;
            $baris['barang_harga'] = $barang_harga;
            $baris['barang_keterangan'] = $barang_keterangan;
            $baris['barang_kondisi_saatini'] = $barang_kondisi_saatini;

            $master = $this->db->insert('barang', $baris);

            if($master){
                echo json_encode(array('status' => 1, 'pesan' => "Barang berhasil disimpan !"));
            }
            else
            {
                $this->query_error();
            }
        }

    }

    function data1(){
        $q = $this->input->get('term');

        $this->db->select('*')->from('barang');
        $this->db->group_by('barang_kategori');

        //filter data by searched keywords
        if(!empty($q)){
            $this->db->like('barang_kategori',$q);
        }
        $this->db->order_by('barang_kategori','asc');

        //get records
        $query = $this->db->get();

        $items = array();
        foreach($query->result() as $row){
            $data = array();


            $data['label'] = $row->barang_kategori;


            array_push($items, $data);

        }

        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($items);

    }

    function data2(){
        $q = $this->input->get('term');

        $this->db->select('*')->from('barang');
        $this->db->group_by('barang_merk');

        //filter data by searched keywords
        if(!empty($q)){
            $this->db->like('barang_merk',$q);
        }

        $this->db->order_by('barang_merk','asc');
        //get records
        $query = $this->db->get();

        $items = array();
        foreach($query->result() as $row){
            $data = array();

            $data['label'] = $row->barang_merek;


            array_push($items, $data);

        }

        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($items);

    }

    function data3(){
        $q = $this->input->get('term');

        $this->db->select('*')->from('barang');
        $this->db->group_by('barang_nomor_kode');

        //filter data by searched keywords
        if(!empty($q)){
            $this->db->like('barang_nomor_kode',$q);
        }

        $this->db->order_by('barang_nomor_kode','asc');
        //get records
        $query = $this->db->get();

        $items = array();
        foreach($query->result() as $row){
            $data = array();

            $data['label'] = $row->barang_kode;


            array_push($items, $data);

        }

        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($items);

    }

    public function merek_data(){
        $requestData	= $_REQUEST;

        $search = $requestData['search']['value'];
        $limit = $requestData['length'];
        $start = $requestData['start'];
        $order_index = $requestData['order'][0]['column'];
        $order_field = $requestData['columns'][$order_index]['data'];
        $order_ascdesc = $requestData['order'][0]['dir'];

        $this->db->select('*')->from('barang');
        $this->db->group_by('barang_merk');
        $this->db->order_by('barang_merk','asc');
        $query = $this->db->get();

        $data = array();
        $total = 0;
        foreach($query->result() as $row){
            $nestedData = array();
            $nestedData[]	= $total+1;
            $nestedData[]   = $row->barang_merek;
            $data[] = $nestedData;
            $total++;
        }

        //$search, $limit, $start, $order_field, $order_ascdesc
        $callback = array(
            'draw'=>$requestData['draw'],
            'recordsTotal'=>$total,
            'recordsFiltered'=>$total,
            'data'=>$data
        );
        header('Content-Type: application/json');
        echo json_encode($callback);

    }

    public function kategori_data(){
        $requestData	= $_REQUEST;

        $search = $requestData['search']['value'];
        $limit = $requestData['length'];
        $start = $requestData['start'];
        $order_index = $requestData['order'][0]['column'];
        $order_field = $requestData['columns'][$order_index]['data'];
        $order_ascdesc = $requestData['order'][0]['dir'];

        $this->db->select('*')->from('barang');
        $this->db->group_by('barang_kategori');
        $this->db->order_by('barang_kategori','asc');
        $query = $this->db->get();

        $data = array();
        $total = 0;
        foreach($query->result() as $row){
            $nestedData = array();
            $nestedData[]	= $total+1;
            $nestedData[]   = $row->barang_kategori;
            $data[] = $nestedData;
            $total++;
        }

        //$search, $limit, $start, $order_field, $order_ascdesc
        $callback = array(
            'draw'=>$requestData['draw'],
            'recordsTotal'=>$total,
            'recordsFiltered'=>$total,
            'data'=>$data
        );
        header('Content-Type: application/json');
        echo json_encode($callback);

    }

    public function stok(){
        $kode = $this->input->post('kode');
        $stok = $this->input->post('stok');

        $query = $this->db->select('*')->from('barang')->where('barang_nomor_kode',$kode)->get();

        if($stok > $query->row()->barang_stok){
            echo json_encode(array('status' => 0, 'pesan' => "Stok untuk <b>".$query->row()->barang_nama."</b> saat ini hanya tersisa <b>".$query->row()->barang_stok."</b> !"));
        }
        else
        {
            echo json_encode(array('status' => 1));
        }
    }

    public function kode(){
        $keyword 	= $this->input->post('keyword');
        $registered	= $this->input->post('registered');


        $this->db->select('*')->from('barang');
        if(!empty($keyword)){
            $this->db->like("barang_nomor_kode",$keyword);
        }

        $query3 = $this->db->get();

        if($query3->num_rows() > 0)
        {
            $json['status'] 	= 1;
            $json['datanya'] 	= "<ul id='daftar-autocomplete'>";
            foreach($query3->result() as $row3){
                $json['datanya'] .= "
						<li>
							<b>Kode</b> : 
							<span id='kodenya'>".$row3->barang_nomor_kode."</span> <br />
							<span id='barangnya'>".$row3->barang_nama."</span>
							<span id='harganya' style='display:none;'>".$row3->barang_harga."</span>
						</li>
					";
            }
            $json['datanya'] .= "</ul>";
        }
        else
        {
            $json['status'] 	= 0;
        }

        echo json_encode($json);
    }
}
?>