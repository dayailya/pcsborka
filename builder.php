<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сборка ПК</title>
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
    <h3>Выберите комплектующие:</h3>
        <form action="save.php" method="post">            
            <?php
            require_once 'includes/database.php';
         
            $processors = $pdo->query("SELECT * FROM components WHERE type = 'processor'")->fetchAll();
            echo '<div class="component-list">';
            echo '<h3>Процессор</h3>';
            echo '<select name="processor">';
            foreach ($processors as $processor) {
                echo '<option value="' . $processor['id'] . '">' . $processor['name'] . '</option>';
            }
            echo '</select>';
            echo '</div>'; 
                      
            $motherboards = $pdo->query("SELECT * FROM components WHERE type = 'motherboard'")->fetchAll();            
            echo '<div class="component-list">';
            echo '<h3>Материнская плата</h3>';
            echo '<select name="motherboard">';
            foreach ($motherboards as $motherboard) {
                echo '<option value="' . $motherboard['id'] . '">' . $motherboard['name'] . '</option>';
            }
            echo '</select>';
            echo '</div>';
         
            $ram = $pdo->query("SELECT * FROM components WHERE type = 'ram'")->fetchAll();            
            echo '<div class="component-list">';
            echo '<h3>Оперативная память</h3>';
            echo '<select name="ram">';
            foreach ($ram as $memory) {
                echo '<option value="' . $memory['id'] . '">' . $memory['name'] . '</option>';
            }
            echo '</select>';
            echo '</div>';
           
            $storage = $pdo->query("SELECT * FROM components WHERE type = 'storage'")->fetchAll();            
            echo '<div class="component-list">';
            echo '<h3>Накопитель</h3>';
            echo '<select name="storage">';
            foreach ($storage as $drive) {
                echo '<option value="' . $drive['id'] . '">' . $drive['name'] . '</option>';
            }
            echo '</select>';
            echo '</div>';
         
            $power_supplies = $pdo->query("SELECT * FROM components WHERE type = 'power_supply'")->fetchAll();            
            echo '<div class="component-list">';
            echo '<h3>Блок питания</h3>';
            echo '<select name="power_supply">';
            foreach ($power_supplies as $power_supply) {
                echo '<option value="' . $power_supply['id'] . '">' . $power_supply['name'] . '</option>';
            }
            echo '</select>';
            echo '</div>';
           
            $cases = $pdo->query("SELECT * FROM components WHERE type = 'case'")->fetchAll();            
            echo '<div class="component-list">';
            echo '<h3>Корпус</h3>';
            echo '<select name="case">';
            foreach ($cases as $case) {
                echo '<option value="' . $case['id'] . '">' . $case['name'] . '</option>';
            }
            echo '</select>';
            echo '</div>';
           
            $cooling_systems = $pdo->query("SELECT * FROM components WHERE type = 'cooling_system'")->fetchAll();
            echo '<div class="component-list">';
            echo '<h3>Система охлаждения</h3>';
            echo '<select name="cooling_system">';
            foreach ($cooling_systems as $cooling_system) {
                echo '<option value="' . $cooling_system['id'] . '">' . $cooling_system['name'] . '</option>';
            }
            echo '</select>';
            echo '</div>';

            $graphics_cards = $pdo->query("SELECT * FROM components WHERE type = 'graphics_card'")->fetchAll();
            echo '<div class="component-list">';
            echo '<h3>Видеокарта</h3>';
            echo '<select name="graphics_card">';
            foreach ($graphics_cards as $graphics_card) {
                echo '<option value="' . $graphics_card['id'] . '">' . $graphics_card['name'] . '</option>';
            }
            echo '</select>';
            echo '</div>';

            $sound_cards = $pdo->query("SELECT * FROM components WHERE type = 'sound_card'")->fetchAll();           
            echo '<div class="component-list">';
            echo '<h3>Звуковая карта</h3>';
            echo '<select name="sound_card">';
            foreach ($sound_cards as $sound_card) {
                echo '<option value="' . $sound_card['id'] . '">' . $sound_card['name'] . '</option>';
            }
            echo '</select>';
            echo '</div>';

            $keyboards = $pdo->query("SELECT * FROM components WHERE type = 'keyboard'")->fetchAll();            
            echo '<div class="component-list">';
            echo '<h3>Клавиатура</h3>';
            echo '<select name="keyboard">';
            foreach ($keyboards as $keyboard) {
                echo '<option value="' . $keyboard['id'] . '">' . $keyboard['name'] . '</option>';
            }
            echo '</select>';
            echo '</div>';

            $mice = $pdo->query("SELECT * FROM components WHERE type = 'mouse'")->fetchAll();
            echo '<div class="component-list">';
            echo '<h3>Мышь</h3>';
            echo '<select name="mouse">';
            foreach ($mice as $mouse) {
                echo '<option value="' . $mouse['id'] . '">' . $mouse['name'] . '</option>';
            }
            echo '</select>';
            echo '</div>';

            if (isset($_POST['save'])) {
                $_SESSION['assembly'] = $_POST;
            }
            ?>
            <input type="submit" name="save" value="создать сборку">
        </form>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>
