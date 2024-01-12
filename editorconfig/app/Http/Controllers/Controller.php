<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Documents;
use DateTime;
use Illuminate\Routing\Controller as BaseController;
use ZipArchive;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function getCurrentMonthData($id, $month, $year, $gst_type)
    {
        $subdoc_b2b = Documents::join('document_types as dt', 'dt.key', '=', 'documents.document_type')->where(['client_id' => $id, 'year' => $year])->WhereIn('sub_type', ['b2b'])->where(['month' => $month]);
        $subdoc_b2c = Documents::join('document_types as dt', 'dt.key', '=', 'documents.document_type')->where(['client_id' => $id, 'year' => $year])->whereNotIn('sub_type', ['b2b']);
        if ($gst_type == 2) {
            if ($month == "09") {
                $months_arr = ["07", "08", "09"];
            } elseif ($month == "12") {
                $months_arr = ["10", "11", "12"];
            } elseif ($month == "03") {
                $months_arr = ["01", "02", "03"];
            } else {
                $months_arr = ["04", "05", "06"];
            }
            $subdoc_b2c->WhereIn('month', $months_arr);
            $uploaded_docs2 = in_array($month, ["06", "09", "12", "03"]) ? $subdoc_b2c->groupBy('documents.id')->get()->toArray() : [];
        } else {
            $subdoc_b2c->where(['month' => $month]);
            $uploaded_docs2 =$subdoc_b2c->groupBy('documents.id')->get()->toArray();
        }

        $uploaded_docs1 = $subdoc_b2b->groupBy('documents.id')->get()->toArray();
        
        
        return array_unique(array_merge($uploaded_docs1, $uploaded_docs2), SORT_REGULAR);
    }

    function downloadZipFileHelper($id, $month, $year, $gst_type, $isHsn)
    {
        

        $uploadedData = $this->getCurrentMonthData($id, $month, $year, $gst_type);
        $b2cArrTitle[] = ['type' => "Type", 'place' => "Place of supply", 'rate' => 'Rate', 'applicable_rate' => 'Applicable % of Tax Rate', 'taxable_value' => 'Taxable Value', 'cess_amount' => 'Cess Amount', 'gstin' => "E-Commerce GSTIN"];

        $b2bArrTitle[] = ['gst' => 'GSTIN/UIN of Recipient', 'name' => 'Receiver Name', 'invoice_no' => 'Invoice Number', 'date' => 'Invoice date', 'value' => 'Invoice Value', 'place' => 'Place Of Supply', 'reverse_charge' => 'Reverse Charge', 'applicable_tax' => 'Applicable % of Tax Rate', 'type' => "Invoice Type", 'ec_gst' => 'E-Commerce GSTIN', 'rate' => 'Rate', 'taxable_amount' => "Taxable Value", 'cess_amount' => 'Cess Amount'];

        $hsnArrTitle[] =['hsn' => "HSN", 'desc' => "Description", 'uqc' => 'UQC', 'quantity' => 'Total Quantity', 'total_value' => 'Total Value', 'taxable_value' => 'Taxable Value', 'igst' => 'Integrated Tax Amount', "cgst"=>'Central Tax Amount', "sgst"=>'State/UT Tax Amount', 'cess_amount'=>'Cess Amount', 'rate'=>'Rate'];

        $b2cArr[] = ['type' => "OE", 'place' => "", 'rate' => 0.0, 'applicable_rate' => 0, 'taxable_value' => 0, 'cess_amount' => 0.0, 'gstin' => ""];
        $b2bArr =  $creditDebitArr = [];
        $hsnArr[] = ['hsn' => "", 'desc' => "", 'uqc' => '', 'quantity' => 0, 'total_value' => 0, 'taxable_value' => 0.0, 'igst' => 0, "cgst"=>0, "sgst"=>0, 'cess_amount'=>0, 'rate'=>0];
        foreach ($uploadedData as $d) {
            if ($d['sub_type'] == "gst") {
                $b2cArr = getFlipKartGstCsv($d['document'], $b2cArr);
                if($isHsn) $hsnArr = getFlipKartGstHsn($d['document'], $hsnArr);
            } elseif ($d['sub_type'] == "sales") {
                $b2cArr  = getFlipKartSalesCsv($d['document'], $b2cArr);
                if($isHsn) $hsnArr = flipkartSalesHsn($d['document'], $hsnArr);
            } elseif ($d['sub_type'] == "forward_sheet") {
                $b2cArr = getMeeshoForwardCsv($d['document'], $b2cArr);
                if($isHsn) $hsnArr = meeshoForwardHsn($d['document'], $hsnArr);
            } elseif ($d['sub_type'] == "reverse_sheet") {
                $b2cArr = getMeeshoReverseCsv($d['document'],  $b2cArr);
                if($isHsn) $hsnArr = meeshoReverseHsn($d['document'], $hsnArr);
            } elseif ($d['sub_type'] == "b2b") {
                $b2bArr = amazoneB2bCsv($d['document'],  $b2bArr);
                $creditDebitArr = amazoneB2bCsv($d['document'],  $creditDebitArr, 'credit');
            }elseif ($d['sub_type'] == "b2c") {
                $b2cArr = getAmazoneB2cCsv($d['document'],  $b2cArr);
                if($isHsn) $hsnArr = getAmazoneB2cHsn($d['document'], $hsnArr);
            }

        }
        $b2cArr = array_filter($b2cArr, function ($a) {
            return $a['taxable_value'] != 0;
          });
        if (count($b2cArr) > 0) {
            $data = array_merge($b2cArrTitle, $b2cArr);
            $filename = "b2cs.csv";
            $file = fopen($filename, 'w');
            if ($file === false) {
                die("An Error Occurred. Error: Fialed to open " . $filename);
            }
            foreach ($data as $row) {
                fputcsv($file, $row);
            }

            // Close the File
            fclose($file);
        }

        if(count($b2bArr) > 0){
            $data = array_merge($b2bArrTitle, $b2bArr);
            $filename_b2b = "b2b,sez,de.csv";
            $file = fopen($filename_b2b, 'w');
            if ($file === false) {
                die("An Error Occurred. Error: Fialed to open " . $filename_b2b);
            }
            foreach ($data as $row) {
                fputcsv($file, $row);
            }

            fclose($file);
        }
        if(count($creditDebitArr) > 0){
            $data = array_merge($b2bArrTitle, $creditDebitArr);
            $filename_credit_note = "cdnr.csv";
            $file = fopen($filename_credit_note, 'w');
            if ($file === false) {
                die("An Error Occurred. Error: Fialed to open " . $filename_credit_note);
            }
            foreach ($data as $row) {
                fputcsv($file, $row);
            }

            fclose($file);
        }
        $hsnArr = array_filter($hsnArr, function ($a) {
            return $a['taxable_value'] != 0;
          });
        if(count($hsnArr) > 0){
            $data = array_merge($hsnArrTitle, $hsnArr);
            $filename_hsn = "hsn.csv";
            $file = fopen($filename_hsn, 'w');
            if ($file === false) {
                die("An Error Occurred. Error: Fialed to open " . $filename_hsn);
            }
            foreach ($data as $row) {
                fputcsv($file, $row);
            }

            fclose($file);
        }


        $zip_fname = DateTime::createFromFormat('!m', $month)->format('F') . date('Y') . "-csv.zip";

        if (is_file($zip_fname))
            unlink($zip_fname);

        touch($zip_fname);
        $zip = new ZipArchive();
        if ($zip->open($zip_fname) === true) {
            if(isset($filename_b2b)) $zip->addFile($filename_b2b, $filename_b2b);
            if(isset($filename)) $zip->addFile($filename, $filename);
           if(isset($filename_hsn)) $zip->addFile($filename_hsn, $filename_hsn);
           if(isset($filename_credit_note))  $zip->addFile($filename_credit_note, $filename_credit_note);
            $zip->close();
        }

        // Downloading the zip file
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($zip_fname) . "\"");
        readfile($zip_fname);
    }
}
