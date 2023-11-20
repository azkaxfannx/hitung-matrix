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
    // if (isset($_POST['submitAwal'])) {
    //     if (!$_POST['inputKolom'] || !$_POST['inputBaris']) {
    //         echo 'Nilai kolom atau baris harus diisi!';
    //     } else {
    //         $inputKolom = $_POST['inputKolom'];
    //         $inputBaris = $_POST['inputBaris'];

    //         $matrix = array_fill(0, $inputKolom, array_fill(0, $inputBaris, ' '));
    
    //         echo "<form method='post'>";
    //         echo "<table style='border: 2px solid black; width: 30%;'>";
    //         foreach ($matrix as $i => $matriks) {
    //             echo '<tr>';
    //             foreach ($matriks as $j => $nilai) {
    //                 echo "<td style='border: 1px solid black; padding: 5px;'>";
    //                     echo "<input style='width: 100%; text-align: center;' type='number' name='inputanNilaiMatrix' required>$nilai</input>";
    //                 echo '</td>';
    //             }
    //             echo '</tr>';
    //         }
    //         echo '</table>';
    //         echo '<br><br>';
    //         echo "<input type='submit' name='submitNilai' value='Submit Nilai!'>";
    //         echo "</form>";
    //     }
    // }
    
    // if(isset($_POST['submitNilai'])) {
    //     if(!$_POST['inputanNilaiMatrix']) {
    //         echo 'Nilai-nilai isi matrix belum diisi!';
    //     } else {
    //         $jumlahData = 0;
    //         $totalData = 0;

    //         foreach($matrix as $i => &$matriks) {
    //             $totalData += count($matriks[$i]);
    //             foreach($matriks as $j => &$nilai) {
    //                 $nilai[$j] = $_POST['inputanNilaiMatrix'];
    //                 $jumlahData += $nilai;
    //             }
    //         }
            
    //         $nilaiRata = $jumlahData / $totalData;
            
    //         echo "<br><br>";
    //         echo "Total data dalam matriks tersebut adalah: $totalData";
    //         echo "<br>";
    //         echo "Jumlah semua data dalam matriks tersebut adalah: $jumlahData";
    //         echo "<br>";
    //         echo "Nilai rata-ratanya adalah: $nilaiRata";
    //     }
    // }

    if (isset($_POST['submitAwal'])) {
        if (!$_POST['inputKolom'] || !$_POST['inputBaris']) {
            echo 'Nilai kolom atau baris harus diisi!';
        } else {
            $inputKolom = $_POST['inputKolom'];
            $inputBaris = $_POST['inputBaris'];
    
            echo "<form method='post'>";
            echo "<table style='border: 2px solid black; width: 20%;'>";
            for ($i = 0; $i < $inputBaris; $i++) {
                echo '<tr>';
                for ($j = 0; $j < $inputKolom; $j++) {
                    echo "<td style='border: 1px solid black; padding: 5px;'>";
                        echo "<input style='width: 100%; text-align: center;' type='number' name='inputanNilaiMatrix[$i][$j]' required>";
                    echo '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
            echo '<br><br>';
            echo "<input type='hidden' name='inputKolom' value='$inputKolom'>";
            echo "<input type='hidden' name='inputBaris' value='$inputBaris'>";
            echo "<input type='submit' name='submitNilai' value='Submit Nilai!'>";
            echo "</form>";
        }
    }
    
    if (isset($_POST['submitNilai'])) {
        if (!isset($_POST['inputanNilaiMatrix'])) {
            echo 'Nilai-nilai isi matrix belum diisi!';
        } else {
            $jumlahData = 0;
            $totalData = $_POST['inputKolom'] * $_POST['inputBaris'];
    
            echo "<table style='border: 2px solid black; width: 10%;'>";
            foreach ($_POST['inputanNilaiMatrix'] as $baris) {
                echo '<tr>';
                foreach ($baris as $nilai) {
                    echo "<td style='border: 1px solid black; padding: 5px; text-align: center;'>";
                    echo $nilai;
                    $jumlahData += $nilai;
                    echo '</td>';
                }
            }
            echo '</table>';

            if ($totalData == 0) {
                echo 'Tidak dapat melakukan pembagian dengan total data nol.';
            } else {
                $nilaiRata = $jumlahData / $totalData;
    
                echo "<br><br>";
                echo "Total data dalam matriks tersebut adalah: $totalData";
                echo "<br>";
                echo "Jumlah semua data dalam matriks tersebut adalah: $jumlahData";
                echo "<br>";
                echo "Nilai rata-ratanya adalah: $nilaiRata";
                echo '<br><br>';
            }
        }
    }
?>
<br>
<form>
    <input type='button' value='Refresh' onclick='refreshPage()'>
    <script>
        function refreshPage() {
            location.reload(true);
        }
    </script>
</form>