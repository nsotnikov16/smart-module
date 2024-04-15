<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Стили для оформления сайта");
?>

<h1>Заголовок H1</h1>
<h2>Заголовок H2</h2>
<h3>Заголовок H3</h3>
<h4>Заголовок H4</h4>
<h5>Заголовок H5</h5>
<p>Хотите, чтобы <strong>понравившиеся вещи</strong> ждали Вас в магазине? Теперь <em>резерв товаров</em> в магазинах доступен совершенно бесплатно для всех <strong><em>зарегистрированных</em></strong> на сайте участников клубной программы.</p>
<p>Но это не все – забирая свой <a href="#3434">интернет-заказ в магазине</a>, Вы получаете 300 бонусов на клубную карту!</p>
<table class="noborder">
	<tbody>
	<tr>
		<td><strong>Маркированный список</strong>
			<ul>
				<li>Пункт маркерованного списка один</li>
				<li>Пункт маркерованного списка два</li>
				<li>Пункт маркерованного списка много букв много букв много букв много букв много букв много букв много букв много букв много букв много букв много букв много букв много букв много букв</li>
				<li>Подпункты списка
					<ul>
						<li>Подпункт 1</li>
						<li>Подпункт 2</li>
						<li>Подпункт 3</li>
					</ul>
				</li>
			</ul>
		</td>
		<td><strong>Нумерованный список</strong>
			<ol>
				<li>Пункт маркерованного списка один</li>
				<li>Пункт маркерованного списка два</li>
				<li>Пункт маркерованного списка много букв много букв много букв много букв много букв много букв много букв много букв много букв много букв много букв много букв много букв много букв</li>
				<li>Подпункты списка
					<ol>
						<li>Подпункт 1</li>
						<li>Подпункт 2</li>
						<li>Подпункт 3</li>
					</ol>
				</li>
			</ol>
		</td>
	</tr>
	</tbody>
</table>
<h3>Линия</h3>
<hr>
<h3>Стилизация таблиц</h3>
<table>
	<tbody>
	<tr>
		<th>Наименование товара</th>
		<th>Цена за единицу</th>
		<th>Стоимость, руб.</th>
		<th>Вес</th>
	</tr>
	<tr>
		<td>Пеноплэкс (КОМФОРТ) пенополистирол экструдированный 1200х600х100мм (уп. 0,288 м3/ 5,76 м2/ 4 шт.) Г4</td>
		<td>49 руб.</td>
		<td>2478 руб.</td>
		<td>30 кг</td>
	</tr>
	<tr>
		<td>Пеноплэкс (КОМФОРТ) пенополистирол экструдированный 1200х600х100мм (уп. 0,288 м3/ 5,76 м2/ 4 шт.) Г4</td>
		<td>49 руб.</td>
		<td>2478 руб.</td>
		<td>30 кг</td>
	</tr>
	<tr>
		<td>Пеноплэкс (КОМФОРТ) пенополистирол экструдированный 1200х600х100мм (уп. 0,288 м3/ 5,76 м2/ 4 шт.) Г4</td>
		<td>49 руб.</td>
		<td>2478 руб.</td>
		<td>30 кг</td>
	</tr>
	</tbody>
</table>
<blockquote>Текст цитаты длинный текст Текст цитаты длинный текст Текст цитаты длинный текст Текст цитаты длинный текст Текст цитаты длинный текст Текст цитаты длинный текст Текст цитаты длинный текст Текст цитаты длинный текст Текст цитаты длинный текст Текст цитаты длинный текст Текст цитаты длинный текст Текст цитаты длинный текст</blockquote>
<table class="noborder">
	<tbody>
	<tr>
		<td style="width: 190px;">Выпадающее меню:</td>
		<td><select name="select">
				<option value="">Выберите пункт...</option>
				<option value="1">Пункт меню пункт меню</option>
				<option value="2">Пункт меню пункт меню пункт меню</option>
				<option value="3">Очень длинный пункт меню пункт меню пункт меню</option>
				<option value="3">Очень длинный пункт меню пункт меню пункт меню меню пункт меню меню пункт меню</option>
			</select><br><br><select disabled="disabled" name="select2">
				<option value="">Выберите пункт...</option>
				<option value="1">Пункт меню пункт меню</option>
				<option value="2">Пункт меню пункт меню пункт меню</option>
				<option value="3">Очень длинный пункт меню пункт меню пункт меню</option>
			</select></td>
	</tr>
	<tr>
		<td>Текстовое поле:</td>
		<td><input name="text" type="text" value=""></td>
	</tr>
	<tr>
		<td>Большое текстовое поле:</td>
		<td><textarea name="textarea"></textarea></td>
	</tr>
	<tr>
		<td>Радио кнопка</td>
		<td><input checked="checked" name="radio_check" type="radio" value="1"> Выбрано<br> <input name="radio" type="radio" value="2"> Не выбрано<br> <input disabled="disabled" name="radio" type="radio" value="3"> Недоступно<br> <input checked="checked" disabled="disabled" name="radio" type="radio" value="4"> Выбрано недоступно</td>
	</tr>
	<tr>
		<td>Чекбокс</td>
		<td>
			<input id="checkbox-1" checked="checked" name="checkbox" type="checkbox" value=""><label for="checkbox-1">Выбрано</label><br>
			<input id="checkbox-2" name="checkbox" type="checkbox" value=""><label for="checkbox-2">Не выбрано</label><br>
			<input id="checkbox-3" disabled="disabled" name="checkbox" type="checkbox" value=""><label for="checkbox-3">Недоступно</label><br>
			<input id="checkbox-4" checked="checked" disabled="disabled" name="checkbox" type="checkbox" value=""><label for="checkbox-4">Выбрано недоступно</label>
		</td>
	</tr>
	<tr>
		<td>Кнопка</td>
		<td><input name="submit" type="submit" value="Кнопка submit"> <button>Кнопка button</button> <a class="blue-button" href="#">Кнопка a</a></td>
	</tr>
	</tbody>
</table>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>