<?php
/**
 * @var $id
 * @var \Up\Models\Product $product
 * @var \Up\Models\Image $images
 * @var $brandId
 */

use Up\Services\SecurityService;

$tags = $product->getTags();
?>
<div class="wrapper">
	<section class="detail">
		<div class="detail__imgContainer">
			<div class="slider-nav">
				<div class="slider-nav__item" tabindex="0">
					<img src="/assets/images/productImages/<?=$product->getCover()->getPath()?>" alt="product image" class="detail__slider_img">
				</div>
                <?php foreach ($images as $image):?>
                    <div class="slider-nav__item" tabindex="0">
                        <img src="/assets/images/productImages/<?=$image->getPath()?>" alt="slider image" class="detail__slider_img">
                    </div>
                <?php endforeach;?>
			</div>
			<div class="slider-block">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<img src="/assets/images/productImages/<?=$product->getCover()->getPath()?>" alt="product image" class="detail__mainImg">
					</div>
					<?php foreach ($images as $image):?>
					<div class="swiper-slide">
						<img src="/assets/images/productImages/<?=$image->getPath()?>" alt="product image" class="detail__mainImg">
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
		<div class="detail__infoContainer">
			<div class="detail__title">
				<h2><?=SecurityService::safeString($product->getTitle())?></h2>
			</div>
			<div class="detail__brandContainer">
				<ul class="detail__brandList">
					<li class="detail__brandItem">
						<a href="/catalog/all/1/?activeBrands%5B%5D=<?=$brandId?>" class="detail__brandLink"><?= SecurityService::safeString($product->getBrand())?></a>
					</li>
					<?php foreach ($tags as $tag):?>
						<li class="detail__brandItem">
							<a href="/catalog/<?=$tag->getTitle()?>/1/" class="detail__brandLink"><?=SecurityService::safeString($tag->getTitle())?></a>
						</li>
					<?php endforeach;?>
				</ul>
			</div>
			<div class="techDetail">
				<p class="techDetail__description">
					<?=SecurityService::safeString($product->getDescription())?>
				</p>
			</div>
			<div class="detail__cost">$ <?=SecurityService::safeString($product->getPrice())?></div>
			<div class="btnContainer">
				<a href="/order/<?=$product->getId()?>/" class="detail__buyBtn">Buy Now</a>
			</div>
		</div>
	</section>
</div>
<div id="detailModal">
	<div class="detailModal__container" aria-modal="true">
		<button class="detailModal__close">
			<img src="/assets/images/common/close-search.svg" alt="close modal window">
		</button>
		<div class="detailModal__content">
			<div class="detailModal__imgContainer">
				<div class="detailSlider-nav">
					<div class="detailSlider-nav__item">
						<img src="/assets/images/productImages/<?=$product->getCover()->getPath()?>" alt="product image" class="detail__slider_img">
					</div>
					<?php foreach ($images as $image):?>
					<div class="detailSlider-nav__item">
						<img src="/assets/images/productImages/<?=$image->getPath()?>" alt="slider image" class="detail__slider_img">
					</div>
					<?php endforeach;?>
				</div>
				<div class="detailSlider-block">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="/assets/images/productImages/<?=$product->getCover()->getPath()?>" alt="product image" class="detail__mainImg">
						</div>
						<?php foreach ($images as $image):?>
						<div class="swiper-slide">
							<img src="/assets/images/productImages/<?=$image->getPath()?>" alt="slider image" class="detail__mainImg">
						</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/swiper-bundle.min.js"></script>
<script src="/assets/js/slider.js"></script>