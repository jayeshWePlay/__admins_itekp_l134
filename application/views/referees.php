<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KPL | Admin | Referees </title>
    <?php $this->load->view('css'); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!-- menu profile quick info -->
            <?php $this->load->view('left-profile'); ?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php $this->load->view('sidebar'); ?>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <?php $this->load->view('top-bar'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Referees</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Referees</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="col-md-12 ">
                    <a class="btn btn-app col-md-2" href="<?php echo site_url();?>addReferee">
                      <i class="fa fa-plus"></i> Add New Referee
                    </a>
                  </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <table id="datatable-fixed-header" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>DOB</th>
                                  <th>Profile Pic</th>
                                  <th>Matches</th>
                                  <th>Difficulty</th>
                                  <th>Created at</th>
                                  <th>Updated at</th>
                                  <th width="80px;" class="no-sort">Action</th>
                                </tr>
                              </thead>

                            <tbody>
                                <?php if(!empty($referees)){
                                  
                                  foreach ($referees as $referee ) {
                                    $row = '';
                                    $row .= '<tr><td>'.$referee['ref_id'];
                                    $row .= '</td><td>'.$referee['ref_name'];
                                    $row .= '</td><td>'.$referee['ref_dob'];
                                    $row .= '</td><td>'.'<a style="color:blue;" href="'.$referee['ref_profile_pic'].'">Click here to see the Profile Pic</a>';
                                    $row .= '</td><td>'.$referee['ref_matches'];
                                    $row .= '</td><td>'.$referee['ref_difficulty_lvl'];
                                    $row .= '</td><td>'.$referee['created_at'];
                                    $row .= '</td><td>'.$referee['updated_at'].'</td>';
                                    $row .= '</td><td class="text-center"><a href="'.site_url().'editReferee/'.$referee["ref_id"].'"><span class="badge bg-blue"><i class="fa fa-edit"></i></span></a>&nbsp;&nbsp;&nbsp;<a data-toggle="modal" data-target="#delete'.$referee["ref_id"].'"><span class="badge bg-red"><i class="fa fa-remove"></i></span></a></td></tr>';
                                    $row .= '<div id="delete'.$referee["ref_id"].'" class="modal fade bs-example-modal-sm" tabindex="-1"    role="dialog" aria-hidden="true">
                                            <div class="modal-dialog ">
                                              <div class="modal-content">

                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                  </button>
                                                  <h4 class="modal-title" id="myModalLabel2">Delete</h4>
                                                </div>
                                                <div class="modal-body">
                                                  Are you sure you want to delete this record?
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                  <a href="'.site_url().'deleteReferee/'.$referee["ref_id"].'" class="btn btn-danger">Yes</a>
                                                </div>

                                              </div>
                                            </div>
                                          </div>';
                                    echo $row;
                                  }
                                }?>
                            </tbody>
                      
                          </table>
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
            KPL - Kothrud Premier League</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <?php $this->load->view('js'); ?>
    <script type="text/javascript">
      $('#datatable-fixed-header').DataTable({
          fixedHeader: true,
          responsive:true
        });
    </script>
  </body>
</html>
