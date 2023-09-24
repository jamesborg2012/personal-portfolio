#Starting from root directory of project

#Bring down the website with a maintenance page
php artisan down || true

#Add SSL keys to use GIT
eval `ssh-agent`
ssh-add /home/ubuntu/.ssh/git_rsa

#Pull latest code from GIT
git fetch
git pull origin master

#Update Composer libraries
composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader

# Run database migrations
php artisan migrate --force

# Clear caches
php artisan cache:clear

# Clear expired password reset tokens
php artisan auth:clear-resets

# Clear and cache routes
php artisan route:cache

# Clear and cache config
php artisan config:cache

# Clear and cache views
php artisan view:cache

#Install NPM libraries
npm install

#Run NPM libraries like Vite
sudo npm run production --silent
sudo npm run build --slient

#Enable Laravel
php artisan up
