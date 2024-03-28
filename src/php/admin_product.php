<?php
require_once "../../config/db.php";
include '../include/navbar_admin.php';
// Check if user is logged in
$id = isset($_SESSION['login_user']) ? $_SESSION['login_user'] : null;

// Fetch products associated with the logged-in user
$sql = "SELECT product_id, category_name, employee_id, product_name, detail, price, quantity, image
FROM product
INNER JOIN category ON product.category_id=category.category_id;";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Optional custom styles */
        .table {
            margin-top: 20px;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mt-3 text-center">รายการสินค้า</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 150px;">Product ID</th>
                    <th style="width: 150px;">Category Name</th>
                    <th style="width: 150px;">Employee ID</th>
                    <th>Product Name</th>
                    <th>Detail</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['product_id'] ?>
                            </td>
                            <td>
                                <?php echo $row['category_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['employee_id'] ?>
                            </td>
                            <td>
                                <?php echo $row['product_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['detail'] ?>
                            </td>
                            <td>
                                <?php echo $row['price'] ?>
                            </td>
                            <td>
                                <?php echo $row['quantity'] ?>
                            </td>
                            <td><img src="data:image/png;base64,<?php echo base64_encode($row['image']); ?>" alt="Thumbnail">
                            </td>
                            <td>
                                <a href="edit_product.php?id=<?php echo $row['product_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete_product.php?id=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='8'>No products found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>