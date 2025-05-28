<h1 class='my-3 text-center'>Report post</h1>
<div class='row'>
    <?php
    include_once "posts.php";
    $id = $_GET['id'];
    $postsModel = new Posts("localhost", "root", "", "blog");
    $posts = $postsModel->postById($id);
    foreach ($posts as $post) {
        echo "
        <div class='col-sm-6'>
            <div class='card'>
                <div class='card-body'>
                    <h4>By: $post->name <span class='date'>$post->created_at</span></h4>
                    <h5 class='card-title title'>$post->title</h5>
                    <p class='card-text content'>$post->content</p>
                    <form method='POST' action='?todo=flag&id=$id'>
                        <div class='mb-3'>
                            <label for='reason' class='form-label'>Reason</label>
                            <input type='text' class='form-control' id='reason' name='reason' maxlength='40' required>
                        </div>
                        <button type='submit' class='btn btn-primary'>Send report</button>
                    </form>
                </div>
            </div>
        </div>
    ";
    echo "</div>";

    $reports = $postsModel->reportsById($id);
    echo "
    <div class='col-sm-6'>
        <div class='card'>
            <div class='card-body'>
                <h4>";
                    if(count($reports) == 0){echo "No previous reports - 3 until removed";} else {echo "Previous reports (" . count($reports) . "), " . 3 - count($reports) . " until removed";};
                echo "</h4>
                <ul>";
                foreach ($reports as $report) echo "<li>'$report'</li>";
                "</ul>
            </div>
        </div>
    </div>
    ";
    }

    ?>