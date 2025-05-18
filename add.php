<!DOCTYPE html>
<html lang="ru">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Добавить компонент</title>
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

 if ($_GET['go'] == 'add') {
 $name = $_POST['name'];
 $type = $_POST['type'];
 $price = $_POST['price'];

 try
 {
 $stmt = $pdo->prepare('INSERT INTO components (name, type, price) VALUES (:name, :type, :price)');
 $stmt->execute(['name' => $name, 'type' => $type, 'price' => $price]);

echo '<script>
alert("Компонент добавлен успешно!");
window.location = "/admin/view_comp.php";
</script>';
 } catch (PDOException $e) {
 echo 'Ошибка при добавлении компонента: ' . $e->getMessage();
 }
 } 
 ?>

 <form action="/admin/add.php?go=add" method="post">
 <label for="name">Название компонента:</label>
 <input type="text" name="name" id="name" required>

 <label for="type">Тип компонента:</label>
 <select name="type" id="type" required>
 <option value="processor">Процессор</option>
 <option value="motherboard">Материнская плата</option>
 <option value="ram">Оперативная память</option>
 <option value="storage">Накопитель</option>
 <option value="power_supply">Блок питания</option>
 <option value="case">Корпус</option>
 <option value="cooling_system">Система охлаждения</option>
 <option value="graphics_card">Видеокарта</option>
 <option value="sound_card">Звуковая карта</option>
 <option value="keyboard">Клавиатура</option>
 <option value="mouse">Мышь</option>
 </select>

 <label for="price">Цена:</label>
 <input type="number" name="price" id="price" step="0.01" required>

 <input type="submit" value="Добавить компонент">
 </form>
 </main>
</body>
</html>
