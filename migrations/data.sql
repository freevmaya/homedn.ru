SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


INSERT INTO `yii_calc_inputdata` (`id`, `key`, `user_data`) VALUES
(1, 'r5Nujeuv0guJ4KizB19yQ_pSwAQMfX5w', '{\"address\":\"7200000100001660016\",\"roomcount\":\"1\",\"square\":\"160\",\"doorcount\":\"1\",\"toiletcount\":\"1\",\"second\":\"0\",\"wall\":\"0\"}');

INSERT INTO `yii_callorder` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'sxdcfvgbhnjmk', '1234567890', 1556870891, 1556870891),
(2, 'sxdcfvgbhnjmk', '1234567890', 1556871404, 1556871404);

INSERT INTO `yii_employee` (`id`, `fio`, `place`, `photo1`, `photo2`, `video`, `sort`, `sort_slide`) VALUES
(1, 'Шокир Шерметов', 'Директор компании «Home»', '/uploads/images/eph11.png', '/uploads/images/eph12.png', 'https://www.youtube.com/watch?v=nFKxH7am16A', 100, 300),
(2, 'Иванов Иван', 'Мастер компании «Home»', '/uploads/images/eph21.png', '/uploads/images/eph22.png', 'https://www.youtube.com/watch?v=nFKxH7am16A', 200, 400),
(3, 'Федор Федоров', 'Менеджер компании «Home»', '/uploads/images/eph31.png', '/uploads/images/eph32.png', 'https://www.youtube.com/watch?v=nFKxH7am16A', 300, 500),
(4, 'Игорь Петров', 'Мастер компании «Home»', '/uploads/images/eph41.png', '/uploads/images/eph42.png', 'https://www.youtube.com/watch?v=nFKxH7am16A', 400, 600),
(5, 'Дарья Иванова', 'Дизайнер компании «Home»', '/uploads/images/eph51.png', '/uploads/images/eph52.png', 'https://www.youtube.com/watch?v=nFKxH7am16A', 500, 200),
(6, 'Любовь Сидорова', 'Бухгалтер компании «Home»', '/uploads/images/eph61.png', '/uploads/images/eph62.png', 'https://www.youtube.com/watch?v=nFKxH7am16A', 600, 700),
(7, 'Даниил Павлов', 'Прораб компании «Home»', '', '/uploads/images/eph72.png', 'https://www.youtube.com/watch?v=nFKxH7am16A', NULL, 100);

INSERT INTO `yii_main_portfolio_gallery` (`id`, `sort`, `image`) VALUES
(1, 100, '/uploads/images/pgallery/ph1.jpg'),
(2, 200, '/uploads/images/pgallery/ph2.jpg'),
(3, 300, '/uploads/images/pgallery/ph3.jpg'),
(4, 400, '/uploads/images/pgallery/ph4.jpg'),
(5, 500, '/uploads/images/pgallery/ph5.jpg'),
(6, 600, '/uploads/images/pgallery/ph1.jpg'),
(7, 700, '/uploads/images/pgallery/ph2.jpg'),
(8, 800, '/uploads/images/pgallery/ph3.jpg'),
(9, 900, '/uploads/images/pgallery/ph4.jpg'),
(10, 1000, '/uploads/images/pgallery/ph5.jpg');

INSERT INTO `yii_measure` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'dededede', '1323231312', 1556871471, 1556871471);

INSERT INTO `yii_menu` (`id`, `name`, `position`) VALUES
(1, 'Главное', 'mainmenu'),
(2, 'Верхнее', 'tophidden'),
(3, 'Подвал 1', 'footermain'),
(4, 'Подвал 2', 'footerrepair'),
(5, 'Подвал 3', 'footerworks');

