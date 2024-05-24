<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hasil Panen</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "panen_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Kueri SQL untuk mengambil data dari tabel hasil_panen untuk metode manual
$sql_manual = "SELECT * FROM hasil_panen WHERE `user` = '0001' AND `metode` = 'manual'";
$result_manual = $conn->query($sql_manual);

if ($result_manual->num_rows > 0) {
    // Tampilkan data untuk metode manual dalam tabel HTML
    echo "<table>";
    echo "<tr><th>No. Panen</th><th>User</th><th>Blok</th><th>Metode</th><th>Matang</th><th>Mentah</th></tr>";
    $total_matang_manual = 0;
    $total_mentah_manual = 0;
    while($row_manual = $result_manual->fetch_assoc()) {
        echo "<tr><td>" . $row_manual["no_panen"] . "</td><td>" . $row_manual["user"] . "</td><td>" . $row_manual["blok"] . "</td><td>" . $row_manual["metode"] . "</td><td>" . $row_manual["matang"] . "</td><td>" . $row_manual["mentah"] . "</td></tr>";
        // Menghitung subtotal matang dan mentah untuk metode manual
        $total_matang_manual += $row_manual["matang"];
        $total_mentah_manual += $row_manual["mentah"];
    }
    echo "</table>";

    // Menampilkan subtotal matang dan mentah untuk metode manual
    echo "<p>Total Matang (Manual): $total_matang_manual</p>";
    echo "<p>Total Mentah (Manual): $total_mentah_manual</p>";
} else {
    echo "Tidak ada data yang ditemukan untuk metode manual";
}

// Kueri SQL untuk mengambil data dari tabel hasil_panen untuk metode mekanis
$sql_mekanis = "SELECT * FROM hasil_panen WHERE `user` = '0001' AND `metode` = 'mekanis'";
$result_mekanis = $conn->query($sql_mekanis);

if ($result_mekanis->num_rows > 0) {
    // Tampilkan data untuk metode mekanis dalam tabel HTML
    echo "<table>";
    echo "<tr><th>No. Panen</th><th>User</th><th>Blok</th><th>Metode</th><th>Matang</th><th>Mentah</th></tr>";
    $total_matang_mekanis = 0;
    $total_mentah_mekanis = 0;
    while($row_mekanis = $result_mekanis->fetch_assoc()) {
        echo "<tr><td>" . $row_mekanis["no_panen"] . "</td><td>" . $row_mekanis["user"] . "</td><td>" . $row_mekanis["blok"] . "</td><td>" . $row_mekanis["metode"] . "</td><td>" . $row_mekanis["matang"] . "</td><td>" . $row_mekanis["mentah"] . "</td></tr>";
        // Menghitung subtotal matang dan mentah untuk metode mekanis
        $total_matang_mekanis += $row_mekanis["matang"];
        $total_mentah_mekanis += $row_mekanis["mentah"];
    }
    echo "</table>";

    // Menampilkan subtotal matang dan mentah untuk metode mekanis
    echo "<p>Total Matang (Mekanis): $total_matang_mekanis</p>";
    echo "<p>Total Mentah (Mekanis): $total_mentah_mekanis</p>";
} else {
    echo "Tidak ada data yang ditemukan untuk metode mekanis";
}

// Menghitung dan menampilkan grand total matang dan mentah
$grand_total_matang = $total_matang_manual + $total_matang_mekanis;
$grand_total_mentah = $total_mentah_manual + $total_mentah_mekanis;

echo "<h2>Grand Total</h2>";
echo "<p>Grand Total Matang: $grand_total_matang</p>";
echo "<p>Grand Total Mentah: $grand_total_mentah</p>";

$conn->close();
?>

</body>
</html>
