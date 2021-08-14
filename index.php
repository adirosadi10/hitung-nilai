<?php
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
  <link rel="stylesheet" href="index.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1>Form Laporan</h1>
    </div>

    <form action="action.php" method="post">
      <div class="row mb-3 pesan">
        <?php if (!empty($pesan)) { ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $pesan ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="">coach</label>
        </div>
        <div class="col-md-6">
          <select class="form-select" name="coach" id="coach">
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="">coachec</label>
        </div>
        <div class="col-md-6">
          <select class="form-select" name="coachec" id="coachec">
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="">tanggal</label>
        </div>
        <div class="col-md-6">
          <input type="date" name="tanggal" id="tanggal">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="">sesi</label>
        </div>
        <div class="col-md-6">
          <input type="number" name="sesi">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for=""> Komunikasi dan respon</label><br>
        </div>
        <div class="col-md-6">
          <input class="radio" type="radio" name="nilai1" id="nilai1" value="1"> 1
          <input class="radio" type="radio" name="nilai1" id="nilai1" value="2"> 2
          <input class="radio" type="radio" name="nilai1" id="nilai1" value="3"> 3
          <input class="radio" type="radio" name="nilai1" id="nilai1" value="4"> 4
          <input class="radio" type="radio" name="nilai1" id="nilai1" value="5"> 5
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="">Kehadiran</label><br>
        </div>
        <div class="col-md-6">
          <input class="radio" type="radio" name="nilai2" id="nilai2" value="1"> 1
          <input class="radio" type="radio" name="nilai2" id="nilai2" value="2"> 2
          <input class="radio" type="radio" name="nilai2" id="nilai2" value="3"> 3
          <input class="radio" type="radio" name="nilai2" id="nilai2" value="4"> 4
          <input class="radio" type="radio" name="nilai2" id="nilai2" value="5"> 5
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="">Keseriusan</label><br>
        </div>
        <div class="col-md-6">
          <input class="radio" type="radio" name="nilai3" id="nilai3" value="1"> 1
          <input class="radio" type="radio" name="nilai3" id="nilai3" value="2"> 2
          <input class="radio" type="radio" name="nilai3" id="nilai3" value="3"> 3
          <input class="radio" type="radio" name="nilai3" id="nilai3" value="4"> 4
          <input class="radio" type="radio" name="nilai3" id="nilai3" value="5"> 5
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="">Komitmen</label><br>
        </div>
        <div class="col-md-6">
          <input class="radio" type="radio" name="nilai4" id="nilai4" value="1"> 1
          <input class="radio" type="radio" name="nilai4" id="nilai4" value="2"> 2
          <input class="radio" type="radio" name="nilai4" id="nilai4" value="3"> 3
          <input class="radio" type="radio" name="nilai4" id="nilai4" value="4"> 4
          <input class="radio" type="radio" name="nilai4" id="nilai4" value="5"> 5
        </div>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary" type="submit" name="submit">Kirim</button>
      </div>
    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $.ajax({
        type: 'POST',
        url: 'get_coach.php',
        cache: 'false',
        success: function(msg) {
          $("#coach").html(msg)
        }
      })
      $("#coach").change(function() {
        var coach = $("#coach").val();
        $.ajax({
          type: 'POST',
          url: 'get_coachec.php',
          data: {
            coach: coach
          },
          cache: false,
          success: function(msg) {
            $("#coachec").html(msg);
          }
        })
      });
    });
  </script>
</body>

</html>