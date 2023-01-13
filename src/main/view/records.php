<?php $title = 'Данные';
include_once "fragment/header.php"; ?>

<div class="container mt-3">
    <h2>Департаменты</h2>
    <p>Все департаменты в системе:</p>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>xml id</th>
            <th>parent xml id</th>
            <th>name department</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>some info</td>
            <td>some info</td>
            <td>some info</td>
        </tr>
        </tbody>
    </table>

    <form action="/index.php" method="get" class="text-center">
        <input type="hidden" name="command" value="DOWNLOAD_DEPARTMENTS">
        <input type="submit" class="btn btn-success" value="Скачать">
    </form>

    <form action="/index.php" method="post" enctype="multipart/form-data" style="margin: 5%;">
        <div class="form-group">
            <label for="departmentFile" class="form-label">Выберите файл для загрузки департаментов: </label>
            <input type="file" id="departmentFile" name="file" class="form-control" style="max-width: 35%;">
        </div>
        <input type="hidden" name="command" value="UPLOAD_DEPARTMENTS">
        <input type="submit" class="btn btn-primary" value="загрузить">
    </form>
</div>


<hr style="margin-top: 5%; margin-bottom: 5%;">


<div class="container mt-3">
    <h3>Пользователи</h3>
    <p>Все пользователи в системе:</p>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>xml id</th>
            <th>parent xml id</th>
            <th>name department</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>some info</td>
            <td>some info</td>
            <td>some info</td>
        </tr>
        </tbody>
    </table>

    <form action="/index.php" method="get" class="text-center">
        <input type="hidden" name="command" value="DOWNLOAD_USERS">
        <input type="submit" class="btn btn-success" value="Скачать">
    </form>

    <form action="/index.php" method="post" enctype="multipart/form-data" style="margin: 5%;">
        <div class="form-group">
            <label for="userFile" class="form-label">Выберите файл для загрузки пользователей: </label>
            <input type="file" id="userFile" name="file" class="form-control" style="max-width: 35%;">
        </div>
        <input type="hidden" name="command" value="UPLOAD_USERS">
        <input type="submit" class="btn btn-primary" value="загрузить">
    </form>
</div>

<?php include_once "fragment/footer.php"; ?>
