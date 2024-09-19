<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "badjo";

// Membuat koneksi
$conn = new mysqli('localhost', 'root', '', 'badjo');

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk menghapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM orders WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: edit_order.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fungsi untuk mengambil data pesanan yang akan diedit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM orders WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
    } else {
        echo "Order not found!";
    }
}

// Menyimpan perubahan setelah form di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $customer_name = $_POST['customer_name'];
    $phone_number = $_POST['phone_number'];
    $booking_date = $_POST['booking_date'];
    $travel_date = $_POST['travel_date'];
    $package_id = $_POST['package_id'];
    $number_of_people = $_POST['number_of_people'];

    $sql = "UPDATE orders SET customer_name='$customer_name', phone_number='$phone_number', booking_date='$booking_date', travel_date='$travel_date', package_id='$package_id', number_of_people='$number_of_people' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: edit_order.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Menampilkan daftar pesanan
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
     <!-- css link -->
     <link rel="stylesheet" href="./assets/css/edit.css" />

     <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
         href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
         rel="stylesheet">
    </head>
<body>

<main>
<div class="container">
    <div class="close-button">
    <button class="btn-close" onclick="location.href='index.html'" aria-label="Close"></button>
    </div>
    <h1>Daftar Pesanan</h1>
    <!-- Tabel untuk menampilkan data -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Tanggal Pesan</th>
                <th>Tanggal Perjalanan</th>
                <th>Paket Wisata</th>
                <th>Jumlah Orang</th>
                <th>Total Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["customer_name"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "<td>" . $row["booking_date"] . "</td>";
                    echo "<td>" . $row["travel_date"] . "</td>";
                    echo "<td>" . $row["package_id"] . "</td>";
                    echo "<td>" . $row["number_of_people"] . "</td>";
                    echo "<td>" . $row["total_price"] . "</td>";
                    echo "<td>
                        <a href='booking_form.php?edit=" . $row["id"] . "' class='btn edit-btn'>Edit</a> 
                        <a href='edit_order.php?delete=" . $row["id"] . "' class='btn delete-btn' onclick='return confirmDelete();'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</main>
    <!-- JavaScript -->
    <script>
        function confirmDelete() {
            return confirm('Yakin untuk menghapus data dan membatalkan pesanan?');
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
