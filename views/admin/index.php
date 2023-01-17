<?php include(ROOT . '/views/layouts/header.php'); ?>
    <table class="table">
        <tr>
            <th>id</th>
            <th>model</th>
            <th>categor</th>
            <th>local</th>
        </tr>
        <? foreach ($bikeList as $i) { ?>
            <tr>
                <td><?= $i['id'] ?></td>
                <td><?= $i['model'] ?></td>
                <td><?= $i['categories'] ?></td>
                <td><?= $i['locals'] ?></td>
            </tr>
        <? } ?>

    </table>

<?php include(ROOT . '/views/layouts/footer.php'); ?>