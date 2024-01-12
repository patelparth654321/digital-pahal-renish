<?php

use App\Models\AccountantDetails;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;

function getConfigValueByKey($key)
{

  $getSetting =  DB::table('settings')->select('value')->where(['key' => $key])->first();
  if (!empty($getSetting)) {
    return $getSetting->value;
  } else {
    return "";
  }
}

function getImagePath($image = null, $folder = '')
{
  if (!$image) {
    return asset('upload/' . ($folder != '' ? ($folder . '/') : '') . 'dummy.png');
  } else {
    if (filter_var($image, FILTER_VALIDATE_URL)) {
      return $image;
    } else {
      if (File::exists(public_path('upload/' . ($folder != '' ? ($folder . '/') : '') . $image))) {

        return asset('upload/' . ($folder != '' ? ($folder . '/') : '') . $image);
      } else {

        return asset('upload/' . ($folder != '' ? ($folder . '/') : '') . 'dummy.png');;
      }
    }
  }
}

function removeImage($image, $folder)
{
  if (File::exists(public_path('upload/' . $folder . '/' . $image))) {
    File::delete(public_path('upload/' . $folder . '/' . $image));
  }
}

function dateFormat($date, $format = "d/m/Y")
{
  return $date ? date($format, strtotime($date)) : '-';
}

function dateTimeFormat($date, $format = "d-m-Y h:i a")
{
  return $date ? date($format, strtotime($date)) : '-';
}



function getUserStatus($status, $type = null)
{
  $data = "-";
  if ($status == 0) {
    $data = '<span class="badge badge-default-light">
        <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
        </svg>' . ($type ? "Pending Review" : "Inactive") . '
        
      </span>';
  } elseif ($status == 1) {
    $data = '<span class="badge badge-success-light">
        <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M11.998 2l.118 .007l.059 .008l.061 .013l.111 .034a.993 .993 0 0 1 .217 .112l.104 .082l.255 .218a11 11 0 0 0 7.189 2.537l.342 -.01a1 1 0 0 1 1.005 .717a13 13 0 0 1 -9.208 16.25a1 1 0 0 1 -.502 0a13 13 0 0 1 -9.209 -16.25a1 1 0 0 1 1.005 -.717a11 11 0 0 0 7.531 -2.527l.263 -.225l.096 -.075a.993 .993 0 0 1 .217 -.112l.112 -.034a.97 .97 0 0 1 .119 -.021l.115 -.007zm3.71 7.293a1 1 0 0 0 -1.415 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
        </svg>
        ' . ($type ? 'Reviewed' : 'Active') . '
      </span>';
  } elseif ($status == 2) {
    $data = '<span class="badge badge-error-light">
        <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M14.897 1a4 4 0 0 1 2.664 1.016l.165 .156l4.1 4.1a4 4 0 0 1 1.168 2.605l.006 .227v5.794a4 4 0 0 1 -1.016 2.664l-.156 .165l-4.1 4.1a4 4 0 0 1 -2.603 1.168l-.227 .006h-5.795a3.999 3.999 0 0 1 -2.664 -1.017l-.165 -.156l-4.1 -4.1a4 4 0 0 1 -1.168 -2.604l-.006 -.227v-5.794a4 4 0 0 1 1.016 -2.664l.156 -.165l4.1 -4.1a4 4 0 0 1 2.605 -1.168l.227 -.006h5.793zm-2.887 14l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
        </svg>
        Expired
      </span>';
  }
  return $data;
}
function getNameShort($name)
{
  $words = explode(" ", $name);
  $acronym = "";
  foreach ($words as $w) {
    $acronym .= mb_substr($w, 0, 1);
  }
  return $acronym;
}
function getUserCategoryType($type)
{
  $eplode = explode(',', $type);
  $content = '';
  foreach ($eplode as $e) {
    if ($e == 1) {
      $content .= '<span class="badge badge-white">
            <svg class="h-1.5 w-1.5 fill-success-500" viewBox="0 0 6 6" aria-hidden="true">
              <circle cx="3" cy="3" r="3"></circle>
            </svg>
            DMS
          </span>';
    }
    if ($e == 2) {
      $content .= '<span class="badge badge-white">
            <svg class="h-1.5 w-1.5 fill-warning-500" viewBox="0 0 6 6" aria-hidden="true">
              <circle cx="3" cy="3" r="3"></circle>
            </svg>
            GST
          </span>';
    }
  }

  return $content;
}
function getViewStatus($type)
{
  $content = "";
  if ($type == 1) {
    $content = '
        <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
          <path d="M11.143 17.961c-3.221 -.295 -5.936 -2.281 -8.143 -5.961c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6c-.222 .37 -.449 .722 -.68 1.057">
          </path>
          <path d="M15 19l2 2l4 -4"></path>
        </svg>
      ';
  } else {
    $content = '
        <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
          <path d="M14.473 17.659a8.897 8.897 0 0 1 -2.473 .341c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
          </path>
          <path d="M19 16v3"></path>
          <path d="M19 22v.01"></path>
        </svg>
     ';
  }

  return $content;
}

function formatedSupportId($id)
{
  return "SR#" . sprintf("%'.05d\n", $id);
}

function getSupportTicketStatus($status)
{
  $content = "";
  if ($status == 0) {
    $content = '<span class="badge badge-default-light">
    <svg aria-hidden="true" class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
      <path d="M12 6l0 -3"></path>
      <path d="M16.25 7.75l2.15 -2.15"></path>
      <path d="M18 12l3 0"></path>
      <path d="M16.25 16.25l2.15 2.15"></path>
      <path d="M12 18l0 3"></path>
      <path d="M7.75 16.25l-2.15 2.15"></path>
      <path d="M6 12l-3 0"></path>
      <path d="M7.75 7.75l-2.15 -2.15"></path>
    </svg>
    In Progress
  </span>';
  } else {
    $content = '<span class="badge badge-success-light">
    <svg aria-hidden="true" class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
      <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
    </svg>
    Resolved
  </span>';
  }
  return $content;
}
function getAccountantDetail($id)
{
  return AccountantDetails::where(['accountant_id' => $id])->first();
}

