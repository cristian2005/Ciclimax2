  </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="<?php echo base_url();?>">
                  Ciclimax
                </a>
              </li>
            </ul>
          </nav>
       <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, hecho con <i class="material-icons">favorite</i> por estudiantes del itla.
      </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
     <!--   Core JS Files   -->
  <script src="<?php echo base_url();?>assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/js/plugins/moment.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url();?>assets/js/material-dashboard.js" type="text/javascript"></script>
</body>
<script type="text/javascript">
         $(document).ready(function(){
            $('.datetimepicker').datetimepicker();
         });
        </script>
</html>