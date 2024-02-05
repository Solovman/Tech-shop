<?php
/**
 * @var $error
 */
?>

<div class="modal" id="authModal">
	<div class="modalCard" id="logInModalContainer">
		<ul class="modal__list">
			<li class="modal__item activeModalItem">
				<p class="modal__link activeModalLink">Log in</p>
			</li>
		</ul>
		<h2 class="modalCard__title">Log in to Tech Shop</h2>
		<div class="modalResponse <?= !empty($error) ? 'invalidField' : '' ?>"><?=$error?></div>
		<form class="modalCard__form" action="/login/auth" method="post">
			<div class="modalField">
				<img src="/assets/images/common/email.svg" alt="click and write your E-mail" class="modalField__img">
				<input class="modalCard__form_input" type="text" name="email" placeholder="E-mail" required>
			</div>
			<div class="modalField">
				<img src="/assets/images/common/key.svg" alt="click and write your Password" class="modalField__img">
				<input class="modalCard__form_input password" type="password" name="password" placeholder="Password" required>
				<img src="/assets/images/common/hide.svg" alt="show your password in the screen" class="modalField__eye">
			</div>
			<label for="keepLog" class="keepLog">
				<input id="keepLog" type="checkbox" class="keepLog__input">
				Keep me logged in
			</label>
			<button id="logInButton" class="modalCard__btn" type="submit">Log In</button>
			<div class="modalCard__availability">
				<a href="/" class="modalCard__link">return to main</a>
				<?=$_SESSION['AuthError']=''?>
			</div>
		</form>
	</div>
</div>
<div class="emptyForBlur"></div>