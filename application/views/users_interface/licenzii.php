<!DOCTYPE html>
<!-- /ht Paul Irish - http://front.ie/j5OMXi -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
	<!--<![endif]-->
	<?php $this->load->view("users_interface/includes/head");?>
	
	<body class="inside">
		<div class="container cf">
			<article>
				<?php $this->load->view("users_interface/includes/header");?>
				
				<div id="main" class="cf">
					<aside class="inside">
						<ul class="sub-nav">
							<li><?=anchor('about','Информация о компании');?></li>
							<li  class="active"><?=anchor('licenzii','Лицензии и разрешения');?></li>
							<li><?=anchor('blagodarnosti','Благодарственные письма');?></li>
						</ul>
					</aside>
					<div class="content cf">
						<h1>Лицензии и разрешения</h1>
						<div class="column wide">
							<p>
								Группа компаний «РСК» имеет доступ к определенным видам работ, которые оказывают влияние на безопасность 
								объектов капитального строительства.
							</p>
							<p class="separator">////////////////////////////////</p>
							<div class="license">
								<a href="<?=$baseurl;?>images/license/1.jpg" target="_blank"><img src="<?=$baseurl;?>images/license/1.jpg" alt="Свидетельство о разрешении" /></a>
								<a href="<?=$baseurl;?>images/license/2.jpg" target="_blank"><img src="<?=$baseurl;?>images/license/2.jpg" alt="Свидетельство о разрешении" /></a>
								<a href="<?=$baseurl;?>images/license/3.jpg" target="_blank"><img src="<?=$baseurl;?>images/license/3.jpg" alt="Свидетельство о разрешении" /></a>
								<a href="<?=$baseurl;?>images/license/4.jpg" target="_blank"><img src="<?=$baseurl;?>images/license/4.jpg" alt="Свидетельство о разрешении" /></a>
								<a href="<?=$baseurl;?>images/license/5.jpg" target="_blank"><img src="<?=$baseurl;?>images/license/5.jpg" alt="Свидетельство о разрешении" /></a>
								<a href="<?=$baseurl;?>images/license/6.jpg" target="_blank"><img src="<?=$baseurl;?>images/license/6.jpg" alt="Свидетельство о разрешении" /></a>
								<a href="<?=$baseurl;?>images/license/7.jpg" target="_blank"><img src="<?=$baseurl;?>images/license/7.jpg" alt="Свидетельство о разрешении" /></a>
								<a href="<?=$baseurl;?>images/license/8.jpg" target="_blank"><img src="<?=$baseurl;?>images/license/8.jpg" alt="Свидетельство о разрешении" /></a>
								<a href="<?=$baseurl;?>images/license/9.jpg" target="_blank"><img src="<?=$baseurl;?>images/license/9.jpg" alt="Свидетельство о разрешении" /></a>
							</div>
							<p class="foot">Группа компаний «РСК» имеет в своем штате 347 высококвалифицированных специалистов, 37 из которых являются инженерно-техническими работниками.</p>
						</div>
					</div>
				</div>
				<?php $this->load->view("users_interface/includes/footer");?>
				
			</article>
		</div>
		<?php $this->load->view("users_interface/includes/scripts");?>
		
	</body>
</html>