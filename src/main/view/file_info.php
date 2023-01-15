<?php $title = 'Имя файла';
include_once "fragment/header.php"; ?>

    <h2>Имя файла</h2>
    <p>Данные файла "имя файла":</p>
    <table class="table table-bordered table-sm">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>John</td>
            <td>Doe</td>
            <td>john@example.com</td>
        </tr>
        </tbody>
    </table>

    <!--todo file_name value-->
    <div class="row">
        <div class="col-sm-1">
            <form action="/test_task/index.php" method="get">
                <input type="hidden" name="command" value="DOWNLOAD_FILE">
                <input type="hidden" name="file_name" value="">
                <input type="submit" class="btn btn-success" value="Скачать">
            </form>
        </div>
        <div class="col-sm-11">
            <form action="/test_task/index.php" method="post">
                <input type="hidden" name="command" value="DELETE_FILE">
                <input type="hidden" name="file_name" value="">
                <input type="submit" class="btn btn-danger" value="Удалить">
            </form>
        </div>
    </div>

<?php include_once "fragment/footer.php"; ?>