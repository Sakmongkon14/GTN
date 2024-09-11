@extends('layouts.app')
@section('title', 'UPDATE')
@section('content')

    <style>
        .form-control {
            border-color: #2f82c3;
        }

        .form-control {
            font-size: 12px;
        }

        .col-md-12 {
            width: 100%;
            max-width: 320px;
            max-height: 300px;
        }

        .custom-divider {
            margin-top: 30px;
        }

        h4 {
            margin-top: 2px;
            font-size: 16px;
            color: red
        }

        label {
            font-size: 13px;
        }

        .status-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 60px;
            /* ระยะห่างระหว่างแต่ละ <h5> */
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-left: 5px;
            /* เพิ่มระยะห่างระหว่างข้อความและตัวบ่งชี้ */

        }

        .has-data {
            background-color: rgb(0, 156, 0);
        }

        .no-data {
            background-color: rgb(255, 0, 0);
        }

        .status-row h5 {
            font-size: 13px;
            /* ปรับขนาดฟอนต์ที่นี่ */
            margin: 0;
            /* ลบระยะห่างบนและล่างของ <h5> */
        }
    </style>

    <h2 class="text text-center py-3">UPDATE</h2>

    <div class="container input-group mb-3 input-group-sm  py-3">

        <!-- Main -->
        <form class="row g-3 custom-form" method="POST" action="{{ route('update', $blog->id) }}">
            @csrf

            <div class="col-md-12 d-flex align-items-center ">
                <label for="GTNJobNo" class="me-4" style="width: 100px;">GTNJobNo</label>
                <div class="d-flex flex-column">
                    <input type="text" name="GTNJobNo" class="form-control custom-input-width"
                        value="{{ $blog->GTNJobNo }}">
                    @error('GTNJobNo')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="RefCode" class="me-4" style="width: 100px;">RefCode</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="RefCode" class="form-control" value="{{ $blog->RefCode }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center  ">
                <label for="PlanType" class="me-4" style="width: 100px;">PlanType</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PlanType" class="form-control" value="{{ $blog->PlanType }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Region_id" class="me-4" style="width: 40px;">Region</label>
                <div class="d-flex flex-column ">
                    <select name="Region_id" id="Region_id" class="form-control">
                        @foreach ($areas as $area)
                            <option value="{{ $area->Region_id }}"
                                {{ $area->Region_id == old('Region_id', $blog->Region_id) ? 'selected' : '' }}>
                                {{ $area->Region_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Province" class="me-4" style="width: 100px;">Province</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Province" class="form-control" value="{{ $blog->Province }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Province" class="me-4" style="width: 100px;">OwnerOldSte</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="OwnerOldSte" class="form-control" value="{{ $blog->OwnerOldSte }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="SiteCode" class="me-4" style="width: 100px;">SiteCode</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="SiteCode" class="form-control" value="{{ $blog->SiteCode }}">
                    @error('SiteCode')
                        <span class="text text-danger ">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="SiteNAME_T" class="me-4" style="width: 100px;">SiteNAME_T</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="SiteNAME_T" class="form-control" value="{{ $blog->SiteNAME_T }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="SiteType" class="me-4" style="width: 100px;">SiteType</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="SiteType" class="form-control" value="{{ $blog->SiteType }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="CancelSite" class="me-4" style="width: 100px;">CancelSite</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="CancelSite" class="form-control" value="{{ $blog->CancelSite }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="TowerNewSite" class="me-4" style="width: 100px;">TowerNewSite</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="TowerNewSite" class="form-control" value="{{ $blog->TowerNewSite }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Towerheight" class="me-4" style="width: 100px;">Towerheight</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Towerheight" class="form-control" value="{{ $blog->Towerheight }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Tower" class="me-4" style="width: 100px;">Tower</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Tower" class="form-control" value="{{ $blog->Tower }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Zone" class="me-4" style="width: 100px;">Zone</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Zone" class="form-control" value="{{ $blog->Zone }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="DeadLine" class="me-4" style="width: 100px;">DeadLine</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="DeadLine" class="form-control" value="{{ $blog->DeadLine }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="DeadLine_Y" class="me-4" style="width: 100px;">DeadLine_Y</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="DeadLine_Y" class="form-control" value="{{ $blog->DeadLine_Y }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Status" class="me-4" style="width: 100px;">Status</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Status" class="form-control" value="{{ $blog->Status }}">
                </div>
            </div>

            <!-- SAQ -->
            <hr class="custom-divider">

            <div class="status-row">

                <h4>SAQ</h4>

                <h5>Accept_1st
                    @if (!empty($blog->Accept_1st_SAQ))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_2nd
                    @if (!empty($blog->Accept_2nd_SAQ))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_3rd
                    @if (!empty($blog->Accept_3rd_SAQ))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_4th
                    @if (!empty($blog->Accept_4th_SAQ))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>
            </div>


            <div class="col-md-12 d-flex align-items-center ">
                <label for="AssignedSubCSurveySAQ" style="width: 190px;">AssignedSubCSurveySAQ</label>
                <div class="d-flex flex-column">
                    <input type="text" name="AssignedSubCSurveySAQ" class="form-control"
                        value="{{ $blog->AssignedSubCSurveySAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PlanSurveySAQ" class="me-4" style="width: 100px;">PlanSurveySAQ</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PlanSurveySAQ" class="form-control" value="{{ $blog->PlanSurveySAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center  ">
                <label for="ActualSurveySAQ" class="me-4" style="width: 100px;">ActualSurveySAQ</label>
                <div class="flex-grow-1">
                    <input type="text" name="ActualSurveySAQ" class="form-control"
                        value="{{ $blog->ActualSurveySAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="SubName_SAQ" class="me-4" style="width: 100px;">SubName_SAQ</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="SubName_SAQ" class="form-control" value="{{ $blog->SubName_SAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Quo_No_SAQ" class="me-4" style="width: 100px;">Quo_No_SAQ</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Quo_No_SAQ" class="form-control" value="{{ $blog->Quo_No_SAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PR_Price_SAQ" class="me-4" style="width: 100px;">PR_Price_SAQ</label>
                <div class="d-flex flex-column  ">
                    <input type="text" name="PR_Price_SAQ" class="form-control" value="{{ $blog->PR_Price_SAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_PR_Date_SAQ" class="me-4" style="width: 120px;">Accept_PR_Date_SAQ</label>
                <div class="flex-grow-1">
                    <input type="text" name="Accept_PR_Date_SAQ" class="form-control"
                        value="{{ $blog->Accept_PR_Date_SAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="WO_No_SAQ" class="me-4" style="width: 100px;">WO_No_SAQ</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="WO_No_SAQ" class="form-control" value="{{ $blog->WO_No_SAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="WO_Price_SAQ" class="me-4" style="width: 100px;">WO_Price_SAQ</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="WO_Price_SAQ" class="form-control" value="{{ $blog->WO_Price_SAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_1st_SAQ" class="me-4" style="width: 100px;">Accept_1st_SAQ</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_1st_SAQ" class="form-control"
                        value="{{ $blog->Accept_1st_SAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_2nd_SAQ" class="me-4" style="width: 100px;">Accept_2nd_SAQ</label>
                <div class="flex-grow-1">
                    <input type="text" name="Accept_2nd_SAQ" class="form-control"
                        value="{{ $blog->Accept_2nd_SAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_3rd_SAQ" class="me-4" style="width: 100px;">Accept_3rd_SAQ</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_3rd_SAQ" class="form-control"
                        value="{{ $blog->Accept_3rd_SAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_4th_SAQ" class="me-4" style="width: 100px;">Accept_4th_SAQ</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_4th_SAQ" class="form-control"
                        value="{{ $blog->Accept_4th_SAQ }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Banlace_SAQ" class="me-4" style="width: 100px;">Banlace_SAQ</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Banlace_SAQ" class="form-control" value="{{ $blog->Banlace_SAQ }}">
                </div>
            </div>

            <!-- CR -->

            <hr class="custom-divider">

            <div class="status-row">

                <h4>CR</h4>

                <h5>Accept_1st
                    @if (!empty($blog->Accept_1st_CR))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_2nd
                    @if (!empty($blog->Accept_2nd_CR))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_3rd
                    @if (!empty($blog->Accept_3rd_CR))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_4th
                    @if (!empty($blog->Accept_4th_CR))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="AssignedSubCCR" class="me-4" style="width: 100px;">AssignedSubCCR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="AssignedSubCCR" class="form-control"
                        value="{{ $blog->AssignedSubCCR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PlanCR" class="me-4" style="width: 100px;">PlanCR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PlanCR" class="form-control" value="{{ $blog->PlanCR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="ActualCR" class="me-4" style="width: 100px;">ActualCR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="ActualCR" class="form-control" value="{{ $blog->ActualCR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="SubName_CR" class="me-4" style="width: 100px;">SubName_CR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="SubName_CR" class="form-control" value="{{ $blog->SubName_CR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Quo_No_CR" class="me-4" style="width: 100px;">Quo_No_CR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Quo_No_CR" class="form-control" value="{{ $blog->Quo_No_CR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PR_Price_CR" class="me-4" style="width: 100px;">PR_Price_CR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PR_Price_CR" class="form-control" value="{{ $blog->PR_Price_CR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_PR_Date_CR" class="me-4" style="width: 110px;">Accept_PR_Date_CR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_PR_Date_CR" class="form-control"
                        value="{{ $blog->Accept_PR_Date_CR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="WO_No_CR" class="me-4" style="width: 100px;">WO_No_CR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="WO_No_CR" class="form-control" value="{{ $blog->WO_No_CR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="WO_Price_CR" class="me-4" style="width: 100px;">WO_Price_CR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="WO_Price_CR" class="form-control" value="{{ $blog->WO_Price_CR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_1st_CR" class="me-4" style="width: 100px;">Accept_1st_CR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_1st_CR" class="form-control" value="{{ $blog->Accept_1st_CR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_2nd_CR" class="me-4" style="width: 100px;">Accept_2nd_CR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_2nd_CR" class="form-control" value="{{ $blog->Accept_2nd_CR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_3rd_CR" class="me-4" style="width: 100px;">Accept_3rd_CR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_3rd_CR" class="form-control" value="{{ $blog->Accept_3rd_CR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_4th_CR" class="me-4" style="width: 100px;">Accept_4th_CR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_4th_CR" class="form-control" value="{{ $blog->Accept_4th_CR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Banlace_CR" class="me-4" style="width: 100px;">Banlace_CR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Banlace_CR" class="form-control" value="{{ $blog->Banlace_CR }}">
                </div>
            </div>


            <!-- TSSR -->
            <hr class="custom-divider">

            <div class="status-row">

                <h4>TSSR</h4>

                <h5>Accept_1st
                    @if (!empty($blog->Accept_1st_TSSR))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_2nd
                    @if (!empty($blog->Accept_2nd_TSSR))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_3rd
                    @if (!empty($blog->Accept_3rd_TSSR))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_4th
                    @if (!empty($blog->Accept_4th_TSSR))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="AssignedSubCTSSR" class="me-4" style="width: 100px;">AssignedSubCTSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="AssignedSubCTSSR" class="form-control"
                        value="{{ $blog->AssignedSubCTSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PlanTSSR" class="me-4" style="width: 100px;">PlanTSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PlanTSSR" class="form-control" value="{{ $blog->PlanTSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="ActualTSSR" class="me-4" style="width: 100px;">ActualTSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="ActualTSSR" class="form-control" value="{{ $blog->ActualTSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="SubName_TSSR" class="me-4" style="width: 100px;">SubName_TSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="SubName_TSSR" class="form-control" value="{{ $blog->SubName_TSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Quo_No_TSSR" class="me-4" style="width: 100px;">Quo_No_TSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Quo_No_TSSR" class="form-control" value="{{ $blog->Quo_No_TSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PR_Price_TSSR" class="me-4" style="width: 100px;">PR_Price_TSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PR_Price_TSSR" class="form-control" value="{{ $blog->PR_Price_TSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_PR_Date_TSSR" class="me-4" style="width: 150px;">Accept_PR_Date_TSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_PR_Date_TSSR" class="form-control"
                        value="{{ $blog->Accept_PR_Date_TSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="WO_No_TSSR" class="me-4" style="width: 100px;">WO_No_TSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="WO_No_TSSR" class="form-control" value="{{ $blog->WO_No_TSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="WO_Price_TSSR" class="me-4" style="width: 100px;">WO_Price_TSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="WO_Price_TSSR" class="form-control" value="{{ $blog->WO_Price_TSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_1st_TSSR" class="me-4" style="width: 100px;">Accept_1st_TSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_1st_TSSR" class="form-control"
                        value="{{ $blog->Accept_1st_TSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_2nd_TSSR" class="me-4" style="width: 100px;">Accept_2nd_TSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_2nd_TSSR" class="form-control"
                        value="{{ $blog->Accept_2nd_TSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_3rd_TSSR" class="me-4" style="width: 100px;">Accept_3rd_TSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_3rd_TSSR" class="form-control"
                        value="{{ $blog->Accept_3rd_TSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_4th_TSSR" class="me-4" style="width: 100px;">Accept_4th_TSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_4th_TSSR" class="form-control"
                        value="{{ $blog->Accept_4th_TSSR }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Banlace_TSSR" class="me-4" style="width: 100px;">Banlace_TSSR</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Banlace_TSSR" class="form-control" value="{{ $blog->Banlace_TSSR }}">
                </div>
            </div>

            <hr class="custom-divider">


            <!-- CivilWork -->
            <div class="status-row">

                <h4>CivilWork</h4>

                <h5>Accept_1st
                    @if (!empty($blog->Accept_1st_CivilWork))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_2nd
                    @if (!empty($blog->Accept_2nd_CivilWork))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_3rd
                    @if (!empty($blog->Accept_3rd_CivilWork))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>

                <h5>Accept_4th
                    @if (!empty($blog->Accept_4th_CivilWork))
                        <span class="indicator has-data" title="Data Present"></span>
                    @else
                        <span class="indicator no-data" title="No Data"></span>
                    @endif
                </h5>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="AssignSubCivilfoundation" class="me-4"
                    style="width: 150px;">AssignSubCivilFoundation</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="AssignSubCivilfoundation" class="form-control"
                        value="{{ $blog->AssignSubCivilfoundation }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PlanCivilWorkFoundation" class="me-4" style="width: 150px;">PlanCivilWorkFoundation</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PlanCivilWorkFoundation" class="form-control"
                        value="{{ $blog->PlanCivilWorkFoundation }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="ActualCivilWorkTower" class="me-4" style="width: 150px;">ActualCivilWorkTower</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="ActualCivilWorkTower" class="form-control"
                        value="{{ $blog->ActualCivilWorkTower }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="AssignCivilWorkTower" class="me-4" style="width: 150px;">AssignCivilWorkTower</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="AssignCivilWorkTower" class="form-control"
                        value="{{ $blog->AssignCivilWorkTower }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PlanInstallationRectifier" class="me-4"
                    style="width: 150px;">PlanInstallationRectifier</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PlanInstallationRectifier" class="form-control"
                        value="{{ $blog->PlanInstallationRectifier }}">
                </div>
            </div>


            <div class="col-md-12 d-flex align-items-center ">
                <label for="ActualInstallationRectifier" class="me-4"
                    style="width: 170px;">ActualInstallationRectifier</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="ActualInstallationRectifier" class="form-control"
                        value="{{ $blog->ActualInstallationRectifier }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PlanACPower" class="me-4" style="width: 100px;">PlanACPower</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PlanACPower" class="form-control" value="{{ $blog->PlanACPower }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="ActualACPower" class="me-4" style="width: 100px;">ActualACPower</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="ActualACPower" class="form-control" value="{{ $blog->ActualACPower }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PlanACMeter" class="me-4" style="width: 100px;">PlanACMeter</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PlanACMeter" class="form-control" value="{{ $blog->PlanACMeter }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="ActualACMeter" class="me-4" style="width: 100px;">ActualACMeter</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="ActualACMeter" class="form-control" value="{{ $blog->ActualACMeter }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PAT" class="me-4" style="width: 100px;">PAT</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PAT" class="form-control" value="{{ $blog->PAT }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="DefPAT" class="me-4" style="width: 100px;">DefPAT</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="DefPAT" class="form-control" value="{{ $blog->DefPAT }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="FAT" class="me-4" style="width: 100px;">FAT</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="FAT" class="form-control" value="{{ $blog->FAT }}">
                </div>
            </div>


            <hr class="custom-divider">



            <div class="col-md-12 d-flex align-items-center ">
                <label for="Assigned_CivilWork" class="me-4" style="width: 100px;">Assigned_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Assigned_CivilWork" class="form-control"
                        value="{{ $blog->Assigned_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Plan_CivilWork" class="me-4" style="width: 100px;">Plan_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Plan_CivilWork" class="form-control"
                        value="{{ $blog->Plan_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Actual_CivilWork" class="me-4" style="width: 100px;">Actual_CivilWork</label>
                <div class="flex-grow-1 ">
                    <input type="text" name="Actual_CivilWork" class="form-control"
                        value="{{ $blog->Actual_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="SubName_CivilWork" class="me-4" style="width: 100px;">SubName_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="SubName_CivilWork" class="form-control"
                        value="{{ $blog->SubName_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Quo_No_CivilWork" class="me-4" style="width: 100px;">Quo_No_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Quo_No_CivilWork" class="form-control"
                        value="{{ $blog->Quo_No_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="PR_Price_CivilWork" class="me-4" style="width: 100px;">PR_Price_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="PR_Price_CivilWork" class="form-control"
                        value="{{ $blog->PR_Price_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_PR_Date_CivilWork" class="me-4"
                    style="width: 150px;">Accept_PR_Date_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_PR_Date_CivilWork" class="form-control"
                        value="{{ $blog->Accept_PR_Date_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="WO_No_CivilWork" class="me-4" style="width: 100px;">WO_No_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="WO_No_CivilWork" class="form-control"
                        value="{{ $blog->WO_No_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="WO_Price_CivilWork" class="me-4" style="width: 120px;">WO_Price_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="WO_Price_CivilWork" class="form-control"
                        value="{{ $blog->WO_Price_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_1st_CivilWork" class="me-4" style="width: 120px;">Accept_1st_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_1st_CivilWork" class="form-control"
                        value="{{ $blog->Accept_1st_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_2nd_CivilWork" class="me-4" style="width: 120px;">Accept_2nd_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_2nd_CivilWork" class="form-control"
                        value="{{ $blog->Accept_2nd_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_3rd_CivilWork" class="me-4" style="width: 120px;">Accept_3rd_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_3rd_CivilWork" class="form-control"
                        value="{{ $blog->Accept_3rd_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Accept_4th_CivilWork" class="me-4" style="width: 120px;">Accept_4th_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Accept_4th_CivilWork" class="form-control"
                        value="{{ $blog->Accept_4th_CivilWork }}">
                </div>
            </div>

            <div class="col-md-12 d-flex align-items-center ">
                <label for="Banlace_CivilWork" class="me-4" style="width: 100px;">Banlace_CivilWork</label>
                <div class="d-flex flex-column ">
                    <input type="text" name="Banlace_CivilWork" class="form-control"
                        value="{{ $blog->Banlace_CivilWork }}">
                </div>
            </div>


            <div class="container text-center mb-3 my-3">
                <input type="submit" value="อัปเดต" class="btn btn-primary my-3" onclick="return confirmUpdate()">
                <a href="/blog" class="btn btn-success">หน้าแรก</a>
            </div>

            <script>
                function confirmUpdate() {
                    // แสดงกล่องยืนยัน
                    if (confirm('คุณต้องการอัปเดตข้อมูลหรือไม่?')) {
                        return true; // ถ้าผู้ใช้ยืนยัน ให้ส่งฟอร์ม
                    } else {
                        return false; // ถ้าผู้ใช้ยกเลิก ไม่ส่งฟอร์ม
                    }
                }
            </script>

        </form>
    </div>

@endsection
