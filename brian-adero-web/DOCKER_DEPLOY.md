# Docker Deployment Guide

## Quick Start

### 1. Build and Run
```bash
# Build and start containers
docker-compose up -d --build

# Check if containers are running
docker-compose ps
```

### 2. Setup Laravel
```bash
# Run migrations
docker-compose exec app php artisan migrate --force

# Generate application key (if needed)
docker-compose exec app php artisan key:generate

# Cache configuration
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache

# Create storage link
docker-compose exec app php artisan storage:link
```

### 3. Access Application
- **Website**: http://localhost:8080
- **Admin**: http://localhost:8080/admin
- **MySQL**: localhost:3307

## Environment Configuration

Update your `.env` file for production:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=http://localhost:8080

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

## Useful Commands

```bash
# View logs
docker-compose logs -f app

# Stop containers
docker-compose down

# Stop and remove volumes
docker-compose down -v

# Rebuild containers
docker-compose up -d --build --force-recreate

# Execute artisan commands
docker-compose exec app php artisan [command]

# Access container shell
docker-compose exec app bash

# Access MySQL
docker-compose exec db mysql -ularavel -psecret laravel
```

## Production Deployment

For production deployment on a VPS or cloud server:

1. **Copy files to server**
2. **Set environment variables** in `.env`
3. **Build and run**: `docker-compose up -d --build`
4. **Run migrations**: `docker-compose exec app php artisan migrate --force`
5. **Optimize**: `docker-compose exec app php artisan optimize`

## Troubleshooting

### Permission Issues
```bash
docker-compose exec app chown -R www-data:www-data /var/www/html/storage
docker-compose exec app chmod -R 755 /var/www/html/storage
```

### Clear Cache
```bash
docker-compose exec app php artisan optimize:clear
```

### Rebuild Everything
```bash
docker-compose down -v
docker-compose up -d --build
```

## Port Configuration

If port 8080 is already in use, edit `docker-compose.yml`:
```yaml
ports:
  - "8081:80"  # Change 8080 to 8081 or any available port
```
