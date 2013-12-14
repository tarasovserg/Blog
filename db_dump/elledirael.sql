-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 14 2013 г., 14:45
-- Версия сервера: 5.5.24-log
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `elledirael`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_id` int(11) NOT NULL,
  `header` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `theme_id`, `header`, `description`, `content`, `date`, `creator`) VALUES
(1, 1, '\nExemple de l''article', '\nÉchantillon Article Description', 'Lorem ipsum dolor sit amet, nam tamquam ceteros mediocrem at. Ad his dolore corrumpit, et ludus ridens nominati per, at eam amet accusata democritum. Vix erant utinam phaedrum et. Ne eos aliquip eloquentiam, te pro rebum reprehendunt, no albucius hendrerit ius. Pri cu modus inermis deleniti, tamquam ancillae corrumpit pri id. Sea ex iudico postea, pri et alii appellantur neglegentur.\n\nCu eum ornatus nominati, duo eu habeo tation dissentiet. Justo percipit ut qui. Illud tacimates at has, movet epicurei an sit. Soluta sapientem accusamus sed in.\n\nFabulas consequuntur eu quo. Sed no populo virtute, nam essent assentior id. Duo ex alii denique detraxit, cu mel illud habemus copiosae, doctus probatus id pri. Vis ad causae albucius, an omnes vivendo duo. Nec elitr salutandi conclusionemque ad, eos unum senserit gubergren ex, brute postea quodsi vix cu. Verear saperet ea qui, dicta homero pericula no sea. Ius iriure prodesset ad.\n\nSed ei tibique periculis. Ut mel viderer alterum mnesarchum. Ex has equidem offendit. Expetenda laboramus complectitur sea ex, ex mel dicant honestatis, iusto epicurei pro in. Sit ei veniam maiorum verterem.', '2013-12-07 10:27:14', 8),
(2, 28, 'rubique', 'test titre', '<p>Test teest</p>\r\n', '0000-00-00 00:00:00', 11),
(4, 28, 'fdfd', 'fdfd', '<p>fsdfds</p>\r\n', '2013-12-12 19:09:54', 11),
(5, 28, 'fsda', 'fdsa', '<p>dfsa</p>\r\n', '2013-12-12 19:10:15', 11),
(6, 28, 'test', 'dx', '<p>TEST</p>\r\n', '2013-12-13 18:20:42', 14),
(9, 39, 'hgf', 'hgf', '<p>hfg</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>hgf</td>\r\n			<td>hf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>hgf</td>\r\n			<td>hgf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>hgf</td>\r\n			<td>hfg</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '2013-12-12 20:01:08', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='comments to the articles' AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `author_id`, `date`, `content`) VALUES
(6, 7, 11, '2013-12-13 17:16:11', 'FD'),
(7, 7, 11, '2013-12-13 17:16:22', 'GF'),
(8, 7, 11, '2013-12-13 17:33:45', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tempus vestibulum adipiscing. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris in aliquet orci, sed convallis enim. Phasellus bibendum rhoncus felis ac rhoncus. Quisque commodo semper est, at dignissim massa commodo nec. Praesent id tortor risus. In lobortis dui et augue egestas egestas. Nulla nisl tortor, sodales id est a, pulvinar elementum ipsum. Pellentesque felis mauris, ultrices tincidunt ante in, congue sagittis leo. Morbi justo turpis, ultrices in volutpat ac, semper eget tellus. Curabitur in suscipit justo.\r\n\r\nVestibulum eget velit augue. Nulla fermentum nibh in cursus iaculis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean at velit dui. Proin at lobortis est. Quisque blandit dignissim pretium. Vivamus blandit ultrices neque, eu iaculis orci congue vel. Fusce eu aliquam massa. Cras a viverra leo. In hac habitasse platea dictumst. Vivamus nisi nisi, gravida quis tempor in, aliquam non ante. Sed ornare erat nec molestie rutrum. Integer ut scelerisque elit. Sed at neque eu nisl tincidunt facilisis. Maecenas id dignissim tellus, sit amet consequat odio. Fusce a nisi sit amet tortor feugiat iaculis a ut augue.\r\n\r\nFusce pulvinar orci sed ipsum dictum, at convallis lectus lobortis. Aliquam accumsan nulla vel massa pellentesque, sed adipiscing mauris eleifend. Nulla nibh urna, iaculis sed augue quis, lacinia interdum mauris. Curabitur ullamcorper mi in nunc mollis ullamcorper. Nunc viverra quam nec malesuada interdum. Morbi rutrum augue eu tortor euismod accumsan. Duis aliquam ornare velit.\r\n\r\nSed turpis felis, dapibus id mi ac, rutrum suscipit tellus. Aliquam ut ornare est. Quisque euismod arcu vel augue vehicula, id scelerisque velit fringilla. Sed sit amet risus egestas, pellentesque risus ut, egestas augue. In vehicula ultricies velit in venenatis. Nam justo velit, ultricies a magna sit amet, hendrerit euismod lacus. Phasellus placerat ultricies ante a iaculis. Nulla lacus nisi, rutrum sit amet nunc id, hendrerit pulvinar tortor. Aliquam rhoncus et arcu id ultricies.\r\n\r\nAenean vulputate non metus a gravida. Aliquam leo felis, fringilla malesuada diam sit amet, sagittis varius metus. Sed scelerisque leo in neque aliquet, vel tincidunt nulla posuere. Fusce erat tortor, hendrerit et lorem nec, aliquet lacinia neque. Nunc dapibus porta posuere. Vestibulum porta accumsan leo, eget tempus mi commodo nec. In sodales sollicitudin ligula, vitae accumsan ligula vestibulum vel. Nullam lectus velit, sagittis tristique consectetur in, egestas a massa. Vestibulum sit amet augue mollis, posuere dolor ut, ornare erat. In tempus erat ut sollicitudin facilisis. Duis metus tellus, tempus vitae urna ut, laoreet dictum eros. Sed sagittis, lectus in porta ultrices, lorem dui ultricies lectus, non egestas sapien metus eget dolor. Praesent condimentum nec arcu ut pulvinar. Etiam in leo tincidunt, egestas ante vitae, volutpat ipsum. Sed in posuere. '),
(9, 1, 11, '2013-12-13 17:34:44', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sollicitudin pellentesque urna, vulputate mollis nisi tincidunt eget. Nulla mattis ligula nisi, nec tristique turpis volutpat et. Quisque a porttitor massa, sit amet mollis lorem. Vivamus vel egestas urna, viverra commodo ipsum. Nullam luctus commodo eros et malesuada. Donec commodo diam at molestie posuere. Pellentesque at semper dui. Aenean bibendum justo vel libero pretium lacinia a in metus.\r\n\r\nPraesent eleifend elit non justo dapibus vehicula. In consectetur enim nibh, vitae suscipit velit suscipit eu. Proin ipsum sem, aliquam quis lacinia sit amet, blandit ac massa. Etiam vitae purus in ante dignissim euismod eget at arcu. Pellentesque nec varius dui. Aenean vitae iaculis velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus adipiscing metus lacus, sed egestas justo interdum a. Sed sed sapien quis enim vehicula tempor quis in odio. Duis eu cursus nisl. In viverra tellus eget tellus sodales semper. Nulla vel tempor nibh, rutrum hendrerit ante. Sed ante leo, rutrum nec felis et, hendrerit sodales elit.\r\n\r\nSed sem metus, rhoncus nec pulvinar vitae, tincidunt sed nibh. Pellentesque molestie ullamcorper purus. Suspendisse potenti. Ut sit amet pellentesque nisi. Integer porttitor lectus sit amet nisi ullamcorper, quis sodales turpis vehicula. Nulla facilisi. Vestibulum non sem sapien. '),
(10, 1, 11, '2013-12-13 17:43:09', 'Morbi aliquet sem et libero vestibulum tincidunt sit amet ut lacus. In hac habitasse platea dictumst. Integer risus ante, tincidunt ac gravida et, bibendum quis orci. In enim lacus, hendrerit et pharetra vel, aliquam vel eros. Duis luctus id sapien a convallis. Vestibulum fermentum ligula id odio aliquam, tincidunt tempor augue vulputate. Proin rutrum lacus vitae ligula facilisis convallis. Fusce sollicitudin egestas gravida. '),
(11, 1, 11, '2013-12-13 17:43:35', 'Maecenas libero lorem, fermentum ac lorem eu, luctus laoreet quam. Curabitur vehicula eros ut justo ornare, sit amet scelerisque dui congue. Morbi elementum odio nisl, vel tincidunt nulla pharetra in. Etiam semper lacus eu justo tempus dapibus. Maecenas semper nibh eu lacus rhoncus, vel hendrerit nisi semper. Integer molestie rutrum vehicula. Integer tincidunt eros a dolor pharetra, et sagittis neque aliquet. Donec nec eros eu lacus ultricies congue eu a augue. Integer ipsum orci, facilisis eleifend nulla sed, mollis luctus sapien. Suspendisse potenti. Aliquam nisl diam, bibendum at nisi vel, vulputate laoreet leo. Vestibulum odio ante, pharetra ac ante eget, malesuada cursus nulla. Nullam sit amet orci semper lorem auctor adipiscing sit amet dapibus dolor. Suspendisse iaculis ac magna nec porta. '),
(12, 1, 11, '2013-12-13 17:44:03', 'Aenean ut neque in lacus placerat consequat. Praesent facilisis rhoncus euismod. Phasellus luctus dolor id accumsan sodales. Nunc nec massa massa. Etiam consectetur dolor sit amet nulla adipiscing imperdiet. Donec augue dui, dapibus ac elit a, lacinia convallis ante. In lorem nunc, cursus accumsan fringilla eget, iaculis vel lectus. Duis ornare mollis ultricies. Nam vitae sed. '),
(13, 2, 11, '2013-12-13 17:44:36', 'Aenean ut neque in lacus placerat consequat. Praesent facilisis rhoncus euismod. Phasellus luctus dolor id accumsan sodales. Nunc nec massa massa. Etiam consectetur dolor sit amet nulla adipiscing imperdiet. Donec augue dui, dapibus ac elit a, lacinia convallis ante. In lorem nunc, cursus accumsan fringilla eget, iaculis vel lectus. Duis ornare mollis ultricies. Nam vitae sed. ');

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`id`, `name`, `description`) VALUES
(1, '            	Actualités', '            	\r\nactualités11'),
(28, 'belaya gvardia', 'belaya gvardia'),
(39, 'Nouveau1', 'рара2Theme            ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `role`) VALUES
(8, 'alyonka2', 'alyonka@test.mail', '8a8bb7cd343aa2ad99b7d762030857a2', 0),
(11, 'elledirael', 'elledirael@mail.ru', '76d80224611fc919a5d54f0ff9fba446', 1),
(12, 'test', 'test@test.ds', '76d80224611fc919a5d54f0ff9fba446', 1),
(13, 'User', 'user@test.mail.fr', '76d80224611fc919a5d54f0ff9fba446', 0),
(14, 'Admin', 'admin@test.fr', '76d80224611fc919a5d54f0ff9fba446', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
