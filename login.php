<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("Location: users.php");
    exit(); // Pastikan untuk menghentikan eksekusi lebih lanjut setelah header redirect
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Realtime ChatR</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Masukkan email anda" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Masukkan password anda" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Mulai Obrolan">
        </div>
      </form>
      <div class="link">Belum Mendaftar? <a href="index.php">Daftar Sekarang</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>
</body>
</html>
