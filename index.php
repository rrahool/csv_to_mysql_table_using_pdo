<?php  include('configPDO.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CSV Upload</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

</head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">

    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./index.php">CSV Upload</a>
              </li>  
            </ul>
          </div>
        </div>
      </div>
    </div>

<div class="jumbotron masthead">
  <div class="container">
    <p>CSV To MySQL Table Using PDO</p>
    <p>
      <a href="#fileupload" data-toggle="modal" class="btn btn-primary btn-large">Upload CSV</a>
    </p>
  </div>
</div>


<div class="container">

    <!-- Docs nav
    ================================================== -->

      <div class="span12">

        <!-- Server Stats
        ================================================== -->
        <section id="c1">
          <div class="page-header">
            <h1>Student Info</h1>
          </div>
          
<table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
            
                    <?php
                        if($_GET["data"]==112233)
                       {
                           echo "<div class='alert alert-success'>";
                               echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                               echo "Data Inserted Successfully.";
                           echo "</div>";
                       }

                       if($_GET["data"]==404)
                       {
                           echo "<div class='alert alert-block'>";
                               echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                               echo "<h4>Warning!</h4>";
                               echo "Data Not Inserted";
                           echo "</div>";
                       }

                        $STM = $dbh->prepare("SELECT `Name`, `Email` FROM `tbl_csv_upload`");

                        $STM->execute();

                        $STMrecords = $STM->fetchAll();

                        foreach($STMrecords as $column)
                            {

                                echo "<tr>";
                                    echo "<td>" . $column[0] . "</td>";
                                    echo "<td>" . $column[1] . "</td>";

                                echo"</tr>";

                            }

                    ?>

              </tbody>
            </table>
          
          
        </section>
        
 </div>
 </div>
 </div>

    <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
          <div id="fileupload" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 id="myModalLabel">Upload Data via CSV File</h3>
              </div>
              <div class="modal-body">
                  <form class="form-horizontal" method="post" action="Uploadmypdo.php" enctype="multipart/form-data">

                      <div class="control-group">
                          <label class="control-label" for="inputName">Save CSV File</label>
                          <div class="controls">
                              <input type="hidden" name="MAX_FILE_SIZE" value="9999999" />
                              <input class="btn btn-info" name="file" type="file" id="file" onchange="showCode()" onblur="showCode()" onclick="showCode()" required="required"  />
                          </div>
                      </div>
                      <div class="control-group">
                          <div class="controls">
                              <button type="submit" class="btn">Save CSV</button>
                          </div>
                      </div>

                  </form>

              </div>
          </div>
      </div>
    </footer>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>

    <script src="assets/js/holder/holder.js"></script>

    <script src="assets/js/application.js"></script>
    
	<script src="assets/js/jqBootstrapValidation.js"></script>

    <script>
      $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
    </script>


  </body>
</html>
