<!DOCTYPE html>
<html lang="ru">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Редактирование компонента</title>
 <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>
<nav>
 <ul>
 <li><a href="/admin/view_comp.php">Управление компонентами</a>&nbsp;&nbsp;<a href="/admin/manage.php">Управление сборками</a></li>
 </ul>
 </nav>
</header>
<main>
 <?php
 require_once 'database.php';

 if (isset($_GET['id'])) {
 $id = $_GET['id'];
 } else {
 echo "ID компонента не указан";
 exit;
 }

 $sql = "SELECT * FROM components WHERE id = :id";
 $stmt = $pdo->prepare($sql);
 $stmt->execute(['id' => $id]);
 $component = $stmt->fetch(PDO::FETCH_ASSOC);

 if ($component === false) {
 echo "Компонент с указанным ID не найден";
 exit;
 }

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

 $name = $_POST['name'];
 $type = $_POST['type'];
 $price = $_POST['price'];

 $sql = "UPDATE components SET name = :name, type = :type, price = :price WHERE id = :id";
 $stmt = $pdo->prepare($sql);
 $result = $stmt->execute([
 'name' => $name,
 'type' => $type,
 'price' => $price,
 'id' => $id
 ]);

 if ($result) {
 echo '<script>
alert("Компонент успешно обновлен!");
window.location = "/admin/view_comp.php";
</script>';
 } else {
 echo '<script>
alert("Ошибка!");
window.location = "/admin/view_comp.php";
</script>';
 }
 }
 ?>

 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>">
 <input type="hidden" name="id" value="<?php echo $id; ?>">

 <label>Название:</label>
 <input type="text" name="name" value="<?php echo $component['name']; ?>">

 <label>Тип:</label>
 <select name="type">
 <?php
 $types = [
 'processor' => 'процессор',
 'motherboard' => 'мат.плата',
 'ram' => 'ОЗУ',
 'storage' => 'накопитель',
 'power_supply' => 'блок питания',
 'case' => 'корпус',
 'cooling_system' => 'охлаждение',
 'graphics_card' => 'видеокарта',
 'sound_card' => 'звуковая карта',
 'keyboard' => 'клавиатура',
 'mouse' => 'мышь'
 ];
 foreach ($types as $key => $value) {
 echo '<option value="' . $key . '" ' . ($component['type'] == $key ? 'selected' : '') . '>' . $value . '</option>';
 }
 ?>
 </select>

 <label>Цена:</label>
 <input type="number" name="price" value="<?php echo $component['price']; ?>">

 <button type="submit">Изменить</button>
 </form>
</main>
</body>
</html>
