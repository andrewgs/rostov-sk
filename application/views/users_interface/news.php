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
						<?php for($i=0;$i<count($allnews);$i++):?>
							<li class="news<?=$allnews[$i]['id'];?>"><?=anchor('news/'.$allnews[$i]['id'].'-'.$allnews[$i]['translit'],$allnews[$i]['small_title']);?></li>
						<?php endfor;?>
						</ul>
					</aside>
					<div class="content cf">
						<h1><?=$news['title'];?></h1>
						<?=$news['text'];?>
					</div>
				</div>
				<?php $this->load->view("users_interface/includes/footer");?>
				
			</article>
		</div>
		<?php $this->load->view("users_interface/includes/scripts");?>
		<script type="text/javascript">
			$("li[class='news<?=$newsid;?>']").addClass('active');
		</script>
	</body>
</html>