<html lang="en"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Primary Meta Tags -->
        <meta name="title" content="Shop tools with cheap prices">
        <meta name="description" content="[Accounts], [CC's], [Banks], [Sells], [WHM/Cpanels], [Pages], [Letters], [Leads], [SMTPS], [PHPMailers], [RDP'/VPS], [Script/Bots], [Methodes], [Documents]">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://localhost/login">
        <meta property="og:title" content="Shop tools with cheap prices">
        <meta property="og:description" content="[Accounts], [CC's], [Banks], [Sells], [WHM/Cpanels], [Pages], [Letters], [Leads], [SMTPS], [PHPMailers], [RDP'/VPS], [Script/Bots], [Methodes], [Documents]">
        
        <?php
            include "../components/styles.php";
        ?>

       <title>[Login/Register]</title> 
    <style>
         .dt-center {
            text-align: center !Important;
         }
    </style><style type="text/css"> 
</style><style type="text/css">@keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-moz-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-webkit-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}#EKJW6d4-1611134212679{outline:none!important;visibility:visible!important;resize:none!important;box-shadow:none!important;overflow:visible!important;background:none!important;opacity:1!important;filter:alpha(opacity=100)!important;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity1)!important;-moz-opacity:1!important;-khtml-opacity:1!important;top:auto!important;right:10px!important;bottom:90px!important;left:auto!important;position:fixed!important;border:0!important;min-height:0!important;min-width:0!important;max-height:none!important;max-width:none!important;padding:0!important;margin:0!important;-moz-transition-property:none!important;-webkit-transition-property:none!important;-o-transition-property:none!important;transition-property:none!important;transform:none!important;-webkit-transform:none!important;-ms-transform:none!important;width:auto!important;height:auto!important;display:none!important;z-index:2000000000!important;background-color:transparent!important;cursor:auto!important;float:none!important;border-radius:unset!important;pointer-events:auto!important}#FjLl5Sy-1611134212681.open{animation : tawkMaxOpen .25s ease!important;}</style></head>
    
    <body data-sa-theme="4">    
        <div class="login">

            <!-- Login -->
            <div class="login__block" id="l-login">
                <div class="login__block__header">
                    <img class="user__img" src="http://144.202.124.151/img/flogo.png" alt="">
                    Hi, Please Sign in

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="">Create an account</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                	<form id="loginform" action="http://localhost/App/">
                    	<div class="form-group">
                        	<input type="text" class="form-control text-center" name="username" placeholder="Username">
                   		</div>

                    	<div class="form-group">
                        	<input type="password" class="form-control text-center" name="password" placeholder="Password">
                    	</div>
                    	<div class="row">
	                    	<div class="form-group col-md-6">
	                    		<img id="Imageid" src="http://localhost/captchas/1611134202.3749.jpg" style="width: 150; height: 32; border: 0;" alt=" ">	                    	</div>
	                    	
	                    	<div class="form-group col-md-6">
	                        	<input type="text" class="form-control text-center" name="captcha" placeholder="Captcha">
	                    	</div>
                    	</div>
                        <div class="text-left">
                            <a style="color:#fff" data-sa-action="login-switch" data-sa-target="#l-register" href="">New user ?</a><br>
                        </div>
                        <input type="hidden" name="tboob" value="5adf72db155739e9883c8beb84e960a6">
                        
                    	<button type="button" name="loginbtn" class="btn btn--icon login__block__btn" onclick="validateLogin();" style="cursor: pointer;"><i class="zmdi zmdi-long-arrow-right"></i></button>
                   </form>
                </div>
            </div>

            <!-- Register -->
            <div class="login__block active" id="l-register">
                <div class="login__block__header">
                    <img class="user__img" src="http://144.202.124.151/img/flogo.png" alt="">
                     Join Us                   
                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">                           
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="login.php">Already have an account?</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(isset($_GET['error']) && $_GET['error'] == "length") {?> 

                <div class="alert alert-danger">
                    Votre mot de passe doit faire au moins 5 caractères.
                </div>
                
                <?php } ?>

                <?php if(isset($_GET['error']) && $_GET['error'] == "lengthusername") {?> 

                <div class="alert alert-danger">
                    Veuillez entrer un username correct s'il vous plait.
                </div>

                <?php } ?>

                <?php if(isset($_GET['error']) && $_GET['error'] == "taken") {?> 

                <div class="alert alert-danger">
                    Ce nom d'utilisateur est déjà utilisé. Merci d'en choisir un autre.
                </div>

                <?php } ?>

                <div class="login__block__body">
                	<form method="POST" id="regform" action=" http://144.202.124.151/action/register.php">


                        <div class="form-group">
                            <input type="text" class="form-control text-center" name="username" placeholder="Username">
                        </div>
    
                        <div class="form-group form-group--centered">
                            <input type="text" class="form-control text-center" name="email" placeholder="Email Address">
                        </div>
    
                        <div class="form-group form-group--centered">
                            <input type="password" class="form-control text-center" name="password" placeholder="Password">
                        </div>
