<?php

namespace App\Http\Controllers;

use App\Models\SoftwareMaster;
use App\Models\SoftwareDetailLicensing;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{

    public function softwareMaster()
    {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('Software Master');


        $sheet->fromArray([
            [
                'Licensing ID',
                'Organization',
                'Vendor',
                'Parent Program',
                'Status',
                'End Date'
            ]
        ]);


        $masters = SoftwareMaster::with('organization')->get();


        $row = 2;

        foreach ($masters as $master) {

            $sheet->fromArray([
                [
                    $master->LicensingID,
                    $master->organization?->Name,
                    $master->Vendor,
                    $master->ParentProgram,
                    $master->Status,
                    $master->EndDate?->format('Y-m-d'),
                ]
            ], null, "A{$row}");

            $row++;
        }


        $this->formatSheet($sheet, 'F');


        return $this->download(
            $spreadsheet,
            'Software_Master.xlsx'
        );
    }



    public function softwareDetail()
    {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('Software Detail');


        $sheet->fromArray([
            [
                'Licensing ID',
                'License Pool',
                'Product Family',
                'Version',
                'Quantity',
                'Keterangan',
                'Last Price',
                'Last Buy Date'
            ]
        ]);


        $details = SoftwareDetailLicensing::all();


        $row = 2;


        foreach ($details as $detail) {

            $sheet->fromArray([
                [
                    $detail->LicensingID,
                    $detail->LicensePool,
                    $detail->ProductFamily,
                    $detail->Version,
                    $detail->Quantity,
                    $detail->Keterangan,
                    $detail->LastPrice,
                    $detail->LastBuyDate?->format('Y-m-d'),
                ]
            ], null, "A{$row}");

            $row++;

        }


        $this->formatSheet($sheet, 'H');


        return $this->download(
            $spreadsheet,
            'Software_Detail_Licensing.xlsx'
        );
    }



    private function formatSheet($sheet, $lastColumn)
    {

        $sheet->getStyle(
            "A1:{$lastColumn}1"
        )->applyFromArray([

            'font'=>[
                'bold'=>true,
                'color'=>[
                    'rgb'=>'FFFFFF'
                ]
            ],

            'fill'=>[
                'fillType'=>Fill::FILL_SOLID,
                'startColor'=>[
                    'rgb'=>'4F46E5'
                ]
            ]

        ]);


        foreach(range('A',$lastColumn) as $column){

            $sheet
                ->getColumnDimension($column)
                ->setAutoSize(true);

        }

    }



    private function download($spreadsheet,$filename)
    {

        return new StreamedResponse(function() use($spreadsheet){

            $writer = new Xlsx($spreadsheet);

            $writer->save('php://output');

        },200,[

            'Content-Type' =>
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',

            'Content-Disposition' =>
            'attachment; filename="'.$filename.'"'

        ]);

    }

}