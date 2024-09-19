<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "badjo";

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'badjo'); 

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Variabel untuk menyimpan data pesanan
$order = null;

// Mengecek jika ada parameter 'edit' di URL
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    // Mengambil data pesanan dari database
    $sql = "SELECT * FROM orders WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
    } else {
        echo "Order not found!";
        exit();
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

    // Ambil harga per orang berdasarkan package_id
    $package_result = $conn->query("SELECT price_per_person FROM packages WHERE id=$package_id");
    $package = $package_result->fetch_assoc();
    $price_per_person = $package['price_per_person'];

    // Hitung total harga
    $total_price = $price_per_person * $number_of_people;

    if ($id) { // Jika ID ada, maka update
        $sql = "UPDATE orders SET customer_name='$customer_name', phone_number='$phone_number', booking_date='$booking_date', travel_date='$travel_date', package_id='$package_id', number_of_people='$number_of_people', total_price='$total_price' WHERE id=$id";
    } else { // Jika ID tidak ada, maka insert
        $sql = "INSERT INTO orders (customer_name, phone_number, booking_date, travel_date, package_id, number_of_people, total_price) VALUES ('$customer_name', '$phone_number', '$booking_date', '$travel_date', $package_id, $number_of_people, $total_price)";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: edit_order.php"); // Redirect setelah update atau insert
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$packages = $conn->query("SELECT * FROM packages");
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pemesanan</title>
    
     <!-- css link -->
     <link rel="stylesheet" href="./assets/css/booking.css" />

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
            <h1>Form Pemesanan</h1>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo isset($order['id']) ? $order['id'] : ''; ?>">

                <div class="form-group">
                    <label for="customer_name">Nama</label>
                    <input type="text" id="customer_name" name="customer_name" value="<?php echo isset($order['customer_name']) ? $order['customer_name'] : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="phone_number">Nomor HP/Telepon</label>
                    <input type="text" id="phone_number" name="phone_number" value="<?php echo isset($order['phone_number']) ? $order['phone_number'] : ''; ?>" required>
                </div>

                <div class="date-container">
                    <div class="date-group">
                        <label for="booking_date">Tanggal Pesan</label>
                        <input type="date" id="booking_date" name="booking_date" value="<?php echo isset($order['booking_date']) ? $order['booking_date'] : ''; ?>" required>
                    </div>

                    <div class="date-group">
                        <label for="travel_date">Tanggal Perjalanan</label>
                        <input type="date" id="travel_date" name="travel_date" value="<?php echo isset($order['travel_date']) ? $order['travel_date'] : ''; ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="package_id">Pilih Paket Wisata</label>
                    <select id="package_id" name="package_id" required>
                        <?php while ($row = $packages->fetch_assoc()) { ?>
                            <option value="<?= $row['id'] ?>" data-price="<?= $row['price_per_person'] ?>" <?php echo (isset($order['package_id']) && $row['id'] == $order['package_id']) ? 'selected' : ''; ?>>
                                <?= $row['package_name'] ?> - Rp <?= number_format($row['price_per_person'], 0, ',', '.') ?> per orang
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="number_of_people">Jumlah Orang</label>
                    <input type="number" id="number_of_people" name="number_of_people" value="<?php echo isset($order['number_of_people']) ? $order['number_of_people'] : ''; ?>" min="1" required>
                </div>

                <div class="form-group">
                    <label for="price_per_person">Harga per Pax</label>
                    <input type="text" id="price_per_person" name="price_per_person" readonly value="<?php echo isset($order['price_per_person']) ? 'Rp ' . number_format($order['price_per_person'], 0, ',', '.') : 'Rp 0'; ?>">
                </div>

                <div class="form-group">
                    <label for="total_price">Total Pembayaran</label>
                    <input type="text" id="total_price" name="total_price" readonly value="<?php echo isset($order['total_price']) ? 'Rp ' . number_format($order['total_price'], 0, ',', '.') : 'Rp 0'; ?>">
                </div>

                <button class="btn" type="submit" onclick="return confirm('Yakin pesanan sudah benar?')">Pesan Sekarang</button>
                <button class="btn" type="button" onclick="window.location.href='edit_order.php'">Ke Halaman Edit</button>
            </form>
        </div>
    </main>
    <!-- JavaScript link -->
    <script src="./assets/js/script.js">
        document.addEventListener('DOMContentLoaded', function () {
            const packageSelect = document.getElementById('package_id');
            const numberOfPeopleInput = document.getElementById('number_of_people');
            const pricePerPersonInput = document.getElementById('price_per_person');
            const totalPriceInput = document.getElementById('total_price');

            function updatePrices() {
                const selectedOption = packageSelect.options[packageSelect.selectedIndex];
                const pricePerPerson = selectedOption.getAttribute('data-price');
                const numberOfPeople = numberOfPeopleInput.value;
                const totalPrice = pricePerPerson * numberOfPeople;

                pricePerPersonInput.value = pricePerPerson ? 'Rp ' + pricePerPerson.replace(/\B(?=(\d{3})+(?!\d))/g, ',') : 'Rp 0';
                totalPriceInput.value = numberOfPeople ? 'Rp ' + totalPrice.toFixed(0).replace(/\B(?=(\d{3})+(

    </script>
</body>
</html>
