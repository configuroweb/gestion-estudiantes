<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!--  <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="assets/images/faces/faviconconfiguroweb.png" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper"> -->
    <?php
    // $aid= $_SESSION['sturecmsaid'];
    // $sql="SELECT * from tbladmin where ID=:aid";

    // $query = $dbh -> prepare($sql);
    // $query->bindParam(':aid',$aid,PDO::PARAM_STR);
    // $query->execute();
    // $results=$query->fetchAll(PDO::FETCH_OBJ);

    // $cnt=1;
    // if($query->rowCount() > 0)
    // {
    // foreach($results as $row)
    // {               
    ?>
    <!--  <p class="profile-name"><?php // echo htmlentities($row->AdminName);
                                  ?></p>
                  <p class="designation"><?php  //echo htmlentities($row->Email);
                                          ?></p> --><?php ///$cnt=$cnt+1;}} 
                                                    ?>
    <!--     </div>
               
              </a>
            </li> -->

    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="icon-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>

      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-doc menu-icon"></i>
        <span class="menu-title">Noticia</span>

      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="manage-notice.php"> Gestionar Noticia </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth">
        <i class="icon-doc menu-icon"></i>
        <span class="menu-title">Noticias Públicas</span>
      </a>
      <div class="collapse" id="auth1">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="manage-public-notice.php">
              Gestionar Noticia Pública </a></li>
        </ul>
      </div>
      <!--   <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth">
               <i class="icon-docs menu-icon"></i>
                <span class="menu-title">Pages</span>
                
              </a>
              <div class="collapse" id="auth2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="about-us.php"> About Us </a></li>
                  <li class="nav-item"> <a class="nav-link" href="contact-us.php"> Contact Us </a></li>
                </ul>
              </div>
            </li> -->

    </li>
  </ul>
</nav>