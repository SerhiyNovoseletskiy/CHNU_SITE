-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 22 2015 г., 19:49
-- Версия сервера: 5.6.24
-- Версия PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `chnu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL,
  `rubrick` int(11) NOT NULL,
  `time_to_publick` date NOT NULL DEFAULT '2015-01-01',
  `keywords` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `alias`, `image`, `rubrick`, `time_to_publick`, `keywords`, `description`) VALUES
(1, 'yaksho-ne-mi-to-hto-–-dlya-voiiniv-ato', '85147281756989506c6fdefdd52b6856.jpg', 1, '2015-06-21', '', ''),
(2, 'umovi-roboti-zhurnalistiv-v-ukraiini-ta-ssha-vidkrita-diskusiya-yak-sposib-obminyatisya-dosvidom', '42178ae068afeaea489bfadea3c7cb5c.jpg', 1, '2015-06-21', '', ''),
(3, 'yakas-podiya', '96eec4598b22cf2408e458e0feae4d3b.jpg', 2, '2015-06-21', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_details`
--

CREATE TABLE IF NOT EXISTS `blog_details` (
  `id` int(11) NOT NULL,
  `blog` int(11) NOT NULL,
  `language` varchar(3) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog_details`
--

INSERT INTO `blog_details` (`id`, `blog`, `language`, `title`, `content`) VALUES
(1, 1, 'ua', '«Якщо не ми, то хто – для воїнів АТО» ', '<p>Кафедра музики факультету педагогіки, психології та соціальної роботи Чернівецького національного університету імені Юрія Федьковича на високій мистецькій ноті завершила навчальний рік благодійним концертом. Кошти, зібрані на заході, уже передані ГО Координаційний штаб &laquo;Буковина &ndash; українському війську&raquo; і будуть використані на нагальні потреби наших буковинських солдат на передовій.<!-- pagebreak --></p>\r\n<p>Знаний університетський колектив упродовж поточного року не раз долучався до подібних благодійних акції. Цього разу таким концертом завершили навчальний рік. Мистецький захід&nbsp;&nbsp;відбувся в Мармуровій залі. Дві години поспіль звучала фортепіанна музика. Ініціатори спонукали аудиторію помислами повернутися до наших воїнів на Сході України, щиро і по-людськи перейнятися їх проблемами.</p>\r\n<p>Почин кафедри музики привітав ректор Степан Мельничук, зазначивши, що такий крок вартий уваги і наслідування. Він першим показав приклад благодійності, підійшовши до скриньки. Так само вчинили й проректор з науково-педагогічної роботи з питань навчально-виховного процесу Тамара Марусик і декан факультету Ігор Зварич.</p>\r\n<p>Під склепіннями Мармурової зали зринали світові класичні твори Г. Манчіні, Г. Генделя, Ф. Шопена, Й. Брамса, В.-А. Моцарта, П. Чайковського, С. Гулака-Артемовського, Я. Степового, Г. Майбороди, Т. Емануеля, І. Шамо, М. Лисенка, С. Рахманінова та інших композиторів. Прозвучало майже 30 творів під музичний супровід фортепіано, бандури, скрипки, гітари, акордеону. Серед солістів &ndash; Марина Герелюк, Іванна Старик, Яна Кімак, Олександра Гудима, Діана Олійник, Наталія та Аліна Руснаки, Лариса Петечел, Мар&rsquo;яна Українець, Нік Гаврилов, Петро Рясенко, Ангеліна Ончуленко, Юрій Томко, Вікторія та Юлія Білінські, Андрій Гуцул, Святослава Дерда, Богдан Троян, Ігор Гончарук, Віталій Любинецький та Надія Штефанюк. Крапку у благодійному вчинкові поставив заслужений артист України доцент Іван Дерда. Він виконав українську народну пісню, яка має понад 15 мотивів-звучань &ndash; &laquo;Ой, попід гай зелененький&raquo;.</p>\r\n<p>За концерт учасникам подякували модератор заходу, завідувач кафедри музики доцент Вадим Лісовий і доцент Олександр Залуцький. Сутність людського життя в усі часи і епохи вимірювалася за ціннісною шкалою вартостей. На кафедрі музики ЧНУ сказали: &laquo;Якщо не ми, то хто &ndash; для воїнів АТО&raquo;. Сказали і слова втілили у реальність. У скриньці виявилося 3&nbsp;153 грн. Їх передали туди, де димлять східні кордони Вітчизни.</p>'),
(2, 1, 'en', '', '<p>Department of Music faculty of pedagogy, psychology and social work Chernivtsi University on a high note finished art school year charitable concert. Funds raised at the event, has already passed the NGO Coordination Staff "Bucovina - Ukrainian army" and will be used for immediate needs Bukovynian our soldiers on the front line.<br />Well-known university staff during the current year, repeatedly became involved in the charity of such shares. This time the concert finished this academic year. Art event was held in the Marble Hall. Two hours of consecutive sounding piano music. The initiators of the audience prompted thoughts back to our soldiers in the east of Ukraine frankly and humanly feel their problems.<!-- pagebreak --></p>\r\n<p>The initiative of the Department of Music welcomed the Rector Stepan Melnychuk, noting that such a move worthy of attention and imitation. He first showed an example of charity, going to the mailbox. So did the rector and with research and educational work on the educational process and Marusyk Tamara Dean of the Faculty Igor Zvarych.</p>\r\n<p>Under the arches of marble halls zrynaly world classical works G. Mancini, G. Handel, Chopin, Brahms, V.-A. Mozart, Tchaikovsky, S. Hulak-Artemovs''kyj, J. Steppe, G. Maiboroda, Emanuel T., I. Shamo Lysenko, Rachmaninov and other composers. There was nearly 30 works in piano music, bandura, violin, guitar, accordion. Among the soloists - Marina Herelyuk, Joanna old man, John Kimak, Alexander Hudyma, Diana Oliynyk, Natalia and Alina Rusnak, Larissa Petechel, Marian Ukrainian Nick Gavrilov, Peter Ryasenko, Onchulenko Angelina, George Tomka, Victoria and Julia Bilinsky, Andrew Gutsul , Svyatoslav Derda, Bogdan Trojan, Igor Goncharuk, Vitaly Lyubynetskyy and Nadia Shtefanyuk. Point in charitable actions set Honored Artist of Ukraine Ivan Associate Derda. He performed Ukrainian folk song that has more than 15 motifs, sounds - "Oh, grove under greenbacks."</p>\r\n<p>During the concert participants thanked the moderator of the event, Head of Music Associate Professor Vadim Forest and Associate Professor Alexander Zalutsky. The essence of human life in all times and ages measured according to valuation scale values. The department of music ChNU said: "If not us, then who - for ATU soldiers." They said the words embodied in reality. In the box turned 3153 USD. They passed where smoke eastern borders of the Fatherland.</p>'),
(3, 2, 'ua', 'Умови роботи журналістів в Україні та США: відкрита дискусія як спосіб обмінятися досвідом ', '<p style="color: #3c3c3c; font-size: 13.3333330154419px; font-family: Tahoma, Arial, sans-serif;"><span lang="UK" style="font-size: 10pt; font-family: Arial, sans-serif;">Вчора 17 червня у Блакитній залі Чернівецького національного університету ім. Ю.Федьковичавідбулася публічна дискусія між американськими дипломатами та представниками чернівецьких ЗМІ. Зустріч організована за підтримки Посольства США в Україні. Під час дискусії сторони обмінювалися міркуваннями стосовно ролі журналістики в суспільстві, аналізували чинники, що впливають на формування якісної медіасфери, і зіставляли український та американський досвід у цьому напрямку. Відкрили дискусію завідувач кафедри журналістики Любов Василик та ректор Чернівецького національного університету Степан Мельничук. З американської сторони вобговоренні взяли участь Посол Кліффорд Бонд, координатор технічної допомоги (Посольство США); Верая (Кейт) Сомвонгсірі, директор офісу демократії та управління (Агентство США з міжнародного розвитку (USAID)) та Віктор Рачкевич (офіс демократії та управління, Агентство США з міжнародного розвитку (USAID)).<!-- pagebreak --></span></p>\r\n<p style="color: #3c3c3c; font-size: 13.3333330154419px; font-family: Tahoma, Arial, sans-serif;"><span lang="UK" style="font-size: 10pt; font-family: Arial, sans-serif;">Як повідомив поважним гостям Степан Мельничук, Чернівецький університет, готуючи фахівців журналістики, орієнтує їх також і на міжнародну співпрацю. Хорошим прикладом тому є проект співпраці між Чернівцями та Пассау (Німеччина), де молоді журналісти, студенти ЧНУ мають можливість наочно побачити і зіставити українську та німецьку медіасфери.</span></p>\r\n<p style="color: #3c3c3c; font-size: 13.3333330154419px; font-family: Tahoma, Arial, sans-serif;"><span lang="UK" style="font-size: 10pt; font-family: Arial, sans-serif;">На самому початку зустрічі Кліффорд Бонд уточнив, що їм дуже важливо почути думку українських журналістів стосовно того, як же розвивається журналістика в регіоні, з якими проблемами вона має справу і які шляхи вирішення цих труднощів уже існують. Одне з перших питань, яке порушилося, &ndash; редакційна політика, залежність/незалежність засобів ЗМІ. Посол зазначив: в Америці це питання є також актуальним. Проте громадський вибір також може бути засобом тесту на об&rsquo;єктивність: заангажовані ЗМІ просто користуються меншим попитом.</span></p>\r\n<p style="color: #3c3c3c; font-size: 13.3333330154419px; font-family: Tahoma, Arial, sans-serif;"><span lang="UK" style="font-size: 10pt; font-family: Arial, sans-serif;">Про наявні проблеми українських, в тому числі і буковинських, ЗМІ розповів головний редактор громадсько-політичної газети &laquo;Доба&raquo; Володимир Стефанець. Як зазначив Володимир Богданович, особливо важливою в контексті загальної незалежності видання є його фінансова незалежність. Особливо це стосується друкованих ЗМІ. А ось стосовно доступу до інформації чи свободи слова &ndash; з цим у Чернівцях проблем немає.</span></p>\r\n<p style="color: #3c3c3c; font-size: 13.3333330154419px; font-family: Tahoma, Arial, sans-serif;"><span lang="UK" style="font-size: 10pt; font-family: Arial, sans-serif;">Американська делегація зійшлася на думці, що Україна проходить період становлення, окрім прямого військового конфлікту в нашій державі відбувається також інформаційна війна &ndash; і саме від компетенції українських журналістів залежить, якою ж буде відповідь на потік пропаганди, наскільки населення вчасно отримуватиме суспільно важливу інформацію тощо. Америка готова допомагати українським ЗМІ - підсумували за результатами зустрічі.</span></p>'),
(4, 2, 'en', 'Умови роботи журналістів в Україні та США: відкрита дискусія як спосіб обмінятися досвідом ', '<p style="color: #3c3c3c; font-size: 13.3333330154419px; font-family: Tahoma, Arial, sans-serif;"><span lang="UK" style="font-size: 10pt; font-family: Arial, sans-serif;">Вчора 17 червня у Блакитній залі Чернівецького національного університету ім. Ю.Федьковичавідбулася публічна дискусія між американськими дипломатами та представниками чернівецьких ЗМІ. Зустріч організована за підтримки Посольства США в Україні. Під час дискусії сторони обмінювалися міркуваннями стосовно ролі журналістики в суспільстві, аналізували чинники, що впливають на формування якісної медіасфери, і зіставляли український та американський досвід у цьому напрямку. Відкрили дискусію завідувач кафедри журналістики Любов Василик та ректор Чернівецького національного університету Степан Мельничук. З американської сторони вобговоренні взяли участь Посол Кліффорд Бонд, координатор технічної допомоги (Посольство США); Верая (Кейт) Сомвонгсірі, директор офісу демократії та управління (Агентство США з міжнародного розвитку (USAID)) та Віктор Рачкевич (офіс демократії та управління, Агентство США з міжнародного розвитку (USAID)).<!-- pagebreak --></span></p>\r\n<p style="color: #3c3c3c; font-size: 13.3333330154419px; font-family: Tahoma, Arial, sans-serif;"><span lang="UK" style="font-size: 10pt; font-family: Arial, sans-serif;">Як повідомив поважним гостям Степан Мельничук, Чернівецький університет, готуючи фахівців журналістики, орієнтує їх також і на міжнародну співпрацю. Хорошим прикладом тому є проект співпраці між Чернівцями та Пассау (Німеччина), де молоді журналісти, студенти ЧНУ мають можливість наочно побачити і зіставити українську та німецьку медіасфери.</span></p>\r\n<p style="color: #3c3c3c; font-size: 13.3333330154419px; font-family: Tahoma, Arial, sans-serif;"><span lang="UK" style="font-size: 10pt; font-family: Arial, sans-serif;">На самому початку зустрічі Кліффорд Бонд уточнив, що їм дуже важливо почути думку українських журналістів стосовно того, як же розвивається журналістика в регіоні, з якими проблемами вона має справу і які шляхи вирішення цих труднощів уже існують. Одне з перших питань, яке порушилося, &ndash; редакційна політика, залежність/незалежність засобів ЗМІ. Посол зазначив: в Америці це питання є також актуальним. Проте громадський вибір також може бути засобом тесту на об&rsquo;єктивність: заангажовані ЗМІ просто користуються меншим попитом.</span></p>\r\n<p style="color: #3c3c3c; font-size: 13.3333330154419px; font-family: Tahoma, Arial, sans-serif;"><span lang="UK" style="font-size: 10pt; font-family: Arial, sans-serif;">Про наявні проблеми українських, в тому числі і буковинських, ЗМІ розповів головний редактор громадсько-політичної газети &laquo;Доба&raquo; Володимир Стефанець. Як зазначив Володимир Богданович, особливо важливою в контексті загальної незалежності видання є його фінансова незалежність. Особливо це стосується друкованих ЗМІ. А ось стосовно доступу до інформації чи свободи слова &ndash; з цим у Чернівцях проблем немає.</span></p>\r\n<p style="color: #3c3c3c; font-size: 13.3333330154419px; font-family: Tahoma, Arial, sans-serif;"><span lang="UK" style="font-size: 10pt; font-family: Arial, sans-serif;">Американська делегація зійшлася на думці, що Україна проходить період становлення, окрім прямого військового конфлікту в нашій державі відбувається також інформаційна війна &ndash; і саме від компетенції українських журналістів залежить, якою ж буде відповідь на потік пропаганди, наскільки населення вчасно отримуватиме суспільно важливу інформацію тощо. Америка готова допомагати українським ЗМІ - підсумували за результатами зустрічі.</span></p>'),
(5, 3, 'ua', 'Якась подія ', '<p>Подія :))</p>'),
(6, 3, 'en', 'Some event', '<p>Event</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_rubricks`
--

CREATE TABLE IF NOT EXISTS `blog_rubricks` (
  `id` int(11) NOT NULL,
  `alias` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog_rubricks`
--

INSERT INTO `blog_rubricks` (`id`, `alias`) VALUES
(1, 'news'),
(2, 'events'),
(3, 'adwords');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_rubrick_details`
--

CREATE TABLE IF NOT EXISTS `blog_rubrick_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `language` varchar(3) NOT NULL,
  `rubrick` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog_rubrick_details`
--

INSERT INTO `blog_rubrick_details` (`id`, `name`, `language`, `rubrick`) VALUES
(1, 'Новини', 'ua', 1),
(2, 'News', 'en', 1),
(3, 'Події', 'ua', 2),
(4, 'Events', 'en', 2),
(5, 'Оголошення', 'ua', 3),
(6, 'Advertisements', 'en', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` tinyint(3) NOT NULL COMMENT 'ID of department',
  `name` varchar(50) NOT NULL COMMENT 'Name of department'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Фізико технічних та комп''ютерних наук');

-- --------------------------------------------------------

--
-- Структура таблицы `discussions`
--

CREATE TABLE IF NOT EXISTS `discussions` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `discussions`
--

INSERT INTO `discussions` (`id`, `name`, `user`) VALUES
(1, 'Обговорення 1', 5),
(3, 'Обговорення 2', 5),
(4, 'Dota', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `discussion_messages`
--

CREATE TABLE IF NOT EXISTS `discussion_messages` (
  `id` int(11) NOT NULL,
  `discussion` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `message` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `discussion_messages`
--

INSERT INTO `discussion_messages` (`id`, `discussion`, `user`, `time`, `message`) VALUES
(1, 1, 5, 1123456666, 'Всім привіт'),
(2, 1, 5, 1434994397, 'fdf'),
(3, 4, 5, 1434994425, 'Go в дотку'),
(4, 4, 1, 1434994577, '+'),
(5, 4, 5, 1434994671, 'Чи може в контру ?'),
(6, 4, 5, 1434994721, 'ААААААААААААААААААААААААААААААААААААААААААААААААААААААААА'),
(7, 4, 5, 1434994734, 'БББББББББББББББББББББББББББББББББББББББББББББББББББББББ'),
(8, 3, 5, 1434994745, 'Тест'),
(9, 3, 1, 1434994756, 'Тест');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `code` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`) VALUES
(1, 'Українська', 'ua'),
(3, 'English', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `message` text NOT NULL,
  `isRead` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `from_user`, `to_user`, `time`, `message`, `isRead`) VALUES
(1, 1, 5, 1434971834, 'Привіт', 1),
(2, 5, 1, 1434971965, 'Привіт :)', 1),
(3, 5, 1, 1434971967, 'Як справи ?', 1),
(4, 1, 5, 1434971975, 'Та все гаразд :)', 1),
(5, 1, 5, 1434974264, 'Тест', 1),
(6, 5, 1, 1434974278, 'Дуже смішно', 1),
(7, 5, 1, 1434974309, 'Але що тут робити коли збільшується число записів ?', 1),
(8, 5, 1, 1434974442, '?', 1),
(9, 1, 5, 1434974450, 'Не знаю', 1),
(10, 1, 5, 1434975131, 'смсм', 1),
(11, 1, 5, 1434975570, 'Ntfasdfsdfsd', 1),
(12, 5, 1, 1434975588, 'Да', 1),
(13, 1, 3, 1434975949, 'fasdfsd', 0),
(14, 1, 1, 1434975967, 'Привіт', 1),
(15, 1, 1, 1434975971, 'Привіт', 1),
(16, 5, 1, 1434977551, 'ГГГГГГГГГГГГГГГГГГГГГГГГГГГГГГГГГГГГГГ', 1),
(17, 1, 5, 1434978124, 'Тестове повідомлення', 1),
(18, 1, 5, 1434978174, 'Ще одне', 1),
(19, 5, 1, 1434978246, 'Я його отримав :)))', 1),
(20, 5, 1, 1434978268, '<script>alert(''XSS'')</script>', 1),
(21, 1, 5, 1434978292, 'не вдалось зробити хахахааах', 1),
(22, 1, 6, 1434979509, 'Лох', 0),
(23, 5, 1, 1434981275, 'ав', 1),
(24, 5, 1, 1434981294, 'аів', 1),
(25, 5, 1, 1434981294, 'афів', 1),
(26, 5, 1, 1434981294, 'афів', 1),
(27, 5, 1, 1434981294, 'а', 1),
(28, 5, 1, 1434981294, 'фіва', 1),
(29, 5, 1, 1434981294, 'фів', 1),
(30, 5, 1, 1434981295, 'афів', 1),
(31, 5, 1, 1434981295, 'а', 1),
(32, 5, 1, 1434981295, 'фів', 1),
(33, 5, 1, 1434981295, 'афів', 1),
(34, 5, 1, 1434981295, 'а', 1),
(35, 5, 1, 1434981295, 'фів', 1),
(36, 5, 1, 1434981295, 'афів', 1),
(37, 5, 1, 1434981295, 'а', 1),
(38, 5, 1, 1434981296, 'фіва', 1),
(39, 5, 1, 1434981296, 'фів', 1),
(40, 5, 1, 1434981296, 'афів', 1),
(41, 5, 1, 1434981296, 'а', 1),
(42, 5, 1, 1434981296, 'фів фіва', 1),
(43, 5, 1, 1434981297, 'фів', 1),
(44, 5, 1, 1434981297, 'аів', 1),
(45, 5, 1, 1434981297, ' ', 1),
(46, 5, 1, 1434981297, 'фів', 1),
(47, 5, 1, 1434981297, 'афів', 1),
(48, 5, 1, 1434981297, 'а', 1),
(49, 5, 1, 1434981297, 'фіва', 1),
(50, 5, 1, 1434981298, 'фів', 1),
(51, 5, 1, 1434981298, 'а', 1),
(52, 5, 1, 1434981298, 'фіва', 1),
(53, 5, 1, 1434981298, 'фів', 1),
(54, 5, 1, 1434981298, 'а', 1),
(55, 5, 1, 1434981298, 'фі іва', 1),
(56, 5, 1, 1434981299, 'фів', 1),
(57, 5, 1, 1434981299, 'афів', 1),
(58, 5, 1, 1434981299, 'афів', 1),
(59, 5, 1, 1434981299, 'а', 1),
(60, 5, 1, 1434981299, 'фіва ', 1),
(61, 5, 1, 1434981299, 'фів', 1),
(62, 5, 1, 1434981300, 'аіф', 1),
(63, 5, 1, 1434981300, 'фів', 1),
(64, 5, 1, 1434981300, 'аів', 1),
(65, 5, 1, 1434981300, 'а', 1),
(66, 5, 1, 1434981300, 'ф фів', 1),
(67, 5, 1, 1434981301, 'а', 1),
(68, 5, 1, 1434981301, 'фіва', 1),
(69, 5, 1, 1434981301, 'фі фів', 1),
(70, 5, 1, 1434981301, 'афів', 1),
(71, 5, 1, 1434981302, 'а', 1),
(72, 5, 1, 1434981302, 'івфа', 1),
(73, 5, 1, 1434981302, 'фів', 1),
(74, 5, 1, 1434981302, ' ів', 1),
(75, 5, 1, 1434981302, 'афі', 1),
(76, 5, 1, 1434981303, 'в ', 1),
(77, 5, 1, 1434981303, 'іва', 1),
(78, 5, 1, 1434981303, 'фів ', 1),
(79, 5, 1, 1434981303, 'фів', 1),
(80, 5, 1, 1434981303, 'афів', 1),
(81, 5, 1, 1434981304, ' фів', 1),
(82, 5, 1, 1434981304, 'а', 1),
(83, 5, 1, 1434981304, 'фів ів', 1),
(84, 5, 1, 1434981304, 'аф ', 1),
(85, 5, 1, 1434981305, 'фіва', 1),
(86, 5, 1, 1434981305, 'фіва', 1),
(87, 5, 1, 1434981305, 'фів ', 1),
(88, 5, 1, 1434981305, 'ів', 1),
(89, 5, 1, 1434981306, 'афів', 1),
(90, 5, 1, 1434981306, 'а ', 1),
(91, 5, 1, 1434981306, 'фіва', 1),
(92, 5, 1, 1434981307, 'фі ів', 1),
(93, 5, 1, 1434981307, 'а', 1),
(94, 5, 1, 1434981307, 'ф ', 1),
(95, 5, 1, 1434981307, 'івафів', 1),
(96, 5, 1, 1434981308, 'афі', 1),
(97, 5, 1, 1434981308, ' ', 1),
(98, 5, 1, 1434981308, 'іва', 1),
(99, 5, 1, 1434981308, 'фі ', 1),
(100, 5, 1, 1434981309, 'фіва ', 1),
(101, 5, 1, 1434981309, 'іва', 1),
(102, 5, 1, 1434981309, ' ', 1),
(103, 5, 1, 1434981309, 'фіва', 1),
(104, 5, 1, 1434981310, 'фіва', 1),
(105, 5, 1, 1434981310, ' фів', 1),
(106, 5, 1, 1434981310, 'а', 1),
(107, 5, 1, 1434981310, 'фів', 1),
(108, 5, 1, 1434981310, 'афів', 1),
(109, 5, 1, 1434981311, 'а', 1),
(110, 5, 1, 1434981311, 'фіва', 1),
(111, 5, 1, 1434981311, 'фів', 1),
(112, 5, 1, 1434981311, 'а ів', 1),
(113, 5, 1, 1434981312, 'а фівалдріфв ґіф', 1),
(114, 5, 1, 1434981313, 'афівафівжафів', 1),
(115, 5, 1, 1434981314, 'аів', 1),
(116, 5, 1, 1434981314, 'а', 1),
(117, 5, 1, 1434981314, ' фів', 1),
(118, 5, 1, 1434981314, 'аі', 1),
(119, 5, 1, 1434981314, 'а', 1),
(120, 5, 1, 1434981314, 'ів', 1),
(121, 5, 1, 1434981315, 'а ', 1),
(122, 5, 1, 1434981315, 'іва', 1),
(123, 5, 1, 1434981315, 'іва', 1),
(124, 5, 1, 1434981316, ' фів', 1),
(125, 5, 1, 1434981316, 'афі', 1),
(126, 5, 1, 1434981316, 'вафів', 1),
(127, 5, 1, 1434981316, 'аів', 1),
(128, 5, 1, 1434981317, 'афів', 1),
(129, 5, 1, 1434981317, 'а', 1),
(130, 5, 1, 1434981317, 'фів', 1),
(131, 5, 1, 1434981317, 'афі', 1),
(132, 5, 1, 1434981317, 'ва', 1),
(133, 5, 1, 1434981318, 'фі', 1),
(134, 5, 1, 1434981318, 'ва', 1),
(135, 5, 1, 1434981318, 'фівафі', 1),
(136, 5, 1, 1434981318, 'ва', 1),
(137, 5, 1, 1434981319, 'фів', 1),
(138, 5, 1, 1434981319, 'афі', 1),
(139, 5, 1, 1434981319, 'ва', 1),
(140, 5, 1, 1434981319, 'фів', 1),
(141, 5, 1, 1434981319, 'афів', 1),
(142, 5, 1, 1434981320, 'а', 1),
(143, 5, 1, 1434981320, 'фів', 1),
(144, 5, 1, 1434981320, 'афі', 1),
(145, 5, 1, 1434981320, 'ва', 1),
(146, 5, 1, 1434981320, 'фіва', 1),
(147, 5, 1, 1434981321, 'фів', 1),
(148, 5, 1, 1434981321, 'а', 1),
(149, 5, 1, 1434981321, 'фів', 1),
(150, 5, 1, 1434981321, 'а', 1),
(151, 5, 1, 1434981322, 'іва фіва', 1),
(152, 5, 1, 1434981322, 'ф ', 1),
(153, 5, 1, 1434981322, 'іва', 1),
(154, 5, 1, 1434981323, 'фів', 1),
(155, 5, 1, 1434981323, 'афі', 1),
(156, 5, 1, 1434981323, ' фі', 1),
(157, 5, 1, 1434981323, 'ва', 1),
(158, 5, 1, 1434981324, 'фів ', 1),
(159, 5, 1, 1434981324, 'ів', 1),
(160, 5, 1, 1434981324, ' ів', 1),
(161, 5, 1, 1434981324, 'афі', 1),
(162, 5, 1, 1434981325, 'ва', 1),
(163, 5, 1, 1434981325, 'фіва', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `module_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `alias` varchar(150) NOT NULL,
  `version` float NOT NULL,
  `access` varchar(10) NOT NULL,
  `user_groups` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modules`
--

INSERT INTO `modules` (`module_id`, `name`, `alias`, `version`, `access`, `user_groups`) VALUES
(5, 'SB Blog', 'blog', 1, 'pr_all', ''),
(8, 'SB Page', 'page', 1.1, 'pr_all', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`page_id`, `alias`, `keywords`, `description`) VALUES
(1, 'about', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `page_content`
--

CREATE TABLE IF NOT EXISTS `page_content` (
  `content_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `language` varchar(3) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page_content`
--

INSERT INTO `page_content` (`content_id`, `page_id`, `title`, `language`, `content`) VALUES
(1, 1, 'Про Асоціацію', 'ua', '<h3>Шановні випускники Університету &laquo;КРОК&raquo;!</h3>\r\n<p><br />Наш університет вже більше двадцяти років здійснює підготовку фахівців. Щороку сотні КРОКівців під звуки Gaudeamusu отримують дипломи і крокують у самостійне життя. На нашу думку, Університет може і має стати тим ланцюжком, який буде поєднувати нас, його випускників, у майбутньому.<br />Саме тому у 2007 році випускниками КРОКу різних років була заснована Асоціація випускників Університету &laquo;КРОК&raquo;.<!-- pagebreak --></p>\r\n<p><br />Що таке Асоціація випускників Університету &laquo;КРОК&raquo;?</p>\r\n<p>Офіційно ми - Громадська організація &laquo;Асоціація випускників Університету &laquo;КРОК&raquo; (скорочено - АВУ &laquo;КРОК&raquo;).<br />В реальному житті ми розвиваємо нашу Асоціацію, як невіртуальну соціальну мережу, яка дозволяє підтримувати зв''язки тим, хто отримав освіту в одному університеті, на основі спільних ососбистісних та професійних, персональних та суспільних цінностей. Ми - люди зі спільним освітнім бекграундом, що працюють у сфері економіки, менеджменту, права, освіти. Але головне, ми маємо не тільки спільне минуле та незабутні спогади про навчання в Університеті &laquo;КРОК&raquo;, а й прагнемо примножити здобуте.<br />Основні завдання Асоціації випускників Університету &laquo;КРОК&raquo;:<br />cтворення єдиного інформаційного простору для випускників;<br />організація та проведення зустрічей випускників, а також сприяння їх подальшому розвитку, освіті, спілкуванню та відпочинку;<br />допомога членам Асоціації і студентам у підготовці та публікації наукових праць, отриманні грантів, стипендій тощо;<br />сприяння працевлаштуванню випускників та пошук для організацій, в яких вони працюють, потенційних працівників серед студентів та випускників &laquo;КРОКу&raquo;;<br />інформування членів Асоціації про проекти, що проводяться Асоціацією, а також про поточні та нові освітні програми Університету.<br />Для членів Асоціації випускників КРОКу:<br />доступ до інформаційної бази випускників Університету, яка дозволяє підтримувати контакти з друзями, налагоджувати нові професійні зв''язки;<br />Програма лояльності та система знижок на освітні та інші послуги, що надає Університет &laquo;КРОК&raquo;;<br />право користування університетським бібліотечним фондом;<br />багато іншого за ініціативою і пропозицією членів Асоціації.<br />Асоціація відкрита до співробітництва і запрошує Вас взяти участь в освітніх, кар''єрних, культурно-розважальних та інших проектах.</p>'),
(2, 1, 'About', 'en', '<p>Dear graduates of the University "STEP"!<br />Our university has more than twenty years provides training. Every year hundreds KROKivtsiv the sounds Gaudeamusu receive diplomas and stepping into an independent life. In our opinion, the University can and should become the chain, which will have to combine its graduates in the future.<br />That is why in 2007 the graduates of different years KROK was founded Alumni Association of the University "STEP".<br />&nbsp;<!-- pagebreak --></p>\r\n<p>What is the Alumni Association of the University "STEP"?</p>\r\n<p>Officially we are - NGO "Alumni Association of the University" STEP "(abbreviated - AVU" STEP ").<br />In real life we ​​develop our Association as nevirtualnu social network that allows you to maintain connections to those educated in the same university, based on shared ososbystisnyh and professional, personal and social values. We - people with shared educational backgrounds, working in the field of economics, management, law and education. But most importantly, we have not only a common past and unforgettable memories of training at the University "STEP", but also strive to increase taken.<br />The main objectives of the Alumni Association of the University "STEP":<br />Creating a common information space for graduates;<br />organizing and conducting meetings of graduates, and promoting their further development, education, communication and leisure;<br />help Association members and students in the preparation and publication of scientific papers, grants, scholarships, etc;<br />promote employment of graduates and search for organizations in which they work, potential employees among students and graduates "step";<br />informing Association members about the projects undertaken by the Association, as well as current and new educational programs of the University.<br />For members of the Alumni Association steps:<br />access to the information base of university graduates, which allows you to maintain contact with friends, establish new professional relationships;<br />Loyalty program and discounts on educational and other services provided by the University "Krok";<br />the right to use the university library stock;<br />More on the initiative and proposal of the Association.<br />The Association is open to cooperation and invite you to participate in educational, career, cultural, entertainment and other projects.</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `sign_in_log`
--

CREATE TABLE IF NOT EXISTS `sign_in_log` (
  `log_id` int(11) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `date` int(11) NOT NULL,
  `login` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sign_in_log`
--

INSERT INTO `sign_in_log` (`log_id`, `IP`, `date`, `login`) VALUES
(1, '127.0.0.1', 1434885247, 'admin'),
(2, '127.0.0.1', 1434888786, 'admin'),
(3, '127.0.0.1', 1434888963, 'admin'),
(4, '127.0.0.1', 1434889012, 'admin'),
(5, '127.0.0.1', 1434889197, 'admin'),
(6, '127.0.0.1', 1434889258, 'serrg1994'),
(7, '127.0.0.1', 1434891134, 'admin'),
(8, '127.0.0.1', 1434891960, 'admin'),
(9, '127.0.0.1', 1434896394, 'serrg1994'),
(10, '127.0.0.1', 1434901579, 'admin'),
(11, '127.0.0.1', 1434914348, 'admin'),
(12, '127.0.0.1', 1434969666, 'admin'),
(13, '127.0.0.1', 1434973618, 'serrg1994'),
(14, '127.0.0.1', 1434977142, 'serrg1994'),
(15, '127.0.0.1', 1434978218, 'serrg1994'),
(16, '127.0.0.1', 1434978367, 'demo'),
(17, '127.0.0.1', 1434980540, 'admin'),
(18, '127.0.0.1', 1434981026, 'admin'),
(19, '127.0.0.1', 1434981241, 'serrg1994'),
(20, '127.0.0.1', 1434981374, 'admin'),
(21, '127.0.0.1', 1434985375, 'serrg1994'),
(22, '127.0.0.1', 1434994461, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `group_id` int(11) NOT NULL,
  `avatar` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `pass`, `group_id`, `avatar`) VALUES
(1, 'admin', '31b830af414ed3e9088bd26446fe1af3', 1, 'no-avatar.png'),
(5, 'serrg1994', '827ccb0eea8a706c4c34a16891f84e7b', 2, '5a0a655ccb49ae038738e678574009b8.png'),
(6, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 2, 'no-avatar.png');

-- --------------------------------------------------------

--
-- Структура таблицы `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `group_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `root` int(11) NOT NULL,
  `su` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_groups`
--

INSERT INTO `user_groups` (`group_id`, `name`, `root`, `su`) VALUES
(1, 'administator', 1, 1),
(2, 'Client', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `info_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `sur_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `entry_year` smallint(4) NOT NULL,
  `gradation_year` smallint(4) NOT NULL,
  `department_id` tinyint(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_info`
--

INSERT INTO `user_info` (`info_id`, `user_id`, `first_name`, `last_name`, `sur_name`, `email`, `telephone`, `birthday`, `entry_year`, `gradation_year`, `department_id`) VALUES
(1, 1, 'Сергій', 'Борисович', 'Новоселецький', 'novoseletskiyserhiy@gmail.com', '380672877665', '2015-06-08', 2, 444, 1),
(3, 5, 'Сергій', 'Борисович', 'Новоселецький', 'serhiynovos@mail.ru', '0672877665', '2014-09-01', 2010, 2010, 1),
(4, 6, '', '', '', '', '', '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `v_blog`
--
CREATE TABLE IF NOT EXISTS `v_blog` (
`id` int(11)
,`title` varchar(200)
,`alias` varchar(200)
,`image` varchar(50)
,`rubrick` int(11)
,`time_to_publick` date
,`keywords` varchar(200)
,`description` varchar(200)
,`language` varchar(3)
,`content` longtext
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `v_blog_for_admin`
--
CREATE TABLE IF NOT EXISTS `v_blog_for_admin` (
`id` int(11)
,`title` varchar(200)
,`alias` varchar(200)
,`image` varchar(50)
,`rubrick` int(11)
,`time_to_publick` date
,`keywords` varchar(200)
,`description` varchar(200)
,`language` varchar(3)
,`content` longtext
,`rubrick_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `v_blog_rubricks`
--
CREATE TABLE IF NOT EXISTS `v_blog_rubricks` (
`id` int(11)
,`language` varchar(3)
,`name` varchar(100)
,`alias` varchar(150)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `v_discussions`
--
CREATE TABLE IF NOT EXISTS `v_discussions` (
`id` int(11)
,`discussion` int(11)
,`user` int(11)
,`time` int(11)
,`message` tinytext
,`user_id` int(11)
,`login` varchar(50)
,`avatar` varchar(50)
,`group_id` int(11)
,`first_name` varchar(100)
,`last_name` varchar(100)
,`sur_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `v_page`
--
CREATE TABLE IF NOT EXISTS `v_page` (
`page_id` int(11)
,`title` varchar(200)
,`alias` varchar(250)
,`language` varchar(3)
,`content` longtext
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `v_users`
--
CREATE TABLE IF NOT EXISTS `v_users` (
`user_id` int(11)
,`login` varchar(50)
,`avatar` varchar(50)
,`group_id` int(11)
,`first_name` varchar(100)
,`last_name` varchar(100)
,`sur_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Структура таблицы `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(11) NOT NULL,
  `module` varchar(100) NOT NULL,
  `widget` varchar(100) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура для представления `v_blog`
--
DROP TABLE IF EXISTS `v_blog`;

CREATE VIEW `v_blog` AS select `b`.`id` AS `id`,`d`.`title` AS `title`,`b`.`alias` AS `alias`,`b`.`image` AS `image`,`b`.`rubrick` AS `rubrick`,`b`.`time_to_publick` AS `time_to_publick`,`b`.`keywords` AS `keywords`,`b`.`description` AS `description`,`d`.`language` AS `language`,`d`.`content` AS `content` from (`blog` `b` join `blog_details` `d` on((`b`.`id` = `d`.`blog`)));

-- --------------------------------------------------------

--
-- Структура для представления `v_blog_for_admin`
--
DROP TABLE IF EXISTS `v_blog_for_admin`;

CREATE VIEW `v_blog_for_admin` AS select `b`.`id` AS `id`,`b`.`title` AS `title`,`b`.`alias` AS `alias`,`b`.`image` AS `image`,`b`.`rubrick` AS `rubrick`,`b`.`time_to_publick` AS `time_to_publick`,`b`.`keywords` AS `keywords`,`b`.`description` AS `description`,`b`.`language` AS `language`,`b`.`content` AS `content`,`r`.`name` AS `rubrick_name` from (`v_blog` `b` join `v_blog_rubricks` `r` on(((`b`.`rubrick` = `r`.`id`) and (`b`.`language` = `r`.`language`))));

-- --------------------------------------------------------

--
-- Структура для представления `v_blog_rubricks`
--
DROP TABLE IF EXISTS `v_blog_rubricks`;

CREATE VIEW `v_blog_rubricks` AS select `r`.`id` AS `id`,`d`.`language` AS `language`,`d`.`name` AS `name`,`r`.`alias` AS `alias` from (`blog_rubricks` `r` join `blog_rubrick_details` `d` on((`r`.`id` = `d`.`rubrick`)));

-- --------------------------------------------------------

--
-- Структура для представления `v_discussions`
--
DROP TABLE IF EXISTS `v_discussions`;

CREATE VIEW `v_discussions` AS select `discussion_messages`.`id` AS `id`,`discussion_messages`.`discussion` AS `discussion`,`discussion_messages`.`user` AS `user`,`discussion_messages`.`time` AS `time`,`discussion_messages`.`message` AS `message`,`v_users`.`user_id` AS `user_id`,`v_users`.`login` AS `login`,`v_users`.`avatar` AS `avatar`,`v_users`.`group_id` AS `group_id`,`v_users`.`first_name` AS `first_name`,`v_users`.`last_name` AS `last_name`,`v_users`.`sur_name` AS `sur_name` from (`discussion_messages` join `v_users` on((`discussion_messages`.`user` = `v_users`.`user_id`)));

-- --------------------------------------------------------

--
-- Структура для представления `v_page`
--
DROP TABLE IF EXISTS `v_page`;

CREATE VIEW `v_page` AS select `p`.`page_id` AS `page_id`,`c`.`title` AS `title`,`p`.`alias` AS `alias`,`c`.`language` AS `language`,`c`.`content` AS `content` from (`pages` `p` join `page_content` `c` on((`p`.`page_id` = `c`.`page_id`)));

-- --------------------------------------------------------

--
-- Структура для представления `v_users`
--
DROP TABLE IF EXISTS `v_users`;

CREATE VIEW `v_users` AS select `users`.`user_id` AS `user_id`,`users`.`login` AS `login`,`users`.`avatar` AS `avatar`,`users`.`group_id` AS `group_id`,`user_info`.`first_name` AS `first_name`,`user_info`.`last_name` AS `last_name`,`user_info`.`sur_name` AS `sur_name` from (`users` join `user_info` on((`users`.`user_id` = `user_info`.`user_id`)));

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rubrick` (`rubrick`);

--
-- Индексы таблицы `blog_details`
--
ALTER TABLE `blog_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog` (`blog`,`language`),
  ADD KEY `language` (`language`);

--
-- Индексы таблицы `blog_rubricks`
--
ALTER TABLE `blog_rubricks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_rubrick_details`
--
ALTER TABLE `blog_rubrick_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`),
  ADD KEY `rubrick` (`rubrick`);

--
-- Индексы таблицы `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `discussion_messages`
--
ALTER TABLE `discussion_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion` (`discussion`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_user_1` (`from_user`),
  ADD KEY `to_user` (`to_user`),
  ADD KEY `from_user` (`from_user`);

--
-- Индексы таблицы `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Индексы таблицы `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `language` (`language`);

--
-- Индексы таблицы `sign_in_log`
--
ALTER TABLE `sign_in_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Индексы таблицы `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `blog_details`
--
ALTER TABLE `blog_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `blog_rubricks`
--
ALTER TABLE `blog_rubricks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `blog_rubrick_details`
--
ALTER TABLE `blog_rubrick_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `department`
--
ALTER TABLE `department`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT COMMENT 'ID of department',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `discussion_messages`
--
ALTER TABLE `discussion_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT для таблицы `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `page_content`
--
ALTER TABLE `page_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `sign_in_log`
--
ALTER TABLE `sign_in_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user_info`
--
ALTER TABLE `user_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`rubrick`) REFERENCES `blog_rubricks` (`id`);

--
-- Ограничения внешнего ключа таблицы `blog_details`
--
ALTER TABLE `blog_details`
  ADD CONSTRAINT `blog_details_ibfk_1` FOREIGN KEY (`blog`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `blog_details_ibfk_2` FOREIGN KEY (`language`) REFERENCES `languages` (`code`);

--
-- Ограничения внешнего ключа таблицы `blog_rubrick_details`
--
ALTER TABLE `blog_rubrick_details`
  ADD CONSTRAINT `blog_rubrick_details_ibfk_1` FOREIGN KEY (`rubrick`) REFERENCES `blog_rubricks` (`id`),
  ADD CONSTRAINT `blog_rubrick_details_ibfk_2` FOREIGN KEY (`language`) REFERENCES `languages` (`code`);

--
-- Ограничения внешнего ключа таблицы `page_content`
--
ALTER TABLE `page_content`
  ADD CONSTRAINT `page_content_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`),
  ADD CONSTRAINT `page_content_ibfk_2` FOREIGN KEY (`language`) REFERENCES `languages` (`code`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `user_groups` (`group_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
