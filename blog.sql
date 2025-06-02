CREATE DATABASE blog
	CHARACTER SET utf8mb4
	COLLATE utf8mb4_hungarian_ci;

CREATE TABLE blog.blogs (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  title varchar(255) NOT NULL,
  content varchar(255) NOT NULL,
  created_at varchar(255) NOT NULL,
  reports varchar(255) DEFAULT NULL,
  visibility tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 43,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

INSERT INTO blog.blogs (`id`, `name`, `title`, `content`, `created_at`, `reports`, `visibility`) VALUES (NULL, 'hb67', 'php', 'this is one of the php posts of all time', '06/02/2025 08:33:46 am', NULL, '1'), (NULL, 'amongzs', 'sus', 'thus is very sus (I speak street)', '06/02/2025 08:34:24 am', NULL, '1'), (NULL, 'diglett', 'skills', 'earthquake, rock slash, throw up, punch', '06/02/2025 08:37:05 am', NULL, '1'), (NULL, 'vaporeon', 'type', 'water', '06/02/2025 08:40:04 am', NULL, '1'), (NULL, 'Joe Rogan', 'Alligators', 'They just dont die. They just keep getting older and bigger.', '06/02/2025 08:44:54 am', NULL, '1'), (NULL, 'Joe Biden', '💤', '💤💤💤', '06/02/2025 08:45:27 am', NULL, '1'), (NULL, 'Donald Trump', 'These terrorists', 'They will never sink our ships again!', '06/02/2025 08:47:26 am', NULL, '1')
