<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scan Tiket</title>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            text-align: center;
        }

        #reader {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        #manual-input {
            margin-top: 30px;
        }

        input[type="text"] {
            padding: 10px;
            width: 250px;
            font-size: 16px;
        }

        button {
            padding: 10px 15px;
            font-size: 16px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <h2>🎟️ Scan Tiket Anda</h2>

    <!-- QR Reader -->
    <div id="reader"></div>

    <!-- Manual Input -->
    <div id="manual-input">
        <p>Atau masukkan Order ID secara manual:</p>
        <input type="text" id="manualOrderId" placeholder="Masukkan Order ID">
        <button onclick="goToPrint()">Cari Tiket</button>
    </div>

    <script>
        // Start QR Code Reader
        window.addEventListener('load', function () {
            const html5QrCode = new Html5Qrcode("reader");

            html5QrCode.start(
                { facingMode: "environment" },
                {
                    fps: 10,
                    qrbox: 250
                },
                (decodedText, decodedResult) => {
                    // QR berhasil discan
                    console.log("QR scanned: ", decodedText);
                    html5QrCode.stop().then(() => {
                        window.location.href = `print.php?order_id=${encodeURIComponent(decodedText)}`;
                    });
                },
                (errorMessage) => {
                    // Error scanning, bisa diabaikan atau ditampilkan
                    // console.log(`QR Scan error: ${errorMessage}`);
                }
            ).catch((err) => {
                console.error("Camera start error: ", err);
                alert("Tidak bisa mengakses kamera.");
            });
        });

        // Manual Input Redirect
        function goToPrint() {
            const orderId = document.getElementById("manualOrderId").value.trim();
            if (orderId !== "") {
                window.location.href = `print.php?order_id=${encodeURIComponent(orderId)}`;
            } else {
                alert("Masukkan Order ID terlebih dahulu.");
            }
        }

        // Enter key support
        document.getElementById("manualOrderId").addEventListener("keydown", function (e) {
            if (e.key === "Enter") {
                goToPrint();
            }
        });
    </script>
</body>
</html>
