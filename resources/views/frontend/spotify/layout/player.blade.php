<section class="bottom-player d-none">
    <div class="player-spot">
        <div class="wrapper">
            <div class="details">
                <div class="track-art track-arts"></div>
                <div class="music-details">
                    <div class="track-name">Track Name</div>
                    <div class="track-artist">Track Artist</div>
                </div>
            </div>

            <div class="controls-main">
                <div class="buttons">
                    <div class="repeat-track" onclick="repeatTrack()">
                        <i class="fa fa-repeat" title="Repeat"></i>
                    </div>
                    <div class="prev-track" onclick="prevTrack()">
                        <i class="fa-solid fa-backward"></i>
                    </div>
                    <div class="playpause-track" onclick="playpauseTrack()">
                        <i class="fa fa-play-circle"></i>
                    </div>
                    <div class="next-track" onclick="nextTrack()">
                        <i class="fa-solid fa-forward"></i>
                    </div>
                    <div class="repeat-track">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                </div>

                <div class="slider_container">
                    <div class="current-time">0:00</div>
                    <input type="range" min="1" max="100" value="0" class="seek_slider"
                        onchange="seekTo()">
                    <div class="total-duration">00:00</div>
                </div>
            </div>

            <div class="slider_container">
                <i class="fa-solid fa-volume-off"></i>
                <input type="range" min="1" max="100" value="99" class="volume_slider"
                    onchange="setVolume()">
                <i class="fa-solid fa-volume-high"></i>
            </div>
        </div>
    </div>
</section>

<script>
    let isPlaying = false;
    let trackIndex = 0;
    let trackList = [];
    let currTrack = new Audio();
    let updateTimer;
    let trackPlayedPercentage = 0;

    let track_art = document.querySelector(".track-arts");
    let track_arts = document.querySelector(".track-artss");
    let track_name = document.querySelectorAll(".track-name");
    let track_artist = document.querySelectorAll(".track-artist");

    let playpause_btn = document.querySelector(".playpause-track");
    let next_btn = document.querySelector(".next-track");
    let prev_btn = document.querySelector(".prev-track");

    let seek_slider = document.querySelector(".seek_slider");
    let volume_slider = document.querySelector(".volume_slider");
    let curr_time = document.querySelector(".current-time");
    let total_duration = document.querySelector(".total-duration");

    let playerClass = document.querySelector(".bottom-player");
    let sidebarClass = document.querySelector(".left-bar");


    function loadTrack(index) {
        const track = trackList[index];
        console.log(track);


        if (playerClass) {
            playerClass.classList.remove("d-none");
        }
        if (sidebarClass) {
            sidebarClass.classList.remove("d-none");
        }
        track_art.style.backgroundImage = "url(storage/" + track.cover_image_path + ")";
        track_arts.src = "storage/" + track.cover_image_path;
        currTrack.src = "storage/" + track.audio_file_path;
        currTrack.trackId = track.id;
        track_name.forEach((element) => {
            element.textContent = track.title;
        });


        track_artist.forEach((element) => {
            element.textContent = track.artist.user.name;
        });


        console.log(track_name, track_artist);


        clearInterval(updateTimer);
        resetValues();
        currTrack.load();


        updateTimer = setInterval(seekUpdate, 1000);
        currTrack.addEventListener("ended", nextTrack);


        console.log('done');
        playpauseTrack();
        trackPlayedPercentage = 0;
    }


    function resetValues() {
        curr_time.textContent = "00:00";
        total_duration.textContent = "00:00";
        seek_slider.value = 0;
    }


    function playpauseTrack() {
        if (!isPlaying) playTrack();
        else pauseTrack();
    }


    function playTrack() {
        currTrack.play();
        isPlaying = true;
        playpause_btn.innerHTML = '<i class="fa fa-pause-circle fa-5x"></i>';
    }


    function pauseTrack() {
        currTrack.pause();
        isPlaying = false;
        playpause_btn.innerHTML = '<i class="fa fa-play-circle fa-5x"></i>';
    }


    function nextTrack() {
        if (trackIndex < trackList.length - 1) trackIndex++;
        else trackIndex = 0;
        loadTrack(trackIndex);
        playTrack();
    }


    function prevTrack() {
        if (trackIndex > 0) trackIndex--;
        else trackIndex = trackList.length - 1;
        loadTrack(trackIndex);
        playTrack();
    }


    function repeatTrack() {
        loadTrack(trackIndex);
        playTrack();
    }


    function seekTo() {
        let seekto = currTrack.duration * (seek_slider.value / 100);
        console.log(currTrack.duration, seek_slider.value, seekto);

        currTrack.currentTime = seekto;
    }


    function setVolume() {
        currTrack.volume = volume_slider.value / 100;
    }


    function seekUpdate() {
        let seekPosition = 0;

        if (!isNaN(currTrack.duration)) {
            seekPosition = currTrack.currentTime * (100 / currTrack.duration);
            seek_slider.value = seekPosition;

            let currentMinutes = Math.floor(currTrack.currentTime / 60);
            let currentSeconds = Math.floor(currTrack.currentTime - currentMinutes * 60);
            let durationMinutes = Math.floor(currTrack.duration / 60);
            let durationSeconds = Math.floor(currTrack.duration - durationMinutes * 60);

            if (currentSeconds < 10) currentSeconds = "0" + currentSeconds;
            if (durationSeconds < 10) durationSeconds = "0" + durationSeconds;
            if (currentMinutes < 10) currentMinutes = "0" + currentMinutes;
            if (durationMinutes < 10) durationMinutes = "0" + durationMinutes;

            curr_time.textContent = currentMinutes + ":" + currentSeconds;
            total_duration.textContent = durationMinutes + ":" + durationSeconds;




            if (seekPosition >= 5 && trackPlayedPercentage < 25) {
                trackPlayedPercentage = 25;
                trackPlayToDatabase(currTrack.trackId);
            }
        }
    }


    function trackPlayToDatabase(trackId) {

        $.ajax({
            url: '/track/' + trackId + '/play',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                console.log('Play registered in database.');
            },
            error: function(xhr, status, error) {
                console.error('Error logging track play:', error);
            }
        });
    }


    function playPlaylist(playlistId) {
        $.ajax({
            url: '/playlist/' + playlistId + '/tracks',
            method: 'GET',
            success: function(response) {
                trackList = response.tracks;
                trackIndex = 0;
                loadTrack(trackIndex);
                playTrack();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching playlist tracks:', error);
            }
        });
    }

    function playalbum(albumId) {
        $.ajax({
            url: '/album/' + albumId + '/tracks',
            method: 'GET',
            success: function(response) {
                trackList = response.tracks;
                trackIndex = 0;
                loadTrack(trackIndex);
                playTrack();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching album tracks:', error);
            }
        });
    }


    function playSingleTrack(trackId) {
        $.ajax({
            url: '/track/' + trackId,
            method: 'GET',
            success: function(response) {
                trackList = [response.track];
                console.log(response);

                trackIndex = 0;
                loadTrack(trackIndex);
                playTrack();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching single track:', error);
            }
        });
    }
</script>
