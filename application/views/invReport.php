<!DOCTYPE html>
<html>
<head>
	<title>Todays Report <?php echo  date("d-m-Y")." | ".BUSINESS_NAME; ?></title>
    <script src="<?php echo SITE_PATH; ?>js/jquery.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>js/jquery.tmpl.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>js/accounting.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>js/numberstowords.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

    	$("#print-button").click(function(){
            window.print();
        });

    });
    	
    </script>
	<style type="text/css">

	    @page {
	        size: A4;
	        margin: 5;
    	}

    	 @media print {
	        html,
	        body {
	            width: 280mm;
	            height: 210mm;
	            font-size: 14px;
	            font-family: Arial;
	        }

	        #print-button{
	            display: none;
	        }
        
   		}

   		body {
	            width: 280mm;
	            height: 210mm;
	            font-size: 14px;
	            font-family: Arial;
	            margin: 0 auto;
	        }

		table {
		    border-collapse: collapse;
		}

		table, th, td {
		    border: 1px solid black;
		    padding: 3px;
		}
		.contact-details{
			text-align: center;
		}
		.contact-details, .biller-details p{
			margin: 0px;
		}

		.contact-details .business-name{
			font-weight: bold;
			text-transform: uppercase;

		}

		.contact-details .address{

		}

		.contact-details .phone-no{

		}

		.biller-name{
			text-transform: capitalize;
		}

		.biller-details b{
			width: 150px;
			display: inline-block;
		}

	</style>
</head>
<body>
<div class="contact-details">
	<p class="business-name"><?php echo BUSINESS_NAME;?></p>
	<p class="address">No 61, G block, 1st Floor, Sahakar Nagar Main Road,</br>
Above Indusland Bank, Opp ICICI Bank, Bangalore - 560092 </p>
	<p class="phone-no">+(91)-80-66491952</p>
	<h2 style="text-decoration:underline;">REPORT <?php echo  date("d/m/Y") ?></h2>
</div>
<br>
<div class="biller-details">
	<p class="biller-name"><b>Bill Name</b> : <?php echo $sessionData['username'];?></p>
	<p class="biller-id"><b>Biller Id</b> : <?php echo $sessionData['userid']; ?></p>
	<p class="biller-date"><b>Printing Date/Time</b> : <?php echo date("d-m-Y G:i:s"); ?></p>
</div>

<br>
<table border="0" cellspacing="0" width="100%" align="center" cellpadding="0">
	<tr>
		<th>VID</th>
		<th>PID</th>
		<th>Patent Name</th>
		<th>Gender</th>
		<th>Age</th>
		<th>Marital</th>
		<th>Address</th>
		<th>Contact No</th>
		<th>Disc.</th>
		<th>C.C</th>
		<th>Inv. Amt</th>
		<th>Bill Amt</th>
	</tr>


	
		<?php 
		$CCCount = 0;
		$InvAmtCount = 0;
		$BillAmtCount = 0;
		$DiscountAmount = 0;
		if($reportData){
		foreach ($reportData as $row) { 
			$DiscountAmount = $DiscountAmount + floatval($row['discountAmount']);
			$CCCount = $CCCount + floatval($row['CounsultingCharges']);
			$InvAmtCount = $InvAmtCount + floatval($row['invoiceAmount']);
			$BillAmtCount = $BillAmtCount + ((floatval($row['invoiceAmount'])+floatval($row['CounsultingCharges']))-floatval($row['discountAmount']));
		?>

		<tr>
		<td><?php echo $row['visitorId']; ?></td>
		<td><?php echo $row['patentId']; ?></td>
		<td><?php echo $row['patentName']; ?></td>
		<td><?php echo $row['gender']; ?></td>
		<td><?php echo $row['age']; ?></td>
		<td style="text-align:center;"><?php echo $row['maritalStatus']; ?></td>
		<td><?php echo $row['address']; ?></td>
		<td><?php echo $row['contactNo']; ?></td>
		<td style="text-align:right;"><script type="text/javascript">document.write(accounting.formatNumber("<?php echo $row['discountAmount']; ?>",2));</script></td>
		<td style="text-align:right;"><script type="text/javascript">document.write(accounting.formatNumber("<?php echo $row['CounsultingCharges']; ?>",2));</script></td>
		<td style="text-align:right;"><script type="text/javascript">document.write(accounting.formatNumber("<?php echo $row['invoiceAmount']; ?>",2));</script></td>
		<td style="text-align:right;"><script type="text/javascript">document.write(accounting.formatNumber("<?php echo (floatval($row['invoiceAmount'])+floatval($row['CounsultingCharges']))-floatval($row['discountAmount']); ?>",2));</script></td>
		</tr>

		<?php } } ?>

		<td colspan="8" style="text-align:right"><strong>Total</strong></td>
		<td style="text-align:right;"><strong><script type="text/javascript">document.write(accounting.formatNumber("<?php echo $DiscountAmount; ?>",2));</script></strong></td>
		<td style="text-align:right;"><strong><script type="text/javascript">document.write(accounting.formatNumber("<?php echo $CCCount; ?>",2));</script></strong></td>
		<td style="text-align:right;"><strong><script type="text/javascript">document.write(accounting.formatNumber("<?php echo $InvAmtCount; ?>",2));</script></strong></td>
		<td style="text-align:right;"><strong><script type="text/javascript">document.write(accounting.formatNumber("<?php echo $BillAmtCount; ?>",2));</script></strong></td>

		
	
</table><br>
<div align="center">
	<button id="print-button" style="margin:0 auto;">Print</button>
</div>
<br>
</body>
</html>