<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>

  <style>
    .input-group {
      display: flex;
      flex-direction: row;
      margin: 25px 0;
      align-items: center;
    }

    .input-group label {
      display: flex;
      justify-content: space-between;
      min-width: 216px;
      margin-right: 4px;
    }
  </style>
</head>

<body>
  <h1>Form</h1>

  <form id="form-personal-data" method="GET">
    <div class="input-group">
      <label>Nama Lengkap <span>:</span></label>
      <input name="fullname" placeholder="Masukkan nama" type="text" required>
    </div>
    <div class="input-group">
      <label>Usia <span>:</span></label>
      <input name="age" placeholder="Masukkan umur" type="number" min="0" required>
    </div>
    <div class="input-group">
      <label>Email <span>:</span></label>
      <input name="email" placeholder="Masukkan email" type="email" required>
    </div>
    <div class="input-group">
      <label>Tanggal Lahir <span>:</span></label>
      <input name="birth_date" type="date" required>
    </div>
    <div class="input-group">
      <label>Jenis Kelamin <span>:</span></label>
      <!-- Untuk radio name dari input-input dengan type radio harus sama -->
      <input name="gender" value="Laki-laki" type="radio"><span>Laki-laki</span>
      <input name="gender" value="Perempuan" type="radio"><span>Perempuan</span>
    </div>
    <div class="input-group">
      <label>Bahasa yang dikuasai <span>:</span></label>
      <input name="prolang[]" value="Java" type="checkbox"><span>Java</span>
      <input name="prolang[]" value="Python" type="checkbox"><span>Python</span>
      <input name="prolang[]" value="HTML" type="checkbox"><span>HTML</span>
      <input name="prolang[]" value="CSS" type="checkbox"><span>CSS</span>
      <input name="prolang[]" value="JavaScript" type="checkbox"><span>JavaScript</span>
      <input name="prolang[]" value="PHP" type="checkbox"><span>PHP</span>
    </div>
    <div class="input-group">
      <button type="submit">Submit</button>
    </div>
  </form>

  <?php

  $fullname = "";
  $age = 0;
  $email = "";
  $birth_date = "";
  $gender = "";
  $languages = [];
  $show_personal_data = false;

  if (isset($_GET['fullname'])) {
    $fullname = $_GET['fullname'];
    $show_personal_data = true;
  }

  if (isset($_GET['age'])) {
    $age = $_GET['age'];
  }

  if (isset($_GET['email'])) {
    $email = $_GET['email'];
  }

  if (isset($_GET['birth_date'])) {
    $birth_date = $_GET['birth_date'];
  }

  if (isset($_GET['gender'])) {
    $gender = $_GET['gender'];
  }

  if (isset($_GET['prolang'])) {
    $languages = $_GET['prolang'];
  }

  if ($show_personal_data) {
    echo "Halo! Perkenalkan nama saya " . $fullname . ", saya berumur " . $age .
      " tahun, saya lahir pada tanggal " . $birth_date . ", saya berjenis kelamin " .
      $gender . " dan saat ini saya berhasil menguasai bahasa pemrogramman " . join(", ", $languages);
  }

  ?>
</body>

</html>