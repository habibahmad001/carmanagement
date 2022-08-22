<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{{ asset('images/favicons.ico') }}}">
    <title>Reset Password</title>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/style-new.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/front.js') }}" type="text/javascript"></script>
</head>

<body>

    <div class="wrapper">
        <!-- Header Starts Here -->

        <header>
            <div class="container-fluid">
                <div class="logo-txt">
                    <a href="/">Cars Management</a>
                </div>

            </div>
        </header>
        <section class="menu-section">
            <ul class="menu-ul">
                @if(Auth::user())
                    @if(Auth::user()->user_type == "employee")
                        <li><a href="/employee_listing/">Cars Listing Page</a></li>
                        <li><a href="/logout/">Logout</a></li>
                    @elseif(Auth::user()->user_type == "employer")
                        <li><a href="/employer_listing/">Cars Listing Page</a></li>
                        <li><a href="/create_job/">Create New Job</a></li>
                        <li><a href="/logout/">Logout</a></li>
                    @endif
                @else
                    <li><a href="/">Home</a></li>
                    <li><a href="/jobs/">Cars</a></li>
                    <li><a href="/contactus/">Contact us</a></li>
                @endif

            </ul>
        </section>

        <!-- Banner Starts Here -->
        @yield('content')




        <!-- Footer Starts Here -->

        <footer>
            <p class="copyrights">Copyright © 2022 Cars Management. All Rights Reserved.</p>
        </footer>
    </div>


    <script>
        // $('document').ready(function() {
        //     $("a").click(function(event) {
        //         event.preventDefault();
        //     });
        // });
    </script>
</body>

</html>
