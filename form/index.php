<?php
    session_start();
    
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    $fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];
?>

<!DOCTYPE html>


<html lang="en">
	<head>

	</head>

	<body class="no-trans">
	    
	    <?php if(!empty($errors)): ?>
    	    <div>
    	        <ul>
    	            <li><?php echo implode('</li><li>', $errors);?></li>
    	        </ul>  
    	    </div>
	    <?php endif; ?>
	    
        <form action="message.php" method="post">
            <input type="text" name="name">
            <input type="text" name="email">
            <textarea type="text" name="message"></textarea>
                       
            <input type="submit" value="Send">
                    
        </form>

	</body>
</html>

<?php
    unset($_SESSION['errors']);
?>
