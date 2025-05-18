<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование сборки</title>
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

        $assemblyId = isset($_GET['id']) ? (int)$_GET['id'] : null;

        if ($assemblyId === null) {
            echo 'Ошибка: не указан ID сборки.';
            exit;
        }

        $assembly = $pdo->query("SELECT * FROM assemblies WHERE id = $assemblyId")->fetch();

        if ($assembly === false) {
            echo 'Ошибка: сборка не найдена.';
            exit;
        }

        if ($_GET['go'] == 'edit') {
            $processor_id = $_POST['processor_id'];
            $motherboard_id = $_POST['motherboard_id'];
            $ram_id = $_POST['ram_id'];
            $storage_id = $_POST['storage_id'];
            $power_supply_id = $_POST['power_supply_id'];
            $case_id = $_POST['case_id'];
            $cooling_system_id = $_POST['cooling_system_id'];
            $graphics_card_id = $_POST['graphics_card_id'];
            $sound_card_id = $_POST['sound_card_id'];
            $keyboard_id = $_POST['keyboard_id'];
            $mouse_id = $_POST['mouse_id'];

            $stmt = $pdo->prepare('UPDATE assemblies SET processor_id = :processor_id, motherboard_id = :motherboard_id, ram_id = :ram_id, storage_id = :storage_id, power_supply_id = :power_supply_id, case_id = :case_id, cooling_system_id = :cooling_system_id, graphics_card_id = :graphics_card_id, sound_card_id = :sound_card_id, keyboard_id = :keyboard_id, mouse_id = :mouse_id WHERE id = :id');
            $stmt->execute([
                'processor_id' => $processor_id,
                'motherboard_id' => $motherboard_id,
                'ram_id' => $ram_id,
                'storage_id' => $storage_id,
                'power_supply_id' => $power_supply_id,
                'case_id' => $case_id,
                'cooling_system_id' => $cooling_system_id,
                'graphics_card_id' => $graphics_card_id,
                'sound_card_id' => $sound_card_id,
                'keyboard_id' => $keyboard_id,
                'mouse_id' => $mouse_id,
                'id' => $assemblyId
            ]);

            echo '<script>
alert("Сборка успешно отредактирована!");
window.location = "/admin/manage.php";
</script>';
        }
       ?>
            <form action="edit.php?go=edit&id=<?php echo urlencode($_GET['id']); ?>" method="post">
                <label>Процессор:</label>
                <select name="processor_id">
                    <?php
                    $processors = $pdo->query('SELECT id, name FROM components WHERE type = "processor"')->fetchAll();
                    foreach ($processors as $processor) {
                        echo '<option value="' . $processor['id'] . '" ' . ($assembly['processor_id'] == $processor['id'] ? 'selected' : '') . '>' . $processor['name'] . '</option>';
                    }
                    ?>
                </select>

                <label>Материнская плата:</label>
                <select name="motherboard_id">
                    <?php
                    $motherboards = $pdo->query('SELECT id, name FROM components WHERE type = "motherboard"')->fetchAll();
                    foreach ($motherboards as $motherboard) {
                        echo '<option value="' . $motherboard['id'] . '" ' . ($assembly['motherboard_id'] == $motherboard['id'] ? 'selected' : '') . '>' . $motherboard['name'] . '</option>';
                    }
                    ?>
                </select>

                <label>Оперативная память:</label>
                <select name="ram_id">
                    <?php
                    $rams = $pdo->query('SELECT id, name FROM components WHERE type = "ram"')->fetchAll();
                    foreach ($rams as $ram) {
                        echo '<option value="' . $ram['id'] . '" ' . ($assembly['ram_id'] == $ram['id'] ? 'selected' : '') . '>' . $ram['name'] . '</option>';
                    }
                    ?>
                </select>

                <label>Хранилище:</label>
                <select name="storage_id">
                    <?php
                    $storages = $pdo->query('SELECT id, name FROM components WHERE type = "storage"')->fetchAll();
                    foreach ($storages as $storage) {
                        echo '<option value="' . $storage['id'] . '" ' . ($assembly['storage_id'] == $storage['id'] ? 'selected' : '') . '>' . $storage['name'] . '</option>';
                    }
                    ?>
                </select>

                <label>Блок питания:</label>
                <select name="power_supply_id">
                    <?php
                    $powerSupplies = $pdo->query('SELECT id, name FROM components WHERE type = "power_supply"')->fetchAll();
                    foreach ($powerSupplies as $powerSupply) {
                        echo '<option value="' . $powerSupply['id'] . '" ' . ($assembly['power_supply_id'] == $powerSupply['id'] ? 'selected' : '') . '>' . $powerSupply['name'] . '</option>';
                    }
                    ?>
                </select>

                <label>Корпус:</label>
                <select name="case_id">
                    <?php
                    $cases = $pdo->query('SELECT id, name FROM components WHERE type = "case"')->fetchAll();
                    foreach ($cases as $case) {
                        echo '<option value="' . $case['id'] . '" ' . ($assembly['case_id'] == $case['id'] ? 'selected' : '') . '>' . $case['name'] . '</option>';
                    }
                    ?>
                </select>

                <label>Система охлаждения:</label>
                <select name="cooling_system_id">
                    <?php
                    $coolingSystems = $pdo->query('SELECT id, name FROM components WHERE type = "cooling_system"')->fetchAll();
                    foreach ($coolingSystems as $coolingSystem) {
                        echo '<option value="' . $coolingSystem['id'] . '" ' . ($assembly['cooling_system_id'] == $coolingSystem['id'] ? 'selected' : '') . '>' . $coolingSystem['name'] . '</option>';
                    }
                    ?>
                </select>

                <label>Видеокарта:</label>
                <select name="graphics_card_id">
                    <?php
                    $graphicsCards = $pdo->query('SELECT id, name FROM components WHERE type = "graphics_card"')->fetchAll();
                    foreach ($graphicsCards as $graphicsCard) {
                        echo '<option value="' . $graphicsCard['id'] . '" ' . ($assembly['graphics_card_id'] == $graphicsCard['id'] ? 'selected' : '') . '>' . $graphicsCard['name'] . '</option>';
                    }
                    ?>
                </select>

                <label>Звуковая карта:</label>
                <select name="sound_card_id">
    <?php
    $soundCards = $pdo->query('SELECT id, name FROM components WHERE type = "sound_card"')->fetchAll();
    foreach ($soundCards as $soundCard) {
        echo '<option value="' . $soundCard['id'] . '" ' . ($assembly['sound_card_id'] == $soundCard['id'] ? 'selected' : '') . '>' . $soundCard['name'] . '</option>';
    }
    ?>
</select>

<label>Клавиатура:</label>
<select name="keyboard_id">
    <?php
    $keyboards = $pdo->query('SELECT id, name FROM components WHERE type = "keyboard"')->fetchAll();
    foreach ($keyboards as $keyboard) {
        echo '<option value="' . $keyboard['id'] . '" ' . ($assembly['keyboard_id'] == $keyboard['id'] ? 'selected' : '') . '>' . $keyboard['name'] . '</option>';
    }
    ?>
</select>

<label>Мышь:</label>
<select name="mouse_id">
    <?php
    $mice = $pdo->query('SELECT id, name FROM components WHERE type = "mouse"')->fetchAll();
    foreach ($mice as $mouse) {
        echo '<option value="' . $mouse['id'] . '" ' . ($assembly['mouse_id'] == $mouse['id'] ? 'selected' : '') . '>' . $mouse['name'] . '</option>';
    }
    ?>
</select>
<input type="submit" value="Изменить">
</form>
</main>
</body>
</html>
