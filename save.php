<?php
require_once 'includes/database.php';

if (isset($_POST['processor'], $_POST['motherboard'], $_POST['ram'], $_POST['storage'], $_POST['power_supply'], $_POST['case'], $_POST['cooling_system'], $_POST['graphics_card'], $_POST['sound_card'], $_POST['keyboard'], $_POST['mouse'])) {
    $processor_id = $_POST['processor'];
    $motherboard_id = $_POST['motherboard'];
    $ram_id = $_POST['ram'];
    $storage_id = $_POST['storage'];
    $power_supply_id = $_POST['power_supply'];
    $case_id = $_POST['case'];
    $cooling_system_id = $_POST['cooling_system'];
    $graphics_card_id = $_POST['graphics_card'];
    $sound_card_id = $_POST['sound_card'];
    $keyboard_id = $_POST['keyboard'];
    $mouse_id = $_POST['mouse'];
    $total_price = 0;
    foreach ($_POST as $component_id) {
        $stmt = $pdo->prepare('SELECT price FROM components WHERE id = :id');
        $stmt->execute(['id' => $component_id]);
        $total_price += $stmt->fetchColumn();
    }
    $stmt = $pdo->prepare('INSERT INTO assemblies (processor_id, motherboard_id, ram_id, storage_id, power_supply_id, case_id, cooling_system_id, graphics_card_id, sound_card_id, keyboard_id, mouse_id, total_price) VALUES (:processor_id, :motherboard_id, :ram_id, :storage_id, :power_supply_id, :case_id, :cooling_system_id, :graphics_card_id, :sound_card_id, :keyboard_id, :mouse_id, :total_price)');
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
        'total_price' => $total_price
    ]);
    header('Location: view.php');
    exit();
} else {
    echo 'Не все данные были переданы.';
}
?>
