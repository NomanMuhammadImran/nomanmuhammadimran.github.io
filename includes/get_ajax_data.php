<?php
session_start();
include ('config.php');
$json = array();
 date_default_timezone_set("Asia/Dubai"); 

if (isset($_GET['brand_id']))
{
    echo ' <option value="">Select Pattern</option>';
    if (isset($_GET['pattern_id'])){
        $pattern_id = $_GET['pattern_id'];

    }
    else{
        $pattern_id = 0 ;
    }

    $brand_id = $_GET['brand_id'];
    $select_pattern = mysqli_query($conn,"SELECT * FROM `tbl_pattern` WHERE `brand_id` = '$brand_id'") ;
    $selected = "";
    while ($row = mysqli_fetch_assoc($select_pattern)){
        if ($row['id'] == $pattern_id){ $selected =  "selected";  }
            echo ' <option value="'.$row['id'].'"  '.$selected.'>'.$row['title'].'</option>' ;
        $selected = "";
    }

}


else if (isset($_GET['category_id'])){
    echo ' <option value="">Select Brand</option>';
    $category_id = $_GET['category_id'];
    $select_brand = mysqli_query($conn,"SELECT * FROM `tbl_part_access_brand` WHERE `status` = 1 AND category_id='$category_id'");
    while ($row = mysqli_fetch_assoc($select_brand)){
        echo ' <option value="'.$row['id'].'">'.$row['name'].'</option>' ;
    }
}

else if (isset($_GET['brand_idd'])){
    $selected = "";
    echo ' <option value="">Select Brand</option>';
    $category_id = $_GET['category_idd'];
    $brand_id = $_GET['brand_idd'];
    $select_brand = mysqli_query($conn,"SELECT * FROM `tbl_part_access_brand` WHERE `status` = 1");
    while ($row = mysqli_fetch_assoc($select_brand)){
        if ($row['id'] == $brand_id ) $selected = 'selected'; else $selected = '';
        echo ' <option value="'.$row['id'].'" '.$selected.'>'.$row['name'].'</option>' ;
    }
}
else if (isset($_GET['user_name'])){
    $user_name = $_GET['user_name'];
     $select_user_name = mysqli_query($conn , "SELECT * FROM `tbl_customer` WHERE `username` =  '$user_name'") ;
    if (mysqli_num_rows($select_user_name) == 0){
                       echo "1";
		 
    }
    else if (mysqli_num_rows($select_user_name) > 0) {
            echo "0" ;
    }

}


