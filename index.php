<?php
require './vendor/autoload.php';

use Danilo9\GetIp\GetIp;

$getIp = new GetIp(['lang' => 'en']);

try {
    $info = $getIp->process('176.59.134.100');
} catch (\Danilo9\GetIp\Exception\RequestFailException $e) {
    die($e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>get_ip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        $(function(){
            function output(inp) {
                document.getElementById('data').appendChild(document.createElement('pre')).innerHTML = inp;
                $("i").on("click", function(){
                    var area = $(this).parent(".scob").children(".area");
                    var icon = $(this).parent(".scob").children("i");
                    area.toggle();
                    if (area.is(":hidden")) {
                        icon.removeClass("fa-angle-down");
                        icon.addClass("fa-angle-left");
                        //<i style="margin-left:4px;color:#000e59;" class="fa-solid fa-angle-left"></i>
                    } else {
                        icon.removeClass("fa-angle-left");
                        icon.addClass("fa-angle-down");
                        //<i style="margin-left:4px;color:#000e59;" class="fa-solid fa-angle-down"></i>
                    }
                });
            }
            function syntaxHighlight(json) {
                json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
                return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)|(\{)|(\})/g, function (match) {

                    var style = 'color: #000e59;';

                    if(match == "{"){
                        return '<span class="scob"><span style="color: #000;">{</span><i style="margin-left:3px; margin-right:3px; color:#025900;" class="fa-solid fa-angle-down"></i><span class="area">';
                    }

                    if(match == "}"){
                        return '</span><span style="color: #000;">}</span></span>';
                    }

                    if (/^"/.test(match)) {
                        if (/:$/.test(match)) {
                            style = 'color: #000;';
                        } else {
                            style = 'color: #025900; font-weight: 600;';
                        }
                    } else if (/true|false/.test(match)) {
                        style = 'color: #600100; font-weight: 600;';
                    } else if (/null/.test(match)) {
                        style = 'color: red; font-weight: 600;';
                    }

                    /*
                    style = 'color: #ff5370;';

                    if (/^"/.test(match)) {
                        if (/:$/.test(match)) {
                            style = 'color: #c792ea;';
                        } else {
                            style = 'color: #c3e88d; font-weight: 600;';
                        }
                    } else if (/true|false/.test(match)) {
                        style = 'color: #f78c6c; font-weight: 600;';
                    } else if (/null/.test(match)) {
                        style = 'color: #f78c6c; font-weight: 600;';
                    }
                    */

                    return '<span style="' + style + '">' + match + '</span>';
                });
            }

            var json = '<?php echo $info->toJson(); ?>';

            var str = JSON.stringify(
                JSON.parse(json),
                null,
                2
            );

            output(syntaxHighlight(str));
        });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">GET_IP</a>
    <div class="collapse navbar-collapse" id="navbarText">
        <span class="navbar-text">
            Powered by <a href="https://vk.com/go.ro2005" target="_blank">Danilo9</a>
        </span>
    </div>
</nav>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-6">
            <p id="data"></p>
        </div>
        <div class="col-md-6">
            <img src="https://cache.ip-api.com/<?php echo $info->getLocation()->getLon() ?>,<?php echo $info->getLocation()->getLat(); ?>,10" style="width: 100%;"/>
        </div>
    </div>
</div>
</body>
</html>
