<?php include ROOT .'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <!-- Category -->
            <div class="col-sm-3">

                        <h4>Категории</h2>
                        <hr>
                            <div class="categotyList">
                                <?php foreach ($categories as $categoryList): ?>
                                    <div class="categoryOnce">
                                        <h4><a href="/category/<?php echo $categoryList['id']; ?>">
                                            <?php echo $categoryList['name']; ?></a></h3>
                                        <br>
                                    </div>
                                <?php endforeach; ?>
                            </div>

            </div>

            <!-- Product ID -->
            <div class="col-sm-9 padding-right">

                <div class="col-sm-4 padding-left">
                    <br>
                    <img src="/template/images/<?php echo $product['image']; ?>" alt="productIdImg">
                    <br>
                </div>
                <div class="col-sm-8">
                    <h3><?php echo $product['name'];?></h3>
                    <br>
                    <p>Код товара: <?php echo $product['code'];?></p>
                    <p>Наличие на складе: <?php if ($product['status']) echo "есть в наличии."; else "отсутствует."; ?></p>
                    <p>Бренд: <?php echo $product['brand'];?></p>
                    <p>Цена: <?php echo $product['price'];?> BYN</p>
                    <br>
                </div>

                <p>Краткое описание: <br><?php echo implode(".<br>", explode(" / ", $product['description']));?></p>
                
            </div>

        </div>                           
    </div>                             
</section>

<?php include ROOT .'/views/layouts/footer.php'; ?>