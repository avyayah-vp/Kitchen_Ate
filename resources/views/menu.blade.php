<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .category-title {
            border-bottom: 1px solid black;
            margin-bottom: 20px;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            border-radius: 20px 20px 0 0;
        }

        .card-title {
            font-weight: bold;
        }

        .text-muted {
            color: #ff0000 !important;
        }


        .search-bar {
            margin: 20px;
            text-align: center;
        }

        .card-img-top {
            transition: transform .6s;
            /* Animation */
        }

        .card-img-top:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="fixed-top">
        @include('components.navbar')
    </div>

    <div class="search-bar">
        <input type="text" id="search" class="form-control" placeholder="Search for food...">
    </div>
    <!-- toast -->
    <div class="toast" id="cart-toast" style="position: fixed; top: 0; right: 0;" data-bs-delay="2000" data-bs-autohide="true">
        <div class="toast-header">
            <strong class="me-auto">Cart Update</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            Item added to cart successfully!
        </div>
    </div>


    <div class="container mt-5">
        @foreach($categories->groupBy('category') as $category => $dishes)
        <div class="category-section">
            <h2 class="category-title mb-3">{{ $category }}</h2>
            <div class="row">
                @foreach($dishes as $dish)
                <div class="col-md-4 mb-4 dish-card" data-name="{{ strtolower($dish->name) }}">
                    <div class="card">
                        <img src="{{ asset($dish->image) }}" class="card-img-top" alt="{{ $dish->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <p class="card-text">{{ $dish->description }}</p>
                            <h6 class="text-muted">Price: ₹{{ number_format($dish->price, 2) }}</h6>
                            <button class="btn btn-primary add-to-cart" data-id="{{ $dish->id }}">Add to Tray</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Add jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Search functionality -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val().toLowerCase();
                $('.category-section').each(function() {
                    var hasVisibleDishes = false;
                    $(this).find('.dish-card').each(function() {
                        var dishName = $(this).data('name');
                        if (dishName.indexOf(query) !== -1) {
                            $(this).show();
                            hasVisibleDishes = true;
                        } else {
                            $(this).hide();
                        }
                    });
                    if (hasVisibleDishes) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            var toastEl = document.getElementById('cart-toast');
            var toast = new bootstrap.Toast(toastEl);

            $('.add-to-cart').on('click', function() {
                var foodItemId = $(this).data('id');
                $.ajax({
                    url: '/cart/add',
                    type: 'POST',
                    data: {
                        food_item_id: foodItemId
                    },
                    success: function(response) {
                        toast.show();
                    }
                });
            });
        });

        //cart
    </script>

</body>

</html>