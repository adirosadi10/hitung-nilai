<?php
include 'koneksi.php';

echo "<option value=''>Pilih Coach</option>";

$query = "SELECT * FROM coach ORDER BY id ASC";
$coach = $conn->prepare($query);
$coach->execute();
$res = $coach->get_result();

while ($row = $res->fetch_assoc()) {
  echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
