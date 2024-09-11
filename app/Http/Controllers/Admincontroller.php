<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Dropdowncontroller;
use RealRashid\SweetAlert\Facades\Alert;

class Admincontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }  
    //Data total
    function index(){
        $areas = DB::table('area')->get();
        $blogs = DB::table('data_csv')->get();
        
        return view('blog', compact('areas','blogs'));
    }

    function edit($id){
         $areas = DB::table('area')->get();
         $blog = DB::table("data_csv as a")
                ->join('area as b', 'a.Region_id', '=', 'b.Region_id')
                ->where('a.id', $id)
                ->first();

                //ถ้าไม่มี  Region_id จะ update ให้ = 1
                if (!$blog) {
                    DB::table('data_csv')->whereNull('Region_id')->update(['Region_id' => 1]);
                    return redirect()->route('blog');
    }
        return view("edit" , compact("blog","areas"));

    }
    function update(Request $request, $id){
        $request->validate([
            'SiteCode'=> 'required',
            // ปรับให้ DeadLine เป็นค่าว่างได้และต้องเป็นวันที่หากมีค่า
        ],
        [
            'SiteCode' =>'กรุณากรอก SiteCode',
        ]);
        $data= [ //input form
            'GTNJobNo'=> $request->GTNJobNo,
            'RefCode'=> $request->RefCode,
            'PlanType'=> $request->PlanType,
            'Region_id'=> $request->Region_id,
            'Province'=> $request->Province,
            'OwnerOldSte'=> $request->OwnerOldSte,
            'SiteCode'=> $request->SiteCode,
            'SiteNAME_T'=> $request->SiteNAME_T,
            'SiteType'=> $request->SiteType,
            'CancelSite'=> $request->CancelSite,
            'TowerNewSite'=> $request->TowerNewSite,
            'Towerheight'=> $request->Towerheight,
            'Tower'=> $request->Tower,
            'Zone'=> $request->Zone,
            'DeadLine'=> $request->DeadLine,
            'DeadLine_Y'=> $request->DeadLine_Y,
            'Status'=> $request->Status,

            //-- SAQ -->
            'AssignedSubCSurveySAQ'=> $request->AssignedSubCSurveySAQ,
            'PlanSurveySAQ'=> $request->PlanSurveySAQ,
            'ActualSurveySAQ'=> $request->ActualSurveySAQ,
            'SubName_SAQ'=> $request->SubName_SAQ,
            'Quo_No_SAQ'=> $request->Quo_No_SAQ,
            'PR_Price_SAQ'=> $request->PR_Price_SAQ,
            'Accept_PR_Date_SAQ'=> $request->Accept_PR_Date_SAQ,
            'WO_No_SAQ'=> $request->WO_No_SAQ,
            'WO_Price_SAQ'=> $request->WO_Price_SAQ,
            'Accept_1st_SAQ'=> $request->Accept_1st_SAQ,
            'Accept_2nd_SAQ'=> $request->Accept_2nd_SAQ,
            'Accept_3rd_SAQ'=> $request->Accept_3rd_SAQ,
            'Accept_4th_SAQ'=> $request->Accept_4th_SAQ,
            'Banlace_SAQ'=> $request->Banlace_SAQ,


            // -- CR -->

            'AssignedSubCCR'=> $request->AssignedSubCCR,
            'PlanCR'=> $request->PlanCR,
            'ActualCR'=> $request->ActualCR,
            'SubName_CR'=> $request->SubName_CR,
            'Quo_No_CR'=> $request->Quo_No_CR,
            'PR_Price_CR'=> $request->PR_Price_CR,
            'Accept_PR_Date_CR'=> $request->Accept_PR_Date_CR,
            'WO_No_CR'=> $request->WO_No_CR,
            'WO_Price_CR'=> $request->WO_Price_CR,
            'Accept_1st_CR'=> $request->Accept_1st_CR,
            'Accept_2nd_CR'=> $request->Accept_2nd_CR,
            'Accept_3rd_CR'=> $request->Accept_3rd_CR,
            'Accept_4th_CR'=> $request->Accept_4th_CR,
            'Banlace_CR'=> $request->Banlace_CR,


            // -- TSSR -->

            'AssignedSubCTSSR'=> $request->AssignedSubCTSSR,
            'PlanTSSR'=> $request->PlanTSSR,
            'ActualTSSR'=> $request->ActualTSSR,
            'SubName_TSSR'=> $request->SubName_TSSR,
            'Quo_No_TSSR'=> $request->Quo_No_TSSR,
            'PR_Price_TSSR'=> $request->PR_Price_TSSR,
            'Accept_PR_Date_TSSR'=> $request->Accept_PR_Date_TSSR,
            'WO_No_TSSR'=> $request->WO_No_TSSR,
            'WO_Price_TSSR'=> $request->WO_Price_TSSR,
            'Accept_1st_TSSR'=> $request->Accept_1st_TSSR,
            'Accept_2nd_TSSR'=> $request->Accept_2nd_TSSR,
            'Accept_3rd_TSSR'=> $request->Accept_3rd_TSSR,
            'Accept_4th_TSSR'=> $request->Accept_4th_TSSR,
            'Banlace_TSSR'=> $request->Banlace_TSSR,

            
            // CivilWork
            'AssignSubCivilfoundation'=> $request->AssignSubCivilfoundation,
            'PlanCivilWorkFoundation'=> $request->PlanCivilWorkFoundation,
            'ActualCivilWorkTower'=> $request->ActualCivilWorkTower,
            'AssignCivilWorkTower'=> $request->AssignCivilWorkTower,
            'PlanInstallationRectifier'=> $request->PlanInstallationRectifier,
            'ActualInstallationRectifier'=> $request->ActualInstallationRectifier,
            'PlanACPower'=> $request->PlanACPower,
            'ActualACPower'=> $request->ActualACPower,
            'PlanACMeter'=> $request->PlanACMeter,
            'ActualACMeter'=> $request->ActualACMeter,
            'PAT'=> $request->PAT,
            'DefPAT'=> $request->DefPAT,
            'FAT'=> $request->FAT,

            
            'Assigned_CivilWork'=> $request->Assigned_CivilWork,
            'Plan_CivilWork'=> $request->Plan_CivilWork,
            'Actual_CivilWork'=> $request->Actual_CivilWork,
            'SubName_CivilWork'=> $request->SubName_CivilWork,
            'Quo_No_CivilWork'=> $request->Quo_No_CivilWork,
            'PR_Price_CivilWork'=> $request->PR_Price_CivilWork,
            'Accept_PR_Date_CivilWork'=> $request->Accept_PR_Date_CivilWork,
            'WO_No_CivilWork'=> $request->WO_No_CivilWork,
            'WO_Price_CivilWork'=> $request->WO_Price_CivilWork,
            'Accept_1st_CivilWork'=> $request->Accept_1st_CivilWork,
            'Accept_2nd_CivilWork'=> $request->Accept_2nd_CivilWork,
            'Accept_3rd_CivilWork'=> $request->Accept_3rd_CivilWork,
            'Accept_4th_CivilWork'=> $request->Accept_4th_CivilWork,
            'Banlace_CivilWork'=> $request->Banlace_CivilWork,

        ];

        $blog = DB::table("data_csv")->where("id",$id)->update($data);
        return redirect("/blog")->with('success', 'Blog updated successfully.');
    }

    function add(){
        $areas = DB::table('area')->get();   
        return view('add', compact("areas"));
    }

    function insert(Request $request){
        
        $request->validate([
            'SiteCode'=> 'required',
            // ปรับให้ DeadLine เป็นค่าว่างได้และต้องเป็นวันที่หากมีค่า
        ],
        [
            'SiteCode' =>'กรุณากรอก SiteCode',
        ]
        
    );
    $data= [ //input form
        'GTNJobNo'=> $request->GTNJobNo,
            'RefCode'=> $request->RefCode,
            'PlanType'=> $request->PlanType,
            'Region_id'=> $request->Region_id,
            'Province'=> $request->Province,
            'OwnerOldSte'=> $request->OwnerOldSte,
            'SiteCode'=> $request->SiteCode,
            'SiteNAME_T'=> $request->SiteNAME_T,
            'SiteType'=> $request->SiteType,
            'CancelSite'=> $request->CancelSite,
            'TowerNewSite'=> $request->TowerNewSite,
            'Towerheight'=> $request->Towerheight,
            'Tower'=> $request->Tower,
            'Zone'=> $request->Zone,
            'DeadLine'=> $request->DeadLine,
            'DeadLine_Y'=> $request->DeadLine_Y,
            'Status'=> $request->Status,

            //-- SAQ -->
            'AssignedSubCSurveySAQ'=> $request->AssignedSubCSurveySAQ,
            'PlanSurveySAQ'=> $request->PlanSurveySAQ,
            'ActualSurveySAQ'=> $request->ActualSurveySAQ,
            'SubName_SAQ'=> $request->SubName_SAQ,
            'Quo_No_SAQ'=> $request->Quo_No_SAQ,
            'PR_Price_SAQ'=> $request->PR_Price_SAQ,
            'Accept_PR_Date_SAQ'=> $request->Accept_PR_Date_SAQ,
            'WO_No_SAQ'=> $request->WO_No_SAQ,
            'WO_Price_SAQ'=> $request->WO_Price_SAQ,
            'Accept_1st_SAQ'=> $request->Accept_1st_SAQ,
            'Accept_2nd_SAQ'=> $request->Accept_2nd_SAQ,
            'Accept_3rd_SAQ'=> $request->Accept_3rd_SAQ,
            'Accept_4th_SAQ'=> $request->Accept_4th_SAQ,
            'Banlace_SAQ'=> $request->Banlace_SAQ,


            // -- CR -->

            'AssignedSubCCR'=> $request->AssignedSubCCR,
            'PlanCR'=> $request->PlanCR,
            'ActualCR'=> $request->ActualCR,
            'SubName_CR'=> $request->SubName_CR,
            'Quo_No_CR'=> $request->Quo_No_CR,
            'PR_Price_CR'=> $request->PR_Price_CR,
            'Accept_PR_Date_CR'=> $request->Accept_PR_Date_CR,
            'WO_No_CR'=> $request->WO_No_CR,
            'WO_Price_CR'=> $request->WO_Price_CR,
            'Accept_1st_CR'=> $request->Accept_1st_CR,
            'Accept_2nd_CR'=> $request->Accept_2nd_CR,
            'Accept_3rd_CR'=> $request->Accept_3rd_CR,
            'Accept_4th_CR'=> $request->Accept_4th_CR,
            'Banlace_CR'=> $request->Banlace_CR,


            // -- TSSR -->

            'AssignedSubCTSSR'=> $request->AssignedSubCTSSR,
            'PlanTSSR'=> $request->PlanTSSR,
            'ActualTSSR'=> $request->ActualTSSR,
            'SubName_TSSR'=> $request->SubName_TSSR,
            'Quo_No_TSSR'=> $request->Quo_No_TSSR,
            'PR_Price_TSSR'=> $request->PR_Price_TSSR,
            'Accept_PR_Date_TSSR'=> $request->Accept_PR_Date_TSSR,
            'WO_No_TSSR'=> $request->WO_No_TSSR,
            'WO_Price_TSSR'=> $request->WO_Price_TSSR,
            'Accept_1st_TSSR'=> $request->Accept_1st_TSSR,
            'Accept_2nd_TSSR'=> $request->Accept_2nd_TSSR,
            'Accept_3rd_TSSR'=> $request->Accept_3rd_TSSR,
            'Accept_4th_TSSR'=> $request->Accept_4th_TSSR,
            'Banlace_TSSR'=> $request->Banlace_TSSR,

            
            'AssignSubCivilfoundation'=> $request->AssignSubCivilfoundation,
            'PlanCivilWorkFoundation'=> $request->PlanCivilWorkFoundation,
            'ActualCivilWorkTower'=> $request->ActualCivilWorkTower,
            'AssignCivilWorkTower'=> $request->AssignCivilWorkTower,
            'PlanInstallationRectifier'=> $request->PlanInstallationRectifier,
            'ActualInstallationRectifier'=> $request->ActualInstallationRectifier,
            'PlanACPower'=> $request->PlanACPower,
            'ActualACPower'=> $request->ActualACPower,
            'PlanACMeter'=> $request->PlanACMeter,
            'ActualACMeter'=> $request->ActualACMeter,
            'PAT'=> $request->PAT,
            'DefPAT'=> $request->DefPAT,
            'FAT'=> $request->FAT,

            // CivilWork
            'Assigned_CivilWork'=> $request->Assigned_CivilWork,
            'Plan_CivilWork'=> $request->Plan_CivilWork,
            'Actual_CivilWork'=> $request->Actual_CivilWork,
            'SubName_CivilWork'=> $request->SubName_CivilWork,
            'Quo_No_CivilWork'=> $request->Quo_No_CivilWork,
            'PR_Price_CivilWork'=> $request->PR_Price_CivilWork,
            'Accept_PR_Date_CivilWork'=> $request->Accept_PR_Date_CivilWork,
            'WO_No_CivilWork'=> $request->WO_No_CivilWork,
            'WO_Price_CivilWork'=> $request->WO_Price_CivilWork,
            'Accept_1st_CivilWork'=> $request->Accept_1st_CivilWork,
            'Accept_2nd_CivilWork'=> $request->Accept_2nd_CivilWork,
            'Accept_3rd_CivilWork'=> $request->Accept_3rd_CivilWork,
            'Accept_4th_CivilWork'=> $request->Accept_4th_CivilWork,
            'Banlace_CivilWork'=> $request->Banlace_CivilWork,
    ];
        
        DB::table("data_csv")->insert($data);
        return redirect('/blog');

    }


}
