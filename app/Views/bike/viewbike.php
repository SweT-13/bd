
    <div class="container">

        <? if (0) {?>
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
                <? if (isset($_SESSION['msg'])) { ?>
                    <div class="message text-center">
                        <? if (isset($_SESSION['msg']))
                            foreach ($_SESSION['msg'] as $m) { ?>
                                <p class="alert-success"><?= $m ?></p>
                            <? } ?>
                    </div>
                    <div class="message text-center">
                        <? if (isset($_SESSION['msg']))
                            foreach ($_SESSION['msg'] as $e) { ?>
                                <p class="alert-danger"><?= $e ?></p>
                            <? } ?>
                    </div>
                    <? $_SESSION['msg'] = null;
                } ?>
            </form>
        <? } else { ?>
            <h1>Bike:</h1>
            <p><img src="<?= $data[0]->image ?>" style="width: 10vw; height=10vh" alt="image"></p>
            <p><b>id:</b> <?= $data[0]->id ?></p>
            <p><b>model:</b> <?= $data[0]->model ?></p>
            <p><b>categor:</b> <?= $data[0]->category_id ?></p>
            <p><b>local:</b> <?= $data[0]->local_id ?></p>
            <p><b>status:</b> <?= $data[0]->status_id ?></p>
        <? } ?>
    </div>
