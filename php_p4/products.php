<?php
require './db.php';
session_start();

if(!isset($_SESSION['user'])){
    header('Location:login.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM Product");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/page_recherche.css">

</head>
<body>
<?php require 'header.php' ?>
<main class="container mt-5">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
        Create Product
    </button>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Reference</th>
            <th>Designation</th>
            <th>Photo</th>
            <th>Price</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['reference']; ?></td>
            <td><?php echo $product['designation']; ?></td>
            <td><?php echo $product['photo']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['quantity']; ?></td>
            <td>
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                        data-target="#updateProductModal<?php echo $product['id']; ?>">
                    Edit
                </button>

                <a href="deleteProduct.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-danger">
                    Delete
                </a>
            </td>
        </tr>
        <div class="modal fade" id="updateProductModal<?php echo $product['id']; ?>" tabindex="-1"
             aria-labelledby="updateProductModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateProductModal">Update Product</h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="updateProduct.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Reference</label>
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                <input type="text" class="form-control" name="reference"
                                       value="<?php echo $product['reference']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select  name="category_id" class="form-control">
                                    <?php foreach ($categories

                                    as $category){ ?>
                                    <option <?php if($product['category_id']===$category['id']){?> selected <?php }?>value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation"
                                       value="<?php echo $product['designation']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="text" class="form-control" name="photo"
                                       value="<?php echo $product['photo']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price"
                                       value="<?php echo $product['price']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name"
                                       value="<?php echo $product['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" class="form-control" name="quantity"
                                       value="<?php echo $product['quantity']; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>


<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModal">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="createProduct.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Reference</label>
                        <input type="text" class="form-control" name="reference">
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" class="form-control" name="designation">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            <?php foreach ($categories

                            as $category){ ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="text" class="form-control" name="photo">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="quantity">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
