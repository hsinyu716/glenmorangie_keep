<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="https://opengraph.org/schema/">
    <head>
        <title><?=$fb_title;?></title>
        <base href="<?= base_url(); ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="title" content="<?=$fb_title;?>" />
        <meta name="description" content="搶先預約鑑賞格蘭傑 Companta 2014 私藏系列" />
        <meta HTTP-EQUIV="Pragma" content="no_cache" />
        <link rel="shortcut icon" href="<?=base_url()?>img/icon.jpg" />
        <meta property="og:image" content="<?=base_url()?>img/icon.jpg">


		<script src="<?=is_https?>://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="<?=is_https?>://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery.imgpreload.min.js" ></script>
        <?= $_scripts ?>
        <?= $_styles ?>
        
        <script type="text/javascript" src="<?= base_url() ?>js/bootbox.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>bootstrap/js/bootstrap.min.js" ></script>
        <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">
        <script src="<?= base_url() ?>js/angular.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/controller.js" ></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.0rc3/angular-sanitize.min.js" ></script>
        
        <script type="text/javascript" src="<?= base_url() ?>js/toastr/toastr.js" ></script>
        <link href="<?= base_url() ?>js/toastr/toastr.css" rel="stylesheet" type="text/css" />

        <!-- layout -->
        <link href="<?= base_url() ?>layout.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            body {
                background-color: #020202;
            }
        </style>

        <!--[if lt IE 9]>
        <script src="js/dist/html5shiv.js"></script>
        <![endif]-->
        <script type="text/javascript">
	        $(function(){
	        	fbinit('<?=FBAPP_ID ?>');
	            timer = setInterval(touch,60000);
	            preload_images([<?=$images?>]);
	        });

            function record(t){
                $.ajax({
                    type:"POST", 
                    url:"<?= site_url('Companta/ajaxrecord') ?>", 
                    data:{
                        'table':t
                    },
                    success:function(res){
                    }
                });
            }

            var isfans = 0;

            function is_fan() {
                if(isfans==1){
                    next_();return;
                }
                FB.api(
                {
                    method: 'pages.isFan',
                    page_id: '<?=$page_id;?>' 
                },
                function(response) {
                    if(response) {
                        next_();
                    } else { 
                        _show($('#isfans'));
                        //setTimeout("is_fan()",5000);  
                    }
                });
            }

            var func = 'result';
            function next_(){
            	$('#isfans').bPopup().close();
                // _show($('#loading'));
                // location.href="<?=site_url('Companta/reserve');?>";
                // angularjs
                angular.element(document.getElementById('indexobj')).scope().$apply(function(scope){
                    scope.show_tab(3);
                });
            }
            
            function check_FB(){
                if(fbid=="0"){
            		location.href="<?=site_url('Companta/permit');?>";
                }else{
                    is_fan();
                }
                return;
                if(typeof FB != 'undefined'){
                    setTimeout("fb_login('<?=SCOPE;?>')",2000);
                }else{
                    setTimeout("check_FB()",2000);
                }
            }

            function touch(){
                $.ajax({
                    type:"POST", 
                    url:"<?= site_url('Companta/ajaxtouch') ?>", 
                    data:{
                    },
                    success:function(html){
                    }
                });
            }

            function pop_msg(msg){
				$('#msg').html(msg);
                _show($('#div_msg'));			
			}
    
			function close_msg(){
				_show($('#div_msg'));			
			}
        </script>
        
        <style>
        .bootbox{
	        z-index:9999;
	    }
        </style>
    </head>
    <body>    
    
    	<div id='div_msg' style='display:none;background-color:white;text-align:center;width:300px;'>
			<div style='background-color:white;text-align:center;width:300px;height:100px;line-height:100px;' id='msg'></div>
			<div style='background-color:grey;text-align:center;width:300px;height:30px;line-height:30px;'><input type='button' value='　確定　' onclick='close_msg()' /></div>
		</div>
    
        <div id="fb-root"></div>
        <div id="loading" class="radius"><img src='images/loading.gif' />&nbsp;處理中，請稍等!</div>
        <div id="isfans" style='font-family:微軟正黑體;text-align:center;display:none;background-color:white;width:300px;height:125px;position:relative;top:20px;'>
         	請按讚加入粉絲團！
            <div id="like" style="border: 0px solid red; position: absolute;left:0px;top:50px;">
                <div class="fb-like-box" data-href="<?= $page_url ?>" data-width="300" data-height="150" data-show-faces="false" data-stream="false" data-header="false"></div>
            </div>  
            <div style="margin-top: 100px;">
            	<!-- <div onclick="javascript:$('#isfans').bPopup().close();isfans=1;next_();" style="font-size:12px;text-align:center;position: absolute; right: 0px; top: 0px; width:12px; height: 12px; background: #29447e; color: white; cursor: pointer;">X</div> -->
            </div>
        </div>
        
        <div id="content">
            <?php print $content ?>
        </div>
        <div style="clear:both;text-align:center;height:30px;"><a target="_blank" style="color:#aaa; font-size: 10px; text-decoration: none; margin-buttom:50px;" href="<?=base_url()?>privacy_policy.html">Privacy Policy</a></div>
    </body>
</html>