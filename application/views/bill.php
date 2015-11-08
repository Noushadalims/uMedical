<!DOCTYPE html>
<html>
<head>
    <title><?php echo  "Visitor #".$visitorId." | ".BUSINESS_NAME; ?></title>
    <script src="<?php echo SITE_PATH; ?>js/jquery.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>js/jquery.tmpl.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>js/accounting.min.js"></script>
    <script src="<?php echo SITE_PATH; ?>js/numberstowords.js"></script>
    <style type="text/css">
    @page {
        size: A5;
        margin: 0;

    }
    /*@media screen{
    	html,
    	body{
    	font-family: Arial;
    }*/

    @media print {
        html,
        body {
            width: 210mm;
            height: 100mm;
            font-size: 14px;
            font-family: Arial;
        }

        #print-bill{
            display: none;
        }
        /* ... the rest of the rules ... */
    }
    div.print {
        /*border:1px solid #000000;*/
        
        margin: 50mm auto 0mm auto;
        width: 190mm;
    }
    table {
        width: 100%;
        border: 1px solid #000;
    }

    table.header{
        width: 100%;
        border: none;
    }

     table td {
        padding: 10px;
        padding-left: 15px;

    }



    .amount-title, .description-title{
    	text-align: center;
    	padding: 3px;
    	font-weight: bold;
    }
    .amount{
    	text-align: right;
    	padding:3px 10px 3px 0px;
    	width: 140px;
    }
    .description{
    	text-align: left;
    	padding:3px 3px;
    }

    .discount, .paid, .balance{
    	text-transform: uppercase;
    	font-size: 12px;
    	text-align: right;
    	font-weight: bold;
    	padding-right: 10px;
    }
    .total-amount{
    	font-weight: bold;
    }

    .bottom-border{
    	border-bottom: 1px solid #000000;
    }

    .border-top-bottom{
    	border-top: 1px solid #000000;	
    	border-bottom: 1px solid #000000;	
    }

    .border-top{
    	border-top: 1px solid #000000;	
    }
    /*
	td{
		border:1px solid #000000;	
	}*/

	.footer-message{
		padding: 10px;
		text-align: justify;
        font-size: 12px;
	}
	.some-message{
		text-transform: uppercase;
		font-size: 12px;
		background: #FFF;
		position: relative;
		top: -20px;
		padding: 3px;
		left: 15px;
		font-weight: bold;
	}

    .billHeading{
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
    }

    p{
        margin: 0px;
        padding: 0px;
    }

    .date, .code{
        text-align: center;
    }

    .amount-in-words{
        text-transform: capitalize;
    }

    </style>
<script type="text/javascript">
var applicationUrl = "<?php echo SITE_PATH.'index.php/'; ?>";
var searchId = "<?php echo $visitorId; ?>";
        
     $(document).ready(function(){
        $.ajax({
            url: applicationUrl+"json/visitorRecord/"+searchId,
            type: "POST",
            dataType:'json',
            success: function(data, textStatus, jqXHR) {
            $('#my-first-template').tmpl(data).appendTo('#displayBillHere');
            }
        });

        $("#print-bill").click(function(){
            window.print();
        });


       
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

</script>
</head>

<body>

<div id="displayBillHere"></div>


<script id="my-first-template" type="text/x-jquery-tmpl">
<div class="print">
 <table border="0" class="header" cellpadding="0" cellspacing="0">
            <tr>
               <td align="left">
                    <img src="<?php echo SITE_PATH; ?>/img/logo.png" width="250">
                </td>
                   <td colspan="2">
                    <p>No 61, G block, 1st Floor, Sahakar Nagar Main Road,
                    Above Indusland Bank, Opp ICICI Bank, Bangalore - 560092
                    <br>+(91)-80-66491952</p>
                </td>

            </tr>
            <tr>
                <td width="50%">
                    <p>Patent Name : ${patentSummary.patentTitle}.${patentSummary.patentFirstName} ${patentSummary.patentLastName}</p>
                    <p>Gender : ${patentSummary.patentGender} (${patentSummary.patentAge}) </p>
                    {{if patentSummary.patentAddress}}<p>Address : ${patentSummary.patentAddress}</p>{{/if}}
                    <p>Patent ID : ${visitorSummary.patentId}</p>  

                </td>
                <td width="20%"></td>
                <td align="left">
                <p>Date : ${visitorSummary.visitedDated}</p>

                <p>Bill No : ${visitorSummary.billno}</p>
                <p>Doctor : Dr.${visitorSummary.doctorName}</p>
          </td>
            </tr>
        </table>
<br>
<div class="billHeading">Laboratory Invoice</div>
    <br>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td class="description-title bottom-border">DATE</td>
                <td class="description-title bottom-border">CODE</td>
                <td class="description-title bottom-border">PARTICULARS</td>
                <td class="amount-title bottom-border">AMOUNT</td>
            </tr>
            
            {{each investigationSummary}}
            <tr>
            <td class="date">26/01/2015</td>
            <td class="code">VK${invId}</td>
            <td class="description">${invInfoName}</td>
            <td class="amount">${accounting.formatNumber(invInfoAnount,2) }</td>
            </tr>
            {{/each}}

            <tr>
                <td colspan="2"> </td>
                <td style="text-align:right;" class="discount" >Counsulting Charge</td>
                <td style="text-align:right;" >${accounting.formatNumber(visitorSummary.consultingCharge,2)}</td>
            </tr>

            <tr>
                <td colspan="2" class="discount total-amount border-top-bottom"> </td>
                <td class="discount total-amount border-top-bottom">Total</td>
                <td class="amount total-amount border-top-bottom">${accounting.formatNumber(totalBillableAmount,2)}</td>
            </tr>
            {{if discountSummary.discountAmount>0}}
            <tr>
                <td colspan="3" class="discount">Discount</td>
                <td class="amount">(-) ${accounting.formatNumber(discountSummary.discountAmount,2)}</td>
            </tr> 
            {{/if}}           
            <tr>
                <td colspan="3" class="paid">Paid in cash</td>
                <td class="amount">${accounting.formatNumber(amountAfterDiscount,2)}</td>
            </tr>
            <tr>
                <td colspan="4" class="amount">Amount in words : <span class='amount-in-words'>${numberToWords(amountAfterDiscount)} rupees</span></td>
            </tr>
            <tr>
            
        </table>
        
        
    </div>
</script>
<div align="center">
<p class="footer-message" style="text-align:center;">Thank you for choosing <span><?php echo BUSINESS_NAME; ?></span> </p>
        <button id="print-bill">Print</button>
</div>
    
</body>

</html>
