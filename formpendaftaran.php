<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		.warning {color:#FF0000;}
		body{
			display: center;
			position: center;
			background-color: lightgrey;
			font-family: consolas;
		}
		h1{
			font-weight: 1000;
		}
		h2{
			font-weight: 1000;
		}
	</style>
</head>
<body>
<?php
include "koneksidatabase.php";
//Deklarasi variabel
$error_id="";
$error_tanggal="";
$error_jenis_pendaftaran="";
$error_tanggal_masuk_sekolah="";
$error_nis="";
$error_nomor_peserta_ujian="";
$error_pernah_paud="";
$error_pernah_tk="";
$error_skhun="";
$error_ijazah="";
$error_nama="";
$error_jenis_kelamin="";
$error_nisn="";
$error_nik="";
$error_tempat_lahir="";
$error_tanggal_lahir="";
$error_agama="";
$error_alamat="";
$error_rt="";
$error_rw="";
$error_desa="";
$error_kecamatan="";
$error_kode_pos="";
$error_tempat_tinggal="";
$error_transportasi="";
$error_hp="";
$error_email="";
$error_kewarganegaraan="";
$error_nama_wali="";
$error_hubungan_wali="";
$error_tahun_wali="";
$error_pendidikan_wali="";
$error_pekerjaan_wali="";
$error_penghasilan_wali="";

$id="";
$tanggal="";
$jenis_pendaftaran="";
$tanggal_masuk_sekolah="";
$nis="";
$nomor_peserta_ujian="";
$pernah_paud="";
$pernah_tk="";
$skhun="";
$ijazah="";
$nama="";
$jenis_kelamin="";
$nisn="";
$nik="";
$tempat_lahir="";
$tanggal_lahir="";
$agama="";
$alamat="";
$rt="";
$rw="";
$desa="";
$kecamatan="";
$kode_pos="";
$tempat_tinggal="";
$transportasi="";
$hp="";
$email="";
$kewarganegaraan="";
$nama_wali="";
$hubungan_wali="";
$tahun_wali="";
$pendidikan_wali="";
$pekerjaan_wali="";
$penghasilan_wali="";

//Jika method POST dijalankan
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	//ID Pendaftaran
	if(empty($_POST["id"])){
		$error_id="*Data wajib diisi";
	}
	else{
		$id=cek_input($_POST["id"]);
		if(!is_numeric($id)){
			$error_id="ID hanya boleh berupa angka";
		}
	}

	//Tanggal pendaftaran
	if(empty($_POST["tanggal"])){
		$error_tanggal="*Data wajib diisi";
	}
	else{
		$tanggal=cek_input($_POST["tanggal"]);
		$tanggal=date('Y-m-d', strtotime($tanggal));
	}

	//Jenis pendaftaran
	if(empty($_POST["jenis_pendaftaran"])){
		$error_jenis_pendaftaran="*Data wajib diisi";
	}
	else{
		$jenis_pendaftaran=cek_input($_POST["jenis_pendaftaran"]);
		if($jenis_pendaftaran == "01"){
			$jenis_pendaftaran="Siswa Baru";	
		}
		elseif($jenis_pendaftaran == "02"){
			$jenis_pendaftaran="Pindahan";	
		}
		else{
			$error_jenis_pendaftaran="Masukkan pilihan jenis pendaftaran dengan benar";
		}
	}

	//Tanggal masuk sekolah
	if(empty($_POST["tanggal_masuk_sekolah"])){
		$error_tanggal_masuk_sekolah="*Data wajib diisi";
	}
	else{
		$tanggal_masuk_sekolah=cek_input($_POST["tanggal_masuk_sekolah"]);
		$tanggal_masuk_sekolah=date('Y-m-d', strtotime($tanggal_masuk_sekolah));
	}

	//NIS
	if(empty($_POST["nis"])){
		$error_nis="*Data wajib diisi";
	}
	else{
		$nis=cek_input($_POST["nis"]);
		if(!is_numeric($nis)){
			$error_nis="NIS hanya boleh berupa angka";
		}
	}

	//Nomor peserta ujian
	if(empty($_POST["nomor_peserta_ujian"])){
		$error_nomor_peserta_ujian="*Data wajib diisi";
	}
	else{
		$nomor_peserta_ujian=cek_input($_POST["nomor_peserta_ujian"]);
		if(!is_numeric($nomor_peserta_ujian)){
			$error_nomor_peserta_ujian="Nomor Peserta Ujian hanya boleh berupa angka";
		}
		elseif (strlen($nomor_peserta_ujian) != 20) {
			$error_nomor_peserta_ujian="Panjang Nomor Peserta Ujian harus berjumlah 20 digit";
		}
	}

	//Pernah PAUD
	if(empty($_POST["pernah_paud"])){
		$error_pernah_paud="*Data wajib diisi";
	}
	else{
		$pernah_paud=cek_input($_POST["pernah_paud"]);
	}

	//Pernah TK
	if(empty($_POST["pernah_tk"])){
		$error_pernah_tk="*Data wajib diisi";
	}
	else{
		$pernah_tk=cek_input($_POST["pernah_tk"]);
	}

	//SKHUN
	if(empty($_POST["skhun"])){
		$error_skhun="*Data wajib diisi";
	}
	else{
		$skhun=cek_input($_POST["skhun"]);
		if(!is_numeric($skhun)){
			$error_skhun="Nomor Seri SKHUN hanya boleh berupa angka";
		}
		elseif (strlen($skhun) != 16) {
			$error_skhun="Panjang Nomor Seri SKHUN harus berjumlah 16 digit";
		}
	}

	//Ijazah
	if(empty($_POST["ijazah"])){
		$error_ijazah="*Data wajib diisi";
	}
	else{
		$ijazah=cek_input($_POST["ijazah"]);
		if(!is_numeric($ijazah)){
			$error_ijazah="Nomor Seri Ijazah hanya boleh berupa angka";
		}
		elseif (strlen($ijazah) != 16) {
			$error_ijazah="Panjang Nomor Seri Ijazah harus 16 digit";
		}
	}

	//Nama lengkap
	if(empty($_POST["nama"])){
		$error_nama="*Data wajib diisi";
	}
	else{
		$nama=cek_input($_POST["nama"]);
		if(!preg_match("/^[a-zA-z ]*$/", $nama)){
			$error_nama="Inputan hanya boleh berupa huruf dan spasi";
		}
	}

	//Jenis kelamin
	if(empty($_POST["jenis_kelamin"])){
		$error_jenis_kelamin="*Data wajib diisi";
	}
	else{
		$jenis_kelamin=cek_input($_POST["jenis_kelamin"]);
	}

	//NISN
	if(empty($_POST["nisn"])){
		$error_nisn="*Data wajib diisi";
	}
	else{
		$nisn=cek_input($_POST["nisn"]);
		if(!is_numeric($nisn)){
			$error_nisn="NISN hanya boleh berupa angka";
		}
	}

	//NIK
	if(empty($_POST["nik"])){
		$error_nik="*Data wajib diisi";
	}
	else{
		$nik=cek_input($_POST["nik"]);
		if(!is_numeric($nik)){
			$error_nik="NIK hanya boleh berupa angka";
		}
	}

	//Tempat lahir
	if(empty($_POST["tempat_lahir"])){
		$error_tempat_lahir="Data wajib diisi";
	}
	else{
		$tempat_lahir=cek_input($_POST["tempat_lahir"]);
		if(!preg_match("/^[a-zA-z ]*$/", $tempat_lahir)){
			$error_tempat_lahir="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}

	//Tanggal lahir
	if(empty($_POST["tanggal_lahir"])){
		$error_tanggal_lahir="*Data wajib diisi";
	}
	else{
		$tanggal_lahir=cek_input($_POST["tanggal_lahir"]);
		$tanggal_lahir=date('Y-m-d', strtotime($tanggal_lahir));
	}

	//Agama
	if(empty($_POST["agama"])){
		$error_agama="*Data wajib diisi";
	}
	else{
		$agama=cek_input($_POST["agama"]);
		if($agama == "01"){
			$agama="Islam";	
		}
		elseif($agama == "02"){
			$agama="Kristen/Protestan";	
		}
		elseif($agama == "03"){
			$agama="Katholik";	
		}
		elseif($agama == "04"){
			$agama="Hindu";	
		}
		elseif($agama == "05"){
			$agama="Buddha";	
		}
		elseif($agama == "06"){
			$agama="Khong Hu Chu";	
		}
		elseif($agama == "99"){
			$agama="Lainnya";	
		}
		else{
			$error_agama="Masukkan pilihan agama dengan benar";
		}
	}


	//Alamat 
	if(empty($_POST["alamat"])){
		$error_alamat="*Data wajib diisi";
	}
	else{
		$alamat=cek_input($_POST["alamat"]);
	}

	//RT
	if(empty($_POST["rt"])){
		$error_rt="*Data wajib diisi";
	}
	else{
		$rt=cek_input($_POST["rt"]);
		if(!is_numeric($rt)){
			$error_rt="RT hanya boleh berupa angka";
		}
	}

	//RW
	if(empty($_POST["rw"])){
		$error_rw="*Data wajib diisi";
	}
	else{
		$rw=cek_input($_POST["rw"]);
		if(!is_numeric($rw)){
			$error_rw="RW hanya boleh berupa angka";
		}
	}

	//Desa/Kelurahan
	if(empty($_POST["desa"])){
		$error_desa="*Data wajib diisi";
	}
	else{
		$desa=cek_input($_POST["desa"]);
		if(!preg_match("/^[a-zA-z ]*$/", $desa)){
			$error_desa="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}

	//Kecamatan
	if(empty($_POST["kecamatan"])){
		$error_kecamatan="*Data wajib diisi";
	}
	else{
		$kecamatan=cek_input($_POST["kecamatan"]);
		if(!preg_match("/^[a-zA-z ]*$/", $kecamatan)){
			$error_kecamatan="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}

	//Kode pos
	if(empty($_POST["kode_pos"])){
		$error_kode_pos="*Data wajib diisi";
	}
	else{
		$kode_pos=cek_input($_POST["kode_pos"]);
		if(!is_numeric($kode_pos)){
			$error_kode_pos="Kode Pos hanya boleh berupa angka";
		}
	}

	//Tempat Tinggal
	if(empty($_POST["tempat_tinggal"])){
		$error_tempat_tinggal="*Data wajib diisi";
	}
	else{
		$tempat_tinggal=cek_input($_POST["tempat_tinggal"]);
		if($tempat_tinggal == "01"){
			$tempat_tinggal="Bersama Orang Tua";	
		}
		elseif($tempat_tinggal == "02"){
			$tempat_tinggal="Wali";	
		}
		elseif($tempat_tinggal == "03"){
			$tempat_tinggal="Kos";	
		}
		elseif($tempat_tinggal == "04"){
			$tempat_tinggal="Asrama";	
		}
		elseif($tempat_tinggal == "05"){
			$tempat_tinggal="Panti Asuhan";	
		}
		elseif($tempat_tinggal == "99"){
			$tempat_tinggal="Lainnya";	
		}
		else{
			$error_tempat_tinggal="Masukkan pilihan tempat tinggal dengan benar";
		}
	}

	//Moda transportasi
	if(empty($_POST["transportasi"])){
		$error_transportasi="*Data wajib diisi";
	}
	else{
		$transportasi=cek_input($_POST["transportasi"]);
		if($transportasi == "01"){
			$transportasi="Jalan Kaki";	
		}
		elseif($transportasi == "02"){
			$transportasi="Kendaraan Pribadi";	
		}
		elseif($transportasi == "03"){
			$transportasi="Kendaraan Umum/Angkot/Pete-pete";	
		}
		elseif($transportasi == "04"){
			$transportasi="Jemputan Sekolah";	
		}
		elseif($transportasi == "05"){
			$transportasi="Kereta Api";	
		}
		elseif($transportasi == "06"){
			$transportasi="Ojek";	
		}
		elseif($transportasi == "07"){
			$transportasi="Andong/Bendi/Sado/Dokar/Delman/Becak";	
		}
		elseif($transportasi == "08"){
			$transportasi="Perahu Penyeberangan/Rakit/Getek";	
		}
		elseif($transportasi == "99"){
			$transportasi="Lainnya";	
		}
		else{
			$error_transportasi="Masukkan pilihan kendaraan dengan benar";
		}
	}

	//No Handphone
	if(empty($_POST["hp"])){
		$error_hp="*Data wajib diisi";
	}
	else{
		$hp=cek_input($_POST["hp"]);
		if(!is_numeric($hp)){
			$error_hp="Nomor HP hanya boleh angka";
		}
	}

	//Email
	if(empty($_POST["email"])){
		$error_email="*Data wajib diisi";
	}
	else{
		$email=cek_input($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error_email="Format Email Invalid";
		}
	}

	//Kewarganegaraan
	if(empty($_POST["kewarganegaraan"])){
		$error_kewarganegaraan="*Data wajib diisi";
	}
	else{
		$kewarganegaraan=cek_input($_POST["kewarganegaraan"]);
	}	

	//Nama lengkap wali
	if(empty($_POST["nama_wali"])){
		$error_nama_wali="*Data wajib diisi";
	}
	else{
		$nama_wali=cek_input($_POST["nama_wali"]);
		if(!preg_match("/^[a-zA-z ]*$/", $nama_wali)){
			$error_nama_wali="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}

	//Hubungan dengan wali
	if(empty($_POST["hubungan_wali"])){
		$error_hubungan_wali="*Data wajib diisi";
	}
	else{
		$hubungan_wali=cek_input($_POST["hubungan_wali"]);
		if(!preg_match("/^[a-zA-z ]*$/", $hubungan_wali)){
			$error_hubungan_wali="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}

	//Tahun lahir wali
	if(empty($_POST["tahun_wali"])){
		$error_tahun_wali="*Data wajib diisi";
	}
	else{
		$tahun_wali=cek_input($_POST["tahun_wali"]);
		if(!is_numeric($tahun_wali)){
			$error_tahun_wali="Tahun lahir hanya boleh angka";
		}
	}

	//Pendidikan wali
	if(empty($_POST["pendidikan_wali"])){
		$error_pendidikan_wali="*Data wajib diisi";
	}
	else{
		$pendidikan_wali=cek_input($_POST["pendidikan_wali"]);
		if($pendidikan_wali == "01"){
			$pendidikan_wali="Tidak sekolah";	
		}
		elseif($pendidikan_wali == "02"){
			$pendidikan_wali="Putus SD";	
		}
		elseif($pendidikan_wali == "03"){
			$pendidikan_wali="SD Sederajat";	
		}
		elseif($pendidikan_wali == "04"){
			$pendidikan_wali="SMP Sederajat";	
		}
		elseif($pendidikan_wali == "05"){
			$pendidikan_wali="SMA Sederajat";	
		}
		elseif($pendidikan_wali == "06"){
			$pendidikan_wali="D1";	
		}
		elseif($pendidikan_wali == "07"){
			$pendidikan_wali="D2";	
		}
		elseif($pendidikan_wali == "08"){
			$pendidikan_wali="D3";	
		}

		elseif($pendidikan_wali == "09"){
			$pendidikan_wali="D4/S1";	
		}
		elseif($pendidikan_wali == "10"){
			$pendidikan_wali="S2";	
		}
		elseif($pendidikan_wali == "11"){
			$pendidikan_wali="S3";	
		}
		else{
			$error_pendidikan_wali="Masukkan pilihan pendidikan dengan benar";
		}
	}

	//Pekerjaan wali
	if(empty($_POST["pekerjaan_wali"])){
		$error_pekerjaan_wali="*Data wajib diisi";
	}
	else{
		$pekerjaan_wali=cek_input($_POST["pekerjaan_wali"]);
		if($pekerjaan_wali == "01"){
			$pekerjaan_wali="Tidak bekerja";	
		}
		elseif($pekerjaan_wali == "02"){
			$pekerjaan_wali="Nelayan";	
		}
		elseif($pekerjaan_wali == "03"){
			$pekerjaan_wali="Petani";	
		}
		elseif($pekerjaan_wali == "04"){
			$pekerjaan_wali="Peternak";	
		}
		elseif($pekerjaan_wali == "05"){
			$pekerjaan_wali="PNS/TNI/POLRI";	
		}
		elseif($pekerjaan_wali == "06"){
			$pekerjaan_wali="Karyawan Swasta";	
		}
		elseif($pekerjaan_wali == "07"){
			$pekerjaan_wali="Pedagang Kecil";	
		}
		elseif($pekerjaan_wali == "08"){
			$pekerjaan_wali="Pedagang Besar";	
		}

		elseif($pekerjaan_wali == "09"){
			$pekerjaan_wali="Wiraswasta";	
		}
		elseif($pekerjaan_wali == "10"){
			$pekerjaan_wali="Wirausaha";	
		}
		elseif($pekerjaan_wali == "11"){
			$pekerjaan_wali="Buruh";	
		}
		elseif($pekerjaan_wali == "12"){
			$pekerjaan_wali="Pensiunan";	
		}
		elseif($pekerjaan_wali == "99"){
			$pekerjaan_wali="Lainnya";	
		}
		else{
			$error_pekerjaan_wali="Masukkan pilihan pekerjaan dengan benar";
		}
	}

	//Penghasilan wali
	if(empty($_POST["penghasilan_wali"])){
		$error_penghasilan_wali="*Data wajib diisi";
	}
	else{
		$penghasilan_wali=cek_input($_POST["penghasilan_wali"]);
		if($penghasilan_wali == "01"){
			$penghasilan_wali="Kurang dari 500.000";	
		}
		elseif($penghasilan_wali == "02"){
			$penghasilan_wali="500 ribu-999.999";	
		}
		elseif($penghasilan_wali == "03"){
			$penghasilan_wali="1 juta-1.999.999";	
		}
		elseif($penghasilan_wali == "04"){
			$penghasilan_wali="2 juta-4.999.999";	
		}
		elseif($penghasilan_wali == "5"){
			$penghasilan_wali="5 juta-20 juta";	
		}
		elseif($penghasilan_wali == "06"){
			$penghasilan_wali="Lebih dari 20 juta";	
		}
		else{
			$error_penghasilan_wali="Masukkan pilihan pekerjaan dengan benar";
		}
	}


	//Jika tidak ada error maka data akan disimpan
	
	include 'koneksidatabase.php';

	if(isset($_POST['submit'])){

	//Memasukkan data ke tabel pendaftaran
	$query="INSERT INTO tb_siswa VALUES ('$_POST[id]', '$_POST[tanggal]', '$_POST[jenis_pendaftaran]', '$_POST[tanggal_masuk_sekolah]', '$_POST[nis]', '$_POST[nomor_peserta_ujian]', '$_POST[pernah_paud]',  '$_POST[pernah_tk]', '$_POST[skhun]', '$_POST[ijazah]', '$_POST[nama]', '$_POST[jenis_kelamin]', '$_POST[nisn]', '$_POST[nik]', '$_POST[tempat_lahir]', '$_POST[tanggal_lahir]',  '$_POST[agama]', '$_POST[alamat]', '$_POST[rt]', '$_POST[rw]', '$_POST[desa]', '$_POST[kecamatan]', '$_POST[kode_pos]', '$_POST[tempat_tinggal]', '$_POST[transportasi]', '$_POST[hp]',  '$_POST[email]',  '$_POST[kewarganegaraan]', '$_POST[nama_wali]', '$_POST[hubungan_wali]', '$_POST[tahun_wali]', '$_POST[pendidikan_wali]', '$_POST[pekerjaan_wali]', '$_POST[penghasilan_wali]')";
		mysqli_query($koneksi, $query);

		if(mysqli_query($koneksi, $query)){
			echo "Pendaftaran berhasil dilakukan";
		} 
		else{
			echo "Error: ". $query ."<br>". mysqli_error($koneksi);
		}
	}
	
}
	
function cek_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<div class="row">
	<div class="col-md-9">
		<div class="card">
			<div class="card-header">
				<h1><center>Formulir Peserta Didik</center></h1>
			</div>
			<div class="card-body">
				<!-- Mengarahkan action ke halaman itu sendiri -->
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form-group row">
						<label for="id" class="col-sm-3 col-form-label">ID Pendaftaran</label>
						<div class="col-sm-9">
							<input type="text" name="id" class="form-control <?php echo ($error_id!="" ? 
                            "is_invalid" : ""); ?>" id="id" placeholder="ID Pendaftaran" value="<?php echo 
                            $id; ?>"><label>Tanyakan ID Pendaftaran pada pihak sekolah</label><span class="warning"><?php echo 
                            $error_id; ?></span>
						</div>
					</div>
					<div class="form-group row">
						<label for="tanggal" class="col-sm-3 col-form-label">Tanggal Pendaftaran</label>
						<div class="col-sm-9">
							<input type="date" name="tanggal" class="form-control <?php echo ($error_tanggal !="" ? 
                            "is_invalid" : ""); ?>" id="tanggal" placeholder="Tanggal Pendaftaran" value="<?php echo 
                            $tanggal; ?>"><label>Contoh: 18-05-2022</label><span class="warning"><?php echo 
                            $error_tanggal; ?></span>
						</div>
					</div>
					<div class="card-header">
						<h5>Registrasi Peserta Didik</h5>
					</div>
					<br>
					<div class="form-group row">
						<label for="jenis_pendaftaran" class="col-sm-3 col-form-label">Jenis Pendaftaran</label>
						<div class="col-sm-9">
							<input type="text" name="jenis_pendaftaran" class="form-control <?php echo ($error_jenis_pendaftaran !="" ? 
                            "is_invalid" : ""); ?>" id="jenis_pendaftaran" placeholder="Jenis Pendaftaran" value="<?php echo $jenis_pendaftaran; 
                            ?>"><label>01=Siswa Baru, 02=Pindahan</label><span class="warning"><?php echo $error_jenis_pendaftaran; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="tanggal_masuk_sekolah" class="col-sm-3 col-form-label">Tanggal Masuk Sekolah</label>
						<div class="col-sm-9">
							<input type="date" name="tanggal_masuk_sekolah" class="form-control <?php echo ($error_tanggal_masuk_sekolah !="" ? 
                            "is_invalid" : ""); ?>" id="tanggal_masuk_sekolah" placeholder="Tanggal Masuk Sekolah" value="<?php echo 
                            $tanggal_masuk_sekolah; ?>"><label>Contoh: 02-02-2022</label><span class="warning"><?php echo 
                            $error_tanggal_masuk_sekolah; ?></span>
						</div>
					</div>	


					<div class="form-group row">
						<label for="nis" class="col-sm-3 col-form-label">NIS</label>
						<div class="col-sm-9">
							<input type="text" name="nis" class="form-control <?php echo ($error_nis !="" ? "is_invalid" : ""); ?>" id="nis" 
                            placeholder="NIS" value="<?php echo $nis; ?>"><span class="warning"><?php echo $error_nis; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="nomor_peserta_ujian" class="col-sm-3 col-form-label">Nomor Peserta Ujian</label>
						<div class="col-sm-9">
							<input type="text" name="nomor_peserta_ujian" class="form-control <?php echo ($error_nomor_peserta_ujian !="" ? 
                            "is_invalid" : ""); ?>" id="nomor_peserta_ujian" placeholder="Nomor Peserta Ujian" value="<?php echo 
                            $nomor_peserta_ujian; ?>"><label></label><span class="warning"><?php echo $error_nomor_peserta_ujian; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="pernah_paud" class="col-sm-3 col-form-label">Apakah Pernah PAUD?</label>
						<div class="col-sm-9">
							<input type="radio" name="pernah_paud" value="Ya">Ya
							<input type="radio" name="pernah_paud" value="Tidak">Tidak
							<span class="warning"><?php echo $error_pernah_paud; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="pernah_tk" class="col-sm-3 col-form-label">Apakah Pernah TK?</label>
						<div class="col-sm-9">
							<input type="radio" name="pernah_tk" value="Ya">Ya
							<input type="radio" name="pernah_tk" value="Tidak">Tidak
							<span class="warning"><?php echo $error_pernah_tk; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="skhun" class="col-sm-3 col-form-label">No. Seri SKHUN Sebelumnya</label>
						<div class="col-sm-9">
							<input type="text" name="skhun" class="form-control <?php echo ($skhun !="" ? "is_invalid" : ""); ?>" 
                            id="skhun" placeholder="No. Seri SKHUN Sebelumnya" value="<?php echo $skhun; ?>"><span class="warning"><?php 
                            echo $error_skhun; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="ijazah" class="col-sm-3 col-form-label">No. Seri Ijazah Sebelumnya</label>
						<div class="col-sm-9">
							<input type="text" name="ijazah" class="form-control <?php echo ($ijazah !="" ? "is_invalid" : ""); ?>" 
                            id="ijazah" placeholder="No. Seri Ijazah Sebelumnya" value="<?php echo $ijazah; ?>"><span class="warning">
                            <?php echo $error_ijazah; ?></span>
						</div>
					</div>

					<div class="card-header">
						<h5>Data Pribadi</h5>
					</div>
					<br>
					<div class="form-group row">
						<label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control <?php echo ($error_nama !="" ? "is_invalid" : ""); ?>" 
                            id="nama" placeholder="Nama" value="<?php echo $nama; ?>"><span class="warning"><?php echo $error_nama; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-9">
							<input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
							<input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
							<span class="warning"><?php echo $error_jenis_kelamin; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="nisn" class="col-sm-3 col-form-label">NISN</label>
						<div class="col-sm-9">
							<input type="text" name="nisn" class="form-control <?php echo ($error_nisn !="" ? "is_invalid" : ""); ?>
                            " id="nisn" placeholder="NISN" value="<?php echo $nisn; ?>"><span class="warning"><?php echo $error_nisn; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="nik" class="col-sm-3 col-form-label">NIK</label>
						<div class="col-sm-9">
							<input type="text" name="nik" class="form-control <?php echo ($error_nik !="" ? "is_invalid" : ""); ?>" 
                            id="nik" placeholder="NIK" value="<?php echo $nik; ?>"><span class="warning"><?php echo $error_nik; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
						<div class="col-sm-9">
							<input type="text" name="tempat_lahir" class="form-control <?php echo 
                            ($error_tempat_lahir !="" ? "is_invalid" : ""); ?>" id="tempat_lahir" placeholder="Tempat Lahir" 
                            value="<?php echo $tempat_lahir; ?>"><span class="warning"><?php echo $error_tempat_lahir; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
						<div class="col-sm-9">
							<input type="date" name="tanggal_lahir" class="form-control <?php echo ($error_tanggal_lahir !="" ? 
                            "is_invalid" : ""); ?>" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>">
                            <label>Contoh: 02-02-2002</label><span class="warning"><?php echo $error_tanggal_lahir; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="agama" class="col-sm-3 col-form-label">Agama</label>
						<div class="col-sm-9">
							<input type="text" name="agama" class="form-control <?php echo ($error_agama !="" ? "is_invalid" : ""); ?>" 
                            id="agama" placeholder="Agama" value="<?php echo $agama; ?>"><label>01=Islam, 02=Kristen/Protestan, 03=Katholik, 
                            04=Hindu, 05=Buddha, 06=Khong Hu Chu, 99=Lainnya</label><span class="warning"><?php echo $error_agama; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="alamat" class="col-sm-3 col-form-label">Alamat Jalan</label>
						<div class="col-sm-9">
							<input type="text" name="alamat" class="form-control <?php echo ($error_alamat !="" ? "is_invalid" : ""); ?>" 
                            id="alamat" placeholder="Alamat Jalan" value="<?php echo $alamat; ?>"><span class="warning"><?php echo 
                            $error_alamat; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="rt" class="col-sm-3 col-form-label">RT</label>
						<div class="col-sm-9">
							<input type="text" name="rt" class="form-control <?php echo ($error_rt !="" ? "is_invalid" : ""); ?>" 
                            id="rt" placeholder="RT" value="<?php echo $rt; ?>"><span class="warning"><?php echo $error_rt; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="rw" class="col-sm-3 col-form-label">RW</label>
						<div class="col-sm-9">
							<input type="text" name="rw" class="form-control <?php echo ($error_rw !="" ? "is_invalid" : ""); ?>" 
                            id="rw" placeholder="RW" value="<?php echo $rw; ?>"><span class="warning"><?php echo $error_rw; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="desa" class="col-sm-3 col-form-label">Desa/Kelurahan</label>
						<div class="col-sm-9">
							<input type="text" name="desa" class="form-control <?php echo ($error_desa !="" ? "is_invalid" : ""); ?>" 
                            id="desa" placeholder="Desa/Kelurahan" value="<?php echo $desa; ?>"><span class="warning"><?php echo $error_desa; 
                            ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
						<div class="col-sm-9">
							<input type="text" name="kecamatan" class="form-control <?php echo ($error_kecamatan !="" ? "is_invalid" : ""); ?>"
                             id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>"><span class="warning"><?php 
                             echo $error_kecamatan; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
						<div class="col-sm-9">
							<input type="text" name="kode_pos" class="form-control <?php echo ($error_kode_pos !="" ? "is_invalid" : ""); ?>" 
                            id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>"><span class="warning"><?php 
                            echo $error_kode_pos; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="tempat_tinggal" class="col-sm-3 col-form-label">Tempat Tinggal</label>
						<div class="col-sm-9">
							<input type="text" name="tempat_tinggal" class="form-control <?php echo ($error_tempat_tinggal !="" ? "is_invalid" 
                            : ""); ?>" id="tempat_tinggal" placeholder="Tempat Tinggal" value="<?php echo $tempat_tinggal; ?>">
                            <label>01=Bersama Orang Tua, 02=Wali, 03=Kos, 04=Asrama, 05=Panti Asuhan, 99=Lainnya</label><span class="warning"><?php 
                            echo $error_tempat_tinggal; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="transportasi" class="col-sm-3 col-form-label">Transportasi</label>
						<div class="col-sm-9">
							<input type="text" name="transportasi" class="form-control <?php echo ($error_transportasi !="" ? "is_invalid" : ""); 
                            ?>" id="transportasi" placeholder="Transportasi" value="<?php echo $transportasi; ?>"><label>01=Jalan Kaki, 
                            02=Kendaraan Pribadi, 03=Kendaraan Umum/Angkot/Pete-pete, 04=Jemputan Sekolah, 05=Kereta Api, 06=Ojek, 
                            07=Andong/Bendi/Sado/Dokar/Delman/Becak, 08=Perahu Penyeberangan/Rakit/Getek, 99=Lainnya</label><span 
                            class="warning"><?php echo $error_transportasi; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="hp" class="col-sm-3 col-form-label">No. HP</label>
						<div class="col-sm-9">
							<input type="text" name="hp" class="form-control <?php echo ($error_hp !="" ? "is_invalid" : ""); ?>" 
                            id="hp" placeholder="No. HP" value="<?php echo $hp; ?>"><span class="warning"><?php echo $error_hp; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-sm-3 col-form-label">E-mail Pribadi</label>
						<div class="col-sm-9">
							<input type="text" name="email" class="form-control <?php echo ($error_email !="" ? "is_invalid" : ""); ?>" 
                            id="email" placeholder="Email" value="<?php echo $email; ?>"><span class="warning"><?php echo $error_email; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="kewarganegaraan" class="col-sm-3 col-form-label">Kewarganegaraan</label>
						<div class="col-sm-9">
							<input type="radio" name="kewarganegaraan" value="WNI">WNI
							<input type="radio" name="kewarganegaraan" value="WNA">WNA
							<span class="warning"><?php echo $error_kewarganegaraan; ?></span>
						</div>
					</div>

					<div class="card-header">
						<h5>Data wali</h5>
					</div>
					<br>
					<div class="form-group row">
						<label for="nama_wali" class="col-sm-3 col-form-label">Nama wali</label>
						<div class="col-sm-9">
							<input type="text" name="nama_wali" class="form-control <?php echo ($error_nama_wali !="" ? "is_invalid" : ""); ?>" 
                            id="nama_wali" placeholder="Nama wali" value="<?php echo $nama_wali; ?>"><span class="warning"><?php echo $error_nama_wali; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="hubungan_wali" class="col-sm-3 col-form-label">Hubungan wali</label>
						<div class="col-sm-9">
							<input type="text" name="hubungan_wali" class="form-control <?php echo ($error_hubungan_wali !="" ? "is_invalid" : ""); ?>" 
                            id="hubungan_wali" placeholder="Hubungan dengan wali" value="<?php echo $hubungan_wali; ?>"><span class="warning"><?php echo $error_hubungan_wali; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="tahun_wali" class="col-sm-3 col-form-label">Tahun Lahir wali</label>
						<div class="col-sm-9">
							<input type="text" name="tahun_wali" class="form-control <?php echo ($error_tahun_wali !="" ? "is_invalid" : ""); ?>" 
                            id="tahun_wali" placeholder="Tahun Lahir wali" value="<?php echo $tahun_wali; ?>"><label>Contoh: 1980</label><span class="warning"><?php echo $error_tahun_wali; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="pendidikan_wali" class="col-sm-3 col-form-label">Pendidikan wali</label>
						<div class="col-sm-9">
							<input type="text" name="pendidikan_wali" class="form-control <?php echo ($error_pendidikan_wali !="" ? "is_invalid" : ""); ?>" 
                            id="pendidikan_wali" placeholder="Pendidikan wali" value="<?php echo $pendidikan_wali; ?>"><label>01=Tidak sekolah, 02=Putus SD, 03=SD Sederajat, 04=SMP Sederajat, 05=SMA Sederajat, 06=D1, 07=D2, 08=D3, 09=D4/S1, 10=S2, 11=S3</label><span class="warning"><?php echo $error_pendidikan_wali; ?></span>
						</div>
					</div>

					<div class="form-group row">
                        <label for="pekerjaan_wali" class="col-sm-3 col-form-label">Pekerjaan wali</label>
                        <div class="col-sm-9">
                            <input type="text" name="pekerjaan_wali" class="form-control <?php echo ($error_pekerjaan_wali !="" ? "is_invalid" : ""); ?>" 
                            id="pekerjaan_wali" placeholder="Pekerjaan wali" value="<?php echo $pekerjaan_wali; ?>"><label>01=Tidak bekerja, 02=Nelayan, 03=Petani, 04=Peternak, 05=PNS/TNI/POLRI, 06=Karyawan Swasta, 07=Pedagang Kecil, 08=Pedagang Besar, 09=Wiraswasta, 10=Wirausaha, 11=Buruh, 12=Pensiunan, 99=Lainnya</label><span class="warning"><?php echo $error_pekerjaan_wali; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="penghasilan_wali" class="col-sm-3 col-form-label">Penghasilan wali</label>
                        <div class="col-sm-9">
                            <input type="text" name="penghasilan_wali" class="form-control <?php echo ($error_penghasilan_wali !="" ? "is_invalid" : ""); ?>" 
                            id="penghasilan_wali" placeholder="Penghasilan wali" value="<?php echo $penghasilan_wali; ?>"><label>01=Kurang dari 500rb, 02=500rb-999.999, 03=1jt-1.999.999, 04=2jt-4.999.999, 05=5jt-20jt, 06=lebih dari 20 jt</label><span class="warning"><?php echo $error_penghasilan_wali; ?></span>
                        </div>
                    </div>

					<div class="form-group row">
						<div class="col-sm-9" align="center">
							<button name="submit" type="submit" class="btn btn-primary">Register</button>
						</div>					
					</div>
					<div class="form-group row">
						<div class="col-sm-9" align="center">
							<button onclick="location.href='cetakexcel.php';" id="cetakexcel" class="btn btn-danger"> Cetak sebagai Excel</button>
						</div>						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<br> 
</body>
</html>