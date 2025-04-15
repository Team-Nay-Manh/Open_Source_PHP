# Sử dụng image PHP với Apache
FROM php:apache

# Cài đặt các phần mở rộng cần thiết
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Copy toàn bộ code dự án vào container
COPY . /var/www/html

# Cấp quyền cho thư mục (nếu cần)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Kích hoạt mod_rewrite cho Apache (nếu sử dụng .htaccess)
RUN a2enmod rewrite

# Restart Apache để áp dụng thay đổi
CMD ["apache2-foreground"]
