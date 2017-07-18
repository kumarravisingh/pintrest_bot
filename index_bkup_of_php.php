<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
function CheckComment(val){
 var element=document.getElementById('comment');
 if(val=='searchandcomment')
   element.style.display='block';
 else  
   element.style.display='none';
}

</script> 
</head>
<body>
	
	<form method="POST" action="perform_action.php">
		User ID : <input type="text" name="id" placeholder="Enter pintrest id" /><br/>
		Password : <input type="text" name="password" placeholder="Enter pintrest password" /> <br/>
		Task Type :
		<select name="taskoption" onchange='CheckComment(this.value);'>
		  <option value="searchandfollow">search and follow</option>
		  <option value="searchandcomment">search and comment</option>
		</select>
		<br/>
		Comment : <input type="text" name="comment" id="comment" style='display:none;' placeholder="Enter your comment here" />
			<br/>

		Keyword :
		<input type="text" name="keyword" placeholder="Enter keyword" /> <br/>
		On How Many Results :
		<select name="resultsize">
		  <option value="5">5</option>
		  <option value="10">10</option>
		  <option value="15">15</option>
		  <option value="20">20</option>
		  <option value="25">25</option>
		  <option value="50">50</option>
		  <option value="100">100</option>
		  
		</select> 
		<br/>
		<input type="submit" name="action" value="Peform Action">
		


	</form>



</body>
