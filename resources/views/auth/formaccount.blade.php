<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<div id='settings' ontouchstart>
    <input checked class='nav' name='nav' type='radio'>
    <span class='nav'>Profile</span>
    <input class='nav' name='nav' type='radio'>
    <span class='nav'>Account</span>
    <input class='nav' name='nav' type='radio'>
    <span class='nav'>Privacy</span>
    <input class='nav' name='nav' type='radio'>
    
    {{-- <span class='nav'></span> --}}
    {{-- <a class="nav" href="{{ route('password.request') }}">Forgot PassWord</a> --}}
    <main class='content'>
        <section id='profile'>
            <form method="POST">
                <ul>
                    <li class='large padding avatar'>
                        <span
                            style="background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/345377/selca-square.jpg');"></span>
                        <div>
                            <fieldset class='material-checkbox'>
                                <div>
                                    <input checked type='checkbox'>
                                    <div class='check'>
                                        <span>
                                            <svg viewBox='0 0 24 24'>
                                                <g>
                                                    <line x1='4.5' x2='9.24' y1='12.5' y2='17.24'>
                                                    </line>
                                                    <line x1='9.24' x2='19.76' y1='17.24' y2='6.73'>
                                                    </line>
                                                </g>
                                                <g>
                                                    <line x1='4.5' x2='9.24' y1='12.5' y2='17.24'>
                                                    </line>
                                                    <line x1='9.24' x2='19.76' y1='17.24' y2='6.73'>
                                                    </line>
                                                </g>
                                            </svg>
                                        </span>
                                        <label>Use Gravatar</label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class='material-button'>
                                <div>
                                    <button><a class="btn btn-sucess" href="{{ route('password.request') }}">Quên Mật Khẩu</a></button>
                                </div>
                            </fieldset>
                        </div>
                    </li>
                    <li>
                        <fieldset class='material'>
                            <div>
                                <input required type='text' value='Dong Hunk'>
                                <label>Name</label>
                                <hr>
                            </div>
                        </fieldset>
                    </li>
                    <li>
                        <fieldset class='material'>
                            <div>
                                {{-- <input id="location" required type='text' placeholder="Vị trí sẽ tự động điền">
                                <label>Location</label>
                                <hr> --}}
                                <button id="submitBtn" aria-placeholder="location">Lấy Vị Trí</button>
                            </div>
                           
                        </fieldset>
                    </li>
                    
                    <li class='large padding'>
                        <fieldset class='material-button center'>
                            <div>
                                <input class='save' type='submit' value='Save'>
                            </div>
                        </fieldset>
                    </li>
                </ul>
            </form>
        </section>
        <section id='account'>
            <form>
                <ul>
                    <li>
                        <fieldset class='material'>
                            <div>
                                <input required type='text' value='hunghung12092005@gmail.com'>
                                <label>Email</label>
                                <hr>
                            </div>
                        </fieldset>
                    </li>
                    <li>
                        <fieldset class='material'>
                            <div>
                                <input required type='text'>
                                <label>Username</label>
                                <hr>
                            </div>
                        </fieldset>
                    </li>
                    {{-- <li>
                        <fieldset class='material'>
                            <div>
                                <input required type='password'>
                                <label>Password</label>
                                <hr>
                            </div>
                        </fieldset>
                    </li>
                    <li>
                        <fieldset class='material'>
                            <div>
                                <input required type='password'>
                                <label>Confirm Password</label>
                                <hr>
                            </div>
                        </fieldset>
                    </li> --}}
                    {{-- <li class='padding'>
                        <fieldset class='material-button'>
                            <div>
                                <button class=''>
                                    <span><input class="" type="text" placeholder="Unlink Github Account"></span>
                                </button>
                            </div>
                        </fieldset>
                    </li>
                    <li class='padding'>
                        <fieldset class='material-button'>
                            <div>
                                <button class='connect tw'>
                                    <span>Link Twitter Account</span>
                                </button>
                            </div>
                        </fieldset>
                    </li>
                    <li class='padding'>
                        <fieldset class='material-button'>
                            <div>
                                <button class='connect fb'>
                                    <span>Link Facebook Account</span>
                                </button>
                            </div>
                        </fieldset>
                    </li>
                    <li class='padding'>
                        <fieldset class='material-button'>
                            <div>
                                <button class='connect li'>
                                    <span>Link LinkedIn Account</span>
                                </button>
                            </div>
                        </fieldset>
                    </li> --}}
                    <li class='large padding'>
                        <fieldset class='material-button center'>
                            <div>
                                <input class='save' type='submit' value='Save'>
                            </div>
                        </fieldset>
                    </li>
                </ul>
            </form>
        </section>
        <section class='upcoming' id='privacy'>
            <h1>Coming&nbsp;soon!</h1>
        </section>
        <section class='upcoming' id='advanced'>
            <a href="{{ route('password.request') }}">
                <h1>Coming&nbsp;soon!</h1>
            </a>
        </section>
    </main>
