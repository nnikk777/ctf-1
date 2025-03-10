FROM ubuntu:latest

# Устанавливаем Apache и PHP
RUN apt update && apt install -y apache2 php libapache2-mod-php && rm -rf /var/lib/apt/lists/*

# Копируем файлы сайта
COPY . /var/www/html/

# Даем права на чтение/запись
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Открываем 80 порт
EXPOSE 80

# Запускаем Apache
CMD ["apachectl", "-D", "FOREGROUND"]
