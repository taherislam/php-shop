<?php include "inc/header.php";?>
<?php  
	$login = Session::get("cuslogin");
	if ($login == true) {
		header("Location:order.php");
	}
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $customerLog = $cmr->customerLogin($_POST);

	}
?>
<div class="main">
<div class="content">	
	<div class="login_panel">
      <h3>Existing Customers</h3>
    	<p>Sign in with the form below.</p>
    	<?php 
			if (isset($customerLog )) {
				echo $customerLog ;
			}
		?>
		<form action="" method="post">
	    	<input name="email" placeholder="E-mail" type="text" >
	        <input name="pass" placeholder="Password" type="password">
	 	 	<div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
	 	</form>
    </div>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $customerReg = $cmr->customerRegistration($_POST);

}

?>    
	<div class="register_account">
		<h3>Register New Account</h3>
		<?php 
			if (isset($customerReg )) {
				echo $customerReg ;
			}
		?>
		<form action="" method="post">
		 	<table>
				<tbody>
				<tr>
				<td>
					<div>
						<input type="text" name="name" placeholder="Name" />
					</div>
					
					<div>
					   <input type="text" name="city" placeholder="City" />
					</div>
					
					<div>
						<input type="text" name="zip" placeholder="Zip-Code" />
					</div>
					<div>
						<input type="text" name="email" placeholder="E-mail" />
					</div>
    			 </td>
    			<td>
					<div>
						<input type="text" name="address" placeholder="Address" />
					</div>
					<div>
						<input type="text" name="country" placeholder="Country" />
					 </div>		        

		           	<div>
		          		<input type="text" name="phone" placeholder="Phone" />
		         	</div>
				  
				  	<div>
						<input type="text" name="pass" placeholder="Password" />
					</div>	
	    		</td>
	    	</tr> 
	    </tbody>
	</table> 
	   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
	   
	    <div class="clear"></div>
	    </form>
	</div>  	
   <div class="clear"></div>
</div>
</div>
<?php include "inc/footer.php";?>