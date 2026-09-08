<?php
include("includes/function.php");
///////////////////////////////////  ===>|.EMAIL START.|<===  ///////////////////////////////////
// define variables and set to empty values
$fullname = $email = $phone = $companyname = $projecttype = $budgetrange = $projecttimeline = $projectdetails ="";

// $service = implode(", ", $_POST["services"]);

// echo $_POST["fullname"] . " <br/> ";
// echo $_POST["email"] . " <br/> ";
// echo $_POST["companyname"] . " <br/> ";
// echo $_POST["projecttype"] . " <br/> ";
// echo $_POST["budgetrange"] . " <br/> ";
// echo $_POST["projecttimeline"] . " <br/> ";
// echo $_POST["message"] . " <br/> ";
// die;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // Required Fields
  $status = "";
  if (empty($_POST["fullname"])) {
    $status = "error";
  } else {
    $fullname = test_input($_POST["fullname"]);
  }

  $status = "";
  if (empty($_POST["companyname"])) {
    $status = "error";
  } else {
    $companyname = test_input($_POST["companyname"]);
  }

  if (empty($_POST["email"])) {
    $status = "error";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["full_phone"])) {
    $status = "error";
  } else {
    $phone = test_input($_POST["full_phone"]);
  }

  $status = "";
  if (empty($_POST["projecttype"])) {
    $status = "error";
  } else {
    $projecttype = test_input($_POST["projecttype"]);
  }

  $status = "";
  if (empty($_POST["budgetrange"])) {
    $status = "error";
  } else {
    $budgetrange = test_input($_POST["budgetrange"]);
  }

  $status = "";
  if (empty($_POST["projecttimeline"])) {
    $status = "error";
  } else {
    $projecttimeline = test_input($_POST["projecttimeline"]);
  }

  $status = "";
  if (empty($_POST["projectdetails"])) {
    $status = "error";
  } else {
    $projectdetails = test_input($_POST["projectdetails"]);
  }

  if (!empty($status)) {
    header("Location: contact-us?error=error", false, 301);
    exit();
  }

  // Non Required Fileds
  // $projectdetails = test_input($_POST["projectdetails"]);

  $fullnametr = "";
  if (!empty($fullname)) {
    $fullnametr = "<tr>
      <td align='left' class='flexibleContainerBox' valign='top'>
        <table border='0' cellpadding='0' cellspacing='0' style='max-width: 100%;'>
          <tr>
            <td align='left' class='textContent'>
              <h4
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#00F5C4;line-height:135%;margin-bottom: 15px;'>
                Full Name: </h4>
              <div
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#fff;line-height:135%;;'>
                " . $fullname . "
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>";
  }

   $emailtr = "";
  if (!empty($email)) {
    $emailtr = "<tr>
      <td align='left' class='flexibleContainerBox' valign='middle'>
        <table border='0' cellpadding='0' cellspacing='0' class='flexibleContainerBoxNext'
          style='max-width: 100%;'>
          <tr>
            <td align='left' class='textContent'>
              <h4
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#00F5C4;line-height:135%;margin-bottom: 15px;'>
                Email:</h4>
              <div
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#fff;line-height:135%;;'>
                " . $email . "
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>";
  }

  $phonetr = "";
  if (!empty($phone)) {
    $phonetr = "<tr>
      <td align='left' class='flexibleContainerBox' valign='top'>
        <table border='0' cellpadding='0' cellspacing='0' style='max-width: 100%;'>
          <tr>
            <td align='left' class='textContent'>
              <h4
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#00F5C4;line-height:135%;margin-bottom: 15px;'>
                Phone Number: </h4>
              <div
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#fff;line-height:135%;;'>
                " . $phone . "
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>";
  }

  $companynametr = "";
  if (!empty($companyname)) {
    $companynametr = "<tr>
      <td align='left' class='flexibleContainerBox' valign='top'>
        <table border='0' cellpadding='0' cellspacing='0' style='max-width: 100%;'>
          <tr>
            <td align='left' class='textContent'>
              <h4
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#00F5C4;line-height:135%;margin-bottom: 15px;'>
                Company Name: </h4>
              <div
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#fff;line-height:135%;;'>
                " . $companyname . "
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>";
  }

  $projecttypetr = "";
  if (!empty($projecttype)) {
    $projecttypetr = "<tr>
      <td align='left' class='flexibleContainerBox' valign='middle'>
        <table border='0' cellpadding='0' cellspacing='0' class='flexibleContainerBoxNext'
          style='max-width: 100%;'>
          <tr>
            <td align='left' class='textContent'>
              <h4
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#00F5C4;line-height:135%;margin-bottom: 15px;'>
                Job Position: </h4>
              <div
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#fff;line-height:135%;;'>
                " . $projecttype . "
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>";
  }

  $budgetrangetr = "";
  if (!empty($budgetrange)) {
    $budgetrangetr = "<tr>
      <td align='left' class='flexibleContainerBox' valign='middle'>
        <table border='0' cellpadding='0' cellspacing='0' class='flexibleContainerBoxNext'
          style='max-width: 100%;'>
          <tr>
            <td align='left' class='textContent'>
              <h4
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#00F5C4;line-height:135%;margin-bottom: 15px;'>
                Employment Type: </h4>
              <div
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#fff;line-height:135%;;'>
                " . $budgetrange . "
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>";
  }


  $projecttimelinetr = "";
  if (!empty($projecttimeline)) {
    $projecttimelinetr = "<tr>
      <td align='left' class='flexibleContainerBox' valign='middle'>
        <table border='0' cellpadding='0' cellspacing='0' class='flexibleContainerBoxNext'
          style='max-width: 100%;'>
          <tr>
            <td align='left' class='textContent'>
              <h4
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#00F5C4;line-height:135%;margin-bottom: 15px;'>
                Work Location: </h4>
              <div
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#fff;line-height:135%;;'>
                " . $projecttimeline . "
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>";
  }

  $projectdetailstr = '';
  if (!empty($projectdetails)) {
    $projectdetailstr = "<tr>
      <td align='left' class='flexibleContainerBox' valign='middle'>
        <table border='0' cellpadding='0' cellspacing='0' class='flexibleContainerBoxNext'
          style='max-width: 100%;'>
          <tr>
            <td align='left' class='textContent'>
              <h4
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#00F5C4;line-height:135%;margin-bottom: 15px;'>
                Job Description: </h4>
              <div
                style='text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#fff;line-height:135%;margin-bottom: 15px;'>
                " . $projectdetails . "
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>";
  }

  $message1 = "<!DOCTYPE html>