INSERT INTO `yii_menu_content` (`id`, `menu_id`, `name`, `url`, `page_id`, `sort`, `menu_content_id`) VALUES
(1, 1, 'Главная', '/', 1, 100, NULL),
(2, 1, 'Наши работы', '/portfolio/', 2, 200, NULL),
(3, 1, 'Цены', '/czeny/', 3, 300, NULL),
(4, 1, 'Команда', '/komanda/', 4, 400, NULL),
(5, 1, 'Контакты', '/kontakty/', 5, 500, NULL),
(6, 2, 'Главная', '/', 1, 100, NULL),
(7, 2, 'Наши работы', '/portfolio/', 2, 200, 6),
(8, 2, 'Цены', '/czeny/', 3, 300, 6),
(9, 2, 'Команда', '/komanda/', 4, 400, 6),
(10, 2, 'Блог', '/blog/', 7, 500, 6),
(11, 2, 'Контакты', '/kontakty/', 5, 600, 6),
(12, 2, 'Дизайн интерьера', '', NULL, 700, NULL),
(13, 2, 'Кухни', '', NULL, 800, 12),
(14, 2, 'Шкафы - купе', '', NULL, 900, 12),
(15, 2, 'Окна', '', NULL, 1000, 12),
(16, 2, 'Натяжные потолки', '', NULL, 1100, 12),
(17, 2, 'Ремонт квартир', '', NULL, 1200, NULL),
(18, 2, 'Ремонт новостроек', '', NULL, 1300, 17),
(19, 2, 'Ремонт коттеджей', '', NULL, 1400, 17),
(20, 2, 'Ремонт офисов', '', NULL, 1500, 17),
(21, 2, 'Ремонт комнат', '', NULL, 1600, 17),
(22, 3, 'Главная', '/', 1, 100, NULL),
(23, 3, 'Портфолио', '/portfolio/', 2, 200, NULL),
(24, 3, 'Цены', '/czeny/', 3, 300, NULL),
(25, 3, 'Отзывы', '/otzyvy/', 23, 400, NULL),
(26, 3, 'Статьи', '/blog/', 7, 500, NULL),
(27, 3, 'Контакты', '/kontakty/', 5, 600, NULL),
(28, 4, 'Ремонт квартир', '/', NULL, 100, NULL),
(29, 4, 'Ремонт новостроек', '/', NULL, 200, NULL),
(30, 4, 'Ремонт коттеджей', '/', NULL, 300, NULL),
(31, 4, 'Ремонт офисов', '/', NULL, 400, NULL),
(32, 4, 'Ремонт комнат', '/', NULL, 500, NULL),
(33, 5, 'Кухни', '/', NULL, 100, NULL),
(34, 5, 'Шкафы-купе', '/', NULL, 200, NULL),
(35, 5, 'Окна', '/', NULL, 300, NULL),
(36, 5, 'Натяжные потолки', '/', NULL, 400, NULL);

INSERT INTO `yii_option_type` (`id`, `name`, `field`) VALUES
(1, 'Изображение', '4'),
(2, 'Строка', '1'),
(3, 'Текст', '2'),
(4, 'Стилизованный текст', '6'),
(5, 'Файл', '7'),
(6, 'Кнопка', '8');

