# Rock Music Blog - CTF

## Описание уязвимости
Этот проект представляет собой уязвимое веб-приложение, работающее в Docker-контейнере. 
Оно содержит скрытую страницу аутентификации, которую можно обнаружить с помощью инструментов брутфорса (например, `wfuzz`). 
Основная уязвимость связана с отсутствием надлежащего контроля доступа к логин-странице и использованию слабых паролей.

## Запуск приложения

### 1. Клонирование репозитория
```bash
git clone https://github.com/nnikk777/ctf-1.git
cd ctf-1
```

### 2. Запуск с помощью Docker Compose
```bash
docker-compose up -d --build
```
Приложение запустится в фоновом режиме. Чтобы проверить его работу, открой браузер и перейди по адресу `http://localhost` (или IP сервера, если запускается удаленно).

## Как найти уязвимость

1. **Поиск скрытых директорий:**
   ```bash
   wfuzz -c -z file,wordlist.txt --hc 404 http://target-ip/FUZZ/
   ```
   Это поможет обнаружить скрытую директорию `/hidden_login`.

2. **Брутфорс логина и пароля:**
   ```bash
   wfuzz -c -z file,users.txt -z file,passwords.txt -d "user=FUZZ&pass=FUZ2Z" http://target-ip/hidden_login/login.php
   ```
   Если атака успешна, сервер вернет сообщение `Success` и флаг.

## Защита от уязвимости

1. **Скрытие логин-страницы более надежными способами:**
   - Использовать уникальные пути, которые не угадываются брутфорсом.
   - Применять JWT-токены или IP-фильтрацию.
2. **Усиление паролей:**
   - Использовать сложные пароли, аутентификацию через 2FA.
3. **Настройка защиты от брутфорса:**
   - Ограничение числа попыток входа.
   - Капча перед логином.

## Флаг
После успешного входа в систему будет выведен флаг:
```text
practice{...}
```

