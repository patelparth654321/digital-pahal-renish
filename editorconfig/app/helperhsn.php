<?php
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;

function getKeyByHsn($countArr, $hsn, $rate, $hsnkey= 'hsn', $rtkey= 'rate')
{
  if (count($countArr) > 0) {
    foreach ($countArr as $key => $value) {
      if (isset($value[$hsnkey]) && isset($value[$rtkey]) && trim($value[$hsnkey]) == trim($hsn) && (float)$value[$rtkey] == (float)$rate) {
        return $key;
      }
    }
  }
  return null;
}
function formatedHsnValue($countArr)
{
  $countArr = array_map(function ($d) {
    $d['taxable_value'] = (float)round($d['taxable_value'], 2);
    $d['total_value'] = (float)round($d['total_value'], 2);
    $d['sgst'] = (float)round($d['sgst'], 2);
    $d['cgst'] = (float)round($d['cgst'], 2);
    $d['igst'] = (float)round($d['igst'], 2);
    $d['cess_amount'] = (float)round($d['cess_amount'], 2);
    return $d;
  }, $countArr);
  
  return $countArr;
}
function formatedHsnJsonValue($countArr)
{
  $countArr = array_map(function ($d) {
    $d['txval'] = (float)round($d['txval'], 2);
    $d['camt'] = (float)round($d['camt'], 2);
    $d['samt'] = (float)round($d['samt'], 2);
    $d['iamt'] = (float)round($d['iamt'], 2);
    $d['csamt'] = (float)round($d['csamt'], 2);
    $d['qty'] = (float)$d['qty'];
    $d['rt'] = (float)$d['rt'];
    return $d;
  }, $countArr);
 
  return $countArr;
}
function getFlipkartGstHsn($document, $countArr = [])
{

  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getSheetByName('Section 12 in GSTR-1');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[5]['totalRows'];
  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $subArr['hsn'] = $activeSheet->getCell("B{$i}")->getCalculatedValue();
    $subArr['desc'] = "";
    $subArr['uqc'] = "PCS";
    $subArr['quantity'] = $activeSheet->getCell("C{$i}")->getCalculatedValue();
    $subArr['total_value'] = $activeSheet->getCell("D{$i}")->getCalculatedValue();
    $subArr['taxable_value'] = $activeSheet->getCell("E{$i}")->getCalculatedValue();  
    $subArr['igst'] =  $activeSheet->getCell("F{$i}")->getCalculatedValue();
    $subArr['cgst'] = $activeSheet->getCell("G{$i}")->getCalculatedValue();
    $subArr['sgst'] = $activeSheet->getCell("H{$i}")->getCalculatedValue();
    $subArr['cess_amount'] = $activeSheet->getCell("I{$i}")->getCalculatedValue();
    $subArr['rate'] = round((($subArr['igst'] !=0 ? $subArr['igst'] : ($subArr['cgst'] * 2)) * 100) / $subArr['taxable_value'], 0) ;
      array_push($countArr, $subArr);
    
  }
  
  $countArr = formatedHsnValue($countArr);
  return $countArr;
}
function getFlipKartGstHsnJson($document, $countArr = [])
{
  
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getSheetByName('Section 12 in GSTR-1');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[5]['totalRows'];
  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $subArr['num'] = $i - 1;
    $subArr['hsn_sc'] = $activeSheet->getCell("B{$i}")->getCalculatedValue();
    $subArr['uqc'] = "PCS";
    $subArr['qty'] = $activeSheet->getCell("C{$i}")->getCalculatedValue();
    $subArr['txval'] = $activeSheet->getCell("E{$i}")->getCalculatedValue();  
    $subArr['iamt'] =  $activeSheet->getCell("F{$i}")->getCalculatedValue();
    $subArr['samt'] = $activeSheet->getCell("H{$i}")->getCalculatedValue();
    $subArr['camt'] = $activeSheet->getCell("G{$i}")->getCalculatedValue();
    $subArr['rt'] = round((($subArr['iamt'] !=0 ? $subArr['iamt'] : ($subArr['camt'] * 2)) * 100) / $subArr['txval'], 0) ;
    $subArr['csamt'] = $activeSheet->getCell("I{$i}")->getCalculatedValue();
    
      array_push($countArr, $subArr);
    
  }
  
  $countArr = formatedHsnJsonValue($countArr);
  return $countArr;
}

