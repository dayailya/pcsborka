
--
-- Структура таблицы `assemblies`
--

CREATE TABLE `assemblies` (
  `id` int(11) NOT NULL,
  `processor_id` int(11) DEFAULT NULL,
  `motherboard_id` int(11) DEFAULT NULL,
  `ram_id` int(11) DEFAULT NULL,
  `storage_id` int(11) DEFAULT NULL,
  `power_supply_id` int(11) DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `cooling_system_id` int(11) DEFAULT NULL,
  `graphics_card_id` int(11) DEFAULT NULL,
  `sound_card_id` int(11) DEFAULT NULL,
  `keyboard_id` int(11) DEFAULT NULL,
  `mouse_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `assemblies`
--

INSERT INTO `assemblies` (`id`, `processor_id`, `motherboard_id`, `ram_id`, `storage_id`, `power_supply_id`, `case_id`, `cooling_system_id`, `graphics_card_id`, `sound_card_id`, `keyboard_id`, `mouse_id`, `total_price`) VALUES
(1, 3, 5, 8, 12, 14, 16, 20, 22, 25, 28, 31, 120500.00),
(2, 2, 4, 7, 10, 13, 16, 19, 22, 26, 29, 32, 144000.00),
(3, 3, 6, 8, 12, 15, 18, 21, 24, 27, 30, 33, 92000.00),
(4, 3, 6, 8, 10, 14, 16, 19, 22, 25, 28, 31, 121500.00),
(5, 3, 5, 8, 11, 14, 18, 21, 23, 26, 30, 33, 112000.00);

-- --------------------------------------------------------

--
-- Структура таблицы `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('processor','motherboard','ram','storage','power_supply','case','cooling_system','graphics_card','sound_card','keyboard','mouse') NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `components`
--

INSERT INTO `components` (`id`, `name`, `type`, `price`) VALUES
(1, 'Intel Core i7-12700K', 'processor', 12345.00),
(2, 'AMD Ryzen 7 5800X', 'processor', 24000.00),
(3, 'Intel Core i5-12600K', 'processor', 22000.00),
(4, 'ASUS ROG Strix Z690-E Gaming WiFi', 'motherboard', 18000.00),
(5, 'MSI B550M PRO-VDH WIFI', 'motherboard', 9000.00),
(6, 'ASRock B660M-HDV', 'motherboard', 7000.00),
(7, 'Corsair Vengeance LPX 16GB (2 x 8GB) DDR4 3200MHz', 'ram', 5000.00),
(8, 'G.Skill Trident Z RGB 16GB (2 x 8GB) DDR4 3600MHz', 'ram', 6000.00),
(9, 'Kingston HyperX Fury 16GB (2 x 8GB) DDR4 3200MHz', 'ram', 4500.00),
(10, 'Samsung 970 EVO Plus 1TB NVMe SSD', 'storage', 8000.00),
(11, 'Western Digital Blue 1TB HDD', 'storage', 3000.00),
(12, 'Crucial MX500 500GB SATA SSD', 'storage', 4000.00),
(13, 'EVGA SuperNOVA 650 G5, 80+ Gold', 'power_supply', 5500.00),
(14, 'SeaSonic Focus GX-650 80 PLUS Gold', 'power_supply', 6500.00),
(15, 'Corsair RMx RM650x, 80+ Gold', 'power_supply', 5000.00),
(16, 'NZXT H510', 'case', 4500.00),
(17, 'Fractal Design Meshify 2', 'case', 6000.00),
(18, 'Lian Li PC-O11D', 'case', 7500.00),
(19, 'Noctua NH-U12S', 'cooling_system', 4000.00),
(20, 'Cooler Master Hyper 212 RGB Black Edition', 'cooling_system', 2500.00),
(21, 'Be quiet! Pure Rock 2', 'cooling_system', 3500.00),
(22, 'NVIDIA GeForce RTX 3070 Ti', 'graphics_card', 52000.00),
(23, 'AMD Radeon RX 6700 XT', 'graphics_card', 42000.00),
(24, 'NVIDIA GeForce GTX 1660 Super', 'graphics_card', 20000.00),
(25, 'Creative Sound Blaster Z', 'sound_card', 6000.00),
(26, 'ASUS Xonar DG', 'sound_card', 3500.00),
(27, 'Aureon 7.1 V2', 'sound_card', 8000.00),
(28, 'Logitech G710+', 'keyboard', 3000.00),
(29, 'Razer BlackWidow Elite', 'keyboard', 4500.00),
(30, 'Corsair K70 RGB MK.2', 'keyboard', 5000.00),
(31, 'SteelSeries Rival 600', 'mouse', 2500.00),
(32, 'Logitech G502', 'mouse', 3000.00),
(33, 'Razer DeathAdder Elite', 'mouse', 4000.00);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `assemblies`
--
ALTER TABLE `assemblies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `processor_id` (`processor_id`),
  ADD KEY `motherboard_id` (`motherboard_id`),
  ADD KEY `ram_id` (`ram_id`),
  ADD KEY `storage_id` (`storage_id`),
  ADD KEY `power_supply_id` (`power_supply_id`),
  ADD KEY `case_id` (`case_id`),
  ADD KEY `cooling_system_id` (`cooling_system_id`),
  ADD KEY `graphics_card_id` (`graphics_card_id`),
  ADD KEY `sound_card_id` (`sound_card_id`),
  ADD KEY `keyboard_id` (`keyboard_id`),
  ADD KEY `mouse_id` (`mouse_id`);

--
-- Индексы таблицы `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `assemblies`
--
ALTER TABLE `assemblies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `assemblies`
--
ALTER TABLE `assemblies`
  ADD CONSTRAINT `assemblies_ibfk_1` FOREIGN KEY (`processor_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `assemblies_ibfk_10` FOREIGN KEY (`keyboard_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `assemblies_ibfk_11` FOREIGN KEY (`mouse_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `assemblies_ibfk_2` FOREIGN KEY (`motherboard_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `assemblies_ibfk_3` FOREIGN KEY (`ram_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `assemblies_ibfk_4` FOREIGN KEY (`storage_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `assemblies_ibfk_5` FOREIGN KEY (`power_supply_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `assemblies_ibfk_6` FOREIGN KEY (`case_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `assemblies_ibfk_7` FOREIGN KEY (`cooling_system_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `assemblies_ibfk_8` FOREIGN KEY (`graphics_card_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `assemblies_ibfk_9` FOREIGN KEY (`sound_card_id`) REFERENCES `components` (`id`);
COMMIT;