function time_elapsed_string($datetime, $full = false)
{
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
    'y' => 'year',
    'm' => 'month',
    'w' => 'week',
    'd' => 'day',
    'h' => 'hour',
    'i' => 'minute',
    's' => 'second',
  );
  foreach ($string as $k => &$v) {
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    } else {
      unset($string[$k]);
    }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function getLastNotifications($id)
{
  return Notifications::where(['to_id' => $id])->orderBy('id', 'desc')->limit(4, 0)->get()->toArray();
}
function checkUnreadNotification($id)
{
  return Notifications::where(['to_id' => $id, 'read_status' => 0])->get()->count();
}
function getClientCount($id)
{
  return User::select('id')->where(['user_type' => 3, 'added_by' => $id])->get()->count();
}
function getMonths()
{
  return ["04" => 'April', "05" => 'May', "06" => 'June', "07" => 'July', "08" => 'August', "09" => 'Suptember', "10" => 'October', "11" => 'November', "12" => "December", "01" => "January", "02" => "February", "03" => "March"];
}
function getKeyByStateAndRate($countArr, $place, $rate, $place_key = 'place', $rate_key = 'rate')
{
  if (count($countArr) > 0) {
    foreach ($countArr as $key => $value) {
      if (isset($value[$place_key]) && isset($value[$rate_key]) && $value[$place_key] == $place && $value[$rate_key] == $rate) {
        return $key;
      }
    }
  }
  return null;
}


function getGstFileTotal($document, $type)
{
  $filename = explode('.', $document);
  $count = 0;
  if (end($filename) == 'xlsx' || end($filename) == 'xls') {
    $filepath = public_path('upload/documents/' . $document);
    $reader = new ReaderXlsx();
    $spreadSheet = $reader->load($filepath);
    $activeSheet = $spreadSheet->getActiveSheet();
    $sheet = $reader->listWorksheetInfo($filepath);
    $totalRows = $sheet[0]['totalRows'];
    if ($type == "forward_sheet") {
      for ($i = 2; $i <= $totalRows; $i++) {
        $count  = (float)$count + (float)$activeSheet->getCell("AC{$i}")->getCalculatedValue();
      }
    } elseif ($type == "sales") {
      $activeSheet = $spreadSheet->getSheetByName('Sales Report');
      $totalRows = $sheet[1]['totalRows'];
      for ($i = 2; $i <= $totalRows; $i++) {

        $count  = (float)$count + (float)$activeSheet->getCell("X{$i}")->getCalculatedValue();
      }
    } elseif ($type == "gst") {
      $filepath = public_path('upload/documents/' . $document);
      $reader = new ReaderXlsx();
      $spreadSheet = $reader->load($filepath);
      $activeSheet = $spreadSheet->getSheetByName('Section 7(A)(2) in GSTR-1');
      $sheet = $reader->listWorksheetInfo($filepath);
      $totalRows = $sheet[2]['totalRows'];
      for ($i = 2; $i <= $totalRows; $i++) {

        $count  = (float)$count + (float)$activeSheet->getCell("D{$i}")->getCalculatedValue();
      }

      $activeSheet = $spreadSheet->getSheetByName('Section 7(B)(2) in GSTR-1');
      $sheet = $reader->listWorksheetInfo($filepath);
      $totalRows = $sheet[3]['totalRows'];
      for ($i = 2; $i <= $totalRows; $i++) {
        $count  = (float)$count + (float)$activeSheet->getCell("D{$i}")->getCalculatedValue();
      }
    } else {
      for ($i = 2; $i <= $totalRows; $i++) {
        $count  = (float)$count + (float)$activeSheet->getCell("AE{$i}")->getCalculatedValue();
      }
    }
  } else {

    $filepath = public_path('upload/documents/' . $document);
    $file = fopen($filepath, "r");
    $i = 0;
    while (($data = fgetcsv($file, 50000, ",")) !== FALSE) {

      if ($i != 0) {
        if ($type == "b2b" || $type == "b2c") {
          $count  = (float)$count + (float)$data[28];
        }
      }
      $i++;
    }
  }

  return (float)$count;
}

function dataSummaryArr()
{
  return [
    'voucher' => 0,
    'taxable_amount' => 0,
    'integrated_tax' => 0,
    'central_tax' => 0,
    'state_tax' => 0,
    'cess_amount' => 0,
    'invoice_amount' => 0
  ];
}

function getTotalOfFiled($document, $countArr = [], $type = null)
{
  $filename = public_path('upload/documents/' . $document);
  $file = fopen($filename, "r");
  $i = 0;
  $states = array();

  while (($data = fgetcsv($file, 50000, ",")) !== FALSE) {

    if ($i != 0) {
      if ($type) {
        if (($type == 'b2c_large' && (float)$data[27] > 250000) || ($type == 'b2c' && (float)$data[27] <= 250000)) {

          array_push($states, $data[12]);
          $countArr['taxable_amount']  = (float)$countArr['taxable_amount'] + (float)$data[28];
          $countArr['integrated_tax']  = (float)$countArr['integrated_tax'] + (float)($data[28] * $data[33]);
          $countArr['central_tax']  = (float)$countArr['central_tax'] + (float)($data[28] * $data[30]);
          $countArr['state_tax']  = (float)$countArr['state_tax'] + (float)($data[28] * $data[31]);
          $countArr['cess_amount']  = (float)$countArr['cess_amount'] + (float)$data[34];
          $countArr['invoice_amount']  = (float)$countArr['invoice_amount'] + (float)$data[27];
        }

        if (($type == "b2b" && strtolower($data[3]) != 'refund') || ($type == "credit_notes" && strtolower($data[3]) == 'refund')) {

          if (($type == "b2b" && strtolower($data[3]) == "shipment") || ($type == "credit_notes" && strtolower($data[3]) == 'refund'))  $countArr['voucher']  = (float)$countArr['voucher'] + 1;
          array_push($states, $data[11]);
          $countArr['taxable_amount']  = (float)$countArr['taxable_amount'] + (float)$data[28];
          $countArr['integrated_tax']  = (float)$countArr['integrated_tax'] + (float)($data[28] * $data[33]);
          $countArr['central_tax']  = (float)$countArr['central_tax'] + (float)($data[28] * $data[30]);
          $countArr['state_tax']  = (float)$countArr['state_tax'] + (float)($data[28] * $data[31]);
          $countArr['cess_amount']  = (float)$countArr['cess_amount'] + (float)($data[34]);
          $countArr['invoice_amount']  = (float)$countArr['invoice_amount'] + (float)($data[27]);
        }
      }
    }
    $i++;
  }
  if ($type == 'b2c' || $type == 'b2c_large') $countArr['voucher']  = (float)$countArr['voucher'] + count(array_unique($states));
  return $countArr;
}

