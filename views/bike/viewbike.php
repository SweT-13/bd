<?php include(ROOT . '/views/layouts/header.php'); ?>

    <div class="container">

        <? if ($is_admin) {?>
            <form action="/admin/bike/update/<?= $bike['id'] ?>" method="post" enctype="multipart/form-data">
                <h1>Bike:</h1>
                <p><img src="<?= $bike['image'] ?>" style="width: 10vw; height=10vh" alt="image"></p>
                <p><b>id:</b> <?= $bike['id'] ?></p>
                <p><b>model:</b> <input type="text" name="model" value="<?= $bike['model'] ?>"></p>
                <p><b>categor:</b>
                    <select name="categories">
                        <? foreach ($categories as $c) { ?>
                            <option value="<?= $c['id'] ?>"
                                    <? if ($c['id'] == $bike['category_id']) { ?>selected<? } ?>><?= $c['name'] ?></option>
                        <? } ?>
                    </select>
                </p>
                <p><b>local:</b>
                    <select name="local">
                        <? foreach ($locals as $l) { ?>
                            <option value="<?= $l['id'] ?>"
                                    <? if ($l['id'] == $bike['local_id']) { ?>selected<? } ?>><?= $l['name'] ?></option>
                        <? } ?>
                    </select>
                </p>
                <p><b>status:</b><select name="status">
                        <? foreach ($status as $s) { ?>
                            <option value="<?= $s['id'] ?>"
                                    <? if ($s['id'] == $bike['status_id']) { ?>selected<? } ?>><?= $s['name'] ?></option>
                        <? } ?>
                    </select>
                </p>
                <input type="file" name="image" accept="image/jpeg, image/png" value="<? $bike['image'] ?>">
                <button name="update">Обновить</button>
                <button name="deleteImg">Сбросить картинку</button>
                <? if (isset($_SESSION['messageUpd'])) { ?>
                    <div class="message text-center">
                        <? if (isset($_SESSION['messageUpd']['message']))
                            foreach ($_SESSION['messageUpd']['message'] as $m) { ?>
                                <p class="alert-success"><?= $m ?></p>
                            <? } ?>
                    </div>
                    <div class="message text-center">
                        <? if (isset($_SESSION['messageUpd']['errors']))
                            foreach ($_SESSION['messageUpd']['errors'] as $e) { ?>
                                <p class="alert-danger"><?= $e ?></p>
                            <? } ?>
                    </div>
                    <? $_SESSION['messageUpd'] = null;
                } ?>
            </form>
        <? } else { ?>
            <h1>Bike:</h1>
            <p><img src="<?= $bike['image'] ?>" style="width: 10vw; height=10vh" alt="image"></p>
            <p><b>id:</b> <?= $bike['id'] ?></p>
            <p><b>model:</b> <?= $bike['model'] ?></p>
            <p><b>categor:</b> <?= $bike['category'] ?></p>
            <p><b>local:</b> <?= $bike['local'] ?></p>
            <p><b>status:</b> <?= $bike['status'] ?></p>
        <? } ?>
    </div>


<?php include(ROOT . '/views/layouts/footer.php'); ?>