    <script src="vendors/jquery/dist/jquery.min.js" charset="utf-8"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" charset="utf-8"></script>
    <?php if($page == "admin") { ?>
      <script>
        $(document).ready(function () {
          $.fn.datepicker.defaults.format = "yyyy-mm-dd";
          $('.datepicker').datepicker();
        });
      </script>
    <?php } ?>
  </body>
</html>