INSERT INTO `yii_page` (`id`, `name`, `sort`, `page_type_id`, `page_id`, `template_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Главная', NULL, 1, NULL, 2, 1, 1555687039, 1557404906),
(2, 'Портфолио', NULL, 1, NULL, 3, 1, 1556646734, 1556697140),
(3, 'Цены', NULL, 1, NULL, 4, 1, 1556697344, 1556697344),
(4, 'Команда', NULL, 1, NULL, 5, 1, 1556697507, 1556697507),
(5, 'Контакты', NULL, 1, NULL, 6, 1, 1556697605, 1556697605),
(6, 'Политика конфиденциальности', NULL, 1, NULL, NULL, 1, 1556709211, 1556709309),
(7, 'Блог', NULL, 1, NULL, 7, 1, 1556725842, 1556725842),
(8, 'Ремонты квартир', 100, 2, 2, 8, 1, 1557142959, 1557142959),
(9, 'Ремонт коттеджей', 200, 2, 2, 8, 1, 1557143056, 1557143056),
(10, 'Ремонт офисов', 300, 2, 2, 8, 1, 1557143084, 1557143084),
(11, 'Дизайн интерьера', 400, 2, 2, 8, 1, 1557143117, 1557143117),
(12, 'Евро ремонт двухкомнатной квартиры', 100, 3, 8, NULL, 1, 1557143404, 1557143404),
(13, 'Косметический ремонт', 200, 3, 8, NULL, 1, 1557143453, 1557143453),
(14, 'Евро ремонт двухкомнатной квартиры 2', 300, 3, 8, NULL, 1, 1557143492, 1557143492),
(15, 'Косметический ремонт 2', 100, 3, 9, NULL, 1, 1557143549, 1557143549),
(16, 'Евро ремонт двухкомнатной квартиры 3', 200, 3, 9, NULL, 1, 1557143581, 1557143581),
(17, 'Косметический ремонт 3', 300, 3, 9, NULL, 1, 1557143605, 1557143605),
(18, 'Евро ремонт двухкомнатной квартиры 4', 100, 3, 10, NULL, 1, 1557143632, 1557143632),
(19, 'Косметический ремонт 5', 200, 3, 10, NULL, 1, 1557143662, 1557143662),
(20, 'Евро ремонт двухкомнатной квартиры 5', 100, 3, 11, NULL, 1, 1557143695, 1557143695),
(21, 'Косметический ремонт 6', 200, 3, 11, NULL, 1, 1557143724, 1557143724),
(22, 'Калькулятор ремонта', NULL, 1, NULL, 10, 1, 1557254586, 1557254586),
(23, 'Отзывы', NULL, 1, NULL, NULL, 1, 1557564279, 1557564279);

INSERT INTO `yii_page_option` (`id`, `name`, `code`, `default_value`, `sort`, `template_id`, `option_type_id`) VALUES
(1, 'Экран 1. Фон', 'back1', '', 100, 2, 1),
(2, 'Экран 1. Заголовок 1', 'header1', '', 200, 2, 3),
(3, 'Экран 1. Заголовок 2', 'header2', '', 300, 2, 3),
(4, 'Экран 1. Надпись на кнопке', 'cta1text', '', 400, 2, 2),
(5, 'Экран 1. Ссылка на кнопке', 'cta1link', '', 500, 2, 2),
(6, 'Экран 1. Ссылка на видео', 'video1link', '', 700, 2, 2),
(7, 'Экран 1. Надпись на видео', 'video1text', '', 600, 2, 2),
(8, 'Экран 3. Заголовок', 'header3', '', 800, 2, 3),
(9, 'Экран 3. Ссылка на видео', 'video2link', '', 900, 2, 2),
(10, 'Экран 3. Фон для видео', 'back2', '', 1000, 2, 1),
(11, 'Экран 4. Заголовок', 'header4', '', 1100, 2, 3),
(12, 'Экран 4. Список', 'list1', '', 1200, 2, 4),
(13, 'Экран 4. Файл договора', 'file1', '', 1300, 2, 5),
(14, 'Экран 4. Текст для ссылки', 'file1text', '', 1400, 2, 2),
(15, 'Экран 4. Изображение договора', 'image1', '', 1500, 2, 1),
(16, 'Экран 5. Основное изображение', 'image2', '', 1600, 2, 1),
(17, 'Экран 5. Ссылка на видео', 'video3link', '', 1700, 2, 2),
(18, 'Экран 5. Заголовок', 'header5', '', 1800, 2, 3),
(19, 'Экран 5. Список', 'list2', '', 1900, 2, 4),
(20, 'Экран 5. Надпись на кнопке', 'cta2text', '', 2000, 2, 2),
(21, 'Экран 5. Ссылка на кнопке', 'cta2link', '', 2100, 2, 2),
(22, 'Экран 6. Заголовок', 'header6', '', 2200, 2, 3),
(23, 'Список', 'button1', '/admin/work-progress', 2300, 2, 6),
(24, 'Экран 7. Заголовок', 'header7', '', 2400, 2, 3),
(25, 'Цены', 'button2', '/admin/price-caption', 2500, 2, 6),
(26, 'Экран 8. Фон', 'back3', '', 2600, 2, 1),
(27, 'Экран 8. Заголовок', 'header8', '', 2700, 2, 2),
(28, 'Экран 8. Количество объектов', 'header9', '', 2800, 2, 2),
(29, 'Галерея портфолио', 'button3', '/admin/main-portfolio-gallery', 2900, 2, 6),
(30, 'Экран 8. Текст на ссылке', 'cta3text', '', 3000, 2, 2),
(31, 'Экран 8. Ссылка', 'cta3link', '', 3100, 2, 2),
(32, 'Экран 9. Заголовок', 'header10', '', 3200, 2, 3),
(33, 'Экран 9. Количество отображаемых отзывов', 'reviewcountopen', '', 3300, 2, 2),
(34, 'Экран 9. Общее количество отзывов', 'reviewcountall', '', 3400, 2, 2),
(35, 'Экран 9. Текст на кнопке всех отзывов', 'cta4text', '', 3500, 2, 2),
(36, 'Экран 10. Заголовок', 'header11', '', 3600, 2, 3),
(37, 'Список видео', 'button4', '/youtube-video/index', 3700, 2, 6),
(38, 'Экран 10. Надпись на ссылке', 'cta5text', '', 3800, 2, 2),
(39, 'Экран 10. Ссылка на канал', 'cta5link', '', 3900, 2, 2),
(40, 'Экран 11. Заголовок', 'header12', '', 4000, 2, 3),
(41, 'Экран 11. Изображение', 'image3', '', 4100, 2, 1),
(42, 'Заголовок калькулятора', 'header13', '', 4200, 2, 2),
(43, 'Текст на кнопке перехода на калькулятор', 'cta6text', '', 4300, 2, 2),
(44, 'Экран 12. Заголовок 1', 'header14', '', 4400, 2, 3),
(45, 'Экран 12. Заголовок 2', 'header15', '', 4500, 2, 3),
(46, 'Экран 12. Описание', 'text1desc', '', 4600, 2, 3);

INSERT INTO `yii_page_option_value` (`id`, `page_option_id`, `page_id`, `value`) VALUES
(1, 1, 1, '/uploads/images/back1.jpg'),
(2, 2, 1, 'Качественный ремонт квартир\r\nв Тюмени от 2500 р/м. кв'),
(3, 3, 1, 'Не выполнили работу в срок? Вернем деньги.\r\nРаботаем без предоплаты!'),
(4, 4, 1, 'Узнать стоимость ремонта'),
(5, 5, 1, '#foz-measure'),
(6, 7, 1, 'Видео о компании'),
(7, 6, 1, 'https://www.youtube.com/watch?v=nFKxH7am16A'),
(8, 8, 1, 'Почему Тюменцы выбирают компанию Home?'),
(9, 9, 1, 'https://www.youtube.com/watch?v=nFKxH7am16A'),
(10, 10, 1, '/uploads/images/bcvideo1.png'),
(11, 11, 1, 'Гарантируем сроки и качество работ'),
(12, 12, 1, '<ul>\r\n	<li>Подписываем официальный договор, где зафиксированы<br />\r\n	сроки и точная стоимость работ.</li>\r\n	<li>При не соблюдении сроком, мы выплачиваем 0,1 %<br />\r\n	от стоимости работ в день!</li>\r\n	<li>Вы получаете гарантию 2 года на все работы по договору.</li>\r\n	<li>Мы работаем с физическими и юридическими лицами.</li>\r\n</ul>\r\n'),
(13, 13, 1, '/uploads/dogovor.docx'),
(14, 14, 1, 'Скачать договор'),
(15, 15, 1, '/uploads/images/contract.png'),
(16, 16, 1, '/uploads/images/photo5.jpg'),
(17, 17, 1, 'https://www.youtube.com/watch?v=nFKxH7am16A'),
(18, 18, 1, 'Работаем без предоплаты'),
(19, 19, 1, '<ul>\r\n	<li>Производим замер, согласовываем стоимость.</li>\r\n	<li>Фиксируем сроки и заключаем договор.</li>\r\n	<li>Разбиваем работу на этапы.</li>\r\n	<li>Вы платите только за выполненные этапы<br />\r\n	работы!</li>\r\n</ul>\r\n'),
(20, 20, 1, 'Вызвать замерщика'),
(21, 21, 1, '#foz-measure'),
(22, 22, 1, 'Вы контролируете весь ход работы, \r\nполучаете скидки на материал'),
(23, 24, 1, 'Виды ремонта и стоимость'),
(24, 26, 1, '/uploads/images/back2.jpg'),
(25, 27, 1, 'Наши работы и отзывы:'),
(26, 28, 1, '26 объектов'),
(27, 30, 1, 'Посмотреть всё портфолио'),
(28, 31, 1, '/portfolio/'),
(29, 32, 1, 'Отзывы клиентов'),
(30, 33, 1, '2'),
(31, 34, 1, '6'),
(32, 35, 1, 'Смотреть еще'),
(33, 36, 1, 'Посмотрите наш Youtube канал'),
(34, 38, 1, 'Перейти на Youtube канал'),
(35, 39, 1, 'https://www.youtube.com/'),
(36, 40, 1, 'Рассчитайте стоимость вашего ремонта'),
(37, 41, 1, '/uploads/images/calcimage.jpg'),
(38, 42, 1, 'Конструктор ремонта'),
(39, 43, 1, 'Перейти к конструктору'),
(40, 44, 1, 'Хочешь получить скидку?'),
(41, 45, 1, 'Подпишись на наши соц. сети и получи скидку на ремонт.'),
(42, 46, 1, 'Подробности узнайте у менеджера по телефону: +7 (3452) 901-906');

INSERT INTO `yii_page_seo` (`id`, `page_id`, `url`, `h1`, `title`, `keywords`, `description`, `content`, `noindex`) VALUES
(1, 2, 'portfolio', '', '', '', '', '', 0),
(2, 3, 'czeny', NULL, NULL, NULL, NULL, NULL, 0),
(3, 4, 'komanda', NULL, NULL, NULL, NULL, NULL, 0),
(4, 5, 'kontakty', NULL, NULL, NULL, NULL, NULL, 0),
(5, 6, 'politics', '', '', '', '', '', 0),
(6, 7, 'blog', NULL, NULL, NULL, NULL, NULL, 0),
(7, 1, 'glavnaya', 'h1', 'ttt', 'kkk', 'ddd', '<p>ccc</p>\r\n', 0),
(8, 8, 'remonty-kvartir', NULL, NULL, NULL, NULL, NULL, 0),
(9, 9, 'remont-kottedzhej', NULL, NULL, NULL, NULL, NULL, 0),
(10, 10, 'remont-ofisov', NULL, NULL, NULL, NULL, NULL, 0),
(11, 11, 'dizajn-interera', NULL, NULL, NULL, NULL, NULL, 0),
(12, 12, 'evro-remont-dvuhkomnatnoj-kvartiry', NULL, NULL, NULL, NULL, NULL, 0),
(13, 13, 'kosmeticheskij-remont', NULL, NULL, NULL, NULL, NULL, 0),
(14, 14, 'evro-remont-dvuhkomnatnoj-kvartiry-2', NULL, NULL, NULL, NULL, NULL, 0),
(15, 15, 'kosmeticheskij-remont-2', NULL, NULL, NULL, NULL, NULL, 0),
(16, 16, 'evro-remont-dvuhkomnatnoj-kvartiry-3', NULL, NULL, NULL, NULL, NULL, 0),
(17, 17, 'kosmeticheskij-remont-3', NULL, NULL, NULL, NULL, NULL, 0),
(18, 18, 'evro-remont-dvuhkomnatnoj-kvartiry-4', NULL, NULL, NULL, NULL, NULL, 0),
(19, 19, 'kosmeticheskij-remont-5', NULL, NULL, NULL, NULL, NULL, 0),
(20, 20, 'evro-remont-dvuhkomnatnoj-kvartiry-5', NULL, NULL, NULL, NULL, NULL, 0),
(21, 21, 'kosmeticheskij-remont-6', NULL, NULL, NULL, NULL, NULL, 0),
(22, 22, 'kalkulyator-remonta', NULL, NULL, NULL, NULL, NULL, 0),
(23, 23, 'otzyvy', NULL, NULL, NULL, NULL, NULL, 0);

INSERT INTO `yii_page_type` (`id`, `name`, `code`, `template_id`) VALUES
(1, 'Страницы', 'page', 1),
(2, 'Разделы портфолио', 'portfolio-section', 8),
(3, 'Объекты портфолио', 'portfolio-element', 9);

INSERT INTO `yii_portfolio_review` (`id`, `header`, `page_id`, `video`, `cover`, `sort`) VALUES
(1, 'Ремонт квартиры по адресу:\r\nг. Тюмень, ул. Республики 154', 12, 'https://www.youtube.com/watch?v=nFKxH7am16A', '/uploads/images/cover1.png', 100),
(2, 'Ремонт квартиры по адресу:\r\nг. Тюмень, ул. Республики 154', 16, 'https://www.youtube.com/watch?v=nFKxH7am16A', '/uploads/images/cover2.png', 200),
(4, 'Ремонт квартиры по адресу:\r\nг. Тюмень, ул. Республики 154', 17, 'https://www.youtube.com/watch?v=nFKxH7am16A', '/uploads/images/cover1.png', 300);

INSERT INTO `yii_price_caption` (`id`, `name`, `description`, `sort`) VALUES
(1, 'Ремонт квартир', 'на ремонтные работы\r\nс материалами и без', 100),
(2, 'Ремонт коттеджей', 'на ремонтные работы\r\nс материалами и без', 200),
(3, 'Ремонт офисов', 'на ремонтные работы\r\nс материалами и без', 300),
(4, 'Дизайн интерьера', 'на ремонтные работы\r\nс материалами и без', 400);

INSERT INTO `yii_price_composit` (`id`, `price_option_id`, `price_element_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 3, 1),
(5, 3, 2),
(6, 3, 3),
(7, 3, 4);

