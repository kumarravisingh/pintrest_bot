<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Pintret Bot Action</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
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
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Pintrest Action</h1>
      </div>
      <div class="modal-body">
          <form method="POST" action="perform_action.php" class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" name="id" class="form-control input-lg" placeholder="Enter Email id" />
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Enter pintrest password" />
            </div>

              <div class="form-group">
              <select name="taskoption" class="form-control input-lg" onchange='CheckComment(this.value);'>
              <option value="searchandfollow">search and follow</option>
              <option value="searchandcomment">search and comment</option>
              <option value="searchandlike">search and like</option>
              </select>
              </div>

              <div class="form-group">
              <input type="text" name="comment" id="comment" class="form-control input-lg" style='display:none;' placeholder="Enter your comment here" />
              </div>

              <div class="form-group">
              <input type="text" name="keyword" class="form-control input-lg" placeholder="Enter keyword" />
              </div>

              <div class="form-group">
              <select name="resultsize" class="form-control input-lg">
              <option value="5" selected disabled>On How Many Results</option>
              <option value="1">1</option>
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="100">100</option>
              </select> 
              </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block" name="action" value="Peform Action">
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>