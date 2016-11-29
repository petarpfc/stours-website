# Site setup

Za instalaciju i pravilno funkcionisanje sajta instalirajte paket sledecim redosledom:

1. Chekout nove laravel 5.2 aplikacije
2. Podesiti writable permission "bootstrap" i "storage" foldera
3. Instalirajte paket komandom "composer require software-tours/site"
4. U config\app dodati provajdera "Softwaretours\Site\Providers\SiteServiceProvider::class,"
5. U ".env" fajl dodati
   "ACCOUNT_ID = 7 
   API_URL = http://localhost/software-tours-app/public_html/api"
6. Publishujte assets sa komandom "php artisan vendor:publish" (kreira sadrzaj st-assets foldera za sajt)
7. Podesiti writable permission novokreiranog "st-assets" foldera