# iGameShop
### Sobre

Tienda en línea de venta de videojuegos y aparatos de entretenimieto, creada en Laravel con Livewire.
- Gestiona categorías
- Gestiona productos
- Gestiona pedidos
- Sistema de usuarios (login/register/logout)
- Verificación de email al registrarse

### Usuario Admin de prueba
Al ejecutar los seeders se crearán productos, categorías y un usuario administrador.
Correo: admin@test.com
Contraseña: password

### Comandos realizados
Estos son los comandos que se realizaron durante el desarrollo del proyecto:

**LARAVEL SETUP**
> composer create-project laravel/laravel web-eshop
> cd web-eshop
> composer require livewire/livewire
> composer require laravel/jetstream
> composer require hardevine/shoppingcart
> php artisan jetstream:install livewire
> npm install
> npm run dev

**DATABASE SETUP**
> mysql -u root -p
mysql> create database web_eshop;

**LARAVEL .ENV DB**
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_eshop
DB_USERNAME=root
DB_PASSWORD=

**LARAVEL EN ESPAÑOL **
> composer require laraveles/spanish
> php artisan vendor:publish --tag=lang
cambiar en config/app.php
 -> 'locale' => 'es'

**COMANDOS ARTISAN REALIZADOS EN EL PROYECTO**
> php artisan migrate
> php artisan make:livewire Index
> php artisan make:livewire Shop
> php artisan make:livewire Cart
> php artisan make:livewire CartCounter
> php artisan make:livewire Checkout
> php artisan make:middleware AdminAuthenticate
> php artisan make:livewire AdminDashboard
> php artisan make:livewire UserDashboard
> php artisan make:model Category -m
> php artisan make:model Product -m
> php artisan make:factory CategoryFactory --model=Category
> php artisan make:factory ProductFactory --model=Product
> php artisan make:seeder CategorySeeder
> php artisan make:seeder ProductSeeder
> php artisan db:seed
> php artisan make:livewire ProductDetail
> php artisan vendor:publish --provider="Gloudeman\ShoppingcartServiceProvider" --tag="config"
> php artisan make:livewire adm/AdminCategory
> php artisan make:livewire adm/AdminAddCategory
> php artisan make:livewire adm/AdminEditCategory
> php artisan make:livewire adm/AdminProduct
> php artisan make:livewire adm/AdminAddProduct
> php artisan make:livewire adm/AdminEditProduct
> php artisan make:model Order -m
> php artisan make:model OrderProduct -m
> php artisan make:model Shipping -m
> php artisan make:model Transaction -m
> php artisan make:livewire OrderFinished
> php artisan make:livewire adm/AdminOrder
> php artisan make:livewire adm/AdminShowOrder
> php artisan make:livewire user/UserOrder
> php artisan make:livewire user/UserShowOrder
> php artisan make:migration add_order_table_canceled_date
> php artisan make:seeder UserSeeder
