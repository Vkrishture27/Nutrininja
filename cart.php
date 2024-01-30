<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4caf50;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
        }

        .cart-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            padding: 15px;
            background-color: #fff;
            color: #333;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>Shopping Cart</h2>

    <?php
    // Initialize or retrieve cart data from a session
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Function to add an item to the cart
    function addToCart($item) {
        $_SESSION['cart'][] = $item;
        echo "<p class='cart-item'>$item added to cart!</p>";
    }

    // Check if a food item is added to the cart
    if (isset($_POST['addToCart'])) {
        $foodItem = $_POST['addToCart'];
        addToCart($foodItem);
    }

    // Display the items in the cart
    if (!empty($_SESSION['cart'])) {
        echo "<h2>Your Cart</h2>";
        foreach ($_SESSION['cart'] as $item) {
            echo "<p class='cart-item'>$item</p>";
        }
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>

    <button onclick="placeOrder()">Place Order</button>

    <script>
        function placeOrder() {
            // You can implement order placement logic here
            alert("Order placed successfully!");
        }
    </script>

</body>
</html>
