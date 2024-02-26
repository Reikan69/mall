<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url() ?>assets/build/images/favicon.ico" type="image/ico" />
    
   
    
    <title>CAR - <?= $title ?></title>

    <?php
   
  

   include_once $GLOBALS['server_project'] . '/assets/vendors/Added/header/h_all.php';
    include_once $GLOBALS['server_project'] . '/assets/vendors/Added/header/h_all_load.php';
    include_once $GLOBALS['server_project'] . '/assets/vendors/Added/header/h_all_insert.php';
    

    /*
    if (strpos($data, "insert") !== false) {
        include_once $GLOBALS['server_project'] . '/assets/vendors/Added/header/h_all_insert.php';
    }
    if (strpos($data, "load") !== false) {
        include_once $GLOBALS['server_project'] . '/assets/vendors/Added/header/h_all_load.php';
    }
    */
    ?>
    <!--  sweet alert  -->
    
    <link href="<?= $GLOBALS['assets'] ?>assets/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?= $GLOBALS['assets'] ?>assets/sweetalert2/dist/custom.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="<?= $GLOBALS['assets'] ?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?= $GLOBALS['assets'] ?>assets/vendors/Added/css/tambahan.css" rel="stylesheet">
    <style>
        
        .bigdrop {
            width: 600px !important;
        }

        .panel_toolbox {
            min-width: 0px;
        }

        .top_nav .navbar-right {width: 80%;} 
        .panel_toolbox {min-width: 5px;}

        .nav-sm span.fa, .nav-sm .menu_section h3 {
            display: inline-block;
            padding-left: 0px;
        }

        .panel_toolbox {
            min-width: 0px;
        }

        .navbar-nav .open .dropdown-menu.msg_list {
            width: 400px;
        }

        .nav-sm ul.nav.child_menu {
            width: 65px;
        }

        .nav-sm ul.nav.child_menu li {
            padding: 0px;
        }

        .top_nav .navbar-right {width: 80%;} 
        .panel_toolbox {min-width: 5px;}

        .page-title {
            height: 57px;
        }

        label {
            margin-top: 5px;
            margin-bottom: 0px;
        }

        .form-horizontal .control-label {
            padding-top: 0px;
        }

        tr.border_bottom td {
            border-bottom:1pt solid black;
        }

        .left_col, 
        .body,
        .right_col, 
        .main_container,
        .top_nav,
        .navbar
        {
            transition:
            width 0.45s,
            margin-left 0.45s,
            font-size 0.45s;
        }

        .scroll-horizon-li {
        }

        .div-info-scroll {
            height: 295px;
            overflow-y: scroll;
            overflow-x:hidden;
        }
        .widget_summary .w_right span {
            font-size: 15px;
        }
        .button-apps {
            background-color: #fafafa;
            color: #666;
            border: 1px solid #ddd;
            margin: 0px;
            text-align: center;
        }
        .btop{
                border-bottom: 2px solid #E6E9ED;
        }
        .bbot{
                padding: 1px 5px 6px;
                border-bottom: 2px solid #E6E9ED;
        }
        .text_center{
          text-align: center;
        }
       /* div.dt-buttons {
    position: relative;
    float: left;
}*/
    </style>
</head>