function getGstType($type)
{
  if ($type == 2) return "Quarterly";
  else return "Monthly";
}

function getTotalDataSummary($arr, $addArr)
{
  $arr['taxable_amount']  = (float)$arr['taxable_amount'] + (float)$addArr['taxable_amount'];
  $arr['integrated_tax']  = (float)$arr['integrated_tax'] + (float)$addArr['integrated_tax'];
  $arr['central_tax']  = (float)$arr['central_tax'] + (float)$addArr['central_tax'];
  $arr['state_tax']  = (float)$arr['state_tax'] + (float)$addArr['state_tax'];
  $arr['cess_amount']  = (float)$arr['cess_amount'] + (float)$addArr['cess_amount'];
  $arr['invoice_amount']  = (float)$arr['invoice_amount'] + (float)$addArr['invoice_amount'];

  return $arr;
}

function getTotalOfFiledXls($document, $countArr = [], $type = null, $document_type)
{
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getActiveSheet();
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[0]['totalRows'];
  $voucherArr = array();
  for ($i = 2; $i <= $totalRows; $i++) {

    if (($type == 'b2c_large' && (float)$activeSheet->getCell("AB{$i}")->getCalculatedValue() > 250000) || ($type == 'b2c' && (float)$activeSheet->getCell("AB{$i}")->getCalculatedValue() <= 250000)) {
      array_push($voucherArr, ['state' => $activeSheet->getCell("AD{$i}")->getCalculatedValue(),  'gst_rate' => $activeSheet->getCell("S{$i}")->getCalculatedValue()]);

      $countArr['taxable_amount']  = $countArr['taxable_amount'] + $activeSheet->getCell("AC{$i}")->getCalculatedValue();
      if (strtolower($activeSheet->getCell("J{$i}")->getCalculatedValue()) != strtolower($activeSheet->getCell("AD{$i}")->getCalculatedValue())) {
        $countArr['integrated_tax']  = $countArr['integrated_tax'] + (($activeSheet->getCell("AC{$i}")->getCalculatedValue() * $activeSheet->getCell("S{$i}")->getCalculatedValue()) / 100);
      } else {
        $countArr['central_tax']  = $countArr['central_tax'] + ((($activeSheet->getCell("AC{$i}")->getCalculatedValue() * $activeSheet->getCell("S{$i}")->getCalculatedValue()) / 100) / 2);
        $countArr['state_tax']  = $countArr['state_tax'] + ((($activeSheet->getCell("AC{$i}")->getCalculatedValue() * $activeSheet->getCell("S{$i}")->getCalculatedValue()) / 100) / 2);
      }
      $countArr['cess_amount']  = $countArr['cess_amount'];
      $countArr['invoice_amount']  = $countArr['invoice_amount'] + $activeSheet->getCell("AB{$i}")->getCalculatedValue();
    }
  }
  $countArr['voucher']  = (float)$countArr['voucher'] + count(array_unique($voucherArr, SORT_REGULAR));
  return $countArr;
}

function getTotalOfFiledXlsReverse($document, $countArr = [], $type = null, $document_type)
{
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getActiveSheet();
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[0]['totalRows'];
  $voucherArr = array();
  for ($i = 2; $i <= $totalRows; $i++) {

    if (($type == 'b2c_large' && (float)$activeSheet->getCell("AD{$i}")->getCalculatedValue() > 250000) || ($type == 'b2c' && (float)$activeSheet->getCell("AD{$i}")->getCalculatedValue() <= 250000)) {

      array_push($voucherArr, ['state' => $activeSheet->getCell("AF{$i}")->getCalculatedValue(),  'gst_rate' => $activeSheet->getCell("P{$i}")->getCalculatedValue()]);
      $countArr['taxable_amount']  = $countArr['taxable_amount'] - $activeSheet->getCell("AE{$i}")->getCalculatedValue();
      if (strtolower($activeSheet->getCell("I{$i}")->getCalculatedValue()) != strtolower($activeSheet->getCell("AF{$i}")->getCalculatedValue())) {

        $countArr['integrated_tax']  = ($countArr['integrated_tax'] - (($activeSheet->getCell("AE{$i}")->getCalculatedValue() * $activeSheet->getCell("P{$i}")->getCalculatedValue()) / 100));
      } else {
        $countArr['central_tax']  = $countArr['central_tax'] - ((($activeSheet->getCell("AE{$i}")->getCalculatedValue() * $activeSheet->getCell("P{$i}")->getCalculatedValue()) / 100) / 2);
        $countArr['state_tax']  = $countArr['state_tax'] - ((($activeSheet->getCell("AE{$i}")->getCalculatedValue() * $activeSheet->getCell("P{$i}")->getCalculatedValue()) / 100) / 2);
      }

      $countArr['cess_amount']  = $countArr['cess_amount'];
      $countArr['invoice_amount']  = $countArr['invoice_amount'] - $activeSheet->getCell("AD{$i}")->getCalculatedValue();
    }
  }
  $countArr['voucher']  = (float)$countArr['voucher'] - count(array_unique($voucherArr, SORT_REGULAR));
  return $countArr;
}
function getTotalOfFieldSalesReport($document, $countArr = [], $type = null)
{
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getSheetByName('Sales Report');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[1]['totalRows'];
  $voucherArr = array();
  for ($i = 2; $i <= $totalRows; $i++) {

    if (($type == 'b2c_large' && (float)$activeSheet->getCell("AT{$i}")->getCalculatedValue() > 250000) || ($type == 'b2c' && (float)$activeSheet->getCell("AT{$i}")->getCalculatedValue() <= 250000)) {

      if ($activeSheet->getCell("AE{$i}")->getCalculatedValue() != 0) {
        array_push($voucherArr, ['state' => $activeSheet->getCell("AV{$i}")->getCalculatedValue(),  'gst_rate' => $activeSheet->getCell("AE{$i}")->getCalculatedValue()]);
      } else {
        array_push($voucherArr, ['state' => $activeSheet->getCell("AV{$i}")->getCalculatedValue(),  'gst_rate' => $activeSheet->getCell("AG{$i}")->getCalculatedValue()]);
      }

      $countArr['taxable_amount']  = $countArr['taxable_amount'] + $activeSheet->getCell("X{$i}")->getCalculatedValue();


      $countArr['integrated_tax']  = ($countArr['integrated_tax'] + (($activeSheet->getCell("X{$i}")->getCalculatedValue() * $activeSheet->getCell("AE{$i}")->getCalculatedValue()) / 100));

      $countArr['central_tax']  = $countArr['central_tax'] + ((($activeSheet->getCell("X{$i}")->getCalculatedValue() * $activeSheet->getCell("AG{$i}")->getCalculatedValue()) / 100));
      $countArr['state_tax']  = $countArr['state_tax'] + ((($activeSheet->getCell("X{$i}")->getCalculatedValue() * $activeSheet->getCell("AI{$i}")->getCalculatedValue()) / 100));


      $countArr['cess_amount']  = $countArr['cess_amount'];
      $countArr['invoice_amount']  = $countArr['invoice_amount'] + $activeSheet->getCell("AT{$i}")->getCalculatedValue();
    }
  }
  $countArr['voucher']  = (float)$countArr['voucher'] + count(array_unique($voucherArr, SORT_REGULAR));
  return $countArr;
}

