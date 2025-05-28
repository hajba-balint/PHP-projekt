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
        $sql = "SELECT * FROM blogs WHERE visibility = true";
        $result = $this->conn->query($sql);
        $posts = [];
        while ($row = $result->fetch_object()) {
            $posts[] = new Post($row->id, $row->name, $row->title, $row->content, $row->created_at);
        }
        return $posts;
    }

    function sortAsc($posts)
    {;
        return $posts;
    }

    function sortDesc($posts)
    {
        $posts = array_reverse($posts);
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
        $select = "SELECT * FROM blogs WHERE id = '$id' AND visibility = true";
        $update = "UPDATE blogs SET reports =
        CASE 
            WHEN reports IS NULL OR reports = '' THEN '[$reason]'
            ELSE CONCAT(reports, ',[$reason]')
        END 
        WHERE id = '$id'";
        $this->conn->query($update);
        $result = $this->conn->query($select);
        $row = $this->conn->query("SELECT reports FROM blogs WHERE id = $id")->fetch_assoc();
        if (substr_count($row['reports'], '[') >= 3) {
            $this->conn->query("UPDATE blogs SET visibility = false WHERE id = $id");  //////// made invisible after 3 reports
        }
        $posts = [];
        while ($row = $result->fetch_object()) {
            $posts[] = new Post($row->id, $row->name, $row->title, $row->content, $row->created_at);
        }
        return $posts;
    }

    function reportsById($id)
    {
        $sql = "SELECT reports FROM blogs WHERE id = '$id'";
        $result = $this->conn->query($sql);
        $cleanReports = [];
        while ($row = $result->fetch_object()) {
            if($row->reports == null){
                return [];
            }
            $rawReports = explode(",", $row->reports);
            foreach ($rawReports as $report) {
                $cleanReports[] = trim($report, "[]");
            }
        return $cleanReports;
    }
}
}