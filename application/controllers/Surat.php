<?php
/**
 * 
 */
class Surat extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Surat_model');
	}
	function index()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$username = ($this->session->userdata['logged_in']['username']);
		} else {
			redirect('login');
		}

		$this->load->view('surat/index');
	}
	function ceknik()
	{
		$nik = $this->input->post('nik');
		$result = $this->Surat_model->carinik($nik);
		if ($result == 0) {
			$pesan = array('status' => 404,'messages'=> 'NIK tidak ditemukan!' );
			echo json_encode($pesan);
		} else {
			$this->session->set_userdata('datapenduduk', $result);
			$pesan = array('status' => 200,'messages'=> 'NIK ditemukan.' );
			echo json_encode($pesan);
		}
	}
	function pilihsurat()
	{
		$penduduk = $this->session->userdata('datapenduduk');
		$data['penduduk'] = $penduduk;
		$this->load->view('surat/pilihsurat',$data);
	}
	function cetaksurat()
	{
		$data = array(
			'surat' => $this->input->post('jenissurat'),
			'tanggal' => $this->input->post('tanggal'),
			'nomor' => $this->input->post('nomor')
		);
		
		$this->session->set_userdata('datasurat', $data);
		$pesan = array('status' => 200,'messages'=> 'Cetak Surat' );
		echo json_encode($pesan);
	}
	function printed()
	{
		$penduduk = $this->session->userdata('datapenduduk');
		$surat = $this->session->userdata('datasurat');
		//print_r($penduduk[0]);
		//print_r($surat);
		$data['penduduk'] = $penduduk;
		$data['surat'] = $surat;
		if ($surat['surat'] == 'sktm') {
			$this->load->view('surat/sktm',$data);
		} elseif ($surat['surat'] == 'sik') {
			$this->load->view('surat/izinkeramaian',$data);
		}
		$tanggal = $surat['tanggal'];
		$arrtanggal = explode(" ",$tanggal);
		switch ($arrtanggal[1]) {
			case 'Januari':
				$arrtanggal[1] = 1;
				break;
			case 'Febuari':
				$arrtanggal[1] = 2;
				break;
			case 'Maret':
				$arrtanggal[1] = 3;
				break;
			case 'April':
				$arrtanggal[1] = 4;
				break;
			case 'Mei':
				$arrtanggal[1] = 5;
				break;
			case 'Juni':
				$arrtanggal[1] = 6;
				break;
			case 'Juli':
				$arrtanggal[1] = 7;
				break;
			case 'Agustus':
				$arrtanggal[1] = 8;
				break;
			case 'September':
				$arrtanggal[1] = 9;
				break;
			case 'Oktober':
				$arrtanggal[1] = 10;
				break;
			case 'November':
				$arrtanggal[1] = 11;
				break;
			case 'Desember':
				$arrtanggal[1] = 12;
				break;
		}
		$arrtanggal = array($arrtanggal[2],$arrtanggal[1],$arrtanggal[0] );
		$tanggal = implode("-", $arrtanggal);
		$data = array(
		        'jenissurat' => $surat['surat'],
		        'nomorsurat' => $surat['nomor'],
		        'date' => $tanggal,
		        'penduduk' => $penduduk['id']
		);
		$this->Surat_model->insertsurat($data);
		$this->session->unset_userdata('datapenduduk', '');
		$this->session->unset_userdata('datasurat', '');
	}
	function kembaliceknik()
	{
		$this->session->unset_userdata('datapenduduk', '');
		$this->session->unset_userdata('datasurat', '');
		redirect('surat');
	}
	function dataarray()
	{
		
		$penduduk = $this->session->userdata('datapenduduk');
		$surat = $this->session->userdata('datasurat');
		print_r($penduduk[0]);
		print_r($surat);
	}
	public function rekap()
	{
		$data['data'] = $this->Surat_model->getSurat();
		$this->load->view('surat/rekap',$data);
	}
}