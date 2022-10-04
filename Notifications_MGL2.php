<?php
require 'koneksi.php';
session_start();
date_default_timezone_set("Asia/Bangkok");
if (!isset($_SESSION["nama"])) {
    echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
    exit;
}
$limit = 10000;
$pagess = isset($_GET['page']) ? $_GET['page'] : 0;
$offset = ($pagess > 0 && $pagess != 1) ? ($pagess - 1) + 9999 : 0;
// var_dump($offset);die;
$count = mysqli_query($koneksi, "SELECT COUNT(*) as id FROM `datacon` WHERE tglout IS  NULL");
$res = mysqli_fetch_row($count);
$ceil = ceil($res[0] / 10000);
$filter = '';
$query2 = '';
if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
    $query = mysqli_query($koneksi, "select `dateout`,`tglout` from datacon where forwarder_id = '$filter' AND datacon.forwarder_id =3");
    $query2 = mysqli_query($koneksi, "select datacon.* , f.nama  from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id where forwarder_id = '$filter' AND datacon.forwarder_id =3 AND tglout IS NOT NULL AND TGLout2 IS NULL LIMIT $limit OFFSET $offset");
} else {
    $query = mysqli_query($koneksi, "select `dateout`,`tglout` from datacon WHERE datacon.forwarder_id =3");
    $query2 = mysqli_query($koneksi, "select datacon.* , f.nama  from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id AND datacon.forwarder_id =3 AND tglout IS NOT NULL AND TGLout2 IS NULL order by poo ASC limit $limit offset $offset ");
}


$sekarang    = date("Y-m-d");