</div>
<style>
    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }

    * {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        transform-style: preserve-3d;
    }

    *:focus {
        outline: none !important;
    }

    body,
    html {
        height: 100%;
    }

    * {
        font-feature-settings: "liga", "ss05" on, "ss07" on;
    }
    a{
        text-decoration: none
    }
    @supports (hanging-punctuation: first) and (font: -apple-system-body) and (-webkit-appearance: none) {
        * {
            font-feature-settings: "liga";
        }
    }

    body {
        display: flex;
        align-items: center;
        align-content: center;
        justify-content: center;
        padding: 12px;
        background: #936e76;
        background: linear-gradient(135deg, #3f4159 0%, #725767 50%, #cd908b 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="$mauve", endColorstr="$blush", GradientType=1);
        font-family: -apple-system, "Mona Sans", system-ui, sans-serif;
        font-size: 16px;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        perspective: 1000px;
    }

    input,
    textarea,
    button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: 0;
        font-family: -apple-system, "Mona Sans", system-ui, sans-serif;
        resize: none;
    }

    a,
    button,
    input[type=submit] {
        cursor: pointer;
    }

    ::-moz-selection {
        background: rgba(205, 144, 139, 0.2);
    }

    ::selection {
        background: rgba(205, 144, 139, 0.2);
    }

    #settings {
        opacity: 0;
        transform-origin: center top;
        will-change: opacity, transform;
        -webkit-animation: rotateIn 1000ms cubic-bezier(0.215, 0.61, 0.355, 1) 500ms forwards;
        animation: rotateIn 1000ms cubic-bezier(0.215, 0.61, 0.355, 1) 500ms forwards;
        position: relative;
        display: flex;
        flex-flow: row wrap;
        background: white;
        box-shadow: 0 0 20px rgba(21, 21, 29, 0.2);
        overflow: hidden;
        color: #3f4159;
        border-radius: 2px;
        width: 100%;
        max-width: 600px;
        height: 100%;
    }

    @media only screen and (min-width: 500px) {
        #settings {
            max-height: 420px;
        }
    }

    span.nav {
        transition: all 150ms ease-out;
        flex-basis: 25%;
        display: block;
        position: relative;
        width: 100%;
        padding: 18px 0;
        text-align: center;
    }

    span.nav:nth-of-type(1) {
        z-index: 5;
    }

    span.nav:nth-of-type(2) {
        z-index: 4;
    }

    span.nav:nth-of-type(3) {
        z-index: 3;
    }

    span.nav:nth-of-type(4) {
        z-index: 2;
    }

    span.nav:nth-of-type(5) {
        z-index: 1;
    }

    span.nav:after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        right: -1px;
        width: 2px;
        height: 100%;
        background: #f3e3e2;
    }

    span.nav:last-of-type:after {
        display: none;
    }

    input.nav {
        cursor: pointer;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        opacity: 0;
        position: absolute;
        z-index: 6;
        top: 0;
        width: 25%;
        height: 53px;
    }

    input.nav:hover+span,
    input.nav:focus+span {
        background: #f3e3e2;
    }

    input.nav:active+span,
    input.nav:checked+span {
        background: #866972;
        color: white;
    }

    input.nav:active+span {
        transition: all 150ms ease-in;
    }

    input.nav~main section {
        transition: all 450ms ease-out;
        transform: translateY(50%) translateZ(0);
        opacity: 0;
        z-index: -1;
    }

    input.nav:nth-of-type(1) {
        left: 0%;
    }

    input.nav:nth-of-type(1):checked~main section:nth-of-type(1) {
        transform: translateY(0) translateZ(0);
        opacity: 1;
        z-index: 10;
    }

    input.nav:nth-of-type(2) {
        left: 25%;
    }

    input.nav:nth-of-type(2):checked~main section:nth-of-type(2) {
        transform: translateY(0) translateZ(0);
        opacity: 1;
        z-index: 10;
    }

    input.nav:nth-of-type(3) {
        left: 50%;
    }

    input.nav:nth-of-type(3):checked~main section:nth-of-type(3) {
        transform: translateY(0) translateZ(0);
        opacity: 1;
        z-index: 10;
    }

    input.nav:nth-of-type(4) {
        left: 75%;
    }

    input.nav:nth-of-type(4):checked~main section:nth-of-type(4) {
        transform: translateY(0) translateZ(0);
        opacity: 1;
        z-index: 10;
    }

    input.nav:nth-of-type(5) {
        left: 100%;
    }

    input.nav:nth-of-type(5):checked~main section:nth-of-type(5) {
        transform: translateY(0) translateZ(0);
        opacity: 1;
        z-index: 10;
    }

    main {
        align-self: flex-end;
        position: relative;
        border-top: 2px solid #f3e3e2;
        width: 100%;
        height: calc(100% - 52px);
    }

    section {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: white;
        will-change: transform, opacity;
    }

    section ul {
        display: flex;
        flex-flow: row wrap;
        padding: 12px;
    }

    section ul li {
        opacity: 0;
        transform: translateY(100%) translateZ(0);
        will-change: transform, opacity;
        -webkit-animation: slideInUp 600ms cubic-bezier(0.215, 0.61, 0.355, 1) forwards;
        animation: slideInUp 600ms cubic-bezier(0.215, 0.61, 0.355, 1) forwards;
        padding: 6px 12px;
        width: 50%;
    }

    section ul li:nth-child(1) {
        -webkit-animation-delay: 700ms;
        animation-delay: 700ms;
    }

    section ul li:nth-child(2) {
        -webkit-animation-delay: 800ms;
        animation-delay: 800ms;
    }

    section ul li:nth-child(3) {
        -webkit-animation-delay: 900ms;
        animation-delay: 900ms;
    }

    section ul li:nth-child(4) {
        -webkit-animation-delay: 1000ms;
        animation-delay: 1000ms;
    }

    section ul li:nth-child(5) {
        -webkit-animation-delay: 1100ms;
        animation-delay: 1100ms;
    }

    section ul li:nth-child(6) {
        -webkit-animation-delay: 1200ms;
        animation-delay: 1200ms;
    }

    section ul li:nth-child(7) {
        -webkit-animation-delay: 1300ms;
        animation-delay: 1300ms;
    }

    section ul li.large {
        width: 100%;
    }

    section ul li.padding {
        padding: 12px;
    }

    section.upcoming {
        display: flex;
        align-items: center;
        align-content: center;
        justify-content: center;
        text-align: center;
    }

    section.upcoming h1 {
        font-size: 32px;
        color: #cccccc;
    }

    .avatar {
        display: flex;
    }

    .avatar>span {
        display: block;
        width: 72px;
        height: 72px;
        background-position: center center;
        background-size: cover;
        border-radius: 2px;
    }

    .avatar>div {
        padding-left: 24px;
    }

    .avatar>div .material-button {
        margin-top: 13px;
    }

    .avatar label,
    .avatar button {
        font-size: 14px !important;
    }

    #account button {
        padding: 15px 12px !important;
    }

    .material {
        width: 100%;
    }

    .material div {
        position: relative;
        width: 100%;
        padding-top: 18px;
    }

    .material label {
        transition: all 150ms ease-out;
        will-change: transform;
        transform: translateZ(0);
        display: block;
        position: absolute;
        z-index: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        padding-bottom: 4px;
        font-weight: 500;
        color: #cd908b;
        line-height: 1.5;
    }

    .material hr {
        display: block;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        border: 0;
        border-radius: 4px;
        margin: 0;
        background: #ebebeb;
    }

    .material hr:after {
        transition: all 150ms ease-out;
        transform: scaleX(0) translateZ(0);
        transform-origin: left top;
        will-change: transform;
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 4px;
        background: #cd908b;
    }

    .material input {
        display: block;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        position: relative;
        z-index: 1;
        padding: 0 0 4px;
        margin: 0;
        width: 100%;
        background: none;
        color: #3f4159;
        font-size: 16px;
        line-height: 1.5;
    }

    .material input:focus+label,
    .material input:valid+label {
        transform: translateY(-24px) translateZ(0);
        font-size: 12px;
    }

    .material input:focus~hr:after {
        transform: scaleX(1) translateZ(0);
    }

    .material-checkbox div {
        position: relative;
    }

    .material-checkbox .check {
        z-index: 0;
        display: flex;
        align-items: center;
        align-content: center;
    }

    .material-checkbox span {
        display: block;
        width: 24px;
        height: 24px;
        border-radius: 2px;
        background: #ebebeb;
    }

    .material-checkbox svg {
        display: block;
        width: 100%;
        height: 100%;
    }

    .material-checkbox line {
        fill: none;
        stroke: rgba(255, 255, 255, 0.5);
        stroke-width: 2px;
        stroke-linecap: round;
    }

    .material-checkbox g:last-child line {
        stroke: white;
        opacity: 0;
    }

    .material-checkbox g:last-child line:first-child {
        transition: stroke-dashoffset 100ms ease-out;
        stroke-dasharray: 6.708;
        stroke-dashoffset: 6.708;
    }

    .material-checkbox g:last-child line:last-child {
        transition: stroke-dashoffset 200ms ease-out 100ms;
        stroke-dasharray: 14.873;
        stroke-dashoffset: 14.873;
    }

    .material-checkbox label {
        margin-left: 6px;
    }

    .material-checkbox input {
        cursor: pointer;
        opacity: 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        display: block;
        position: absolute;
        z-index: 1;
        width: 100%;
        height: 100%;
    }

    .material-checkbox input:checked+div span {
        background: #cd908b;
    }

    .material-checkbox input:checked+div g:last-child line {
        opacity: 1;
    }

    .material-checkbox input:checked+div g:last-child line:first-child {
        stroke-dashoffset: 0;
    }

    .material-checkbox input:checked+div g:last-child line:last-child {
        stroke-dashoffset: 0;
    }

    .material-button {
        width: 100%;
    }

    .material-button div {
        width: 100%;
    }

    .material-button button,
    .material-button input[type=submit] {
        margin: 0;
        border: 0;
        border-radius: 2px;
        padding: 6px 12px;
        background: #ebebeb;
        color: #3f4159;
        font-size: 16px;
        transition: all 150ms ease-out;
    }

    .material-button button:hover,
    .material-button button:focus,
    .material-button input[type=submit]:hover,
    .material-button input[type=submit]:focus {
        background: #cd908b;
        color: white;
    }

    .material-button button:active,
    .material-button input[type=submit]:active {
        transition: all 150ms ease-in;
        background: #3f4159;
    }

    .material-button button.save,
    .material-button input[type=submit].save {
        width: 100%;
        max-width: 256px;
        padding: 12px 24px;
        background: #866972;
        color: white;
        font-size: 18px;
    }

    .material-button button.save:hover,
    .material-button button.save:focus,
    .material-button input[type=submit].save:hover,
    .material-button input[type=submit].save:focus {
        background: #cd908b;
    }

    .material-button button.save:active,
    .material-button input[type=submit].save:active {
        background: #3f4159;
    }

    @media only screen and (max-height: 444px) {

        .material-button button.save,
        .material-button input[type=submit].save {
            display: none;
        }
    }

    .material-button button.connect,
    .material-button input[type=submit].connect {
        display: block;
        width: 100%;
        border-radius: 1000px;
        color: white;
    }

    .material-button button.gh,
    .material-button input[type=submit].gh {
        background: #4183c4;
    }

    .material-button button.gh:hover,
    .material-button button.gh:focus,
    .material-button input[type=submit].gh:hover,
    .material-button input[type=submit].gh:focus {
        background: #7ba9d6;
    }

    .material-button button.gh.connected,
    .material-button input[type=submit].gh.connected {
        background: #ebebeb;
        color: #343434;
    }

    .material-button button.gh.connected:hover,
    .material-button button.gh.connected:focus,
    .material-button input[type=submit].gh.connected:hover,
    .material-button input[type=submit].gh.connected:focus {
        background: #4183c4;
        color: white;
    }

    .material-button button.gh:active,
    .material-button input[type=submit].gh:active {
        background: #2c5d8d !important;
    }

    .material-button button.tw,
    .material-button input[type=submit].tw {
        background: #2daae1;
    }

    .material-button button.tw:hover,
    .material-button button.tw:focus,
    .material-button input[type=submit].tw:hover,
    .material-button input[type=submit].tw:focus {
        background: #70c5eb;
    }

    .material-button button.tw.connected,
    .material-button input[type=submit].tw.connected {
        background: #ebebeb;
        color: #343434;
    }

    .material-button button.tw.connected:hover,
    .material-button button.tw.connected:focus,
    .material-button input[type=submit].tw.connected:hover,
    .material-button input[type=submit].tw.connected:focus {
        background: #2daae1;
        color: white;
    }

    .material-button button.tw:active,
    .material-button input[type=submit].tw:active {
        background: #187da9 !important;
    }

    .material-button button.fb,
    .material-button input[type=submit].fb {
        background: #3b5997;
    }

    .material-button button.fb:hover,
    .material-button button.fb:focus,
    .material-button input[type=submit].fb:hover,
    .material-button input[type=submit].fb:focus {
        background: #5e7ec0;
    }

    .material-button button.fb.connected,
    .material-button input[type=submit].fb.connected {
        background: #ebebeb;
        color: #343434;
    }

    .material-button button.fb.connected:hover,
    .material-button button.fb.connected:focus,
    .material-button input[type=submit].fb.connected:hover,
    .material-button input[type=submit].fb.connected:focus {
        background: #3b5997;
        color: white;
    }

    .material-button button.fb:active,
    .material-button input[type=submit].fb:active {
        background: #263960 !important;
    }

    .material-button button.li,
    .material-button input[type=submit].li {
        background: #069;
    }

    .material-button button.li:hover,
    .material-button button.li:focus,
    .material-button input[type=submit].li:hover,
    .material-button input[type=submit].li:focus {
        background: #0099e6;
    }

    .material-button button.li.connected,
    .material-button input[type=submit].li.connected {
        background: #ebebeb;
        color: #343434;
    }

    .material-button button.li.connected:hover,
    .material-button button.li.connected:focus,
    .material-button input[type=submit].li.connected:hover,
    .material-button input[type=submit].li.connected:focus {
        background: #069;
        color: white;
    }

    .material-button button.li:active,
    .material-button input[type=submit].li:active {
        background: #00334d !important;
    }

    .material-button.center div {
        display: flex;
        justify-content: center;
    }

    @-webkit-keyframes rotateIn {
        0% {
            opacity: 0;
            transform: rotateX(30deg) rotateY(30deg) translateY(300px) translateZ(200px);
        }

        100% {
            opacity: 1;
            transform: none;
        }
    }

    @keyframes rotateIn {
        0% {
            opacity: 0;
            transform: rotateX(30deg) rotateY(30deg) translateY(300px) translateZ(200px);
        }

        100% {
            opacity: 1;
            transform: none;
        }
    }

    @-webkit-keyframes slideInUp {
        0% {
            opacity: 0;
            transform: translateY(100%) translateZ(0);
        }

        100% {
            opacity: 1;
            transform: none;
        }
    }

    @keyframes slideInUp {
        0% {
            opacity: 0;
            transform: translateY(100%) translateZ(0);
        }

        100% {
            opacity: 1;
            transform: none;
        }
    }
</style>

<script>
    document.getElementById("submitBtn").addEventListener("click", function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;

                // Sử dụng API để chuyển đổi tọa độ thành địa chỉ
                fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lon}&localityLanguage=vi`)
                    .then(response => response.json())
                    .then(data => {
                        var locationName = data.locality || data.city || data.principalSubdivision;
                        document.getElementById("location").value = locationName;

                        // Gửi dữ liệu về PHP
                        sendLocationToServer(locationName);
                    })
                    .catch(error => {
                        console.error("Error fetching location:", error);
                    });
            }, function(error) {
                alert("Không thể lấy vị trí: " + error.message);
            });
        } else {
            alert("Trình duyệt của bạn không hỗ trợ Geolocation.");
        }
    });

    function sendLocationToServer(location) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "{{ route('otp.verify.submit') }}", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert("Dữ liệu đã được gửi thành công: " + xhr.responseText);
            }
        };

        xhr.send("location=" + encodeURIComponent(location));
    }
</script>