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
							<li><?=anchor('for-partners','Строительным компаниям');?></li>
							<li><?=anchor('for-individuals','Частным лицам');?></li>
							<li class="active"><?=anchor('for-architectors','Строителям и архитекторам');?></li>
						</ul>
					</aside>
					<div class="content cf">
						<h1>Строителям и архитекторам</h1>
						<div class="column wide">
							<p>
								Группа строительных компаний «РСК» приглашает к сотрудничеству высококвалифицированных инженерно-технических 
								работников и архитекторов.
							</p>
							<p> 
								Если вы считаете, что работа в коллективе, который ставит перед собой серьезные 
								задачи, — это то, что нужно именно Вам, то направляйте свое резюме по адресу 
								<?=safe_mailto('rsk_rostov@mail.ru','rsk_rostov@mail.ru',array('class'=>'email-link'));?>
							</p>
							<p class="foot">По всем вопросам обращайтесь, пожалуйста, по телефону: +7 (863) 3000-655</p>
						</div>
					</div>
				</div>
				<?php $this->load->view("users_interface/includes/footer");?>
				
			</article>
		</div>
		<?php $this->load->view("users_interface/includes/scripts");?>
		
	</body>
</html><?php

?>