function getTotalOfFieldGSTReport($document, $countArr = [], $type = null)
{
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getSheetByName('Section 7(A)(2) in GSTR-1');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[2]['totalRows'];
  for ($i = 2; $i <= $totalRows; $i++) {

    if (($type == 'b2c_large' && (float)$activeSheet->getCell("B{$i}")->getCalculatedValue() > 250000) || ($type == 'b2c' && (float)$activeSheet->getCell("B{$i}")->getCalculatedValue() <= 250000)) {

      $countArr['voucher']  = (float)$countArr['voucher'] + 1;
      $countArr['taxable_amount']  = $countArr['taxable_amount'] + $activeSheet->getCell("D{$i}")->getCalculatedValue();

      $countArr['central_tax']  = $countArr['central_tax'] + ($activeSheet->getCell("E{$i}")->getCalculatedValue() * $activeSheet->getCell("D{$i}")->getCalculatedValue() / 100);
      $countArr['state_tax']  = $countArr['state_tax'] + ($activeSheet->getCell("D{$i}")->getCalculatedValue() * $activeSheet->getCell("G{$i}")->getCalculatedValue() / 100);

      $countArr['cess_amount']  = $countArr['cess_amount'] + $activeSheet->getCell("J{$i}")->getCalculatedValue();
      $countArr['invoice_amount']  = $countArr['invoice_amount'] + ($activeSheet->getCell("F{$i}")->getCalculatedValue() + $activeSheet->getCell("H{$i}")->getCalculatedValue() + $activeSheet->getCell("J{$i}")->getCalculatedValue() + $activeSheet->getCell("D{$i}")->getCalculatedValue());
    }
  }


  $activeSheet = $spreadSheet->getSheetByName('Section 7(B)(2) in GSTR-1');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[3]['totalRows'];
  for ($i = 2; $i <= $totalRows; $i++) {

    if (($type == 'b2c_large' && (float)$activeSheet->getCell("B{$i}")->getCalculatedValue() > 250000) || ($type == 'b2c' && (float)$activeSheet->getCell("B{$i}")->getCalculatedValue() <= 250000)) {

      $countArr['voucher']  = (float)$countArr['voucher'] + 1;
      $countArr['taxable_amount']  = $countArr['taxable_amount'] + $activeSheet->getCell("D{$i}")->getCalculatedValue();

      $countArr['integrated_tax']  = $countArr['integrated_tax'] + ($activeSheet->getCell("E{$i}")->getCalculatedValue() * $activeSheet->getCell("D{$i}")->getCalculatedValue() / 100);

      $countArr['cess_amount']  = $countArr['cess_amount'] + $activeSheet->getCell("H{$i}")->getCalculatedValue();
      $countArr['invoice_amount']  = $countArr['invoice_amount'] + ($activeSheet->getCell("F{$i}")->getCalculatedValue() + $activeSheet->getCell("H{$i}")->getCalculatedValue() + $activeSheet->getCell("D{$i}")->getCalculatedValue());
    }
  }
  return $countArr;
}


function gstCodeByState($state)
{
  $codeList = [
    'Andaman And Nicobar Islands' => "35",
    'Andaman & Nicobar Islands' => "35",
    'Andhra Pradesh' => "37",
    'Andhrapradesh' => "37",
    'Arunachal Pradesh' => "12",
    'Assam' => "18",
    'Bihar' => "10",
    'Chandigarh' => "04",
    'Chhattisgarh' => "22",
    'Dadra And Nagar Haveli' => "26",
    'The Dadra And Nagar Haveli And Daman And Diu' => "26",
    'Dadra And Nagar Haveli And Daman And Diu' => "26",
    'Daman And Diu' => "26",
    'Delhi' => "07",
    'Goa' => "30",
    'Gujarat' => "24",
    'Haryana' => "06",
    'Himachal Pradesh' => "02",
    'Jammu And Kashmir' => "01",
    'Jammu & Kashmir' => "01",
    'Jharkhand' => "20",
    'Karnataka' => "29",
    'Kerala' => "32",
    'Lakshadweep Islands' => "31",
    'Madhya Pradesh' => "23",
    'Maharashtra' => "27",
    'Manipur' => "14",
    'Meghalaya' => "17",
    'Mizoram' => "15",
    'Nagaland' => "13",
    'Odisha' => "21",
    'Pondicherry' => "34",
    'Puducherry' => "34",
    'Punjab' => "03",
    'Rajasthan' => "08",
    'Sikkim' => "11",
    'Tamil Nadu' => "33",
    'Telangana' => "36",
    'Tripura' => "16",
    'Uttar Pradesh' => "09",
    'Uttarpradesh' => "09",
    'Uttarakhand' => "05",
    'West Bengal' => "19",
    'Ladakh' => "38"
  ];

  return $codeList[ucwords(strtolower(trim($state)))];
}


