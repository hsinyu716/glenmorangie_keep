<html  xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="https://opengraph.org/schema/">
    <head>
        <title>搶先預約鑑賞格蘭傑 Companta 2014 私藏系列</title>
        <base href="<?= base_url() ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <meta name="title" content="" />
        <meta name="description" content="搶先預約鑑賞格蘭傑 Companta 2014 私藏系列" />
        <meta HTTP-EQUIV="Pragma" content="no_cache" />
        <link rel="shortcut icon" href="<?=base_url()?>img/icon.jpg" />
        <meta property="og:image" content="<?=base_url()?>img/icon.jpg">
        
        <link href="css/reset.css" rel="stylesheet" type="text/css" />
        <link href="css/layout.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="<?=is_https?>://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
        <style type="text/css">
            body {
                background-color: #000;
                margin:           0px;
                font-family:      Lucida Grande, Verdana, Sans-serif;
                font-size:        12px;
                color:            #000;
            }
            
            .all_box{
                position: relative;
                height: 100%;
            }
            
            .asking{
                width: 1000px;
                position: absolute;
                top: 0px;
            }
            
        </style>
        <script>
          function stop(){
            alert('「未滿18歲無法進入該網頁，感謝您的造訪」');
          }
          
          $(document).ready(function(){
              $(window).resize(function(){
                  $('.asking').css({top: ($(window).height()/2-250)+'px'})
              });
              
              $(window).trigger('resize');

              $('#stop').on('click',function(e){
              e.preventDefault();
                stop();
              });
          });

        </script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-32316738-27', 'mr6fb.com');
  ga('send', 'pageview');
//格蘭傑 預購
</script>
    </head>
    <body>      
        
        <div class="wrapper">
          <div class="head">
            <div style="height:103px;"></div> 
            </div>
          <div style="width:806px;height:430px;position:relative;margin:0 auto;text-align:center;padding-top:200px;">
            <img src="<?= base_url() ?>images/declaration.jpg" width="288" height="274" border="0" usemap="#Map" />
            <map name="Map" id="Map">
              <area shape="rect" coords="28,197,125,255" href="<?=site_url('Companta/setask')?>" />
              <area id="stop" shape="rect" coords="174,196,266,256"  href=""/>
            </map>
          </div>
            
            
        <div class="footer">
            <div class="copyright">Copyright(c)  All Right Reserved by Glenmorangie Company Ltd.</div>
          </div>
        </div>
    </body>
</html>