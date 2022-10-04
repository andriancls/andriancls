<?php
require 'koneksi.php';
session_start();
date_default_timezone_set("Asia/Bangkok");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon-->

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/excel.css" rel="stylesheet" />
    <!--font awesome--->
    <link rel="stylesheet" type="text" href="css/all.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<body>

                    
             
                    
                      

                <?php 
                               
                                
                                
                                
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <div class= "judul">
    <b><u><h5>DAILY CONTAINER LOADING CONTROL LIST</h5></u></b>
    </div>
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span id="jam" style="font-size:30"></span></b>
    <thead>
    <tr bgcolor="#1A314B">
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
                                return '00ff00';
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
                        $data = mysqli_query($koneksi, "select datacon.* , f.nama  from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id  AND datacon.forwarder_id !=3 AND tglout IS NOT NULL AND tglout2 IS NOT NULL ;");
                        if($_POST || $_GET){
                            if (isset($_GET['filter']) && !isset($_GET['start'])) {
                                $filter = $_GET['filter'];
                                //$query = mysqli_query($koneksi, "select `dateout`,`tglout` from datacon where forwarder_id = '$filter'");
                                $data = mysqli_query($koneksi, "select datacon.* , f.nama  from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id where forwarder_id = '$filter' AND tglout IS NOT NULL AND datacon.forwarder_id !=3 AND tglout2 IS NOT NULL LIMIT $limit OFFSET $offset");
                               
                                $totalcontainer = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND forwarder_id='$filter'");
                                $totalpoothailand = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Thailand' AND forwarder_id='$filter'");
                                $totalpoophilipina = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Philipin' AND forwarder_id='$filter'");
                                $totalpoovietnam = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Vietnam' AND forwarder_id='$filter'");
                                $totalpoosingapore = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Singapore' AND forwarder_id='$filter'");
                                $totalpoosurabaya = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Surabaya' AND forwarder_id='$filter'");
                                $totalpoojakarta = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Jakarta' AND forwarder_id='$filter'");
                                $totalpoojapan = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Japan' AND forwarder_id='$filter'");
                                $totalsize20 = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND size='20' AND forwarder_id='$filter'");
                                $totalsize40 = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND size='40' AND forwarder_id='$filter'");
                            }
                            if (isset($_GET['start']) && !isset($_GET['filter'])) {
                                $start = $_GET['start'];
                                $end = $_GET['end']." 23:59:59";
                                // var_dump($_POST);die;
                                $data = mysqli_query($koneksi, "select datacon.* , f.nama   from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id  AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND tglout IS NOT NULL AND tglout2 IS NOT NULL AND tglout2 BETWEEN '$start' AND '$end';");
                                $totalcontainer = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL  AND datacon.forwarder_id !=3 AND  tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoothailand = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Thailand' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoophilipina = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Philipin' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoovietnam = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Vietnam' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoosingapore = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Singapore' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoosurabaya = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Surabaya' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoojakarta = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Jakarta' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalpoojapan = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND poo='Japan' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalsize20 = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND size='20' AND tglout2 BETWEEN '$start' AND '$end'");
                                $totalsize40 = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where tglout IS NOT NULL AND tglout2 IS NOT NULL AND datacon.forwarder_id !=3 AND size='40' AND tglout2 BETWEEN '$start' AND '$end'");
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
                              
                            </tr>
                           
                    </tbody>
                    
                <?php
                        }
                ?>
                <tfoot>
                        <tr>
                            <td colspan="9"></td>
                            <th style="color:yellow">TOTAL</th>
                            <td><?php echo $totaldetention; ?> </td>
                            <th style="color:yellow">TOTAL</th>
                            <td><?php echo $totaldemurrage; ?> </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th style="color:yellow">TOTAL CONTAINER</th>
                            <td><?php echo $container[0]; ?></td>
                            <th style="color:yellow">POO Vietnam</th>
                            <td><?php echo $vietnam[0]; ?></td>
                            <th style="color:yellow">POO Japan</th>
                            <td><?php echo $japan[0]; ?></td>
                            <th style="color:yellow">POO Singapore</th>
                            <td><?php echo $singapore[0]; ?></td>
                            <th style="color:yellow">ft 20'</th>
                            <td><?php echo $size20[0]; ?></td>
                        </tr>
                        
                         <tr>
                            <th style="color:yellow">POO Thailand</th>
                            <td><?php echo $thailand[0]; ?></td>
                            <th style="color:yellow">POO Philipina</th>
                            <td><?php echo $philipina[0]; ?></td>
                            <th style="color:yellow">POO Jakarta</th>
                            <td><?php echo $jakarta[0]; ?></td>
                            <th style="color:yellow">POO Surabaya</th>
                            <td><?php echo $surabaya[0]; ?></td>
                            <th style="color:yellow">ft 40'</th>
                            <td><?php echo $size40[0]; ?></td>
                         </tr>
                        
                        </tfoot>
                </table>
            </div>
        </div>

                    </tbody>
                <?php
                        
                ?>
                </table>
            </div>
        </div>

        <br>

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

        
        <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="Reporting_Container.php" role="button">Kembali</a>-->
       

       
                </ul>
            </nav>
        </div>
       


        </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
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

                <script>
                    window.print();
                </script>

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


</body>

</html>