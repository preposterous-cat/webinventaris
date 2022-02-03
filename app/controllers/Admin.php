<?php
use Mpdf\Mpdf;
class Admin extends Controller
{

	public function __construct()
	{
		$this->adminModel = $this->model('Admin_model');
		$this->historiModel = $this->model('Histori_model');
		$this->userModel = $this->model('User_model');
		$this->barangModel = $this->model('Barang_model');
		$this->supplierModel = $this->model('Supplier_model');
		$this->barangMasukModel = $this->model('BarangMasuk_model');
		$this->barangKeluarModel = $this->model('BarangKeluar_model');
    date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index () 
	{
		$data = [
			'username' => '',
			'password' => '',
			'passwordError' => ''
	];

	//Check post
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
			//filter input dari karakter asing
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
					'username' => trim($_POST['username']),
					'password' => trim($_POST['password']),
					'tanggal' => date('Y-m-d H:i:s'),
					'passwordError' => ''
			];

			//Login
			$loggedInAdmin = $this->adminModel->login($data['username'], $data['password']);

			if ($loggedInAdmin && $this->historiModel->tambah($data)) {
					$this->createAdminSession($loggedInAdmin);
			} else {
					$data['passwordError'] = 'Password atau username salah. Coba lagi.';

					$this->view('admin/admin_login', $data);
			}
			
		}else
		{
			$this->view('admin/admin_login');
		}
	}

	public function createAdminSession($admin) 
	{
		$_SESSION['id_admin'] = $admin->id_admin;
		header('location:' . URLROOT . '/Admin/dashboard_page');
	}

	public function logout()
	{
		unset($_SESSION['id_admin']);
        header('location:' . URLROOT . '/Admin/index');
	}

	public function dashboard_page()
	{
		$data = [
			'title' => 'Dashboard | Admin',
			'dashboard' => 'active',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'barang' => $this->barangModel->getAllDataCount(),
			'supplier' => $this->supplierModel->getAllDataCount(),
			'bm' => $this->barangMasukModel->getAllDataCount(),
			'bk' => $this->barangKeluarModel->getAllDataCount(),
			'staff' => $this->userModel->getStaffCount(),
			'sekretaris' => $this->userModel->getSekretarisCount(),
			'histori' => $this->historiModel->getDataBulanIni(date('m'))
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_dashboard', $data);
		$this->view('layouts/footer');
	}

	public function tambah_barang_page()
	{
		$data = [
			'title' => 'Tambah Barang | Admin',
			'dashboard' => '',
			'tambah_barang' => 'active',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'nama_sup' => $this->supplierModel->getAllNama()
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_tambah_barang', $data);
		$this->view('layouts/footer');
	}

	public function tambah_barang()
	{
		$data = [
			'nama_barang' => '',
			'supplier' => '',
			'stok' => '',
			'kondisi' => '',
			'biaya_stn' => '',
			'biaya_total' => '',
			'merk' => '',
			'sumber' => '',
			'jenis' => '',
			'diunggah' => '',
			'tanggal' => '',
			'bm_terakhir' => '',
			'bk_terakhir' => ''
		];

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		// Memproses Form
		// Sanitize POST data untuk menghilangkan karakter asing
		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = [
						'nama_barang' => trim($_POST['nama_barang']),
						'supplier' => trim($_POST['supplier']),
						'stok' => trim($_POST['stok']),
						'kondisi' => trim($_POST['kondisi']),
						'biaya_stn' => trim($_POST['biaya_stn']),
						'biaya_total' => trim($_POST['biaya_stn']) * trim($_POST['stok']),
						'merk' => trim($_POST['merk']),
						'sumber' => trim($_POST['sumber']),
						'jenis' => trim($_POST['jenis']),
						'diunggah' => "Admin",
						'tanggal' => date('Y-m-d H:i:s'),
						'bm_terakhir' => null,
						'bk_terakhir' => null
				];

				
				if ($this->barangModel->tambah($data)) {
						header('location: ' . URLROOT . '/Admin/kelola_barang_page');
				} else {
						die('Ada yang salah.');
				}
		}
	}

	public function kelola_barang_page()
	{
		$data = [
			'title' => 'Kelola Barang | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => 'active',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'data_barang' => $this->barangModel->getAllData()
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_kelola_barang', $data);
		$this->view('layouts/footer');
	}

	public function lihat_barang_page($id)
	{
		$data = [
			'title' => 'Lihat Barang | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => 'active',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'data_barang' => $this->barangModel->getAllDataByID($id)
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_lihat_barang', $data);
		$this->view('layouts/footer');
	}

	public function edit_barang_page($id)
	{
		$data = [
			'title' => 'Edit Barang | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => 'active',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'data_barang' => $this->barangModel->getAllDataByID($id),
			'nama_sup' => $this->supplierModel->getAllNama()
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_edit_barang', $data);
		$this->view('layouts/footer');
	}

	public function edit_barang()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			// Memproses Form
			// Sanitize POST data untuk menghilangkan karakter asing
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

					$data = [
							'id_barang' => trim($_POST['id_barang']),
							'nama_barang' => trim($_POST['nama_barang']),
							'supplier' => trim($_POST['supplier']),
							'stok' => trim($_POST['stok']),
							'kondisi' => trim($_POST['kondisi']),
							'biaya_stn' => trim($_POST['biaya_stn']),
							'biaya_total' => trim($_POST['biaya_stn']) * trim($_POST['stok']),
							'merk' => trim($_POST['merk']),
							'sumber' => trim($_POST['sumber']),
							'jenis' => trim($_POST['jenis']),
					];

					
					if ($this->barangModel->edit($data)) {
							header('location: ' . URLROOT . '/Admin/kelola_barang_page');
					} else {
							die('Ada yang salah.');
					}
			}
	}

	public function hapus_barang($id)
	{
		$this->barangModel->hapus($id);
		header('location: ' . URLROOT . '/Admin/kelola_barang_page');
	}

	public function tambah_sup_page()
	{
		$data = [
			'title' => 'Tambah Supplier | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => 'active',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_tambah_sup');
		$this->view('layouts/footer');
	}

	public function tambah_sup ()
	{
		$data = [
            'nama_sup' => '',
            'alamat' => '',
            'nomor' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Memproses Form

            $data = [
                'nama_sup' => trim($_POST['nama_sup']),
                'alamat' => trim($_POST['alamat']),
                'nomor' => trim($_POST['nomor'])
            ];

            
            if ($this->supplierModel->tambah_supplier($data)) {
                header('location: ' . URLROOT . '/Admin/kelola_sup_page');
            } else {
                die('Ada yang salah.');
            }
        }
	}

	public function kelola_sup_page()
	{
		$data = [
			'title' => 'Kelola Supplier | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => 'active',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'data_sup' => $this->supplierModel->getAllData()
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_kelola_sup', $data);
		$this->view('layouts/footer');
	}

	public function lihat_sup_page($id)
	{
		$data = [
			'title' => 'Lihat Supplier | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => 'active',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'data_sup' => $this->supplierModel->getAllDataByID($id)
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_lihat_sup', $data);
		$this->view('layouts/footer');
	}

	public function edit_sup_page($id)
	{
		$data = [
			'title' => 'Edit Supplier | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => 'active',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'data_sup' => $this->supplierModel->getAllDataByID($id)
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_edit_sup', $data);
		$this->view('layouts/footer');
	}

	public function edit_sup()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			// Memproses Form

					$data = [
							'id_supplier' => trim($_POST['id_supplier']),
							'nama_sup' => trim($_POST['nama_sup']),
							'alamat' => trim($_POST['alamat']),
							'nomor' => trim($_POST['nomor'])
					];

					
					if ($this->supplierModel->edit($data)) {
							header('location: ' . URLROOT . '/Admin/kelola_sup_page');
					} else {
							die('Ada yang salah.');
					}
			}
	}

	public function hapus_sup($id)
	{
		$this->supplierModel->hapus($id);
		header('location: ' . URLROOT . '/Admin/kelola_sup_page');
	}

	public function tambah_bm_page()
	{
		$data = [
			'title' => 'Tambah Barang Masuk | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => 'active',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'barang' => $this->barangModel->getAllData() 
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_tambah_bm', $data);
		$this->view('layouts/footer');
	}

	public function tambah_bm ()
	{
		$data = [
			'id_barang' => '',
			'nama_barang' => '',
			'supplier' => '',
			'jumlah' => '',
			'biaya' => '',
			'sumber' => '',
			'diunggah' => '',
			'tanggal' => '',
		];
		$data2 = [
			'id_barang' => '',
			'tanggal_masuk' => '',
			'stok' => '',
			'total_biaya' => ''
		];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Memproses Form

            $data = [
							'id_barang' => trim($_POST['id_barang']),
							'nama_barang' => $this->barangModel->getNamaByID(trim($_POST['id_barang'])),
							'supplier' => $this->barangModel->getSupplierByID(trim($_POST['id_barang'])),
							'jumlah' => trim($_POST['jumlah']),
							'biaya' => $this->barangModel->getBiayaSTNByID(trim($_POST['id_barang'])) * trim($_POST['jumlah']),
							'sumber' => trim($_POST['sumber']),
							'diunggah' => "Admin",
							'tanggal' => date('Y-m-d H:i:s') 
            ];
						$data2 = [
							'id_barang' => $data['id_barang'],
							'tanggal_masuk' => date('Y-m-d H:i:s'),
							'stok' => $data['jumlah'] + $this->barangModel->getStokDataByID($data['id_barang']),
							'total_biaya' => $data['biaya'] + $this->barangModel->getBiayaByID($data['id_barang'])
						];
            
            if ($this->barangMasukModel->tambah($data) && $this->barangModel->updateBM($data2)) {
                header('location: ' . URLROOT . '/Admin/kelola_bm_page');
            } else {
                die('Ada yang salah.');
            }
        }
	}

	public function kelola_bm_page()
	{
		$data = [
			'title' => 'Kelola Barang Masuk | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => 'active',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'bm_sekarang' => $this->barangMasukModel->getAllDataToday(date('Y-m-d')),

			'tampil' => false,
			'tanggal_awal' => '',
			'tanggal_akhir' => '',
			'sortedBy_tanggal' => ''
		];

		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			$data = [
				'title' => 'Kelola Barang Masuk | Admin',
				'dashboard' => '',
				'tambah_barang' => '',
				'kelola_barang' => '',
				'tambah_sup' => '',
				'kelola_sup' => '',
				'tambah_bm' => '',
				'kelola_bm' => 'active',
				'tambah_bk' => '',
				'kelola_bk' => '',
				'kelola_staff' => '',
				'kelola_sekretaris' => '',

				'bm_sekarang' => $this->barangMasukModel->getAllDataToday(date('Y-m-d')),
				
				'tampil' => true,
				'tanggal_awal' => date('d-F-Y', strtotime(trim($_POST['tanggal_awal']))),
				'tanggal_akhir' => date('d-F-Y', strtotime(trim($_POST['tanggal_akhir']))),
				'sortedBy_tanggal' =>$this->barangMasukModel->getAllDataByTanggal(trim($_POST['tanggal_awal']), trim($_POST['tanggal_akhir']))
			];

			//Tampilkan data
			$this->view('layouts/header', $data);
			$this->view('admin/admin_kelola_bm', $data);
			$this->view('layouts/footer');
			
		}else
		{
			$this->view('layouts/header', $data);
			$this->view('admin/admin_kelola_bm', $data);
			$this->view('layouts/footer');
		}
	}

	public function lihat_bm_page($id)
	{
		$data = [
			'title' => 'Lihat Barang Masuk | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => 'active',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'bm' => $this->barangMasukModel->getAllDataByID($id),
			'barang' => $this->barangModel->getAllData()  
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_lihat_bm', $data);
		$this->view('layouts/footer');
	}

	public function edit_bm_page($id)
	{
		$data = [
			'title' => 'Edit Barang Masuk | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => 'active',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'bm' => $this->barangMasukModel->getAllDataByID($id),
			'barang' => $this->barangModel->getAllData()  
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_edit_bm', $data);
		$this->view('layouts/footer');
	}

	public function edit_bm()
	{

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			// Memproses Form

			$data = [
				'id_bm' => trim($_POST['id_bm']),
				'id_barang' => trim($_POST['id_barang']),
				'jumlah' => trim($_POST['jumlah']),
				'biaya' => trim($_POST['biaya']),
				'sumber' => trim($_POST['sumber'])
			];

			$stok_sekarang = $this->barangModel->getStokDataByID($data['id_barang']);
			$jumlah_lama = $this->barangMasukModel->getJumlahByID($data['id_bm']);
			$jumlah_baru = $data['jumlah'];

			$biaya_sekarang  = $this->barangModel->getBiayaByID($data['id_barang']);
			$biaya_lama = $this->barangMasukModel->getBiayaByID($data['id_bm']);
			$biaya_baru = $data['biaya'];

			$data2=[
				'id_barang' => $data['id_barang'],
				'stok' => ($stok_sekarang - $jumlah_lama) + $jumlah_baru,
				'total_biaya' => ($biaya_sekarang - $biaya_lama) + $biaya_baru,
				'tanggal_masuk' => date('Y-m-d H:i:s')
			];
			
			if ($this->barangMasukModel->edit($data) && $this->barangModel->updateBM($data2)) {
					header('location: ' . URLROOT . '/Admin/kelola_bm_page');
			} else 
			{
					die('Ada yang salah.');
			}
		}
	}

	public function hapus_bm($id)
	{
		$this->barangMasukModel->hapus($id);
		header('location: ' . URLROOT . '/Admin/kelola_bm_page');
	}
	

	public function tambah_bk_page()
	{
		$data = [
			'title' => 'Tambah Barang Keluar | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => 'active',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'barang' => $this->barangModel->getAllData() 
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_tambah_bk', $data);
		$this->view('layouts/footer');
	}

	public function tambah_bk ()
	{
		$data = [
			'id_barang' => '',
			'nama_barang' => '',
			'supplier' => '',
			'jumlah' => '',
			'keterangan' => '',
			'diunggah' => '',
			'tanggal' => '',
		];
		$data2 = [
			'id_barang' => '',
			'tanggal_keluar' => '',
			'stok' => '',
		];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Memproses Form

            $data = [
							'id_barang' => trim($_POST['id_barang']),
							'nama_barang' => $this->barangModel->getNamaByID(trim($_POST['id_barang'])),
							'supplier' => $this->barangModel->getSupplierByID(trim($_POST['id_barang'])),
							'jumlah' => trim($_POST['jumlah']),
							'keterangan' => trim($_POST['keterangan']),
							'diunggah' => "Admin",
							'tanggal' => date('Y-m-d H:i:s') 
            ];

						//Mencegah stok barang bernilai minus
						$currentStok = $this->barangModel->getStokDataByID($data['id_barang']) - $data['jumlah'];
						if ($currentStok < 0) {
							$currentStok = 0;
						}

						$data2 = [
							'id_barang' => $data['id_barang'],
							'tanggal_keluar' => date('Y-m-d H:i:s'),
							'stok' => $currentStok,
						];
            
            if ($this->barangKeluarModel->tambah($data) && $this->barangModel->updateBK($data2)) {
                header('location: ' . URLROOT . '/Admin/kelola_bk_page');
            } else {
                die('Ada yang salah.');
            }
        }
	}

	public function kelola_bk_page()
	{
		$data = [
			'title' => 'Kelola Barang Keluar | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => 'active',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',
			
			'bk_sekarang' => $this->barangKeluarModel->getAllDataToday(date('Y-m-d')),

			'tampil' => false,
			'tanggal_awal' => '',
			'tanggal_akhir' => '',
			'sortedBy_tanggal' => '',
		];

		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			$data = [
				'title' => 'Kelola Barang Keluar | Admin',
				'dashboard' => '',
				'tambah_barang' => '',
				'kelola_barang' => '',
				'tambah_sup' => '',
				'kelola_sup' => '',
				'tambah_bm' => '',
				'kelola_bm' => '',
				'tambah_bk' => '',
				'kelola_bk' => 'active',
				'kelola_staff' => '',
				'kelola_sekretaris' => '',

				'bk_sekarang' => $this->barangKeluarModel->getAllDataToday(date('Y-m-d')),
				
				'tampil' => true,
				'tanggal_awal' => date('d-F-Y', strtotime(trim($_POST['tanggal_awal']))),
				'tanggal_akhir' => date('d-F-Y', strtotime(trim($_POST['tanggal_akhir']))),
				'sortedBy_tanggal' =>$this->barangKeluarModel->getAllDataByTanggal(trim($_POST['tanggal_awal']), trim($_POST['tanggal_akhir']))
			];

			//Tampilkan data
			$this->view('layouts/header', $data);
			$this->view('admin/admin_kelola_bk', $data);
			$this->view('layouts/footer');
			
		}else
		{
			$this->view('layouts/header', $data);
			$this->view('admin/admin_kelola_bk', $data);
			$this->view('layouts/footer');
		}
	}

	public function lihat_bk_page($id)
	{
		$data = [
			'title' => 'Lihat Barang Keluar | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => 'active',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'bk' => $this->barangKeluarModel->getAllDataByID($id),
			'barang' => $this->barangModel->getAllData()  
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_lihat_bk', $data);
		$this->view('layouts/footer');
	}

	public function edit_bk_page($id)
	{
		$data = [
			'title' => 'Edit Barang Keluar | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => 'active',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'bk' => $this->barangKeluarModel->getAllDataByID($id),
			'barang' => $this->barangModel->getAllData()  
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_edit_bk', $data);
		$this->view('layouts/footer');
	}

	public function edit_bk()
	{

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			// Memproses Form

			$data = [
				'id_bk' => trim($_POST['id_bk']),
				'id_barang' => trim($_POST['id_barang']),
				'jumlah' => trim($_POST['jumlah']),
				'keterangan' => trim($_POST['keterangan'])
			];

			$stok_sekarang = $this->barangModel->getStokDataByID($data['id_barang']);
			$jumlah_lama = $this->barangKeluarModel->getJumlahByID($data['id_bk']);
			$jumlah_baru = $data['jumlah'];

			$data2=[
				'id_barang' => $data['id_barang'],
				'stok' => ($stok_sekarang + $jumlah_lama) - $jumlah_baru,
				'tanggal_keluar' => date('Y-m-d H:i:s')
			];
			
			if ($this->barangKeluarModel->edit($data) && $this->barangModel->updateBK($data2)) {
					header('location: ' . URLROOT . '/Admin/kelola_bk_page');
			} else 
			{
					die('Ada yang salah.');
			}
		}
	}

	public function hapus_bk($id)
	{
		$this->barangKeluarModel->hapus($id);
		header('location: ' . URLROOT . '/Admin/kelola_bk_page');
	}

	public function kelola_staff_page()
	{
		$data = [
			'title' => 'Kelola Staff | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => 'active',
			'kelola_sekretaris' => '',

			'data_staff' => $this->userModel->getAllDataStaff()
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_kelola_staff', $data);
		$this->view('layouts/footer');
	}

	public function kelola_sekretaris_page()
	{
		$data = [
			'title' => 'Kelola Sekretaris | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => 'active',

			'data_sekretaris' => $this->userModel->getAllDataSekretaris()
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_kelola_sekretaris', $data);
		$this->view('layouts/footer');
	}

	public function lihat_user_page($id)
	{
		$data = [
			'title' => 'Lihat User | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'data_user' => $this->userModel->getAllDataByID($id)
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_lihat_user', $data);
		$this->view('layouts/footer');
	}

	public function edit_user_page($id)
	{
		$data = [
			'title' => 'Edit User | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'user' => $this->userModel->getAllDataByID($id)
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_edit_user', $data);
		$this->view('layouts/footer');
	}

	public function edit_user()
	{

		if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
					// Memproses Form
					$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

					$data = [
						'title' => 'Edit User | Admin',
						'dashboard' => '',
						'tambah_barang' => '',
						'kelola_barang' => '',
						'tambah_sup' => '',
						'kelola_sup' => '',
						'tambah_bm' => '',
						'kelola_bm' => '',
						'tambah_bk' => '',
						'kelola_bk' => '',
						'kelola_staff' => '',
						'kelola_sekretaris' => '',

						'user' => $this->userModel->getAllDataByID(trim($_POST['id_user'])),

						'id_user' => trim($_POST['id_user']),
						'nama' => trim($_POST['nama']),
						'username' => trim($_POST['username']),
						'password' => trim($_POST['password']),
						'unameError' => '',
						'errorPW' => ''
					];
					
					//validasi Username
					if ($this->userModel->findUserByUsername($data['username']) && $data['username'] != $this->userModel->getUnameByID($data['id_user'])) 
					{
							$data['unameError'] = 'Username sudah terdaftar!';
		}

					if (strrpos($data['username'], " ") != false) {
							$data['unameError'] = 'Username tidak boleh mengandung spasi!';
					}

					if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $data['username'])) {
							$data['unameError'] = 'Username dilarang memakai karakter selain angka dan huruf!';
					}

					//Validasi password
					if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $data['password'])) {
							$data['errorPW'] = 'Password dilarang memakai karakter selain angka dan huruf!';
					}

					// Jika Error Kosong
					if (empty($data['unameError']) && empty($data['errorPW'])) 
					{

							// Hash password
							$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

							if ($this->userModel->edit($data)) {
								echo '<script type="text/JavaScript"> window.history.go(-2) </script>';
							} else {
									die('Ada yang salah.');
							}
					}else
					{
						$this->view('layouts/header', $data);
						$this->view('admin/admin_edit_user', $data);
						$this->view('layouts/footer');
					}
			}
	}

	public function hapus_user($id)
	{
		$this->userModel->hapus($id);
		echo '<script type="text/JavaScript"> window.history.back(); </script>';
	}

	public function cetak_bm_page()
	{
		$data = [
			'title' => 'Cetak Barang Masuk | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'barang' => $this->barangMasukModel->getAllData() 
		];


		$this->view('layouts/header', $data);
		$this->view('admin/admin_cetak_bm', $data);
		$this->view('layouts/footer');
	}

	public function cetak_bm2() 
	{	
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$data = [
				'nama_barang' => trim($_POST['nama_barang']),
				'bm' => $this->barangMasukModel->getAllDataByNama(trim($_POST['nama_barang']))
				
			];
			ob_start();
			$css = file_get_contents(URLROOT.'/public/css/style_laporan.css');

			$header = '
			<div>
				<img src="'.URLROOT.'/public/img/logo.png'.'" id="logo" class="logo" width="100" height="110s">
				<div class="text-header">
					<span class="sub-header">PEMERINTAH KOTA PALEMBANG</span>
					<br/>
					<span class="sub-header1"><b>SEKRETARIAT DAERAH</b></span>
					<br/>
					<span class="sub-header2">Jalan Merdeka No. 1 Palembang, Provinsi Sumatera Selatan</span>
					<br/>
					<span class="sub-header2">Telepon: (0711) 352695 / 312577 Fax: (0711) 372384 Kode Pos 30131</span>
					<br/>
					<span class="sub-header2">Email: info@palembang.go.id, Website: www.palembang.go.id</span>
				<div>
			</div>
			<br/>
			<div class="baris"></div>
			<br/>
			';
			$nama = $data['nama_barang'];
			$body = '
				<h3 class="content-head">Data Barang Masuk '.$nama.'</h3>
				<table id="table-id" border="0" cellspacing="0" cellpadding="0">
					<tbody>
					<tr>
							<td><b>Nama Barang</b></td>
							<td><b>Supplier</b></td>
							<td><b>Jumlah</b></td>
							<td><b>Biaya</b></td>
							<td><b>Sumber</b></td>
							<td><b>Tanggal</b></td>
						</tr>
						';
			$temp = '';
			
			foreach ($data['bm'] as $datas) 
			{
				$kondisi = $this->barangModel->getKondisiByID($datas->id_barang);
				$jenis = $this->barangModel->getJenisByID($datas->id_barang);
				$temp = $temp . '
				<tr>
					<td>'.$datas->nama_barang.' ('.$kondisi.', '.$jenis.') '.'</td>
					<td>'.$datas->supplier.'</td>
					<td>'.$datas->jumlah.'</td>
					<td>'.$datas->biaya.'</td>
					<td>'.$datas->sumber.'</td>
					<td>'.date('d-m-Y', strtotime($datas->tanggal)).'</td>
				</tr>
				';
			}            
			$body = $body . $temp . '</tbody></table>';          
			$mpdf = new Mpdf();
			$mpdf->setAutoTopMargin = 'stretch'; 
			$mpdf->setAutoBottomMargin = 'stretch';
			$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
			$mpdf->SetHTMLHeader($header);
			$mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
			ob_end_clean();
			$mpdf->Output('Laporan_Barang_Masuk('.$nama.').pdf', 'D');
		}
	}

	public function cetak_bm() 
	{	
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$data = [
				'tanggal_awal' => trim($_POST['tanggal_awal']),
				'tanggal_akhir' => trim($_POST['tanggal_akhir']),
				'bm' => $this->barangMasukModel->getAllDataByTanggal(trim($_POST['tanggal_awal']), trim($_POST['tanggal_akhir']))
				
			];
			ob_start();
			$css = file_get_contents(URLROOT.'/public/css/style_laporan.css');

			$header = '
			<div>
				<img src="'.URLROOT.'/public/img/logo.png'.'" id="logo" class="logo" width="100" height="110s">
				<div class="text-header">
					<span class="sub-header">PEMERINTAH KOTA PALEMBANG</span>
					<br/>
					<span class="sub-header1"><b>SEKRETARIAT DAERAH</b></span>
					<br/>
					<span class="sub-header2">Jalan Merdeka No. 1 Palembang, Provinsi Sumatera Selatan</span>
					<br/>
					<span class="sub-header2">Telepon: (0711) 352695 / 312577 Fax: (0711) 372384 Kode Pos 30131</span>
					<br/>
					<span class="sub-header2">Email: info@palembang.go.id, Website: www.palembang.go.id</span>
				<div>
			</div>
			<br/>
			<div class="baris"></div>
			<br/>
			';
			$tanggal_awal = date('d-m-Y', strtotime($data['tanggal_awal']));
			$tanggal_akhir = date('d-m-Y', strtotime($data['tanggal_akhir']));
			$body = '
				<h3 class="content-head">Data Barang Masuk '.$tanggal_awal.' Sampai '.$tanggal_akhir.'</h3>
				<table id="table-id" border="0" cellspacing="0" cellpadding="0">
					<tbody>
					<tr>
							<td><b>Nama Barang</b></td>
							<td><b>Supplier</b></td>
							<td><b>Jumlah</b></td>
							<td><b>Biaya</b></td>
							<td><b>Sumber</b></td>
							<td><b>Tanggal</b></td>
						</tr>
						';
			$temp = '';
			
			foreach ($data['bm'] as $datas) 
			{
				$kondisi = $this->barangModel->getKondisiByID($datas->id_barang);
				$jenis = $this->barangModel->getJenisByID($datas->id_barang);
				$temp = $temp . '
				<tr>
					<td>'.$datas->nama_barang.' ('.$kondisi.', '.$jenis.') '.'</td>
					<td>'.$datas->supplier.'</td>
					<td>'.$datas->jumlah.'</td>
					<td>'.$datas->biaya.'</td>
					<td>'.$datas->sumber.'</td>
					<td>'.date('d-m-Y', strtotime($datas->tanggal)).'</td>
				</tr>
				';
			}            
			$body = $body . $temp . '</tbody></table>';          
			$mpdf = new Mpdf();
			$mpdf->setAutoTopMargin = 'stretch'; 
			$mpdf->setAutoBottomMargin = 'stretch';
			$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
			$mpdf->SetHTMLHeader($header);
			$mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
			ob_end_clean();
			$mpdf->Output('Laporan_Barang_Masuk('.$tanggal_awal.' | '.$tanggal_akhir.').pdf', 'D');
		}
	}

	public function cetak_bk_page()
	{
		$data = [
			'title' => 'Cetak Barang Keluar | Admin',
			'dashboard' => '',
			'tambah_barang' => '',
			'kelola_barang' => '',
			'tambah_sup' => '',
			'kelola_sup' => '',
			'tambah_bm' => '',
			'kelola_bm' => '',
			'tambah_bk' => '',
			'kelola_bk' => '',
			'kelola_staff' => '',
			'kelola_sekretaris' => '',

			'barang' => $this->barangKeluarModel->getAllData() 
		];

		$this->view('layouts/header', $data);
		$this->view('admin/admin_cetak_bk', $data);
		$this->view('layouts/footer');
	}

	public function cetak_bk() 
	{	
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$data = [
				'tanggal_awal' => trim($_POST['tanggal_awal']),
				'tanggal_akhir' => trim($_POST['tanggal_akhir']),
				'bk' => $this->barangKeluarModel->getAllDataByTanggal(trim($_POST['tanggal_awal']), trim($_POST['tanggal_akhir']))
				
			];
			ob_start();
			$css = file_get_contents(URLROOT.'/public/css/style_laporan.css');

			$header = '
			<div>
				<img src="'.URLROOT.'/public/img/logo.png'.'" id="logo" class="logo" width="100" height="110s">
				<div class="text-header">
					<span class="sub-header">PEMERINTAH KOTA PALEMBANG</span>
					<br/>
					<span class="sub-header1"><b>SEKRETARIAT DAERAH</b></span>
					<br/>
					<span class="sub-header2">Jalan Merdeka No. 1 Palembang, Provinsi Sumatera Selatan</span>
					<br/>
					<span class="sub-header2">Telepon: (0711) 352695 / 312577 Fax: (0711) 372384 Kode Pos 30131</span>
					<br/>
					<span class="sub-header2">Email: info@palembang.go.id, Website: www.palembang.go.id</span>
				<div>
			</div>
			<br/>
			<div class="baris"></div>
			<br/>
			';
			$tanggal_awal = date('d-m-Y', strtotime($data['tanggal_awal']));
			$tanggal_akhir = date('d-m-Y', strtotime($data['tanggal_akhir']));
			$body = '
				<h3 class="content-head">Data Barang Keluar '.$tanggal_awal.' Sampai '.$tanggal_akhir.'</h3>
				<table id="table-id" border="0" cellspacing="0" cellpadding="0">
					<tbody>
					<tr>
							<td><b>Nama Barang</b></td>
							<td><b>Supplier</b></td>
							<td><b>Jumlah</b></td>
							<td><b>Keterangan</b></td>
							<td><b>Tanggal</b></td>
						</tr>
						';
			$temp = '';
			
			foreach ($data['bk'] as $datas) 
			{
				$kondisi = $this->barangModel->getKondisiByID($datas->id_barang);
				$jenis = $this->barangModel->getJenisByID($datas->id_barang);
				$temp = $temp . '
				<tr>
					<td>'.$datas->nama_barang.' ('.$kondisi.', '.$jenis.') '.'</td>
					<td>'.$datas->supplier.'</td>
					<td>'.$datas->jumlah.'</td>
					<td>'.$datas->keterangan.'</td>
					<td>'.date('d-m-Y', strtotime($datas->tanggal)).'</td>
				</tr>
				';
			}            
			$body = $body . $temp . '</tbody></table>';          
			$mpdf = new Mpdf();
			$mpdf->setAutoTopMargin = 'stretch'; 
			$mpdf->setAutoBottomMargin = 'stretch';
			$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
			$mpdf->SetHTMLHeader($header);
			$mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
			ob_end_clean();
			$mpdf->Output('Laporan_Barang_Keluar('.$tanggal_awal.' | '.$tanggal_akhir.').pdf', 'D');
		}
	}

	public function cetak_bk2() 
	{	
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$data = [
				'nama_barang' => trim($_POST['nama_barang']),
				'bk' => $this->barangKeluarModel->getAllDataByNama(trim($_POST['nama_barang']))
				
			];
			ob_start();
			$css = file_get_contents(URLROOT.'/public/css/style_laporan.css');

			$header = '
			<div>
				<img src="'.URLROOT.'/public/img/logo.png'.'" id="logo" class="logo" width="100" height="110s">
				<div class="text-header">
					<span class="sub-header">PEMERINTAH KOTA PALEMBANG</span>
					<br/>
					<span class="sub-header1"><b>SEKRETARIAT DAERAH</b></span>
					<br/>
					<span class="sub-header2">Jalan Merdeka No. 1 Palembang, Provinsi Sumatera Selatan</span>
					<br/>
					<span class="sub-header2">Telepon: (0711) 352695 / 312577 Fax: (0711) 372384 Kode Pos 30131</span>
					<br/>
					<span class="sub-header2">Email: info@palembang.go.id, Website: www.palembang.go.id</span>
				<div>
			</div>
			<br/>
			<div class="baris"></div>
			<br/>
			';
			$nama = $data['nama_barang'];
			$body = '
				<h3 class="content-head">Data Barang Keluar '.$nama.'</h3>
				<table id="table-id" border="0" cellspacing="0" cellpadding="0">
					<tbody>
					<tr>
							<td><b>Nama Barang</b></td>
							<td><b>Supplier</b></td>
							<td><b>Jumlah</b></td>
							<td><b>Keterangan</b></td>
							<td><b>Tanggal</b></td>
						</tr>
						';
			$temp = '';
			
			foreach ($data['bk'] as $datas) 
			{
				$kondisi = $this->barangModel->getKondisiByID($datas->id_barang);
				$jenis = $this->barangModel->getJenisByID($datas->id_barang);
				$temp = $temp . '
				<tr>
					<td>'.$datas->nama_barang.' ('.$kondisi.', '.$jenis.') '.'</td>
					<td>'.$datas->supplier.'</td>
					<td>'.$datas->jumlah.'</td>
					<td>'.$datas->keterangan.'</td>
					<td>'.date('d-m-Y', strtotime($datas->tanggal)).'</td>
				</tr>
				';
			}            
			$body = $body . $temp . '</tbody></table>';          
			$mpdf = new Mpdf();
			$mpdf->setAutoTopMargin = 'stretch'; 
			$mpdf->setAutoBottomMargin = 'stretch';
			$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
			$mpdf->SetHTMLHeader($header);
			$mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
			ob_end_clean();
			$mpdf->Output('Laporan_Barang_Keluar('.$nama.').pdf', 'D');
		}
	}
}