<div class="rightone">
    <div class="card">
        <div class="leftContainer">
            <img src="{{$user["avatar"]=="" ? asset("Images/TeamLeader.png") : asset('storage/' . $user->avatar)}}" alt="Profile Image" class="profile">

            <h2 class="gradienttext">{{$user["fName"]}} {{$user["lName"]}}</h2>
            <button onclick="window.location.href='{{route('profileupdate', ['regid'=>$user['Registration_ID'], 'role'=>$user['role']])}}'" class="rightOneButton">Update Profile</button>
        </div>
        <div class="rightContainer">
            <h3 class="gradienttext">Profile Details</h3>
            <table class="table">
                <tr>
                    <td class="td">Registration ID :</td>
                    <td class="td">{{$user["Registration_ID"]}}</td>
                </tr>
                <tr>
                    <td class="td">Name :</td>
                    <td class="td">{{$user["fName"]}} {{$user["lName"]}}</td>
                </tr>
                <tr>
                    <td class="td">Mobile :</td>
                    <td class="td">{{$user["pNumber"]}}</td>
                </tr>
                <tr>
                    <td class="td">Email :</td>
                    <td class="td">{{$user["email"]}}</td>
                </tr>
                <tr>
                    <td class="td">Address :</td>
                    <td class="td">{{$user["address"]}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