function flipkartSalesHsn($document, $countArr = []){
  
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getSheetByName('Sales Report');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[1]['totalRows'];
  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $hsn = $activeSheet->getCell("G{$i}")->getCalculatedValue();
    

    if ($activeSheet->getCell("AE{$i}")->getCalculatedValue() == 0) {
      $rate = $activeSheet->getCell("AG{$i}")->getCalculatedValue() * 2;
      $igst = 0;
      $sgst = $activeSheet->getCell("X{$i}")->getCalculatedValue() * $rate / 200;
    } else {
      $rate = $activeSheet->getCell("AE{$i}")->getCalculatedValue();
      $igst = $activeSheet->getCell("X{$i}")->getCalculatedValue() * $rate / 100;
      $sgst = 0;
    }
    $key = getKeyByHsn($countArr, $hsn, $rate);
    $signIndicator = $activeSheet->getCell("AT{$i}")->getCalculatedValue() < 0 ? -1 : +1;
    if ($key && $countArr[$key]['rate'] == $rate) {
      $countArr[$key]['taxable_value'] = $countArr[$key]['taxable_value'] + $activeSheet->getCell("X{$i}")->getCalculatedValue();
      $countArr[$key]['quantity'] = $countArr[$key]['quantity'] + ($signIndicator * $activeSheet->getCell("N{$i}")->getCalculatedValue());
      $countArr[$key]['total_value'] = $countArr[$key]['total_value'] + $activeSheet->getCell("AT{$i}")->getCalculatedValue();
      $countArr[$key]['igst'] = $countArr[$key]['igst'] + $igst;
      $countArr[$key]['cgst'] = $countArr[$key]['cgst'] + $sgst;
      $countArr[$key]['sgst'] = $countArr[$key]['sgst'] + $sgst;

    } else {
      $subArr['hsn'] = $hsn;
      $subArr['desc'] = "";
      $subArr['uqc'] = "PCS";
      $subArr['quantity'] = $signIndicator *$activeSheet->getCell("N{$i}")->getCalculatedValue();
      $subArr['total_value'] = $activeSheet->getCell("AT{$i}")->getCalculatedValue();
      $subArr['taxable_value'] = $activeSheet->getCell("X{$i}")->getCalculatedValue();  
      $subArr['igst'] =  $igst;
      $subArr['cgst'] = $sgst;
      $subArr['sgst'] = $sgst;
      $subArr['cess_amount'] = 0;
      $subArr['rate'] = $rate;
      array_push($countArr, $subArr);
    }
   
  }
  
  $countArr = formatedHsnValue($countArr);
  return $countArr;
}
function getFlipKartSalesHsnJson($document, $countArr = []){
 
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getSheetByName('Sales Report');
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[1]['totalRows'];
  $j=1;
  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $hsn = $activeSheet->getCell("G{$i}")->getCalculatedValue();
    

    if ($activeSheet->getCell("AE{$i}")->getCalculatedValue() == 0) {
      $rate = $activeSheet->getCell("AG{$i}")->getCalculatedValue() * 2;
      $igst = 0;
      $sgst = $activeSheet->getCell("X{$i}")->getCalculatedValue() * $rate / 200;
    } else {
      $rate = $activeSheet->getCell("AE{$i}")->getCalculatedValue();
      $igst = $activeSheet->getCell("X{$i}")->getCalculatedValue() * $rate / 100;
      $sgst = 0;
    }
    $key = getKeyByHsn($countArr, $hsn, $rate, 'hsn_sc', 'rt');
    $signIndicator = $activeSheet->getCell("AT{$i}")->getCalculatedValue() < 0 ? -1 : +1;
    if ($key && $countArr[$key]['rt'] == $rate) {
      $countArr[$key]['txval'] = $countArr[$key]['txval'] + $activeSheet->getCell("X{$i}")->getCalculatedValue();
      $countArr[$key]['qty'] = $countArr[$key]['qty'] + ($signIndicator * $activeSheet->getCell("N{$i}")->getCalculatedValue());
      $countArr[$key]['iamt'] = $countArr[$key]['iamt'] + $igst;
      $countArr[$key]['camt'] = $countArr[$key]['camt'] + $sgst;
      $countArr[$key]['samt'] = $countArr[$key]['samt'] + $sgst;

    } else {
      $subArr['num'] = $j;
      $subArr['hsn_sc'] = $hsn;
      $subArr['uqc'] = "PCS";
      $subArr['qty'] = $signIndicator *$activeSheet->getCell("N{$i}")->getCalculatedValue();
      $subArr['rt'] = $rate;
      $subArr['txval'] = $activeSheet->getCell("X{$i}")->getCalculatedValue();  
      $subArr['iamt'] =  $igst;
      $subArr['camt'] = $sgst;
      $subArr['samt'] = $sgst;
      $subArr['csamt'] = 0;
      array_push($countArr, $subArr);
      $j++;
    }
  }
  $countArr = formatedHsnJsonValue($countArr);
  return $countArr;
}

