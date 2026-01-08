<?php
// Example packages (you can fetch these from your database)
// $packages = [
//     ['id' => 1, 'name' => 'Bronze Package', 'price' => 5000],
//     ['id' => 2, 'name' => 'Silver Package', 'price' => 10000],
//     ['id' => 3, 'name' => 'Gold Package', 'price' => 15000],
//     ['id' => 4, 'name' => 'Platinum Package', 'price' => 20000],
// ];

// Fetch packages from the database
$packages = $this->db->query("SELECT * FROM packages")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select a Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .package-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .package-card:hover {
            transform: translateY(-5px);
        }

        .package-card h5 {
            margin: 15px 0;
        }

        .package-card button {
            background-color: #2b25c4;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .package-card button:hover {
            background-color: #1a1a8c;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Select a Package</h2>
        <div class="row gy-4">
            <?php foreach ($packages as $package) : ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="package-card">
                        <h5><?= htmlspecialchars($package['name']) ?></h5>
                        <p>Price: ₦<?= number_format($package['price'], 2) ?></p>
                        <form method="POST" action="<?= BURL ?>payments/make_payments_action">
                            <input type="hidden" name="package_id" value="<?= $package['pid'] ?>">
                            <input type="hidden" name="price" value="<?= $package['price'] ?>">
                            <button type="submit">Select Package</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>