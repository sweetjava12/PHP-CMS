<?php include "../includes/db.php" ?>
<?php include "functions.php"; ?>
<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                        
                            <?php insertCategory(); ?>
                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Category Name</label>
                                    <input name="cat_title" type="text" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary" /><br /><br />
                                </div>
                            </form>
                            
                            <?php
                            
                            if(isset($_GET['edit'])) {
                                
                                $cat_id = $_GET['edit'];
                                
                                include "includes/update_category.php";
                            }
                            
                            
                            ?>
                            

                        </div><!--/ Add Category Form -->
                        
                        <div class="col-xs-6">
                            
                            <?php // Find Categories Query 
                                
                            
                            ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php findAllCategories(); ?>
                                    
                                    <?php deleteCategory(); ?>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    
<?php include "includes/admin_footer.php" ?>