INSERT INTO `yii_price_element` (`id`, `name`, `price_caption_id`, `description`, `sort`) VALUES
(1, 'Ремонтные\r\nработы', 1, '<p>Всплывающее окно</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1>Можно вставлять заголовки</h1>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>таблицы</td>\r\n			<td>разные</td>\r\n		</tr>\r\n		<tr>\r\n			<td>всякие</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>картинки</strong></p>\r\n\r\n<p><img alt=\"\" src=\"/uploads/images/logo.png\" style=\"height:38px; width:104px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>и прочее</em></p>\r\n\r\n<p>&nbsp;</p>\r\n', 100),
(2, 'Черновые материалы', 1, '', 200),
(3, 'Чистовые материалы', 1, '', 300),
(4, 'Дизайн\r\nпроект', 1, '', 400);

INSERT INTO `yii_price_option` (`id`, `name`, `price_caption_id`, `min_price`, `sort`) VALUES
(1, 'Ремонт\r\nпод ключ', 1, 2500, 100),
(2, 'Ремонт с черновыми\r\nматериалами', 1, 4000, 200),
(3, 'Ремонт с чистовыми\r\nматериалами', 1, 6000, 300);

INSERT INTO `yii_site_option` (`id`, `name`, `code`, `value`, `sort`, `option_type_id`) VALUES
(1, 'Логотип', 'logo', '/uploads/images/logo.png', 100, 1),
(2, 'Телефон', 'phone', '+7 (3452) 901-906', 200, 2),
(3, 'E-mail для уведомлений', 'email', 'mail@v-stepanov.ru', 300, 2),
(4, 'Форма заказа звонка. Заголовок', 'fozcallheader', 'Укажите номер телефона', 400, 3),
(5, 'Форма заказа звонка. Подзаголовок', 'fozcallsubheader', 'Мы позвоним вам и ответим на все ваши вопросы', 500, 3),
(6, 'Форма заказа звонка. Надпись на кнопке', 'fozcallcta', 'Заказать звонок', 600, 2),
(7, 'Форма вызова замерщика. Заголовок', 'fozmeasureheader', 'Закажите бесплатный выезд замерщика', 700, 3),
(8, 'Форма вызова замерщика. Подзаголовок', 'fozmeasuresubheader', 'и узнайте точную стоимость ремонта квартиры', 800, 3),
(9, 'Форма вызова замерщика. Надпись на кнопке', 'fozmeasurecta', 'Узнать стоимость', 900, 2),
(10, 'Страница с калькулятором', 'calcpageid', '22', 1000, 2),
(11, 'Подвал. Призыв к действию', 'footercta', 'Рассчитайте примерную стоимость ремонта', 1100, 3),
(12, 'Надпись на кнопке', 'footerlinktext', 'Рассчитать', 1200, 2),
(13, 'Ссылка', 'footerlinkurl', '#foz-measure', 1300, 2),
(14, 'Левое меню', 'footermenu1', '/admin/menu-content?menu_id=3', 1400, 6),
(15, 'Заголовок над центральным меню', 'footermenu2header', 'Виды ремонта', 1500, 2),
(16, 'Центральное меню', 'footermenu2', '/admin/menu-content?menu_id=4', 1600, 6),
(17, 'Заголовок над правым меню', 'footermenu3header', 'Виды работ', 1700, 2),
(18, 'Правое меню', 'footermenu3', '/admin/menu-content?menu_id=5', 1700, 6),
(19, 'Заголовок над социальными сетями', 'footersocialheader', 'Приятные подарки для наших подписчиков', 1900, 2),
(20, 'Режим работы', 'footerwork', 'Режим работы: пн. - сб. 9: 00 - 18: 00\r\nВоскресенье выходной.\r\n \r\nАдрес: Россия, Тюмень, \r\nул. 30 лет Победы, 27/1 оф. 201\r\n \r\nПочта\r\nhomedesign72@mail.ru', 2000, 3),
(21, 'Ссылка на карту сайта', 'sitemaplink', '/sitemap/', 2100, 2),
(22, 'Копирайт', 'copyright', '<p><img alt=\"\" src=\"/uploads/images/idealogo.png\" style=\"height:51px; width:141px\" /></p>\r\n\r\n<p><span style=\"font-size:12px\">&copy; 2019&nbsp;&laquo;Ремонт квартир&raquo;<br />\r\nРазработка и продвижение сайтов. Веб-студия &laquo;Idea-studio&raquo;</span></p>\r\n', 2200, 4);

