#!/bin/bash

# Script Setup untuk Aapanel
# Jalankan script ini setelah upload files ke server
# chmod +x setup-aapanel.sh
# ./setup-aapanel.sh

echo "=========================================="
echo "Setup Laravel untuk Aapanel"
echo "=========================================="

# Warna untuk output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check jika dijalankan sebagai root atau dengan sudo
if [ "$EUID" -eq 0 ]; then 
    echo -e "${YELLOW}Warning: Running as root. Some commands may need to run as www user.${NC}"
fi

# Get current directory
PROJECT_DIR=$(pwd)
echo -e "${GREEN}Project directory: $PROJECT_DIR${NC}"

# Check if .env exists
if [ ! -f .env ]; then
    echo -e "${YELLOW}Creating .env file from .env.example...${NC}"
    if [ -f .env.example ]; then
        cp .env.example .env
        echo -e "${GREEN}.env file created${NC}"
        echo -e "${RED}Please edit .env file and configure your database settings!${NC}"
        echo "Press Enter to continue after editing .env file..."
        read
    else
        echo -e "${RED}Error: .env.example file not found!${NC}"
        exit 1
    fi
else
    echo -e "${GREEN}.env file already exists${NC}"
fi

# Install Composer dependencies
echo -e "${YELLOW}Installing Composer dependencies...${NC}"
if command -v composer &> /dev/null; then
    composer install --optimize-autoloader --no-dev
    echo -e "${GREEN}Composer dependencies installed${NC}"
else
    echo -e "${RED}Error: Composer not found! Please install Composer first.${NC}"
    exit 1
fi

# Generate application key
echo -e "${YELLOW}Generating application key...${NC}"
php artisan key:generate --force
echo -e "${GREEN}Application key generated${NC}"

# Set permissions
echo -e "${YELLOW}Setting permissions...${NC}"
chmod -R 755 storage bootstrap/cache
chown -R www:www storage bootstrap/cache 2>/dev/null || chown -R www-data:www-data storage bootstrap/cache 2>/dev/null
echo -e "${GREEN}Permissions set${NC}"

# Create storage link
echo -e "${YELLOW}Creating storage symlink...${NC}"
php artisan storage:link
echo -e "${GREEN}Storage symlink created${NC}"

# Run migrations (optional - uncomment if needed)
# echo -e "${YELLOW}Running database migrations...${NC}"
# php artisan migrate --force
# echo -e "${GREEN}Migrations completed${NC}"

# Install NPM dependencies and build
echo -e "${YELLOW}Installing NPM dependencies...${NC}"
if command -v npm &> /dev/null; then
    npm install
    echo -e "${YELLOW}Building assets...${NC}"
    npm run build
    echo -e "${GREEN}Assets built${NC}"
else
    echo -e "${YELLOW}Warning: NPM not found. Skipping asset build.${NC}"
    echo -e "${YELLOW}Please run 'npm install && npm run build' manually.${NC}"
fi

# Clear and cache config
echo -e "${YELLOW}Clearing and caching configuration...${NC}"
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

php artisan config:cache
php artisan route:cache
php artisan view:cache
echo -e "${GREEN}Configuration cached${NC}"

echo ""
echo -e "${GREEN}=========================================="
echo "Setup completed successfully!"
echo "==========================================${NC}"
echo ""
echo "Next steps:"
echo "1. Edit .env file and configure your database"
echo "2. Run: php artisan migrate --force"
echo "3. Configure your web server (Nginx/Apache)"
echo "4. Setup SSL certificate in Aapanel (optional)"
echo "5. Setup cron job in Aapanel"
echo ""
echo "For more details, see DEPLOY_AAPANEL.md"
