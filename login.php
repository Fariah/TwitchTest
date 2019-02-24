<?php
/**
 * Created by PhpStorm.
 * User: Fariah
 * Date: 24.02.2019
 * Time: 11:22
 */

//host: http://twitch-test.local

/*
Copyright 2017 Amazon.com, Inc. or its affiliates. All Rights Reserved.
Licensed under the Apache License, Version 2.0 (the "License"). You may not use this file except in compliance with the License. A copy of the License is located at
    http://aws.amazon.com/apache2.0/
or in the "license" file accompanying this file. This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
*/
require 'twitch.php';
$provider = new TwitchProvider([
    'clientId'                => '3dicmiiv9fnu9cv760ssq5yxhpffl8',     // The client ID assigned when you created your application
    'clientSecret'            => 'opie1tpft9j7ja2ouzsxayr0uonqvs', // The client secret assigned when you created your application
    'redirectUri'             => 'http://twitch-test.local/stream',  // Your redirect URL you specified when you created your application
//    'scopes'                  => ['<YOUR OAUTH SCOPE HERE>']  // The scopes you would like to request
]);
$authorizationUrl = $provider->getAuthorizationUrl();



$_SESSION['oauth2state'] = $provider->getState();
$_SESSION['streamerName'] = null;
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <a id="Authenticate" href="<?php echo $authorizationUrl; ?>">Click here to link your Twitch Account</a><br>
        <span>Set streamer name: </span><input type="text" id="StreamerName" value="" width="100">
    </body>
    <script>
        document.getElementById('Authenticate').addEventListener(
            'click', function(evt){
                evt.preventDefault();
                var url = document.getElementById('Authenticate').getAttribute('href');
                var streamerName = document.getElementById('StreamerName').value;

                // Simple validation
                if(streamerName == '') {
                    alert('Please enter streamer name');
                    return false;
                }

                localStorage.setItem('streamerName', streamerName);
                window.location.href = url;

            }, false
        );
    </script>
</html>