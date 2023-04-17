<?php include 'includes/sessionCheck.inc.php';?>
<!DOCTYPE html>
<html lang="en">  



<head>
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta charset="utf-8">
<meta property="og:type" content="website" />


      <title>DESKTOP Portal</title>


<?php include 'includes/headInfo.inc.php';?>

      
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta property="og:url" content="THIS FULL URL" />
      <meta property="og:title" content="Non Advertising Title" />
      <meta property="og:description" content="" />
      <meta property="og:image" content="Full URL to Anchor Image for a Post to this page" />


<link rel="stylesheet" href="../css/responsive.css">

      
<!-- Begin Viewport Check for Responsive Design -->
<!-- Intended Viewport of This Page is Tablet from 481px thru 1024px -->
<!-- Comment Out the Intended Viewport of THIS page in the JS below -->
<!-- Also adjust the IF and ELSE IF -->
<script type="text/javascript">
if
// Mobile (small)
 (window.matchMedia("(max-width: 480px)").matches) {
     window.location.replace("menu.htm");
 }

//if
// Tablet (medium)
//(window.matchMedia("(min-width: 481px) and (max-width: 1024px)").matches) {
//     window.location.replace("filename-tab.html");
// }

else if
// Desktop (large)
(window.matchMedia("(min-width: 1025px)").matches) {
    window.location.replace("menuDesk.php");
}
</script>
<!-- End Viewport Check for Responsive Design -->


</head>







<body>
<div class="wrapper">

<?php include 'includes/navbar.inc.php';?>


<p>
Welcome to the Tablet Version of the
<br />
<b>Action Enterprise Portal</b>
<br /><br />
One Stop for Everything Action!
</p>




<br />
  
<table class="EntModuleTable" border="0">
<tr>
<td>
<a href="pub/learn/learn.htm"><img class="EntModule" src="img/Learn.jpg" width="720" height="530" alt="Enterprise Learning Center"></a>
</td>
<td>
<a href="https://www.actionrealestate.biz/oncall/"><img class="EntModule" src="img/LeadMgmt.jpg" width="720" height="530" alt="Lead Management Module"></a>
</td>
<td>
<a href="https://www.actionrealestate.biz/pendingBoard/display_records.php"><img class="EntModule" src="img/salesBoard.jpg" width="720" height="530" alt="Pending Transactions Board"></a>
</td>
</tr>

<tr><td class="tableRowSpacer" colspan="3"></td></tr>

<tr>
<td>
<a href="priv/"><img class="EntModule" src="img/GetPaid.jpg" width="720" height="530" alt="Get Paid for your Efforts"></a>
</td>
<td>
<a href="pub/pnp/pnpIndexTab.htm"><img class="EntModule" src="img/PnP.jpg" width="720" height="530" alt="Policies and Procedures"></a>
</td>
<td>
<a href="pub/salesOffice/"><img class="EntModule" src="img/salesOfficeSchedule.jpg" width="720" height="530" alt="Book time in the Sales Office"></a>
</td>

</tr>

<tr><td class="tableRowSpacer" colspan="3"></td></tr>


<tr>
<td>
<a href="pub/events/"><img class="EntModule" src="img/eventCal.jpg" width="720" height="530" alt="Important Dates"></a>
</td>
<td>
<a href="pub/store/"><img class="EntModule" src="img/store.jpg" width="720" height="530" alt="Action Store"></a>
</td>
<td></td>
</tr>

</table>


</div><!-- end wrapper -->


 













<br /><br /><br /><br />

<tr><td>
</td></tr>
</table>


  
  
  
  
  
  
  
  
  
  
  
  
  











</body>
</html>