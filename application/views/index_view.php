<script>
fbid = "<?=$fbid?>";
var shareurl = "<?=site_url('Companta/share');?>";
var dataurl = "<?=site_url('Companta/enter');?>";

var setDataurl = "<?=site_url('Companta/setData');?>";
</script>

<div id="indexobj" ng-app="myApp" ng-controller="indexCtrl">
	<div class="gg-wapper">
		<div class="gg-main">

			<!-- 首頁 -->
        	<div class="gg-btn01" ng-show="tab==0"><a href="javascript:check_FB();"><img src="img/btn1.png" width="153" height="54" /></a></div>
        	<!-- 關於 -->
            <div class="gg-page-wapper" ng-show="tab==1">
                <div class="gg-slogan-1"></div>
                <div class="gg-info-1"></div>
            </div>
        	<!-- tasting -->
        	<div class="gg-page2-wapper" ng-show="tab==2">
            	<div class="gg-slogan-2"></div>
                <div class="gg-info-2"></div>
            </div>
       		<!-- 預約 -->
            <div class="gg-page-wapper" ng-show="tab==3">
                <div class="gg-btn07"><a href="javascript:;" ng-click="share()"><img src="img/btn7.png" width="158" height="55" /></a></div>
                <div class="gg-slogan-3"></div>
                <div class="gg-info-3"></div>
            </div>
			<!-- 隱情權 -->
	        <div ng-show="tab==4">
	        	<?php echo $this->view('privacy');?>
	        </div>
            <!-- 填寫資料 -->
            <div class="gg-page-wapper" ng-show="tab==5">
                <form id="data_form">
                <input type="hidden" name="table" value="user_info"/>
                    <div class="gg-slogan-3"></div>
                  <div class="gg-info-3-2">
                        <div class="box1 form-group">
                            <input name="username" type="text" ng-model="user.name" class="form-control required" id="username" placeholder="" alt="姓名" />
                        </div>
                        <div class="box2 form-group">
                            <input name="tel" type="text" ng-model="user.tel" class="form-control required" id="tel" placeholder="" alt="電話" />
                        </div>
                        <div class="box3 form-group">
                            <input name="email" type="text" ng-model="user.email" class="form-control required" id="email" placeholder="" alt="email" />
                        </div>
                      <div class="box4">
                        <select name="buymodel" class="form-control" ng-model="buymodel" style="font-size: 12pt;">
                          <option value="1">預約鑑賞方案</option>
                          <option value="2">雙瓶分享方案</option>
                      </select></div>
                    <div class="gg-confirm" style="margin-top: 315px;">
                        <table width="300" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="19" align="left" valign="top"><input type="checkbox" id="agree" />
                          </td>
                        <td width="200" rowspan="2" align="left" valign="top" class="w2">
                        <label for="agree">我已年滿合法飲酒年齡，並已詳閱活動辦法，<br />
                        同意將個人資料作為此次活動使用</label>
                      </tr>
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                      </tr>
                        </table>
                      </div>
                      <div class="gg-btn08"><a href="javascript:;" ng-click="submit_();"><img src="img/btn8.png" width="158" height="55" /></a></div>
                      <div class="gg-btn09"><a href="javascript:;" ng-click="reset(1);"><img src="img/btn9.png" width="158" height="55" /></a></div>
                    </div>
                </form>
            </div>
            <!-- 預約完成 -->
            <div class="gg-page-wapper" ng-show="tab==6">
                <div class="gg-slogan-4"></div>
                <div class="gg-info-4"></div>
            </div>
            <!-- 填朋友頁 -->
            <div class="gg-page-wapper" ng-show="tab==7">
                <form id="data_form2">
                    <input type="hidden" name="table" value="friend_info"/>
                    <div class="gg-slogan-4"></div>
                    <div class="gg-info-5">
                        <div class="box1 form-group">
                            <input name="username" type="text" ng-model="user2.name" class="form-control required" id="username" placeholder="" alt="姓名" />
                        </div>
                        <div class="box2 form-group">
                            <input name="tel" type="text" ng-model="user2.tel" class="form-control required" id="tel" placeholder="" alt="電話" />
                        </div>
                        <div class="box3 form-group">
                            <input name="address" type="text" ng-model="user2.address" class="form-control required" id="address" placeholder="" alt="地址" />
                        </div>
                        <div class="box4 form-group">
                            <textarea cols="30" rows="4" class="form-control required" ng-model="user2.message" name="message" alt="想說的話"></textarea>
                        </div>
                        <div class="gg-btn10"><a href="javascript:;" ng-click="submit2_();"><img src="img/btn8.png" width="158" height="55" /></a></div>
                        <div class="gg-btn11"><a href="javascript:;" ng-click="reset(2);"><img src="img/btn9.png" width="158" height="55" /></a></div>
                    </div>
                    <input type="checkbox" id="agree2" checked/>
                </form>
            </div>

        <div class="gg-pic"><img src="img/index.jpg" width="1200" height="800" /></div>
        </div>
	</div>

    <?php echo $this->view('footer');?>
</div>

