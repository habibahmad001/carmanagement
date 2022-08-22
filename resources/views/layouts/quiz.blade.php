<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{{ asset('images/favicons.ico') }}}">
    <title>{{ @$sub_heading }}</title>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/front.js') }}" type="text/javascript"></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/style-new.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
</head>

<body>

    <div class="wrapper">
        <div class="menu-overlay"></div>

        <!-- Header Starts Here -->

        <header class="header-with-menu">
            <div class="container-fluid">
                <div class="logo">
                    <a href="{{ URL::to('/') }}"><img src="{{ asset('images/logo.png') }}" alt="Super Quiz logo"></a>
                </div>
                @if (Auth::check())
                <div class="menu right">
                    <div class="user-info left">
                        <p>Welcome back, <span class="user-name">{{Auth::user()->first_name}}.</span></p>
                    </div>
                    <div class="menu-icon right">
                        <a href="javascript:void(0);" class="toggle-btn"><img src="{{ asset('images/menu.png') }}" alt=""></a>


                    </div>
                    <div class="clearfix"></div>
                </div>
               @include ('partials.navigation')
                <div class="right-bar">
                    <div>
                        <div class="user-info left">
                            <p>Welcome back, <span class="user-name">{{Auth::user()->first_name}}.</span></p>
                        </div>
                        <div class="menu-icon right">
                            <a href="" class="toggle-btn"><img src="{{ asset('images/close-icon.png') }}" alt=""></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="right-bar-links">
                        <ul>

                        @if (Auth::check())
                                <li><a href="{{ URL::to('/ready-to-play') }}"><i class="fa fa-clipboard" aria-hidden="true"></i>Take Test</a></li>
                                <li><a href="{{ URL::to('/dashboard') }}"><i class="fa fa-trophy " aria-hidden="true"></i>Leaderboards</a></li>
                                <li><a href="{{ URL::to('/rules') }}"><i class="fa fa-check " aria-hidden="true"></i>Rules</a></li>
                                <li><a href="{{ URL::to('/score') }}"><i class="fa fa-star" aria-hidden="true"></i>Score</a></li>
                                <li><a href="{{ URL::to('/profile') }}"><i class="fa fa-user " aria-hidden="true"></i>My Profile</a></li>
                                <li><a href="{{ URL::to('/logout') }}"><i class="fa fa-power-off " aria-hidden="true"></i>Logout</a></li>
                            @else
                                <li><a href="{{ URL::to('/') }}">Login</a></li>
                            @endif
                            
                        </ul>
                    </div>
                </div>
                @endif
                <div class="clearfix"></div>
            </div>
        </header>

        <!-- Banner Starts Here -->
        @yield('content')

        <!-- Footer Starts Here -->

        <footer>
            <p class="copyrights">Copyright © 2018 SuperQuiz. All Rights Reserved.</p>
        </footer>
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

                          count = count - 1;
                            if (count <= 10) {
                                $(".questions-banner .timer").css("background-position", "center");
                            }
                            if (count <= 5) {
                                $(".questions-banner .timer").css("background-position", "right");
                            }
                            if (count <= 0) {
                                clearInterval(counter);
                                $("form#frm").submit();
                                // $(".questions").css("display","none");
                                return;
                            }
                                      $(".timer .seconds").text(count);
                        }

                    }

                , 3000 );

            <?php } else { 
         
                ?>
                    var counter=setInterval(timer, 1000);
                    function timer()
                    {

                      count = count - 1;
                        if (count <= 10) {
                            $(".questions-banner .timer").css("background-position", "center");
                        }
                        if (count <= 5) {
                            $(".questions-banner .timer").css("background-position", "right");
                        }
                        if (count <= 0) {
                            clearInterval(counter);
                            $("form#frm").submit();
                            // $(".questions").css("display","none");
                            return;
                        }
                      $(".timer .seconds").text(count);
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
                console.info("Ok");
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

        // function checkForm(form) {

        //     form.save.disabled = true;
        //     return true;
        //   }


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

