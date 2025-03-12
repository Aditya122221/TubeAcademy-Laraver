<div class="rightThree">
    <div class="brightOne">
        <h2 class="tetd">Student Details</h2>
        <div class="Ttdd">
            <table class="brightTwo ttable">
                <tr class="TableHead">
                    <td class="teacher">Registration ID</td>
                    <td class="teacher">Name</td>
                    <td class="teacher">Phone Number</td>
                    <td class="teacher">Email</td>
                    <td class="teacher">Address</td>
                </tr>
                @foreach ($studentData as $sd)
                <tr class="teacherDet">
                    <td class="ttd">{{$sd["Registration_ID"]}}</td>
                    <td class="ttd">{{$sd["fName"]}} {{$sd["lName"]}}</td>
                    <td class="ttd">{{$sd["pNumber"]}}</td>
                    <td class="ttd">{{$sd["email"]}}</td>
                    <td class="ttd">{{$sd["address"]}}</td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
