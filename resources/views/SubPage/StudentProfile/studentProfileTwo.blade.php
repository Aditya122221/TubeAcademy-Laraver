<div class="rightFour">
    <div class="brightOne">
        <h2 class="tetd">Queries</h2>
        <div class="Ttdd">
            <table class="brightTwo ttable">
                <tr class="TableHead">
                    <td class="teacher">Name</td>
                    <td class="teacher">Email ID</td>
                    <td class="teacher">Query</td>
                    <td class="teacher">Query Date</td>
                    <td class="teacher">Resolution</td>
                    <td class="teacher">Resolution Date</td>
                </tr>

                @forelse ($queries as $query)
                <tr class="teacherDet {{$query->status == "resolved" ? "resolved" : "pending"}}">
                    <td class="ttd">{{$query["fullname"]}}</td>
                    <td class="ttd">{{$query["email"]}}</td>
                    <td class="ttd">{{$query["message"]}}</td>
                    <td class="ttd">{{$query["querydate"]}}</td>
                    <td class="ttd">{{$query["replyMessage"]}}</td>
                    <td class="ttd">{{$query["resolveDate"]}}</td>
                </tr>
                @empty
                <h1>No data found</h1>
                @endforelse

            </table>
        </div>
    </div>
</div>
