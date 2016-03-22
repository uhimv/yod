-- phpMyAdmin SQL Dump

--
-- Структура таблицы `phone_user`
--

CREATE TABLE IF NOT EXISTS `phone_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(12) NOT NULL COMMENT 'Номер телефона',
  `user_id` int(11) NOT NULL COMMENT 'ид пользователя которому принадлежит номер телефона',
  `balance` decimal(8,2) NOT NULL COMMENT 'баланс на счету ',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Телефоны пользователей' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL COMMENT 'имя пользователя',
  `dob` date NOT NULL COMMENT 'дата родения',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='данные о пользователе ' AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `phone_user`
--
ALTER TABLE `phone_user`
  ADD CONSTRAINT `phone_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
