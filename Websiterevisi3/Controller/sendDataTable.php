<?php 
//dari pushStdServer.js untuk aturkolompk.php
if(isset($_GET["dataGroup"])){
    
    $jsonDecode= json_decode($_GET["dataGroup"],true);
    $classUname=$jsonDecode['class'];
    $username="nlpteamm_t-tas";
    $password="3_7HUMHvy4)w";
    $dsn= "mysql:host=localhost;dbname=nlpteamm_web_database";
    $conn=new PDO($dsn,$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $queryValidation="SELECT * FROM table_kelompok WHERE KELAS=:class";
    $stmtValidation=$conn->prepare($queryValidation);
    $stmtValidation->bindParam(':class',$classUname);
    $stmtValidation->execute();
    $resultValidation=$stmtValidation->fetchAll(PDO::FETCH_ASSOC);
    if($resultValidation){
        //data dari db
            $dataGet=array_column($resultValidation,"NAMA_KELOMPOK");
            echo json_encode($dataGet);
            $countVal=count($dataGet);
            $dataFix=array();
            forEach($dataGet as $d){
                $dataFix[]=str_replace(" ","",$d);
            }
        
        //data input
            $dataComp=[];
            
            forEach($jsonDecode['studentData'] as $dataComps){
                $dataComp[]=str_replace(" ","",$dataComps[1]);
                
                }
            
            function changeColumn($array){
               return str_replace(" ","",$array);
            }
  
            $jsonDecode['studentData']=array_map(function($newSubArray){
                return array_map('changeColumn',$newSubArray);
            },$jsonDecode['studentData']);
          
            if(count($dataComp)>$countVal){
           
                $extraData=array_diff($dataComp,$dataFix);
                $sqlQuerys="INSERT INTO table_kelompok (STD_ID,NAMA_KELOMPOK, KELAS, PROJECT_NAME) VALUES (:Tokens,:groupNames,:classes,:prjNames)";
                echo json_encode($extraData);
                forEach($extraData as $valExData=>$m){
                    $countValData=$m;
                }
                $resultSub=array();
                foreach($jsonDecode['studentData'] as $getSub){
                    if(in_array($countValData,$getSub)){
                        $resultSub=$getSub;
                    }
                }
                $project=$resultSub[0];
                $groupNames=$resultSub[1];
                $className=$resultSub[2];
                $token=$resultSub[3];
                $stmts=$conn->prepare($sqlQuerys);
                $stmts->bindParam(':Tokens',$token);
                $stmts->bindParam(':groupNames',$groupNames);
                $stmts->bindParam(':classes',$className);
                $stmts->bindParam(':prjNames',$project);
                
                if($stmts->execute()){
                    $sqlCreateNew="CREATE TABLE IF NOT EXISTS `table_$groupNames`(
                        ID_STD INTEGER PRIMARY KEY AUTO_INCREMENT,
                        NAME_USER VARCHAR(30) NOT NULL,
                        CLASS VARCHAR(15) NOT NULL,
                        NAME_PROJECT VARCHAR(30),
                        TOKEN VARCHAR(250),
                        KELOMPOK VARCHAR(30)
                    )";

                    $sqlCreateTable=$conn->prepare($sqlCreateNew);
                    if($sqlCreateTable->execute()){
                        
                        echo json_encode(array('Response'=>'Data berhasil disimpan'));
                    }else{
                        echo json_encode(array('Response_error'=>"Error occured!"));
                    };
                       
                }
            }


}else{
    $sqlQuery="INSERT INTO table_kelompok (STD_ID, NAMA_KELOMPOK, KELAS, PROJECT_NAME) VALUES (:stdId,:groupName,:class,:prjName)";
    $stmt=$conn->prepare($sqlQuery);
    forEach($jsonDecode['studentData'] as $data){
       
        $namePrj=$data[0];
        $nameGroup= strtolower(str_replace(" ","",$data[1]));
        $class=$data[2];
        $stdId= $data[3];
        $sqlCheecks="SHOW TABLES LIKE 'table_$nameGroup'";
        $stmtCheck=$conn->prepare($sqlCheecks);
        $stmtCheck->execute();
        $tableExist=$stmtCheck->fetchAll();
        $tableName="table_$nameGroup";
        if(!$tableExist){
            $sqlGrpDb = "CREATE TABLE  `$tableName` (
                ID_STD INTEGER PRIMARY KEY AUTO_INCREMENT,
                NAME_USER VARCHAR(30) NOT NULL,
                CLASS VARCHAR(15) NOT NULL,
                NAME_PROJECT VARCHAR(30),
                TOKEN VARCHAR(250),
                KELOMPOK VARCHAR(30)
            )";
            $stmtCreate=$conn->prepare($sqlGrpDb);
            $stmtCreate->execute();
            

        }
        $stmt->bindParam(':stdId',$stdId);
        $stmt->bindParam(':groupName',$nameGroup);
        $stmt->bindParam(':class',$class);
        $stmt->bindParam(':prjName',$namePrj);
        $stmt->execute();
    
    }
   
}
}