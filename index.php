<html>
<head>
    <title>To do list</title>
</head>
<body>
<?php
require_once 'todo.php';
$cls = new todo();



if (isset($_GET['action']) && $_GET['id'] and is_numeric($_GET['id'])){
    if ($_GET['action'] === 'delete'){
        $cls->sil($_GET['id']);
        $cls->yonlendir(DIRECTORY_SEPARATOR);
    }
}
if (isset($_POST['mytodo'])){
    $mytodo = htmlentities($_POST['mytodo'],ENT_QUOTES,'UTF-8');
    $cls->ekle($mytodo);
    $cls->yonlendir(DIRECTORY_SEPARATOR);
}

echo '<pre>';
//$cls->sil(2);
$gelenler = json_decode($cls->oku());
?>

<form action="index.php" method="post">
    <input type="text" name="mytodo" />
    <input type="submit" value="EKLE">
</form>

<ul>
    <?php
    foreach($gelenler as $k=>$v){
        echo '<li><div style="display:inline-block">'.$v.'</div> <form action="/index.php" style="display:inline-block" >
            <input type="hidden" value="delete" name="action" />
            <input type="hidden" value="'.($k+1).'" name="id" />
            <input type="submit" value="sil" />
            </form>
            </li>';
    }
    ?>
</ul>

</body>
</html>