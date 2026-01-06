product_purchase.php<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
</head>
<body>
    <h1>Add a Product</h1>
    
    <form action="/product/add/add" method="post" enctype="multipart/form-data">
        <div>
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        
        <div>
            <label for="desc">Description:</label>
            <textarea name="desc" id="desc" rows="4" required></textarea>
        </div>
        
        <div>
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" step="0.01" min="0" required placeholder="e.g., 19.99">
        </div>

        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" name="qtt" id="quantity">
        </div>
        
        <div>
            <label for="userfile">Product Image:</label>
            <input type="file" name="userfile" id="userfile" required>
        </div>
        
        <br>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>