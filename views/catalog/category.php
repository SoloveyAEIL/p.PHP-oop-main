<?php include ROOT .'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <!-- Category -->
            <div class="col-sm-3">

                        <h3>Категории</h3>
                        <hr>
                            <div class="categotyList">
                                <?php foreach ($categories as $categoryList): ?>
                                    <div class="categoryOnce">
                                        <h4><a href="/category/<?php echo $categoryList['id']; ?>" 
                                                class="<?php if ($categoryId == $categoryList['id']) echo 'active'; ?>">
                                            <?php echo $categoryList['name']; ?></a></h4>
                                        <br>
                                    </div>
                                <?php endforeach; ?>
                            </div>

            </div>

            <!-- LastProduct -->
            <div class="col-sm-9">

                <h4 class="title text-center">Последние товары в категории</h2>
                <hr>
                    <div class="productList">
                        <?php foreach ($categoryProducts as $product): ?>
                            <div class="col-sm-3">
                                    <div class="productOnce">
                                            <a href="#"><img src="#" alt="ProductID"></a>
                                            <h4><a href="/product/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h3>
                                            <p>ID: <?php echo $product['id']; ?></p>
                                            <p>Price: <?php echo $product['price']; ?> BYN</p>
                                            <br>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
            </div>

        </div>    

            <div class="pagination_count">
                <?php echo $pagination->get(); ?>
            </div>

    </div>       

</section>

<?php include ROOT .'/views/layouts/footer.php'; ?>