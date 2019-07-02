// $.post({
// 	url: '/action.php?id=1',
// 	data: {a: 1}
// });

//Функция AJAX авторизации
function login() {
	//Получаем input'ы логина и пароля
	const $login_input = $('[name="login"]');
	const $password_input = $('[name="password"]');

	//Получаем значение login и password
	const login = $login_input.val();
	const password = $password_input.val();

	//Инициализируем поле для сообщений
	const $message_field = $('.message');

	//Вызываем функцию jQuery AJAX с методом POST
	//Передаем туда url где будет обрабатваться API
	//И data которое будет помещена в $_POST
	//success - вызывается при успешном ответе от сервера

	$.post({
		url: '/api.php',
		data: {
			apiMethod: 'login',
			postData: {
				login: login,
				password: password
			}
		},
		success: function (data) {
			//data приходят те данные, который прислал на сервер


			//Вариант с json
			// if(data.error) {
			// 	$message_field.text(data.error_text);
			// } else {
			// 	location.reload();
			// }

			//Вариан без json
			if (data === 'OK') {
				location.href = '/account/userAccount.php';
			} else if (data === 'OK_adm') {
				location.href = '/admin/';
			}else {
				$message_field.text(data);
			}
		}
	});
}

function addToCart(id) {
	//Инициализируем поле для сообщений
	//const $message_field = $('.message');

	$.post({
		url: '/api.php',
		data: {
			apiMethod: 'addToCart',
			postData: {
				id: id
			}
		},
		success: function (data) {
			if(data === 'OK') {
				swal("Товар добавлен в корзину", "", "success");
				//$message_field.text('Товар добавлен в корзину');
			} else {
				swal("", data, "error");
				//$message_field.text(data);
			}
			/*setTimeout(function () {
				$message_field.text('');
			}, 3000);*/
		}
	})
}

function removeFromCart(id) {
	$.post({
		url: '/api.php',
		data: {
			apiMethod: 'removeFromCart',
			postData: {
				id: id
			}
		},
		success: function (data) {
			if(data === 'OK') {
				$('[data-id="' + id + '"]').remove();
				location.reload();
			} else {
				alert(data);
			}
		}
	})
}

function canelOrder(id) {
	$.post({
		url: '/api.php',
		data: {
			apiMethod: 'canelOrder',
			postData: {
				id: id
			}
		},
		success: function (data) {
			if(data === 'OK') {
				$('[data-order-id="' + id + '"]').remove();
				location.reload();
			} else if(data === 'OK_adm') {
				$('[data-order-id="' + id + '"]').remove();
				location.reload();
			} else {
			alert(data);
			}
		}
	})
}


function changeStatus(id) {
	const $orderStatus = $('.status-' + id);

	//Получаем значение status и id
	const status = $orderStatus.val();
	$.post({
		url: '/api.php',
		data: {
			apiMethod: 'changeStatus',
			postData: {
				status: status,
				id: id
			}
		},
		success: function (data) {
			if(data === 'OK_adm') {
				location.reload();
			} else {
				alert(data);
			}
		}
	})
}
