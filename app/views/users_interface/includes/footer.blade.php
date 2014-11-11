<footer>
	<div class="footer-addr">
		<address>
			<div class="dest">Республика Адыгея, ст. Даховская, ул. Мира 26а</div>
			<a class="footer-tel" href="tel:89184223862">8 (918) 422-38-62</a>, <a class="footer-tel" href="tel:89284712000">8 (928) 471-20-00</a>
		</address>
	</div>
	<a href="<?=URL::to('contacts');?>" class="contacts-link">Контакты</a>
	<div id="weather"></div>
	<div class="social">
		<span class="social-capt">мы в соцсетях</span>
		<ul class="social-links-list clearfix">
			<li class="social-links-item facebook">
				<a href="https://www.facebook.com/pages/Даховская-Слобода-туристический-комплекс/358958170792437" title=""></a>
			</li>
		<!--
			<li class="social-links-item instagram">
				<a href="#" title=""></a>
			</li>
		-->
			<li class="social-links-item twitter">
				<a href="https://twitter.com/dahsloboda" title=""></a>
			</li>
			<li class="social-links-item vk">
				<a href="http://vk.com/club48337264" title=""></a>
			</li>
			<li class="social-links-item odnokl">
				<a href="http://www.odnoklassniki.ru/dahovka" title=""></a>
			</li>
		</ul>
	</div>
	<p>
		<a target="_blank" href="http://payanyway.ru">
			{{HTML::image('img/white_paw.gif')}}
		</a>
	</p>
	<div class="copyright">
		<div>
			&copy; Туристический комплекс «Даховская слобода»
		</div>
		<div class="dev">
			Разработано агентством «<a target="_blank" href="http://grapheme.ru/">Графема</a>», 2013 - {{date("Y")}}
		</div>
	</div>
</footer>