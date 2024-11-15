<?php
date_default_timezone_set("Asia/Jakarta");

require "Db_connection.php";

if(isset($_GET["kelas"])){
    $classes = $_GET["kelas"];
    $sql = "SELECT * FROM table_timeline WHERE KELAS='$classes'";
    $result = mysqli_query($conn, $sql);

    $groupsData = array(); // Array untuk menyimpan data berdasarkan grup
    $notice = "";

    while($row = mysqli_fetch_assoc($result)){
        $stepName = strtolower($row["NAMA_TAHAP"]);
        $nameProject = $row["NAMA_PROJECT"];
        $deadline = $row["DEADLINE"];
        $groups = $row["NAMA_KELOMPOK"];
        $deadlines = strtotime($deadline);
        $currentTime = strtotime(date("Y-m-d H:i:s"));
        $resultTime = $deadlines - $currentTime;

        if (!isset($groupsData[$groups])) {
            $groupsData[$groups] = array(); // Inisialisasi array grup jika belum ada
        }

        $hasAssignment = false;
        $downloadLink = "";

        // Ambil informasi tugas dari tabel tugas
        $assignmentSql = "SELECT * FROM table_monitoring WHERE KELAS='$classes'";
        $assignmentResult = mysqli_query($conn, $assignmentSql);

        if(mysqli_num_rows($assignmentResult) > 0){
            $projects = array();
            while($assignmentRow = mysqli_fetch_assoc($assignmentResult)){
                $projects[] = array(
                    'projects' => $assignmentRow["NAMA_PROJECT"],
                    'assProject' => $assignmentRow["FILE_MONITORING"]
                );
            }
            
            foreach($projects as $project){
                if($project['projects'] == $nameProject){
                    $fileAssignment = $project['assProject'];
                    $fileName = basename($fileAssignment);
                    $assignment = explode(".", $fileName);
                    $taskInfo = strtolower($assignment[0]);
                    
                    if($taskInfo == $stepName){
                        $hasAssignment = true;
                        $downloadLink = "Controller/DownloadStepName.php?iniFile=".$taskInfo;
                        break;
                    }
                }
            }
        } else {
            echo "<script>alert('tidak ada file yang ditemukan')</script>";
        }

        if ($resultTime <= 0) {
            $notice = "Deadline Selesai";
        } else {
            $day = floor($resultTime / (60 * 60 * 24));
            $hour = floor(($resultTime % (60 * 60 * 24)) / (60 * 60));
            $minute = floor(($resultTime % (60 * 60)) / 60);
            $second = $resultTime % 60;
            $notice = "$day hari $hour jam $minute menit $second detik";
        }

        // Menambahkan item baru ke dalam array grup
        $groupsData[$groups][] = array(
            'stepName' => $stepName,
            'deadlineDate' => $deadline,
            'deadlineTime' => $notice,
            'hasAssignment' => $hasAssignment,
            'downloadLink' => $downloadLink
        );
    }

    // Membangun accordion berdasarkan data grup
    if(count($groupsData) != 0){
        echo "<div class='accordion accordion-flush' id='accordionFlushExample'>";
        foreach ($groupsData as $groupName => $groupItems) {
            echo "
                <div class='accordion-item'>
                    <h2 class='accordion-header'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#".$groupName."' aria-expanded='false' aria-controls='flush-collapseOne'>
                        <p class='text-lead text-secondary fs-5'><i class='bi bi-person-lines-fill fs-3'></i>  $groupName</p>
                        </button>
                    </h2>
                    <div id='".$groupName."' class='accordion-collapse collapse' data-bs-parent='#accordionFlushExample'>
                        <div class='accordion-body ms-3 p-0'>
                            <div class='row container-fluid bg-success rounded-3 mt-2 mb-2'>";
            foreach ($groupItems as $item) {
                echo "
                                <div class='col col-6 mt-2 '>
                                    <h3 class='lead text-white fs-3'>".$item['stepName']."<p class='lead text-white fs-6'>".$item['deadlineDate']."</p></h3>
                                    <p class='text-white'>".$item['deadlineTime']."</p>
                                </div>
                                
                                    <div class='col col-4 d-flex flex-column'>
                                        <p class='lead text-white'>".($item['hasAssignment'] ? 'Sudah ada Tugas' : 'Belum ada Tugas')."</p>
                                        <a class='btn btn-warning btn-sm lead' href='".$item['downloadLink']."'>Download</a>
                                    </div>";
            }
            echo "
                            </div>
                        </div>
                    </div>
                </div>";
        }
        echo "</div>";
    } else {
        echo '<div class="container-fluid d-flex justify-content-center p-4 border border-danger"><p class="text-danger text-center m-0">Tidak ada data yang tersedia</p></div>';
    }
} else {
   echo "<div class='container-lg text-danger d-flex justify-content-center border border-danger p-4'>Silahkan pilih kelas di daftar kelas</div>";
}

?>
