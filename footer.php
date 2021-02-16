
       
             <div class="box">
            <div class="row">

                <div class="col-md-4">
                    <h3 class="needhelp">NEED A HELP ?</h3>
                    <h3 id="callnumber"><i class="glyphicon glyphicon-phone-alt"></i>Call Us Now <strong> 123.456.789</strong></h3>
                    <p id="callpar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore sint minima tenetur dignissimos laudantium! Dolores laborum vitae consequuntur enim doloribus sequi reprehenderit consequatur, quo amet, quaerat fugiat suscipit, veniam minima!</p>
                </div>
                <div class="col-md-8">
                    <div class="col-md-3">
                        <h4 class="carRenatlH4">G-CarRental</h4>
                          <ul class="carentalOl">
                              <li><a href="agences.php">agence</a></li>
                           
                              <li><a href="cars.php">Cars</a></li>
                          </ul>
                    </div>
                    <div class="col-md-3">
                            <h4 class="carRenatlH4">About G-CarRental</h4>
                              <ul class="carentalOl">
                                  <li><a href="About.php">About us</a></li>
                                  <li><a href="#">Careers</a></li>
                                  <li><a href="#">Corporation Profile</a></li>
                                  <li><a href="#">Press Room</a></li>
                                  <li><a href="#">Terms of Use</a></li>
                                  
                              </ul>
                        </div>
                        <div class="col-md-3">
                                <h4 class="carRenatlH4">Car Support</h4>
                                  <ul class="carentalOl" >
                                      <li><a href="contact.php">Contact Us</a></li>
                                      <li><a href="#">FAQs</a></li>
                                      
                                  </ul>
                            </div>
                            <div class="col-md-3">
                                    <h4 class="carRenatlH4">G-CarRental Login</h4>
                                      <ul class="carentalOl">
                                        <?php if(!isset($_SESSION['username'])){ ?>
                                          <li><a href="loginAdmin.php">Login as admin</a></li>
                                        <?php } ?>
                                         
                                      </ul>
                                </div>


                </div>
                
            </div>
             </div>
             <div class="footer">
                    
                     <footer>
                      <p>G-CarRental. Copyright &copy;2021. | Terms of Use Private Policy</p>
                     </footer>
                  
             </div>
                </div>
             </div>
     
          </div><!--End container-->
        

    </div><!--Endof wrapper!-->




