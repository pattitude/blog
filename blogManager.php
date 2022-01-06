<?php
include "./includes/nav.php";
require_once "php/adminCrude.php";
require_once "php/fetchApi.php";

$pidd = $_SESSION['id'];
$name = $_SESSION['name'];
?>
<script src="assets/jquery.js" ></script>
<script>
    function del(id){
        if(confirm("Are You Sure You Want To Delete This Post?") == true){
        $.ajax({
            url: 'php/deleteApi.php',
            type: 'POST',
            data:{ bid: id},
            success: function(data){
                alert(data)
                location.reload()
            }
        })
    }
    }
</script>


  <main id="main" class="main">
      <?php
      $blogList = $get->allPostListerOnColumen('blogPost', 'posterId', $pidd);
      

      while($row = $blogList->fetch_assoc()){
          ?>
<div class="card mb-3">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['title'] ?></h5>
    <p class="card-text"><?php echo $row['content'] ?></p>
    <?php 
        $time = $get->time_elapsed_string($row['postedDate'])
    ?>
    <p class="card-text"><small class="text-muted"><?php echo $time ?></small></p>
    <p class="card-text"><small class="text-muted">Posted By; <?php echo $name ?></small></p>
    <button onclick="del('<?php echo $row['id'] ?>')" >Delete</button>
  </div>
</div>
          
          <?php
      }
      
      ?>




  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Changity</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://keneandigitaltechnology.com/">Kenean digital technology</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>