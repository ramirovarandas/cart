<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cart</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    </head>
    <body class="container">
        <div class="m-2" id="products">
            <h4>Products</h4>
            <div class="row">
                <div class="col">
                    Macbook Pro 2019
                </div>
                <div class="col">
                    $899
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="qty" value="1">
                </div>
                <div class="col">
                    <a class="btn btn-primary" data-name="Macbook Pro 2019" data-price="899.0" data-sku="100" href="#">Add to cart</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Macbook Air 2022
                </div>
                <div class="col">
                    $999
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="qty" value="1">
                </div>
                <div class="col">
                    <a class="btn btn-primary" data-name="Macbook Air 2022" data-price="999.0" data-sku="200" href="#">Add to cart</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    iPhone 13
                </div>
                <div class="col">
                    $599
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="qty" value="1">
                </div>
                <div class="col">
                    <a class="btn btn-primary" data-name="iPhone 13" data-price="599.0" data-sku="300" href="#">Add to cart</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Dell Monitor 23
                </div>
                <div class="col">
                    $299
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="qty" value="1">
                </div>
                <div class="col">
                    <a class="btn btn-primary" data-name="Dell Monitor 23" data-price="299.0" data-sku="400" href="#">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="m-2">
            <h4>Cart</h4>
            <div id="message_cart" class="d-none">
                <div class="alert alert-danger" role="alert">
                    Unable to process your cart request. Try again.
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Items: <span id="cart_qty">0</span>
                </div>
                <div class="col">
                    Total: <span id="cart_total">0.0</span>
                </div>
            </div>
        </div>
        <div class="m-2">
            <h4>Checkout</h4>
            <div id="message_checkout_success" class="d-none">
                <div class="alert alert-success" role="alert">
                    Thank you for placing your order.
                </div>
            </div>
            <div id="message_checkout_error" class="d-none">
                <div class="alert alert-danger" role="alert">
                    Unable to process your order request. Try again.
                </div>
            </div>
            <form class="row g-3" method="POST" id="checkout">
                <div class="col-md-4">
                    <label for="first_name" class="form-label">First name</label>
                    <input type="text" class="form-control" id="first_name"  name="first_name" value="Jane">
                </div>
                <div class="col-md-4">
                    <label for="last_name" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="Doe">
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="jane.doe@example.com">
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">Full address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Street, city, state and zip" value="1234 Main St, 7B - New York - NY - 10018">
                </div>

                <div class="col-md-4">
                    <label for="cc_name" class="form-label">Name on the credit card</label>
                    <input type="text" class="form-control" id="cc_name" name="cc_name" value="Jane Doe">
                </div>
                <div class="col-md-4">
                    <label for="cc_number" class="form-label">Credit card number</label>
                    <input type="text" class="form-control" id="cc_number" name="cc_number" value="4007000000027">
                </div>
                <div class="col-md-2">
                    <label for="cc_expiracy" class="form-label">Expiracy date</label>
                    <input type="text" class="form-control" id="cc_expiracy" name="cc_expiracy" value="12/29">
                </div>
                <div class="col-md-2">
                    <label for="cc_cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="cc_cvv" name="cc_cvv" value="123">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary" id="btnOrder">Place order</button>
                </div>
            </form>
        </div>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            var uuid = self.crypto.randomUUID();

            $('#products div div a').on('click', function(e) {
                var elem = e.currentTarget;
                var self = $(this);
                e.preventDefault();

                $.ajax({
                    url: '/api/cart',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        name: elem.dataset.name,
                        price: elem.dataset.price,
                        sku: elem.dataset.sku,
                        quantity: self.parent().prev().find('input').first().val(),
                        external_id: uuid
                    }
                }).done(function(resp) {
                    $('#cart_qty').html(resp.data.items.length);
                    $('#cart_total').html(resp.data.total);
                }).fail(function(xhr, resp) {
                    var message = $('#message_cart');

                    message.removeClass('d-none');

                    setTimeout(function() {
                        message.addClass('d-none');
                    }, 5000);
                });
            });

            $('#btnOrder').on('click', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/api/checkout',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        first_name: $('#first_name').val(),
                        last_name: $('#last_name').val(),
                        email: $('#email').val(),
                        address: $('#address').val(),
                        cc_name: $('#cc_name').val(),
                        cc_number: $('#cc_number').val(),
                        cc_expiracy: $('#cc_expiracy').val(),
                        cc_cvv: $('#cc_cvv').val(),
                        external_id: uuid
                    }
                }).done(function(resp) {
                    var message = $('#message_checkout_success');

                    message.removeClass('d-none');

                    setTimeout(function() {
                        message.addClass('d-none');
                    }, 5000);
                }).fail(function(xhr, resp) {
                    var message = $('#message_checkout_error');

                    message.removeClass('d-none');

                    setTimeout(function() {
                        message.addClass('d-none');
                    }, 5000);
                });

            });
        });
        </script>
    </body>
</html>
