<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/db/db_connection/db_connection.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/db/config/config.php');
    global $db_config;
    $connection = Connection::connect($db_config);

    /*$connection->query('DROP TABLE aecProyecto_image');
    /*$connection->query('DROP TABLE aecProyecto_comment');
    $connection->query('DROP TABLE aecProyecto_article');
    $connection->query('DROP TABLE aecProyecto_user');*/

    $connection->query('
        CREATE TABLE IF NOT EXISTS aecProyecto_user (
            mail VARCHAR(30) PRIMARY KEY,
            userName VARCHAR(20),
            surnames VARCHAR(40),
            password VARCHAR(18),
            isAdmin BOOLEAN
        );
    ');

    $connection->query('
     CREATE TABLE IF NOT EXISTS aecProyecto_article (
            title VARCHAR(40) PRIMARY KEY,
            content VARCHAR(500),
            summary VARCHAR(100),
            artDate DATE,
            user VARCHAR(30),
            FOREIGN KEY (user) REFERENCES aecProyecto_user (mail)
        );
    ');

    $connection->query('
        CREATE TABLE IF NOT EXISTS aecProyecto_comment (
                content VARCHAR(100) PRIMARY KEY,
                commDate DATE,
                user VARCHAR(30),
                article VARCHAR(40),
                FOREIGN KEY (user) REFERENCES aecProyecto_user (mail),
                FOREIGN KEY (article) REFERENCES aecProyecto_article (title)
        );
    ');

    $connection->query('
            CREATE TABLE IF NOT EXISTS aecProyecto_image (
                ID INT(5) AUTO_INCREMENT PRIMARY KEY,
                article VARCHAR(40),
                path TEXT,
                FOREIGN KEY (article) REFERENCES aecProyecto_article (title)
            );
    ');

    /*$connection->query('
        INSERT INTO aecProyecto_user VALUES ("chrisfidare@yahoo.com", "Christian", "Fidalgo Areste", "231203Fideo_", TRUE);
        INSERT INTO aecProyecto_user VALUES ("alexcabrerag@gmail.com", "Alejandro", "Cabrera Gonzalez", "085843AlexCG", TRUE);
        INSERT INTO aecProyecto_user VALUES ("estherruz0302@gmail.com", "Esther", "Ruz Gonzalez", "1234ABCD", TRUE);
    ');*/
/*
    $connection->query('
        INSERT INTO aecProyecto_article VALUES ("Lorem ipsum dolor sit amet", "Lorem ipsum dolor sit amet. Ut dolor corporis et perferendis quod quo magnam perspiciatis 33 quisquam totam qui voluptatibus adipisci et earum quos ut perspiciatis distinctio. Sed facere exercitationem qui molestiae optio non similique odio aut reiciendis expedita eum nemo optio. Et vitae iusto est inventore distinctio et voluptas molestiae.
Sed maiores maiores est pariatur suscipit in placeat soluta. Est accusamus tempora est accusamus provident id autem porro. Qui dolor dolor et expedita inventore aut veniam ullam?
Est sapiente debitis vel nulla placeat et illo galisum et inventore accusamus sed dolor fuga et voluptatem cupiditate? Nam quos rerum ex molestiae excepturi At dolorum unde.
Non inventore voluptatem et Quis voluptas non temporibus suscipit nam neque impedit sed aperiam labore in sint tempore sed veritatis cupiditate. Eum possimus nihil At odio deleniti id quas voluptate et rerum nulla et facere omnis. Est sequi blanditiis et magni accusamus qui blanditiis consequatur aut error consequatur eum galisum quis aut suscipit cumque ad laboriosam totam! Aut voluptate necessitatibus est assumenda nihil eum vitae galisum et laudantium dolorem qui rerum pariatur a enim quisquam et similique perferendis!
Eos nihil galisum sed voluptatum officiis et voluptatem dolores. Non incidunt possimus et officia voluptatem ad dolorem illum vel molestiae quia ut officia odit et illo nihil ut enim dignissimos.
Sed assumenda ipsa qui ducimus animi non laborum adipisci et voluptatem perferendis ut nihil laboriosam At sunt quia vel consequuntur dolorum. Ad totam nisi aut consectetur quae aut omnis culpa et rerum galisum vel officiis quam et sint harum. Ea pariatur accusantium qui libero saepe sit ipsam aliquid? Ab dolor modi aut inventore dignissimos hic iusto ratione est voluptatum magni qui aliquam enim.
Sit voluptas quam nam perferendis pariatur est omnis velit non itaque placeat qui quas molestiae ea totam omnis ex provident voluptate. Ab consequatur accusamus est alias quod sed galisum quam qui vero accusantium et doloribus Quis est autem quam et veniam explicabo. Qui nisi excepturi et velit totam a voluptatem voluptatem aut facilis laboriosam in esse consequuntur ea voluptatem repellat?
", "Lorem ipsum dolor sit amet. Ut dolor corporis et perferendis quod quo magnam perspiciatis 33 quisquam totam qui voluptatibus adipisci et earum quos ut perspiciatis distinctio. Sed facere exercitationem qui molestiae optio non similique odio aut reiciendis expedita eum nemo optio.",
"2022-11-15", "alexcabrerag@gmail.com");
    INSERT INTO aecProyecto_article VALUES ("Ut dolor corporis et perferendis", "Lorem ipsum dolor sit amet. Ut dolor corporis et perferendis quod quo magnam perspiciatis 33 quisquam totam qui voluptatibus adipisci et earum quos ut perspiciatis distinctio. Sed facere exercitationem qui molestiae optio non similique odio aut reiciendis expedita eum nemo optio. Et vitae iusto est inventore distinctio et voluptas molestiae.
Sed maiores maiores est pariatur suscipit in placeat soluta. Est accusamus tempora est accusamus provident id autem porro. Qui dolor dolor et expedita inventore aut veniam ullam?
Est sapiente debitis vel nulla placeat et illo galisum et inventore accusamus sed dolor fuga et voluptatem cupiditate? Nam quos rerum ex molestiae excepturi At dolorum unde.
Non inventore voluptatem et Quis voluptas non temporibus suscipit nam neque impedit sed aperiam labore in sint tempore sed veritatis cupiditate. Eum possimus nihil At odio deleniti id quas voluptate et rerum nulla et facere omnis. Est sequi blanditiis et magni accusamus qui blanditiis consequatur aut error consequatur eum galisum quis aut suscipit cumque ad laboriosam totam! Aut voluptate necessitatibus est assumenda nihil eum vitae galisum et laudantium dolorem qui rerum pariatur a enim quisquam et similique perferendis!
Eos nihil galisum sed voluptatum officiis et voluptatem dolores. Non incidunt possimus et officia voluptatem ad dolorem illum vel molestiae quia ut officia odit et illo nihil ut enim dignissimos.
Sed assumenda ipsa qui ducimus animi non laborum adipisci et voluptatem perferendis ut nihil laboriosam At sunt quia vel consequuntur dolorum. Ad totam nisi aut consectetur quae aut omnis culpa et rerum galisum vel officiis quam et sint harum. Ea pariatur accusantium qui libero saepe sit ipsam aliquid? Ab dolor modi aut inventore dignissimos hic iusto ratione est voluptatum magni qui aliquam enim.
Sit voluptas quam nam perferendis pariatur est omnis velit non itaque placeat qui quas molestiae ea totam omnis ex provident voluptate. Ab consequatur accusamus est alias quod sed galisum quam qui vero accusantium et doloribus Quis est autem quam et veniam explicabo. Qui nisi excepturi et velit totam a voluptatem voluptatem aut facilis laboriosam in esse consequuntur ea voluptatem repellat?
", "Lorem ipsum dolor sit amet. Ut dolor corporis et perferendis quod quo magnam perspiciatis 33 quisquam totam qui voluptatibus adipisci et earum quos ut perspiciatis distinctio. Sed facere exercitationem qui molestiae optio non similique odio aut reiciendis expedita eum nemo optio.",
"2022-11-15", "chrisfidare@yahoo.com");
    INSERT INTO aecProyecto_article VALUES ("Est accusamus tempora est", "Lorem ipsum dolor sit amet. Ut dolor corporis et perferendis quod quo magnam perspiciatis 33 quisquam totam qui voluptatibus adipisci et earum quos ut perspiciatis distinctio. Sed facere exercitationem qui molestiae optio non similique odio aut reiciendis expedita eum nemo optio. Et vitae iusto est inventore distinctio et voluptas molestiae.
Sed maiores maiores est pariatur suscipit in placeat soluta. Est accusamus tempora est accusamus provident id autem porro. Qui dolor dolor et expedita inventore aut veniam ullam?
Est sapiente debitis vel nulla placeat et illo galisum et inventore accusamus sed dolor fuga et voluptatem cupiditate? Nam quos rerum ex molestiae excepturi At dolorum unde.
Non inventore voluptatem et Quis voluptas non temporibus suscipit nam neque impedit sed aperiam labore in sint tempore sed veritatis cupiditate. Eum possimus nihil At odio deleniti id quas voluptate et rerum nulla et facere omnis. Est sequi blanditiis et magni accusamus qui blanditiis consequatur aut error consequatur eum galisum quis aut suscipit cumque ad laboriosam totam! Aut voluptate necessitatibus est assumenda nihil eum vitae galisum et laudantium dolorem qui rerum pariatur a enim quisquam et similique perferendis!
Eos nihil galisum sed voluptatum officiis et voluptatem dolores. Non incidunt possimus et officia voluptatem ad dolorem illum vel molestiae quia ut officia odit et illo nihil ut enim dignissimos.
Sed assumenda ipsa qui ducimus animi non laborum adipisci et voluptatem perferendis ut nihil laboriosam At sunt quia vel consequuntur dolorum. Ad totam nisi aut consectetur quae aut omnis culpa et rerum galisum vel officiis quam et sint harum. Ea pariatur accusantium qui libero saepe sit ipsam aliquid? Ab dolor modi aut inventore dignissimos hic iusto ratione est voluptatum magni qui aliquam enim.
Sit voluptas quam nam perferendis pariatur est omnis velit non itaque placeat qui quas molestiae ea totam omnis ex provident voluptate. Ab consequatur accusamus est alias quod sed galisum quam qui vero accusantium et doloribus Quis est autem quam et veniam explicabo. Qui nisi excepturi et velit totam a voluptatem voluptatem aut facilis laboriosam in esse consequuntur ea voluptatem repellat?
", "Lorem ipsum dolor sit amet. Ut dolor corporis et perferendis quod quo magnam perspiciatis 33 quisquam totam qui voluptatibus adipisci et earum quos ut perspiciatis distinctio. Sed facere exercitationem qui molestiae optio non similique odio aut reiciendis expedita eum nemo optio.",
"2022-11-15", "chrisfidare@yahoo.com");
    ');*/

/*$connection->query('
        INSERT INTO aecProyecto_image VALUES(NULL, "Lorem ipsum dolor sit amet", "test_dog.jpg");
        INSERT INTO aecProyecto_image VALUES(NULL, "Ut dolor corporis et perferendis", "test_dog.jpg");
        INSERT INTO aecProyecto_image VALUES(NULL, "Est accusamus tempora est", "test_dog.jpg");
');*/
