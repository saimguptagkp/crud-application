
<html>
<head>
    <title><?php echo("Crud App"); ?></title>
    <meta name="author" content="Sandeep Gupta">
    <meta charset="utf-8">
   
    <link rel="shortcut icon" type="image/png" href="http://localhost/saimgupta/images/rps-logo.png"/> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    </head>
<body>
		



    <div class="container-flued">
    <div class="row">
       
        <div class=" col-sm-12 heading text-center text-bg">
         <p></p>
           <h1 class="text-primary"> Add Country Name</h1>
        </div>
        
        </div>
        <div class="col-sm-6 offset-sm-3">
             <table class="table table-striped">
    <thead>
      <tr>
        <th>Admin</th>
        <th>Country</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
        <?php 
           require ("config/database.php"); 

       		$dbNew=new Database();
       		
       	    $getRow=$dbNew->getRows("SELECT admin, country, id FROM App");
       	    
      if(isset($_POST['submit'])){
        			$data['admin']=$_POST['admin'];
        			$data['country']=$_POST['country'];
        			$qwert="INSERT INTO App(admin,country)VALUES(:admin,:country)";
        			$insertRow=$dbNew->insertRow($qwert,$data);

        	$getRow=$dbNew->getRows("SELECT * FROM App");
        }
        ?>
        <tr>
            <td class="btn btn-warning" colspan="3"><?php echo " Totale Record ". count($getRow) ?></td>
        </tr>
        <?php 
        	if(!isset($_GET['edit'])){
        foreach ($getRow as $dd) {  ?> 
        
      <tr>
        <td><?php echo $dd['admin']; ?></td>
        <td><?php echo $dd['country']; ?></td>
        <td>
        <a class="btn btn-primary" href="index.php?edit=<?php echo $dd['id']; ?>">Edit</a>

         <a class="btn btn-danger" href="index.php?delete=<?php echo $dd['id']; ?>">Delete</a>
       </td>
      </tr>
     <?php } } ?>
        
       
    </tbody>
  </table>
        </div>
        
        <div class="col-sm-6 offset-sm-3 align-self-center">
        	 <?php 
        	 

        	   $edit =$_GET['edit'];
        	   $delete=$_GET['delete'];
        	  if(isset($_GET['edit'])){
        	  	$getRow=$dbNew->getRow("SELECT * FROM App WHERE id=$edit");
        	  }
        	  if(isset($_POST['update'])){
        	  	$data['id']=$_POST['id'];
        	  	$data['admin']=$_POST['admin'];
        	  	$data['country']=$_POST['country'];

        	  	$dataUpdate="UPDATE App SET admin= :admin, country= :country WHERE id= :id";
        	  	$updateData=$dbNew->updateRow($dataUpdate,$data);

        	  	
        	  }
        	  if(isset($_GET['delete'])){
        	  	$data['id']=$_GET['delete'];
        	  	$dataDelete="DELETE FROM App WHERE id= :id";
        	  	if($deleteRow=$dbNew->deleteRow($dataDelete,$data)){
        	  		header("Location:index.php");
        	  	}
        	  }
        	  if(isset($_POST['cancel'])){
        	  	header("Location:index.php");
        	  }

       ?>
        	
           <?php 
           		if(isset($_GET['edit'])){?>

           		<form class="form-group" method="post" action="">
                <div class="form-group">
                    <label class="" for="id"></label>
                    <input type="text" class="form-control" value="<?php echo $getRow['id'];?>" name="id" readonly="TRUE">
                </div>
                <div class="form-group">
                    <label class="" for="adminname"></label>
                    <input type="text" class="form-control" value="<?php echo $getRow['admin'];?>" name="admin" required>
                </div>
                 <div class="form-group">
                    <label class="" for="country"></label>
                    <input type="text" class="form-control" value="<?php echo $getRow['country'];?>"  name="country" required>
                </div>
                 <div class="form-group">
                    <label class="" for="adminname"></label>
                    <input type="submit" class="btn btn-primary" value="Cancel" name="cancel">
                    <input type="submit" class="btn btn-primary" value="Update" name="update">
                </div>
            </form>
           		<?php }else
           		{?>
           			 <form class="form-group" method="post" action="#">
                <div class="form-group">
                    <label class="" for="adminname"></label>
                    <input type="text" class="form-control" placeholder="Admin Name" name="admin" required>
                </div>
                 <div class="form-group">
                    <label class="" for="country"></label>
                    <input type="text" class="form-control" placeholder="Country Name"  name="country" required>
                </div>
                 <div class="form-group">
                    <label class="" for="adminname"></label>
                    <input type="submit" class="btn btn-primary" value="Save" name="submit">
                </div>
            </form>
           		<?php }

           ?>
        </div>
    
    </div>
    
    
   



    </body>


</html>