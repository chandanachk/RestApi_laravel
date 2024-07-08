<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form Sample IndexedDB</title>
</head>
<body>
    <h1>Order Form Sample IndexedDB</h1>
    <form id="orderForm" action="{{ route('form.submit') }}" method="POST">
        @csrf
        <label for="name">Customer Name:</label><br>
        <input type="text" id="customer_name" name="customer_namee"><br><br>
        <label for="order_value">Order Value:</label><br>
        <input type="text" id="order_value" name="order_value"><br><br>
        <label for="Date">Date:</label><br>
        <input type="text" id="order_date" name="order_date"><br><br>
        <button type="submit">Submit</button>
    </form>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>