<body class="footer_fixed nav-md">
    <div class="container body">
        <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('core/') ?>" class="site_title"><i class="fa fa-recycle" aria-hidden="true"></i> <span>CAR</span></a>
             
            </div>
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">              
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $_SESSION[$GLOBALS['project'] . '-nama_karyawan'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <!-- save -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>CAR Menu</h3>
                <ul class="nav side-menu">
                  <?php if($this->priv=='0'||$this->priv =='1'){?>                      
                  <li><a href="<?php echo base_url('core/') ?>"><i class="fa fa-laptop"></i> Dashboard </a></li>
                  <?php }?>
                  <?php if($this->priv=='0'||$this->priv =='1'){?> 
                  <li><a><i class="fa fa-user-plus" aria-hidden="true"></i> Applicant <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('core/cardibuat/') ?>">CAR Dibuat</a></li>
                      <li><a href="<?php echo base_url('core/usersetting/') ?>">User Setting</a></li>
                    </ul>
                  </li>
                  <?php }?>
                  <?php if($this->priv=='0'||$this->priv =='1'){?>     
                  <li><a><i class="fa fa-users" aria-hidden="true"></i> PIC <span class="fa fa-chevron-down"></span><span class="label label-danger pull-right" id="notif_label"></span></a>
                    <ul class="nav child_menu">
                      <li><span class="label label-danger pull-right" id="notif_carnew"></span><a href="<?php echo base_url('core/carditerima/') ?>">CAR Diterima</a></li>
                      <li><a href="<?php echo base_url('core/usersetting/') ?>">User Setting</a></li>
                    </ul>
                  </li>
                  <?php }?>
                   <?php if($this->priv=='0'){?>
                   <li><a><i class="fa fa-thumbs-up" aria-hidden="true"></i> Validator <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      <li><a href="<?php echo base_url('core/carfinish/') ?>">Car Finish</a></li>
                      <li><a href="<?php echo base_url('core/usersetting/') ?>">User Setting</a></li>
                    </ul>
                  </li>
                <?php }?>
                 <?php if($this->priv =='3'){?>
                  <li><a href="<?php echo base_url('core/') ?>"><i class="fa fa-laptop"></i> Dashboard Validator</a></li>
                  <li><span class="label label-danger pull-right" id="notif_tracking"></span><a href="<?php echo base_url('core/carfinish/') ?>"><i class="fa fa-thumbs-up"></i> Vertification CAR</a></li>
                   <li><a href="<?php echo base_url('core/usersetting/') ?>"><i class="fa fa-user"></i> User Setting </a></li>
                     
                   
                  <?php }?>
                <?php if($this->priv=='0'){?>
                <li><a><i class="fa fa-user-secret" aria-hidden="true"></i> MR <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('core/carfinish/') ?>">Dashboard MR</a></li>
                      <li><a href="<?php echo base_url('core/car_tracked/') ?>">Tracked CAR</a></li>
                      <li><a href="<?php echo base_url('core/usersetting/') ?>">User Setting</a></li>
                    </ul>
                  </li> 
                <?php }?>
                  <?php if($this->priv =='2'){?>
                  <li><a href="<?php echo base_url('core/') ?>"><i class="fa fa-laptop"></i> Dashboard MR</a></li>
                  <li><span class="label label-danger pull-right" id="notif_tracking"></span><a href="<?php echo base_url('core/carfinish/') ?>"><i class="fa fa-list"></i> Vertification CAR</a></li>
                  <li><a href="<?php echo base_url('core/car_tracked/') ?>"><i class="fa fa-user"></i> Tracked CAR </a></li>
                   <li><a href="<?php echo base_url('core/usersetting/') ?>"><i class="fa fa-user"></i> User Setting </a></li>
                     
                   
                  <?php }?>
                  <?php if($this->priv=='0'){?>
                  <li><a><i class="fa fa-cogs" aria-hidden="true"></i> Admin <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('core/master/') ?>">Master Data</a></li>
                    </ul>
                  </li>  
                  <?php }?>       

                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

                <!-- top navigation -->
                <div class="top_nav navbar-fixed-top">
                    <div class="nav_menu" style="background-color: #EDEDED;">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>  
                            </div> 

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <!--<img src="<?= $GLOBALS['server'] ?>assets/production/images/img.jpg" alt="">-->
                                        <?php
                                        if($this->priv =='0'){
                                            $level = ' System Administrator';
                                        }elseif ($this->priv=='1'){
                                            $level = 'Applicant & PIC';
                                        }elseif ($this->priv=='2'){
                                            $level ='MR';
                                        }else{
                                            $level ='Validator';
                                        }
                                        ?>
                                        <img src="<?= $GLOBALS['server'] ?>assets/production/images/img.jpg" alt="">
                                        <?= $_SESSION[$GLOBALS['project'] . '-nama_karyawan']; ?>(-<?=$level?>)
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li>  <a href="<?= base_url('core/usersetting'); ?>"><i class="fa fa-sign-out pull-right"></i> Profile</a></li>
                                        <li>  <a href="<?= base_url('login/log_out'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>
                                <?php if ($this->priv =='1'||$this->priv =='2'||$this->priv =='3'){?>
                                <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <?php
                                    $i = 0;
                                    if (isset($notif)) {
                                        foreach ($notif as $ntf) {
                                            $i = $i + 1;
                                        }
                                    }
                                    $i = ($i == 0) ? "" : $i;
                                    ?>
                                    <span class="badge bg-red"><?= $i ?></span>
                                </a>
                               
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <?php
                                    if (isset($notif)) {
                                        foreach ($notif as $notif) {
                                            ?>
                                            <li>
                                             <?php 
                                                if ($this->priv=='1'){
                                                    $redirect1 = base_url('core/cekbuat/' . $notif->id_car_header) .'/2';
                                                    $redirect2 = base_url('core/carditerima'); 
                                                    
                                                }elseif ($this->priv=='2'){
                                                    $redirect1 = base_url('core/carfinish?set=2'); 
                                                    $redirect2 = base_url('core/carfinish?set=2'); 
                                                    
                                                }else{
                                                    $redirect1 = base_url('core/carfinish'); 
                                                    $redirect2 = base_url('core/carfinish'); 
                                                   
                                                }

                                                ?>
                                                <a href="<?=$redirect1?>">
                                                    <span>
                                                        <span><b><?= $notif->no_car ?></b></span>
                                                    </span>
                                                    <span class="message">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="text-align:right; vertical-align: top;">Tanggal</td>
                                                                    <td style="text-align:right; vertical-align: top;">:</td>
                                                                    <td><?= $notif->tanggal_buat ?></td>
                                                                </tr>
                                                              <!--   <tr>
                                                                    <td style="text-align:right; vertical-align: top;">Reason</td>
                                                                    <td style="text-align:right; vertical-align: top;">:</td>
                                                                    <td><code><?= $notif->nama_department ?></code></td>
                                                                </tr> -->
                                                            </tbody>
                                                        </table>
                                                    </span>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        
                                        <li>
                                            <div class="text-center">
                                                <a href="<?=$redirect2?>">
                                                    <strong>See All  Vertification CAR</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                          
                            </li>  
                            <?php }?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->
                <div class="page-title"></div>
                <!-- page content -->
                <div class="right_col" role="main" style="min-height: 300px;">
                    <div id="page-content">
                        <?php include_once $page; ?>
                    </div>
                    <br> &nbsp;
                    <br> &nbsp;
                    <br> &nbsp;
                    <br> &nbsp;
                    <br> &nbsp;
                </div>
                <!-- /page content -->
                <div class="modal fade" id="add" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered">   
                        <div class="modal-content">
                            <div class="modal-body" id="modal-body"></div>
                        </div>
                    </div>
                </div>
                 <div class="modal fade bd-example-modal-sm" id="edit" role="dialog">
                    <div class="modal-dialog modal-md modal-dialog-centered">   
                        <div class="modal-content">
                            <div class="modal-body" id="modal-body"></div>
                        </div>
                    </div>
                </div>
                <!--footer content--> 
                <footer>
                    <div class="pull-right" id="div-footer">
                        Copyright &copy; 2020 IT System - Pura Indostamping
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!--/footer content--> 
            </div>
        </div>
    
    <?php  
    include_once $GLOBALS['server_project'] . '/assets/vendors/Added/footer/f_all.php';
      include_once $GLOBALS['server_project'] . '/assets/vendors/Added/footer/f_all_insert.php';
        include_once $GLOBALS['server_project'] . '/assets/vendors/Added/footer/f_all_load.php';

        include_once 'layout/footer/f_insert_report.php';
       /* include_once $GLOBALS['server_project'] . '/assets/vendors/Added/footer/f_all.php';
        include_once $GLOBALS['server_project'] . '/assets/vendors/Added/footer/f_all_insert.php';
        include_once $GLOBALS['server_project'] . '/assets/vendors/Added/footer/f_all_load.php';

        include_once 'layout/footer/f_insert_report.php';*/
        /*if (strpos($data, "dashboard") !== false) {
            include_once 'layout/footer/f_dashboard.php';
        }*/
        /*
        if (strpos($data, "insert") !== false) 
        {
            include_once $GLOBALS['server_project'] . '/assets/vendors/Added/footer/f_all_insert.php';
        }
        if (strpos($data, "load") !== false) 
        {
            include_once $GLOBALS['server_project'] . '/assets/vendors/Added/footer/f_all_load.php';
        }
       
        if (strpos($data, "formula") !== false) {
            include_once 'layout/footer/f_insert_formula.php';
        }
        if (strpos($data, "dashboard") !== false) {
            include_once 'layout/footer/f_dashboard.php';
        }
        if (strpos($data, "report") !== false) {
            include_once 'layout/footer/f_insert_report.php';
        }
        if (strpos($data, "calc") !== false) {
            include_once 'layout/footer/f_load_reportCalc.php';
        }
        if (strpos($data, "kpp") !== false) {
            include_once 'layout/footer/f_insert_kpp.php';
        }
        */        
        ?>


        <!-- Custom Theme Scripts   -->
        <script src="<?= $GLOBALS['assets'] ?>assets/build/js/custom.min.js"></script>  
       
        <script src="<?= $GLOBALS['assets'] ?>assets/sweetalert2/dist/sweetalert2.min.js"></script>

        <!-- <script src="<?=  $GLOBALS['assets']  ?>build/js/custom.min.js"></script> -->

        <!-- Custom Theme Scripts 
        <script src="<?= base_url() ?>assets/build/js/custom.min.js"></script>-->

        <script type="text/javascript">
            $(document).on('focusin','.datepicker',function(e) {
        
                $( "#datepicker2" ).datepicker({format:"yyyy-mm-dd"});
           });
        
        </script> 
        <script type="text/javascript">
            $(document).on('focusin','.datepicker',function(e) {
        
                $( "#timepick" ).datepicker({format:"yyyy-mm-dd"});
           });
        
        </script> 
       
      <!--   <script src="<?= $GLOBALS['assets'] ?>assets/vendors/nicEdit/nicEdit.js"></script>
        
        <script type="text/javascript">
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>
        <script type="text/javascript">
           $(document).on('focusin','.selectmultiple',function(e) {
                $("#select2").select2();
            });
           
        </script> -->
        <script>
    // AUTO REFRESH NOTIFICATION
    var timeOutR = 0;
    var timeOutA = 0;
    var timeOutT = 0;
   
    var cekidot = function () {
        var link = baseurl + 'core/cek_newcar/';
        $.ajax({
            url: link,
            success: function () {
                $("#notif_label").empty();
                $('#notif_label').append('new');
                timeOutR = setTimeout(cek_newcar, 100000);
            }
        });
    }
    var cek_newcar = function () {
        var link = baseurl + 'core/cek_newcar/';
        $.ajax({
            url: link,
            success: function (result) {
                $("#notif_carnew").empty();
                $('#notif_carnew').append(result);
                timeOutR = setTimeout(cek_newcar, 100000);
            }
        });
    }

    var cek_approval = function () {
        var link = baseurl + 'form/cek_approval/';
        $.ajax({
            url: link,
            success: function (result) {
                $("#notif_approve").empty();
                $('#notif_approve').append(result);
                timeOutA = setTimeout(cek_approval, 100000);
            }
        });
    }
    
    var cek_tracking = function () {
        var link = baseurl + 'core/cek_tracking/';
        $.ajax({
            url: link,
            success: function (result) {
                $("#notif_tracking").empty();
                $('#notif_tracking').append(result);
                //timeOutT = setTimeout(cek_tracking, 100000);
}
});
    }
    cekidot();
    cek_newcar();
    cek_approval();
    cek_tracking();
</script>
        <script type="text/javascript">
            $('#history').DataTable();
            $('#hisprog').DataTable();
            $('#korektif').DataTable({
                "searching": false,
                "ordering": false
            });
            $('#koreksi').DataTable({
                "searching": false,
                "ordering": false
            });
             $('#getTracked').DataTable({
                 dom: "Blfrtip",
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excel",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm",
                        customize: function(win)
                        {
                            var last = null;
                            var current = null;
                            var bod = [];
             
                            var css = '@page { size: landscape; }',
                                head = win.document.head || win.document.getElementsByTagName('head')[0],
                                style = win.document.createElement('style');
                            style.type = 'text/css';
                            style.media = 'print';
             
                            if (style.styleSheet)
                            {
                              style.styleSheet.cssText = css;
                            }
                            else
                            {
                              style.appendChild(win.document.createTextNode(css));
                            }
             
                            head.appendChild(style);
                        }
                    },
                ],
                responsive: true,             
                "info":     false,
                "paging":     false,
                "info":     false,
                "ordering": false,
                "searching": false,
                fixedHeader: true
            });
            
           

        </script>
        <!-- SweetAlert -->
        
        <!-- Update/Insert Function Alert -->
        <script>
            //update success
        <?php if ($this->session->flashdata('update_berhasil')): ?>
                Swal.fire({
                  title: 'Congratulation',
                  text: 'Data berhasil diperbarui...',
                  icon: 'success',
                  showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
                })
        <?php endif; ?>
         //update gagal
        <?php if ($this->session->flashdata('update_gagal')): ?>
           
               Swal.fire({
              title: 'Data gagal diperbarui',
              text: 'Please try again...',
              icon: 'error',
              showClass: {
                popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
              }
            })
           
        <?php endif; ?>
         //insert success
        <?php if ($this->session->flashdata('insert_success')): ?>
                Swal.fire({
                  title: 'Congratulation',
                  text: 'Data berhasil diperbarui...',
                  icon: 'success',
                  showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
                })
        <?php endif; ?>
         //insert gagal
        <?php if ($this->session->flashdata('insert_gagal')): ?>
            
               Swal.fire({
              title: 'Data gagal disimpan',
              text: 'Please try again...',
              icon: 'error',
              showClass: {
                popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
              }
            })
           
        <?php endif; ?>
         //delete success
         <?php if ($this->session->flashdata('delete_success')): ?>
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })

                Toast.fire({
                  icon: 'success',
                  title: 'Data berhasil dihapus'
                })
            
        <?php endif; ?>
         //delete gagal
        <?php if ($this->session->flashdata('delete_gagal')): ?>
            
               Swal.fire({
              title: 'Data gagal dihapus',
              text: 'Please try again...',
              icon: 'error',
              showClass: {
                popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
              }
            })
           
        <?php endif; ?>
        <?php if ($this->session->flashdata('tanggal_gagal')): ?>
            
               Swal.fire({
              title: 'Data gagal disimpan',
              text: 'Tanggal permintaan lebih besar dari batas penyelesaian',
              icon: 'error',
              showClass: {
                popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
              }
            })
           
        <?php endif; ?>
         
    </script>
   
    <!-- End SweetAlert -->

