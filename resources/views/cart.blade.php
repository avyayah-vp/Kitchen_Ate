<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>

    </style>
</head>

<body>
    @include('components.navbar')
    <div class="container mt-5">
        <h1>Your Cart</h1>

        <!-- //cart is empty -->
        <div id="emptyCartMessage" class="mt-3" style="display: none;">
            <h4>Cart is empty</h4>
        </div>


        <div id="cartContainer">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Food Item</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr data-id="{{ $item->id }}">
                        <td>{{ $item->name }}</td>
                        <td><img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="width: 100px;"></td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                        <td>
                            <button class="btn btn-success">+</button>
                            <button class="btn btn-danger">-</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 class="mt-3">Total Price: ₹{{ number_format($totalPrice, 2) }}</h4>
            <button id="placeOrder" class="btn btn-primary mt-3">Place Order</button>
        </div>

    </div>
    @include('components.footer')

    <!-- Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="orderForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id='submitOrder' class='btn btn-primary'>Submit Order</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Add jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('.btn-success').on('click', function() {
            var foodItemId = $(this).closest('tr').data('id');
            $.ajax({
                url: '/cart/increment',
                type: 'POST',
                data: {
                    food_item_id: foodItemId
                },
                success: function(response) {
                    location.reload();
                }
            });
        });

        $('.btn-danger').on('click', function() {
            var foodItemId = $(this).closest('tr').data('id');
            $.ajax({
                url: '/cart/decrement',
                type: 'POST',
                data: {
                    food_item_id: foodItemId
                },
                success: function(response) {
                    location.reload();
                }
            });
        });

        $('#placeOrder').on('click', function() {
            $('#orderModal').modal('show');
        });

        $('#submitOrder').on('click', function() {
            var doc = new jsPDF();
            var y = 20;

            // Add a heading
            doc.setFontSize(22);
            doc.text("Kitchen Ate's Order", 10, y);
            y += 10;

            // Add customer details to the PDF
            var customerName = $('#name').val();
            var customerEmail = $('#email').val();
            var customerAddress = $('#address').val();
            var customerPhone = $('#phone').val();

            doc.setFontSize(12);
            doc.text('Customer Name: ' + customerName, 10, y + 10);
            doc.text('Customer Email: ' + customerEmail, 10, y + 20);
            doc.text('Customer Address: ' + customerAddress, 10, y + 30);
            doc.text('Customer Phone: ' + customerPhone, 10, y + 40);

            y += 50;

            // Add table headers
            doc.text('Item Name', 10, y);
            doc.text('Quantity', 60, y);
            doc.text('Price', 110, y);

            y += 10;

            $('tbody tr').each(function() {
                var name = $(this).find('td:nth-child(1)').text();
                var quantity = $(this).find('td:nth-child(3)').text();
                var price = $(this).find('td:nth-child(4)').text();

                doc.text(name, 10, y);
                doc.text(quantity, 60, y);
                doc.text(price, 110, y);

                y += 10;
            });

            var total = 'Total Price: ₹' + <?php echo number_format($totalPrice, 2); ?>;
            doc.text(total, 10, y);

            // Add a thank you message
            y += 20;
            doc.setFontSize(18);
            doc.text("*****Thank you for your order!*****", 10, y);

            doc.save('Order.pdf');

            // Empty the cart
            $.ajax({
                url: '/cart/empty',
                type: 'POST',
                success: function(response) {
                    location.reload();
                }
            });
        });

        function updateEmptyCartMessage() {
            var cartRows = $('tbody tr');
            var emptyCartMessage = $('#emptyCartMessage');
            var cartContainer = $('#cartContainer');

            if (cartRows.length === 0) {
                emptyCartMessage.show();
                cartContainer.hide(); // Hide the cart container
            } else {
                emptyCartMessage.hide();
                cartContainer.show(); // Show the cart container
            }
        }


        updateEmptyCartMessage();
    </script>




</body>

</html>