    <script>
        function trClick(id) {
            document.location.href = '/bike/' + id;
        }
    </script>

    <div class="container">
<!--        --><?// if ($is_admin) {
//            include(ROOT.'/views/admin/FormBikeCreate.php');
//        } ?>
        <table class="table">
            <tr>
                <th>id</th>
                <th>model</th>
                <th>categor</th>
                <th>local</th>
<!--                --><?// if ($data['is_admin']) { ?>
<!--                    <th>status</th>--><?// } ?>
            </tr>
            <? foreach ($data['bikeList'] as $i) { ?>
                <tr onclick="trClick(<?= $i['id'] ?>)">

                    <td><?= $i['id'] ?></td>
                    <td><?= $i['model'] ?></td>
                    <td><?= $i['categories'] ?></td>
                    <td><?= $i['locals'] ?></td>
<!--                    --><?// if ($data['is_admin']) { ?>
<!--                        <td>--><?//= $i['status'] ?><!--</td> --><?// } ?>


                </tr>
            <? } ?>
        </table>
    </div>

<?php //include(ROOT . '/views/layouts/footer.php'); ?>