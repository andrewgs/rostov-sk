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
							<li class="active"><?=anchor('for-partners','Строительным компаниям');?></li>
							<li><?=anchor('for-individuals','Частным лицам');?></li>
							<li><?=anchor('for-architectors','Строителям и архитекторам');?></li>
						</ul>
					</aside>
					<div class="content cf">
						<h1>Строительным компаниям</h1>
						<div class="column wide">
							<p>
								Группа строительных компаний «РСК» приглашает к сотрудничеству строительные компании, которые находятся в поиске нового 
								надежного подрядчика. Мы всегда рады новым партнерам, ориентированным на долгосрочное сотрудничество. 
							</p>
							<p>
								Опыт нашей компании и собственный парк строительной техники позволит решить задачи любой сложности по строительству 
								жилых и коммерческих зданий, а также капитальному ремонту и реставрации архитектурных объектов. 
							</p>
							
							<p class="foot">По всем вопросам обращайтесь, пожалуйста, по телефону: +7 (863) 3000-655 или электронной почте <?=safe_mailto('rsk_rostov@mail.ru','rsk_rostov@mail.ru',array('class'=>'email-link'));?></p>
						</div>
					</div>
				</div>
				<?php $this->load->view("users_interface/includes/footer");?>
				
			</article>
		</div>
		<?php $this->load->view("users_interface/includes/scripts");?>
		
	</body>
</html>