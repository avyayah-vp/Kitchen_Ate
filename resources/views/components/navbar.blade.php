<!-- <nav class="navbar navbar-expand-lg" style="background-color: #FF6358;">
    <a class="navbar-brand" href="{{ url('/') }}" style="color: #FFFFFF;">Kitchen Ate</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('menu') }}" style="color: #FFFFFF;">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/offers" style="color: #FFFFFF;">Offers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cart') }}" style="color: #FFFFFF;">Cart</a>
            </li>
        </ul>
    </div>
</nav> -->
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            border-radius: 10px;
            padding: 0px 0px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }

        .navbar .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .navbar a:not(:first-child) {
                display: none;
            }

            .navbar a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .navbar.responsive {
                position: relative;
            }

            .navbar.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .navbar.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
</head>

<body>

    <div class="navbar" id="myNavbar">
        <a href="{{ route('menu') }}"><i class="fa fa-utensils"></i> Menu</a>
        <a href="/"><img src="{{ asset('assets/logo.jpg') }}" alt="Kitchen Ate" style="border-radius: 5%; padding: 0px; width: 5pc;"></a> <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myNavbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>

</body>

</html>