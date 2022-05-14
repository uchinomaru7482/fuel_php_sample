CREATE DATABASE app_develop;
USE app_develop;

CREATE TABLE `posts` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  `deleted_at` DATETIME NULL DEFAULT NULL,
  `title` VARCHAR(191) NOT NULL,
  `summary` VARCHAR(191) NOT NULL,
  `body` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `app_develop`.`posts` (`id`, `created_at`, `updated_at`, `title`, `summary`, `body`) VALUES ('1', '2022-04-23 14:00:00', '2022-04-23 14:00:00', 'hoge title', 'hoge summary', 'hogehogehoge');