else if (isset($_GET['forgot_password']) ){
    $forgot_password = $_GET['forgot_password'];
    $recover_customer_data = mysqli_query($conn , "SELECT * FROM `tbl_customer` WHERE `email` =  '".$forgot_password."'  AND status = 1 LIMIT 1") ;
	//
    if (mysqli_num_rows($recover_customer_data) == 1){
		// echo $forgot_password;
		while ($rowR = mysqli_fetch_assoc($recover_customer_data)){
       						  //////////////////////////////////////////////////
							//	include ("phpMailer/class.phpmailer.php");
							 	
								$strHeading = "Amin Tyre Care Password Recovery";
								$subject = "Amin Tyre Care Password Recovery";
								
								$message = "<!DOCTYPE html>
<html>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5X8ZBKM');</script>
<!-- End Google Tag Manager -->
	<meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
	<meta content='width=device-width, initial-scale=1.0' name='viewport'>
	<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
	<meta content='telephone=no' name='format-detection'>
	<style type='text/css'>
	        
	           html { background-color:#E1E1E1; margin:0; padding:0; }
	           body, #bodyTable, #bodyCell, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;font-family:Helvetica, Arial, 'Lucida Grande', sans-serif;}
	           table{border-collapse:collapse;}
	           table[id=bodyTable] {width:100%!important;margin:auto;max-width:500px!important;color:#7A7A7A;font-weight:normal;}
	           img, a img{border:0; outline:none; text-decoration:none;height:auto; line-height:100%;}
	           a {text-decoration:none !important;border-bottom: 1px solid;}
	           h1, h2, h3, h4, h5, h6{color:#5F5F5F; font-weight:normal; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left; letter-spacing:normal;margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}

	        
	           .ReadMsgBody{width:100%;} .ExternalClass{width:100%;}  
	           .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;}  
	           table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} 
	           #outlook a{padding:0;}  
	           img{-ms-interpolation-mode: bicubic;display:block;outline:none; text-decoration:none;}  
	           body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; font-weight:normal!important;}  
	           .ExternalClass td[class='ecxflexibleContainerBox'] h3 {padding-top: 10px !important;}  

	           h1{display:block;font-size:26px;font-style:normal;font-weight:normal;line-height:100%;}
	           h2{display:block;font-size:20px;font-style:normal;font-weight:normal;line-height:120%;}
	           h3{display:block;font-size:17px;font-style:normal;font-weight:normal;line-height:110%;}
	           h4{display:block;font-size:18px;font-style:italic;font-weight:normal;line-height:100%;}
	           .flexibleImage{height:auto;}
	           .linkRemoveBorder{border-bottom:0 !important;}
	           table[class=flexibleContainerCellDivider] {padding-bottom:0 !important;padding-top:0 !important;}

	           body, #bodyTable{background-color:#E1E1E1;}
	           #emailHeader{background-color:#E1E1E1;}
	           #emailBody{background-color:#FFFFFF;}
	           #emailFooter{background-color:#E1E1E1;}
	           .nestedContainer{background-color:#F8F8F8; border:1px solid #CCCCCC;}
	           .emailButton{background-color:#205478; border-collapse:separate;}
	           .buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px; font-weight:bold; line-height:100%; padding:15px; text-align:center;}
	           .buttonContent a{color:#FFFFFF; display:block; text-decoration:none!important; border:0!important;}
	           .emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
	           .emailCalendarMonth{background-color:#205478; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
	           .emailCalendarDay{color:#205478; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}
	           .imageContentText {margin-top: 10px;line-height:0;}
	           .imageContentText a {line-height:0;}
	           #invisibleIntroduction {display:none !important;}  

	        
	           span[class=ios-color-hack] a {color:#275100!important;text-decoration:none!important;} 
	           span[class=ios-color-hack2] a {color:#205478!important;text-decoration:none!important;}
	           span[class=ios-color-hack3] a {color:#8B8B8B!important;text-decoration:none!important;}
	        
	           .a[href^='tel'], a[href^='sms'] {text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important;}
	           .mobile_link a[href^='tel'], .mobile_link a[href^='sms'] {text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important;}


	           @media only screen and (max-width: 480px){
	                
	               body{width:100% !important; min-width:100% !important;}  

	               table[id='emailHeader'],
	               table[id='emailBody'],
	               table[id='emailFooter'],
	               table[class='flexibleContainer'],
	               td[class='flexibleContainerCell'] {width:100% !important;}
	               td[class='flexibleContainerBox'], td[class='flexibleContainerBox'] table {display: block;width: 100%;text-align: left;}
	            
	               td[class='imageContent'] img {height:auto !important; width:100% !important; max-width:100% !important; }
	               img[class='flexibleImage']{height:auto !important; width:100% !important;max-width:100% !important;}
	               img[class='flexibleImageSmall']{height:auto !important; width:auto !important;}


	                
	               table[class='flexibleContainerBoxNext']{padding-top: 10px !important;}

	                
	               table[class='emailButton']{width:100% !important;}
	               td[class='buttonContent']{padding:0 !important;}
	               td[class='buttonContent'] a{padding:15px !important;}

	           }

	            

	           @media only screen and (-webkit-device-pixel-ratio:.75){
	        
	           }

	           @media only screen and (-webkit-device-pixel-ratio:1){

	           }

	           @media only screen and (-webkit-device-pixel-ratio:1.5){
	                
	           } 
	           @media only screen and (min-device-width : 320px) and (max-device-width:568px) {

	           }

	</style>
	<title></title>
</head>
<body bgcolor='#E1E1E1'>
	<center style='background-color:#E1E1E1;'>
		<table border='0' cellpadding='0' cellspacing='0' id='bodyTable' style='table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;' width='100%'>
			<tr>
				<td align='center' id='bodyCell' valign='top'>
					<table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' id='emailBody' width='500'>
						<tr>
							<td align='center' valign='top'>
								<table bgcolor='#414141' border='0' cellpadding='0' cellspacing='0' style='color:#FFFFFF;' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' width='100%'>
															<tr>
																<td align='center' class='textContent' valign='top'>
																	<h1 style='color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;'><img alt='' src='http://www.amintyrecare.com/assets/images/cs-logo_white.png'></h1>
																	<h2 style='text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:23px;margin-bottom:10px;color:#FFFFFF;line-height:135%;'>Password Recovery Details<br>
																	".$rowR['first_name']."&nbsp;".$rowR['last_name']."</h2>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td class='flexibleContainerCell' valign='top' width='500'>
														<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%'>
															<tr>
																<td align='left' class='flexibleContainerBox' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' style='max-width: 100%;' width='210'>
																		<tr>
																			<td align='left' class='textContent'>
																				<h3 style='color:#414141;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;'>Email </h3>
																				<div style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;'>
																					".$rowR['email']."
																				</div>
																			</td>
																		</tr>
																	</table>
																</td>
																<td align='right' class='flexibleContainerBox' valign='middle'>
																	<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainerBoxNext' style='max-width: 100%;' width='210'>
																		<tr>
																			<td align='left' class='textContent'>
																				<h3 style='color:#414141;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;'>Password</h3>
																				<div style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;'>
																					".encrypt_decrypt("d",$rowR['password'])."
																				</div>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr style='padding-top:0;'>
										<td align='center' valign='top'>
											<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' style='padding-top:0;' valign='top' width='500'>
														<table border='0' cellpadding='0' cellspacing='0' class='emailButton' style='background-color: #414141;' width='50%'>
															<tr>
																<td align='center' class='buttonContent' style='padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;' valign='middle'><a href='http://www.amintyrecare.com' style='color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%;' target='_blank'>Login</a></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainerCellDivider' width='100%'>
															<tr>
																<td align='center' style='padding-top:0px;padding-bottom:0px;' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
																		<tr>
																			<td align='center' style='border-top:1px solid #C8C8C8;' valign='top'></td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainerCellDivider' width='100%'>
															<tr>
																<td align='center' style='padding-top:0px;padding-bottom:0px;' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
																		<tr>
																			<td align='center' style='border-top:1px solid #C8C8C8;' valign='top'></td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainerCellDivider' width='100%'>
															<tr>
																<td align='center' style='padding-top:0px;padding-bottom:0px;' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
																		<tr>
																			<td align='center' style='border-top:1px solid #C8C8C8;' valign='top'></td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'></td>
									</tr>
								</table>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainerCellDivider' width='100%'>
															<tr>
																<td align='center' style='padding-top:0px;padding-bottom:0px;' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
																		<tr>
																			<td align='center' style='border-top:1px solid #C8C8C8;' valign='top'></td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
					 
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainerCellDivider' width='100%'>
															<tr>
																<td align='center' style='padding-top:0px;padding-bottom:0px;' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
																		<tr>
																			<td align='center' style='border-top:1px solid #C8C8C8;' valign='top'></td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table bgcolor='#E1E1E1' border='0' cellpadding='0' cellspacing='0' id='emailFooter' width='500'>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' width='100%'>
															<tr>
																<td bgcolor='#E1E1E1' valign='top'>
																	<div style='font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;'>
																		<div>
																			Copyright &#169;  ".date('Y')." AMIN TYRE CARE. ALL RIGHTS RESERVED.
																		</div>
																		<div>
																			FUELED BY <a href='http://www.digitalgraphiks.net' target='_blank'>DIGITAL GRAPHIKS</a>
																		</div>
																	</div>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>";
								
								 $recipients = array($rowR['email']);
								
								 $names = array($rowR['first_name']);
								
								 
								
								sendmail1($recipients,$subject,$message,$names);
								////////////////////////////////////////////////// 
    	}
        echo "1";
    }
    else {
        echo "0";
    }
}




///////////////////////////////////////////////
else if (isset($_GET['txt_signup_email']) ){
    $txt_signup_email = $_GET['txt_signup_email'];
    
    $select_customer_signup_email = mysqli_query($conn , "SELECT * FROM `tbl_emails` WHERE `email` =  '".$txt_signup_email."'") ;
	
    if (mysqli_num_rows($select_customer_signup_email) == 1){
		 
        echo "0";
    }
    else {
	 	$insert_signup_sql = "INSERT INTO `tbl_emails`( `email`)
								 VALUES 
								 ('$txt_signup_email')" ;
		if (mysqli_query($conn,$insert_signup_sql)){						 
        echo "1" ;
		}else{ echo "0";}
    }
}
////////////////////////////////////////////////////


else if (isset($_GET['user_name_login']) ){
    $user_name_login = $_GET['user_name_login'];
    $password_login = $_GET['password_login'];
    $select_customer_data = mysqli_query($conn , "SELECT * FROM `tbl_customer` WHERE `email` =  '".$user_name_login."' AND password = '".encrypt_decrypt("e",$password_login)."' AND status = 1") ;
	
    if (mysqli_num_rows($select_customer_data) == 1){
		$_SESSION['customer_login'] = $user_name_login;
		while ($row1 = mysqli_fetch_assoc($select_customer_data)){
        $_SESSION['customer_id'] = $row1['id'];
    	}
        echo "1";
    }
    else {
        echo "0" ;
    }
}
else if (isset($_GET['create_account_email'])){
	
	$pass = generateRandomString();
	$insert_password = encrypt_decrypt("e",$pass);
	
    $create_account_username = $_GET['create_account_email'];
    $select_user_name = mysqli_query($conn,"SELECT * FROM `tbl_customer` WHERE `email` = '$create_account_username'") ;
    if (mysqli_num_rows($select_user_name) == 0){
		$create_account_fname = $_GET['create_account_fname'];
		$create_account_lname = $_GET['create_account_lname'];
		$create_account_phone = $_GET['create_account_phone'];
		$create_account_address = $_GET['create_account_address'];
		$create_account_password = $insert_password;
 
        $create_account_email = $_GET['create_account_email'];
        
        $insert_sql = "INSERT INTO `tbl_customer`( `first_name`,`last_name`,`phone`,`address`,`email`,`password`, `status`)
		 VALUES 
		 ('$create_account_fname','$create_account_lname','$create_account_phone','$create_account_address','$create_account_email','$create_account_password', '1')" ;
		
        if (mysqli_query($conn,$insert_sql)){
		
		
		 
		$new_data = mysqli_query($conn , "SELECT * FROM `tbl_customer` WHERE `email` =  '".$create_account_email."'  AND status = 1 LIMIT 1") ;
	
    	if (mysqli_num_rows($new_data) == 1){
		 
		while ($rowN = mysqli_fetch_assoc($new_data)){
		
		
		
		
		  //////////////////////////////////////////////////
							//	include ("phpMailer/class.phpmailer.php");
							 	
								$strHeading = "Amin Tyre Care Registration";
								$subject = "Amin Tyre Care Registration";
								
								$message = "<!DOCTYPE html>
<html>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5X8ZBKM');</script>
<!-- End Google Tag Manager -->
	<meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
	<meta content='width=device-width, initial-scale=1.0' name='viewport'>
	<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
	<meta content='telephone=no' name='format-detection'>
	<style type='text/css'>
	        
	           html { background-color:#E1E1E1; margin:0; padding:0; }
	           body, #bodyTable, #bodyCell, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;font-family:Helvetica, Arial, 'Lucida Grande', sans-serif;}
	           table{border-collapse:collapse;}
	           table[id=bodyTable] {width:100%!important;margin:auto;max-width:500px!important;color:#7A7A7A;font-weight:normal;}
	           img, a img{border:0; outline:none; text-decoration:none;height:auto; line-height:100%;}
	           a {text-decoration:none !important;border-bottom: 1px solid;}
	           h1, h2, h3, h4, h5, h6{color:#5F5F5F; font-weight:normal; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left; letter-spacing:normal;margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}

	        
	           .ReadMsgBody{width:100%;} .ExternalClass{width:100%;}  
	           .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;}  
	           table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} 
	           #outlook a{padding:0;}  
	           img{-ms-interpolation-mode: bicubic;display:block;outline:none; text-decoration:none;}  
	           body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; font-weight:normal!important;}  
	           .ExternalClass td[class='ecxflexibleContainerBox'] h3 {padding-top: 10px !important;}  

	           h1{display:block;font-size:26px;font-style:normal;font-weight:normal;line-height:100%;}
	           h2{display:block;font-size:20px;font-style:normal;font-weight:normal;line-height:120%;}
	           h3{display:block;font-size:17px;font-style:normal;font-weight:normal;line-height:110%;}
	           h4{display:block;font-size:18px;font-style:italic;font-weight:normal;line-height:100%;}
	           .flexibleImage{height:auto;}
	           .linkRemoveBorder{border-bottom:0 !important;}
	           table[class=flexibleContainerCellDivider] {padding-bottom:0 !important;padding-top:0 !important;}

	           body, #bodyTable{background-color:#E1E1E1;}
	           #emailHeader{background-color:#E1E1E1;}
	           #emailBody{background-color:#FFFFFF;}
	           #emailFooter{background-color:#E1E1E1;}
	           .nestedContainer{background-color:#F8F8F8; border:1px solid #CCCCCC;}
	           .emailButton{background-color:#205478; border-collapse:separate;}
	           .buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px; font-weight:bold; line-height:100%; padding:15px; text-align:center;}
	           .buttonContent a{color:#FFFFFF; display:block; text-decoration:none!important; border:0!important;}
	           .emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
	           .emailCalendarMonth{background-color:#205478; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
	           .emailCalendarDay{color:#205478; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}
	           .imageContentText {margin-top: 10px;line-height:0;}
	           .imageContentText a {line-height:0;}
	           #invisibleIntroduction {display:none !important;}  

	        
	           span[class=ios-color-hack] a {color:#275100!important;text-decoration:none!important;} 
	           span[class=ios-color-hack2] a {color:#205478!important;text-decoration:none!important;}
	           span[class=ios-color-hack3] a {color:#8B8B8B!important;text-decoration:none!important;}
	        
	           .a[href^='tel'], a[href^='sms'] {text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important;}
	           .mobile_link a[href^='tel'], .mobile_link a[href^='sms'] {text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important;}


	           @media only screen and (max-width: 480px){
	                
	               body{width:100% !important; min-width:100% !important;}  

	               table[id='emailHeader'],
	               table[id='emailBody'],
	               table[id='emailFooter'],
	               table[class='flexibleContainer'],
	               td[class='flexibleContainerCell'] {width:100% !important;}
	               td[class='flexibleContainerBox'], td[class='flexibleContainerBox'] table {display: block;width: 100%;text-align: left;}
	            
	               td[class='imageContent'] img {height:auto !important; width:100% !important; max-width:100% !important; }
	               img[class='flexibleImage']{height:auto !important; width:100% !important;max-width:100% !important;}
	               img[class='flexibleImageSmall']{height:auto !important; width:auto !important;}


	                
	               table[class='flexibleContainerBoxNext']{padding-top: 10px !important;}

	                
	               table[class='emailButton']{width:100% !important;}
	               td[class='buttonContent']{padding:0 !important;}
	               td[class='buttonContent'] a{padding:15px !important;}

	           }

	            

	           @media only screen and (-webkit-device-pixel-ratio:.75){
	        
	           }

	           @media only screen and (-webkit-device-pixel-ratio:1){

	           }

	           @media only screen and (-webkit-device-pixel-ratio:1.5){
	                
	           } 
	           @media only screen and (min-device-width : 320px) and (max-device-width:568px) {

	           }

	</style>
	<title></title>
</head>
<body bgcolor='#E1E1E1'>
	<center style='background-color:#E1E1E1;'>
		<table border='0' cellpadding='0' cellspacing='0' id='bodyTable' style='table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;' width='100%'>
			<tr>
				<td align='center' id='bodyCell' valign='top'>
					<table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' id='emailBody' width='500'>
						<tr>
							<td align='center' valign='top'>
								<table bgcolor='#414141' border='0' cellpadding='0' cellspacing='0' style='color:#FFFFFF;' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' width='100%'>
															<tr>
																<td align='center' class='textContent' valign='top'>
																	<h1 style='color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;'><img alt='' src='http://www.amintyrecare.com/assets/images/cs-logo_white.png'></h1>
																	<h2 style='text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:23px;margin-bottom:10px;color:#FFFFFF;line-height:135%;'>Registration Details<br>
																	".$rowN['first_name']."&nbsp;".$rowN['last_name']."</h2>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td class='flexibleContainerCell' valign='top' width='500'>
														<table align='left' border='0' cellpadding='0' cellspacing='0' width='100%'>
															<tr>
																<td align='left' class='flexibleContainerBox' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' style='max-width: 100%;' width='210'>
																		<tr>
																			<td align='left' class='textContent'>
																				<h3 style='color:#414141;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;'>Email </h3>
																				<div style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;'>
																					".$rowN['email']."
																				</div>
																			</td>
																		</tr>
																	</table>
																</td>
																<td align='right' class='flexibleContainerBox' valign='middle'>
																	<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainerBoxNext' style='max-width: 100%;' width='210'>
																		<tr>
																			<td align='left' class='textContent'>
																				<h3 style='color:#414141;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;'>Password</h3>
																				<div style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;'>
																					".$pass."
																				</div>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr style='padding-top:0;'>
										<td align='center' valign='top'>
											<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' style='padding-top:0;' valign='top' width='500'>
														<table border='0' cellpadding='0' cellspacing='0' class='emailButton' style='background-color: #414141;' width='50%'>
															<tr>
																<td align='center' class='buttonContent' style='padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;' valign='middle'><a href='http://www.amintyrecare.com' style='color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%;' target='_blank'>Login</a></td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainerCellDivider' width='100%'>
															<tr>
																<td align='center' style='padding-top:0px;padding-bottom:0px;' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
																		<tr>
																			<td align='center' style='border-top:1px solid #C8C8C8;' valign='top'></td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainerCellDivider' width='100%'>
															<tr>
																<td align='center' style='padding-top:0px;padding-bottom:0px;' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
																		<tr>
																			<td align='center' style='border-top:1px solid #C8C8C8;' valign='top'></td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'></td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainerCellDivider' width='100%'>
															<tr>
																<td align='center' style='padding-top:0px;padding-bottom:0px;' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
																		<tr>
																			<td align='center' style='border-top:1px solid #C8C8C8;' valign='top'></td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'></td>
									</tr>
								</table>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainerCellDivider' width='100%'>
															<tr>
																<td align='center' style='padding-top:0px;padding-bottom:0px;' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
																		<tr>
																			<td align='center' style='border-top:1px solid #C8C8C8;' valign='top'></td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
					 
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' class='flexibleContainerCellDivider' width='100%'>
															<tr>
																<td align='center' style='padding-top:0px;padding-bottom:0px;' valign='top'>
																	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
																		<tr>
																			<td align='center' style='border-top:1px solid #C8C8C8;' valign='top'></td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table bgcolor='#E1E1E1' border='0' cellpadding='0' cellspacing='0' id='emailFooter' width='500'>
						<tr>
							<td align='center' valign='top'>
								<table border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
										<td align='center' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0' class='flexibleContainer' width='500'>
												<tr>
													<td align='center' class='flexibleContainerCell' valign='top' width='500'>
														<table border='0' cellpadding='30' cellspacing='0' width='100%'>
															<tr>
																<td bgcolor='#E1E1E1' valign='top'>
																	<div style='font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;'>
																		<div>
																			Copyright &#169;  ".date('Y')." AMIN TYRE CARE. ALL RIGHTS RESERVED.
																		</div>
																		<div>
																			FUELED BY <a href='http://www.digitalgraphiks.net' target='_blank'>DIGITAL GRAPHIKS</a>
																		</div>
																	</div>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>";
								
								 $recipients = array($rowN['email']);
								
								 $names = array($rowN['first_name']);
								
								 
								
								sendmail1($recipients,$subject,$message,$names);
								////////////////////////////////////////////////// 
			}
		} 
		
		
		
		echo "1";
        }
        else {
            echo "0";
        }
    }
    else{
        echo "101";
    }

}





?>