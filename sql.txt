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