<!--                         <div class="row">
	                    	<div class="form-group col-md-6">
	                    		<img id="Imageid" src="http://localhost/captchas/1611134202.3749.jpg" style="width: 150; height: 32; border: 0;" alt=" ">	                    	</div>
	                    	
	                    	<div class="form-group col-md-6">
	                        	<input type="text" class="form-control text-center" name="regcaptcha" placeholder="Captcha">
	                    	</div>
                    	</div>
 -->                        <div class="text-left">
                            <a style="color:#fff" data-sa-action="login-switch" data-sa-target="#l-login" href="login.php">Already have an account?</a><br>
                        </div>
                        <input type="hidden" name="tboob" value="5adf72db155739e9883c8beb84e960a6">
                        

                        <button type="submit" name="registerbtn" class="btn btn--icon login__block__btn" style="cursor: pointer;"><i class="fas fa-plus"></i></button>
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
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="login.php">Already have an account?</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="">Create an account</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                    <p class="mb-5">Please enter your email to get a new password.</p>
					<form id="regetpassform">
                        <div class="form-group">
                            <input type="text" class="form-control text-center" name="emailrst" placeholder="Email Address" id="emailrst">                            
                        </div>
                        <div class="row">
	                    	<div class="form-group col-md-6">
	                    		<img id="Imageid" src="http://localhost/captchas/1611134202.3749.jpg" style="width: 150; height: 32; border: 0;" alt=" ">	                    	</div>
	                    	
	                    	<div class="form-group col-md-6">
	                        	<input type="text" class="form-control text-center" id="rescaptcha" name="rescaptcha" placeholder="Captcha">
	                    	</div>
                    	</div>
                        <div class="text-left">
                            <a style="color:#fff" data-sa-action="login-switch" data-sa-target="#l-login" href="login.php">Already have an account?</a><br>
                            <a style="color:#fff" data-sa-action="login-switch" data-sa-target="#l-register" href="">New user ?</a>
                        </div> 
                        <input type="hidden" name="tboob" value="5adf72db155739e9883c8beb84e960a6">
                    	<button id="retpass" type="button" name="regetpasswordbtn" class="btn btn--icon login__block__btn" style="cursor: pointer;" onclick="pwdreset();"><i class="fas fa-plus"></i></button>
                   	</form>
                </div>
            </div>
        </div>


        <div id="ModalContiner">
            
        </div>

        <div class="modal fade " id="MassModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pull-left">Mass Add</h5>
                    </div>
                    <div class="modal-body">
                        <h5>Do not close this modal until the process will finish.</h5>
                        <br>
                        <p><i class="zmdi zmdi-plus-circle-o"></i>&nbsp;
                            <b>Status</b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-info" id="stats"> Working...</span>
                        <br>
                        </p><p>
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
        
        <!-- Older IE warning message -->
            <!--[if IE]>
                <div class="ie-warning">
                    <h1>Warning!!</h1>
                    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

                    <div class="ie-warning__downloads">
                        <a href="http://www.google.com/chrome">
                            <img src="http://localhost/_template/img/browsers/chrome.png" alt="">
                        </a>

                        <a href="https://www.mozilla.org/en-US/firefox/new">
                            <img src="http://localhost/_template/img/browsers/firefox.png" alt="">
                        </a>

                        <a href="http://www.opera.com">
                            <img src="http://localhost/_template/img/browsers/opera.png" alt="">
                        </a>

                        <a href="https://support.apple.com/downloads/safari">
                            <img src="http://localhost/_template/img/browsers/safari.png" alt="">
                        </a>

                        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                            <img src="http://localhost/_template/img/browsers/edge.png" alt="">
                        </a>

                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="http://localhost/_template/img/browsers/ie.png" alt="">
                        </a>
                    </div>
                    <p>Sorry for the inconvenience!</p>
                </div>
            <![endif]-->
    
<div id="EKJW6d4-1611134212679" class="" style="display: block !important;"><iframe id="FjLl5Sy-1611134212681" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: auto !important; left: auto !important; position: static !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 350px !important; z-index: 999999 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; display: none !important; height: 120px !important;"></iframe><iframe id="Co5ixhY-1611134212682" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; z-index: 1000001 !important; cursor: auto !important; float: none !important; pointer-events: auto !important; box-shadow: rgba(0, 0, 0, 0.16) 0px 2px 10px 0px !important; height: 60px !important; min-height: 60px !important; max-height: 60px !important; width: 60px !important; min-width: 60px !important; max-width: 60px !important; border-radius: 50% !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center !important; margin: 0px !important; top: auto !important; bottom: 20px !important; right: 20px !important; left: auto !important; display: block !important;"></iframe><iframe id="jzyEg0S-1611134212683" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; display: none !important; z-index: 1000003 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; top: auto !important; bottom: 60px !important; right: 15px !important; left: auto !important; width: 21px !important; max-width: 21px !important; min-width: 21px !important; height: 21px !important; max-height: 21px !important; min-height: 21px !important;"></iframe><iframe id="Yzephb5-1611134212683" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center !important; bottom: 90px !important; top: auto !important; right: 20px !important; left: auto !important; width: 72px !important; max-width: 72px !important; min-width: 72px !important; height: 79px !important; max-height: 79px !important; min-height: 79px !important; z-index: 1000002 !important; margin: 0px !important; display: none !important;"></iframe><div class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 100% !important; display: none !important; z-index: 1000001 !important; cursor: move !important; float: left !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="GYs8oQ0-1611134212679" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: w-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="OjbOrQE-1611134212679" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: n-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="U8pXwTR-1611134212679" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: nw-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><iframe id="uMw1428-1611134212713" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 378px !important; height: 599px !important; display: none !important; z-index: 999999 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; bottom: 100px !important; top: auto !important; right: 20px !important; left: auto !important;"></iframe></div></body></html>