function getFlipKartGstCsv($document,  $countArr = [])
{
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getSheetByName('Section 7(A)(2) in GSTR-1');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[2]['totalRows'];

  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $place = "24-Gujarat";
    $rate = $activeSheet->getCell("E{$i}")->getCalculatedValue() + $activeSheet->getCell("G{$i}")->getCalculatedValue();;
    $key =  getKeyByStateAndRate($countArr, $place, $rate);



    if ($key) {
      $countArr[$key]['taxable_value'] = $countArr[$key]['taxable_value'] + $activeSheet->getCell("D{$i}")->getCalculatedValue();
      $countArr[$key]['cess_amount'] = $countArr[$key]['cess_amount'] + $activeSheet->getCell("J{$i}")->getCalculatedValue();
    } else {
      $subArr['type'] = "OE";
      $subArr['place'] = $place;
      $subArr['rate'] = $rate;
      $subArr['applicable_rate'] = 0;
      $subArr['taxable_value'] = $activeSheet->getCell("D{$i}")->getCalculatedValue();
      $subArr['cess_amount'] = $activeSheet->getCell("J{$i}")->getCalculatedValue();
      $subArr['gstin'] = "";
      array_push($countArr, $subArr);
    }
  }

  $activeSheet = $spreadSheet->getSheetByName('Section 7(B)(2) in GSTR-1');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[3]['totalRows'];

  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $place = gstCodeByState($activeSheet->getCell("I{$i}")->getCalculatedValue()) . '-' . $activeSheet->getCell("I{$i}")->getCalculatedValue();
    $rate = $activeSheet->getCell("E{$i}")->getCalculatedValue();
    $key =  getKeyByStateAndRate($countArr, $place, $rate);


    if ($key) {
      $countArr[$key]['taxable_value'] = $countArr[$key]['taxable_value'] + $activeSheet->getCell("D{$i}")->getCalculatedValue();
      $countArr[$key]['cess_amount'] = $countArr[$key]['cess_amount'] + $activeSheet->getCell("H{$i}")->getCalculatedValue();
    } else {
      $subArr['type'] = "OE";
      $subArr['place'] = $place;
      $subArr['rate'] = $rate;
      $subArr['applicable_rate'] = 0;
      $subArr['taxable_value'] = $activeSheet->getCell("D{$i}")->getCalculatedValue();
      $subArr['cess_amount'] = $activeSheet->getCell("H{$i}")->getCalculatedValue();
      $subArr['gstin'] = "";
      array_push($countArr, $subArr);
    }
  }
  $countArr = formatedCsvValue($countArr);
  return $countArr;
}

function getFlipKartGstJson($document, $countArr = [])
{
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getSheetByName('Section 7(A)(2) in GSTR-1');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[2]['totalRows'];

  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $place = '24';
    $rate = $activeSheet->getCell("E{$i}")->getCalculatedValue() + $activeSheet->getCell("G{$i}")->getCalculatedValue();
    $key =  getKeyByStateAndRate($countArr, $place, $rate, 'pos', 'rt');
    if ($key) {
      $countArr[$key]['txval'] = $countArr[$key]['txval'] + $activeSheet->getCell("D{$i}")->getCalculatedValue();
      $countArr[$key]['csamt'] = $countArr[$key]['csamt'] + $activeSheet->getCell("J{$i}")->getCalculatedValue();
      $countArr[$key]['samt'] = $countArr[$key]['samt'] + $activeSheet->getCell("H{$i}")->getCalculatedValue();
      $countArr[$key]['camt'] = $countArr[$key]['camt'] + $activeSheet->getCell("F{$i}")->getCalculatedValue();
    } else {
      $subArr['sply_ty'] = "INTRA";
      $subArr['rt'] = $rate;
      $subArr['typ'] = "OE";
      $subArr['pos'] = $place;

      $subArr['iamt'] = 0;
      $subArr['samt'] = $activeSheet->getCell("F{$i}")->getCalculatedValue();
      $subArr['camt'] = $activeSheet->getCell("H{$i}")->getCalculatedValue();
      $subArr['txval'] = $activeSheet->getCell("D{$i}")->getCalculatedValue();
      $subArr['csamt'] = $activeSheet->getCell("J{$i}")->getCalculatedValue();
      array_push($countArr, $subArr);
    }
  }

  $activeSheet = $spreadSheet->getSheetByName('Section 7(B)(2) in GSTR-1');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[3]['totalRows'];

  $place = gstCodeByState($activeSheet->getCell("I{$i}")->getCalculatedValue());
  $rate = $activeSheet->getCell("E{$i}")->getCalculatedValue();
  $key =  getKeyByStateAndRate($countArr, $place, $rate, 'pos', 'rt');
  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    if ($key) {
      $countArr[$key]['txval'] = $countArr[$key]['txval'] + $activeSheet->getCell("D{$i}")->getCalculatedValue();
      $countArr[$key]['csamt'] = $countArr[$key]['csamt'] + $activeSheet->getCell("H{$i}")->getCalculatedValue();
      $countArr[$key]['iamt'] = $countArr[$key]['iamt'] + $activeSheet->getCell("F{$i}")->getCalculatedValue();
    } else {
      $subArr['sply_ty'] = "INTER";
      $subArr['rt'] = $rate;
      $subArr['type'] = "OE";
      $subArr['pos'] = $place;

      $subArr['iamt'] = $activeSheet->getCell("F{$i}")->getCalculatedValue();
      $subArr['samt'] = 0;
      $subArr['camt'] = 0;
      $subArr['txval'] = $activeSheet->getCell("D{$i}")->getCalculatedValue();
      $subArr['csamt'] = $activeSheet->getCell("H{$i}")->getCalculatedValue();
      array_push($countArr, $subArr);
    }
  }

  $countArr = formatedJsonValue($countArr);

  return $countArr;
}

function getFlipKartSalesCsv($document, $countArr = [])
{
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);


  $activeSheet = $spreadSheet->getSheetByName('Sales Report');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[1]['totalRows'];
  $subArr = [];

  for ($i = 2; $i <= $totalRows; $i++) {
    $place = gstCodeByState($activeSheet->getCell("AX{$i}")->getCalculatedValue()) . '-' . $activeSheet->getCell("AX{$i}")->getCalculatedValue();
    if ($activeSheet->getCell("AE{$i}")->getCalculatedValue() == 0) {
      $rate = $activeSheet->getCell("AG{$i}")->getCalculatedValue() + $activeSheet->getCell("AI{$i}")->getCalculatedValue();
    } else {
      $rate = $activeSheet->getCell("AE{$i}")->getCalculatedValue();
    }
    $key = getKeyByStateAndRate($countArr, $place, $rate);

    if ($key) {
      $countArr[$key]['taxable_value'] = $countArr[$key]['taxable_value'] + $activeSheet->getCell("X{$i}")->getCalculatedValue();
    } else {
      $subArr['type'] = "OE";
      $subArr['place'] = $place;
      $subArr['rate'] = $rate;
      $subArr['applicable_rate'] = 0;
      $subArr['taxable_value'] = $activeSheet->getCell("X{$i}")->getCalculatedValue();
      $subArr['cess_amount'] = 0;
      $subArr['gstin'] = "";
      array_push($countArr, $subArr);
    }
  }

  $countArr = formatedCsvValue($countArr);
  return $countArr;
}