function getAmazoneB2cHsn($document, $countArr = [])
{
  $subArr = [];
  $filename = public_path('upload/documents/' . $document);
  $file = fopen($filename, "r");
  $i = 0;

  while (($data = fgetcsv($file, 50000, ",")) !== FALSE) {
    if ($i != 0) {

      $hsn = $data[12];
      if ($data[33] == 0) {
        $rate = $data[30] * 200;
        $igst = 0;
        $sgst = $data[30] * $data[27];
      } else {
        $rate = $data[33] * 100;
        $igst = $data[33] * $data[27];
        $sgst = 0;
      }

      $key = getKeyByHsn($countArr, $hsn, $rate);
      

        if ($key && $countArr[$key]['rate'] == $rate) {
          $countArr[$key]['taxable_value'] = $countArr[$key]['taxable_value'] + $data[28];
          $countArr[$key]['quantity'] = $countArr[$key]['quantity'] + $data[9];
          $countArr[$key]['total_value'] = $countArr[$key]['total_value'] + $data[27];
          $countArr[$key]['igst'] = $countArr[$key]['igst'] + $igst;
          $countArr[$key]['cgst'] = $countArr[$key]['cgst'] + $sgst;
          $countArr[$key]['sgst'] = $countArr[$key]['sgst'] + $sgst;

        } else {
          $subArr['hsn'] = $hsn;
          $subArr['desc'] = "";
          $subArr['uqc'] = "PCS";
          $subArr['quantity'] = $data[9];
          $subArr['total_value'] = $data[27];
          $subArr['taxable_value'] = $data[28];  
          $subArr['igst'] =  $igst;
          $subArr['cgst'] = $sgst;
          $subArr['sgst'] = $sgst;
          $subArr['cess_amount'] = 0;
          $subArr['rate'] = $rate;
          
          array_push($countArr, $subArr);
        }
     
    }
    $i++;
  }
  $countArr = formatedHsnValue($countArr);
  return $countArr;
}
function getAmazoneB2cHsnJson($document, $countArr = [])
{
  
  $subArr = [];
  $filename = public_path('upload/documents/' . $document);
  $file = fopen($filename, "r");
  $i = 0;
  $j = 1;
  while (($data = fgetcsv($file, 50000, ",")) !== FALSE) {
    if ($i != 0) {

      $hsn = $data[12];
      if ($data[33] == 0) {
        $rate = $data[30] * 200;
        $igst = 0;
        $sgst = $data[30] * $data[27];
      } else {
        $rate = $data[33] * 100;
        $igst = $data[33] * $data[27];
        $sgst = 0;
      }

      $key = getKeyByHsn($countArr, $hsn, $rate, 'hsn_sc', 'rt');
      

        if ($key && $countArr[$key]['rt'] == $rate) {
          $countArr[$key]['txval'] = $countArr[$key]['txval'] + $data[28];
          $countArr[$key]['qty'] = $countArr[$key]['qty'] + $data[9];
          $countArr[$key]['iamt'] = $countArr[$key]['iamt'] + $igst;
          $countArr[$key]['camt'] = $countArr[$key]['camt'] + $sgst;
          $countArr[$key]['samt'] = $countArr[$key]['samt'] + $sgst;

        } else {
          
          $subArr['num'] = $j;
          $subArr['hsn_sc'] = $hsn;
          $subArr['uqc'] = "PCS";
          $subArr['qty'] = $data[9];
          $subArr['rt'] = $rate;
          $subArr['txval'] = $data[28];  
          $subArr['iamt'] =  $igst;
          $subArr['camt'] = $sgst;
          $subArr['samt'] = $sgst;
          $subArr['csamt'] = 0;
          
          array_push($countArr, $subArr);
          $j++;
        }
     
    }
    $i++;
  }
  $countArr = formatedHsnJsonValue($countArr);
  return $countArr;
}

