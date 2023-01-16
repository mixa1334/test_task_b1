<?php $title = 'Загрузки';
include_once "fragment/header.php"; ?>

<h2 class="head">Загруженные файлы</h2>

<table class="table  table-sm" style="margin: 5%;">
    <thead>
    <tr>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($files as $file): ?>
        <tr>
            <td><h5><?php echo $file ?></h5></td>
            <td>
                <form action="/test_task/index.php" method="get" class="text-center">
                    <input type="hidden" name="command" value="SHOW_FILE_INFO">
                    <input type="hidden" name="file_name" value="<?php echo $file ?>">
                    <input type="submit" class="btn btn-success" value="информация">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include_once "fragment/footer.php"; ?>
