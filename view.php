<!DOCTYPE html>
<html lang="ru">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Просмотр сборок</title>
 <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <header>
<nav>
 <ul>
 <li><a href="index.php">Главная</a>&nbsp;&nbsp;<a href="builder.php">Начать сборку</a>&nbsp;&nbsp;<a href="view.php">Сборки</a></li>
 </ul>
 </nav>
 </header>
 <main>
 <?php
 require_once 'includes/database.php';

 function getComponentName($stmt, $id) {
 $stmt->execute(['id' => $id]);
 return $stmt->fetchColumn();
}

 $itemsPerPage = 2;
 $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
 $offset = ($page - 1) * $itemsPerPage;

 $assemblies = $pdo->query("SELECT * FROM assemblies LIMIT $itemsPerPage OFFSET $offset")->fetchAll();

 if (count($assemblies) > 0) {
 foreach ($assemblies as $assembly) {
 $processor_id = $assembly['processor_id'];
 $motherboard_id = $assembly['motherboard_id'];
 $ram_id = $assembly['ram_id'];
 $storage_id = $assembly['storage_id'];
 $power_supply_id = $assembly['power_supply_id'];
 $case_id = $assembly['case_id'];
 $cooling_system_id = $assembly['cooling_system_id'];
 $graphics_card_id = $assembly['graphics_card_id'];
 $sound_card_id = $assembly['sound_card_id'];
 $keyboard_id = $assembly['keyboard_id'];
 $mouse_id = $assembly['mouse_id'];

 $stmt = $pdo->prepare('SELECT name FROM components WHERE id = :id');
 $component_names = [];
 $component_names['processor'] = getComponentName($stmt, $processor_id);
 $component_names['motherboard'] = getComponentName($stmt, $motherboard_id);
 $component_names['ram'] = getComponentName($stmt, $ram_id);
 $component_names['storage'] = getComponentName($stmt, $storage_id);
 $component_names['power_supply'] = getComponentName($stmt, $power_supply_id);
 $component_names['case'] = getComponentName($stmt, $case_id);
 $component_names['cooling_system'] = getComponentName($stmt, $cooling_system_id);
 $component_names['graphics_card'] = getComponentName($stmt, $graphics_card_id);
 $component_names['sound_card'] = getComponentName($stmt, $sound_card_id);
 $component_names['keyboard'] = getComponentName($stmt, $keyboard_id);
 $component_names['mouse'] = getComponentName($stmt, $mouse_id);

 echo '<div class="assembly">';
 echo '<h4>Сборка №' . $assembly['id'] . '</h4>';
 echo '<ul>';
 echo '<li><b>Процессор:</b> ' . $component_names['processor'] . '</li>';
 echo '<li><b>Материнская плата:</b> ' . $component_names['motherboard'] . '</li>';
 echo '<li><b>Оперативная память:</b> ' . $component_names['ram'] . '</li>';
 echo '<li><b>Накопитель:</b> ' . $component_names['storage'] . '</li>';
 echo '<li><b>Блок питания:</b> ' . $component_names['power_supply'] . '</li>';
 echo '<li><b>Корпус:</b> ' . $component_names['case'] . '</li>';
 echo '<li><b>Система охлаждения:</b> ' . $component_names['cooling_system'] . '</li>';
 echo '<li><b>Видеокарта:</b> ' . $component_names['graphics_card'] . '</li>';
 echo '<li><b>Звуковая карта:</b> ' . $component_names['sound_card'] . '</li>';
 echo '<li><b>Клавиатура:</b> ' . $component_names['keyboard'] . '</li>';
 echo '<li><b>Мышь:</b> ' . $component_names['mouse'] . '</li><br>';
 echo '<b>Общая цена:</b> ' . $assembly['total_price'] . ' рублей';
 echo '</ul>';
 echo '</div>';
 }
 } else {
 echo 'Сборок пока нет.';
 }

 $totalAssemblies = $pdo->query('SELECT COUNT(*) FROM assemblies')->fetchColumn();
 $totalPages = ceil($totalAssemblies / $itemsPerPage);

 if ($totalPages > 1) {
 echo '<div class="pagination">';
 for ($i = 1; $i <= $totalPages; $i++) {
 echo '<a href="?page=' . $i . '"' . ($i == $page ? ' class="active"' : '') . '>' . $i . '</a>';
 }
 echo '</div>';
 }
 ?>
 </main>
 <script src="js/scripts.js"></script>
</body>
</html>
