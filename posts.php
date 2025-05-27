<?php
include_once "post.php";

class Posts
{
    private $conn;
    function __construct($server, $user, $password, $database)
    {
        $this->conn = new mysqli($server, $user, $password, $database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function getPosts()
    {
        $sql = "SELECT * FROM blogs";
        $result = $this->conn->query($sql);
        $posts = [];
        while ($row = $result->fetch_object()) {
            $posts[] = new Post($row->id, $row->name, $row->title, $row->content, $row->created_at);
        }
        return $posts;
    }

    function addPost($name, $title, $content)
    {
        $created_at = date('m/d/Y h:i:s a', time());
        $sql = "INSERT INTO blogs (name, title, content, created_at) VALUES ('$name', '$title', '$content', '$created_at')";
        $this->conn->query($sql);
    }

    function postById($id)
    {
        $sql = "SELECT * FROM blogs WHERE id = '$id'";
        $result = $this->conn->query($sql);
        $posts = [];
        while ($row = $result->fetch_object()) {
            $posts[] = new Post($row->id, $row->name, $row->title, $row->content, $row->created_at);
        }
        return $posts;
    }

    function flagPost($id, $reason)
    {
        $select = "SELECT * FROM blogs WHERE id = '$id'";
        $update = "UPDATE blogs SET reported = CONCAT(reported, '[$reason]') WHERE id = '$id'";
        $this->conn->query($update);
        $result = $this->conn->query($select);
        $posts = [];
        while ($row = $result->fetch_object()) {
            $posts[] = new Post($row->id, $row->name, $row->title, $row->content, $row->created_at);
        }
        return $posts;
    }
}