function getFlipKartSalesJson($document, $countArr = [])
{
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getSheetByName('Sales Report');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[1]['totalRows'];

  $subArr = [];
  for ($i = 2; $i <= $totalRows; $i++) {

    $place = gstCodeByState($activeSheet->getCell("AX{$i}")->getCalculatedValue());

    if ($activeSheet->getCell("AE{$i}")->getCalculatedValue() == 0) {
      $rate = $activeSheet->getCell("AG{$i}")->getCalculatedValue() + $activeSheet->getCell("AI{$i}")->getCalculatedValue();
      $suply = "INTRA";
    } else {
      $suply = "INTER";
      $rate = $activeSheet->getCell("AE{$i}")->getCalculatedValue();
    }
    $key = getKeyByStateAndRate($countArr, $place, $rate, 'pos', 'rt');
    if ($key) {
      $countArr[$key]['txval'] = $countArr[$key]['txval'] + $activeSheet->getCell("X{$i}")->getCalculatedValue();
      $countArr[$key]['iamt'] = $countArr[$key]['iamt'] + $activeSheet->getCell("AE{$i}")->getCalculatedValue() * $activeSheet->getCell("X{$i}")->getCalculatedValue() / 100;
      $countArr[$key]['samt'] = $countArr[$key]['samt'] + $activeSheet->getCell("AI{$i}")->getCalculatedValue() * $activeSheet->getCell("X{$i}")->getCalculatedValue() / 100;
      $countArr[$key]['camt'] = $countArr[$key]['camt'] + $activeSheet->getCell("AG{$i}")->getCalculatedValue() * $activeSheet->getCell("X{$i}")->getCalculatedValue() / 100;
    } else {
      $subArr['sply_ty'] = $suply;
      $subArr['rt'] = $rate;
      $subArr['typ'] = "OE";
      $subArr['pos'] = $place;

      $subArr['iamt'] = $activeSheet->getCell("AE{$i}")->getCalculatedValue() * $activeSheet->getCell("X{$i}")->getCalculatedValue() / 100;
      $subArr['samt'] = $activeSheet->getCell("AI{$i}")->getCalculatedValue() * $activeSheet->getCell("X{$i}")->getCalculatedValue() / 100;
      $subArr['camt'] = $activeSheet->getCell("AG{$i}")->getCalculatedValue() * $activeSheet->getCell("X{$i}")->getCalculatedValue() / 100;
      $subArr['txval'] = $activeSheet->getCell("X{$i}")->getCalculatedValue();
      $subArr['csamt'] = 0;
      array_push($countArr, $subArr);
    }
  }

  $countArr = formatedJsonValue($countArr);
  return $countArr;
}


function getMeeshoForwardCsv($document, $countArr = [])
{

  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getActiveSheet();
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[0]['totalRows'];
  $subArr = [];
  for ($i = 2; $i <= $totalRows; $i++) {
    $place = gstCodeByState($activeSheet->getCell("AD{$i}")->getCalculatedValue()) . '-' . $activeSheet->getCell("AD{$i}")->getCalculatedValue();

    $rate = $activeSheet->getCell("S{$i}")->getCalculatedValue();
    $key = getKeyByStateAndRate($countArr, $place, $rate);



    if ($key && $countArr[$key]['rate'] == $rate) {
      $countArr[$key]['taxable_value'] = $countArr[$key]['taxable_value'] + $activeSheet->getCell("AC{$i}")->getCalculatedValue();
    } else {
      $subArr['type'] = "OE";
      $subArr['place'] = $place;
      $subArr['rate'] = $rate;
      $subArr['applicable_rate'] = 0;
      $subArr['taxable_value'] = $activeSheet->getCell("AC{$i}")->getCalculatedValue();
      $subArr['cess_amount'] = 0;
      $subArr['gstin'] = "";
      array_push($countArr, $subArr);
    }
  }

  $countArr = formatedCsvValue($countArr);
  return $countArr;
}

function getMeeshoReverseCsv($document, $countArr = [])
{


  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getActiveSheet();
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[0]['totalRows'];
  $subArr = [];
  for ($i = 2; $i <= $totalRows; $i++) {
    $place = gstCodeByState($activeSheet->getCell("AF{$i}")->getCalculatedValue()) . '-' . $activeSheet->getCell("AF{$i}")->getCalculatedValue();

    $rate = $activeSheet->getCell("P{$i}")->getCalculatedValue();
    $key = getKeyByStateAndRate($countArr, $place, $rate);


    if ($key && $countArr[$key]['rate'] == $rate) {
      $countArr[$key]['taxable_value'] = $countArr[$key]['taxable_value'] - $activeSheet->getCell("AE{$i}")->getCalculatedValue();
    } else {
      $subArr['type'] = "OE";
      $subArr['place'] = $place;
      $subArr['rate'] = $rate;
      $subArr['applicable_rate'] = 0;
      $subArr['taxable_value'] = 0 - $activeSheet->getCell("AE{$i}")->getCalculatedValue();
      $subArr['cess_amount'] = 0;
      $subArr['gstin'] = "";
      array_push($countArr, $subArr);
    }
  }
  $countArr = formatedCsvValue($countArr);
  return $countArr;
}

