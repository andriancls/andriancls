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
    <title>Reporting MGL</title>
    <link rel="icon" type="image/png" href="images/logosumi.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon-->

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/excel.css" rel="stylesheet" />
    <!--font awesome--->
    <link rel="stylesheet" type="text" href="css/all.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<body>
    


    <div class= "judul">
    <b><u><h5>DAILY CONTAINER LOADING CONTROL LIST</h5></u></b>
    </div>
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span id="jam" style="font-size:30"></span></b>

                
    <thead>
    <tr bgcolor="#1A314B">
               &nbsp;&nbsp; &nbsp;&nbsp;<table id="myTable">
               <th rowspan="2"><b>Container No</b></th>
                    <th rowspan="2"><b>Invoice No</b></th>
                    <th rowspan="2"><b>ETA SIN</b></th>
                    <th rowspan="2"><b>ETA BTM</b></th>
                    <th rowspan="2"><b>ATA SBI</b></th>
                    <th rowspan="2"><b>Forwarder</b></th>
                    <th rowspan="2"><b>Size</b></th>
                    <th rowspan="2"><b>Port Of Origin</b></th>
                    <th rowspan="2"><b>Place Lot</b></th>
                    <th rowspan="2"><b>Shifting to lot</b></th>
                    <th rowspan="2" bgcolor="#1A314B" style="color:white"><b>Detention</b></th>
                    <th bgcolor="#00800" style="color:white"><b>SGD/Day</b></th>
                    <th rowspan="2" bgcolor="#1A314B" style="color:white"><b>Demurrage</b></th>
                    <th bgcolor="#00800" style="color:white"><b>SGD/Day</b></th>
                    <th rowspan="2" style="color:white"><b>Shipping line</b></th>
                    <th rowspan="2" bgcolor="#1A314B" style="color:white"><b>Billing Amount</b></th>
                    <th rowspan="2" bgcolor="#1A314B" style="color:white"><b>Shipping to</b></th>
                    <th rowspan="2"><b>Total Stay</b></th>
                    <th rowspan="2"><b>Total Charge</b></th>
                    <th rowspan="2"><b>Return</b></th>
                        </tr> 
            </thead>
                        
                        




                   
            <tbody>
                    <?php
                        include 'koneksi.php';
                        $no = 1;
                        $totaldetention = 0;
                        $totaldemurrage = 0;
                        $totalbilling =0;
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
                            if ($lot== 'Direct To') {
                                return 'f00';
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
                          function setdateout2($poo , $section,$datein){
                            if($poo == 'Japan' && $section== 'Export'){
                                return date('Y-m-d' , strtotime($datein. ' + 11 days'));
                            }
                            if($poo == 'Empty'){
                                return date('Y-m-d' , strtotime($datein. ' + 4 days'));
                            }
                            return date('Y-m-d' , strtotime($datein. ' + 4 days'));
                          }
                        $totalcontainer = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL');
                        $totalpoothailand = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo="Thailand"');
                        $totalpoophilipina = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo="Philipin"');
                        $totalpoovietnam = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo="Vietnam"');
                        $totalpoosingapore = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo="Singapore"');
                        $totalpoosurabaya = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo="Surabaya"');
                        $totalpoojakarta = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo="Jakarta"');
                        $totalpoojapan = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo="Japan"');
                        $totalpooempty = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo="Empty"');
                        $totalsize20 = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id =3 AND tglout2 IS NOT NULL AND size="20"');
                        $totalsize40 = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id =3 AND tglout2 IS NOT NULL AND size="40"');
                        $totalnagoya = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id =3 AND tglout2 IS NOT NULL AND shipment="nagoya"');
                        $totalhakata = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id =3 AND tglout2 IS NOT NULL AND shipment="hakata"');
                        $totalsingapore = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id =3 AND tglout2 IS NOT NULL AND shipment="exsingapore"');
                        $totalmoji = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id =3 AND tglout2 IS NOT NULL AND shipment="moji"');
                        $totalsendai = mysqli_query($koneksi, 'SELECT COUNT(id) from datacon where tglout IS NOT NULL AND datacon.forwarder_id =3 AND tglout2 IS NOT NULL AND shipment="sendai"');


                        $limit = 10000;
                        $pagess = isset($_GET['page']) ? $_GET['page'] : 0;
                        $offset = ($pagess > 0 && $pagess != 1) ? ($pagess - 1) + 9999 : 0;
                        // var_dump($offset);die;
                        $count = mysqli_query($koneksi, "SELECT COUNT(*) as id FROM `datacon` WHERE  tglout IS NOT NULL AND datacon.forwarder_id = 3 ");
                        $res = mysqli_fetch_row($count);
                        $ceil = ceil($res[0] / 10000);
                        $filter = '';
                        $query2 = '';
                        $data = mysqli_query($koneksi, "select datacon.* , f.nama  from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id AND  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL ;");
                        if($_POST || $_GET){
                            if (isset($_GET['filter']) && !isset($_GET['start'])) {
                                $filter = $_GET['filter'];
                                //$query = mysqli_query($koneksi, "select `dateout`,`tglout` from datacon where section = '$filter'");
                                $data = mysqli_query($koneksi, "select datacon.* , f.nama  from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id where section = '$filter' AND  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL LIMIT $limit OFFSET $offset");
                               
                                $totalcontainer = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND section='$filter'");
                                $totalpoothailand = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Thailand' AND section='$filter'");
                                $totalpoophilipina = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Philipin' AND section='$filter'");
                                $totalpoovietnam = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Vietnam' AND section='$filter'");
                                $totalpoosingapore = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Singapore' AND section='$filter'");
                                $totalpoosurabaya = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Surabaya' AND section='$filter'");
                                $totalpoojakarta = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Jakarta' AND section='$filter'");
                                $totalpoojapan = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Japan' AND section='$filter'");
                                $totalpooempty = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Empty' AND section='$filter'");
                                $totalsize20 = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND size='20' AND section='$filter'");
                                $totalsize40 = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND size='40' AND section='$filter'");
                                $totalnagoya = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND shipment='Nagoya' AND section='$filter'");
                                $totalhakata = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND shipment='Hakata' AND section='$filter'");
                                $totalsingapore = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND shipment='singapore' AND section='$filter'");
                                $totalmoji= mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND shipment='Moji' AND section='$filter'");
                                $totalsendai= mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND shipment='Sendai' AND section='$filter'");
                            }
                            if (isset($_GET['start']) && !isset($_GET['filter'])) {
                                $start = $_GET['start'];
                                $end = $_GET['end']." 23:59:59";
                                // var_dump($_POST);die;
                                $data = mysqli_query($koneksi, "select datacon.* , f.nama   from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id AND tglout2 IS NOT NULL AND  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND tglout BETWEEN '$start' AND '$end';");
                                $totalcontainer = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoothailand = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Thailand' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoophilipina = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Philipin' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoovietnam = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Vietnam' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoosingapore = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Singapore' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoosurabaya = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Surabaya' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoojakarta = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Jakarta' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoojapan = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Japan' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpooempty = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND poo='Empty' AND tglout BETWEEN '$start' AND '$end'");
                                $totalsize20 = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND size='20' AND tglout BETWEEN '$start' AND '$end'");
                                $totalsize40 = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND size='40' AND tglout BETWEEN '$start' AND '$end'");
                                $totalnagoya = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND shipment='Nagoya' AND tglout BETWEEN '$start' AND '$end'");
                                $totalhakata = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND shipment='Hakata' AND tglout BETWEEN '$start' AND '$end'");
                                $totalsingapore = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND shipment='singapore' AND tglout BETWEEN '$start' AND '$end'");
                                $totalmoji = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND shipment='Moji' AND tglout BETWEEN '$start' AND '$end'");
                                $totalsendai = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND shipment='Sendai' AND tglout BETWEEN '$start' AND '$end'");
                                
                            }
                            if (isset($_GET['start']) && isset($_GET['filter'])) {
                                // var_dump('disini3'); die;
                                $start = $_GET['start']; $filter = $_GET['filter'];
                                $end = $_GET['end']." 23:59:59";
                                // var_dump($_POST);die;
                                $data = mysqli_query($koneksi, "select datacon.* , f.nama   from datacon INNER JOIN forwarder as f ON f.id = datacon.forwarder_id AND section = '$filter' AND  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND tglout2 IS NOT NULL AND tglout BETWEEN '$start' AND '$end';");
                                $totalcontainer = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND section = '$filter' AND tglout2 IS NOT NULL AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoothailand = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3   AND section = '$filter' AND tglout2 IS NOT NULL AND poo='Thailand' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoophilipina = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND section = '$filter' AND tglout2 IS NOT NULL AND poo='Philipin' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoovietnam = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND section = '$filter' AND tglout2 IS NOT NULL AND poo='Vietnam' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoosingapore = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND section = '$filter' AND tglout2 IS NOT NULL AND poo='Singapore' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoosurabaya = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND section = '$filter' AND tglout2 IS NOT NULL AND poo='Surabaya' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoojakarta = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND section = '$filter' AND tglout2 IS NOT NULL AND poo='Jakarta' AND tglout BETWEEN '$start' AND '$end'");
                                $totalpoojapan = mysqli_query($koneksi, "SELECT COUNT(id) from datacon where  tglout IS NOT NULL AND datacon.forwarder_id = 3  AND section = '$filter' AND tglout2 IS NOT NULL AND poo='Japan' AND tglout BETWEEN '$start' AND '$end'");
                            }
                            
                        }
                        
                        $container = mysqli_fetch_row($totalcontainer);
                        $thailand = mysqli_fetch_row($totalpoothailand);
                        $philipina = mysqli_fetch_row($totalpoophilipina);
                        $vietnam = mysqli_fetch_row($totalpoovietnam);
                        $poosingapore = mysqli_fetch_row($totalpoosingapore);
                        $surabaya = mysqli_fetch_row($totalpoosurabaya);
                        $jakarta = mysqli_fetch_row($totalpoojakarta);
                        $japan = mysqli_fetch_row($totalpoojapan);
                        $empty = mysqli_fetch_row($totalpooempty);
                        $size20 =  mysqli_fetch_row($totalsize20);
                        $size40 =  mysqli_fetch_row($totalsize40);
                        $nagoya = mysqli_fetch_row($totalnagoya);
                        $hakata = mysqli_fetch_row($totalhakata);
                        $singapore = mysqli_fetch_row($totalsingapore);
                        $moji = mysqli_fetch_row($totalmoji);
                        $sendai = mysqli_fetch_row($totalsendai);
                        while ($d = mysqli_fetch_array($data)) {
                            $kembali    = new DateTime(date('Y-m-d H:i:s', strtotime($d['datein'] . ' + 11 days')));
                            $lambat     = new DateTime(date('Y-m-d H:i:s', (strtotime($d['tglout2']." 00:00:00"))));
                            $kembali2    = new DateTime(date('Y-m-d H:i:s', (strtotime($d['dateout2']))));
                            
    
                            $diff       = $lambat->diff($kembali);
                            $diffd       = $lambat->diff($kembali2);
                            $no++;
                            
                            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                            $dendasin = dendasin($lambat, $kembali, $diff->days, $d['size'], $d['poo'], $d['section']);
                            $dendabtm = dendabtm($lambat, $kembali2, $diffd->days, $d['size'], $d['poo'], $d['section']);
                    $diffs = 0;
                    if($dendasin > 0 || $dendabtm >0){
                        if($dendasin > 0){
                            $diffs += $diff->days;
                        }
                        if($dendabtm > 0 ){
                            $diffs += $diffd->days;
                        }
                    }
                    if($d['isempty'] == 0 || $d['isempty'] == NULL){
                        
                    }else{
                        $totalbilling += 23;
                    }
                        ?>
                            <tr>
                            <td style='color:#000'><?php echo $d['nocon']; ?></td>
                                <td style='color:#000'><?php echo $d['invoice']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($d['datein'])); ?></td>
                                <td><?php echo date('d-m-Y', strtotime($d['datein']. ' + 4 days'));; ?></td>
                                <td style='color:#000'><?php echo date('d-m-Y', strtotime ($d['tglout'])); ?></td>
                                <td style='color:#000'><?php echo $d['nama']; ?></td>
                                <td style='color:#000'><?php echo $d['size']; ?></td>
                                <td style='color:#000'><?php echo $d['poo']; ?></td>
                                <td style='color:#<?php echo bgcolor($d['loca']);?>'><?php echo $d['loca']; ?></td>
                                <td style='color:#<?php echo ($d['loca']);?>'><?php echo ($d['section']  == 'Import') ?(($d['isempty'] == 0 || $d['isempty'] == NULL )? 'Direct To' : 'Lot '.$d['isempty']) : '-'; ?></td>
                                <!--<?=  ($d['section']  == 'Import') ? $d['tglout3'] ?? '' : "-"?></td>-->
                                <td><?php echo date('d-m-Y', strtotime($d['dateout'])); ?></td>
                                <td><?php echo $dendasin . ' SGD' ?></td>
                                <td><?php echo date('d-m-Y',strtotime($d['dateout2'])) ?></td>
                                <td><?php echo $dendabtm . ' SGD' ?></td>
                                <td style='background-color:#<?php echo secolor ($d['section']); ?>'><?php echo $d['section']; ?></td>
                                <td style='color:#<?php echo ($d['loca']);?>'><?php echo ($d['section']== 'Export')?'-' : (($d['isempty'] == 0 || $d['isempty'] == NULL )? 'Direct To' : '23 SGD')  ; ?></td>
                                <td style='color:#000'><?php echo $d['shipment']; ?></td>
                                <td colspan="1"><?= $diffs ?></td>
                                <td colspan="1"><?= ($diff->days != 0 || $diffd->days != 0) ?($dendasin + $dendabtm) : 0  ?></td>
                                <td style='color:#000'><?php echo date('d-m-Y', strtotime(explode(" ",$d['tglout2'])[0]));  ?></td>
                              
                            </tr>
                           
                    </tbody>
                    
                <?php
                        }
                ?>
                <tfoot>
                        <tr>
                            <td colspan="10"></td>
                            <th style="color:yellow">TOTAL</th>
                            <td><?php echo $totaldetention; ?> </td>
                            <th style="color:yellow">TOTAL</th>
                            <td><?php echo $totaldemurrage; ?> </td>
                            <td></td>
                            <td><?php echo $totalbilling; ?></td>
                            
                        </tr>
                        <tr>
                            <th style="color:yellow">TOTAL CONTAINER</th>
                            <td><?php echo $container[0]; ?></td>
                            <th style="color:yellow">POO Vietnam</th>
                            <td><?php echo $vietnam[0]; ?></td>
                            <th style="color:yellow">POO Japan</th>
                            <td><?php echo $japan[0]; ?></td>
                            <th style="color:yellow">POO Singapore</th>
                            <td><?php echo $poosingapore[0]; ?></td>
                            <th style="color:yellow">POO Empty</th>
                            <td><?php echo $empty[0]; ?></td>
                            <th style="color:yellow">40ft</th>
                            <td><?php echo $size40[0]; ?></td>
                            <th style="color:yellow">Hakata</th>
                            <td><?php echo $hakata[0]; ?></td>
                            <th style="color:yellow">Moji</th>
                            <td><?php echo $moji[0]; ?></td>
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
                            <th style="color:yellow">20ft</th>
                            <td><?php echo $size20[0]; ?></td>
                            <th style="color:yellow">Nagoya</th>
                            <td><?php echo $nagoya[0]; ?></td>
                            <th style="color:yellow">Singapore</th>
                            <td><?php echo $singapore[0]; ?></td>
                            <th style="color:yellow">Sendai</th>
                            <td><?php echo $sendai[0]; ?></td>
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