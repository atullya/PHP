<?php
include("header.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php  
print_r($_SESSION['cart'])
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <form action="managecart.php"  method="POST">
                    <div class="card" style="width: 18rem;">
                        
                        <img src="images/img1.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Item 1</h5>
                            <p class="card-text">Rs 450</p>
                            <button type="submit" name="Add_to_Cart"  class="btn btn-info">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="item1">
                            <input type="hidden" name="price" value="Rs450">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-3">
                <form action="managecart.php" method="POST">
                    <div class="card" style="width: 18rem;">
                        
                        <img src="images/img2.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Item 2</h5>
                            <p class="card-text">Rs 550</p>
                            <button type="submit" name="Add_to_Cart"  class="btn btn-info">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="item2">
                            <input type="hidden" name="price" value="Rs550">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-3">
                <form action="managecart.php"  method="POST">
                    <div class="card" style="width: 18rem;">
                        
                        <img src="images/img3.png" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Item 3</h5>
                            <p class="card-text">Rs 650</p>
                            <button type="submit" name="Add_to_Cart"  class="btn btn-info">Add to Cart</button>
                            <input type="hidden" name="Item_name" value="item3">
                            <input type="hidden" name="price" value="Rs650">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>