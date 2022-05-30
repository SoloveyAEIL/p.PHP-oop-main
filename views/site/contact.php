<?php include_once ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if ($result): ?>
                    <p>Сообщение отправленно! Мы ответим вам на указанный email.</p>
                <?php else: ?>
                    <?php if (isset($errors) AND is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?> </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                <div class="signup-form">
                    <h2>Обратная связь</h2>
                    <h5>есть вопрос?  Напиши нам</h5>
                    <br>
                    <form action="" method="post">
                        <p>Ваша почта: </p>
                        <input type="email" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>">
                        <p>Ваше сообщение: </p>
                        <input type="text" name="userText" placeholder="Сообщение" value="<?php echo $userText; ?>">
                        <br>
                        <input type="submit" name="submit" class="btn btn-default" value="Отправить">
                    </form>
                </div>
                <?php endif; ?>

            </div>

        </div>
    </div>
</section>

<?php include_once ROOT.'/views/layouts/footer.php'; ?>
