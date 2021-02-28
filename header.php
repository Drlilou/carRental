<!--Wrapper -->
<div class="wrapper">
        <!--NavBar -->
     <div class="container">

      <?php 
      if(empty($_SESSION['username']))  {?>
           <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation"><a href="login.php">Your rent car services</a></li>
                        <li id="btnlogin"><a href="login.php">Login</a></li>
                        <li role="presentation"><a href="register.php">Not Yet A Member?</a></li>
                         <li id="btnjoin"><a href="register.php">JOIN NOW</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted">S&M-CarRental</h3>
           </div>
             <?php  }else{?>
      <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation"><a href="logout.php">logout?</a></li>
                        <li id="btnjoin"><a href="logout.php">logout</a></li>
                    </ul>
                </nav>
                <h3 class="text-muted">S&M-CarRental</h3>
           </div>
             <?php } ?>   
           <div class="header clearfix">
                        <nav>
                          <ul class="nav nav-pills pull-right">
                              <?php if(!isset($_SESSION['ag'])){ ?>
                            <li class="linav" ><a href="index.php">Home</a></li>
                          
                            <li class="linav"><a href="./agences.php">Agences</a></li>
                           
                          <?php }else{

                            ?>
                                 <li class="linav"><a href="./location.php">location</a></li>
                          
                            <?php  
                          } if(isset($_SESSION['id']))
                                  echo ' <li class="linav"><a href="./location.php">My location</a></li>';

                          ?>
                           <li class="linav"><a href="./cars.php">Cars</a></li>
                            <li class="linav "><a href="./about.php">About </a></li>
                            <li class="linav "><a href="./contact.php">Contact</a></li>

                          </ul>
                        </nav>
                       
             </div>