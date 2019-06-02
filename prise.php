<?php
require "cookies.php";
require "db.php";
$cookie_key='online-cache';
 $ip= $_SERVER['REMOTE_ADDR'];
 $online= R::findOne('online', 'ip=?',array($ip));
 if($online)
 {
  $do_update=false;
   //обновляем
  if( CookieManager::stored($cookie_key))
  {
$c=(array) @json_decode(CookieManager::read($cookie_key), true);
if($c)
{
if($c['lastvisit']<(time()-(60*5)))
{$do_update= true;}
}else
{
  $do_update= true;
}
  }else
  {
    $do_update= true;
  }
  if($do_update)
  {$time=time();
  $online->lastvisit=$time;
  R::store($online);
  CookieManager::store($cookie_key, json_encode(array('id' =>$online->id, 'lastvisit'=>$time)));}
 }else
 {
//содаем
  $time=time();
  $online=R::dispense('online');
  $online->lastvisit=$time;
  $online->ip=$ip;
  R::store($online);
  CookieManager::store($cookie_key, json_encode(array('id' =>$online->id, 'lastvisit'=>$time)));
 }
 $online_count = R::count('online', "lastvisit > " . ( time() - (3600) ));
 ?>
<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="ru-RU">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2017.0.4.363"/>
  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "require.js", "prise.css"], "outOfDate":[]};
</script>
  
  <title>prise</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/prise.css?crc=404759167" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   var __adobewebfontsappname__ = "muse";
</script>
  <!-- JS includes -->
  <script src="https://webfonts.creativecloud.com/abril-fatface:i4:all.js" type="text/javascript"></script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="browser_width colelem" id="u734-bw">
     <div id="u734"><!-- group -->
      <div class="clearfix" id="u734_align_to_page">
       <div class="rounded-corners clearfix grpelem" id="u735"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u736-4" href="otzivy.php"><!-- content --><p>Отзывы</p></a>
       </div>
       <div class="rounded-corners clearfix grpelem" id="u737"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u738-4" href="uslugi.php"><!-- content --><p>Услуги</p></a>
       </div>
       <a class="nonblock nontext museBGSize grpelem" id="u739" href="index.php"><!-- simple frame --></a>
       <div class="rounded-corners clearfix grpelem" id="u740"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u741-4" href="o-nas.php"><!-- content --><p>О нас</p></a>
       </div>
       <div class="rounded-corners clearfix grpelem" id="u742"><!-- group -->
        <a class="nonblock nontext clearfix grpelem" id="u743-4" href="autopark.php"><!-- content --><p>Автопарк</p></a>
       </div>
      </div>
     </div>
    </div>
    <div class="clearfix colelem" id="u831-4"><!-- content -->
     <p>Прайс-лист услуг транспортной компании &quot;ИП Васильев А.Г.&quot;</p>
    </div>
    <div class="clearfix colelem" id="pu4111-4"><!-- group -->
     <div class="clearfix grpelem" id="u4111-4"><!-- content -->
      <p>Услуга грузоперевозок</p>
     </div>
     <div class="clearfix grpelem" id="u4114-4"><!-- content -->
      <p>Стоимость</p>
     </div>
    </div>
    <div class="clearfix colelem" id="pu4120-4"><!-- group -->
     <div class="clearfix grpelem" id="u4120-4"><!-- content -->
      <p><span id="u4120">0,5 - 1 тонны</span></p>
     </div>
     <div class="clearfix grpelem" id="u4117-4"><!-- content -->
      <p><span id="u4117">От 5 руб./км</span></p>
     </div>
    </div>
    <div class="clearfix colelem" id="pu4126-4"><!-- group -->
     <div class="clearfix grpelem" id="u4126-4"><!-- content -->
      <p><span id="u4126">1,5 тонны</span></p>
     </div>
     <div class="clearfix grpelem" id="u4123-4"><!-- content -->
      <p><span id="u4123">От 10 - 16 руб./км</span></p>
     </div>
    </div>
    <div class="clearfix colelem" id="pu4234-4"><!-- group -->
     <div class="clearfix grpelem" id="u4234-4"><!-- content -->
      <p><span id="u4234">3,5 тонны</span></p>
     </div>
     <div class="clearfix grpelem" id="u4231-4"><!-- content -->
      <p><span id="u4231">От 14 - 23 руб./км</span></p>
     </div>
    </div>
    <div class="clearfix colelem" id="pu4216-4"><!-- group -->
     <div class="clearfix grpelem" id="u4216-4"><!-- content -->
      <p><span id="u4216">Перевозка животных</span></p>
     </div>
     <div class="clearfix grpelem" id="u4213-4"><!-- content -->
      <p><span id="u4213">От 3000 руб.</span></p>
     </div>
    </div>
    <div class="clearfix colelem" id="pu4222-4"><!-- group -->
     <div class="clearfix grpelem" id="u4222-4"><!-- content -->
      <p><span id="u4222">Услуга сопровождения</span></p>
     </div>
     <div class="clearfix grpelem" id="u4219-4"><!-- content -->
      <p><span id="u4219">10% от стоимости перевозки</span></p>
     </div>
    </div>
    <div class="clearfix colelem" id="pu4228-4"><!-- group -->
     <div class="clearfix grpelem" id="u4228-4"><!-- content -->
      <p><span id="u4228">Страхование грузов</span></p>
     </div>
     <div class="clearfix grpelem" id="u4225-4"><!-- content -->
      <p><span id="u4225">От 0,03% от объявленной стоимости</span></p>
     </div>
    </div>
    <div class="clearfix colelem" id="u1940-5"><!-- content -->
     <p>Если возникнут вопросы, то звоните на данный номер:&nbsp; +<span id="u1940-2">7(927)961-51-54</span></p>
    </div>
    <div class="browser_width colelem" id="u5021-bw">
     <div id="u5021"><!-- group -->
      <div class="clearfix" id="u5021_align_to_page">
       <div class="clearfix grpelem" id="pu5022-4"><!-- column -->
        <div class="clearfix colelem" id="u5022-4"><!-- content -->
         <p>© Все права защищены</p>
        </div>
        <div class="clearfix colelem" id="u5023-4"><!-- content -->
         <p>Телефон: +7(927)961-51-54</p>
        </div>
        <div class="clearfix colelem" id="u5024-4"><!-- content -->
         <p>E-mail: 9279615154@mail.ru</p>
        </div>
       </div>
       <div class="clearfix grpelem" id="pu5026-4"><!-- column -->
        <a class="nonblock nontext clearfix colelem" id="u5026-4" href="otzivy.php"><!-- content --><p>Отзывы</p></a>
        <a class="nonblock nontext clearfix colelem" id="u5027-4" href="uslugi.php"><!-- content --><p>Услуги</p></a>
        <a class="nonblock nontext clearfix colelem" id="u5028-4" href="o-nas.php"><!-- content --><p>О нас</p></a>
        <a class="nonblock nontext clearfix colelem" id="u5030-4" href="dokuments.php"><!-- content --><p>Документы</p></a>
       </div>
       <div class="clearfix grpelem" id="pu5031-4"><!-- column -->
        <a class="nonblock nontext clearfix colelem" id="u5031-4" href="svyaz.php"><!-- content --><p>Обратная связь</p></a>
        <a class="nonblock nontext clearfix colelem" id="u5029-4" href="autopark.php"><!-- content --><p>Автопарк</p></a>
        <a class="nonblock nontext MuseLinkActive clearfix colelem" id="u5032-4" href="prise.php"><!-- content --><p>Прайс-лист услуг</p></a>
       </div>
       <div class="clearfix grpelem" id="u5025-4"><!-- content -->
        <p>Сейчас Онлайн: <?php echo $online_count; ?></p>
       </div>
      </div>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="762" data-content-above-spacer="762" data-content-below-spacer="0"></div>
   </div>
  </div>
  <!-- Other scripts -->
  <script type="text/javascript">
   // Decide weather to suppress missing file error or not based on preference setting
