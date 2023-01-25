docker build -t ci_risti-app:latest .
docker run -d -p 1886:80 -v /var/www/html/risti:/var/www/html --name ci_risti ci_risti-app:latest
