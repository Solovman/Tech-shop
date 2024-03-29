<?php
/**
 * @var Product[] $products
 * @var array $pageArray
 * @var $profilePage
 * @var $orderPage
 */

use Up\Models\Product;
use Up\Services\SecurityService;

?>
<div class="title__container">
	<h2 class="account__title">Your Products</h2>
</div>
<ul class="admin admin__productList">
	<?php foreach($products as $product):?>
	<li class="admin__productItem">
		<img src="/assets/images/productImages/<?=$product->getCover()->getPath()?>" alt="product image" class="admin__productImage">
		<div class="admin__productTextContainer">
			<p class="admin__productId" data-id="<?= SecurityService::safeString($product->getId()) ?>" hidden></p>
			<h3 class="admin__productTitle" data-title="<?= SecurityService::safeString($product->getTitle()) ?>"><?= SecurityService::safeString($product->getTitle()) ?></h3>
			<p class="admin__productDescription" data-description="<?= SecurityService::safeString($product->getDescription()) ?>"></p>
			<p class="admin__productCost" data-price="<?= SecurityService::safeString($product->getPrice()) ?>" >$<?= SecurityService::safeString($product->getPrice()) ?></p>
			<p class="admin__productBrand" data-brand="<?= SecurityService::safeString($product->getBrand()) ?>" hidden></p>
			<?php foreach ($product->getTags() as $tag):?>
			<p class="admin__productTag" data-tag="<?= SecurityService::safeString($tag->getTitle()) ?>" hidden></p>
			<?php endforeach;?>
			<button class="admin__productEdit">Edit Product</button>
			<button class="admin__productStatus <?= $product->getEntityStatusId() === 1 ? 'activeStatus' : 'non-activeStatus' ?>" data-status="<?= $product->getEntityStatusId()?>" onclick="toggleButton(this)">
				<?= $product->getEntityStatusId() === 1 ? 'Active' : 'Disabled' ?>
			</button>
			<button onclick="removeItem(<?= SecurityService::safeString($product->getId()) ?>, '<?= SecurityService::safeString($product->getTitle()) ?>')" id="dangerBtn" class="admin__productDelete">
				<img src="/assets/images/common/bin.svg" alt="delete product" class="deleteImg">
			</button>
		</div>
	</li>
	<?php endforeach;?>
</ul>
<div class="pagination">
	<ul class="pagination__list">
		<li class="pagination__item">
			<a class="pagination__btn" href="/admin/?order=<?=$orderPage?>&profile=<?=$profilePage?>&product=<?=$pageArray[0]?>">
				Previous page
			</a>
		</li>
		<li class="pagination__item">
			<a class="pagination__btn" href="/admin/?order=<?=$orderPage?>&profile=<?=$profilePage?>&product=<?=$pageArray[1]?>">
				Next page
			</a>
		</li>
	</ul>
</div>