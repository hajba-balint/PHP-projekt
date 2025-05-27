<?php
    include_once "post.php";

    class Posts{
        private $conn;
        function __construct($server, $user, $password, $database) {
        $this->conn = new mysqli($server, $user, $password, $database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function getTasks() {
        $sql = "SELECT * FROM tasks";
        $result = $this->conn->query($sql);
        $posts = [];
        while ($row = $result->fetch_object()) {
            $posts[] = new Post($row->id, $row->name, $row->title, $row->content, $row->created_at);
        }
        return $posts;
    }
    }
?>