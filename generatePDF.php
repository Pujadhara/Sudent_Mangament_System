<?php

// include autoloader
require_once ('./dompdf/autoload.inc.php');
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();


$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>


    <style>

    p{
    margin:2px;
    font-size:10px;
}


    .container{
    border:3px solid black;
    width:100%;
    /* margin-left: 250px; */
    margin-right: 250px;
    /* background: no-repeat center url(pictures/JUT_LOGO.jpg);
    opacity: .5; */
}
.container1{
    width:100%;
    margin:2px 2px 2px 2px ;
    border:3px solid black;
    border-color: lightgreen;
   
}
.form-no{
    text-align: right;
    padding-right: 15px;
}
.logo{
    height: 80px;
    padding-left: 15px;
    padding-right: 20px;
    display:inline-flex;
}
.row{
    display:flex;
    justify-content: flex-end;
}
.section{
padding-left: 25px;
}
td{
text-align: center;
}
table{
margin: 5px;
position: relative;
}
/* table, th, td{
border:1px solid black;
border-collapse:collapse;
} */
.footer{
text-align:right;
display:flex;
justify-content: space-between;
padding-left: 10px;
padding-right: 10px;
padding-bottom: 10px;
}
    </style>
</head>
<body>
    <div class="container" >
        <div class="container1">

        <DIV class="form-no"><P>No : JUT/DEG/MRK/2ND/7567/08786</P></DIV>

        <div class="row">
            <div class="col-md-4">
            <img class="logo" src="data:image/jpeg;base64,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">
            </div>
            <div class="col-md-4">
            <center>
            <h1 style="color:darkgreen; margin-bottom:8px">JHARKHAND UNIVERSITY OF TECHNOLOGY</h1>
            <p style="color:darkblue; font-size:20px; font-weight:medium; ">MARKS STATEMENT</p>
            <p>BTECH FIRST SEMESTER EXAMINATION-2022</p>
            </center>
            </div>
        </div>
        <div class="section">
            <P>REGISTRATION NO : 2365769560</P>
            <P>NAME : PUJA RANI DHARA</P>
            <P>INSTITUTE NAME : RVS COLLEGE OF ENGINEERING AND TECHNOLOGY </P>
            <P>SEMESTER : SECOND </P>
            <P>BRANCH : COMPUTER SCIENCE ENGINEERING</P>
            <P>EXAMINATION YEAR : MARCH - APRIL-2024</P>
        </div>
        <table border="1px" style=" border:1px solid black;
    border-collapse:collapse; margin-left:20px; margin-right:10px; margin-top:18px;">
            <tr>
                <th style="padding: 8px; font-size:15px; width:390px ;text-align:center; ">[SUBJECT CODE] NAME OF THE SUBJECT</th>
                <th style="padding: 8px; font-size:15px; width:70px ;text-align:center; ">CREDIT</th>
                <th style="padding: 8px; font-size:15px; width:70px ;text-align:center; ">FULL MARKS</th>
                <th style="padding: 8px; font-size:15px; width:70px ;text-align:center; ">GRADE</th>
            </tr>
            <tr>
                <th style="color:darkblue; text-align:left;">THEORY PAPERS</th>
            </tr>
            <tr>
                <td style="padding: 6px; text-align:left;">[BSC 102] Physics</td>
                <td>2</td>
                <td>70/70</td>
                <td>A</td>
            </tr>
            <tr>
                <td style="padding: 6px; text-align:left;">[BSC 103] Mathematics </td>
                <td>4</td>
                <td>70/70</td>
                <td>A</td>
            </tr>
            <tr>
                <td style="padding: 6px; text-align:left;">[BSC 104] Basic Electrical Engineering</td>
                <td>4</td>
                <td>70/70</td>
                <td>A+</td>
            </tr>
            <tr>
                <th style="color:darkblue;  text-align:left;">PRACTICAL PAPERS</th>
            </tr>
            <tr>
                <td style="padding: 6px; text-align:left;">[BSC 102] Physics</td>
                <td>2</td>
                <td>30/30</td>
                <td>A</td>
            </tr>
            <tr>
                <td style="padding: 6px; text-align:left;">[BSC 102] BEE</td>
                <td>2</td>
                <td >30/30</td>
                <td>A</td>
            </tr>
            <tr>
                <td style="padding: 6px; text-align:left;">[BSC 102] ENGINEERING GRAPHICS</td>
                <td>1</td>
                <td >30/30</td>
                <td >A</td>
            </tr>
            <tr>
                <th style="color:red; text-align:right">TOTAL CREDIT</th>
                <TH style="color:red; text-align:left">17.5</TH>
            </tr>
            <TR>
                <TH style="color:red; text-align:right">SGPA</TH>
                <TH style="color:red; text-align:left">9.5</TH>
            </TR>
        </table>

        <br>
        <div>
            <p style="font-size:18px; font-weight:medium; padding-left:10px; margin-top:0;">% of marks obtains with better grade & performance :-</p>
            <table style="padding-left:20px; border:none; margin-left: 20px;">
                <tr>
                    <td style="padding:3px; width:175px; text-align:left;">90% and above</td>
                    <td style="width:75px; text-align:left">:   A+</td>
                    <td>Excellent</td>
                </tr>
                <tr>
                    <td style="padding:3px; width:175px; text-align:left;">89% to 80%</td>
                    <td style="width:75px ;text-align:left">:  A </td>
                    <td>Very Good</td>
                </tr>
                <tr>
                    <td style="padding:3px; width:175px; text-align:left;">79% to 70%</td>
                    <td style="width:75px; text-align:left;">:  B+</td>
                    <td>Good</td>
                </tr>
                <tr>
                    <td style="padding:3px; width:175px; text-align:left;">69% to 60%</td>
                    <td style="width:75px; text-align:left;">:  B</td>
                    <td>Fair</td>
                </tr>
                <tr>
                    <td style="padding:3px; width:175px; text-align:left;">59% to 50%</td>
                    <td style="width:75px; text-align:left;">:  C+</td>
                    <td>Average</td>
                </tr>
                <tr>
                    <td style="padding:3px; width:175px; text-align:left;"><=40%</td>
                    <td style="width:75px; text-align:left;">:  F</td>
                    <td>Fail</td>
                </tr>
            </table>
        </div>

<br><br><br>
            <div class="footer">
                <div col-md-4>
                    DATE OF RESULT: 15/09/24
                </div>
            </div>
    </div>
    </div>
</body>
</html>';
$dompdf -> loadHtml($html);

$dompdf->setPaper('letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>