<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр компонентов</title>
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

    function getComponentName($stmt, $id) {
        $stmt->execute(['id' => $id]);
        return $stmt->fetchColumn();
    }

    $itemsPerPage = 10;
    $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $offset = ($page - 1) * $itemsPerPage;

    $totalComponents = $pdo->query('SELECT COUNT(*) FROM components')->fetchColumn();
    $totalPages = ceil($totalComponents / $itemsPerPage);

    $components = $pdo->query("SELECT * FROM components LIMIT $itemsPerPage OFFSET $offset")->fetchAll();
    ?>

    <div>
    <nav>
 <ul>
 <li><a href="/admin/add.php">Добавить компонент</a></li>
 </ul>
 </nav>
    <table border="1">
    <thead>
    <tr>
    <th>ID</th>
    <th>Название</th>
    <th>Тип</th>
    <th>Цена</th>
    <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php if (count($components) > 0): ?>
    <?php foreach ($components as $component): ?>
    <tr>
    <td><?php echo $component['id']; ?></td>
    <td><?php echo $component['name']; ?></td>
    <td>
    <?php
    $types = ['processor' => 'процессор',
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
    echo $types[$component['type']] ?? $component['type'];

    If($_GET['go'] == "del")
    {
     
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    echo "ID компонента не указан";
    exit;
}

$sql = "DELETE FROM components WHERE id = :id";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute(['id' => $id]);

if ($result) {
    echo '<script>
alert("Компонент успешно удален!");
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
    </td>
    <td><?php echo $component['price']; ?></td>
    <td>
    <a href="/admin/edit_comp.php?id=<?php echo $component['id']; ?>">Изменить</a>
    <a href="/admin/view_comp.php?go=del&id=<?php echo $component['id']; ?>" onclick="return confirm('Вы уверены, что хотите удалить этот компонент?')">Удалить</a>
    </td>
    </tr>
<?php endforeach; ?>
    <?php else: ?>
    <tr>
    <td colspan="5">Компоненты не найдены</td>
    </tr>
    <?php endif; ?>
</tbody>
</table>

<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href="?page=<?php echo $i; ?>" class="<?php echo ($page == $i) ? 'active' : ''; ?>"><?php echo $i; ?></a>
<?php endfor; ?>
</div>
</div>
</main>
</body>
</html>
