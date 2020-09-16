    <?php
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM posts WHERE user_id = $user_id";
    $query = mysqli_query($db_connect, $sql);
    $i = 1;
    while($row = mysqli_fetch_assoc($query)){
        $id = $i++;
        $post_id = $row['id'];
        $author = $row['author'];
        $title = $row['title'];
        $content = $row['content'];
        $image = $row['image'];
        $date = $row['date'];  ?>

    <tr>
        <td><?= $id; ?></td>
        <td><?= $author; ?></td>
        <td><?= $title;?></td>
        <td><?= $content; ?></td>
        <td><img width='100' src='../assets/<?= $image;?>'></td>
        <td><?= formatDate($date); ?></td>
        <td>
        <a href="edit_post.php?edit-details=<?= $post_id; ?>" class="btn btn-success">Edit</a> 
        |<a href="?delete-post=<?= $post_id; ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    <?php } ?>