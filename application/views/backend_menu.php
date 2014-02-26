<!-- menu -->
<ul class="nav nav-tabs">
  <li <?php if($this->router->method=='user'){ echo 'class="active"'; } ?>><a href="<?=site_url('backend/user');?>">參加者資料</a></li>
  <li <?php if($this->router->method=='admin'){ echo 'class="active"'; } ?>><a href="<?=site_url('backend/admin');?>">app設定</a></li>
  <li><a href="<?=site_url('backend/logout');?>">登出</a></li>
</ul>

<div style='height:10px;'></div>
