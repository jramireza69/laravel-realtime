@servers(['aws' => '-i ~/blog.pem ubuntu@18.218.231.44'])


@include('vendor/autoload.php')


@setup

$origin = 'git@github.com:jramireza69/laravel-realtime';
$branch = isset($branch)? $branch : 'master';
$app_dir = '/var/www/html';

if (!isset($on)){
	throw new Exception('La variable --on no esta definida');
}

@endsetup

@macro('app:deploy', ['on' => $on])

    down
    git:pull
    migrate
    composer:install
    assets:install
    cache:clear
    up


@endmacro

@task('git:clone', ['on' => $on])

    cd {{$app_dir}}
    echo "Hemos entrado al directorio var/www/html";
    git clone {{$origin}};
    echo "Repositorio clonado correctamente";
@endtask

@task('git:pull', ['on' => $on])

    cd {{$app_dir}}
    echo "Hemos entrado al directorio {{$app_dir}}";
    git pull origin {{ $branch }};
    echo "Codigo actualizado correctamente";
@endtask

@task('composer:install', ['on' => $on])

   cd {{$app_dir}}

   composer install
@endtask

@task('key:generate', ['on' => $on])

   cd {{$app_dir}}
   php artisan key:generate

   
@endtask

@task('migrate', ['on' => $on])

   cd {{$app_dir}}
   php artisan migrate

   
@endtask

@task('migrate1', ['on' => $on])

   cd {{$app_dir}}
   php artisan migrate:fresh --seed

   
@endtask


@task('ls', ['on' => $on])

   cd {{$app_dir}}
   ls -la

   
@endtask


@task('assets:install', ['on' => $on])

   cd {{$app_dir}}
  yarn install

   
@endtask

@task('down', ['on' => $on])
  cd {{$app_dir}}
    php artisan down  
@endtask

@task('up', ['on' => $on])
  cd {{$app_dir}}
    php artisan up  
@endtask

@task('cache:clear', ['on' => $on])

   cd {{$app_dir}}
    php artisan  cache:clear
    php artisan  view:clear
    php artisan  config:clear
    echo "Cache limpiada correctamente";


   
@endtask



                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        