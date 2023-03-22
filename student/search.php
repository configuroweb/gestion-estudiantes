<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid'] == 0)) {
  header('location:logout.php');
} else {
  // Code for deletion
  if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = "delete from tblstudent where ID=:rid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':rid', $rid, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Datos eliminados correctamente');</script>";
    echo "<script>window.location.href = 'manage-students.php'</script>";
  }
?>

  <!-- partial:partials/_navbar.html -->
  <?php include_once('includes/header.php'); ?>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <?php include_once('includes/sidebar.php'); ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title"> Búsqueda de Estudiante </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Búsqueda de Estudiante</li>
            </ol>
          </nav>
        </div>
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form method="post">
                  <div class="form-group">
                    <strong>Búsqueda de Estudiante:</strong>

                    <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Búsqueda por id de estudiante">
                  </div>

                  <button type="submit" class="btn btn-primary" name="search" id="submit">Buscar</button>
                </form>
                <div class="d-sm-flex align-items-center mb-4">


                  <?php
                  if (isset($_POST['search'])) {

                    $sdata = $_POST['searchdata'];
                  ?>
                    <h4 align="center">Resultado según "<?php echo $sdata; ?>" palabra clave </h4>
                </div>
                <div class="table-responsive border rounded p-1">

                  <table class="table">
                    <thead>
                      <tr>
                        <th class="font-weight-bold">S.No</th>
                        <th class="font-weight-bold">ID de Estudiante</th>
                        <th class="font-weight-bold">Año Estudiante</th>
                        <th class="font-weight-bold">Nombre de Estudiante</th>
                        <th class="font-weight-bold">Correo de Estudiante</th>
                        <th class="font-weight-bold">Admissin Date</th>
                        <th class="font-weight-bold">Acción</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                      } else {
                        $pageno = 1;
                      }
                      // Formula for pagination
                      $no_of_records_per_page = 5;
                      $offset = ($pageno - 1) * $no_of_records_per_page;
                      $ret = "SELECT ID FROM tblstudent";
                      $query1 = $dbh->prepare($ret);
                      $query1->execute();
                      $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                      $total_rows = $query1->rowCount();
                      $total_pages = ceil($total_rows / $no_of_records_per_page);
                      $sql = "SELECT tblstudent.StuID,tblstudent.ID as sid,tblstudent.StudentName,tblstudent.StudentEmail,tblstudent.DateofAdmission,tblclass.ClassName,tblclass.Sección from tblstudent join tblclass on tblclass.ID=tblstudent.StudentClass where tblstudent.StuID like '$sdata%' LIMIT $offset, $no_of_records_per_page";
                      $query = $dbh->prepare($sql);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);

                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $row) {               ?>
                          <tr>

                            <td><?php echo htmlentities($cnt); ?></td>
                            <td><?php echo htmlentities($row->StuID); ?></td>
                            <td><?php echo htmlentities($row->ClassName); ?> <?php echo htmlentities($row->Sección); ?></td>
                            <td><?php echo htmlentities($row->StudentName); ?></td>
                            <td><?php echo htmlentities($row->StudentEmail); ?></td>
                            <td><?php echo htmlentities($row->DateofAdmission); ?></td>
                            <td>
                              <div><a href="edit-student-detail.php?editid=<?php echo htmlentities($row->sid); ?>"><i class="icon-eye"></i></a>
                                || <a href="manage-students.php?delid=<?php echo ($row->sid); ?>" onclick="return confirm('Deseas eliminar este registro?');"> <i class="icon-trash"></i></a></div>
                            </td>
                          </tr><?php
                                $cnt = $cnt + 1;
                              }
                            } else { ?>
                        <tr>
                          <td colspan="8"> Sin registros de búsqueda encontrados</td>

                        </tr>
                    <?php }
                          } ?>
                    </tbody>
                  </table>
                </div>
                <div align="left">
                  <ul class="pagination">
                    <li><a href="?pageno=1"><strong>First></strong></a></li>
                    <li class="<?php if ($pageno <= 1) {
                                  echo 'disabled';
                                } ?>">
                      <a href="<?php if ($pageno <= 1) {
                                  echo '#';
                                } else {
                                  echo "?pageno=" . ($pageno - 1);
                                } ?>"><strong style="padding-left: 10px">Anterior></strong></a>
                    </li>
                    <li class="<?php if ($pageno >= $total_pages) {
                                  echo 'disabled';
                                } ?>">
                      <a href="<?php if ($pageno >= $total_pages) {
                                  echo '#';
                                } else {
                                  echo "?pageno=" . ($pageno + 1);
                                } ?>"><strong style="padding-left: 10px">Siguiente></strong></a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Último</strong></a></li>
                  </ul>
                </div>
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
<?php }  ?>