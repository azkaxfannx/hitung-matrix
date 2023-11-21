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
    <style>
    input {
        outline: none;
    }
    table {
        border-spacing: 0;
    }

    table td, table th {
        padding-bottom: 8px;
        text-align: left;
    }

    table tr {
        margin-bottom: 10px; 
    }


    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-center bg-gray-300 text-black">
    <h1 class="margin-t-5 bg-sky-950 p-4 text-white">Hitung Matrix</h1><br>
    <form method="post" class="inline-block text-left bg-gray-50 p-10">
        <table class="p-3">
            <tr class="mb-10">
                <td><label for="inputKolom">Masukkan Nilai Kolom </label></td>
                <td>: </td>
                <td><input type="number" name="inputKolom" required class="pl-1 border-sky-900 border-slate-400 bg-sky-100 border outline-none rounded"></td>
            </tr>
            <tr class="mb-10">
                <td><label for="inputBaris">Masukkan Nilai Baris</label></td>
                <td>: </td>
                <td><input type="number" name="inputBaris" required class="pl-1 border-sky-900 bg-sky-100 border-slate-400 border outline-none rounded"><br></td>
            </tr>
        </table>
        <div class="text-center mt-5  text-white p-1 rounded">
          <input type="submit" name="submitAwal" value="Set Baris dan Kolom!" class="bg-sky-900 p-2 rounded hover:bg-sky-700">
        </div>
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
    
            echo "<form method='post' style='text-align:center;'>";
            echo "<div class='bg-gray-50 p-10 text-center inline-block'> ";
            echo "<table style='border: 2px solid black; width: 20%;display: inline-block;'>";
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
            echo "<input type='hidden' name='inputKolom' value='$inputKolom' >";
            echo "<input type='hidden' name='inputBaris' value='$inputBaris' >";
            echo "<input type='submit' name='submitNilai' value='Submit Nilai!' class='bg-rose-600 hover:bg-rose-500 text-white p-2 rounded'>";
            echo "</div>";
            echo "</form>";
        }
    }
    
    if (isset($_POST['submitNilai'])) {
        if (!isset($_POST['inputanNilaiMatrix'])) {
            echo 'Nilai-nilai isi matrix belum diisi!';
        } else {
            $jumlahData = 0;
            $totalData = $_POST['inputKolom'] * $_POST['inputBaris'];
            
            echo "<div class='text-center'>";
            echo "<div class='inline-block bg-gray-50 text-center p-20'>";
            echo "<table style='border: 1px solid black; width: 20%;'>";
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
            echo '</div>';
            echo '</div>';

            if ($totalData == 0) {
                echo 'Tidak dapat melakukan pembagian dengan total data nol.';
            } else {
                $nilaiRata = $jumlahData / $totalData;
    
                echo "<br><br>";
                echo "Total data dalam matriks tersebut adalah: <span style='color:green;'>$totalData</span>";
                echo "<br>";
                echo "Jumlah semua data dalam matriks tersebut adalah: <span style='color:green'>$jumlahData</span>";
                echo "<br>";
                echo "Nilai rata-ratanya adalah: <span style='color:green'>$nilaiRata</span>";
                echo '<br><br>';
            }
        }
    }
?>
<br>
<form>
    <input type='button' value='Refresh' onclick='refreshPage()' class="bg-sky-900 p-2 text-white hover:bg-sky-700 rounded mb-10">
    <script>
        function refreshPage() {
            location.reload(true);
        }
    </script>
</form>
