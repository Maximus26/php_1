<div class="orders" data-order-id="{{ID}}">
	<h3>Заказ #{{ID}}</h3>
	<div>Статус заказ:
		<select class="status-{{ID}}" name="orderStatus">
			<option selected value="{{STATUS}}">{{STATUS}}</option>
			<option value="2">Заказ отменен</option>
			<option value="3">Заказ оплачен</option>
			<option value="4">Заказ доставлен</option>
		</select>
		<button onclick="changeStatus({{ID}})">Изменить статус</button>
	</div>
	<table class="cartTable">
		<thead>
		<tr>
			<td>Название</td>
			<td>Стоимость</td>
			<td>Количество</td>
			<td>Сумма</td>
		</tr>
		</thead>
		<tbody>
		{{CONTENT}}
		<tr>
			<td colspan="3">Итого</td>
			<td>{{SUM}}</td>
		</tr>
		</tbody>
	</table>
	<div class="date">Дата создания: {{DATE}}</div>
	<div class="cancel">
		<button onclick="canelOrder({{ID}})">Отменить заказ</button>
	</div>
</div>
<br>