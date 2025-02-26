<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Dashboard - Chameleon Admin - Modern Bootstrap 4 WebApp & Dashboard HTML Template + UI Kit</title>
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/vendors/css/charts/chartist.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <script>
        const selectedGenres = new Set(); // Menggunakan Set untuk mencegah duplikasi function addGenre()

        function addGenre() {
            const genreSelect = document.getElementById('genreSelect');
            const selectedValue = genreSelect.value;

            if (selectedValue && !selectedGenres.has(selectedValue)) {
                selectedGenres.add(selectedValue);

                // Menambahkan genre ke daftar tampilan
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
                listItem.textContent = selectedValue;

                // Tombol untuk menghapus genre
                const removeBtn = document.createElement('button');
                removeBtn.className = 'btn btn-sm btn-danger';
                removeBtn.textContent = 'Hapus';
                removeBtn.onclick = () => {
                    selectedGenres.delete(selectedValue);
                    listItem.remove();
                    updateHiddenInput();
                };
                listItem.appendChild(removeBtn);
                document.getElementById('selectedGenres').appendChild(listItem);

                // Memperbarui input tersembunyi
                updateHiddenInput();
            }
            // Reset pilihan dropdown
            genreSelect.value = '';
        }

        function updateHiddenInput() {
            document.getElementById('genreInput').value =
                Array.from(selectedGenres).join(',');
        }
    </script>
    <!-- fixed-top-->
    <?php
    include 'components/navbar.php'
    ?>

    <div class="app-content content" style="margin-top: 20px;">
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Menu Akun Admin -->
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Data Film</h4>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahFilmModal">Tambah Film</button>
                    </div>

                    <?php
                    // Periksa koneksi
                    include '../koneksi.php';
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Ambil data dari tabel film
                    $sql = "SELECT * FROM film";
                    $result = $conn->query($sql);
                    ?>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="filmTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Poster</th>
                                        <th>Nama Film</th>
                                        <th>Deskripsi</th>
                                        <th>Genre</th>
                                        <th>Total Menit</th>
                                        <th>Usia</th>
                                        <th>Dimensi</th>
                                        <th>Producer</th>
                                        <th>Director</th>
                                        <th>Writer</th>
                                        <th>Cast</th>
                                        <th>Distributor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; // Nomor urut
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                    <td>{$no}</td>
                                    <td><img src='../{$row['poster']}' alt='poster' width='100'></td>
                                    <td>{$row['nama_film']}</td>
                                    <td>{$row['judul']}</td>
                                    <td>{$row['genre']}</td>
                                    <td>{$row['total_menit']}</td>
                                    <td>{$row['usia']}</td>
                                    <td>{$row['dimensi']}</td>
                                    <td>{$row['Producer']}</td>
                                    <td>{$row['Director']}</td>
                                    <td>{$row['Writer']}</td>
                                    <td>{$row['Cast']}</td>
                                    <td>{$row['Distributor']}</td>
                                </tr>";
                                            $no++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='13' class='text-center'>Tidak ada data</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal Tambah Film -->

                    <!-- Modal Tambah Film -->
                    <div class="modal fade" id="tambahFilmModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Tambah Film</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="../proses_input.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="poster">Upload Poster</label>
                                            <input type="file" class="form-control-file" id="poster" name="poster" accept="image/*" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_film">Nama Film</label>
                                            <input type="text" class="form-control" id="nama_film" name="nama_film" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="genre">Genre</label>
                                            <select id="genreSelect" class="form-control">
                                                <option value="" disabled selected>Pilih Genre</option>
                                                <option value="Action">Action</option>
                                                <option value="Adventure">Adventure</option>
                                                <option value="Animation">Animation</option>
                                                <option value="Biography">Biography</option>
                                                <option value="Comedy">Comedy</option>
                                                <option value="Crime">Crime</option>
                                                <option value="Disaster">Disaster</option>
                                                <option value="Documentary">Documentary</option>
                                                <option value="Drama">Drama</option>
                                                <option value="Epic">Epic</option>
                                                <option value="Erotic">Erotic</option>
                                                <option value="Experimental">Experimental</option>
                                                <option value="Family">Family</option>
                                                <option value="Fantasy">Fantasy</option>
                                                <option value="Film-Noir">Film-Noir</option>
                                                <option value="History">History</option>
                                                <option value="Horror">Horror</option>
                                                <option value="Martial Arts">Martial Arts</option>
                                                <option value="Music">Music</option>
                                                <option value="Musical">Musical</option>
                                                <option value="Mystery">Mystery</option>
                                                <option value="Political">Political</option>
                                                <option value="Psychological">Psychological</option>
                                                <option value="Romance">Romance</option>
                                                <option value="Sci-Fi">Sci-Fi</option>
                                                <option value="Sport">Sport</option>
                                                <option value="Superhero">Superhero</option>
                                                <option value="Survival">Survival</option>
                                                <option value="Thriller">Thriller</option>
                                                <option value="War">War</option>
                                                <option value="Western">Western</option>
                                            </select>
                                            <button type="button" class="btn btn-primary mt-2" onclick="addGenre()">Tambah</button>
                                            <ul id="selectedGenres" class="list-group mt-3"></ul>
                                            <input type="hidden" id="genreInput" name="genre">
                                        </div>
                                        <div class="form-group">
                                            <label for="banner">Upload Banner</label>
                                            <input type="file" class="form-control-file" id="banner" name="banner" accept="image/*" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="menit">Total Menit</label>
                                            <input type="number" class="form-control" id="menit" name="menit" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="usia">Usia</label>
                                            <select class="form-control" id="usia" name="usia" required>
                                                <option value="" disabled selected>Pilih Usia</option>
                                                <option value="13">13</option>
                                                <option value="17">17</option>
                                                <option value="SU">SU</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="trailer">Upload Trailer</label>
                                            <input type="file" class="form-control-file" id="trailer" name="trailer" accept="video/*">
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Deskripsi</label>
                                            <input type="text" class="form-control" id="judul" name="judul" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="dimensi">Dimensi</label>
                                            <select class="form-control" id="dimensi" name="dimensi" required>
                                                <option value="" disabled selected>Pilih Dimensi</option>
                                                <option value="2D">2D</option>
                                                <option value="3D">3D</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="producer">Producer</label>
                                            <input type="text" class="form-control" id="producer" name="producer" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="director">Director</label>
                                            <input type="text" class="form-control" id="director" name="director" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="writer">Writer</label>
                                            <input type="text" class="form-control" id="writer" name="writer" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cast">Cast</label>
                                            <input type="text" class="form-control" id="cast" name="cast" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="distributor">Distributor</label>
                                            <input type="text" class="form-control" id="distributor" name="distributor" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga Per Tiket</label>
                                            <input type="number" class="form-control" id="harga" name="harga" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
                                </div>
        <?php
        include 'components/footer.php'
        ?>


        <!-- BEGIN VENDOR JS-->
        <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
        <script src="theme-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN CHAMELEON  JS-->
        <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
        <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
        <!-- END CHAMELEON  JS-->
        <!-- BEGIN PAGE LEVEL JS-->
        <script src="theme-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL JS-->
</body>
<script>
    // Menampilkan SweetAlert setelah mengirim OTP
    <?php if (isset($otp_sent) && $otp_sent): ?>
        Swal.fire({
            title: 'OTP Terkirim!',
            text: 'Kode OTP telah dikirim ke email Anda.',
            icon: 'success',
            confirmButtonText: 'OK'

        }).then((result) => {
            if (result.isConfirmed) {
                var myModal = new bootstrap.Modal(document.getElementById('tambahAkunModal'));
                myModal.show();
            }
        });
    <?php endif; ?>

    // // Menampilkan SweetAlert setelah pendaftaran berhasil
    <?php if (isset($registration_success) && $registration_success): ?>
        Swal.fire({
            title: 'Pendaftaran Berhasil!',
            text: 'Anda telah berhasil mendaftar. Silakan masuk.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            // Mengarahkan pengguna ke register.php setelah menekan OK
            window.location.href = 'akun_admin.php'; // Ganti dengan path yang sesuai
        });
    <?php endif; ?>
</script>

</html>