<?php include("header.php");

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>My Cart</h1>
            </div>

            <div class="col-lg-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Serial NO</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                // Remove the currency symbol and convert to a numeric value
                                $numeric_price = (int) filter_var($value['Price'], FILTER_SANITIZE_NUMBER_INT);
                                $total += $numeric_price;
                                echo "
                                <tr>
                                    <td>" . ($key + 1) . "</td>
                                    <td>" . htmlspecialchars($value['Item_Name']) . "</td>
                                    <td>Rs " . htmlspecialchars($numeric_price) . "</td>
                                    <td><input class='text-center' type='number' value='" . htmlspecialchars($value['Quantity']) . "' min='1' max='10'></td>
                                    <td>
                                        <form action='managecart.php' method='post'>
                                            <button name='Remove_Item' class='btn btn-outline-danger btn-sm'>Remove</button>
                                            <input type='hidden' name='Item_Name' value='" . htmlspecialchars($value['Item_Name']) . "'>
                                        </form>
                                    </td>
                                </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3">
                <div class="border rounded bg-light p-4">
                    <h3>Total:</h3>
                    <h5 class="text-right">Rs <?php echo htmlspecialchars($total); ?></h5>
                    <form action="">
                        <button class="btn btn-primary btn-block">Make Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