function meeshoForwardHsn($document, $countArr = []){

  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getActiveSheet();
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[0]['totalRows'];
  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $hsn = $activeSheet->getCell("Q{$i}")->getCalculatedValue();
    $rate = $activeSheet->getCell("S{$i}")->getCalculatedValue();

    if (gstCodeByState($activeSheet->getCell("AD{$i}")->getCalculatedValue()) == gstCodeByState($activeSheet->getCell("J{$i}")->getCalculatedValue())) {
      $igst = 0;
      $sgst = $activeSheet->getCell("S{$i}")->getCalculatedValue() * $activeSheet->getCell("AC{$i}")->getCalculatedValue() / 200;
    } else {
      $igst = $activeSheet->getCell("S{$i}")->getCalculatedValue() * $activeSheet->getCell("AC{$i}")->getCalculatedValue() / 100;
      $sgst = 0;
    }
    $key = getKeyByHsn($countArr, $hsn, $rate);
    if ($key && $countArr[$key]['rate'] == $rate) {
      $countArr[$key]['taxable_value'] = $countArr[$key]['taxable_value'] + $activeSheet->getCell("AC{$i}")->getCalculatedValue();
      $countArr[$key]['quantity'] = $countArr[$key]['quantity'] + $activeSheet->getCell("F{$i}")->getCalculatedValue();
      $countArr[$key]['total_value'] = $countArr[$key]['total_value'] + $activeSheet->getCell("T{$i}")->getCalculatedValue();
      $countArr[$key]['igst'] = $countArr[$key]['igst'] + $igst;
      $countArr[$key]['cgst'] = $countArr[$key]['cgst'] + $sgst;
      $countArr[$key]['sgst'] = $countArr[$key]['sgst'] + $sgst;

    } else {
      $subArr['hsn'] = $hsn;
      $subArr['desc'] = "";
      $subArr['uqc'] = "PCS";
      $subArr['quantity'] = $activeSheet->getCell("F{$i}")->getCalculatedValue();
      $subArr['total_value'] = $activeSheet->getCell("T{$i}")->getCalculatedValue();
      $subArr['taxable_value'] = $activeSheet->getCell("AC{$i}")->getCalculatedValue();  
      $subArr['igst'] =  $igst;
      $subArr['cgst'] = $sgst;
      $subArr['sgst'] = $sgst;
      $subArr['cess_amount'] = 0;
      $subArr['rate'] = $rate;
      
      array_push($countArr, $subArr);
    }
   
  }
  $countArr = formatedHsnValue($countArr);
  return $countArr;
}
function getMeeshoForwardHsnJson($document, $countArr = []){

  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getActiveSheet();
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[0]['totalRows'];
  $j = 1;
  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $hsn = $activeSheet->getCell("Q{$i}")->getCalculatedValue();
    $rate = $activeSheet->getCell("S{$i}")->getCalculatedValue();

    if (gstCodeByState($activeSheet->getCell("AD{$i}")->getCalculatedValue()) == gstCodeByState($activeSheet->getCell("J{$i}")->getCalculatedValue())) {
      $igst = 0;
      $sgst = $activeSheet->getCell("S{$i}")->getCalculatedValue() * $activeSheet->getCell("AC{$i}")->getCalculatedValue() / 200;
    } else {
      $igst = $activeSheet->getCell("S{$i}")->getCalculatedValue() * $activeSheet->getCell("AC{$i}")->getCalculatedValue() / 100;
      $sgst = 0;
    }
    $key = getKeyByHsn($countArr, $hsn, $rate, 'hsn_sc', 'rt');
    if ($key && $countArr[$key]['rt'] == $rate) {
      $countArr[$key]['txval'] = $countArr[$key]['txval'] + $activeSheet->getCell("AC{$i}")->getCalculatedValue();
      $countArr[$key]['qty'] = $countArr[$key]['qty'] + $activeSheet->getCell("F{$i}")->getCalculatedValue();
      $countArr[$key]['iamt'] = $countArr[$key]['iamt'] + $igst;
      $countArr[$key]['camt'] = $countArr[$key]['camt'] + $sgst;
      $countArr[$key]['samt'] = $countArr[$key]['samt'] + $sgst;

    } else {
      
      $subArr['num'] = $j;
      $subArr['hsn_sc'] = $hsn;
      $subArr['uqc'] = "PCS";
      $subArr['qty'] = $activeSheet->getCell("F{$i}")->getCalculatedValue();
      $subArr['rt'] = $rate;
      $subArr['txval'] = $activeSheet->getCell("AC{$i}")->getCalculatedValue();  
      $subArr['iamt'] =  $igst;
      $subArr['camt'] = $sgst;
      $subArr['samt'] = $sgst;
      $subArr['csamt'] = 0;
      
      array_push($countArr, $subArr);
      $j++;
    }
   
  }
  $countArr = formatedHsnJsonValue($countArr);
  return $countArr;
}
function meeshoReverseHsn($document, $countArr = []){
 
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getActiveSheet();
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[0]['totalRows'];
  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $hsn = $activeSheet->getCell("N{$i}")->getCalculatedValue();
    $rate = $activeSheet->getCell("P{$i}")->getCalculatedValue();

    if (gstCodeByState($activeSheet->getCell("I{$i}")->getCalculatedValue()) == gstCodeByState($activeSheet->getCell("AF{$i}")->getCalculatedValue())) {
      $igst = 0;
      $sgst = $activeSheet->getCell("P{$i}")->getCalculatedValue() * $activeSheet->getCell("AE{$i}")->getCalculatedValue() / 200;
    } else {
      $igst = $activeSheet->getCell("P{$i}")->getCalculatedValue() * $activeSheet->getCell("AE{$i}")->getCalculatedValue() / 100;
      $sgst = 0;
    }
    $key = getKeyByHsn($countArr, $hsn, $rate);
    if ($key && $countArr[$key]['rate'] == $rate) {
      $countArr[$key]['taxable_value'] = $countArr[$key]['taxable_value'] - $activeSheet->getCell("AE{$i}")->getCalculatedValue();
      $countArr[$key]['quantity'] = $countArr[$key]['quantity'] - $activeSheet->getCell("X{$i}")->getCalculatedValue();
      $countArr[$key]['total_value'] = $countArr[$key]['total_value'] - $activeSheet->getCell("S{$i}")->getCalculatedValue();
      $countArr[$key]['igst'] = $countArr[$key]['igst'] - $igst;
      $countArr[$key]['cgst'] = $countArr[$key]['cgst'] - $sgst;
      $countArr[$key]['sgst'] = $countArr[$key]['sgst'] - $sgst;

    } else {
      $subArr['hsn'] = $hsn;
      $subArr['desc'] = "";
      $subArr['uqc'] = "PCS";
      $subArr['quantity'] = 0-$activeSheet->getCell("X{$i}")->getCalculatedValue();
      $subArr['total_value'] = 0-$activeSheet->getCell("S{$i}")->getCalculatedValue();
      $subArr['taxable_value'] = 0-$activeSheet->getCell("AE{$i}")->getCalculatedValue();  
      $subArr['igst'] =  0-$igst;
      $subArr['cgst'] = 0-$sgst;
      $subArr['sgst'] = 0-$sgst;
      $subArr['cess_amount'] = 0;
      $subArr['rate'] = $rate;
      
      array_push($countArr, $subArr);
    }
   
  }
  $countArr = formatedHsnValue($countArr);
  return $countArr;
}

