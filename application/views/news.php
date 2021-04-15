<html lang="RU">
<head>
	<meta charset="UTF-8">
	<title>Greenblog.by</title>

	<!-- Bootstrap Grid -->
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap-grid-only/css/grid12.css">

	<!-- Google Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

	<!-- Custom -->
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

</head>
<body>

<div id="wrapper">

	<?php include "header.php"?>

			<div class="container">

					<div class="block">
						<h3>Главная <span>/ Новости / <?php echo $title ?></span></h3>
						<div class="block__content1">

							<div class="articles articles__horizontal">

								<article class="article"  style="border-bottom: 1px solid #FFFFFF;">

									<div class="article__image" style="background-image: url(/assets/images/<?php echo $image ?>);"></div>
									<div class="article__info" style="padding-bottom: 3%";>
										<h1><?php echo  $title ?></h1>
										<p class="article__pubdate" style="padding-bottom: 3%";> <?php echo  $pubdate  ?></p>

										<p class="article__info__preview" style="width: 100%"><?php  echo $description ?></p>


									</div>


								</article>

								<div class="article__full__text" >
									<?php echo  $text ?>
								</div>

								<div class="dop__content">
									<h2> Возможно Вас заинтересует </h2>

									<?php
									foreach ($news as $keyword => $value){
										?>

									<article class="article" >
										<div class="article__image" style="background-image: url(/assets/images/<?php echo $value['image'] ?>);"></div>
										<div class="article__info">
											<p class="article__pubdate"> <?php echo  $value['pubdate']  ?></p>
											<a href="<?php echo base_url('blog/'.$value['slug'])?>"><?php echo  $value['title'] ?></a>
											<p class="article__info__preview"><?php  echo mb_substr($value['description'], 0, 300, 'utf-8'); ?></p>
											<div class="article__info__meta">
												<small> <a href="<?php echo base_url('blog/'.$value['slug'])?>">читать полностью</a></small>
											</div>
										</div>
									</article>
									<?php
										}
									?>
								</div>

							</div>
						</div>
					</div>
				</div>
</div>


	<?php include "footer.php" ?>

</div>
</body>
</html>

