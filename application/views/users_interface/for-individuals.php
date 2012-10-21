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
							<li class="active"><?=anchor('for-individuals','Частным лицам');?></li>
							<li><?=anchor('for-architectors','Строителям и архитекторам');?></li>
						</ul>
					</aside>
					<div class="content cf">
						<h1>Частным лицам</h1>
						<div class="column wide">
							<p>
								Если Вы обладаете счастливой возможностью построить собственный дом, группа строительных компаний «РСК» 
								рада предложить Вам помощь в проектировании, строительстве и ремонтно-отделочным работам Вашего дома. 
							</p>
							<p>
								Наша компания предлагает комплексный подход к строительству частных домов и коттеджных поселков. Мы занимаемся 
								возведением современных домов и осуществляем ремонтно-отделочные работы «под ключ».
							</p>
							<p class="foot">Более подробную информацию Вы можете получить у наших специалистов по телефону: (863) 3000-655.</p>
						</div>
					</div>
				</div>
				<?php $this->load->view("users_interface/includes/footer");?>
				
			</article>
		</div>
		<?php $this->load->view("users_interface/includes/scripts");?>
		
	</body>
</html>