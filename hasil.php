<?php
include "koneksi.php";

$query = "SELECT nilai.*, coach.name,coachec.nama FROM nilai JOIN coach ON coach.id=nilai.id_coach JOIN coachec ON coachec.id=nilai.id_coachec ORDER BY nilai.id DESC";
$coach = $conn->prepare($query) or die(mysqli_error($conn));
$coach->execute();
$res = $coach->get_result();
if (isset($_GET['pesan'])) {
  $pesan = "<p>{$_GET['pesan']}</p>";
} else {
  $pesan = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="header mt-5">
      <h1>Laporan tes</h1>
    </div>

    <div>
      <a class="btn btn-primary" href="index.php">tambah</a>
    </div>
    <div class="row mb-3 pesan">
      <?php if (!empty($pesan)) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong><?php echo $pesan ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>
    </div>
    <table class="table">
      <tr>
        <th>no</th>
        <th>coach</th>
        <th>coachec</th>
        <th>tanggal</th>
        <th>sesi</th>
        <th>nilai1</th>
        <th>nilai2</th>
        <th>nilai3</th>
        <th>nilai4</th>
        <th>rata-rata</th>
        <th>status</th>
      </tr>

      <?php
      $tanggal = date('d-m-Y');
      $no = 1;
      while ($row = $res->fetch_assoc()) { ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['nama'] ?></td>
          <td><?= $row['tanggal'] ?></td>
          <td><?= $row['sesi'] ?></td>
          <td><?= $row['nilai1'] ?></td>
          <td><?= $row['nilai2'] ?></td>
          <td><?= $row['nilai3'] ?></td>
          <td><?= $row['nilai4'] ?></td>
          <td><?= $row['nilaiAkhir'] ?></td>
          <td>
            <?php if ($row['nilaiAkhir'] < 2) {
              echo "Tidak lulus";
            } else if ($row['nilaiAkhir'] > 4) {
              echo "Lulus";
            } else {
              echo " Butuh pendamping";
            } ?>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>