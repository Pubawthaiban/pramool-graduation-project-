<?php session_start();  require_once 'connect.php';// เชื่อมต่อ desses ?>

       <!DOCTYPE html>
          <html lang="en">
          <head>
                  <meta charset="UTF-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
                  <title>Admin Setting</title>
                  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstraps.css">
                  <link rel="stylesheet" type="text/css" href="owl-carousel/owl.carousel.css">
                  <link rel="stylesheet" type="text/css" href="owl-carousel/owl.theme.css">
                  <link rel="stylesheet" type="text/css" href="StyleSheet/StyleCss.css">
                  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
                  <link rel="stylesheet" type="text/css" href="StyleSheet/jasny-bootstrap.min.css">
                  <!--<link rel="stylesheet" type="text/css" href="StyleSheet/jqm-demos.css">-->
                  <script src="jquery/external/jquery/jquery.js" type="text/javascript"></script>
                  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                  <script src="jquery/jasny-bootstrap.min.js" type="text/javascript"></script>
                  <script src="jquery/jquery.countdown.js" type="text/javascript"></script>
                  <script src="jquery/bootbox.min.js" type="text/javascript"></script>
                  <style type="text/css" media="screen">
                    .fontmenu{
                      font-size: 16px;
                    }
                  </style>

                  <script type="text/javascript">
                     $(document).ready(function(){
                          $(document).ajaxStart(function(){
                             $("#overlay,#load_show").fadeToggle('400')
                             $("body").css("overflow", "hidden");
                          });
                          $(document).ajaxComplete(function(){
                              $("#overlay,#load_show").fadeToggle('400');
                          });

                         /* $('[data-countdown]').each(function() {
                             var $this = $(this), finalDate = $(this).data('countdown');
                             $this.countdown(finalDate, function(event) {
                               $this.html(event.strftime('%D วัน %H:%M:%S'));
                             });
                           });*/

                      });
                  </script>

          </head>
            <body>
                  <nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation"> <!--สไลด้านข้าง-->
                      <div style="font-weight: bold;border-bottom: solid 1px #D4D4D4;border-width: 2px;width: 100%;height: 46px;font-family: Courier New, Courier, monospace;text-align: center;font-size: 34px">
                      <a href="admin_index.php" class="ahoe" style="text-decoration: none;">Admin Menu</a>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                      <li>
                        <a href="index.php"> 
                          <p class="fontmenu"><i class="fa fa-home fa-2x"></i> &nbsp;&nbsp;&nbsp; หน้าหลัก</p>
                        </a>
                      </li>
                       <li>
                        <a href="product_type.php"> 
                          <p class="fontmenu"><i class="fa fa-sliders fa-2x"></i> &nbsp;&nbsp;&nbsp; เเพิ่มประเภทสินค้า</p>
                        </a>
                      </li>
                      <!--<li>
                        <a href="product.php"> 
                          <p class="fontmenu"><i class="fa fa-gavel fa-2x"></i> &nbsp;&nbsp;&nbsp; เพิ่มสินค้าประมูล</p>
                        </a>
                      </li>-->
                      <!--<li><a href="#">Profile</a></li>
                      <li><a href="#">Disabled</a></li>-->
                    </ul>

                  </nav>

                  <div class="navbar navbar-default navbar-fixed-top" style="padding-left: 9px;">
                    <button type="button" class="btn btn-primary navbar-btn" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body" style="padding: 3px 3px 3px 3px; margin-top: 3px;">
                      <i class="fa fa-bars fa-2x"></i>
                    </button>

                  </div><!--ปุ่มกดสไล-->

                  <!--<div id="content" style="margin-top: 54px;"></div>-->

            </body>
          </html>