function getMeeshoReverseHsnJson($document, $countArr = []){
 
  $filepath = public_path('upload/documents/' . $document);
  $reader = new ReaderXlsx();
  $spreadSheet = $reader->load($filepath);
  $activeSheet = $spreadSheet->getActiveSheet();
  $sheet = $reader->listWorksheetInfo($filepath);
  $totalRows = $sheet[0]['totalRows'];
  $j=1;
  for ($i = 2; $i <= $totalRows; $i++) {
    $subArr = [];
    $hsn = $activeSheet->getCell("N{$i}")->getCalculatedValue();
    $rate = $activeSheet->getCell("P{$i}")->getCalculatedValue();

    if (gstCodeByState($activeSheet->getCell("I{$i}")->getCalculatedValue()) == gstCodeByState($activeSheet->getCell("AF{$i}")->getCalculatedValue())) {
      $igst = 0;
      $sgst = $activeSheet->getCell("P{$i}")->getCalculatedValue() * $activeSheet->getCell("AE{$i}")->getCalculatedValue() / 200;
    } else {
      $igst = $activeSheet->getCell("P{$i}")->getCalculatedValue() * $activeSheet->getCell("AE{$i}")->getCalculatedValue() / 100;
      $sgst = 0;
    }
    $key = getKeyByHsn($countArr, $hsn, $rate, 'hsn_sc', 'rt');
    if ($key && $countArr[$key]['rt'] == $rate) {
      $countArr[$key]['txval'] = $countArr[$key]['txval'] - $activeSheet->getCell("AE{$i}")->getCalculatedValue();
      $countArr[$key]['qty'] = $countArr[$key]['qty'] - $activeSheet->getCell("X{$i}")->getCalculatedValue();
      $countArr[$key]['iamt'] = $countArr[$key]['iamt'] - $igst;
      $countArr[$key]['camt'] = $countArr[$key]['camt'] - $sgst;
      $countArr[$key]['samt'] = $countArr[$key]['samt'] - $sgst;

    } else {
      
      $subArr['num'] = $j;
      $subArr['hsn_sc'] = $hsn;
      $subArr['uqc'] = "PCS";
      $subArr['qty'] = 0 - $activeSheet->getCell("X{$i}")->getCalculatedValue();
      $subArr['rt'] = $rate;
      $subArr['txval'] = 0  -$activeSheet->getCell("AE{$i}")->getCalculatedValue();  
      $subArr['iamt'] =  0 - $igst;
      $subArr['camt'] = 0 - $sgst;
      $subArr['samt'] = 0 - $sgst;
      $subArr['csamt'] = 0;
      
      array_push($countArr, $subArr);
      $j++;
    }
   
  }
  $countArr = formatedHsnJsonValue($countArr);
  return $countArr;
}
