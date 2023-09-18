<?php


namespace App\Http\Controllers\Actl;

use App\Exports\FamilyExport;
use App\Exports\PostalCodeExport;
use App\Exports\ProductExport;
use App\Exports\PurchaseOrderCExport;
use App\Exports\PurchaseOrderDExport;
use App\Exports\SupplierExport;
use App\Exports\TaxRateExport;
use App\Exports\UnitMeasureExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;


class ExcelTableController extends Controller
{
    public function SearchTables(Request $request)
    {
        //Nome da tabela escolhida na view
        $select1 = $request->input('select1');

        // Define a map of table names
        $tables = [
            'Family' => FamilyExport::class,
            'PostalCode' => PostalCodeExport::class,
            'Product' => ProductExport::class,
            'PurchaseOrderC' => PurchaseOrderCExport::class,
            'PurchaseOrderD' => PurchaseOrderDExport::class,
            'Supplier' => SupplierExport::class,
            'TaxRate' => TaxRateExport::class,
            'UnitMeasure' => UnitMeasureExport::class,
        ];

        // Selecionar tudo na tabela
        $class = 'App\Models\\' . $select1;
        $data = $class::all();

        // Iterate over the array of table names
        if (isset($tables[$select1])) {
            $export = new $tables[$select1]($data);
            //$export->withHeadings(); // Add this line to include the headings row
            return Excel::download($export, 'search_result.xlsx');
        } else {
            return "No table selected";
        }
    }
}

//
//namespace App\Http\Controllers\Actl;
//
//use App\Exports\FamilyExport;
//use App\Exports\PostalCodeExport;
//use App\Exports\ProductExport;
//use App\Exports\PurchaseOrderCExport;
//use App\Exports\PurchaseOrderDExport;
//use App\Exports\SupplierExport;
//use App\Exports\TaxRateExport;
//use App\Exports\UnitMeasureExport;
//
//use App\Http\Controllers\Controller;
//
//use Illuminate\Http\Request;
//
//use Excel;
//
//
//
//class ExcelTableController extends Controller
//{
//    public function SearchTables(Request $request)
//    {
//        //Nome da tabela escolhida na view
//        $select1 = $request->input('select1');
//
//        // Define a map of table names
//        $tables = [
//            'Family' => FamilyExport::class,
//            'PostalCode' => PostalCodeExport::class,
//            'Product' => ProductExport::class,
//            'PurchaseOrderC' => PurchaseOrderCExport::class,
//            'PurchaseOrderD' => PurchaseOrderDExport::class,
//            'Supplier' => SupplierExport::class,
//            'TaxRate' => TaxRateExport::class,
//            'UnitMeasure' => UnitMeasureExport::class,
//        ];
//
//        // Selecionar tudo na tabela
//        $class = 'App\Models\\'.$select1;
//        $data = $class::all();
//
//        // Iterate over the array of table names
//        if(isset($tables[$select1])) {
//
//            return Excel::download(new $tables[$select1]($data), 'search_result.xlsx');
//        } else {
//            return "No table selected";
//        }
//    }
//}
//
//
//
//
//use Spatie\QueryBuilder\QueryBuilder;
//
//use App\Models\Family;
//use App\Models\PostalCode;
//use App\Models\Product;
//use App\Models\PurchaseOrderC;
//use App\Models\PurchaseOrderD;
//use App\Models\Supplier;
//use App\Models\TaxRate;
//use App\Models\UnitMeasure;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Response;
//use League\Csv\Writer;
//use SplTempFileObject;
//
//return view('backend.ExcelDownload.searchQuerryTableView');