var suppressMissingFileError = false
</script>
  <script type="text/javascript">
   window.Muse.assets.check=function(d){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},c=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},g=function(g){for(var f=document.getElementsByTagName("link"),h=0;h<f.length;h++)if("text/css"==f[h].type){var i=(f[h].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!i||!i[1]||!i[2])break;b[i[1]]=i[2]}f=document.createElement("div");f.className="version";f.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(f);for(h=0;h<Muse.assets.required.length;){var i=Muse.assets.required[h],l=i.match(/([\w\-\.]+)\.(\w+)$/),k=l&&l[1]?
l[1]:null,l=l&&l[2]?l[2]:null;switch(l.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.className+=" "+k;k=a(c(f,"color"));l=a(c(f,"backgroundColor"));k!=0||l!=0?(Muse.assets.required.splice(h,1),"undefined"!=typeof b[i]&&(k!=b[i]>>>24||l!=(b[i]&16777215))&&Muse.assets.outOfDate.push(i)):h++;f.className="version";break;case "js":h++;break;default:throw Error("Unsupported file type: "+l);}}d?d().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
f.parentNode.removeChild(f);if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Некоторые файлы на сервере могут отсутствовать или быть некорректными. Очистите кэш-память браузера и повторите попытку. Если проблему не удается устранить, свяжитесь с разработчиками сайта.",g&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),g&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),suppressMissingFileError?(f+="\nUse SuppressMissingFileError key in AppPrefs.xml to show missing file error pop up.",console.log(f)):alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?
setTimeout(function(){g(!0)},5E3):g()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.musepolyfill.bgsize","jquery.watch"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=3951022091" type="text/javascript" async data-main="scripts/museconfig.js?crc=474374037" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
