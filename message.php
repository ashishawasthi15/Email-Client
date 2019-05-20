<html lang="en">
<head>
   
   <title>Gmail Message Detail</title>
   <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <link href="css/tab.css" rel="stylesheet" id="bootstrap-css">
    
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://#');
        });
    </script>
</head>
<body>

	<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Gmail <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li ><a  style='color:red;' href="#">Mail</a></li>
                    <li><a href="#">Contacts</a></li>
                    <li><a href="#">Tasks</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9 col-md-10">
            <!-- Split button -->
            <div class="btn-group">
                <button type="button" class="btn btn-default">
                    <div class="checkbox" style="margin: 0;">
                        <label>
                            <input type="checkbox">
                        </label>
                    </div>
                </button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">All</a></li>
                    <li><a href="#">None</a></li>
                    <li><a href="#">Read</a></li>
                    <li><a href="#">Unread</a></li>
                    <li><a href="#">Starred</a></li>
                    <li><a href="#">Unstarred</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-default" data-toggle="tooltip" title="Refresh">
                &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;&nbsp;</button>
            <!-- Single button -->
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    More <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Mark all as read</a></li>
                    <li class="divider"></li>
                    <li class="text-center">
					<small class="text-muted">Select messages to see more actions</small>
					</li>
                </ul>
            </div>
            <div class="pull-right">
                <span class="text-muted"><b>1</b>–<b>50</b> of <b>277</b></span>
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <hr />
    
        
            <!--gmail start -->
			<?php
    if (! function_exists('imap_open')) {
        echo "IMAP is not configured.";
        exit();
    } else {
        ?>
<div id="listData" class="list-form-container"> 
    <?php
        
        /* Connecting Gmail server with IMAP */
        $connection = imap_open('{imap.gmail.com:993/imap/ssl}INBOX', 'ashuphpjobfinder@gmail.com', '@Ashish1234') or die('Cannot connect to Gmail: ' . imap_last_error());
        
        /* Search Emails having the specified keyword in the email subject */
     $emailData = imap_search($connection, 'ALL');
        
        if (! empty($emailData)) {
			 rsort($emailData);
            ?>
			
			<div class="row">
	        <div class="col-sm-3 col-md-2">
            <a href="#" class="btn btn-danger btn-sm btn-block" role="button">COMPOSE</a>
            <hr />
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="index1.php"><span class="badge pull-right"><?php echo   sizeof($emailData); ?></span> Inbox </a>
                </li>
                <li><a style='color:black;' href="#">Starred</a></li>
                <li><a style='color:black;' href="#">Important</a></li>
                <li><a style='color:black;' href="#">Sent Mail</a></li>
                <li><a style='color:black;' href="#">
				<span class="badge pull-right">20</span>Drafts</a></li>
            </ul>
        </div>
 <!-- Nav tabs -->
          <div class="col-sm-9 col-md-10"> 
		   
                <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">
				<span class="glyphicon glyphicon-inbox">
                </span>Primary</a></li>
                <li><a style="color:black;" href="#profile" data-toggle="tab">
				<span class="glyphicon glyphicon-user">
				</span>Social</a></li>
                <li><a style="color:black;" href="#messages" data-toggle="tab">
				<span class="glyphicon glyphicon-tags">
				</span>Promotions</a></li>
                <li><a style="color:black;" href="#settings" data-toggle="tab">
				<span class="glyphicon glyphicon-plus no-margin">
                </span></a></li>
            </ul>
            <!-- Tab panes -->
			
            <div class="tab-content">
			<!-- Nav tabs -->
		   <?php
            foreach ($emailData as $emailIdent) {
                
                $overview = imap_fetch_overview($connection, $emailIdent, 0);
               $message = imap_fetchbody($connection, $emailIdent, '2');
               
                ?>
		    <!-- Nav tabs -->
                <div class="tab-pane fade in active" id="home">
                    <div class="list-group">
                        
                    <a href="#" class="list-group-item">
                    <div class="checkbox">
                       <label>
                        <input type="checkbox">
                       </label>
                    </div>
                    <span class="glyphicon glyphicon-star-empty"></span>
				<?php echo $overview[0]->subject, $message ; ?>
					
                     
					 
					
					</a>
                    
					
                  <!--  <div class="checkbox">
                       <label>
                        <input type="checkbox">
                       </label>
                    </div> -->
					<?php
            } // End foreach
            ?>
                    
                    
                        
                    </div>
				          </div>
						  	<?php
        } // end if
        
        imap_close($connection);
    }
    ?>
      
                
            </div>
           
        </div>
    </div>
</div>

</body>
</html>
