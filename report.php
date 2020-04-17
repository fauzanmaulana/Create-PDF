<?php
    require_once('vendor/autoload.php');
    use Dompdf\Dompdf;

    function printpdf($text, $paper, $orientation){
        $pdf = new Dompdf();
        $pdf->loadHtml("$text");
        $pdf->setPaper("$paper", "$orientation");
        $pdf->render();
        return $pdf->stream('hasil_report.pdf');
    }

    if(isset($_GET['post'])){
        $text = $_POST['text'];
        $paper = $_POST['paper'];
        $orientation = $_POST['orientation'];
        printpdf($text, $paper, $orientation);
    }
?>

<form action="report.php?post" method="post">
    <input type="text" name="text">
    <select name="paper">
        <option value="A4">A4</option>
        <option value="A3">A3</option>
    </select>
    <select name="orientation">
        <option value="landscape">landscape</option>
        <option value="potrait">potrait</option>
    </select>
    <button type="submit">cetak pdf</button>
</form>