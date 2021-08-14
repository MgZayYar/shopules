<?php 
require 'dbconnect.php';
require 'Backend_Header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM subcategories WHERE id = :id";
$stmt = $conn-> prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$row = $stmt->fetch(PDO:: FETCH_ASSOC);
$sid = $row['id'];
$name = $row['name'];
 ?>
 <!-- Page Heading -->
           <div class="row">
	<div class="col-lg-11">
		<h1 class="h3 mb-2 text-gray-800">Subcategory</h1>
	</div>
	<div class=" col-lg-1 pl-5">            
		<button><a href="subcategorylist.php"><i class="fas fa-backward"></i></a></button>
	</div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Edit New Subcategory </h6>
	</div>
<form action="subcategoryupdate.php" method="POST" >
	<input type="hidden" name="id" value="<?php echo $sid ?>">
	<!-- <input type="hidden" name="oldcategory" value="<?php echo $category; ?>">
 -->
		<div class="form-group row">		
			<label for="categoryName" class="col-sm-2 col-form-label">Category </label>		
			<div class=" col-sm-10">
				<select class="custom-select" name="category" value="<? echo $sid; ?>" >
					<option selected>Choose Category</option>
					<?php 
					$sql="SELECT * FROM categories ";
					$stmt=$conn->prepare($sql);
					$stmt->execute();
					$rows=$stmt->fetchAll();
					foreach ($rows as $row ) {
						$cid=$row['id'];
						$cname=$row['name'];
						?>
						<option <?php
							if ($cid == $sid) { echo "selected"; ?> value="<?php echo $cid; ?>" >
							<?php echo $cname; ?>
						</option>
						<?php
							}
						?>
						<option value="<?php echo $cid; ?>">
							<?php echo $cname; ?>
						</option>
					<?php 	} 	?>
				</select>	
			</div>		
		</div>
		<div class="form-group row">
			<label for="categoryName" class="col-sm-2 col-form-label"> Name </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="categoryName" placeholder="Enter Category Name" name="name" value="<? echo $name; ?>">
			</div>
		</div>
		<div class="form-group row">		
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
			</div>	
		</div>
	</form>
	<?php 
	require 'Backend_Footer.php';
	?>