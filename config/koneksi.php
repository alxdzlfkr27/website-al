<?php 
session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'websmp';


$conn = mysqli_connect($host,$user,$pass,$db);
if(!$conn){

    print_r(mysqli_connect_error($conn));
    exit;
}

$url = 'http://localhost/websmpissud';

function tglIndo($tanggal, $format = 'd F Y') {
    // Daftar nama bulan dalam bahasa Indonesia
    $bulanIndonesia = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    // Ubah tanggal ke format Unix timestamp
    $timestamp = strtotime($tanggal);
    
    // Format tanggal sesuai dengan parameter
    $day = date('d', $timestamp); // Ambil hari
    $month = date('n', $timestamp); // Ambil bulan
    $year = date('Y', $timestamp); // Ambil tahun

    // Susun kembali tanggal dalam format Indonesia
    $tanggalIndonesia = $day . ' ' . $bulanIndonesia[$month] . ' ' . $year;

    return $tanggalIndonesia;
}