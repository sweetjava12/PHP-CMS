<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/functions.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <!-- Blog Post -->
                <?php

                if(isset($_GET['p_id'])) {

                    $view_post_id = $_GET['p_id'];
                    $view_query = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id = {$view_post_id} ";
                    $send_query = mysqli_query($connection, $view_query);

                    if (!$send_query) {
                        die("Query Failed!" . mysqli_error($connection));
                    }
                   
                                
                    $query = "SELECT * FROM posts WHERE post_id = {$view_post_id}";
                    $select_all_posts = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($select_all_posts)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                    
                    ?>
            <div class="col-md-8">
                <h1 class="page-header">
                    <?php echo $post_title; ?>
                    <small>by <a href="#"><?php echo $post_author; ?></a></small>
                </h1>

               <!--  <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2> -->
                <!-- <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p> -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?> </p>
                <hr>

                <?php 

                    if(empty($post_image)) {
                        echo "";
                    } else {
                        echo "<img class='img-responsive' src='images/{$post_image}' alt=''>";
                    }

                ?>
                <hr>
                <p><?php echo $post_content; ?></p>
                
                <hr>
                    
              <?php } ?>
        <?php } ?>

              <?php include "includes/comments.php"; ?>

                <hr>

 
            </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>

        </div>

    
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>