<html>

<head>
  <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
  <meta content='width=device-width, initial-scale=1.0' name='viewport'>
  <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
  <meta content='telephone=no' name='format-detection'>
  <style type='text/css'>
    html {
      background-color: #05070a;
      margin: 0;
      padding: 0;
      
    }

    body,
    #bodyTable,
    #bodyCell {
      
      margin: 0;
      padding: 0;
      width: 100% !important;
      font-family: 'Segoe UI', Helvetica, Arial, sans-serif;
    }

    table {
      border-collapse: collapse;
    }

    table[id=bodyTable] {
      width: 100% !important;
      margin: auto;
      max-width: 560px !important;
      color: #9aa5b1;
      font-weight: normal;
    }

    img,
    a img {
      border: 0;
      outline: none;
      text-decoration: none;
      height: auto;
      line-height: 100%;
    }

    a {
      text-decoration: none !important;
      color: #fff !important;
    }

    h1,
    h2,
    h3 {
      color: #f2f5f7;
      font-weight: 600;
      font-family: 'Segoe UI', Helvetica, Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .badge {
      display: inline-block;
      background-color: rgba(0, 245, 196, 0.12);
      border: 1px solid rgba(0, 245, 196, 0.4);
      color: #00F5C4;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      padding: 7px 16px;
      border-radius: 30px;
    }

    .field-table td {
      font-size: 14px;
      line-height: 150%;
      color: #d6dce2;
    }

    .mobile-pad > table {
      padding: 10px 20px;
      display: inline-block;
    }

    .field-table .field-label {
      color: #6b7684;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      padding-bottom: 3px;
    }

    .divider-line {
      border-top: 1px solid #1c222b;
      font-size: 0;
      line-height: 0;
    }

    @media only screen and (max-width: 480px) {
      body {
        width: 100% !important;
        min-width: 100% !important;
      }

      table[id='bodyTable'] {
        width: 100% !important;
      }

      td.mobile-pad {
        padding-left: 20px !important;
        padding-right: 20px !important;
      }
    }
  </style>
</head>

<body bgcolor='#05070a'>
  <center style='background-color:#05070a;'>
    <table border='0' cellpadding='0' cellspacing='0' id='bodyTable' width='100%' style='max-width:560px;'>
      <tr>
        <td align='center' id='bodyCell' valign='top' style='padding:32px 16px;'>

          <!-- Outer card -->
          <table bgcolor='#0d1117' border='0' cellpadding='0' cellspacing='0' width='100%'
            style='max-width:560px; border:1px solid #1c222b; border-radius:16px; overflow:hidden;'>

            <!-- Header -->
            <tr>
              <td align='center' valign='top' class='mobile-pad'
                style='padding:40px 40px 32px 40px; background:linear-gradient(180deg,#111826 0%,#0d1117 100%); border-bottom:1px solid #1c222b;'>
                <img src='https://nomanmuhammadimran.github.io/assets/images/email-portfolio-logo.png' width='250'
                  alt='Noman Imran' style='display:block; margin:0 auto 22px auto;' />
                <span class='badge'>NEW PROJECT INQUIRY</span>
                <h1 style='font-size:24px; margin-top:16px; line-height:130%;'>
                  Someone Wants To Work With You!
                </h1>
                <p style='color:#8b949e; font-size:14px; margin:10px 0 0 0; line-height:150%;'>
                  A potential client just submitted a project inquiry through your portfolio.
                </p>
              </td>
            </tr>

            <!-- Intro -->
            <tr>
              <td class='mobile-pad' style='padding:28px 40px 8px 40px;'>
                <p style='color:#fff; font-size:15px; line-height:160%; margin:0; text-align:center;'>
                  Hi Noman, great news — a potential client is interested in working with you. Here are the project details they shared below.
                </p>
              </td>
            </tr>

            <!-- Fields card -->
            <tr>
              <td class='mobile-pad' style='padding:20px 40px 8px 40px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='field-table'
                  style='background-color:#000; border:1px solid #1c222b; border-radius:12px;'>
                  " . $fullnametr . "
                  " . $emailtr . "
                  " . $phonetr . "
                  " . $companynametr . "
                  " . $projecttypetr . "
                  " . $budgetrangetr . "
                  " . $projecttimelinetr . "
                  " . $projectdetailstr . "
                </table>
              </td>
            </tr>

            <!-- CTA -->
            <tr>
              <td align='center' class='mobile-pad' style='padding:28px 40px 8px 40px;'>
                <table border='0' cellpadding='0' cellspacing='0'>
                  <tr>
                    <td align='center' bgcolor='#00F5C4'
                      style='border-radius:8px; background-color:#00F5C4;'>
                      <a href='mailto:$email'
                        style='display:inline-block; padding:14px 32px; font-size:15px; font-weight:700; color:#05070a !important; text-decoration:none !important; border-bottom:0 !important;'>
                        Reply to This Client
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>

            <tr>
              <td class='mobile-pad' style='padding:28px 40px 0 40px;'>
                <div class='divider-line'>&nbsp;</div>
              </td>
            </tr>

            <!-- Footer -->
            <tr>
              <td align='center' class='mobile-pad' style='padding:24px 40px 36px 40px;'>
                <p style='font-family:Helvetica,Arial,sans-serif; font-size:12px; color:#5b6570; text-align:center; line-height:150%; margin:0;'>
                  Copyright &#169; Noman Imran. ALL RIGHTS RESERVED.<br>
                  FUELED BY <a href='https://nomanmuhammadimran.github.io/' target='_blank'
                    style='color:#00F5C4;'>Noman Imran</a>
                </p>
              </td>
            </tr>

          </table>
          <!-- /Outer card -->

        </td>
      </tr>
    </table>
  </center>
</body>

</html>";

  // echo $message1;
  // die();

  $recipients = array("nomiimran1000@gmail.com");
  $names = array('Noman Imran');

  // $subject = "Hiring Form Email From Noman Imran";
  $subject = "New Project Request from - " . $fullname . " - " . date("Y-m-d H:i:s");
  $sendmail = sendmail($recipients, $subject, $message1, $names, $email);

  if ($sendmail) {
    header("Location: ./?status=done", false, 301);
    exit();
  } else {
    header("Location: ./?status=error", false, 301);
    exit();
  }
}
///////////////////////////////////  ===>|.EMAIL END.  |<===  /////////////////////////////////////////////