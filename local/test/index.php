<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Загрузка 2.0");
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<form enctype="multipart/form-data" action="encrichment.php" method="post">
 <input type="hidden" name="MAX_FILE_SIZE" value="30000000000000">
    <input name="userfile" type="file"> <input type="submit" value="Отправить файл">
</form>
<br>


<?php
$db = \Bitrix\Main\Application::getConnection();
$arr = date('Y-m-d');
//Выводим данные
$sql = $db->query("SELECT * FROM Loading_leads  ORDER BY id DESC LIMIT 100");
$result = $sql->fetchAll();
?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">
            Дата загрузки
        </th>
        <th scope="col">
            Файл
        </th>
        <th scope="col">
            Количество ИНН
        </th>
        <th scope="col">
            Стоп-лист
        </th>
        <th scope="col">
            Новые лиды
        </th>
        <th scope="col">
            Дубликаты
        </th>
        <th scope="col">
            Время загрузки
        </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($result as $val) : ?>
        <tr>
            <td>
                <?php echo $val->DATE_LOADING;
                print_r($val[DATE_LOADING]);?>
            </td>
            <td>
                <?php echo $val->NAME_FILE;
                print_r($val[NAME_FILE]);?>
            </td>
            <td>
                <?php echo $val->ALL_LEADS_IN_FILE;
                print_r($val[ALL_LEADS_IN_FILE]);?>
            </td>
            <td>
                <?php echo $val->STOP_LIST;
                print_r($val[STOP_LIST]);?>
            </td>
            <td>
                <?php echo $val->NUMBERS_OF_INN;
                print_r($val[NUMBERS_OF_INN]); ?>
            </td>
            <td>
                <?php echo $val->DUPLICAT_LEADS;
                print_r($val[DUPLICAT_LEADS]); ?>
            </td>
            <td>
                <?php echo $val->TIME_SCRIPT;
                print_r($val[TIME_SCRIPT]);?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

