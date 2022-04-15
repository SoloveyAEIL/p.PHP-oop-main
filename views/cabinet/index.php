<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div style="text-align: center;" class="cabinet_info">

                <h2>Кабинет пользователя: <?php echo $user['name']; ?> </h2>
                <br>
                <ul>
                    <li><a href="/cabinet/edit">Редактировать данные</a></li>
                    <li><a href="/user/history">Список покупок</a></li>
                </ul>

            </div>
        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>
