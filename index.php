<?php
#-----------------------------------------------------------------------#
#                                                                       #
#       ________                                                        #
#     ___  __ \_____ ___      ________ _____  __ ___________      __    #
#     __  / / /  __ `/_ | /| / /_  __ `/_  / / / ___  __ \_ | /| / /    #
#     _  /_/ // /_/ /__ |/ |/ /_  /_/ /_  /_/ /____  /_/ /_ |/ |/ /     #
#     /_____/ \__,_/ ____/|__/ _\__, / _\__, /_(_)  .___/____/|__/      #
#                         /____/  /____/    /_/                         #
#                                                                       #
#    3/15/2017                                                          #
#    Checksum: c2071d260f20eb8e491bb1ad9f39a6b522995e83                 #
#                                                                       #
#-----------------------------------------------------------------------#

include('config.php');

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title><?php print($site_title); ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
      <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" rel="stylesheet">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="/assets/site.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
      <style>
         @import url(//fonts.googleapis.com/css?family=Lato:300|Josefin+Slab:300|Source+Sans+Pro:300);body{padding-top:70px;padding-bottom:70px}.ui.button.a:hover,.ui.buttons .button.a:hover{background-color:#1678c2;color:#fff;text-shadow:none}.finalbtn{margin-bottom:70px}.processor{display:block;margin:0 auto}
      </style>
      <script type="text/javascript">
         $(document).ajaxStart(function(){Pace.restart()}),$(document).ready(function(){var url='https://dawgy.pw/donate/error';function a(){$("#loading").show()}
         function b(a){$("#loading").hide(),$(".result").html(a)
         window.setTimeout(function(){window.location.replace(url)},2400)}
         function c(){$("#details").submit(function(){$(this).attr("action");return a(),$.ajax({url:"donate.php",type:"POST",data:{amount:$("#amount").val(),processor:$("input[name=processor]").val()},success:function(a){b(a)},error:function(a){b(a)}}),!1})}
         $("#paypal").click(function(){$("input[name=processor]").val("paypal")}),$("#other").click(function(){$("input[name=processor]").val("other")}),c()})
                  $( document ).ready(function() {
                  <?php
            if($_GET['amt']=='5') {
            $amount = '5';
            echo '$( "#amt" ).html("$5");';
            } else {
            if($_GET['amt']=='10') {
            $amount = '10';
            echo '$( "#amt" ).html("$10");';
            } else {
            if($_GET['amt']=='20') {
            $amount = '20';
            echo '$( "#amt" ).html("$20");';
            } else {
            if($_GET['amt']=='40') {
            $amount = '40';
            echo '$( "#amt" ).html("$40");';
            } else {
            $amount = '5';
            echo '$( "#amt" ).html("$5");';
            }
            }
            }
            }
            ?>
                  $("#1").click(function(){event.preventDefault();history.pushState(null,null,'?amt=5');$('input[name="amount"]').val('5');$("#amt").html('$5')});$("#2").click(function(){event.preventDefault();history.pushState(null,null,'?amt=10');$('input[name="amount"]').val('10');$("#amt").html('$10')});$("#3").click(function(){event.preventDefault();history.pushState(null,null,'?amt=20');$('input[name="amount"]').val('20');$("#amt").html('$20')});$("#4").click(function(){event.preventDefault();history.pushState(null,null,'?amt=40');$('input[name="amount"]').val('40');$("#amt").html('$40')})})
                        
         
               
      </script>
   </head>
   <body class="content">
      <div class="container">
         <div class="row">
            <div class="col-md-4 col-md-offset-4">
               <h1><?php print($header_title); ?></h1>
               <div class="result"></div>
               <div class="fluid basic ui message">
                  <?php print($thankyou); ?> <span class="pull-right" id="loading" style="visibility: hidden"><i class="fa fa-refresh fa-spin"></i></span>
               </div>
               <form id="details">
                  <div class="ui form">
                     <input type="hidden" id="amount" name="amount" value="<?php print($amount); ?>">
                     <div class="ui buttons fluid">
                        <button class="ui button a" id="1">$5</button>
                        <div class="or"></div>
                        <button class="ui button a" id="2">$10</button>
                        <div class="or"></div>
                        <button class="ui button a" id="3">$20</button>
                        <div class="or"></div>
                        <button class="ui button a" id="4">$40</button>
                     </div>
                     <div class="ui segment fluid" style="text-align: center;">
                        <h2 id="amt">$5</h2>
                     </div>
                     <div class="ui segment fluid">
                        <p style="text-align: center;">WE ACCEPT:</p>
                        <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppmcvdam.png" class="processor" alt="acceptedpayments">
                     </div>
                     <input type="hidden" value="" name="processor">
                     <button class="ui button standard finalbtn" id="paypal" style="margin-bottom: 12px;"><img src="assets/paypal.png" alt="PayPal" style="width: 23%;"></button>
                     <button class="ui button standard finalbtn" id="other"><img src="assets/btc.png" alt="Bitcoin" style="width: 21%;"></button>
                </div>
               </form>
            </div>
         </div>
      </div>
   </body>
