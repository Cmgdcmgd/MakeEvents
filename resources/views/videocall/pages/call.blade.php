@include('videocall.layouts.headLinks')
<html>
<body onload="loadCall()">
<div class="thebody text-center">


    <div class="container align-items-center ">

        <div class="transbox text-center"><br><br>
        </div>
         
        </div>
        <div id="jitsi-container" class="container align-items-center">

    </div>
    <span id = "meetingID"></span>
</div>

<script>
var container = document.querySelector('#jitsi-container');
var api = null;

function loadCall() {
    var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var ID = document.getElementById("meetingID"); 
    var stringLength = 30;


    function pickRandom() {

    var meetingID = possible[Math.floor(Math.random() * possible.length)];
    return meetingID;
    }

var randomString = Array.apply(null, Array(stringLength)).map(pickRandom).join('');

    var domain = "meet.engagemedia.org";
    var options = {
        "roomName": randomString,
        "parentNode": container,
        "width": screen.width/2,
        "height": screen.height/1.5,
        configOverWrite: {
            prejoinConfig:{
                enabled: false
            }
        }
    };
    api = new JitsiMeetExternalAPI(domain, options);

    ID.innerHTML = "Meeting ID: meet.jit.si/"+randomString;
}

</script>
</body>
</html>