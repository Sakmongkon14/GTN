<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>

<body>



    <!-- @foreach ($data as $item)
<td>{{ $item->GTNJobNo }}</td> <br>
    <td>{{ $item->Region_name }}</td> <br>
@endforeach

    @foreach ($data as $item)
@endforeach

   -->

    <h2>GTN Job Numbers</h2>
    <p>Total GTN Job No Count_total: {{ $gtnCount_total }}</p> <!-- แสดงจำนวนของ GTN Count_total -->

    <tr>
        @foreach ($gtn as $item)
            <li>{{ $item }}</li> <!-- แสดงค่าของแต่ละรายการในเซลล์ของตาราง -->
        @endforeach
    </tr>

    <h2>GTN Job Numbers</h2>
    <p>Total GTN Job No Count_null: {{ $gtnCount_null }}</p> <!-- แสดงจำนวนของ GTN Count_null -->

    @if ($rowsWithoutData->isEmpty())
        <p>ไม่มีแถวที่ไม่มีข้อมูลใน GTN Job No</p>
    @else
        <p>แถวที่ไม่มีข้อมูลใน GTN Job No:</p>
        <ul>
            @foreach ($rowsWithoutData as $row)
                <li>Row ID: {{ $row->id }} <!-- แสดง ID หรือข้อมูลอื่นๆ ที่เป็นลักษณะเฉพาะของแถว -->
                    @if (is_null($row->GTNJobNo))
                        (ค่าเป็น null)
                    @elseif ($row->GTNJobNo === '')
                        (ค่าที่เป็นค่าว่าง)
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

   <p> Total GTN Job No ทั้งหมด จำนวน = {{ $sum }} </p>

    <br>
    <br>
    <br>




    <div class="container text-center mb-3">
        <input type="submit" value="เพิ่ม" class="btn btn-primary my-3" onclick="showAlert()">
        <a href="/blog" class="btn btn-success">หน้าแรก</a>
    </div> <br>

    <!-- Import SweetAlert2 Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <input type="file">





</body>

</html>
