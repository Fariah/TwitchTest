<?php
/**
 * Created by PhpStorm.
 * User: Fariah
 * Date: 24.02.2019
 * Time: 11:39
 */

?>
<!doctype html>
<!--
Copyright 2017 Amazon.com, Inc. or its affiliates. All Rights Reserved.
Licensed under the Apache License, Version 2.0 (the "License"). You may not use this file except in compliance with the License. A copy of the License is located at
    http://aws.amazon.com/apache2.0/
or in the "license" file accompanying this file. This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
-->
<html>
<head>
    <title>Leaderboards</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Load the Twitch embed script -->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>

    <script src="js/chatbot.js"></script>

    <link rel="stylesheet" href="css/leaderboard.css">


    <script type="text/javascript">
        var stremaerName = localStorage.getItem('streamerName');
    </script>
</head>
<body>
<script src="https://player.twitch.tv/js/embed/v1.js"></script>
<div>
    <div id="TwitchPlayer" style="float: left"></div>
    <div style="float: right">
        <iframe id="ChatFrame"
                frameborder="1"
                scrolling="1"
                src=""
                height="600">
        </iframe>
    </div>
</div>
<a href="/login.php">Back</a>

<script type="text/javascript">

    var embed = new Twitch.Embed("TwitchPlayer", {
        width: 854,
        height: 480,
        channel: stremaerName,
        layout: "video",
        autoplay: false
    });

    embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
        var player = embed.getPlayer();
        player.play();
    });

    document.getElementById('ChatFrame').setAttribute('src', 'https://www.twitch.tv/embed/' + stremaerName + '/chat');
</script>


</body>
</html>