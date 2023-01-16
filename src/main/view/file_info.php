<?php $title = 'Имя файла';
include_once "fragment/header.php"; ?>

    <h2><?php echo $fileName ?></h2>
    <p>Данные файла:</p>
    <table class="table table-bordered table-sm">
        <tbody>
        <?php foreach ($fileContent as $row): ?>
            <tr>
                <?php foreach ($row as $cell): ?>
                    <td><?php echo $cell ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-1">
            <form action="/test_task/index.php" method="get">
                <input type="hidden" name="command" value="DOWNLOAD_FILE">
                <input type="hidden" name="file_name" value="<?php echo $fileName ?>">
                <input type="submit" class="btn btn-success" value="Скачать">
            </form>
        </div>
        <div class="col-sm-11">
            <form action="/test_task/index.php" method="post">
                <input type="hidden" name="command" value="DELETE_FILE">
                <input type="hidden" name="file_name" value="<?php echo $fileName ?>">
                <input type="submit" class="btn btn-danger" value="Удалить">
            </form>
        </div>
    </div>

<?php include_once "fragment/footer.php"; ?>