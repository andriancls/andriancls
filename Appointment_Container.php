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
        <meta name="author" content="" />
        <title>Appointment Container</title>
        <link rel="stylesheet" href="asset/font-awesome.min.css">
        <link rel="icon" type="image/png" href="images/logosumi.png" />
        <script src="asset/jquery.min.js"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/appoint.css" rel="stylesheet"/>
        <!--font awesome--->
        <link rel="stylesheet" type="text" href="css/all.css" ><link rel="stylesheet" href="asset/bootstrap-icons.css">
</head>

<body>
        <div class="topnav">
            <a href="Appointment_Container.php" class="active">
                <img class="image" src="images/logosumi.png">
            </a>
            
            <div id="">
                <a class="nav-link" href="Appointment_Container.php"><strong>Appointment</strong></a>
                <a class="nav-link" href="Notifications_Container2.php"><strong>Notifications</strong></a>
                <a class="nav-link" href="Reporting_Container.php"><strong>Reporting</strong></a>
                <a class="nav-link" href="logout.php" style="color: #FF0000"><strong>Logout</strong></a>
            </div>

           
            </div>
            
            <div class="txtbar1">
                <strong>
                    <font size="5" face="Arial" color="#fff">&nbsp;Appointment Container</font>
                </strong>
            </div>

            <br>
            <?php
            include "koneksi.php";
            $sekarang    = date("d-m-Y");
            ?>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date: </b><?php echo $sekarang ?></p>

            <script type="text/javascript">
                    window.onload = function() { jam(); }
                
                    function jam() {
                        var e = document.getElementById('jam'),
                        d = new Date(), h, m, s;
                        h = d.getHours();
                        m = set(d.getMinutes());
                        s = set(d.getSeconds());
                
                        e.innerHTML = h +':'+ m +':'+ s;
                
                        setTimeout('jam()', 1000);
                    }
                
                    function set(e) {
                        e = e < 10 ? '0'+ e : e;
                        return e;
                    }
                </script>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Input Data
                </button> 


            <div class="input">
            <form action="aksi_backdata.php" name="formContainer" method="post" onsubmit="return validateForm()">
           
               
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Container Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputDateIn">ETA SIN</label>
                                        <input type="date" name="datein" class="form-control" id="inputDateIn" placeholder="Select a Date">
                                    </div>
                                    
                                    <!-- <div class="form-group">
                                    <label for="inputtDateOut">Deadline</label>
                                    <input type="date" name="dateout" class="form-control" id="inputDateOut" placeholder="Select a Date">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="inputNoContainer">Container No.</label>
                                        <input type="text" name="nocon" class="form-control" id="inputNoContainer" aria-describedby="emailHelp" placeholder="Input No. Container" title="Harap Masukan No.Container Dengan Benar">
                                    </div>

                                    <div class="form-group">
                                        <label for="selectSize">Size</label>
                                        <select class="form-control" id="selectSize" name="size">
                                            <option selected>Choose...</option>
                                            <option>40</option>
                                            <option>20</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectOrigin">Port of Origin</label>
                                        <select class="form-control" id="selectOrigin" name="poo">
                                            <option selected>Choose...</option>
                                            <option>Japan</option>
                                            <option>Philipin</option>
                                            <option>Vietnam</option>
                                            <option>Thailand</option>
                                            <option>Singapore</option>
                                            <option>Jakarta</option>
                                            <option>Surabaya</option>
                                            <option>Empty</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectLocation">Place Lot</label>
                                        <select class="form-control" id="selectLocation" name="loca">
                                            <option selected>Choose...</option>
                                            <option>Lot 7</option>
                                            <option>Lot 8</option>
                                            <option>Lot 206</option>
                                            <option>Lot 242</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectSize">Forwarder</label>
                                        <select class="form-control" id="selectSize" name="forwarder">
                                            <option selected>Choose...</option>
                                            <?php
                                            $datas = mysqli_query($koneksi, "select * from forwarder");
                                            while ($d = mysqli_fetch_array($datas)) {
                                            ?>
                                                <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="selectLocation">Shipping line</label>
                                        <select class="form-control" id="selectsection" name="section">
                                            <option value="" selected>Choose...</option>
                                            <option>Import</option>
                                            <option>Export</option>
                                        </select>
                                    </div>
                                    
                                    
                                   
                                </div>

                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <input type="Reset" class="btn btn-secondary" value="Reset">
                                    <a href="Appointment_Container.php" class="btn btn-danger" role="button">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


                        <tr bgcolor="#1A314B">
                            <div class="outer-wrapper">
                                <div class="table-wrapper">
                                    &nbsp;&nbsp;<table>
                                        <thead>
                                        <th rowspan="2"><b>ETA SIN</b></th>
                                        <th rowspan="2"><b>ETA BTM</b></th>
                                        <th rowspan="2"><b>Container No</b></th>
                                        <th rowspan="2"><b>Invoice</b></th>
                                        <th rowspan="2"><b>Forwarder</b></th>
                                        <th rowspan="2"><b>Size</b></th>
                                        <th rowspan="2"><b>Port Of Origin</b></th>
                                        <th rowspan="2"><b>Place Lot</b></th>
                                        <th rowspan="2"><b>Detention</b></th>
                                        <tr>
                                            <th rowspan="2"><b>SGD/Day</b></th>
                                            <th rowspan="2"><b>Shipping line</b></th>
                                            <th rowspan="2"><b>Shipment to</b></th>
                                            <th style="color:white"><b>Action</b></th>
                                        </tr>
                                        </thead>
                        </tr>
                            
                                <?php
                                include 'koneksi.php';
                                $no = 1;
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
                                $limit = 10000;
                                $pagess = isset($_GET['page'])? $_GET['page'] : 0;
                                $offset = ($pagess > 0 && $pagess !=1 )?($pagess - 1) + 9999 : 0;
                                // var_dump($offset);die;
                                $count = mysqli_query($koneksi, "SELECT COUNT(*) as id FROM `datacon` WHERE tglout IS NULL");
                                $res = mysqli_fetch_row($count);
                                $ceil = ceil($res[0] / 10000);
                                // var_dump($offset,$limit);die;
                                // var_dump(ceil($res[0]/2));die;
                                $data = mysqli_query($koneksi, "select datacon.* , f.nama from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id  AND tglout IS NULL order by poo ASC limit $limit offset $offset");
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
                                function setdateout($poo , $section,$datein){
                                    if($poo == 'Japan' && $section== 'Export'){
                                        return date('Y-m-d' , strtotime($datein. ' + 11 days'));
                                    }
                                    if($poo == 'Empty'){
                                        return date('Y-m-d' , strtotime($datein. ' + 4 days'));
                                    }
                                    return date('Y-m-d' , strtotime($datein. ' + 11 days'));
                                  }
                                while ($d = mysqli_fetch_array($data)) {
                                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                    $kembali    = new DateTime(setdateout($d['poo'],$d['section'],$d['datein']));
                                    $lambat     = new DateTime(date('Y-m-d H:i:s', (strtotime((date('Y-m-d',time()))." 00:00:00"))));
                                    $diff       = $lambat->diff($kembali);
                                     
                                    $dendasin = dendasin($lambat, $kembali, $diff->days, $d['size'], $d['poo'], $d['section']);
                                    $diffs = 0;
                                    {
                                    if($dendasin > 0){
                                        $diffs += $diff->days;
                                    }
                                }
                                ?>
                                    <tr>
                                        <td><?php echo date('d-m-Y', strtotime($d['datein'])); ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($d['datein']. ' + 4  days'));; ?></td>
                                        <td style='color:#000'><?php echo $d['nocon']; ?></td>
                                        <td style='color:#000'><?php echo $d['invoice']; ?></td>
                                        <td style='color:#000'><?php echo $d['nama']; ?></td>
                                        <td style='color:#000'><?php echo $d['size']; ?></td>
                                        <td style='color:#000'><?php echo $d['poo']; ?></td>
                                        <td style='color:#<?php echo bgcolor($d['loca']);?>'><?php echo $d['loca']; ?></td>
                                        <td><?php echo date ('d-m-Y',strtotime($d['dateout'])); ?></td>
                                        <td><?php echo $dendasin . ' SGD' ?></td>
                                        <td style='background-color:#<?php echo secolor ($d['section']); ?>'><?php echo $d['section']; ?></td>
                                        <td style='color:#000'><?php echo $d['shipment']; ?></td>
                                        <td><a href="aksiconrepot.php?id=<?=$d['id']; ?>&forwarder=<?=$d['forwarder_id']; ?> ">
        
                                <button type="button" class="btn btn-danger" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm-7.933 13.481-3.774-3.774 1.414-1.414 2.226 2.226 4.299-5.159 1.537 1.28-5.702 6.841z"></path></svg>
                                </button></a>
                                
        
                                <button type="button" id="buttons" onclick="change(this)" data-id="<?=$d['id']; ?>" data-nocon="<?=$d['nocon']; ?>" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill: rgba(0, 0, 0, 1);;"><path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zM8.999 17H7v-1.999l5.53-5.522 1.999 1.999L8.999 17zm6.473-6.465-1.999-1.999 1.524-1.523 1.999 1.999-1.524 1.523z"></path></svg>
                                        </button>
                                </tr>

                            <?php } ?>
        
                            <form action="editdatacon.php" name="formContainer" method="post" onsubmit="return validateForm()">
                            
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Container Form</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    
                                        <div class="modal-body">
                                            <div class="form-group">
                                    <label for="selectSize">Forwarder</label>
                                    <select class="form-control" id="selectSize" name="forwarder">
                                        <option selected>Choose...</option>
                                    <?php 
                                    $datas = mysqli_query($koneksi,"select * from forwarder");
                                    while($d = mysqli_fetch_array($datas)){
                                    ?>
                                    <option value="<?= $d['id']?>"><?= $d['nama'] ?></option>
                                        <?php 
                                    }
                                    ?>
                                    </select>
                                </div>
                                        <div class="form-group">
                                    <label for="inputDateIn">Date In</label>
                                    <input type="date" name="datein" class="form-control" id="inputDateIn" placeholder="Select a Date">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="inputtDateOut">Deadline</label>
                                    <input type="date" name="dateout" class="form-control" id="inputDateOut" placeholder="Select a Date">
                                </div> -->
                                <div class="form-group" hidden>
                                    <label for="inputNoContainer">id</label>
                                    <input type="text" name="id"  class="form-control" id="idcon2" placeholder="" hidden>
                                </div> 
                                <div class="form-group">
                                    <label for="inputNoContainer">Container No.</label>
                                    <input type="text" name="nocon" class="form-control" id="inputNoContainer2" placeholder="Input No. Container">
                                </div>
                                <div class="form-group">
                                    <label for="selectSize">Size</label>
                                    <select class="form-control" id="selectSize" name="size">
                                        <option selected>Choose...</option>
                                        <option>40</option>
                                        <option>20</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="selectOrigin">Port of Origin</label>
                                    <select class="form-control" id="selectOrigin" name="poo">
                                        <option selected>Choose...</option>
                                        <option>Japan</option>
                                        <option>Philipin</option>
                                        <option>Vietnam</option>
                                        <option>Thailand</option>
                                        <option>Singapore</option>
                                        <option>Jakarta</option>
                                        <option>Surabaya</option>
                                        <option>Empty</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="selectLocation">Location</label>
                                    <select class="form-control" id="selectLocation" name="loca">
                                        <option selected>Choose...</option>
                                        <option>Lot 7</option>
                                        <option>Lot 8</option>
                                        <option>Lot 206</option>
                                        <option>Lot 242</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="selectLocation">Shipping line</label>
                                    <select class="form-control" id="selectsection" name="section">
                                        <option selected>Choose...</option>
                                        <option>Import</option>
                                        <option>Export</option>
                                    </select>
                                </div>
                                
                                        </div>
                                        <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Submit"> 
                                    <input type="Reset" class="btn btn-secondary" value="Reset">
                                    <a href="Appointment_Container.php" class="btn btn-danger" role="button">Back</a>
                                </div>
                            </form>
        
        
				<?php 
		
		
                ?>
                
            </table>
                        
                    </div>
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
                                    </ul>
                                </nav>
                            </div>

                
                <div class="footer" style="background-color: #1A314B;">
                    <center>
                        <p class="text-white"><Strong>©2022 Sumitomo Wiring System Batam Indonesia</Strong></p>
                    </center>
                </div>
            </div>
        </div>

    <!-- Bootstrap core JS-->
    <script src="asset/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- fontawesome-->
    <script src="js/main.js"></script>
    <script>
        function change(event) {
            console.log($(event).attr('data-id'));
            document.getElementById("idcon2").value = $(event).attr("data-id");
            document.getElementById("inputNoContainer2").value = $(event).attr("data-nocon");

            $('#editModal').modal('show');
        }

        function filter() {
            var x = document.getElementById("dynamic_select").value;

            window.location = x; // redirect
        }
    </script>
</body>

</html>