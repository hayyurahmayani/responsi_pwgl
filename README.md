# Responsi PG: Web Lanjut
>**Produk Responsi**
![Logo Aplikasi](disiar.png)





**DISIAR**

Disaster in Indonesian Archipelago (DISIAR) adalah sebuah sistem informasi geografis sederhana berbasis website yang menyediakan informasi terkait beberapa bencana alam pada peta interaktif berupa gempa bumi. Informasi di dalam peta juga disertai dengan garis sesar dan area megathrust. Data, informasi, dan arahan penggunaan terletak pada Dashboard yang dapat dibuka setelah autentikasi dilakukan. Ketika telah dilakukan autentikasi, maka pengguna dapat menambahkan data terkait gempa bumi pada muka peta. Pengguna juga dapat melakukan algoritma CRUD pada data gempa bumi tersebut.







>**Komponen Pembangun**

> Leaflet JS

Website dibangun menggunakan **Leaflet JS** untuk menampilkan basemap peta dasar yang interaktif. Leaflet JS dapat digunakan dengan memasukkan pustaka JavaScript dan style CSS.

>Database PostgreSQL

**PostgreSQL** digunakan sebagai sistem manajemen basis data relasional untuk menyimpan dan mengelola data dengan lebih fleksibel. PostgreSQL memiliki ektensi **PostGIS** yang dapat mendeteksi koordinat, sehingga mendukung penyimpanan data spasial, yaitu lokasi kegempaan, garis sesar, dan juga area megathrust. Database yang dari website yang disimpan dalam PostgreSQL kemudian dapat diintegrasikan dengan **QGIS** guna melakukan proses pengolahan data yang lebih terstruktur dengan fitur-fitur pemetaan.

>Geoserver

**Geoserver** adalah server open-source yang dapat menyimpan dan membagi data spasial. Dalam proyek website ini, Geoserver digunakan untuk menyajikan data spasial dari database yang kemudian dapat diintegrasikan pula menggunakan alamat GeoJSON ke dalam **QGIS**.

>Bootstrap: Layout

**Bootstrap** digunakan untuk merancang layout aplikasi yang responsif, fleksibel, dan mudah digunakan pengguna dengan tampilan yang menarik.

>FontAwesome: Ikon

**FontAwesome** digunakan untuk menambahkan ikon untuk mempercantik fitur yang ada.






>**Sumber Data**
**Sumber Data** aplikasi ini berasal dari berbagai penyedia informasi:

>Gambar:

1.[Padar Island](https://helloflores.com/explore/padar-island)

2.Berbagai gambar dari hasil pencarian melalui peramban: Google Chrome

>Data

1.[Sesar](https://jejakfakta.com/read/319/mengenal-10-sesar-aktif-di-indonesia-dari-sumatera-hingga-papua)

2.[Megathrust](https://www.cnnindonesia.com/teknologi/20230810083243-202-984183/infografis-indonesia-dikepung-13-megathrust?zoom_infografis)

3.Data titik kegempaan berasal dari berbagai berita dan WikiPedia






>**Link Tampilan Website**

>Link: https://youtu.be/vSfhZvqjVuM?si=ES3aJPrlM5PElb04 






>**Tangkapan Layar Komponen Penting**

>![Tampilan peta umum](1.png)
*Tampilan peta umum*

>![Tampilan login](2.png)
*Tampilan login*

>![Tampilan dashboard 1](3.png)
*Tampilan dashboard Awal*

>![Tampilan dashboard 2](4.png)
*Tampilan instruksi*

>![Tampilan dashboard 3](5.png)
*Tampilan blade*

>![Tampilan dashboard 4](6.png)
*Tampilan total data*

>![Tampilan dashboard 5](7.png)
*Tampilan berita*

>![Tampilan dashboard 6](7.png)
*Tampilan footer*

>![Tampilan peta khusus 1](pop_mega.png)
>![Tampilan peta khusus 2](pop_quake.png)
>![Tampilan peta khusus 3](pop_fault.png)
*Tampilan pop-up peta khusus*

>![Tampilan tabel khusus 1](quake.png)
>![Tampilan tabel khusus 2](fault.png)
>![Tampilan tabel khusus 3](mega.png)
*Tampilan tabel data*

>![Tampilan modal](modal.png)
*Tampilan modal*

>![Tampilan basemap](basemap.png)
*Tampilan basemap*

>![Tampilan add 1](add.png)
>![Tampilan add 2](create_form.png)
>![Tampilan add 3](toast_add.png)
*Tampilan tambah data*

>![Tampilan update 1](edit_pertama.png)
>![Tampilan update 2](drag_edit.png)
>![Tampilan update 3](edit.png)
>![Tampilan update 4](toast_update.png)
*Tampilan hapus data*

>![Tampilan hapus 1](delete1.png)
>![Tampilan hapus 2](delete2.png)
*Tampilan edit data*

>**Motivasi diri:** *Nothing is out of reach*
