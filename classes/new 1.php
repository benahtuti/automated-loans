<?php
include 'config/new.php';
						if(isset($_POST['submit'])){
							
							$fname = $_POST['fname'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$gender = $_POST['gender'];
							$location = $_POST['location'];
							$image = md5($_POST['image']);
							$KRA = $_POST['KRA'];
							$working_status= md5($_POST['working_status']);
							$identity = $_POST['identity'];
							$password = md5($_POST['password']);
							
							
							$qry = "INSERT INTO borrower(fname, email, phone, identity, password, location, image,KRA,working_status, gender) 
							VALUES ('$fname','$email','$phone','$identity','$password','$location','$image','$KRA','$working_status','$gender')";
							$result=mysqli_query($conn,$qry) or die(mysqli_error($conn));
							if($result>0){
								echo "<script type = \"text/javascript\">
											alert(\"Borrower Successfully Registered.\");
											window.location = (\" log.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Borrrower Registration Failed. Try Again\");
											window.location = (\" log.php\")
											</script>";
							}
						}
						
					  ?>