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
							<li class="active"><?=anchor('about','Информация о компании');?></li>
							<li><?=anchor('licenzii','Лицензии и разрешения');?></li>
							<li><?=anchor('blagodarnosti','Благодарственные письма');?></li>
						</ul>
					</aside>
					<div class="content cf">
						<h1>Благодарственные письма</h1>
						<div class="column wide">
							<p>
								Группа компаний «РСК» имеет благодарственные письма от администрации города Ростова-на-Дону и Ростовской области, от коммерческих организаций и благотворительных фондов.
							</p>
							<p class="separator">////////////////////////////////</p>
							<div class="license">
								<a href="<?=$baseurl;?>images/blagodarnosti/1.jpg" target="_blank"><img src="<?=$baseurl;?>images/blagodarnosti/1.jpg" alt="Благодарности компании РСК" /></a>
								<a href="<?=$baseurl;?>images/blagodarnosti/2.jpg" target="_blank"><img src="<?=$baseurl;?>images/blagodarnosti/2.jpg" alt="Благодарности компании РСК" /></a>
								<a href="<?=$baseurl;?>images/blagodarnosti/3.jpg" target="_blank"><img src="<?=$baseurl;?>images/blagodarnosti/3.jpg" alt="Благодарности компании РСК" /></a>
								<a href="<?=$baseurl;?>images/blagodarnosti/4.jpg" target="_blank"><img src="<?=$baseurl;?>images/blagodarnosti/4.jpg" alt="Благодарности компании РСК" /></a>
								<a href="<?=$baseurl;?>images/blagodarnosti/5.jpg" target="_blank"><img src="<?=$baseurl;?>images/blagodarnosti/5.jpg" alt="Благодарности компании РСК" /></a>
								<a href="<?=$baseurl;?>images/blagodarnosti/6.jpg" target="_blank"><img src="<?=$baseurl;?>images/blagodarnosti/6.jpg" alt="Благодарности компании РСК" /></a>
								<a href="<?=$baseurl;?>images/blagodarnosti/7.jpg" target="_blank"><img src="<?=$baseurl;?>images/blagodarnosti/7.jpg" alt="Благодарности компании РСК" /></a>
							</div>
							<p class="foot">Группа компаний «РСК» имеет свой собственный парк строительной техники, который ежегодно расширяется современными техническими средствами.</p>
						</div>
					</div>
				</div>
				<?php $this->load->view("users_interface/includes/footer");?>
				
			</article>
		</div>
		<?php $this->load->view("users_interface/includes/scripts");?>
		
	</body>
</html>