function getMeeshoForwardJson($document, $countArr = [])
{


  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getActiveSheet();
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[0]['totalRows'];

  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $place = gstCodeByState($activeSheet->getCell("AD{$i}")->getCalculatedValue());
    $rate = $activeSheet->getCell("S{$i}")->getCalculatedValue();

    if (gstCodeByState($activeSheet->getCell("AD{$i}")->getCalculatedValue()) == gstCodeByState($activeSheet->getCell("J{$i}")->getCalculatedValue())) {
      $suply = "INTRA";
      $igst = 0;
      $sgst = $activeSheet->getCell("S{$i}")->getCalculatedValue() * $activeSheet->getCell("AC{$i}")->getCalculatedValue() / 200;
    } else {
      $suply = "INTER";
      $igst = $activeSheet->getCell("S{$i}")->getCalculatedValue() * $activeSheet->getCell("AC{$i}")->getCalculatedValue() / 100;
      $sgst = 0;
    }
    $key = getKeyByStateAndRate($countArr, $place, $rate, 'pos', 'rt');
    if ($key) {
      $countArr[$key]['txval'] = $countArr[$key]['txval'] + $activeSheet->getCell("AC{$i}")->getCalculatedValue();
      $countArr[$key]['iamt'] = $countArr[$key]['iamt'] + $igst;
      $countArr[$key]['samt'] = $countArr[$key]['samt'] + $sgst;
      $countArr[$key]['camt'] = $countArr[$key]['camt'] + $sgst;
    } else {
      $subArr['sply_ty'] = $suply;
      $subArr['rt'] = $rate;
      $subArr['type'] = "OE";
      $subArr['pos'] = $place;
      $subArr['iamt'] = $igst;
      $subArr['samt'] = $sgst;
      $subArr['camt'] = $sgst;
      $subArr['txval'] = $activeSheet->getCell("AC{$i}")->getCalculatedValue();
      $subArr['csamt'] = 0;
      array_push($countArr, $subArr);
    }
  }

  $countArr = formatedJsonValue($countArr);
  return $countArr;
}

function getMeeshoReverseJson($document, $countArr = [])
{

  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getActiveSheet();
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[0]['totalRows'];
  $subArr = [];
  for ($i = 2; $i <= $totalRows; $i++) {

    $place = gstCodeByState($activeSheet->getCell("AF{$i}")->getCalculatedValue());
    $rate = $activeSheet->getCell("P{$i}")->getCalculatedValue();

    if (gstCodeByState($activeSheet->getCell("AF{$i}")->getCalculatedValue()) == gstCodeByState($activeSheet->getCell("I{$i}")->getCalculatedValue())) {
      $suply = "INTRA";
      $igst = 0;
      $sgst = $activeSheet->getCell("P{$i}")->getCalculatedValue() * $activeSheet->getCell("AE{$i}")->getCalculatedValue() / 200;
    } else {
      $suply = "INTER";
      $igst = $activeSheet->getCell("P{$i}")->getCalculatedValue() * $activeSheet->getCell("AE{$i}")->getCalculatedValue() / 100;
      $sgst = 0;
    }
    $key = getKeyByStateAndRate($countArr, $place, $rate, 'pos', 'rt');
    if ($key) {
      $countArr[$key]['txval'] = $countArr[$key]['txval'] - $activeSheet->getCell("AE{$i}")->getCalculatedValue();
      $countArr[$key]['iamt'] = $countArr[$key]['iamt'] - $igst;
      $countArr[$key]['samt'] = $countArr[$key]['samt'] - $sgst;
      $countArr[$key]['camt'] = $countArr[$key]['camt'] - $sgst;
    } else {
      $subArr['sply_ty'] = $suply;
      $subArr['rt'] = $rate;
      $subArr['type'] = "OE";
      $subArr['pos'] = $place;
      $subArr['iamt'] = 0 - $igst;
      $subArr['samt'] = 0 - $sgst;
      $subArr['camt'] = 0 - $sgst;
      $subArr['txval'] = 0 - $activeSheet->getCell("AE{$i}")->getCalculatedValue();
      $subArr['csamt'] = 0;
      array_push($countArr, $subArr);
    }
  }

  $countArr = formatedJsonValue($countArr);

  return $countArr;
}

function formatedJsonValue($countArr)
{
  $countArr = array_map(function ($d) {
    $d['rt'] = (float)$d['rt'];
    $d['txval'] = (float)round($d['txval'], 2);
    $d['iamt'] = (float)round($d['iamt'], 2);
    $d['samt'] = (float)round($d['samt'], 2);
    $d['camt'] = (float)round($d['camt'], 2);
    $d['csamt'] = (float)round($d['csamt'], 2);
    $d['pos'] = (string)$d['pos'];
    return $d;
  }, $countArr);

  return $countArr;
}
function formatedCsvValue($countArr)
{
  $countArr = array_map(function ($d) {
    $d['taxable_value'] = (float)round($d['taxable_value'], 2);
    $d['cess_amount'] = (float)round($d['cess_amount'], 2);
    return $d;
  }, $countArr);

  return $countArr;
}

function amazoneB2bCsv($document, $countArr = [], $type = null)
{

  if (count($countArr) > 0) {
    $countArr = $countArr;
  } else {
    $countArr[] =  ['gst' => '', 'name' => '', 'invoice_no' => '', 'date' => '', 'value' => '', 'place' => '', 'reverse_charge' => '', 'applicable_tax' => '', 'type' => "", 'ec_gst' => '', 'rate' => 0, 'taxable_amount' => 0, 'cess_amount' => 0];
  }

  $subArr = [];
  $filename = public_path('upload/documents/' . $document);
  $file = fopen($filename, "r");
  $i = 0;

  while (($data = fgetcsv($file, 50000, ",")) !== FALSE) {

    if ($i != 0) {
      if (!$type  || ($type == 'credit' && strtolower($data[3]) == 'refund')) {


        $place = gstCodeByState($data[24]) . '-' . $data[24];
        if ($data[33] == 0) {
          $rate = $data[30] * 200;
        } else {
          $rate = $data[33] * 100;
        }

        $key = getKeyByStateAndRate($countArr, $data[80], $rate, 'gst', 'rate');


        if ($key && $countArr[$key]['rate'] == $rate) {
          $countArr[$key]['value'] = $countArr[$key]['value'] + $data[27];
        } else {
          $subArr['gst'] = $data[80];
          $subArr['name'] = $data[82];
          $subArr['invoice_no'] = $data[1];
          $subArr['date'] = date('d-M-y', strtotime($data[2]));
          $subArr['value'] = $data[27];
          $subArr['place'] = $place;
          $subArr['reverse_charge'] = "N";
          $subArr['applicable_tax'] = 0;
          $subArr['type'] = 'Regular B2B';
          $subArr['ec_gst'] = '';
          $subArr['rate'] = $rate;
          $subArr['taxable_amount'] = $data[28];
          $subArr['cess_amount'] = 0;
          array_push($countArr, $subArr);
        }
      }
    }
    $i++;
  }
  $countArr = array_map(function ($d) {
    $subArr['value'] = (float)round($d['taxable_amount'], 2);
    $d['taxable_amount'] = (float)round($d['taxable_amount'], 2);
    $d['cess_amount'] = (float)round($d['cess_amount'], 2);
    return $d;
  }, $countArr);
  $countArr = array_filter($countArr, function ($a) {
    return $a['taxable_amount'] != 0;
  });
  // echo "<pre>";
  // print_r($countArr);
  // die;
  return $countArr;
}

