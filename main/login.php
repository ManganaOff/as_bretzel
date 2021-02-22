


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Primary Meta Tags -->
        <meta name="title" content="Shop tools with cheap prices">
        <meta name="description" content="[Accounts], [CC's], [Banks], [Sells], [WHM/Cpanels], [Pages], [Letters], [Leads], [SMTPS], [PHPMailers], [RDP'/VPS], [Script/Bots], [Methodes], [Documents]">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://localhost/login">
        <meta property="og:title" content="Shop tools with cheap prices">
        <meta property="og:description" content="[Accounts], [CC's], [Banks], [Sells], [WHM/Cpanels], [Pages], [Letters], [Leads], [SMTPS], [PHPMailers], [RDP'/VPS], [Script/Bots], [Methodes], [Documents]" >
        
         
        <?php
            include "../components/styles.php";
        ?>

       <title>[Login] AS Bretzel</title> 
    </head>
    <style>
         .dt-center {
            text-align: center !Important;
         }
    </style>
    <body data-sa-theme="4">    
        <div class="login">

            <!-- Login -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <img class="user__img" src="http://144.202.124.151/img/flogo.png" alt="">
                    Hi, Please Sign in

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="">Create an account</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(isset($_GET['register']) && $_GET['register'] == 'success') { ?>
                    <div style="font-weight: bold" class="alert alert-success">
                        You have successfully registered. You can log in now.
                    </div>
                <?php } ?>


                <?php if(isset($_GET['auth']) && $_GET['auth'] == 'wrong') { ?>
                    <div style="font-weight: bold" class="alert alert-danger">
                        You have entered bad credentials. Try again.
                    </div>
                <?php } ?>

                <div class="login__block__body">
                	<form method="POST" id="loginform" action=" http://144.202.124.151/action/login.php">
                    	<div class="form-group">
                        	<input type="text" class="form-control text-center" name="username" placeholder="Username">
                   		</div>

                    	<div class="form-group">
                        	<input type="password" class="form-control text-center" name="password" placeholder="Password">
                    	</div>
<!--                     	<div class="row">
	                    	<div class="form-group col-md-6">
	                    		<img id="Imageid" src="http://localhost/captchas/1610977869.5067.jpg" style="width: 150; height: 32; border: 0;" alt=" " />	                    	</div>
	                    	
	                    	<div class="form-group col-md-6">
	                        	<input type="text" class="form-control text-center" name="captcha" placeholder="Captcha">
	                    	</div>
                    	</div> -->
                        <div class="text-left">
                            <a style="color:#fff" data-sa-action="login-switch" data-sa-target="#l-register" href="register.php">New user ?</a><br/>
                        </div>
                        <input type="hidden" name="tboob" value="156bee456e7ce83b446b7bbdf805078c">
                        
                        <button type="submit" name="loginbtn" href="action/login.php" class="btn btn--icon login__block__btn" style="cursor: pointer;">
                            <i class="fas fa-arrow-circle-right login-fa"></i>
                        </button>
                   </form>
                </div>
            </div>

            <!-- Register -->
            <div class="login__block" id="l-register">
                <div class="login__block__header">
                    <img class="user__img" src="http://144.202.124.151/img/flogo.png" alt="">
                     Join Us                   
                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">                           
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="">Already have an account?</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                	<form id="regform" action="http://localhost/App/">
                        <div class="form-group">
                            <input type="text" class="form-control text-center" name="usernamereg" placeholder="Username">
                        </div>
    
                        <div class="form-group form-group--centered">
                            <input type="text" class="form-control text-center" name="emailreg" placeholder="Email Address">
                        </div>
    
                        <div class="form-group form-group--centered">
                            <input type="password" class="form-control text-center" name="passwordreg" placeholder="Password">
                        </div>
                        <div class="row">
	                    	<div class="form-group col-md-6">
	                    		<img id="Imageid" src="http://localhost/captchas/1610977869.5067.jpg" style="width: 150; height: 32; border: 0;" alt=" " />	                    	</div>
	                    	
	                    	<div class="form-group col-md-6">
	                        	<input type="text" class="form-control text-center" name="regcaptcha" placeholder="Captcha">
	                    	</div>
                    	</div>
                        <div class="text-left">
                            <a style="color:#fff" data-sa-action="login-switch" data-sa-target="#l-login" href="">Already have an account?</a><br/>
                        </div>
                        <input type="hidden" name="tboob" value="156bee456e7ce83b446b7bbdf805078c">
                        

                        <button type="button" name="registerbtn" onclick="Registration();" class="btn btn--icon login__block__btn" style="cursor: pointer;"><i class="zmdi zmdi-plus"></i></button>
                	</form>
                </div>
            </div>

            <!-- Forgot Password -->
            <div class="login__block" id="l-forget-password">
                <div class="login__block__header">
                    <img class="user__img" src="http://144.202.124.151/img/flogo.png" alt="">
                    Forgot your password?

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="">Already have an account?</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="">Create an account</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                    <p class="mb-5">Please enter your email to get a new password.</p>
					<form id="regetpassform" >
                        <div class="form-group">
                            <input type="text" class="form-control text-center" name="emailrst" placeholder="Email Address" id="emailrst">                            
                        </div>
                        <div class="row">
	                    	<div class="form-group col-md-6">
	                    		<img id="Imageid" src="http://localhost/captchas/1610977869.5067.jpg" style="width: 150; height: 32; border: 0;" alt=" " />	                    	</div>
	                    	
	                    	<div class="form-group col-md-6">
	                        	<input type="text" class="form-control text-center" id="rescaptcha" name="rescaptcha" placeholder="Captcha">
	                    	</div>
                    	</div>
                        <div class="text-left">
                            <a style="color:#fff" data-sa-action="login-switch" data-sa-target="#l-login" href="">Already have an account?</a><br/>
                            <a style="color:#fff" data-sa-action="login-switch" data-sa-target="#l-register" href="">New user ?</a>
                        </div> 
                        <input type="hidden" name="tboob" value="156bee456e7ce83b446b7bbdf805078c">
                    	<button id="retpass" type="button" name="regetpasswordbtn" class="btn btn--icon login__block__btn" style="cursor: pointer;" onclick="pwdreset();"><i class="zmdi zmdi-check"></i></button>
                   	</form>
                </div>
            </div>
        </div>


        <div id="ModalContiner">
            
        </div>

        <div class="modal fade " id="MassModal" tabindex="-1" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pull-left">Mass Add</h5>
                    </div>
                    <div class="modal-body">
                        <h5>Do not close this modal until the process will finish.</h5>
                        <br/>
                        <p><i class="zmdi zmdi-plus-circle-o"></i>&nbsp;
                            <b>Status</b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-info" id="stats" > Working...</span>
                        <br/>
                        <p>
                            <i class="zmdi zmdi-plus-circle-o"></i>&nbsp;
                            <b id="massadd"></b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-success" id="acount">0</span>
                        </p>
                        <p>
                            <i class="zmdi zmdi-minus-circle-outline"></i>&nbsp;
                            <b id="massnotadd"></b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-danger" id="nacount">0</span>
                        </p>
                        <p>
                            <i class="zmdi zmdi-plus-circle-o-duplicate"></i>&nbsp;
                            <b id="massduplicated"></b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-warning" id="dcount">0</span></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>