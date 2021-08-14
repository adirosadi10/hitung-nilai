<?php
include 'koneksi.php';
// $koneksi = mysqli_connect("localhost", "root", "", "korpora");
$coach = $_POST['coach'];

echo "<option value=''>Pilih Coachec</option>";
$query = "SELECT * FROM coachec WHERE id_coach = $coach ORDER BY id ASC";
$coach = $conn->prepare($query);
// $coach->bind_param('id_coach', $coach);
$coach->execute();
$res = $coach->get_result();

while ($row = $res->fetch_assoc()) {
  echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
}
// $query = mysqli_query($conn, "SELECT * FROM coachec WHERE id_coach = '$coach' ORDER BY id ASC");
// // $coachec = $conn->prepare($query);
// // // $coachec->bind_param("i", $coach);
// // $coachec->execute();
// // $res = $coachec->get_result();

// while ($row = mysqli_fetch_array($query)) {
//   echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
// }
