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
    <tr>
        <td><h5>имя файла</h5></td>
        <td>
<!--            todo file_name-->
            <form action="/index.php" method="get" class="text-center">
                <input type="hidden" name="command" value="SHOW_FILE_INFO">
                <input type="hidden" name="file_name" value="">
                <input type="submit" class="btn btn-success" value="информация">
            </form>
        </td>
    </tr>
    </tbody>
</table>

<?php include_once "fragment/footer.php"; ?>
