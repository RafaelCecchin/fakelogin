<!DOCTYPE html>

<html>
    <head>
        <?php
            $b0 = $_POST['background'];
            if ($b0!=0 && $b0!=1 && $b0!=2 && $b0!=3 && $b0!=4) {
                $b0 = 0;
            }

            $net = $_POST['net'];
            if ($net!=0 && $net!=1 && $net!=2 && $net!=3) {
                $net = 0;
            }

            $battery_onoff = $_POST['battery-onoff'];
            if ($battery_onoff!=0 && $battery_onoff!=1) {
                $battery_onoff = 0;
            }

            $battery = $_POST['battery'];
            if ($battery!=0 && $battery!=1 && $battery!=2 && $battery!=3 && $battery!=4 && $battery!=5) {
                $battery = 0;
            }
            
            $number_users = $_POST['number_users'];
            if ($number_users!=0 && $number_users!=1 && $number_users!=2) {
                $number_users = 0;
            }
            
            $name = $_POST['name0'];
            if (strlen($name)>20) {
                $name = substr($name, 0, -(strlen($name)-20));
            }
            
            $strJsonFileContents = file_get_contents("_json/language.json");
            $JSONarray = json_decode($strJsonFileContents, true);

            $text_language = $_POST['text_language'];
            if (!array_key_exists($text_language, $JSONarray['language'])) {
                $text_language = 'english_us';
            }

            $keyboard_language = $_POST['keyboard_language'];
            if (!array_key_exists($keyboard_language, $JSONarray['keyboard'])) {
                $keyboard_language = 'english_us';
            }

            $text = $JSONarray['language'][$text_language];
            $keyboard = $JSONarray['keyboard'][$keyboard_language];
            
            $languageInitial0 = $keyboard['_initial0'];
            $languageInitial1 = $keyboard['_initial1'];

            $ext = '';

            $timezone = $_POST['timezone'];
            date_default_timezone_set($timezone);
        
            $hour = date($text["_hourFormat"]);

            $dayName = $text["_dayName"];
            $monName = $text["_monName"];
            $date = $text["_dateFormat"];
            $date = str_replace("dd",$dayName[date('D')], $date);
            $date = str_replace("DD",date('d'), $date);
            $date = str_replace("MM",$monName[date('M')], $date);
        ?>
		
		<meta name="description" content="Prank your friends and colleagues with Windows 10 fake login screen!"/>
		<meta name="robots" content="noindex, nofollow"/>
		<meta name="googlebot" content="noindex, nofollow"/>
		
		<title>Login Windows 10</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="_css/style.min.css"/>
        <script src="_javascript/javascript.js"></script>
        <?php 
            echo '<style>
                    #Page1 {
                        background: url(./_img/_background/'.$b0.'.jpg) no-repeat center center fixed;
                    }
                    
                    #Page2 {
                        background: url(./_img/_background/'.$b0.'.jpg) no-repeat center center fixed;
                    }

                    #Page1, #Page2 {
                        height: 100%;
                        width: 100%;
                        background-size: 100% 100%;
                    }
                </style>';
        ?>
    </head>
    <body onmousemove="showCursor()">
        <div id="Page1" onclick="slideTop()">
            <div class="left-right">
                <div id="date-time">
                    <h1><?php echo $hour; ?></h1>
                    <h2><?php echo $date; ?></h2>
                </div>
            </div>
            <div class="left-right">
                <div id="icons-page1">
                    <?php
                        echo '<img class="minor-icon" src="_img/_icons/_page0/_net/'.$net.'.png"/>';
                        if ($battery_onoff) {
                            echo '<img class="minor-icon" src="_img/_icons/_page0/_battery/'.$battery.'.png">';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div id="Page2">
            <div id="top">
                <div id="user-data">
                    <figure id="photo">
                        <?php
                            if(file_exists($_FILES['photo0']['tmp_name']) || is_uploaded_file($_FILES['photo0']['tmp_name'])) {
                                $ext = strtolower(substr($_FILES['photo0']['name'],-3));
                                $image = base64_encode(file_get_contents($_FILES['photo0']['tmp_name']));
                            } else {
                                $ext = 'jpg';
                                $image = base64_encode(file_get_contents('./_img/_users/3.jpg'));
                            }

                            echo '<img id="user-photo" src="data:image/'.$ext.';base64, '.$image.'"/>';
                        ?>             
                        </figure>
                    <div id="name">
                        <?php
                            echo '<h3>'.$name.'</h3>';
                        ?>
                    </div>
                    <div id="password">
                        <form id="user-password-submit" action="#" target="iframe">
                            <?php echo '<input id="user-password" type="password" placeholder="'.$text['_password'].'" onkeypress="showPasswordButton()" onkeyup="hiddenPasswordButton();"/>'; ?>
                            <div id="button-show-password" onclick="showOrHideenPassword()"></div>
                            <input type="submit" id="password-submit" onclick="loading()" value=""/>
                        </form>
                    </div>
                    <div id="loading">
                        <img id="loading-img" src="./_img/_icons/_page1/_others/loading.gif"/>
                        <div id="welcome">
                            <h4><?php echo $text['_welcome']; ?></h4>
                        </div>
                    </div>
                    <div id="forgot-password">
                        <h5><?php echo $text['_forgotpassword']; ?></h5>
                        <form id="button-ok-submit" action="#" target="iframe">
                            <input type="submit" id="ok-submit" onclick="password()" value="OK"/>
                        </form>
                    </div>
                </div>
            </div>
            <div id="bottom">
                <div class="left-right">
                    <div id="user-select">
                        <?php
                            if ($number_users>0) {
                                for ($i = 0; $i <= $number_users; $i++) {
                                    if ($i!=0) {
                                        if(file_exists($_FILES['photo'.$i]['tmp_name']) || is_uploaded_file($_FILES['photo'.$i]['tmp_name'])) {
                                            $ext = strtolower(substr($_FILES['photo'.$i]['name'],-3));
                                            $image = base64_encode(file_get_contents($_FILES['photo'.$i]['tmp_name']));
                                        } else {
                                            $ext = 'jpg';
                                            $image = base64_encode(file_get_contents('./_img/_users/3.jpg'));
                                        }
                                    }
                    
                                    $name = $_POST['name'.$i];

                                    if (strlen($name)>20) {
                                        $name = substr($name, 0, -(strlen($name)-20));
                                    }
                                    
                                    echo    '<div class="user-option" onclick="changeUser('.$i.')">
                                                <img class="user-option-photo" id="user'.$i.'-photo" src="data:image/'.$ext.';base64, '.$image.'"/>
                                                <div class="user-option-name">
                                                    <h6 id="user'.$i.'-name">'.$name.'</h6>
                                                </div>
                                            </div>';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="left-right">
                    <div id="icons-page2">
                        <div class="dropup">
                        <?php
                            echo   '<div class="biggest-icon">
                                        <div class="initials">
                                            <div class="initials-content"><span id="initials-content-top">'.$languageInitial0.'</span></div>
                                            <div class="initials-content"><span id="initials-content-bottom">'.$languageInitial1.'</span></div>
                                        </div>
                                    </div>'
                        ?>
                        </div>
                        <?php
                            echo '<img class="biggest-icon" src="_img/_icons/_page1/_net/'.$net.'.png"/>';
                            if ($battery_onoff) {
                                echo '<img class="biggest-icon" src="_img/_icons/_page1/_battery/'.$battery.'.png"/>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <iframe name="iframe">

        </iframe>
    </body>
</html>