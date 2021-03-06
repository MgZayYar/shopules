 


<?php 
require 'dbconnect.php';
include('Backend_Header.php');
 ?>
 <main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Category Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="subcategorylist.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="subcategoryadd.php" method="POST" enctype="multipart/form-data">
                                
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> subCategory </label>
                                    <div class="col-sm-10">
                                      <select class="custom-select" name="category">
                    <option selected>Choose Category</option>
                    <?php 
                    $sql="SELECT * FROM categories";
                    $stmt=$conn->prepare($sql);
                    $stmt->execute();
                    $rows=$stmt->fetchAll();
                    foreach ($rows as $row ) {
                        $id=$row['id'];
                        $name=$row['name'];
                        ?>
                        <option value="<?php echo $id; ?>">
                            <?php echo $name; ?>
                        </option>
                    <?php   }   ?>
                </select>   
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                            Save
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php 
include('Backend_Footer.php');
 ?>