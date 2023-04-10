
<?php 

  include 'db_config.php';

  $title = "SELECT * FROM settings";
  $title_query = mysqli_query($conn, $title);

 ?>

<head>

  <?php foreach ($title_query as $row) { ?>

  <title><?php echo $row['username']; ?></title>

  <link rel="icon" href="<?php echo $row['icon']; ?>">

  <?php } ?>

  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

  <style type="text/css">
    
    @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

    body {
      background: linear-gradient(to right , #FB2576 , #3F0071 , #150050);
      font-family: 'Kanit', sans-serif;
    }

  </style>

</head>
<body>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <script>
    
      $(document).ready( function () {
          $('.table').DataTable();
      } );

  </script>

</body>