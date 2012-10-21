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
					<div class="content quatered cf">
						<h1>Контактная информация</h1>
						<div class="column half">
							<address>
								<p>344025, Ростовская область, г.Ростов-на-Дону</p>
								<p>ул.40-я линия, д.5/64, литер «АК»</p>
								<p>тел.: (863) 3000-655, (863) 3000-656, (863) 3000-657</p>
								<p>e-mail: <?=safe_mailto('rsk_rostov@mail.ru','rsk_rostov@mail.ru',array('class'=>'email-link'));?></p>
								<p>www.rostov-sk.com</p>
							</address>
							<h2>Обратная связь</h2>
							<?php $this->load->view("alert_messages/alert-error");?>
							<?php $this->load->view("alert_messages/alert-success");?>
							<div id="message_box"></div>
							<?php $this->load->view("forms/frmcontact");?>
						</div>
						<div class="column half">
							<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
							<div id="ymaps-map" style="width: 475px; height: 648px;">
								<div class="overlay"> </div>
							</div>
							<script type="text/javascript">
								function fid_134948486246080783769(ymaps) {var map = new ymaps.Map("ymaps-map", {center: [39.775905788360565, 47.23244899372141],zoom: 16,
									type: "yandex#map"});map.controls.add("zoomControl").add("mapTools").add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));
									map.geoObjects.add(new ymaps.Placemark([39.77513906085201, 47.234915950935104],{balloonContent: "Главный офис группы строительных компаний «РСК»"},{preset: "twirl#blueDotIcon"}));
								};
							</script>
							<script type="text/javascript" src="http://api-maps.yandex.ru/2.0-stable/?lang=ru-RU&coordorder=longlat&load=package.full&wizard=constructor&onload=fid_134948486246080783769"></script>
						</div>
					</div>
				</div>
				<?php $this->load->view("users_interface/includes/footer");?>
				
			</article>
		</div>
		<?php $this->load->view("users_interface/includes/scripts");?>
		<script type="text/javascript">
			$("#submit").click(function(event){
				var err = false;
				$(".inpval").removeClass('empty-error');
				$("#msgdealert").remove();
				var email = $("#email").val();
				var phone = $("#phone").val();
				$(".inpval").each(function(i,element){if($(this).val()==''){err = true;$(this).addClass('empty-error');}});
				if(err){$("#message_box").html('<div class="alert alert-error">Поля не могут быть пустыми</div>'); event.preventDefault();};
				if(!err && !isValidEmailAddress(email)){$("#message_box").html('<div class="alert alert-error">Не верный адрес E-Mail</div>');$("#email").addClass('empty-error');err = true; event.preventDefault();}
				if(!err && !isValidPhone(phone)){$("#message_box").html('<div class="alert alert-error">Не верный номер телефона</div>');$("#phone").addClass('empty-error');err = true; event.preventDefault();}
			});
		</script>
	</body>
</html>