<script type="text/javascript">
  <?php 
  foreach($jsonCar1 as $djson1){
            $tgl1[] = $djson1->month;
            $open1[] = $djson1->open;
            $close1[] = $djson1->close;
        }
  ?>
  var ctx = document.getElementById('chartdibuat').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?=json_encode($tgl1)?>,
        datasets: [{
            label: 'OPEN',
            data: <?=json_encode($open1)?>,
            fill: false,
             borderWidth :false,
            backgroundColor:  'rgba(30, 255, 132, 0.6)',
            borderColor: [
                
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ]
          },
            {
            label: 'CLOSE',
            data: <?=json_encode($close1)?>,
            fill: false,
             borderWidth : false,
            backgroundColor: 'rgba(255, 99, 132, 0.6)',
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ]
           
        }]
    },
    options: {
      responsive: true,
      title: {
        display: false,
        text: 'DATA CAR'
      },
      tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
      scales: {
        xAxes: [{
          display: true,
        }],
        yAxes: [{
          ticks: {
              beginAtZero:true
            },
          scaleLabel: {
              display: true,
              labelString: 'Total'
            },
          display: true
        
        }]
      }
    }
});
   <?php 
  foreach($jsonCar2 as $djson2){
            $tgl2[] = $djson2->month;
            $open2[] = $djson2->open;
            $close2[] = $djson2->close;
        }
  ?>
   var ctx = document.getElementById('chartditerima').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?=json_encode($tgl2)?>,
        datasets: [{
            label: 'OPEN',
            data: <?=json_encode($open2)?>,
            fill: false,
             borderWidth :false,
            backgroundColor:  'rgba(30, 255, 132, 0.6)',
            borderColor: [
                
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ]
          },
            {
            label: 'CLOSE',
            data: <?=json_encode($close2)?>,
            fill: false,
             borderWidth : false,
            backgroundColor: 'rgba(255, 99, 132, 0.6)',
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ]
           
        }]
    },
    options: {
      responsive: true,
      title: {
        display: false,
        text: 'DATA CAR'
      },
      tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
      scales: {
        xAxes: [{
          display: true,
        }],
        yAxes: [{
          ticks: {
              beginAtZero:true
            },
          scaleLabel: {
              display: true,
              labelString: 'Total'
            },
          display: true
        
        }]
      }
    }
});
</script>
    </body>
    </html>