function getAmazoneB2cCsv($document,  $countArr = [])
{


  $subArr = [];
  $filename = public_path('upload/documents/' . $document);
  $file = fopen($filename, "r");
  $i = 0;

  while (($data = fgetcsv($file, 50000, ",")) !== FALSE) {
    if ($i != 0) {

      $place = gstCodeByState($data[24]) . '-' . $data[24];
      if ($data[33] == 0) {
        $rate = $data[30] * 200;
      } else {
        $rate = $data[33] * 100;
      }

      $key = getKeyByStateAndRate($countArr, $place, $rate);


      if ($key && $countArr[$key]['rate'] == $rate) {
        $countArr[$key]['taxable_value'] = $countArr[$key]['taxable_value'] + $data[28];
      } else {
        $subArr['type'] = "OE";
        $subArr['place'] = $place;
        $subArr['rate'] = $rate;
        $subArr['applicable_rate'] = 0;
        $subArr['taxable_value'] = $data[28];
        $subArr['cess_amount'] = 0;
        $subArr['gstin'] = "";
        array_push($countArr, $subArr);
      }
    }
    $i++;
  }
  $countArr = formatedCsvValue($countArr);
  return $countArr;
}

function getAmazoneB2cJson($document,  $countArr = [])
{


  $subArr = [];
  $filename = public_path('upload/documents/' . $document);
  $file = fopen($filename, "r");
  $i = 0;
  while (($data = fgetcsv($file, 50000, ",")) !== FALSE) {
    if ($i != 0) {

      $place = gstCodeByState($data[24]) . '-' . $data[24];
      if ($data[33] == 0) {
        $rate = $data[30] * 200;
        $suply = "INTRA";
        $igst = 0;
        $sgst = $data[28] * $data[30];
      } else {
        $rate = $data[33] * 100;
        $suply = "INTER";
        $igst = $data[28] * $data[33];
        $sgst = 0;
      }

      $key = getKeyByStateAndRate($countArr, $place, $rate, 'pos', 'rt');
      if ($key) {
        $countArr[$key]['txval'] = $countArr[$key]['txval'] + $data[28];
        $countArr[$key]['iamt'] = $countArr[$key]['iamt'] + $igst;
        $countArr[$key]['samt'] = $countArr[$key]['samt'] + $sgst;
        $countArr[$key]['camt'] = $countArr[$key]['camt'] + $sgst;
      } else {
        $subArr['sply_ty'] = $suply;
        $subArr['rt'] = $rate;
        $subArr['typ'] = "OE";
        $subArr['pos'] = $place;
        $subArr['iamt'] =  $igst;
        $subArr['samt'] =  $sgst;
        $subArr['camt'] =  $sgst;
        $subArr['txval'] = $data[28];
        $subArr['csamt'] = 0;
        array_push($countArr, $subArr);
      }
    }
    $i++;
  }

  $countArr = formatedJsonValue($countArr);

  return $countArr;
}
function getKeyByGstIn($countArr, $gstIn, $gstKey)
{
  if (count($countArr) > 0) {
    foreach ($countArr as $key => $value) {
      if (isset($value[$gstKey]) && $value[$gstKey] == $gstIn) {
        return $key;
      }
    }
  }
  return null;
}
function checkKeyByb2bRate($countArr, $rate)
{
  if (count($countArr) > 0) {
    foreach ($countArr as $key => $value) {
      if (isset($value['itm_det']['rt']) && $value['itm_det']['rt'] == $rate) {
        return $key;
      }
    }
  }
  return null;
}
function getAmazoneB2bJson($document,  $countArr = [], $type)
{
  $countArr[] =  ['ctin' => "", 'inv' => []];

  $filename = public_path('upload/documents/' . $document);
  $file = fopen($filename, "r");
  $i = 0;
  while (($data = fgetcsv($file, 50000, ",")) !== FALSE) {

    if ($i != 0) {
      if (($type == 'b2b' && strtolower($data[3]) == 'shipment') || ($type == 'credit' && strtolower($data[3]) == 'refund')) {



        $subArr = [];
        $sighIndicator =  $type == 'b2b' ? +1 : -1;
        if ($data[33] == 0) {
          $rate = $data[30] * 200;
          $igst = 0;
          $sgst = (float)round($sighIndicator* ($data[28] * $data[30]), 2);
        } else {
          $rate = $data[33] * 100;
          $igst = (float)round($sighIndicator* ($data[28] * $data[33]), 2);
          $sgst = 0;
        }
        $csamt = $data[34] != 0 ?  (float)($sighIndicator *round($data[34],2)) : 0;

       
        $subArr['ctin'] =  $data[80];
        $invKey = $type == 'b2b' ? 'inv' : 'inum';
        $inumKey =  $type == 'b2b' ? 'inv' : 'nt_num';
        $idtKey =  $type == 'b2b' ? 'idt' : 'nt_dt';
          
        $subArr[$invKey] = [
          [
            $inumKey => $data[1], $idtKey => date('d-m-Y', strtotime($data[7])), 'val' => (float)($sighIndicator * round($data[27], 2)), 'pos' => gstCodeByState($data[24]), 'rchrg' => "N", 'inv_typ' => "R",
            'itms' => [

              [
                "num" => 1,
                'itm_det' => [
                  'txval' => (float)($sighIndicator *round($data[28],2)), 'rt' => (float)$rate, 'iamt' => $igst, 'camt' => $sgst, 'samt' => $sgst, 'csamt' => $csamt
                ]
              ]
            ]
          ]
        ];
        if ($type == 'credit') $subArr[$invKey][0]['ntty'] = "C";
        array_push($countArr, $subArr);
      }
    }
    $i++;
  }
  return array_values($countArr);
}
