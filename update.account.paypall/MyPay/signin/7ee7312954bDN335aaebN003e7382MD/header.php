<div class="navbar navbar-inverse navbar-fixed-top">

      <div class="navbar-inner">
      <button style="margin-top: 15px;" data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

        <div class="container">
        
        <a class="brand" href="#"><img src="../../img/paypallogo2.png" /></a>
         <div style="margin-top:10px;"><a class="brand" href="login.php?email=<?php if(isset($_SESSION['_email_'])){ echo $_SESSION['_email_'];} ?>&confirmation_code=3b2hN76Aq6&op=confirm_account_3b2hF76Aq6&tmpl=profile%2Fmyaccount&aid=358301&new_account=1&import=1"><img src="../../img/homeicon.png" /></a></div>
         


          <div class="nav-collapse">
            <ul class="nav">            
              <li class="active"><a href="#"><?php echo $MY_MONEY_TXT;?></a></li>
              <li><a href="#"><?php echo $TRANSACTIONS_TXT;?></a></li>
              <li><a href="#"><?php echo $CLIENTS_TXT;?></a></li>
              <li><a href="#"><?php echo $RESOURCES_TXT;?></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $MORE_TXT;?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#"><?php echo $REPORTS_TXT;?></a></li>
                  <li><a href="#"><?php echo $RESOLUTION_CENTER_TXT;?></a></li>
                  <li><a href="#"><?php echo $EVALUATION;?></a></li>
                 </ul>
              </li>
            </ul>
          <a href="logout.php" class="btn"><?php echo $LOGOUT_TXT;?></a>
                    
          </div><!--/.nav-collapse -->
          
        </div>
       
         
        
      </div>
    </div>

