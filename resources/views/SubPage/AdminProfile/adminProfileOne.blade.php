<div class="rightone">
    <div class="card">
        <div class="leftContainer">
            <img class="profile" alt="Profile" src="{{$user["avatar"]=="" ? asset("Images/TeamLeader.png") : asset('storage/' . $user->avatar)}}">

            {{-- <img src="{{$user["avatar"]=="" ? asset("Images/TeamLeader.png") : $user["avatar"]}}" alt="Profile" class="profile"> --}}

            <h2 class="gradienttext">{{$user["fName"]}} {{$user["lName"]}}</h2>

            <button onclick="window.location.href='{{route('profileupdate', ['regid'=>$user['Registration_ID'], 'role'=>$user['role']])}}'" class="rightOneButton">Update Profile</button>
        </div>
        <div class="rightContainer">
            <h3 class="gradienttext">Profile Details</h3>
            <table class="otable">
                <tr>
                    <td class="otd">Registration ID :</td>
                    <td class="otd">{{$user["Registration_ID"]}}</td>
                </tr>
                <tr>
                    <td class="otd">Name :</td>
                    <td class="otd">{{$user["fName"]}} {{$user["lName"]}}</td>
                </tr>
                <tr>
                    <td class="otd">Mobile :</td>
                    <td class="otd">{{$user["pNumber"]}}</td>
                </tr>
                <tr>
                    <td class="otd">Email :</td>
                    <td class="otd">{{$user["email"]}}</td>
                </tr>
                <tr>
                    <td class="otd">Address :</td>
                    <td class="otd">{{$user["address"]}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
