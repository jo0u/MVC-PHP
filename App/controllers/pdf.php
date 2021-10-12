<?php


use App\Core\Controller;
use Dompdf\Dompdf;
  
# ou utilizar
#   class Home extends \App\Core\Controller{


  class Pdf extends Controller{
        public function index($nome = ''){
          
            // instantiate and use the dompdf class
            $dompdf = new Dompdf();

            ob_start();
            require "teste.php";
            $dompdf->loadHtml(ob_get_clean());

// (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
            $dompdf->render();

// Output the generated PDF to Browser      Para não fazer o download de vez
            $dompdf->stream("Arquivo pdf",["Attachment" => false]);
          
        
             $this->view('pdf/index');
        }

    }
?>