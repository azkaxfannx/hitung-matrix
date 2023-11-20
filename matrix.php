<?php
    $inputKolom = 0;
    $inputBaris = 0;
    $matrix = [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Matrix</title>
</head>
<body>
    <h1>Hitung Matrix</h1>
    <form method="post">
        <label for="inputKolom">Masukkan Nilai Kolom: </label>
        <input type="number" name="inputKolom" required>
        <br><br>
        <label for="inputBaris">Masukkan Nilai Baris: </label>
        <input type="number" name="inputBaris" required>
        <input type="submit" name="submitAwal" value="Set Baris dan Kolom!">
    </form>
    <br><br>
</body>
</html>

<?php
    if (isset($_POST['submitAwal'])) {
        if (!$_POST['inputKolom'] || !$_POST['inputBaris']) {
            echo 'Nilai kolom atau baris harus diisi!';
        } else {
            $inputKolom = $_POST['inputKolom'];
            $inputBaris = $_POST['inputBaris'];

            $matrix = array_fill(0, $inputKolom, array_fill(0, $inputBaris, ' '));
    
            echo "<form method='post'>";
            echo "<table style='border: 2px solid black; width: 30%;'>";
            foreach ($matrix as $matriks) {
                echo '<tr>';
                foreach ($matriks as $nilai) {
                    echo "<td style='border: 1px solid black; padding: 5px;'>";
                        echo "<input style='width: 100%; text-align: center;' type='number' name='inputanNilaiMatrix' required></input>";
                    echo '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
            echo '<br><br>';
            echo "<input type='submit' name='submitNilai' value='Submit Nilai!'>";
            echo "</form>";
        }
    }
    
    if(isset($_POST['submitNilai'])) {
        if(!$_POST['inputanNilaiMatrix']) {
            echo 'Nilai-nilai isi matrix belum diisi!';
        } else {
            $jumlahData = 0;
            $totalData = 0;

            foreach($matrix as &$matriks) {
                $totalData += count($matriks);
                foreach($matriks as &$nilai) {
                    $nilai = $_POST['inputanNilaiMatrix'];
                    $jumlahData += $nilai;
                }
            }
            
            $nilaiRata = $jumlahData / $totalData;
            
            echo "<br><br>";
            echo "Total data dalam matriks tersebut adalah: $totalData";
            echo "<br>";
            echo "Jumlah semua data dalam matriks tersebut adalah: $jumlahData";
            echo "<br>";
            echo "Nilai rata-ratanya adalah: $nilaiRata";
        }
    }
?>