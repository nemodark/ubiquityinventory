<?php
include "../session.php";
$_SESSION['username'] = $username;
$_SESSION['userid'] = $userid; // Must be already set
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/soloubiq.ico" />
    <title>UGS Inventory</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <?php
      include "../connection/connection.php";
     ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home.php" class="site_title"><img src="images/soloubiq.png" WIDTH="40" HEIGHT="40"> <span>Ubiquity GS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <!-- /menu profile quick info -->


            <!-- sidebar menu -->
            <?php include "sidenav.php"; ?>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <?php
        include "nav.php";
        ?>

        <!-- page content -->
        <div class="right_col" role="main">

        <!-- Dynamic add -->
        <div id="addBadge" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Badge</h4>
      </div>
      <form role="form" name="syform" method="post" action="">
      <div class="modal-body">
          <a id="add_row" class="btn btn-default pull-left" >Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th>
              #
            </th>
            <th>
            Badge Serial Number
            </th>
            <th>
            Badge Status
            </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>
            1
            </td>
            <td>
            <input type="hidden" name="assetcateg[]" id="assetcateg" class="form-control">
            <input type="text" name='badgeserial[]' placeholder='Serial #' class="form-control" required/>
            </td>

            <td><select name="badgestat[]" class="form-control col-md-7 col-xs-12" required>
            <option value="1">Available</option>
            <option value="2">Active</option>
            <option value="3">Lost</option>
            <option value="4">Deleted</option>
            <option value="5">Disabled</option>
            </select>
            </td>
          </tr>
                    <tr id='addr1'></tr>
        </tbody>
      </table>

</div>
<div class="modal-footer">
        <button type="submit" class="btn btn-success" name="addbadgenow" style="margin-top:7px;"><i class="fa fa-check"></i> Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
        <?php include "badgequery.php"; ?>
</div>
</div>
</div>


          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>
                      Badge
                      <small>
                          Inventory
                      </small>
                  </h3>
              </div>
            </div>
            <div class="clearfix"></div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of all Badge</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="" style="color: black;"><i class="fa fa-plus" data-toggle="modal" data-target="#addBadge"> Add</i></a>
                      </li>
                      <li><a class="" style="color: black;"><i class="fa fa-pencil" id="editBtn"> Edit</i></a>
                      </li>
                      <li><a class="" style="color: black;"><i class="fa fa-trash" data-toggle="modal" data-target="#removeBadge"> Delete</i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="badges-table" class="table table-striped table-bordered">
                      <thead>
                        <tr>

                          <th>Badge ID</th>
                          <th>Date Added</th>
                          <th>Date Updated</th>
                          <th>Badge Serial Number</th>
                          <th>Badge Status</th>
                        </tr>
                      </thead>

                    </table>

  <!-- delete modal -->
  <div id="removeBadge" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Are you sure you want to permanently delete this record?</h4>
      </div>
<div class="modal-body">
<CENTER>
        <button class="btn btn-danger" id="removeBtn"><i class="fa fa-check"> </i> Yes</button>
        <button class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check"> </i> No</button>
        </CENTER>
        </div>
</div>
</div>
</div>
<!-- /delete modal -->

<!-- edit modal -->
  <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Badge Access</h4>
      </div>
<div class="modal-body">
                    <form class="form-horizontal form-label-left" method="post" novalidate>

                    <input type="hidden" name="badgestatusid" id="badgestatusid">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Badge Serial # <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="badgeserialedit" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Badge Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select id="badgestatusedit" class="form-control col-md-7 col-xs-12" required>
                            <?php

                              $badgestateditsql ="SELECT * FROM badgestatus";
                              $result = mysql_query($badgestateditsql);
                              while($row = mysql_fetch_array($result)){
                              extract($row);

                              echo "<option value=".$badgestatusid.">".ucfirst($badgestatusname)."</option>";
                            }
          
                            ?>
                      </select>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                          <input class="btn btn-success" id="editsubmitBTN" type="submit" value="Submit">
                          <button class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </form>
        </div>
</div>
</div>
</div>




                </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ©2016 All Rights Reserved.<a href="https://colorlib.com"> Ubiquity Global Services.</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>
    <script src="js/badge.js"></script>
    <script type="text/javascript">
      
    </script>

    <!-- /Datatables -->
  </body>
</html>