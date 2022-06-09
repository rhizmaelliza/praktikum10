<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Id');
$sheet->setCellValue('B1', 'Tanggal');
$sheet->setCellValue('C1', 'Jenis Pendaftaran');
$sheet->setCellValue('D1', 'Tanggal Masuk Sekolah');
$sheet->setCellValue('E1', 'NIS');
$sheet->setCellValue('F1', 'Nomor Peserta Ujian');
$sheet->setCellValue('G1', 'Pernah PAUD');
$sheet->setCellValue('H1', 'Pernah TK');
$sheet->setCellValue('I1', 'SKHUN');
$sheet->setCellValue('J1', 'Ijazah');
$sheet->setCellValue('K1', 'Nama');
$sheet->setCellValue('L1', 'Jenis Kelamin');
$sheet->setCellValue('M1', 'NISN');
$sheet->setCellValue('N1', 'NIK');
$sheet->setCellValue('O1', 'Tempat Lahir');
$sheet->setCellValue('P1', 'Tanggal Lahir');
$sheet->setCellValue('Q1', 'Agama');
$sheet->setCellValue('R1', 'Alamat');
$sheet->setCellValue('S1', 'RT');
$sheet->setCellValue('T1', 'RW');
$sheet->setCellValue('U1', 'Desa');
$sheet->setCellValue('V1', 'Kecamatan');
$sheet->setCellValue('W1', 'Kode Pos');
$sheet->setCellValue('X1', 'Tempat Tinggal');
$sheet->setCellValue('Y1', 'Transportasi');
$sheet->setCellValue('Z1', 'No.HP');
$sheet->setCellValue('AA1', 'Email');
$sheet->setCellValue('AB1', 'Kewarganegaraan');
$sheet->setCellValue('AC1', 'Nama Wali');
$sheet->setCellValue('AD2', 'Hubungan dengan Wali');
$sheet->setCellValue('AE1', 'Tahun Wali');
$sheet->setCellValue('AF1', 'Pendidikan Wali');
$sheet->setCellValue('AG1', 'Pekerjaan Wali');
$sheet->setCellValue('AH1', 'Penghasilan Wali');


$query = mysqli_query($koneksi, "select * from tb_siswa");
$i = 2;
$id = 1;
while($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i,$id++);
	$sheet->setCellValue('B'.$i, $row['Tanggal']);
	$sheet->setCellValue('C'.$i, $row['Jenis Pendaftaran']);
	$sheet->setCellValue('D'.$i, $row['Tanggal Masuk Sekolah']);
	$sheet->setCellValue('E'.$i, $row['NIS']);
	$sheet->setCellValue('F'.$i, $row['Nomor Peserta Ujian']);
	$sheet->setCellValue('G'.$i, $row['Pernah PAUD']);
	$sheet->setCellValue('H'.$i, $row['Pernah TK']);
	$sheet->setCellValue('I'.$i, $row['SKHUN']);
	$sheet->setCellValue('J'.$i, $row['Ijazah']);
	$sheet->setCellValue('K'.$i, $row['Nama']);
	$sheet->setCellValue('L'.$i, $row['Jenis Kelamin']);
	$sheet->setCellValue('M'.$i, $row['NISN']);
	$sheet->setCellValue('N'.$i, $row['NIK']);
	$sheet->setCellValue('O'.$i, $row['Tempat Lahir']);
	$sheet->setCellValue('P'.$i, $row['Tanggal Lahir']);
	$sheet->setCellValue('Q'.$i, $row['Agama']);
	$sheet->setCellValue('R'.$i, $row['Alamat']);
	$sheet->setCellValue('S'.$i, $row['RT']);
	$sheet->setCellValue('T'.$i, $row['RW']);
	$sheet->setCellValue('U'.$i, $row['Desa']);
	$sheet->setCellValue('V'.$i, $row['Kecamatan']);
	$sheet->setCellValue('W'.$i, $row['Kode Pos']);
	$sheet->setCellValue('X'.$i, $row['Tempat Tinggal']);
	$sheet->setCellValue('Y'.$i, $row['Transportasi']);
	$sheet->setCellValue('Z'.$i, $row['No.HP']);
	$sheet->setCellValue('AA1'.$i, $row['Email']);
	$sheet->setCellValue('AB1'.$i, $row['Kewarganegaraan']);
	$sheet->setCellValue('AC1'.$i, $row['Nama Wali']);
	$sheet->setCellValue('AD2'.$i, $row['Hubungan dengan Wali']);
	$sheet->setCellValue('AE1'.$i, $row['Tahun Wali']);
	$sheet->setCellValue('AF1'.$i, $row['Pendidikan Wali']);
	$sheet->setCellValue('AG1'.$i, $row['Pekerjaan Wali']);
	$sheet->setCellValue('AH1'.$i, $row['Penghasilan Wali']);
	$i++;		
}

$styleArray = [
	'borders' => [
		'allBorders' => [
			'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		],
	],
];

$i = $i - 1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);


$writer = new Xlsx($spreadsheet);
$writer->save('reportdatasiswa.xlsx');
?>