INSERT INTO `yii_social` (`id`, `name`, `url`, `sort`, `icon_top`, `icon_foz`, `icon_footer`) VALUES
(1, 'VK', 'https://vk.com/', 100, '/uploads/images/socials/vk.png', '/uploads/images/socials/vk2.png', '/uploads/images/socials/vk3.png'),
(2, 'Facebook', 'https://fb.com/', 200, '/uploads/images/socials/fb.png', '/uploads/images/socials/fb2.png', '/uploads/images/socials/fb3.png'),
(3, 'Одноклассники', 'https://ok.ru/', 300, '/uploads/images/socials/ok.png', '/uploads/images/socials/ok2.png', ''),
(4, 'Instagram', 'https://instagram.com/', 400, '/uploads/images/socials/in.png', '/uploads/images/socials/in2.png', ''),
(5, 'YouTube', 'https://youtube.com/', 500, '/uploads/images/socials/yt.png', '/uploads/images/socials/yt2.png', '/uploads/images/socials/yt3.png');

INSERT INTO `yii_template` (`id`, `path_front`) VALUES
(1, 'page.php'),
(2, 'page-home.php'),
(3, 'page-portfolio.php'),
(4, 'page-price.php'),
(5, 'page-team.php'),
(6, 'page-contacts.php'),
(7, 'page-blog.php'),
(8, 'portfolio-section.php'),
(9, 'portfolio-element.php'),
(10, 'page-calculator.php');

