<!DOCTYPE HTML>
<html>

<head>
  <style>
    .error {
      color: #FF0000;
    }
  </style>
</head>

<body>
  <h1>Estudiantes</h1>
  <br>
  <p><input type="submit" name="consultar" value="Consultar">&emsp;<input type="submit" name="actualizar"
      value="Actualizar">
    &emsp;<input type="submit" name="agregar" value="Agregar">&emsp;<input type="submit" name="eliminar"
      value="Eliminar">
  </p>
</body>

</html>

<?php
$action = "test_get_courses_x_student";
$code = "64570";
$s_id = "42";
$c_id = "2";
$cxs_id = "73";
$first_name = "Cristian";
$last_name = "Quintana";
$lv_id = "10";
$group = "E";
$email = "crisqui09@hotmail.com";
$phone_number = "3053453889";
$geolocation = "6.171133491565565,-75.33362885177205";
$status = "1";

$data = ConsumirAPI($action, $code);
print_r($data);

$data2 = ConsumirAPIUpdate($action, $code, $s_id, $first_name, $last_name, $lv_id, $group, $email, $phone_number, $geolocation, $status);
//print_r($data2);

$data = ConsumirAPI($action, $code, $s_id, $c_id); //$s_id, $c_id, $cxs_id
//print_r($data);

function ConsumirAPI($action = "", $code = "", $s_id = "", $c_id = "", $cxs_id = "")
{
  $curl = curl_init();

  $URL = 'https://plataforma.education.city/app/web/api/index.php?action=' . $action . '&code=' . $code;


  if ($action == 'test_link_course') {
    $URL = 'https://plataforma.education.city/app/web/api/index.php?action=' . $action . '&code=' . $code . '&s_id=' . $s_id . '&c_id=' . $c_id;

  }

  if ($action == 'test_unlink_course') {
    $URL = 'https://plataforma.education.city/app/web/api/index.php?action=' . $action . '&code=' . $code . '&s_id=' . $s_id . '&c_id=' . $c_id;
  }

  if ($cxs_id != "") {
    $URL = 'https://plataforma.education.city/app/web/api/index.php?action=' . $action . '&cxs_id=' . $cxs_id;
  }


  curl_setopt_array(
    $curl,
    array(
      CURLOPT_URL => $URL,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Cookie: PHPSESSID=jw1nvbtt0g90hgbbs3hh0z61oo'
      ),
    )
  );

  $response = curl_exec($curl);

  curl_close($curl);
  //var_dump($response);
  $data = json_decode($response);

  return $data;

}

function ConsumirAPIUpdate($action = "", $code = "", $s_id = "", $first_name = "", $last_name = "", $lv_id = "", $group = "", $email = "", $phone_number = "", $geolocation = "", $status = "")
{
  $curl = curl_init();


  $URL = 'https://plataforma.education.city/app/web/api/index.php?action=' . $action . '&code=' . $code . '&s_id=' . $s_id . '&first_name=' . $first_name . '&last_name=' . $last_name . '&lv_id=' . $lv_id . '&group=' . $group . '&email=' . $email . '&phone_number=' . $phone_number . '&geolocation=' . $geolocation . '&status=' . $status;


  curl_setopt_array(
    $curl,
    array(
      CURLOPT_URL => $URL,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Cookie: PHPSESSID=jw1nvbtt0g90hgbbs3hh0z61oo'
      ),
    )
  );

  $response = curl_exec($curl);

  curl_close($curl);
  //var_dump($response);
  $data = json_decode($response);

  return $data;

}

?>