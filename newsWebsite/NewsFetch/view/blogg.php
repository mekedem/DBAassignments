<!DOCTYPE html>
<html>

<head>
    <title>MyPersonalWeb</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
       <link href="css/blg.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="boot/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="boot/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="boot/css/font-awesome.min.css">
</head>
<body>
    <section>
        <div id="over">
            <div id="info">
                <h1>My News Website</h1>
                <p>This website fetchs news from manchester united football club official 
                   website. so all the news is updated (added) every day. all reds transfer 
                   talks, player resignation and loan, the squad and formation for the game,
                   the coaching stuff and manchester united legends, match results and scores
                   are covered in the page enjoy.  
                </p>
            </div>
        </div>
    </section>
    <header>
        <nav>
            <table>
                <th>
                    <td><a id="logo" href="#"><img src="images/c.png"></a><td>
                    <td class="hv"><a href="index.html"></a></td>
                </th>
            </table>
        </nav>
    </header>
    <div id="notes">
        <div id="dh3">
        <h3 style="color:white; font-size:2em">here is latest news from the football(soccer) world</h3>
        </div>
        <div id="message" class="jumbotron"></div>
<!--============================================================================================================-->
         <aside class="col-xs-6 col-sm-6 col-md-6 col-lg-2 col-xl-2 tm-aside-r">

                        <div class="tm-aside-container" id="rh3">
                            <h3 class="tm-gold-text tm-title">
                                recent posts
                            </h3>  
                            <hr class="tm-margin-t-small"> 
                            <div id="recentmessage" class="tm-content-box tm-margin-t-small">
                                
                            </div>
                            <hr class="tm-margin-t-small">
                                  
                        </div>
                        
                        
                    </aside>
                    <div>
                        <br> 
                        </div>
    </div>
        <!-- </br> -->
        <!--======================================================================================================-->
<!--                         <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 tm-aside-r">

                        <div class="tm-aside-container">
                            <h3 class="tm-gold-text tm-title">
                                recent posts
                            </h3>  
                            <hr class="tm-margin-t-small"> 
                            <div id="recentmessage" class="tm-content-box tm-margin-t-small">
                                
                            </div>
                            <hr class="tm-margin-t-small">
                                  
                        </div>
                        
                        
                    </aside>
                    <div>
                        <br> 
                        </div> -->
       <!--=================================================================================================================-->
       <!--  </br>
        </br>
        </br>  -->
            <!--==========================================================================================================-->
<!--                         <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">   
                        <div class="row tm-margin-t-big">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">

                                <div class="tm-content-box">
                                    <img src="images/fbe.jpg" alt="Image" class="tm-margin-b-30 img-fluid">
                                    <h4 class="tm-margin-b-20 tm-gold-text">FACEBOOK</h4>
                                    <p class="tm-margin-b-20">Follow me on facebook mekedemgetaneh @facebook and my page mk@facebook</p>
                                       
                                </div>  

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">

                                <div class="tm-content-box">
                                    <img src="images/tblack.jpg" alt="Image" class="tm-margin-b-30 img-fluid">
                                    <h4 class="tm-margin-b-20 tm-gold-text">TWITTER</h4>
                                    <p class="tm-margin-b-20">Follow me on twitter mekedemgetaneh @twitter and comment #!!@mk follow follow</p>
                                      
                                </div>  

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">

                                <div class="tm-content-box">
                                    <img src="images/f.jpg" alt="Image" class="tm-margin-b-30 img-fluid">
                                    <h4 class="tm-margin-b-20 tm-gold-text">Contact and Address</h4>
                                    <p class="tm-margin-b-20">contact Number: +251933
address: AAIT, AddisAbaba, Ethiopia.....
       E-mail:mekedemgetaneh@gmail.com</p>
                                    
                                </div>  

                            </div>    
                        </div>
                        
                    </div> -->
                    <!--=========================================================================================================-->
    <!-- </div> -->

    <footer>
        <table>
            <th>
                <td>by MekedemGetaneh All rights reserved &copy 2018 </td>
            </th>
        </table>
    </footer>

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>

<script type="text/javascript">

$(document).ready(function () {
                $.ajax({
                    url: '../controller/retrieve.php',
                    method: 'GET',
                    success: function (response) {
                        if(response == ""){
                            $("#message").html(response);
                        }
                        else{
                            $("#message").html(response);  
                        }                       
                    }
            });
             $.ajax({
                    url: '../controller/recentretrive.php',
                    method: 'GET',
                    success: function (response) {
                        if(response == ""){
                            console.log(response);
                            $("#recentmessage").html(response);
                        }
                        else{
                            console.log(response);
                            $("#recentmessage").html(response);  
                        }                       
                    }
            });
    });

</script>

</body>

</html>