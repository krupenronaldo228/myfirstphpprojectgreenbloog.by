<html lang="RU">
<head>
  <meta charset="UTF-8">
  <title>Greenblog.by</title>

  <!--   Bootstrap Grid  -->
  <link rel="stylesheet" type="text/css" href="/assets/bootstrap-grid-only/css/grid12.css">


	<!-- 	  Google Fonts  	-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

	<!-- Custom -->
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

</head>
<body>

  <div id="wrapper">

<?php include "header.php"?>

	  <div id="content">
		  <div class="container">
			  <div class="row">
				  <section class="col-md-12">
					  <div class="block">
						  <h3>Главная <span>/ Новости</span></h3>
						  <h2>Новости</h2>
						<?php include "searchbar.php" ?>
						  <div class="block__content">
							  <div class="articles articles__horizontal">

								  <?php
								  $this->input->get('keyword');
								  ?>
									  <b>Search Result For "<?php echo $this->input->get('keyword');?>"</b>


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
						  <div class="paginationi">
						<?=$this->pagination->create_links() ?>
						  </div>
				  </section>
			  </div>
		  </div>
	  </div>

<?php include "footer.php" ?>

  </div>
</body>
        </html>

