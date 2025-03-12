<div class="rightFour">
    <div class="brightOne">
        <h2 class="tetd">Queries</h2>
        <div class="Ttdd">
            <table class="brightTwo ttable">
                <tr class="TableHead">
                    <td class="teacher">Name</td>
                    <td class="teacher">Email ID</td>
                    <td class="teacher">Message</td>
                    <td class="teacher">Date and Time</td>
                </tr>

                @forelse ($queries as $query)
                <tr class="teacherDet">
                    <td class="ttd">{{$query["fullname"]}}</td>
                    <td class="ttd">{{$query["email"]}}</td>
                    <td class="ttd">{{$query["message"]}}</td>
                    <td class="ttd">{{$query["date"]}}</td>
                </tr>
                @empty
                <h1>No data found</h1>
                @endforelse

            </table>
        </div>
    </div>
</div>
