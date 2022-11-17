<?php
    require_once ($_SERVER['DOCUMENT_ROOT'].'/db/db_connection/db_connection.php');

    class Article {
        private $connection;
        private $articles;

        public function __construct($configPath) {
            global $db_config;
            global $page_config;
            $this->connection = Connection::connect($db_config);
            require_once ($configPath);
        }

        public function getArticlesPerPage ($page): bool|array {
            global $page_config;
            $start = ($page > 1) ? ($page * $page_config['articles_per_page']) - $page_config['articles_per_page'] : 0;
            $results = (!isset($_POST['filter'])) ?
                $this->connection->query('SELECT * FROM aecProyecto_article LIMIT ' . $start .
                ', ' . $page_config['articles_per_page'] . ';') :
                $this->connection->query('SELECT * FROM aecProyecto_article aec WHERE aec.title LIKE "%' . $_POST['filter']
                    . '%" LIMIT ' . $start . ', ' . $page_config['articles_per_page'] . ';');
            return $results->fetchAll();
        }

        public function getTotalArticles() {
            $totalArticles = $this->connection->query('SELECT count(*) FROM aecProyecto_article');
            $this->articles = $totalArticles->fetch()[0];
            return $this->articles;
        }

        public function getTotalPages (): float|int {
            global $page_config;
            return ($this->getTotalArticles() / $page_config['articles_per_page']);
        }

        public function getImagesPerPage ($articles): bool|array {
            $images = [];
            foreach ($articles as $article) {
                $image = $this->connection->query('SELECT * FROM aecProyecto_image WHERE article="'.$article['title'].'";')->fetch();
                array_push($images, $image);
            }
            return $images;
        }

    }