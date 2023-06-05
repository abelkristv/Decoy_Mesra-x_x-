<!DOCTYPE html>
<?php

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light border-bottom-3 bg-primary sticky-md-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="./dasbor.php">
                <img src="https://www.kemdikbud.go.id/main/addons/shared_addons/themes/november_theme/img/kemdikbud_64x64.png"
                    alt="" width="60" height="60" class="d-inline-block ">
                TK Tadika Mesra | Monitoring System
            </a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-2 bg-secondary flex-column nav-side d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <a href="./dasbor.php#" class="dasbor nav-side-item  mt-5 ms-3" style="display: block;">
                        <img src="images/dasbor.png" alt="" width="30px" , height="30px">
                        Dasbor
                    </a>
                    <a href="./Mapel.php#" class="mapel nav-side-item  mt-2 ms-3" style="display: block;">
                        <img src="images/courses.png" alt="" width="30px" height="30px">
                        Courses
                    </a>
                    <a href="./Transaksi.php#" class="transaksi nav-side-item  mt-2 ms-3" style="display: block;">
                        <img src="images/transaction.png" alt="" width="30px" height="30px">
                        Buku Penghubung
                    </a>
                </div>
                <a href="./logout.php#" class=" nav-side-item mt-2 ms-3 mb-5 pb-5" style="display: block;">
                    <img src="images/logout.png" alt="" width="30px" height="30px">
                    Logout
                </a>
            </nav>
            <!-- CONTENT START -->
            <?php function OpenCon(){
                    $dbhost = "localhost"; $dbuser = "root"; $dbpass = "";
                    $db_name = "database_tk";
                    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db_name) or die("Connect failed: %s\n". $conn -> error);
                    return $conn;}$conn = OpenCon();?>

            <?php 
            $ID = $_SESSION['ID_Siswa'];
            $sql = 

                "
                    SELECT Siswa.ID_Siswa, Siswa.Nama_Siswa, Kelas.Nama_Kelas, Guru.Nama_Guru
                    FROM Siswa
                    JOIN Kelas ON Siswa.ID_Kelas = Kelas.ID_Kelas
                    JOIN Guru ON Kelas.ID_Guru = Guru.ID_Guru
                    WHERE Siswa.ID_Siswa = '$ID'
                ";
                 $result = mysqli_query($conn, $sql);
                 $data = mysqli_fetch_array($result);
            ?>
            <div class="col-10 main-content">
                <div class="row">
                    <div class="col-3 me-5 container-image">
                        <img src="images/neko.png" alt="" width="300px" height="300px" id="profile" class="mt-3 ms-3">
                    </div>
                    <?php 
                        echo '
                        <div class="col-8 container-text mt-3 p-3">
                                    <h1>Name : '.$data['Nama_Siswa'].'</h1>
                                    <hr>
                                    <p>ID_Siswa : '.$data['ID_Siswa'].'</p>
                                    <p>Kelas : '.$data['Nama_Kelas'].'</p>
                                    <p>Wali_Kelas : '.$data['Nama_Guru'].'</p>
                                </div>
                        ';
                        mysqli_close($conn);
                    ?>
                </div>
                <br>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA?3yGxIOqMEjwtxJY7qPCqsdltbNJuaOe923Mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>
