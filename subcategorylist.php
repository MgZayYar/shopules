<?php 
require 'Backend_Header.php';
require 'dbconnect.php';
?>
<main class="app-content">
 <div class="app-title">
  <div>
    <h1> <i class="icofont-list"></i> Subcategory </h1>
  </div>
  <ul class="app-breadcrumb breadcrumb side">
    <a href="subcategorynew.php" class="btn btn-outline-primary">
      <i class="icofont-plus"></i>
    </a>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category_Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $sql = "SELECT subcategories.id as sid, subcategories.name as sname, categories.name as cname from subcategories INNER JOIN categories ON subcategories.category_id = categories.id ORDER BY subcategories.name ASC";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $rows=$stmt->fetchAll();
                  //print("<pre>".print_r($rows,true)."</pre>");
              $j=1;
              foreach ($rows as $subcategory ):
                $sid=$subcategory['sid'];
                $sname=$subcategory['sname'];
                $cname=$subcategory['cname'];                  
                ?> 
                <tr>
                  <td><?php echo $j++ ?></td>
                  <td><?php echo $sname ?></td>
                  <td><?php echo $cname ?></td>
                  <td>
                    <a href="subcategoryedit.php?id=<?= $sid ?>" class="btn btn-warning">
                      <i class="icofont-ui-settings"></i>
                    </a>
                    
                    <a href="subcategorydelete.php?id=<?= $sid ?>" class="btn btn-outline-danger">
                      <i class="icofont-close"></i>
                    </a>
                  </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</main>

<?php 
require 'Backend_Footer.php';
?>