<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vendo_machine</title>
</head>
<body>
    <div class="container">
        <h2>Vendo Machine</h2>
        <form method="POST">

                   <fieldset class="fset">
                         <legend>Products:</legend>             
                        <input type="checkbox" name="products[]" value="Coke,15"> Coke - ₱15<br>
                        <input type="checkbox" name="products[]" value="Sprite,20"> Sprite - ₱20<br>
                        <input type="checkbox" name="products[]" value="Royal,20"> Royal - ₱20<br>
                        <input type="checkbox" name="products[]" value="Pepsi,15"> Pepsi - ₱15<br>
                        <input type="checkbox" name="products[]" value="Mountain Dew,20"> Mountain Dew - ₱20<br>
                    </fieldset>

                <fieldset class="fset">
                    <legend>Options:</legend>
                    <label for="size">Size: </label>
                        <select name="size">
                            <option value="Regular">Regular</option>
                            <option value="upsize">Upsize (add ₱5)</option>
                            <option value="Jumbo">Jumbo (add ₱10)</option>
                        </select>

                    <label for="quantity">Quantity: </label>
                    <input type="number" name="quantity" id="quantity" value="0" min="0" ">
                    <button type="submit" name="checkout">CheckOut</button>
                </fieldset>
        </form>

        <?php
        if (isset($_POST['checkout'])) {
            // Initialize variables
            $products = isset($_POST['products']) ? $_POST['products'] : [];
            $size = isset($_POST['size']) ? $_POST['size'] : 'regular';
            $quantity = isset($_POST['quantity']) ? $_POST['quantity']: 0;

            
            $totalCost = 0;
            $selectedProducts = [];

            // Loop through selected products
            foreach ($products as $product) {
                list($productName, $productPrice) = explode(",", $product);
                $selectedProducts[] = $productName;
                $totalCost += (int)$productPrice;
            }

            // Calculate total cost based on quantity
            $totalCost *= $quantity;

            // Display output
            if (count($selectedProducts) > 0 && $quantity > 0) {
                
                echo "<hr><b>Purchase Summary: </b><br>";
                echo "You ordered: " . implode(", ", $selectedProducts) . "<br>";
                echo "Size: " . htmlspecialchars($size) . "<br>";
                echo "<ul><li><label>Quantity: {$quantity} ";
                echo "Total Cost: ₱" . $totalCost;
                
            } else {
                echo "<hr>No Selected Products try again.";
            }
            
        }
        ?>
    </div>
</body>
</html>