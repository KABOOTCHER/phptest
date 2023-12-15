
<?php
// Получаем данные из формы
$name = $_POST['name'];
$phone = $_POST['phone'];

// Ваш API-ключ Telegram бота
$telegram_api_key = '6927799024:AAEwMa2NNEzTlmMF2yqW3rlNY0-XgvmxPBA';

// Чат-идентификатор группы в Telegram, куда будут отправляться уведомления
$chat_id = '-4001898258';

// Сообщение для отправки в группу
$message = "Новая заявка на обратный звонок:\nИмя: $name\nНомер телефона: $phone";

// URL для отправки сообщения в Telegram
$telegram_url = "https://api.telegram.org/bot$telegram_api_key/sendMessage";

// Параметры запроса
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query(array('chat_id' => $chat_id, 'text' => $message)),
    ),
);

// Создаем контекст потока
$context  = stream_context_create($options);

// Отправляем запрос к API Telegram
$response = file_get_contents($telegram_url, false, $context);

// Проверяем результат отправки
if ($response === false) {
    echo 'Ошибка при отправке заявки.';
} else {
    echo 'Заявка успешно отправлена.';
}
?>
```

