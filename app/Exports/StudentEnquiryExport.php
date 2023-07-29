<?php

namespace App\Exports;

use Log;
use Illuminate\Support\Arr;
use App\Models\StudentEnquiry;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentEnquiryExport implements FromCollection,WithHeadings
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
            'Level',
            'Course',
            'University'

        ];
    }

    public function collection()
    {
        return StudentEnquiry::select('id', 'name', 'phone', 'email','level_id','course_id','university_id')
        ->with(['level:id,name', 'course:id,name', 'university:id,uname'])
        ->get()
        ->map(function ($enquiry) {
            // dd($enquiry->toArray());
            return [
                'ID' => $enquiry->id,
                'Name' => $enquiry->name,
                'Phone' => $enquiry->phone,
                'Email' => $enquiry->email,
                'Level' => $enquiry->level->name ,
                'Course' => $enquiry->course->name,
                'University' =>$enquiry->university->uname,
           
            ];
        });
}
}



