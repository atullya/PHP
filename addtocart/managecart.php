<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Add_to_Cart'])) {
        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'Item_Name');
            if (in_array($_POST['Item_name'], $myitems)) {
                echo "
                <script>
                alert('Item already added');
                window.location.href = 'index.php';
                </script>";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_Name' => $_POST['Item_name'], 'Price' => $_POST['price'], 'Quantity' => 1);
                echo "
                <script>
                alert('Item added to cart');
                window.location.href = 'index.php';
                </script>";
            }
        } else {
            $_SESSION['cart'][0] = array('Item_Name' => $_POST['Item_name'], 'Price' => $_POST['price'], 'Quantity' => 1);
            echo "
            <script>
            alert('Cart initialized with first item');
            window.location.href = 'index.php';
            </script>";
        }
    }

    if (isset($_POST['Remove_Item'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_Name'] == $_POST['Item_Name']) {
                unset($_SESSION['cart'][$key]); // Remove the item from the session
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Reorder the array indices
                echo "
                <script>
                alert('Item deleted successfully');
                window.location.href = 'mycart.php';
                </script>";
                break; // Stop looping after the item is found and removed
            }
        }
    }
}
?>