INSERT INTO `yii_work_progress` (`id`, `name`, `image`, `text`, `link`, `url`, `sort`) VALUES
(1, 'Гаратния 2 года', '/uploads/images/l1.png', 'Выдаем гарантийный сертификат на 2 года.', 'Посмотреть пример', '/uploads/sert.pdf', 100),
(2, 'Фото и видео отчеты', '/uploads/images/l2.png', 'Предоставляем фото и видео отчеты о работе.', 'Посмотреть пример', '/', 200),
(3, 'Собственный персонал', '/uploads/images/l3.png', 'Все специализированные\r\nработы выполняются \r\nотдельными людьми.', 'Наша команда', '/komanda/', 300),
(4, 'Экономия<br>на материалах', '/uploads/images/l4.png', 'Закупаем материал \r\nпо оптовым ценам.', '', '', 400),
(5, 'Подбор материалов  с дизайнером', '/uploads/images/l5.png', 'Бесплатно консультируем \r\nи подбираем материал.', '', '', 500),
(6, 'Смета не вырастет', '/uploads/images/l6.png', 'Цены за работы по смете фиксированы!', '', '', 600);

INSERT INTO `yii_youtube_video` (`id`, `link`, `sort`, `cover`) VALUES
(1, 'https://www.youtube.com/watch?v=nFKxH7am16A', 100, '/uploads/images/cover3.png'),
(2, 'https://www.youtube.com/watch?v=nFKxH7am16A', 200, '/uploads/images/cover4.png'),
(3, 'https://www.youtube.com/watch?v=nFKxH7am16A', 300, '/uploads/images/cover5.png'),
(4, 'https://www.youtube.com/watch?v=nFKxH7am16A', 400, '/uploads/images/cover6.png'),
(5, 'https://www.youtube.com/watch?v=nFKxH7am16A', 500, '/uploads/images/cover7.png'),
(6, 'https://www.youtube.com/watch?v=nFKxH7am16A', 600, '/uploads/images/cover8.png');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
