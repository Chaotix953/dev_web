<?php
require './db.php';
session_start();
if(!isset($_SESSION['user'])){
    header('Location:login.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/page_recherche.css">
</head>
<body>
<header>
    <img src="../img/logo.jpg" class="logo">
    <h1> solepied </h1>
    <div class="head" style="display: flex">
        <a style="margin: 2px" href="./index.php">Accueil</a>
        <a style="margin: 2px" href="#">Nouveautés</a>
        <a style="margin: 2px" href="./product.php">Produits</a>
        <?php
        if (isset($_SESSION['username'])) { ?>
            <a style="margin-right: 2px" href="logout.php">logout</a>
            <?php
        } else { ?>
            <a style="margin-right: 2px" href="./login.php">connexion</a>
            <?php
        } ?>
        <a style="margin-right: 2px" href="./panier.php">Panier</a>
        <?php if($_SESSION['user']['is_admin']) {?>
            <a href="./categories.php">Gestion categories</a>
            <a href="./products.php">Gestion products</a>
        <?php }?>
    </div>

    <script src="../js/script.js"></script>
    <script src="../js/script2.js"></script>
</header>

<main class="container mt-5">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
        Create Category
    </button>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                            data-target="#updateCategoryModal<?php echo $category['id']; ?>">
                        Edit
                    </button>

                    <a href="deleteCetgory.php?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
            <div class="modal fade" id="updateCategoryModal<?php echo $category['id']; ?>" tabindex="-1"
                 aria-labelledby="updateCategoryModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="updateCategoryModal">update Category</h1>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="updateCategory.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                    <input type="text" class="form-control" name="name"
                                           value="<?php echo $category['name']; ?>">
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
                <h1 class="modal-title fs-5" id="createModal">Ajouter Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="creatCategory.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="name">
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
