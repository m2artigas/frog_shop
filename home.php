
<?php
// Get the 4 most recently added products

$stmt = $connection->prepare('SELECT * FROM products');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?=template_header('Home')?>
<body>
        <header>
<div class="content-wrapper">
<div class="link-icons">
    <p>
<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true): ?>
                        <a href="index.php?page=logout">Logout</a>
                    <?php else: ?>
                        <a href="index.php?page=login">Login</a>
                    <?php endif; ?>
                    </p>
                    </div>
                    </div>
                    </header>
                    </body>
<div class="featured">
    <p>Frogs</p>
    <p>Sometimes you have to kiss a lot of frogs before you find your prince.</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>PRODUCTS</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>