<?php


echo "hello";



// Check if live server or Development PC
// if (php_uname("n") == 'STO-WRK-022' ||  php_uname("n") == 'STO-LAP-094') {
//   // Developer
//   $sqlHost    = 'sqlsrv:Server=mpldbtest\mpldbtest;';
//   $db         = 'Database=stone';
//   $user       = 'coldfusion';
//   $pw         = 'icicle';

//   $green_sqlHost  = "sqlsrv:Server=greenoak;";
//   $green_db       = "Database=we3recycler";
//   $green_user     = "sqlro";
//   $green_pwd      = "reports";

// } else {
  // Live
  $sqlHost    = 'sqlsrv:Server=mpldbtest\mpldbtest;';
  $db         = 'Database=stone';
  $user       = 'coldfusion';
  $pw         = 'icicle';

  $green_sqlHost  = "sqlsrv:Server=greenoak;";
  $green_db       = "Database=we3recycler";
  $green_user     = "sqlro";
  $green_pwd      = "reports";

//} 

// Connect to DB
$conn   = new PDO( $sqlHost.$db,$user,$pw );
//$conn2  = new PDO( $green_sqlHost.$green_db,$green_user,$green_pwd );

$sql = " select CaseNumber, ProductType, AccountCode, CallerName, case when Chargeable = 1 then 'Yes' else 'No' end as Chargeable, Brand, CallerPhone, ContactName, ContactEmail, ContactMobile, CaseStatus, SerialNumber from [case] with(nolock)
where CaseStatus like 'Awaiting Return' ";
 $sql.= "and Chargeable = 0";
$sql.= "and  CaseType like 'Repair Centre'";


$stmt = $conn->prepare($sql);
$stmt->execute();


$data = $stmt->fetch(PDO::FETCH_ASSOC);

    print_r($data);

  if (!$stmt) {
      echo "\nPDO::errorInfo():\n";
      print_r($conn->errorInfo());
      die();
    }


// Errors
if( $conn === false ) {

}





?>