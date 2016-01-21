<?php
/**
 * Created by PhpStorm.
 * User: kbokdia
 * Date: 21/12/15
 * Time: 1:53 PM
 */

namespace Project\Register;

use Project\Base\BaseClass;

define("ROOT", "../");
require ROOT."autoload.php";

$response = null;

//Do validation if required
do{
    if(isset($_GET['key'])){
        $validate = true;
    }
    else{
        $validate = false;
        $response = BaseClass::createResponse(0,"Invalid Request");
        break;
    }
}while(0);

//Business Logic
if($validate){
    $register = new Register();
    $response = $register->getRegisteredUsersList();
}
header('Content-Type: application/json');
echo json_encode($response);