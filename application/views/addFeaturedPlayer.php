<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KPL | Admin | Add Featured Player </title>

    <!-- Bootstrap -->
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
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <a type="button" class="btn btn-default" href="<?php echo site_url().'featured-player' ?>"><i class="fa fa-chevron-left"></i> Back</a>
              </div>
              <?php
              if(!empty($this->session->flashdata("success")))
              {
                  echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>'.$this->session->flashdata("success").'</strong>
                  </div>';
              }
              if(!empty($this->session->flashdata("failure")))
              {
                  echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>'.$this->session->flashdata("success").'</strong>
                  </div>';
              }?>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>News Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="demo-form2" method="post" action="<?php echo site_url();?>saveFeaturedPlayer" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Player Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" name="name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Team Name
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="team" required="required" class="form-control col-md-7 col-xs-12" name="team">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="preview">Position
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="position" class="form-control col-md-7 col-xs-12" name="position">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Matches Played
                        <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" min="0" value="0" id="matches" required="required" class="form-control col-md-7 col-xs-12" name="matches">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video">Goals Scored
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" min="0" value="0" id="goals" class="form-control col-md-7 col-xs-12" name="goals">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video">Yellow Cards
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" min="0" value="0" id="yellow" class="form-control col-md-7 col-xs-12" name="yellow">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video">Red Cards
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" min="0" value="0" id="red" class="form-control col-md-7 col-xs-12" name="red">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Image<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="file" class="form-control col-md-7 col-xs-12" required="required" type="file" name="file">
                        </div>
                      </div>

                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                      
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
    
  </body>
</html>
