<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .title>h2 {
            margin: 0px;
            padding: 0px;
        }

        .container {
            display: grid;
            grid-template-columns: 15% 75%;
            grid-gap: 3em;
        }

        p {
            margin: 0px;
            padding: 0px;
        }

        .kategori {
            display: none;
        }

        .cer-container {
            margin: 1em;
            grid-column: 1/2;
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        .kum-container {
            grid-column: 2/3;
            display: grid;
            grid-template-columns: 45% 45%;
            grid-gap: 1em;
        }

        .card {
            border: 1px solid black;
            padding: 4px;
            flex-grow: 1;
            min-width: 180px;
            flex-basis: 100px;
        }

        .card>h3 {
            text-align: center;
        }

        @media all and (max-width:1023px) {
            .title {
                text-align: center;
            }

            .container {
                grid-template-columns: 100%;
            }

            .ceritaku {
                order: 2;
            }

            .cer-container {
                display: grid;
                grid-template-columns: 45% 45%;
                grid-gap: 1em;
            }
        }

        @media all and (max-width:575px) {
            .container {
                grid-template-columns: 100%;
            }

            .title {
                text-align: center;
            }

            .kategori {
                display: block;
            }

            .cer-container {
                display: grid;
                grid-template-columns: 45% 45%;
                grid-gap: 1em;
            }

            .kumpulan {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="title">
        <h2>CERBUNG</h2>
        <p>Cerita Bersambung</p>
    </div>
    <br>

    <div class="kategori">
        Kategori: <br>
        <select name="kategori" id="kategori">
            <option value="ceritaku">Ceritaku</option>
            <option value="kumpulan">Kumpulan Cerita</option>
        </select>
    </div>

    <div class="container">
        <div class="ceritaku">
            <h2>Ceritaku</h2>
            <div class="cer-container">
                <div class="card">
                    <h3>Judul Cerita</h3>
                    <p>Jumlah Paragraf: 2</p>
                    <a href="">Baca Lebih Lanjut</a>
                </div>
                <div class="card">
                    <h3>Judul Cerita 2</h3>
                    <p>Jumlah Paragraf: 3</p>
                    <a href="">Baca Lebih Lanjut</a>
                </div>
            </div>
            <button id="btn1">Tampilkan cerita selanjutnya</button>
        </div>
        <div class="kumpulan">
            <h2>Kumpulan Cerita</h2>
            <div class="kum-container">
                <div class="card">
                    <h3>Judul Cerita</h3>
                    <p>Pemilik Cerita:</p>
                    <p>Jumlah Paragraf: 2</p>
                    <a href="">Baca Lebih Lanjut</a>
                </div>
                <div class="card">
                    <h3>Judul Cerita 2</h3>
                    <p>Pemilik Cerita:</p>
                    <p>Jumlah Paragraf: 3</p>
                    <a href="">Baca Lebih Lanjut</a>
                </div>
                <div class="card">
                    <h3>Judul Cerita</h3>
                    <p>Pemilik Cerita:</p>
                    <p>Jumlah Paragraf: 2</p>
                    <a href="">Baca Lebih Lanjut</a>
                </div>
                <div class="card">
                    <h3>Judul Cerita 2</h3>
                    <p>Pemilik Cerita:</p>
                    <p>Jumlah Paragraf: 3</p>
                    <a href="">Baca Lebih Lanjut</a>
                </div>
            </div>
            <button>Tampilkan cerita selanjutnya</button>
        </div>
    </div>

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>