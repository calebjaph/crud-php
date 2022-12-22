<?php

function TableProducts($config)
{

    $countFetchProducts = mysqli_query($config, "SELECT COUNT(1) AS Total FROM products");
    $countProducts = mysqli_fetch_assoc($countFetchProducts);

    if ($countProducts['Total'] > 0) {

        echo '<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Brand</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Visit Product</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>';

        $fetchProducts = "SELECT * FROM products order by price desc";
        $result = mysqli_query($config, $fetchProducts);
        while ($products = mysqli_fetch_array($result)) {
            echo '<tbody>
        <tr>
            <th scope="row">' . $products['id'] . '</th>
            <th scope="row"><img src="' . $products['imageUrl'] . '" width="80" height="60" class="img-thumbnail" alt="..."></th>
            <td>' . $products['nameProduct'] . '</td>
            <td>' . $products['brand'] . '</td>
            <td>' . $products['price'] . '</td>
            <td>' . $products['category'] . '</td>
            <td><a href="' . $products['urlProduct'] . '" target="_blank" rel="noopener noreferrer">Visit Product</a></td>
            <td>
                <a href="editProduct.php?id=' . $products['id'] . '" rel="noopener noreferrer">
                <button type="button" class="btn btn-warning">Edit</button></a>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
        </tr>
    </tbody>
';
        }
        echo '</table>';
    } else {
        echo '<div class="alert alert-warning" role="alert">No products available, add a new product.</div>';
    }
}