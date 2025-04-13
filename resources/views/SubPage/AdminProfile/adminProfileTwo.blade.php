<div class="rightTwo full">
    <div class="brightOne">
        <h2 class="tetd">Teacher Details</h2>
        <div class="Ttdd">
            <table class="brightTwo ttable">
                <tr class="TableHead">
                    <td class="teacher">Registration ID</td>
                    <td class="teacher">Name</td>
                    <td class="teacher">Phone Number</td>
                    <td class="teacher">Email</td>
                    <td class="teacher">Address</td>
                </tr>
                @foreach ($teacherData as $td)
                <tr class="teacherDet">
                    <td class="ttd">{{$td["Registration_ID"]}}</td>
                    <td class="ttd">{{$td["fName"]}} {{$td["lName"]}}</td>
                    <td class="ttd">{{$td["pNumber"]}}</td>
                    <td class="ttd">{{$td["email"]}}</td>
                    <td class="ttd">{{$td["address"]}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
