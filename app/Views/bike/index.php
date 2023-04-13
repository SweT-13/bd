<script>
    function trClick(id) {
        document.location.href = '/bike/' + id;
    }
</script>

<div class="container">
    <? if ($data['is_admin']) {
        include('app/Views/admin/FormBikeCreate.php');
    } ?>
    <table class="table">
        <tr>
            <th>id</th>
            <th>model</th>
            <th>categor</th>
            <th>local</th>
            <? if ($data['is_admin']) { ?>
                <th>status</th><? } ?>
        </tr>

        <? foreach ($data['bikeList'] as $i) { ?>
            <tr onclick="trClick(<?= $i->id ?>)">

                <td><?= $i->id ?></td>
                <td><?= $i->model ?></td>
                <td><?= $i->category_id ?></td>
                <td><?= $i->local_id ?></td>
                <? if ($data['is_admin']) { ?>
                    <td><?= $i->status_id ?></td> <? } ?>


            </tr>
        <? } ?>
    </table>
</div>

<?php //include(ROOT . '/views/layouts/footer.php'); ?>