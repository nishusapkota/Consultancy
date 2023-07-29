<?php

namespace App\Exports;

use App\Models\ContactEnquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactEnquiryExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
           'ID',
            'Name',
            'Phone',
            'Email',
            'Subject',
            'Message',
            

        ];
    }

    public function collection(){

   
    return ContactEnquiry::select('id', 'name', 'phone', 'email','subject','message')->get()
        ->map(function ($enquiry) {
            // dd($enquiry->toArray());
            return [
                'ID' => $enquiry->id,
                'Name' => $enquiry->name,
                'Phone' => $enquiry->phone,
                'Email' => $enquiry->email,
                'Subject' => $enquiry->subject ,
                'Message' => $enquiry->message,
            ];
        });
}
}