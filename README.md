# Garis Kemiskinan, Jumlah dan Persentase Penduduk Tidak Miskin Menurut Kabupaten/Kota

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/indeks-ketimpangan-regional/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/indeks-ketimpangan-regional/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/indeks-ketimpangan-regional/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/indeks-ketimpangan-regional/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/indeks-ketimpangan-regional/v/stable)](https://packagist.org/packages/bantenprov/indeks-ketimpangan-regional)
[![Total Downloads](https://poser.pugx.org/bantenprov/indeks-ketimpangan-regional/downloads)](https://packagist.org/packages/bantenprov/indeks-ketimpangan-regional)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/indeks-ketimpangan-regional/v/unstable)](https://packagist.org/packages/bantenprov/indeks-ketimpangan-regional)
[![License](https://poser.pugx.org/bantenprov/indeks-ketimpangan-regional/license)](https://packagist.org/packages/bantenprov/indeks-ketimpangan-regional)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/indeks-ketimpangan-regional/d/monthly)](https://packagist.org/packages/bantenprov/indeks-ketimpangan-regional)
[![Daily Downloads](https://poser.pugx.org/bantenprov/indeks-ketimpangan-regional/d/daily)](https://packagist.org/packages/bantenprov/indeks-ketimpangan-regional)

Garis Kemiskinan, Jumlah dan Persentase Penduduk Tidak Miskin Menurut Kabupaten/Kota

### Install via composer

- Development snapshot

```bash
$ composer require bantenprov/indeks-ketimpangan-regional:dev-master
```

- Latest release:

```bash
$ composer require bantenprov/indeks-ketimpangan-regional
```

### Download via github

```bash
$ git clone https://github.com/bantenprov/indeks-ketimpangan-regional.git
```

#### Edit `config/app.php` :

```php
'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\KetimpanganRegional\KetimpanganRegionalServiceProvider::class,
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=ketimpangan-regional-seeds
```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovKetimpanganRegionalSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=ketimpangan-regional-assets
$ php artisan vendor:publish --tag=ketimpangan-regional-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
         path: '/dashboard/ketimpangan-regional',
         components: {
            main: resolve => require(['./components/views/bantenprov/ketimpangan-regional/DashboardKetimpanganRegional.vue'], resolve),
            navbar: resolve => require(['./components/Navbar.vue'], resolve),
            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
          },
          meta: {
            title: "Indeks Ketimpangan Regional"
           }
       },
        //== ...
    ]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/ketimpangan-regional',
            components: {
                main: resolve => require(['./components/bantenprov/ketimpangan-regional/KetimpanganRegional.index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Indeks Ketimpangan Regional"
            }
        },
        {
            path: '/admin/ketimpangan-regional/create',
            components: {
                main: resolve => require(['./components/bantenprov/ketimpangan-regional/KetimpanganRegional.add.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Add Indeks Ketimpangan Regional"
            }
        },
        {
            path: '/admin/ketimpangan-regional/:id',
            components: {
                main: resolve => require(['./components/bantenprov/ketimpangan-regional/KetimpanganRegional.show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "View Indeks Ketimpangan Regional"
            }
        },
        //== ...
    ]
},
```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
        name: 'Indeks Ketimpangan Regional',
        link: '/dashboard/ketimpangan-regional',
        icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
        name: 'Indeks Ketimpangan Regional',
        link: '/admin/ketimpangan-regional',
        icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript
//== Indeks Ketimpangan Regional

import KetimpanganRegional from './components/bantenprov/ketimpangan-regional/KetimpanganRegional.chart.vue';
Vue.component('echarts-ketimpangan-regional', KetimpanganRegional);

import KetimpanganRegionalKota from './components/bantenprov/ketimpangan-regional/KetimpanganRegionalKota.chart.vue';
Vue.component('echarts-ketimpangan-regional-kota', KetimpanganRegionalKota);

import KetimpanganRegionalTahun from './components/bantenprov/ketimpangan-regional/KetimpanganRegionalTahun.chart.vue';
Vue.component('echarts-ketimpangan-regional-tahun', KetimpanganRegionalTahun);

import KetimpanganRegionalAdminShow from './components/bantenprov/ketimpangan-regional/KetimpanganRegionalAdmin.show.vue';
Vue.component('admin-view-ketimpangan-regional-tahun', KetimpanganRegionalAdminShow);

//== Echarts Group Egoverment

import KetimpanganRegionalBar01 from './components/views/bantenprov/ketimpangan-regional/KetimpanganRegionalBar01.vue';
Vue.component('ketimpangan-regional-bar-01', KetimpanganRegionalBar01);

import KetimpanganRegionalBar02 from './components/views/bantenprov/ketimpangan-regional/KetimpanganRegionalBar02.vue';
Vue.component('ketimpangan-regional-bar-02', KetimpanganRegionalBar02);

//== mini bar charts
import KetimpanganRegionalBar03 from './components/views/bantenprov/ketimpangan-regional/KetimpanganRegionalBar03.vue';
Vue.component('ketimpangan-regional-bar-03', KetimpanganRegionalBar03);

import KetimpanganRegionalPie01 from './components/views/bantenprov/ketimpangan-regional/KetimpanganRegionalPie01.vue';
Vue.component('ketimpangan-regional-pie-01', KetimpanganRegionalPie01);

import KetimpanganRegionalPie02 from './components/views/bantenprov/ketimpangan-regional/KetimpanganRegionalPie02.vue';
Vue.component('ketimpangan-regional-pie-02', KetimpanganRegionalPie02);

//== mini pie charts
import KetimpanganRegionalPie03 from './components/views/bantenprov/ketimpangan-regional/KetimpanganRegionalPie03.vue';
Vue.component('ketimpangan-regional-pie-03', KetimpanganRegionalPie03);
```
