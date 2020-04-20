<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Messenger</title>
</head>

<body onload="checkcookie(); update();">
        <div id="whitebg"></div>
        <div id="loginbox">
            <h1>Pick a username:</h1>
            <p>
                <input type="text" name="pickusername" class="msginput" id="cusername" placeholder="Pick a username">
            </p>
            <p class="buttonp">
                <button onclick="chooseusername()">Choose Username</button>
            </p>
        </div>
        <div class="msg-container">
            <div class="header">Messenger</div>
            <div class="msg-area" id="msg-area"></div>
            <div class="bottom">
                <input type="text" name="msginput" class="msginput" id="msginput" onkeydown="if (event.keyCode == 13) sendmsg();" value="" placeholder="Enter your message here... (Press enter to send message)">
            </div>
        </div>

    <script src="app.js"></script>
</body>

</html>
