<?php 
    // $html = file_get_contents('pdf.php');
    require 'dompdf/autoload.inc.php';
    $servername = "localhost";
        $username = "root";
        $password = "";
        $date = date("jS \of F Y");
        // $img = file_get_contents('../images/report1.png' );
        // $imgbase64 = base64_encode($img);
        // Create connection
        $conn = mysqli_connect($servername,$username,$password) or die(mysqli_error($conn));
        $db_select = mysqli_select_db($conn, 'pdf') or die(mysqli_error($conn));
        // $html = "<img src='report1.png' />"; 
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
            <style>
                
                body{
                    text-align:center;
                    font-family: "Poppins";
                    
                }
                .eventra{
                    color: #3a0247;
                    margin: 0;
                    padding: 0;
                    width: 100%;
                    text-align: center;
                    font-family: "Poppins";
                    // border: 1px solid #3a0247 ;
                    font-size: 30px;
                    font-weight: bold
                    
                }
                .report_image{
                    width: 60%;
                    border: 1px solid #3a0247 ;
                    

                }
                .report_header{
                    text-align: center;
                    width: 100%;
                    padding: 1%;
                    margin-bottom: 2%;
                }
                .logo{
                    width: 8%;
                    border: none;
                    float:left;
                    // border: 1px solid #3a0247 ;

                    
                }
                .moto{
                    text-decoration: none;
                    text-align:center;
                    margin: 0;
                    padding: 0;
                    width: 100%;
                    
                    // border: 1px solid #3a0247 ;
                    
                }
                .report_topic{
                    
                   text-align: center;
                    // border: 1px solid #3a0247 ;

                    

                }
                .image{
                    width:100%;
                    // border: 1px solid #3a0247 ;
                    text-align:center;


                }
                .date{
                    width: 20%;
                    text-align:right;
                    float:right;

                }
        
            </style>
        </head>
        <body>
            <div class="report_header">
            <img src="http://localhost/file_struct/Event_Management/images/logo.png" class="logo"/>
            <p class="date">'.$date.'</p>
            <div class="report_topic">
                <div class="eventra" >Eventra</div>
                <div class="motto">Your Event, Your Way</div>
            </div>
            
            </div>
            
            
        
        
        ';
        if(isset($_POST['viewpdf'])){
            if(!empty($_POST['image'])){
                $imgData = $_POST['image'];
                $html .= "<div class='image'>
                <img src='$imgData' class='report_image'/>
                </div>
                </body>";
                 
                
            }else{
                $html .= "No Data 
                </body>";
                
            }
            $streamdata = 0;
            
          
        }else if(isset($_POST['downloadpdf'])){
            if(!empty($_POST['image'])){
                $imgData = $_POST['image'];
                $html .= "<div class='image'>
                <img src='$imgData' class='report_image'/>
                </div>
                </body>";
            }else{
                $html .= "No Data
                </body>";
                
            }
            $streamdata = 1;
        }
            
    
            // $streamdata = 0;
    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    use Dompdf\Options;
    $options = new Options();
    $options->set('isJavascriptEnabled', TRUE);
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);
    // ob_start();
    // require 'loadpdf.php';
    // $html = ob_get_contents();
    // ob_get_clean();
    // instantiate and use the dompdf class
    // $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('Report.pdf', array('Attachment'=>$streamdata));





    

?>