<?php
// $conn = new mysqli("localhost", "root", "", "korpora");
include('koneksi.php');
// $id = '';
if (!isset($_POST['submit'])) {
  header("Location: index.php");
}
if (!empty($_POST['coach'])) {
  $coach = $_POST['coach'];
  $coachec = $_POST['coachec'];
  $tanggal = $_POST['tanggal'];
  $tgl = date("Y-m-d", strtotime($tanggal));
  $sesi = $_POST['sesi'];
  $nilai1 = $_POST['nilai1'];
  $nilai2 = $_POST['nilai2'];
  $nilai3 = $_POST['nilai3'];
  $nilai4 = $_POST['nilai4'];
  $total = $nilai1 + $nilai2 + $nilai3 + $nilai4;

  $rata = $total / 4;
  $rata9 = "INSERT INTO nilai VALUES ('',$coach,$coachec,$tgl,$sesi,$nilai1,$nilai2,$nilai3,$nilai4,$rata)";

  $c = mysqli_query($conn, $rata9) or die(mysqli_error($conn));

  if ($c) {
    $pesan = urlencode("Data berhasil disimpan");
    header("Location: hasil.php?pesan={$pesan}");
  } else {
    echo mysqli_error($conn);
  }
} else {
  $pesan = urlencode("Data belum lengkap");

  header("Location: index.php?pesan={$pesan}");
}


// $simpan = "INSERT INTO hasil (id,id_coach,id_coachec,tanggal,sesi,nilai1,nilai2,nilai3,nilai4,nilaiAkhir) VALUES ($id,$coach,$coachec,$tanggal,$sesi,$nilai1,$nilai2,$nilai3,$nilai4,$rata)";
// $coach = $conn->prepare($simpan) or die('gagal');
// $coach->bind_param('id', $id);
// $coach->bind_param('id_coach', $coach);
// $coach->bind_param('id_coachec', $coachec);
// $coach->bind_param('tanggal' , $tanggal);
// $coach->bind_param('sesi' , $sesi);
// $coach->bind_param('nilai1' , $nilai1);
// $coach->bind_param('nilai2' , $nilai2);
// $coach->bind_param('nilai3', $nilai3);
// $coach->bind_param('nilai4' , $nilai4);
// $coach->bind_param('rata' , $rata);
// $coach->execute();
// $res = $coach->get_result();
// $simpan = "INSERT INTO hasil (id,id_coach,id_coachec,tanggal,sesi,nilai1,nilai2,nilai3,nilai4,nilaiAkhir) VALUES ($id,$id_coach,$id_coachec,:tanggal,:sesi,:nilai1,:nilai2,:nilai3,:nilai4,:rata)"
