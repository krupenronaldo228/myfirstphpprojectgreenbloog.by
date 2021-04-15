<div class="block__search">
	<!-- <form action="">
	 <input type="text" id="search" name="search" placeholder="Поиск по записям" alt=""/>
	 <input type="submit" value="Найти" />
	 </form>-->
	<form class="form__block" method="get" action="<?php echo base_url('blog')?>">
		<input class="input__search" type="search" placeholder="Поиск по записям" aria-label="Search" name="keyword"
			   value="<?php if($this->input->get('keyword'))echo $this->input->get('keyword');?>">
		<button class="button__search" type="submit"><img src="assets/images/search.png" alt="Search"> Найти</button>
	</form>
	<div class="filter__block">Сортировать по:
		<?php $sort_list = [
			'pubdate asc' => 'дате по возрастанию',
			'pubdate desc' => 'дате по убыванию',
			//'text asc' => 'сначала короткие',
			//'text desc' => 'сначала длинные',
			'title asc' => 'название по возрастани.',
			'title desc' => 'названия по убыванию',
		];?>
		<?php foreach($sort_list as $key => $label) { ?>
			<a class="button__search1 <?=$sort === $key ? 'current' : null;?>" href="<?=base_url('blog');?>?sort=<?=$key?>"><?=$label;?></a>
		<? } ?></div>
</div>
