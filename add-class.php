<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $cname = $_POST['cname'];
    $section = $_POST['section'];
    $sql = "insert into tblclass(ClassName,Sección)values(:cname,:section)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':cname', $cname, PDO::PARAM_STR);
    $query->bindParam(':section', $section, PDO::PARAM_STR);
    $query->execute();
    $LastInsertId = $dbh->lastInsertId();
    if ($LastInsertId > 0) {
      echo '<script>alert("Año ha sido agregado correctamente")</script>';
      echo "<script>window.location.href ='add-class.php'</script>";
    } else {
      echo '<script>alert("Algo salió mal, favor re inténtalo de nuevo")</script>';
    }
  }
?>

  <?php include_once('includes/header.php'); ?>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <?php include_once('includes/sidebar.php'); ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title"> Agregar Año </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Agregar Año</li>
            </ol>
          </nav>
        </div>
        <div class="row">

          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">

                <form class="forms-sample" method="post">

                  <div class="form-group">
                    <label for="exampleInputName1">Nombre de Año</label>
                    <input type="text" name="cname" value="" class="form-control" required='true'>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">Sección</label>
                    <select name="section" class="form-control" required='true'>
                      <option value="">Escoge Sección</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                      <option value="F">F</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <?php include_once('includes/footer.php'); ?>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
<?php }  ?>