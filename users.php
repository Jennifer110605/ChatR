<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
    exit(); // Add an exit after header redirect to stop further execution
  }

  // Fetch user details
  $row = null; // Initialize $row to null
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
  if($sql && mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php if($row): // Check if $row is not null ?>
            <img src="php/images/<?php echo $row['img']; ?>" alt="">
            <div class="details">
              <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
              <p><?php echo $row['status']; ?></p>
            </div>
          <?php endif; ?>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $_SESSION['unique_id']; ?>" class="logout">Keluar</a>
      </header>
      <div class="search">
        <span class="text">Cari nama pengguna</span>
        <input type="text" placeholder="Masukkan nama untuk mencari...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
