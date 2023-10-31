    <!DOCTYPE html>
    <html>

    <head>
        <title>Kitchen Ate - Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            /* body {
                font-family: Arial, sans-serif;
                background-color: #f3f3f3;
                margin: 0;
                padding: 0;
            } */

            .header {
                background-image: url('/assets/food/aloo-parantha.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                /* Adjust the height as needed */
                display: flex;
                justify-content: center;
                align-items: center;
                /* or any other value */
            }

            .search-bar {
                margin: 20px;
                text-align: center;
            }

            .container-h {
                background-color: rgba(255, 255, 255, 0.7);
                /* Transparent background */
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                margin: 20px;
                text-align: center;
                /* Center the content */
                font-family: cursive;
                /* Change the font to cursive */
                transition: transform 0.2s;
                /* Add a transition effect */
            }

            .container-h:hover {
                transform: translate(0, -5px);
                /* Move text up on hover */
            }
        </style>
    </head>

    <body>
        @include('components.navbar')
        <div class="header">
            <div class="container-h">

                <!-- Restaurant content goes here -->
                <h2>Welcome to Kitchen Ate</h2>
                <p>Discover our delicious menu and exciting offers.</p>
                <!-- You can add more content here -->
            </div>
        </div>
            @include('components.footer')
        <!-- Include the Bootstrap JavaScript library for dropdowns and other features -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    </body>

    </html>