// mengambil data dari database
$no    = 0;
while ($data    = mysqli_fetch_array($query)) {

    // menghitung jumlah hari keterlambatan dari tanggal jatuh tempo
    $kembali    = new DateTime($data['dateout']);
    $lambat        = new DateTime($data['tglout']);
    $diff    = $lambat->diff($kembali);
    $no++;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ATA SBI MGL</title>
    <link rel="stylesheet" href="asset/font-awesome.min.css">
    <link rel="icon" type="image/png" href="images/logosumi.png" />
    <script src="asset/jquery.min.js"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/notif2.css" rel="stylesheet" />
    <!--font awesome--->
    <link rel="stylesheet" type="text" href="css/all.css">
    <link rel="stylesheet" type="text" href="css/all.css">
    <link rel="stylesheet" href="asset/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <div id="page-content-wrapper">


        <div class="topnav">
            <a href="Appointment_Container.php" class="active">
                <img class="image" src="images/logosumi.png">
            </a>
            <div id="">
                <a class="nav-link" href="Notifications_MGL2.php"><strong>Notifications</strong></a>
                <a class="nav-link" href="Reporting_MGL.php"><strong>Reporting</strong></a>
                <a class="nav-link" href="logout.php" style="color: #FF0000"><strong>Logout</strong></a>

            </div>

        </div>



        <div class="txtbar1">
            <strong>
                <font size="5" face="Arial" color="#fff">&nbsp;Notifications MGL</font>
            </strong>
        </div>

        <br>

        <?php
        include "koneksi.php";
        $sekarang    = date("d-m-Y");
        ?>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date: </b><?php echo $sekarang ?></p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span id="jam" style="font-size:30"></span></b>
        <a class="btn btn-primary" href="Notifications_Container2.php" role="button">Yusen&Trancy</a> </select> <a class="btn btn-primary" href="Notifications_MGL2.php" role="button">MGL</a>




        <script type="text/javascript">
            window.onload = function() {
                jam();
            }

            function jam() {
                var e = document.getElementById('jam'),
                    d = new Date(),
                    h, m, s;
                h = d.getHours();
                m = set(d.getMinutes());
                s = set(d.getSeconds());

                e.innerHTML = h + ':' + m + ':' + s;

                setTimeout('jam()', 1000);
            }

            function set(e) {
                e = e < 10 ? '0' + e : e;
                return e;
            }
        </script>



        <tr>
            <div class="outer-wrapper">
                <div class="table-wrapper">

                    &nbsp;&nbsp;<table>
                        <thead>
                            <th rowspan="2"><b>Deadline Detention</b></th>
                            <th rowspan="2"><b>Deadline Demurrage</b></th>
                            <th rowspan="2"><b>ETA SIN</b></th>
                            <th rowspan="2"><b>ETA BTM</b></th>
                            <th rowspan="2"><b>ATA SBI</b></th>
                            <th rowspan="2"><b>Container No</b></th>
                            <th rowspan="2"><b>Invoice</b></th>
                            <th rowspan="2"><b>Forwarder</b></th>
                            <th rowspan="2"><b>Size</b></th>
                            <th rowspan="2"><b>Port Of Origin</b></th>
                            <th rowspan="2"><b>Place Lot</b></th>
                            <th rowspan="2"><b>Shifting to lot</b></th>
                            <th rowspan="2" bgcolor="#1A314B" style="color:white"><b>Detention</b></th>
                            <th rowspan="2" style="color:white"><b>SGD/Day</b></th>
                            <th rowspan="2" bgcolor="#1A314B" style="color:white"><b>Demurrage</b></th>
                            <th rowspan="2" style="color:white"><b>SGD/Day</b></th>
                            <th rowspan="2" style="color:white"><b>Shipping line</b></th>
                            <th rowspan="2" style="color:white"><b>Shipping to</b></th>
                            <th rowspan="2"><b>Action</b></th>
                        </thead>
        </tr>




        <?php
        include 'koneksi.php';
        $sekarang    = date("Y-m-d");
        $no = 1;
        function bgcolor($diffe, $lambat, $kembali2)
        {
            if ($lambat > $kembali2) {
                if ($diffe <= 2) {
                    return '#ff0000';
                } else if ($diffe <= 3) {
                    return '#ff0000';
                }
            }

            return 'FFF';
        }
        function lotcolor($lot)
        {
            if ($lot == 'Lot 7') {
                return '';
            }
            if ($lot == 'Lot 8') {
                return '';
            }
            if ($lot == 'Lot 206') {
                return '00ff00';
            }
            if ($lot == 'Lot 242') {
                return '00FF';
            }
            return 'FFF';
        }
        function secolor($section)
        {
            if ($section == 'Import') {
                return '00ff00';
            }
            if ($section == 'Export') {
                return '7F0DFF';
            }
            return 'FFF';
        }
        function dendasin($lambat, $kembali, $days, $size, $poo, $section)
        {
            if ($lambat < $kembali) {
                return 0;
            } else {
                if ($poo == 'Japan' && $section == 'Export') {
                    return ($days * (($size == 20) ? 50 : 70));
                }
                if ($poo == 'Empty') {
                    return ($days * (($size == 20) ? 50 : 75));
                }
                return ($days * (($size == 20) ? 50 : 100));
            }
        }
        function dendabtm($lambat, $kembali, $days, $size, $poo, $section)
        {
            if ($lambat < $kembali) {
                return 0;
            } else {
                if ($poo == 'Japan' && $section == 'Export') {
                    return ($days * (($size == 20) ? 50 : 70));
                }
                if ($poo == 'Empty') {
                    return ($days * (($size == 20) ? 50 : 75));
                }
                return ($days * (($size == 20) ? 30 : 50));
            }
        }
        function setdateout($poo, $section, $datein)
        {
            if ($poo == 'Japan' && $section == 'Export') {
                return date('Y-m-d', strtotime($datein . ' + 11 days'));
            }
            if ($poo == 'Empty') {
                return date('Y-m-d', strtotime($datein . ' + 4 days'));
            }
            return date('Y-m-d', strtotime($datein . ' + 11 days'));
        }
        function setdateout2($poo, $section, $datein)
        {
            if ($poo == 'Japan' && $section == 'Export') {
                return date('Y-m-d', strtotime($datein . ' + 11 days'));
            }
            if ($poo == 'Empty' ) {
                return date('Y-m-d', strtotime($datein . ' + 4 days'));
            }
            return date('Y-m-d', strtotime($datein . ' + 4 days'));
        }
        while ($data = mysqli_fetch_array($query2)) {
            $kembali    = new DateTime(setdateout($data['poo'], $data['section'], $data['datein']));
            $lambat     = new DateTime(date('Y-m-d H:i:s', (strtotime((date('Y-m-d', time())) . " 00:00:00"))));
            $kembali2    = ($data['section'] == 'Export') ? (new DateTime(setdateout2($data['poo'], $data['section'], $data['datein']))) : (new DateTime(setdateout2($data['poo'], $data['section'], $data['tglout'])));
            // $lambat2  =new DateTime(date('Y-m-d h:i:s',time()));
            $diff       = $lambat->diff($kembali);
            $diffd       = $lambat->diff($kembali2);

            //var_dump($kembali,$kembali2);die;
            // var_dump($lambat);
            // die();
            $no++;

            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            $dendasin = dendasin($lambat, $kembali, $diff->days, $data['size'], $data['poo'], $data['section']);
            $dendabtm = dendabtm($lambat, $kembali2, $diffd->days, $data['size'], $data['poo'], $data['section']);

            $diffs = 0;
            if ($dendasin > 0 || $dendabtm > 0) {
                if ($dendasin > 0) {
                    $diffs += $diff->days;
                }
                if ($dendabtm > 0) {
                    $diffs += $diffd->days;
                }
            }
        ?>


            <tr>
                <td style='background-color: <?= bgcolor($diff->days, $lambat,  setdateout($data['poo'], $data['section'], $data['datein'])) ?>;'><?= ($diff->days == 0) ? "Hari ini" : ((setdateout($data['poo'], $data['section'], $data['datein']) > date('Y-m-d', time())) ? ($diff->days . " Hari lagi ") : 'Telat' . $diff->days . 'Hari') ?></td>
                <td style='background-color: <?= bgcolor($diffd->days, $lambat, setdateout2($data['poo'], $data['section'], $data['datein'])) ?>;'><?= ($diffd->days == 0) ? "Hari ini" : ((setdateout2($data['poo'], $data['section'], $data['datein']) > date('Y-m-d', time())) ? ($diffd->days . " Hari lagi ") : 'Telat' . $diffd->days . 'Hari') ?></td>
                <td><?php echo date('d-m-Y', strtotime($data['datein'])); ?></td>
                <td><?php echo date('d-m-Y', strtotime($data['datein'] . ' + 4 days'));; ?></td>
                <td><?php echo date('d-m-Y', strtotime($data['tglout'])); ?></td>
                <td><?php echo $data['nocon']; ?></td>
                <td><?php echo $data['invoice']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['size']; ?></td>
                <td><?php echo $data['poo']; ?></td>
                <td style='color:#<?php echo lotcolor($data['loca']); ?>'><?php echo $data['loca']; ?></td>
                <td style='color:#<?php echo ($data['loca']); ?>'><?php echo ($data['section']  == 'Import') ? (($data['isempty'] == 0 || $data['isempty'] == NULL) ? 'Direct To' : 'Lot ' . $data['isempty']) : '-'; ?></td>
                <td><?php echo date('d-m-Y', strtotime($data['dateout'])) ?></td>
                <td><?php echo $dendasin . ' SGD' ?></td>
                <td><?php echo date('d-m-Y', strtotime($data['dateout2'])) ?></td>
                <td><?php echo $dendabtm . ' SGD' ?></td>
                <td style='background-color:#<?php echo secolor($data['section']); ?>'><?php echo $data['section']; ?></td>
                <td><?php echo $data['shipment']; ?></td>

                <td>

                    <a href="aksiconrepot3.php?id=<?= $data['id']; ?> ">
                        <button type="button" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                <path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm-7.933 13.481-3.774-3.774 1.414-1.414 2.226 2.226 4.299-5.159 1.537 1.28-5.702 6.841z"></path>
                            </svg>
                        </button></a>


                    <button type="button" id="buttons" onclick="change(this)" data-section="<?= $data['section']; ?>" data-etasin="<?= $data['datein']; ?>" data-poo="<?= $data['poo']; ?>" data-id="<?= $data['id']; ?>" data-nocon="<?= $data['nocon']; ?>" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);">
                            <path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zM8.999 17H7v-1.999l5.53-5.522 1.999 1.999L8.999 17zm6.473-6.465-1.999-1.999 1.524-1.523 1.999 1.999-1.524 1.523z"></path>
                        </svg>
                    </button>

                    <button type="button" id="buttons" onclick="empty(this)" data-id="<?= $data['id']; ?>" data-nocon="<?= $data['nocon']; ?>" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                            <circle cx="12" cy="12" r="4"></circle>
                            <path d="M13 4.069V2h-2v2.069A8.01 8.01 0 0 0 4.069 11H2v2h2.069A8.008 8.008 0 0 0 11 19.931V22h2v-2.069A8.007 8.007 0 0 0 19.931 13H22v-2h-2.069A8.008 8.008 0 0 0 13 4.069zM12 18c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z"></path>
                        </svg>
                    </button>
                </td>



            <?php
        }

            ?>

            </table>



            </tr>

    </div>


    <div class="input">
        <form action="editsinbtm1.php" name="formContainer" method="post" onsubmit="return validateForm()">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Container Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" hidden>
                                <label for="inputNoContainer">poo</label>
                                <input type="text" name="poo" class="form-control" id="poo" placeholder="" hidden>
                            </div>
                            <div class="form-group" hidden>
                                <label for="inputNoContainer">section</label>
                                <input type="text" name="section" class="form-control" id="section" placeholder="" hidden>
                            </div>
                            <div class="form-group" hidden>
                                <label for="inputNoContainer">datein</label>
                                <input type="text" name="etasin" class="form-control" id="etasin" placeholder="" hidden>
                            </div>
                            <div class="form-group" hidden>
                                <label for="inputNoContainer">id</label>
                                <input type="text" name="id" class="form-control" id="idcon" placeholder="" hidden>
                            </div>
                            <div class="form-group">
                                <label for="inputDateIn">ATA SBI</label>
                                <input type="date" name="datein" class="form-control" id="inputDateIn" placeholder="Select a Date">
                            </div>

                            <div class="modal-footer">

                                <input type="submit" class="btn btn-primary" value="Update">
                                <input type="Reset" class="btn btn-secondary" value="Reset">
                                <!-- <a href="Appointment_Container.php" class="btn btn-danger" role="button">Back</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    <div class="input">
        <form action="emptyreturn1.php" name="formContainer" method="post" onsubmit="return validateForm()">


            <!-- Modal -->
            <div class="modal fade" id="emptyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Container Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" hidden>
                                <label for="inputNoContainer">id</label>
                                <input type="text" name="id" class="form-control" id="ids" placeholder="" hidden>
                            </div>
                            <div class="form-group">
                                <label for="selectLocation">Location</label>
                                <select class="form-control" id="selectLocation" name="loca">
                                    <option selected>Choose...</option>
                                    <option value='7'>Lot 7</option>
                                    <option value='8'>Lot 8</option>
                                    <option value='0'>Direct to</option>
                                    <option value='-'>-</option>
                                </select>
                            </div>


                            <div class="modal-footer">

                                <input type="submit" class="btn btn-primary" value="Update">
                                <input type="Reset" class="btn btn-secondary" value="Reset">
                                <!-- <a href="Appointment_Container.php" class="btn btn-danger" role="button">Back</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="page1">
        <nav aria-label="Page1 navigation example">
            <ul class="pagination">
                <li class="page-item">

                    <?php if (isset($_GET['page'])) {
                        if ($_GET['page'] != 1) {
                    ?>
                            <a class="page-link" href="?page=<?= $_GET['page'] - 1; ?>" tabindex="-1">Previous</a>
                    <?php }
                    } ?>
                </li>
                <?php if (isset($_GET['page'])) {
                    $page = (int) $_GET['page'];
                    for ($i = $page; $i <= ($page + 2); $i++) {
                        if ($i == $ceil) {
                            break;
                        }
                ?>
                        <a class="page-link" href="?page=<?= $i ?>" tabindex="-1"><?= $i ?></a>
                    <?php }
                    ?>
                <?php }
                $pages = $_GET['page'] ?? 1;
                if ($pages != $ceil) {
                ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $pages + 1 ?>">Next</a>
                    </li>

                <?php }
                ?>
            </ul>
        </nav>
    </div>




    <div class="footer" style="background-color: #1A314B;">
        <center>
            <p class="text-white"><Strong>©2022 Sumitomo Wiring System Batam Indonesia</Strong></p>
        </center>
    </div>



    <!-- Bootstrap core JS-->
    <script src="asset/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- fontawesome-->
    <script src="js/main.js"></script>
    <script>
        function change(event) {
            // console.log($(event).attr("data-id"));
            document.getElementById("idcon").value = $(event).attr("data-id");
            document.getElementById("poo").value = $(event).attr("data-poo");
            document.getElementById("section").value = $(event).attr("data-section");
            document.getElementById("etasin").value = $(event).attr("data-etasin");

            $('#exampleModal').modal('show');
        }

        function empty(event) {
            // console.log($(event).attr("data-id"));
            document.getElementById("ids").value = $(event).attr("data-id");

            $('#emptyModal').modal('show');
        }


        function filter() {
            var x = document.getElementById("dynamic_select").value;

            window.location = x; // redirect
        }



        // $( "#buttons" ).click(function() {
        //     console.log($(this).attr('data-id'));

        // });
    </script>


</body>

</html>