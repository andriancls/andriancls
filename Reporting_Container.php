<?php
require 'koneksi.php';
session_start();
date_default_timezone_set("Asia/Bangkok");

if (!isset($_SESSION["nama"])) {
    echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reporting Container</title>
    <link rel="icon" type="image/png" href="images/logosumi.png" />
    <script src="asset/jquery.min.js"></script>
    <link rel="stylesheet" href="asset/font-awesome.min.css">
    <!-- Favicon-->

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/style3.css" rel="stylesheet" />
    <!--font awesome--->
    <link rel="stylesheet" type="text" href="css/all.css"><link rel="stylesheet" href="asset/bootstrap-icons.css">

</head>

<body>
    
    <div id="page-content-wrapper">
       

        <div class="topnav">
            <a href="Appointment_Container.php" class="active">
                <img class="image" src="images/logosumi.png" >
                    </a>
                <div id=" ">
                <a class="nav-link" href="Appointment_Container.php"><strong>Appointment</strong></a>
                <a class="nav-link" href="Notifications_Container2.php"><strong>Notifications</strong></a>
                <a class="nav-link" href="Reporting_Container.php"><strong>Reporting</strong></a>
                <a class="nav-link" href="logout.php" style="color: #FF0000"><strong>Logout</strong></a>


        </div>
        
    </div>


    
    <div class="txtbar1">
        <strong>
            <font size="5" face="Arial" color="#fff">&nbsp;Reporting Yusen&Trancy</font>
        </strong>
    </div>

    <br>
    <?php
    include "koneksi.php";
    $sekarang    = date("d-m-Y");
    ?>
    
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date: </b><?php echo $sekarang ?></p> 

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span id="jam" style="font-size:20"></span></b>
    
    
    &nbsp;<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari No.Container" title="Type in a name">   <select id="dynamic_select" onchange="filter()">
            <option selected>Choose Forwarder</option>
            <?php
            $datas = mysqli_query($koneksi, "select * from forwarder");
            while ($d = mysqli_fetch_array($datas)) {
            ?>
                <option value="Reporting_Container.php?filter=<?= $d['id'] ?><?php echo isset($_GET['start']) ? '&start='.$_GET['start'].'&end='.$_GET['end'] : ''; ?>"><?= $d['nama'] ?></option>
            <?php
            }
            ?>
        </select>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <br>
                                        <label>From Date</label>
                                        <input type="date" name="start" required="required ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <br>
                                        <label>To Date</label>
                                        <input type="date" name="end" required="required ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <div class="form-group">
                                         <br>
                                      <button type="submit" class="btn btn-primary" >Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php 
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    
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

    
        <thead>
    <tr bgcolor="#1A314B">
        <div class="outer-wrapper">
            <div class="table-wrapper">
                &nbsp;&nbsp;<table id="myTable">
                    <th rowspan="2"><b>Container No</b></th>
                    <th rowspan="2"><b>ETA SIN</b></th>
                    <th rowspan="2"><b>ETA BTM</b></th>
                    <th rowspan="2"><b>ATA SBI</b></th>
                    <th rowspan="2"><b>Return</b></th>
                    <th rowspan="2"><b>Forwarder</b></th>
                    <th rowspan="2"><b>Size</b></th>
                    <th rowspan="2"><b>Port Of Origin</b></th>
                    <th rowspan="2"><b>Place Lot</b></th>
                        <th rowspan="2" bgcolor="#1A314B" style="color:white"><b>Detention</b></th>
                        <th  rowspan="2" bgcolor="#00800" style="color:white"><b>SGD/Day</b></th>
                        <th rowspan="2" bgcolor="#1A314B" style="color:white"><b>Demurrage</b></th>
                        <th rowspan="2" bgcolor="#00800" style="color:white"><b>SGD/Day</b></th>
                        <th rowspan="2" bgcolor="#00800" style="color:white"><b>Shipping line</b></th>
                        <th rowspan="2"><b>Total Stay</b></th>
                        <th rowspan="2"><b>Total Charge</b></th>
                        <th rowspan="2"><b>Action</b></th>
                        
            </thead>
                        




                   
                    <tbody>
                    <?php
                        include 'koneksi.php';
                        $no = 1;
                        $totaldetention = 0;
                        $totaldemurrage = 0;
                        function bgcolor($lot)
                        {
                            if ($lot== 'Lot 7') {
                                return '';
                            }
                            if ($lot== 'Lot 8') {
                                return '';
                            }
                            if ($lot== 'Lot 206') {
                                return '50BB25';
                            }
                            if ($lot== 'Lot 242') {
                                return '0000ff';
                            }
                            return 'FFF';
                        }
                        function secolor($section)
                        {
                            if ($section== 'Import') {
                                return '00ff00';
                            }
                            if ($section== 'Export') {
                                return '7F0DFF';
                            }
                            return 'FFF';
                        }
                        $totalcontainer = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL');
                        $totalpoothailand = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL AND poo="Thailand"');
                        $totalpoophilipina = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL AND poo="Philipin"');
                        $totalpoovietnam = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL AND poo="Vietnam"');
                        $totalpoosingapore = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL AND poo="Singapore"');
                        $totalpoosurabaya = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL AND poo="Surabaya"');
                        $totalpoojakarta = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL AND poo="Jakarta"');
                        $totalpoojapan = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL AND poo="Japan"');
                        $totalsize20 = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL AND size="20"');
                        $totalsize40 = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL AND size="40"');

                        $limit = 10000;
                        $pagess = isset($_GET['page']) ? $_GET['page'] : 0;
                        $offset = ($pagess > 0 && $pagess != 1) ? ($pagess - 1) + 9999 : 0;
                        // var_dump($offset);die;
                        $count = mysqli_query($koneksi, "SELECT COUNT(*) as id FROM `datacon` WHERE tglout IS NOT NULL AND datacon.forwarder_id !=3");
                        $res = mysqli_fetch_row($count);
                        $ceil = ceil($res[0] / 10000);
                        $filter = '';
                        $query2 = '';
                        $data = mysqli_query($koneksi, "select datacon.* , f.nama  from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id  AND datacon.forwarder_id !=3 AND tglout IS NOT NULL AND tglout2 IS NOT NULL order by poo ASC ;");
                        if($_POST || $_GET){
                            if (isset($_GET['filter']) && !isset($_GET['start'])) {
                                $filter = $_GET['filter'];
                                //$query = mysqli_query($koneksi, "select `dateout`,`tglout` from datacon where forwarder_id = '$filter'");
                                $data = mysqli_query($koneksi, "select datacon.* , f.nama  from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id where forwarder_id = '$filter' AND tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL order by poo ASC LIMIT $limit OFFSET $offset");
                               
                                $totalcontainer = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND forwarder_id='$filter'");
                                $totalpoothailand = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Thailand' AND forwarder_id='$filter'");
                                $totalpoophilipina = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Philipin' AND forwarder_id='$filter'");
                                $totalpoovietnam = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Vietnam' AND forwarder_id='$filter'");
                                $totalpoosingapore = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Singapore' AND forwarder_id='$filter'");
                                $totalpoosurabaya = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Surabaya' AND forwarder_id='$filter'");
                                $totalpoojakarta = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Jakarta' AND forwarder_id='$filter'");
                                $totalpoojapan = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Japan' AND forwarder_id='$filter'");
                            }
                            if (isset($_GET['start']) && !isset($_GET['filter'])) {
                                $start = $_GET['start'];
                                $end = $_GET['end']." 23:59:59";
                                // var_dump($_POST);die;
                                $data = mysqli_query($koneksi, "select datacon.* , f.nama   from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id  AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND tglout IS NOT NULL AND tglout2 IS NOT NULL AND tglout2 BETWEEN '$start' AND '$end' order by POO ASC;");
                                $totalcontainer = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL  AND datacon.forwarder_id !=3 AND  tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoothailand = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Thailand' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoophilipina = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Philipin' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoovietnam = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Vietnam' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoosingapore = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Singapore' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoosurabaya = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Surabaya' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoojakarta = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Jakarta' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoojapan = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Japan' AND tglout2 BETWEEN '$start' AND '$end'");
                            }
                            if (isset($_GET['start']) && isset($_GET['filter'])) {
                                // var_dump('disini3'); die;
                                $start = $_GET['start']; $filter = $_GET['filter'];
                                $end = $_GET['end']." 23:59:59";
                                // var_dump($_POST);die;
                                $data = mysqli_query($koneksi, "select datacon.* , f.nama   from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id AND forwarder_id = '$filter' AND tglout IS NOT NULL AND tglout IS NOT NULL AND tglout2 IS NOT NULL AND tglout2 BETWEEN '$start' AND '$end';");
                                $totalcontainer = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND forwarder_id = '$filter' AND tglout2 IS NOT NULL AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoothailand = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL  AND forwarder_id = '$filter' AND tglout2 IS NOT NULL AND poo='Thailand' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoophilipina = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND forwarder_id = '$filter' AND tglout2 IS NOT NULL AND poo='Philipin' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoovietnam = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND forwarder_id = '$filter' AND tglout2 IS NOT NULL AND poo='Vietnam' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoosingapore = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND forwarder_id = '$filter' AND tglout2 IS NOT NULL AND poo='Singapore' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoosurabaya = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND forwarder_id = '$filter' AND tglout2 IS NOT NULL AND poo='Surabaya' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoojakarta = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND forwarder_id = '$filter' AND tglout2 IS NOT NULL AND poo='Jakarta' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoojapan = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND forwarder_id = '$filter' AND tglout2 IS NOT NULL AND poo='Japan' AND tglout2 BETWEEN '$start' AND '$end'");
                            }
                            
                        }
                        
                        $container = mysqli_fetch_row($totalcontainer);
                        $thailand = mysqli_fetch_row($totalpoothailand);
                        $philipina = mysqli_fetch_row($totalpoophilipina);
                        $vietnam = mysqli_fetch_row($totalpoovietnam);
                        $singapore = mysqli_fetch_row($totalpoosingapore);
                        $surabaya = mysqli_fetch_row($totalpoosurabaya);
                        $jakarta = mysqli_fetch_row($totalpoojakarta);
                        $japan = mysqli_fetch_row($totalpoojapan);
                        $size20 =  mysqli_fetch_row($totalsize20);
                        $size40 =  mysqli_fetch_row($totalsize40);
                        while ($d = mysqli_fetch_array($data)) {
                            $kembali    = new DateTime(date('Y-m-d H:i:s', strtotime($d['datein'] . ' + 11 days')));
                            $lambat     = new DateTime(date('Y-m-d H:i:s', (strtotime($d['tglout2']." 00:00:00"))));
                            $kembali2    = new DateTime(date('Y-m-d H:i:s', strtotime($d['tglout'] . ' + 4 days')));
                            
    
                            $diff       = $lambat->diff($kembali);
                            $diffd       = $lambat->diff($kembali2);
                            $no++;
                            
                            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                            $dendasin = ($lambat < $kembali) ? 0  : ($diff->days * (($d['size'] == 20) ? 50 : 100));
                            $dendabtm = ($lambat < $kembali2) ? 0  : ($diffd->days * (($d['size'] == 20) ? 30 : 50));
                    $diffs = 0;
                    if($dendasin > 0 || $dendabtm >0){
                        if($dendasin > 0){
                            $diffs += $diff->days;
                        }
                        if($dendabtm > 0 ){
                            $diffs += $diffd->days;
                        }
                    }
                        ?>
                            <tr>
                                <td style='color:#000'><?php echo $d['nocon']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($d['datein'])); ?></td>
                                <td><?php echo date('d-m-Y', strtotime($d['datein']. ' + 4 days'));; ?></td>
                                <td style='color:#000'><?php echo date('d-m-Y', strtotime(explode(" ",$d['tglout'])[0]));  ?></td>
                                <td style='color:#000'><?php echo date('d-m-Y', strtotime ($d['tglout2'])); ?></td>
                                <td style='color:#000'><?php echo $d['nama']; ?></td>
                                <td style='color:#000'><?php echo $d['size']; ?></td>
                                <td style='color:#000'><?php echo $d['poo']; ?></td>
                                <td style='color:#<?php echo bgcolor($d['loca']);?>'><?php echo $d['loca']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($d['datein']. ' + 11 days'));; ?></td>
                                <td><?php echo $dendasin.' SGD'; $totaldetention+=$dendasin ?></td>
                                <td><?php echo date('d-m-Y', strtotime($d['tglout']. ' + 4 days'));; ?></td>
                                <td><?php echo $dendabtm.' SGD'; $totaldemurrage+=$dendabtm ?></td>
                                <td style='background-color:#<?php echo secolor ($d['section']); ?>'><?php echo $d['section']; ?></td>
                                <td colspan="1"><?= $diffs ?></td>
                                <td colspan="1"><?= ($diff->days != 0 || $diffd->days != 0) ?($dendasin + $dendabtm) : 0  ?></td>
                                <td><button type="button" id="buttons" onclick="change(this)" data-id="<?=$d['id']; ?>" data-nocon="<?=$d['nocon']; ?>" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M16.997 20c-.899 0-1.288-.311-1.876-.781-.68-.543-1.525-1.219-3.127-1.219-1.601 0-2.446.676-3.125 1.22-.587.469-.975.78-1.874.78-.897 0-1.285-.311-1.872-.78C4.444 18.676 3.601 18 2 18v2c.898 0 1.286.311 1.873.78.679.544 1.523 1.22 3.122 1.22 1.601 0 2.445-.676 3.124-1.219.588-.47.976-.781 1.875-.781.9 0 1.311.328 1.878.781.679.543 1.524 1.219 3.125 1.219s2.446-.676 3.125-1.219C20.689 20.328 21.1 20 22 20v-2c-1.602 0-2.447.676-3.127 1.219-.588.47-.977.781-1.876.781zM6 8.5 4 9l2 8h.995c1.601 0 2.445-.676 3.124-1.219.588-.47.976-.781 1.875-.781.9 0 1.311.328 1.878.781.679.543 1.524 1.219 3.125 1.219H18l.027-.107.313-1.252L20 9l-2-.5V5.001a1 1 0 0 0-.804-.981L13 3.181V2h-2v1.181l-4.196.839A1 1 0 0 0 6 5.001V8.5zm2-2.681 4-.8 4 .8V8l-4-1-4 1V5.819z"></path></svg>
                                </button>
                                </td>
                            </tr>
                           
                    </tbody>
                    
                <?php
                        }
                ?>
                 
                        
                </table>
            </div>
        </div>

                    </tbody>
                    
                <?php
                        
                ?>
                
                </table>
            </div>
        </div>
        <div class="input">
            <form action="editreport1.php" name="formContainer" method="post" onsubmit="return validateForm()">


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Return</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group" hidden>
                                    <label for="inputNoContainer">id</label>
                                    <input type="text" name="id" class="form-control" id="idcon" placeholder="" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="inputDateIn">Return Date</label>
                                    <input type="date" name="datein" class="form-control" id="inputDateIn" placeholder="Select a Date">
                                </div>


                                <div class="modal-footer">

                                    <input type="submit" class="btn btn-primary" value="Submit">
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


    
        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Reporting_Pdf.php?tmp=<?= isset($_GET['filter'])?'&filter='.$_GET['filter']:'' ?><?php echo isset($_GET['start']) ? '&start='.$_GET['start'].'&end='.$_GET['end'] : ''; ?>"><button>Print data</button></a>
                        
       

                </ul>
            </nav>
        </div>
        <!-- Copyright -->
        <div class="footer" style="background-color: #1A314B;">
            <center>
                <p class="text-white"><Strong>©2022 Sumitomo Wiring System Batam Indonesia</Strong></p>
            </center>
        </div>
        <!-- Copyright -->


        </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="asset/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- fontawesome-->
        <script src="js/main.js"></script>

        <script>
        function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase("");
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
        }
</script>
<script>
                function change(event) {
                    // console.log($(event).attr("data-id"));
                    document.getElementById("idcon").value = $(event).attr("data-id");

                    $('#exampleModal').modal('show');
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