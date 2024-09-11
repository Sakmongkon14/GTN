@extends('layouts.app')
@section('title', 'GTN')
@section('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <h2 class="text text-center">ข้อมูลทั้งหมด</h2>

    <div class="container-fluid my-2">
        <div class="row align-items-center">
            <div class="col-12 col-md-auto button_custom">
                <a class="btn btn-primary " href="add" role="button">ADD</a>
            </div>
            <div class="col-12 col-md d-flex justify-content-end">
                <div class="input-group">
                    <input type="text" class="form-control fixed-width-input" name="search" id="search"
                        placeholder="Search">
                    <button id="exportButton" class="btn btn-outline-success ms-2" style="margin-right: 30px;">
                        Export to Excel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" name="search" id="search" style="width: 100px;">
                                                                    <button id="exportButton" class="btn btn-outline-success ms-2" style="margin-right: 30px;">Export to Excel</button>
                                                                </div>

                                                            -->

    <script>
        //ฟังก์ชั่น search
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val().toLowerCase(); // ทำให้ query เป็นตัวพิมพ์เล็กทั้งหมด
                $('#table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
                });
            });
        });
    </script>

    <script>
        // ฟังก์ชันส่งออก export
        document.getElementById('exportButton').addEventListener('click', function() {
            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.table_to_sheet(document.getElementById('table'));
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
            XLSX.writeFile(wb, 'table_data.xlsx');
        });
    </script>

    <style>
        .input-group {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            width: 25%;
        }

        .table-container {
            width: 98%;
            max-height: 530px;
            overflow-x: auto;
            overflow-y: auto;
        }


        .table-container table {
            height: 100%;
            border-collapse: collapse;
        }

        .table-container td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            white-space: nowrap;
        }

        .table-container th {
            //-เส้นขอบ colum
            padding: 8px;
            text-align: center;
            white-space: nowrap;
            position: sticky;
            top: 0px;
            text-align: center;
            background-color: #99FFCC;

        }

        .table-container th:nth-child(1),
        .table-container td:nth-child(1) {
            position: sticky;
            left: 0px;
            width: 50px;
            min-width: 50px;

        }

        .table-container th:nth-child(2),
        .table-container td:nth-child(2) {
            position: sticky;
            left: 50px;
            width: 150px;
            min-width: 150px;
        }

        .table-container th:nth-child(3),
        .table-container td:nth-child(3) {
            position: sticky;
            left: 200px;
            width: 100px;
            min-width: 100px;
        }

        .table-container th:nth-child(4),
        .table-container td:nth-child(4) {
            position: sticky;
            left: 300px;
            width: 115px;
            min-width: 115px;
        }

        .table-container th:nth-child(5),
        .table-container td:nth-child(5) {
            position: sticky;
            left: 415px;
            width: 80px;
            min-width: 80px;
        }

        .table-container td:nth-child(1),
        .table-container td:nth-child(2),
        .table-container td:nth-child(3),
        .table-container td:nth-child(4),
        .table-container td:nth-child(5) {}

        .table-container th:nth-child(1),
        .table-container th:nth-child(2),
        .table-container th:nth-child(3),
        .table-container th:nth-child(4),
        .table-container th:nth-child(5) {
            z-index: 5;
            background: #d2cbc8;
        }

        .status-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 60px;
            /* ระยะห่างระหว่างแต่ละ <h5> */
        }

        .indicator {
            width: 8px;
            height: 8px;
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
    </style>

    <div class="table-container">
        <table class="table" id="table">
            <thead style="font-size: 12px; text-align:center ">

                <th scope="col"></th>
                <th scope="col">GTN Job No</th>
                <th scope="col">RefCode</th>
                <th scope="col">Owner Old Ste</th>
                <th scope="col">Site Code</th>
                <th scope="col">Site NAME_T</th>
                <th scope="col">Plan Type</th>
                <th scope="col">Region</th>
                <th scope="col">Province</th>
                <th scope="col">Site Type</th>
                <th scope="col">Cancel Site</th>
                <th scope="col">Tower New Site</th>
                <th scope="col">Tower height</th>
                <th scope="col">Tower</th>
                <th scope="col">Zone</th>
                <th scope="col">Dead Line</th>
                <th scope="col">Dead Line (Y)</th>
                <th scope="col">Status</th>

                <!-- SAQ -->
                <th scope="col" style="background-color: #D1E9F6">Assigned SubC Survey SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">Plan Survey SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">Actual Survey SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">SubName SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">Quo No SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">PR Price SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">Accept PR Date SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">WO No SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">WO Price SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">Accept 1st SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">Accept 2st SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">Accept 3st SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">Accept 4st SAQ</th>
                <th scope="col" style="background-color: #D1E9F6">Banlace SAQ</th>

                <!-- CR -->
                <th scope="col" style="background-color: #59D5E0">Assigned SubC CR</th>
                <th scope="col" style="background-color: #59D5E0">Plan CR</th>
                <th scope="col" style="background-color: #59D5E0">Actual CR</th>
                <th scope="col" style="background-color: #59D5E0">SubName CR</th>
                <th scope="col" style="background-color: #59D5E0">Quo No CR</th>
                <th scope="col" style="background-color: #59D5E0">PR Price CR</th>
                <th scope="col" style="background-color: #59D5E0">Accept PR Date CR</th>
                <th scope="col" style="background-color: #59D5E0">WO No CR</th>
                <th scope="col" style="background-color: #59D5E0">WO Price CR</th>
                <th scope="col" style="background-color: #59D5E0">Accept 1st CR</th>
                <th scope="col" style="background-color: #59D5E0">Accept 2st CR</th>
                <th scope="col" style="background-color: #59D5E0">Accept 3st CR</th>
                <th scope="col" style="background-color: #59D5E0">Accept 4st CR</th>
                <th scope="col" style="background-color: #59D5E0">Banlace CR</th>

                <!-- TSSR -->
                <th scope="col" style="background-color: #F5DD61">Assigned SubC TSSR</th>
                <th scope="col" style="background-color: #F5DD61">Plan TSSR</th>
                <th scope="col" style="background-color: #F5DD61">Actual TSSR</th>
                <th scope="col" style="background-color: #F5DD61">SubName TSSR</th>
                <th scope="col" style="background-color: #F5DD61">Quo No TSSR</th>
                <th scope="col" style="background-color: #F5DD61">PR Price TSSR</th>
                <th scope="col" style="background-color: #F5DD61">Accept PR Date TSSR</th>
                <th scope="col" style="background-color: #F5DD61">WO No TSSR</th>
                <th scope="col" style="background-color: #F5DD61">WO Price TSSR</th>
                <th scope="col" style="background-color: #F5DD61">Accept 1st TSSR</th>
                <th scope="col" style="background-color: #F5DD61">Accept 2st TSSR</th>
                <th scope="col" style="background-color: #F5DD61">Accept 3st TSSR</th>
                <th scope="col" style="background-color: #F5DD61">Accept 4st TSSR</th>
                <th scope="col" style="background-color: #F5DD61">Banlace TSSR</th>


                <!-- CivilWork -->
                <th scope="col" style="background-color: #00DFA2">Assign Sub Civil Foundation</th>
                <th scope="col" style="background-color: #00DFA2">Plan Civil Work Foundation</th>
                <th scope="col" style="background-color: #00DFA2">Actual Civil Work Tower</th>
                <th scope="col" style="background-color: #00DFA2">Assign Civil Work Tower</th>
                <th scope="col" style="background-color: #00DFA2">Plan Installation Rectifier</th>
                <th scope="col" style="background-color: #00DFA2">Actual Installation Rectifier</th>
                <th scope="col" style="background-color: #00DFA2">Plan AC Power</th>
                <th scope="col" style="background-color: #00DFA2">Actual AC Power</th>
                <th scope="col" style="background-color: #00DFA2">Plan AC Meter</th>
                <th scope="col" style="background-color: #00DFA2">Actual AC Meter</th>
                <th scope="col" style="background-color: #00DFA2">PAT</th>
                <th scope="col" style="background-color: #00DFA2">Def.PAT</th>
                <th scope="col" style="background-color: #00DFA2">FAT</th>
                <th scope="col" style="background-color: #00DFA2">Assigned CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">Plan CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">Actual CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">SubName CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">Quo No CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">PR Price CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">Accept PR Date CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">WO No CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">WO Price CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">Accept 1st CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">Accept 2st CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">Accept 3st CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">Accept 4st CivilWork</th>
                <th scope="col" style="background-color: #00DFA2">Banlace CivilWork</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $item)
                    <tr style="font-size: 10px; text-align:center ">

                        <td><a href=" {{ route('edit', $item->id) }}"><i class="bi bi-pencil-fill "></i></a></td>
                        <td>{{ $item->GTNJobNo }}</td>
                        <td>{{ $item->RefCode }}</td>

                        <td>{{ $item->OwnerOldSte }}</td>
                        <td>{{ $item->SiteCode }}</td>
                        <td>{{ Str::limit($item->SiteNAME_T, 15) }}</td>
                        <td>{{ $item->PlanType }}</td>

                        <td>
                            @foreach ($areas as $region)
                                @if ($region->Region_id == $item->Region_id)
                                    {{ $region->Region_name }}
                                @endif
                            @endforeach
                        </td>

                        <td>{{ $item->Province }}</td>
                        <td>{{ $item->SiteType }}</td>
                        <td>{{ $item->CancelSite }}</td>
                        <td>{{ $item->TowerNewSite }}</td>
                        <td>{{ $item->Towerheight }}</td>
                        <td>{{ $item->Tower }}</td>
                        <td>{{ $item->Zone }}</td>
                        <td>{{ $item->DeadLine }}</td>
                        <td>{{ $item->DeadLine_Y }}</td>
                        <td>{{ $item->Status }}</td>

                        <!-- SAQ  -->
                        <td>{{ $item->AssignedSubCSurveySAQ }}</td>
                        <td>{{ $item->PlanSurveySAQ }}</td>
                        <td>{{ $item->ActualSurveySAQ }}</td>
                        <td>{{ $item->SubName_SAQ }}</td>
                        <td>{{ $item->Quo_No_SAQ }}</td>
                        <td>{{ $item->PR_Price_SAQ }}</td>
                        <td>{{ $item->Accept_PR_Date_SAQ }}</td>
                        <td>{{ $item->WO_No_SAQ }}</td>
                        <td>{{ $item->WO_Price_SAQ }}</td>

                        <td>
                            {{ $item->Accept_1st_SAQ }}
                            @if (empty($item->Accept_1st_SAQ))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_2nd_SAQ }}
                            @if (empty($item->Accept_2nd_SAQ))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_3rd_SAQ }}
                            @if (empty($item->Accept_3rd_SAQ))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_4th_SAQ }}
                            @if (empty($item->Accept_4th_SAQ))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>


                        <td>{{ $item->Banlace_SAQ }}</td>

                        <!-- CR  -->
                        <td>{{ $item->AssignedSubCCR }}</td>
                        <td>{{ $item->PlanCR }}</td>
                        <td>{{ $item->ActualCR }}</td>
                        <td>{{ $item->SubName_CR }}</td>
                        <td>{{ $item->Quo_No_CR }}</td>
                        <td>{{ $item->PR_Price_CR }}</td>
                        <td>{{ $item->Accept_PR_Date_CR }}</td>
                        <td>{{ $item->WO_No_CR }}</td>
                        <td>{{ $item->WO_Price_CR }}</td>

                        <td>
                            {{ $item->Accept_1st_CR }}
                            @if (empty($item->Accept_1st_CR))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_2nd_CR }}
                            @if (empty($item->Accept_2nd_CR))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_3rd_CR }}
                            @if (empty($item->Accept_3rd_CR))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_4th_CR }}
                            @if (empty($item->Accept_4th_CR))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>{{ $item->Banlace_CR }}</td>

                        <!-- TSSR  -->
                        <td>{{ $item->AssignedSubCTSSR }}</td>
                        <td>{{ $item->PlanTSSR }}</td>
                        <td>{{ $item->ActualTSSR }}</td>
                        <td>{{ $item->SubName_TSSR }}</td>
                        <td>{{ $item->Quo_No_TSSR }}</td>
                        <td>{{ $item->PR_Price_TSSR }}</td>
                        <td>{{ $item->Accept_PR_Date_TSSR }}</td>
                        <td>{{ $item->WO_No_TSSR }}</td>
                        <td>{{ $item->WO_Price_TSSR }}</td>

                        <td>
                            {{ $item->Accept_1st_TSSR }}
                            @if (empty($item->Accept_1st_TSSR))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_2nd_TSSR }}
                            @if (empty($item->Accept_2nd_TSSR))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_3rd_TSSR }}
                            @if (empty($item->Accept_3rd_TSSR))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_4th_TSSR }}
                            @if (empty($item->Accept_4th_TSSR))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>{{ $item->Banlace_TSSR }}</td>

                        <!-- CivilWork  -->
                        <td>{{ $item->AssignSubCivilfoundation }}</td>
                        <td>{{ $item->PlanCivilWorkFoundation }}</td>
                        <td>{{ $item->ActualCivilWorkTower }}</td>
                        <td>{{ $item->AssignCivilWorkTower }}</td>
                        <td>{{ $item->PlanInstallationRectifier }}</td>
                        <td>{{ $item->ActualInstallationRectifier }}</td>
                        <td>{{ $item->PlanACPower }}</td>
                        <td>{{ $item->ActualACPower }}</td>
                        <td>{{ $item->PlanACMeter }}</td>
                        <td>{{ $item->ActualACMeter }}</td>
                        <td>{{ $item->PAT }}</td>
                        <td>{{ $item->DefPAT }}</td>
                        <td>{{ $item->FAT }}</td>

                        <td>{{ $item->Assigned_CivilWork }}</td>
                        <td>{{ $item->Plan_CivilWork }}</td>
                        <td>{{ $item->Actual_CivilWork }}</td>
                        <td>{{ $item->SubName_CivilWork }}</td>
                        <td>{{ $item->Quo_No_CivilWork }}</td>
                        <td>{{ $item->PR_Price_CivilWork }}</td>
                        <td>{{ $item->Accept_PR_Date_CivilWork }}</td>
                        <td>{{ $item->WO_No_CivilWork }}</td>
                        <td>{{ $item->WO_Price_CivilWork }}</td>

                        <td>
                            {{ $item->Accept_1st_CivilWork }}
                            @if (empty($item->Accept_1st_CivilWork))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_2nd_CivilWork }}
                            @if (empty($item->Accept_2nd_CivilWork))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_3rd_CivilWork }}
                            @if (empty($item->Accept_3rd_CivilWork))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>
                            {{ $item->Accept_4th_CivilWork }}
                            @if (empty($item->Accept_4th_CivilWork))
                                <span class="indicator no-data" title="No Data"></span>
                            @endif
                        </td>

                        <td>{{ $item->Banlace_CivilWork }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
