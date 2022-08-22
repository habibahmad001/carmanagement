<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Super Quiz</title>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link href="{{ asset('css/style-front.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- Font  -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
            <!-- Header Starts Here  -->
            <header>
                <div class="logo left">
                    <a href="{{ URL::to('/') }}"><img src="{{ asset('images/logo-red.png') }}" alt="Super Quiz Logo"></a>
                </div>
                <div class="menu right">
                    <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"><img src="{{ asset('images/menu-icon.png') }}" alt=""></a>
                            <ul class="dropdown-menu popover">
                            @if (Auth::check())
                                <li><a href="{{ URL::to('/UserQuestion') }}">Take Test</a></li>
                                <li><a href="{{ URL::to('/logout') }}">Logout</a></li>
                            @else
                                <li><a href="{{ URL::to('/login') }}">Login</a></li>
                                <li><a href="{{ URL::to('/register') }}">Registered</a></li>
                            @endif
                            </ul>
                        </div>
                </div>
                <div class="bars @if($_SERVER['REQUEST_URI'] == '/Dashboard')right @else left @endif">
                    <div class="bars-outer">
                        <div class="bars-inner-block  ">
                            <div class="user-progress ">
                                <div class="progress first-progress">
                                    <div class="border-img">
                                        <img src="images/border-img.png" alt="">
                                    </div>
                                    <div id="first_progress" class="progress-bar progress-bar-striped" role="progressbar" style="width: 66%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    <span class="percent">66%</span>
                                </div>
                                <div class="user">
                                    <a href=""><span class="user-profile-picture"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="user-notifications">99</span></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="bars-inner-block ">
                            <div class="points ">
                                <div class="border-img">
                                    <img src="images/border-img.png" alt="">
                                </div>
                                <span class="star"><i class="fa fa-star fa-2x" aria-hidden="true"></i></span>
                                <span class="percent">{{ $totalpoints }} Points</span>
                            </div>
                        </div>
                        <div class="bars-inner-block  ">
                            <div class="super-points ">
                                <div class="border-img">
                                    <img src="images/border-img.png" alt="">
                                </div>
                                <span class="star"><i class="fa fa-star fa-2x" aria-hidden="true"></i></span>
                                <span class="percent">{{ $superpoints }} Super Points</span>
                            </div>
                        </div>
                        <div class="bars-inner-block user-activity-outer ">
                            <div class="user-activity ">
                                <div class="border-img">
                                    <img src="images/border-img.png" alt="">
                                </div>
                                <span class="flame"><img src="images/flame.png" alt=""></span>
                                <span class="percent">{{ $nodays }} Days</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </header>
            <!-- Header Ends Here  -->
            <!-- Banner Starts Here  -->
            @yield('content')
            <!-- Banner Ends Here  -->
            <!-- Content Starts Here  -->
            <div class="content">
                <div class="container">
                    <div class="rules">
                        <h2 class="title">The Rules</h2>
                        <div class="row">
                            <div class="col-md-4 ">
                                <p><span>1 )&nbsp;&nbsp;&nbsp;</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                            </div>
                            <div class="col-md-4 ">
                                <p><span>2 )&nbsp;&nbsp;&nbsp;</span>Commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla <strong>pariatur</strong>. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id.</p>
                            </div>
                            <div class="col-md-4 ">
                                <p><span>3 )&nbsp;&nbsp;&nbsp;</span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt <strong>explicabo</strong>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Ends Here  -->
            <!-- Footer Starts Here  -->
            <footer>
                <div class="container">
                    <div class="social">
                        <ul>
                            <li>
                                <a href="">
                                <span>
                                <i class="fa fa-instagram fa-lg " aria-hidden="true"></i>
                                </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                <span>
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                <span>
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="copyrights-and-sponsor">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Copyright © 2017 SuperQuiz. All Rights Reserved.</p>
                            </div>
                            <div class="col-md-4">
                                <div class="brought-by">
                                    <p>Brought to you by the creator of the original</p>
                                    <img src="images/super-quiz-logo-ftr.png" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p class="design-by">A Niagara Website Design by Future Access Inc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer Ends Here  -->
        </div>
        @if(empty($QuestionMsg))

        <script>
        
        $(document).ready(function(){

            var count=20;
            <?php if(isset($_REQUEST["q"])) {?>

                window.setTimeout( function(){
                        $(".banner .answer-status").css("display","none");

                        var counter=setInterval(timer, 1000);
                        function timer()
                        {

                          count=count-1;
                          if (count <= 0)
                          {
                             clearInterval(counter);
                                $("form#frm").submit();
                             return;
                          }
                          $(".timer .timer-clock .seconds").text(count);
                        }

                    }

                , 3000 );

            <?php } else { 
         
                ?>
                    var counter=setInterval(timer, 1000);
                    function timer()
                    {

                      count=count-1;
                      if (count <= 0)
                      {
                         clearInterval(counter);
                            $("form#frm").submit();
                         return;
                      }
                      $(".timer .timer-clock .seconds").text(count);
                    }    
            <?php } ?>

        });
        </script>
        @endif

        <script type="text/javascript">
        $(document).ready(function(){

            if (window.performance) {
                    console.info("window.performance work's fine on this browser");

             }
            if (performance.navigation.type== 1) {
            
            }else{
            <?php if(isset($_REQUEST["q"])) { ?>
            var answerCheck={{ $istrue }};

            $(".banner .answer-status").css("display","block");
            if( answerCheck==0 ){
                $(".answer-status .wrong-answer").css("display","block");
                $(".answer-status .wrong-answer").toggleClass("wrong-animation");
                
            }
            else {
                $(".answer-status .correct-answer").css("display","block");
                $(".answer-status .correct-answer").toggleClass("correct-animation");
            }
            <?php } ?>
        }

            window.setTimeout( function(){
              $(".banner .answer-status").css("display","none");          
            }, 3000 );
            @if(!empty($QuestionMsg))
            jQuery("div.timer").html("<div class='stop-style'>STOP</div>");
            @endif

            if(jQuery("input").length > 0)
              {
                jQuery("input").attr("autocomplete", "off");  
              }
        }); 

          function searchonkeypress(indata)
          { 
                if(indata == "")
                {
                    indata = "<>";
                }
               $.get('/usersearch/' + indata, function(data){
                    jQuery("#tbl1").html('');
                    jQuery("#tbl1").html(data.html);
               });     
          }

          function searchonkeypressall(indata)
          { 
            if(indata == "")
            {
                indata = "<>";
            }  
              $.get('/usersearchall/' + indata, function(data){
                    jQuery("#tbl2").html('');
                    jQuery("#tbl2").html(data.html);
               });
          }
   
        </script>
    </body>
</html>

