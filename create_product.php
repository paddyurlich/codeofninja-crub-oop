<?php
// set page headers
$page_title = "Create Product";
include_once "header.php";



echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Read Products</a>";
echo "</div>"


// get database connection
include_once 'config/database.php';
 
$database = new Database();
$db = $database->getConnection();
?>


<!-- HTML form for creating a product -->
<form action='create_product.php' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>
 
            
    	<tr>
		    <td>Category</td>
		    <td>
		    <?php
		    // read the product categories from the database
		    include_once 'objects/category.php';
		 
		    $category = new Category($db);
		    $stmt = $category->read();
		 
		    // put them in a select drop-down
		    echo "<select class='form-control' name='category_id'>";
		        echo "<option>Select category...</option>";
		 
		        while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
		            extract($row_category);
		            echo "<option value='{$id}'>{$name}</option>";
		        }
		 
		    echo "</select>";
		    ?>
		    </td>
		</tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
</form>














<?php
include_once "footer.php";
?>