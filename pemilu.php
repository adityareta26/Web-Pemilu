<?php
require_once "function/function.php";
session_start();
if (!isset($_SESSION['status'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilu Pub 2021</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .kandidat-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .kandidat {
            background: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 300px;
            margin: 10px;
            padding: 5px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .kandidat:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .kandidat img {
            width: 100%;
            height: auto;
            border-radius: 50%;
        }
        .kandidat h3 {
            margin: 10px 0;
        }
        .kandidat .visi-misi {
            text-align: left;
            margin-top: 10px;
        }
        .kandidat ul {
            padding: 0;
            list-style-type: none;
            margin: 5px 0;
        }
        .kandidat li {
            font-size: 0.9em;
            color: #555;
            margin: 5px 0;
        }
        .button-container {
            text-align: center; /* Memusatkan tombol */
            margin-top: 20px; /* Jarak atas untuk pemisahan */
        }
        button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            font-size: 1em;
            font-weight: bold;
        }
        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        button:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <h2>Selamat Datang, <?php echo $_SESSION['nama'];?></h2>
    
    <form action="suara.php" method="post" id="form-pemilu">
        <div class="kandidat-container">
            <div class="kandidat" data-value="1">
                <img src="assets/gambar/1.jpg" alt="Moh Afkarul Haq">
                <h3>Moh Afkarul Haq</h3>
                <div class="visi-misi">
                    <p><strong>Visi:</strong></p>
                    <ul>
                        <li>Mewujudkan perubahan positif.</li>
                    </ul>
                    <p><strong>Misi:</strong></p>
                    <ul>
                        <li>1. Meningkatkan partisipasi pemuda.</li>
                        <li>2. Menyediakan platform untuk aspirasi mahasiswa.</li>
                        <li>3. Memberdayakan komunitas lokal.</li>
                    </ul>
                </div>
            </div>
            <div class="kandidat" data-value="2">
                <img src="assets/gambar/22.JPG" alt="Habib Jannata">
                <h3>Habib Jannata</h3>
                <div class="visi-misi">
                    <p><strong>Visi:</strong></p>
                    <ul>
                        <li>Membangun komunitas yang inklusif.</li>
                    </ul>
                    <p><strong>Misi:</strong></p>
                    <ul>
                        <li>1. Memperkuat kerjasama antar mahasiswa.</li>
                        <li>2. Mendorong dialog antara berbagai organisasi.</li>
                        <li>3. Meningkatkan akses informasi untuk semua.</li>
                    </ul>
                </div>
            </div>
        </div>
        <input type="hidden" name="kandidat" id="kandidat-input" required>
        <div class="button-container">
            <button type="submit" name="pilih" value='pilih'>Konfirmasi</button>
        </div>
    </form>    

    <script>
        const kandidatElements = document.querySelectorAll('.kandidat');
        const kandidatInput = document.getElementById('kandidat-input');

        kandidatElements.forEach(element => {
            element.addEventListener('click', () => {
                const value = element.getAttribute('data-value');
                kandidatInput.value = value; 
                kandidatElements.forEach(el => el.style.border = "none");
                element.style.border = "2px solid #007bff";
            });
        });
    </script>
</body>
</html>
