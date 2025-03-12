<div class="rigth2">
    <div class="account">
        <form class="form" method="post" enctype="multipart/form-data">
            @csrf
            @error('VTitle')
                <span class="errrooor">{{ $message }}</span>
            @enderror
            <input class="input" type="text" name="VTitle" placeholder="Enter the title for the video">

            @error('SubjectName')
                <span class="errrooor">{{ $message }}</span>
            @enderror
            <select name="SubjectName" class="select">
                <option class="option" value="">--- Select Subject ---</option>
                <option class="option" value="Mathematics">Mathematics</option>
                <option class="option" value="Physics">Physics</option>
                <option class="option" value="Chemistry">Chemistry</option>
                <option class="option" value="Biology">Biology</option>
            </select>

            @error('classIn')
                <span class="errrooor">{{ $message }}</span>
            @enderror
            <select name="classIn" class="select">
                <option class="option" value="">--- Select Class ---</option>
                <option class="option" value="IX">IX</option>
                <option class="option" value="X">X</option>
                <option class="option" value="XI">XI</option>
                <option class="option" value="XII">XII</option>
            </select>

            @error('thumbnail')
                <span class="errrooor">{{ $message }}</span>
            @enderror
            <div class="uploader">
                <div class="formm">
                    <span class="formTitle">Upload Thumbnail</span>
                    <label for="thumbnail-input" class="dropContainer">
                        <input type="file" class="fileInput" name="thumbnail" id="thumbnail-input">
                    </label>
                </div>

                @error('video')
                    <span class="errrooor">{{ $message }}</span>
                @enderror
                <div class="formm">
                    <span class="formTitle">Upload Video</span>
                    <label for="video-input" class="dropContainer">
                        <input type="file" class="fileInput" name="video" id="video-input">
                    </label>
                </div>
            </div>

            <button class="button" type="submit">Upload Video</button>
        </form>
        {{-- <span class="succ">Video Uploaded Successfully</span>
        <span class="unsucc">Video was not uploaded</span> --}}
    </div>
</div>
