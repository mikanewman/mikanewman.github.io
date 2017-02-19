<html>
<head>
    <script src="http://vk.com/js/api/xd_connection.js" type="text/javascript"></script>
    <link rel='stylesheet' type='text/css' href='css/main.css' />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type='text/javascript' src='js/jquery.min.js'></script>
    <script type="text/javascript" charset="utf8" >
    window.onload = (function() {  
        VK.init(function() {
 
            // узнаём flashVars, переданные приложению GET запросом. Сохраняем их в переменную flashVars
            var parts=document.location.search.substr(1).split("&");
            var flashVars={}, curr;
            for (i=0; i<parts.length; i++) {
                curr = parts[i].split('=');
                flashVars[curr[0]] = curr[1];
            }
           
            var viewer_id = flashVars['viewer_id'];
            $('#uid').attr('value',viewer_id);
            // получаем профиль
            VK.api("users.get", {uids:viewer_id}, function(data) {
                document.getElementById('info').innerHTML = '<b>' + data.response[0].first_name + ' ' + data.response[0].last_name + '</b>';
            });
           
        });
       
    });
    $('#link_btn').click(function() {
    VK.callMethod("showOrderBox",{type: 'item', item: 'add_link'});
    });
   
</script>
</head>
<body>
 <div id='info'></div>
<form id='link' name='link' action=''>
   <input value='ваш комментарий' type='text' name='comment'>
   <a href='#' id='link_btn'>Купить</a>
</form>
 
</body>
</html>