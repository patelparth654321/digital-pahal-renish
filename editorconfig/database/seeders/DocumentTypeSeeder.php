<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([

            [
                'key' => 'personal_documents',
                'title' => 'Personal Documents',
                'parent_id'=>0
            ],
            [
                'key' => 'income_tax_documents',
                'title' => 'Income Tax Documents',
                'parent_id'=>0
            ],
            [
                'key' => 'gst_billing_documents',
                'title' => 'GST Billing Documents',
                'parent_id'=>0
            ],
            [
                'key' => 'aadhaar_card',
                'title' => 'Aadhaar Card',
                'parent_id'=>1
            ],
            [
                'key' => 'pan_card',
                'title' => 'PAN Card',
                'parent_id'=>1
            ],
            [
                'key' => 'election_card',
                'title' => 'Election Card',
                'parent_id'=>1
            ],
            [
                'key' => 'passport_photo',
                'title' => 'Passport Photo',
                'parent_id'=>1
            ],
            [
                'key' => 'lic_receipt',
                'title' => 'LIC Receipt',
                'parent_id'=>2
            ],
            [
                'key' => 'education_receipt',
                'title' => 'Education Receipt',
                'parent_id'=>2
            ],
            [
                'key' => 'form_16',
                'title' => 'Form 16',
                'parent_id'=>2
            ],
            [
                'key' => 'loan_statement',
                'title' => 'Loan Statement',
                'parent_id'=>2
            ],
            [
                'key' => 'bank_statement',
                'title' => 'Back Statement',
                'parent_id'=>2
            ],
            [
                'key' => 'sell',
                'title' => 'Sell',
                'parent_id'=>3
            ],
            [
                'key' => 'purchase',
                'title' => 'Purchase',
                'parent_id'=>3
            ],
           
        ]);
    }
}
