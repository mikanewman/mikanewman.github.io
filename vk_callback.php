<?php 
header("Content-Type: application/json; encoding=utf-8"); 

$secret_key = 'HuNasdgasgagnj5'; //�������� ����  ���������� ���� ���������� 

$input = $_POST; 


// �������� ������� 
$sig = $input['sig']; 
unset($input['sig']); 
ksort($input); 
$str = ''; 
foreach ($input as $k => $v) { 
  $str .= $k.'='.$v; 
} 

if ($sig != md5($str.$secret_key)) { 
  $response['error'] = array( 
    'error_code' => 10, 
    'error_msg' => 'notnot', 
    'critical' => true 
  ); 
} else { 

//����� ����������� ����� ��� ����� ����, ��� ������� ��������� ������� 

  // ������� ���������� 
  switch ($input['notification_type']) { 
    case 'get_item': 
      // ��������� ���������� � ������ 
      $item = $input['item']; // ������������ ������ 

if ($item == 'item_25new') { 
        $response['response'] = array( 
          'item_id' => 25, 
          'title' => '300 rrrrrrr', 
          'photo_url' => 'http://3dsocialnettest.ru/1.jpg', 
          'price' => 5 
        ); 
      } elseif ($item == 'item2') { 
        $response['response'] = array( 
          'item_id' => 27, 
          'title' => '500 rrrrrrrr', 
          'photo_url' => 'http://3dsocialnettest.ru/1.jpg', 
          'price' => 10 
        ); 
      } else { 
        $response['error'] = array( 
          'error_code' => 20, 
          'error_msg' => 'not', 
          'critical' => true 
        ); 
      } 
      break; 

case 'get_item_test': 
      // ��������� ���������� � ������ � �������� ������

      $item = $input['item']; 
      if ($item == 'item_25new') { 
        $response['response'] = array( 
          'item_id' => 125, 
          'title' => '300 ggggggggggg', 
          'photo_url' => 'http://3dsocialnettest.ru/1.jpg', 
          'price' => 5 
        ); 
      } elseif ($item == 'item2') { 
        $response['response'] = array( 
          'item_id' => 127, 
          'title' => '500 gggggggggg', 
          'photo_url' => 'http://3dsocialnettest.ru/1.jpg', 
          'price' => 10 
        ); 
      } else { 
        $response['error'] = array( 
          'error_code' => 20, 
          'error_msg' => 'notnot', 
          'critical' => true 
        ); 
      } 
      break; 

case 'order_status_change': 
      // ��������� ������� ������ 
      if ($input['status'] == 'chargeable') { 
        $order_id = intval($input['order_id']); 

// ��� �������� ������, ������� ��� ��������� 
        $app_order_id = 1; // ������������ � ��� ������������� ������. 

$response['response'] = array( 
          'order_id' => $order_id, 
          'app_order_id' => $app_order_id, 
        ); 
      } else { 
        $response['error'] = array( 
          'error_code' => 100, 
          'error_msg' => 'wwwwwwwwchargeable.', 
          'critical' => true 
        ); 
      } 
      break; 

case 'order_status_change_test': 
      // ��������� ������� ������ � �������� ������ 
      if ($input['status'] == 'chargeable') { 
        $order_id = intval($input['order_id']); 

$app_order_id = 1; // ��� ������������ ������ ����� �� ���� - �������� �����. 

$response['response'] = array( 
          'order_id' => $order_id, 
          'app_order_id' => $app_order_id, 
        ); 
      } else { 
        $response['error'] = array( 
          'error_code' => 100, 
          'error_msg' => 'wwwwwwwwwchargeable.', 
          'critical' => true 
        ); 
      } 
      break; 
  } 
} 

echo json_encode($response); 
?> 
