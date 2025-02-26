<?php
include 'koneksi.php';

// mengambil ID film dari url
$id_film = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mengambil data film berdarkan id
$sql = "SELECT * FROM film WHERE id =?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_film);
$stmt->execute();
$result = $stmt->get_result();

// memeriksa apakah file ditemukan
if ($result->num_rows > 0) {
    $film = $result->fetch_assoc();
} else {
    // jika film tidak ditemykan bisa redirect atau tampilkan pesan
    echo "Film tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Industro - Movie Details</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        body {
            padding: 20px;
        }

        .movie-info {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .movie-info img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }

        .movie-details {
            flex: 1;
        }

        .btn-custom {
            background-color: rgb(0, 15, 181);
            color: white;
            margin-bottom: 10px;
        }

        .btn-custom:hover {
            background-color: rgb(0, 15, 181);
        }

        @media (max-width: 768px) {
            .movie-info {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .movie-details {
                max-width: 100%;
            }
        }
    </style>

</head>

<body>
    <?php 
    include 'components/navbar.php'; 
    ?>

    <div class="container">
        <div class="d-flex align-items-center mb-3">
            <div class="bg-success text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px;">
                <span class="fw-bold"><?php echo $film['usia']; ?></span>
            </div>
            <div class="ms-3">
                <h5 class="mb-0"><?php echo $film['nama_film']; ?></h5>
                <p class="text-muted mb-0"><?php echo $film['genre']; ?></p>
            </div>
        </div>

        <div class="row movie-info">
            <div class="col-md-4 text-center">
                <img class="img-fluid rounded" alt="Poster" src="<?php echo $film['poster']; ?>" />
            </div>

            <div class="col-md-8 movie-details">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-clock me-2"></i>
                    <span><?php echo $film['total_menit']; ?> Minutes</span>
                </div>
                <div class="mb-3">
                    <button class="btn btn-outline-secondary me-2"><?php echo $film['dimensi']; ?></button>
                </div>
                <div class="mb-3">
                    <button class="btn btn-custom w-100" onclick="window.location.href='jadwal.php?id=<?php echo $film['id']; ?>'">Buy Ticket</button>
                    <button class="btn btn-custom w-100" data-bs-toggle="modal" data-bs-target="#trailerModal">Watch Trailer</button>
                </div>
                <p> <?php echo $film['judul']; ?></p>
                <p><strong>Producer:</strong> <?php echo $film['Producer']; ?></p>
                <p><strong>Director:</strong> <?php echo $film['Director']; ?></p>
                <p><strong>Writer:</strong> <?php echo $film['Writer']; ?></p>
                <p><strong>Cast:</strong> <?php echo $film['Cast']; ?></p>
                <p><strong>Distributor:</strong> <?php echo $film['Distributor']; ?></p>
            </div>
        </div>
    </div>

    <!-- Trailer Modal -->
    <div class="modal fade" id="trailerModal" tabindex="-1" aria-labelledby="trailerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="trailerModalLabel">Movie Trailer: <?php echo $film['nama_film']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <video width="100%" controls>
                        <source src="<?php echo $film['trailer']; ?>" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>

    <?php 
    include 'components/footer.php'; 
    ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-lg-square rounded-circle back-to-top" style="background-color: #003366; border-color: #003366; color: white;">
        <i class="bi bi-arrow-up"></i>
    </a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <script src="js/main.js"></script>
</body>

</html>