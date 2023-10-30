<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="input"></form>
    <?php
    //SIMPAN DIBARIS PALING BAWAH UNTUK KONVERSI PDF
    
        $content = ob_get_clean();
        require_once(dirname(__FILE__).'./html2pdf/html2pdf.class.php');
        try
        {
           $html2pdf = new HTML2PDF('P', 'A4', 'en',  array(8, 8, 8, 8));
           $html2pdf->pdf->SetDisplayMode('fullpage');
           $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
           $html2pdf->Output('laporan.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    
?>
</body>
</html>