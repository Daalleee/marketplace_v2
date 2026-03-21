<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada user dan kategori terlebih dahulu
        if (User::count() == 0 || Category::count() == 0) {
            $this->command->error('Harap buat user dan kategori terlebih dahulu sebelum menjalankan seeder produk');
            return;
        }

        $users = User::all();
        $categories = Category::all();

        $products = [
            // Elektronik
            [
                'name' => 'iPhone 14 Pro Max 256GB',
                'price' => 21999000,
                'condition' => 'baru',
                'description' => 'iPhone 14 Pro Max dengan kapasitas 256GB, garansi resmi iBox 1 tahun. Lengkap dengan aksesoris original dalam box.',
                'status' => 'available',
                'stock' => 5,
                'location' => 'Jakarta Pusat',
            ],
            [
                'name' => 'MacBook Air M2 2023',
                'price' => 18500000,
                'condition' => 'bekas_baik',
                'description' => 'MacBook Air M2 2023, RAM 8GB, SSD 256GB. Kondisi mulus 98%, jarang dipakai. Battery health 99%. Include original box dan charger.',
                'status' => 'available',
                'stock' => 2,
                'location' => 'Bandung',
            ],
            [
                'name' => 'Sony WH-1000XM5 Headphone',
                'price' => 4299000,
                'condition' => 'baru',
                'description' => 'Headphone noise cancelling terbaik dari Sony. Garansi resmi 1 tahun. Warna hitam elegan, nyaman dipakai seharian.',
                'status' => 'available',
                'stock' => 10,
                'location' => 'Surabaya',
            ],
            [
                'name' => 'iPad Pro 11 inch M1',
                'price' => 12000000,
                'condition' => 'bekas_baik',
                'description' => 'iPad Pro 11 inch dengan chip M1, WiFi 128GB. Kondisi baik, layar jernih tanpa goresan. Magic Keyboard bisa terpisah.',
                'status' => 'available',
                'stock' => 3,
                'location' => 'Jakarta Selatan',
            ],
            [
                'name' => 'Samsung Galaxy S23 Ultra',
                'price' => 16999000,
                'condition' => 'baru',
                'description' => 'Flagship Samsung dengan S-Pen, kamera 200MP, RAM 12GB, Storage 512GB. Garansi resmi SEIN 2 tahun.',
                'status' => 'available',
                'stock' => 7,
                'location' => 'Tangerang',
            ],
            [
                'name' => 'Apple Watch Ultra 49mm',
                'price' => 13500000,
                'condition' => 'bekas_baik',
                'description' => 'Apple Watch Ultra untuk petualang, titanium case, ocean band. Kondisi seperti baru, pemakaian 3 bulan.',
                'status' => 'available',
                'stock' => 2,
                'location' => 'Bekasi',
            ],
            [
                'name' => 'PlayStation 5 Slim Digital',
                'price' => 6500000,
                'condition' => 'baru',
                'description' => 'PS5 Slim Digital Edition, tanpa disc drive. Bisa download game langsung dari PSN. Garansi resmi Sony Indonesia.',
                'status' => 'available',
                'stock' => 4,
                'location' => 'Medan',
            ],
            [
                'name' => 'Canon EOS R6 Mark II Body',
                'price' => 38000000,
                'condition' => 'bekas_baik',
                'description' => 'Kamera mirrorless full-frame profesional. Shutter count masih rendah 5000x. Lengkap dengan dus, strap, dan charger original.',
                'status' => 'available',
                'stock' => 1,
                'location' => 'Yogyakarta',
            ],
            [
                'name' => 'AirPods Pro 2nd Gen USB-C',
                'price' => 3499000,
                'condition' => 'baru',
                'description' => 'TWS dengan ANC terbaik di kelasnya. Case USB-C, adaptive transparency, personalized spatial audio.',
                'status' => 'available',
                'stock' => 15,
                'location' => 'Semarang',
            ],
            [
                'name' => 'DJI Mini 4 Pro Fly More',
                'price' => 14500000,
                'condition' => 'baru',
                'description' => 'Drone ringan dengan kamera 4K HDR, obstacle sensing 360 derajat. Paket Fly More dengan 3 baterai dan charging hub.',
                'status' => 'available',
                'stock' => 3,
                'location' => 'Makassar',
            ],

            // Fashion
            [
                'name' => 'Nike Air Jordan 1 Retro High OG',
                'price' => 2899000,
                'condition' => 'baru',
                'description' => 'Sneakers ikonik dengan warna Chicago Lost & Found. Kulit premium, kondisi 100% original dengan box dan accessories.',
                'status' => 'available',
                'stock' => 8,
                'location' => 'Jakarta Barat',
            ],
            [
                'name' => 'Tas Eiger Original',
                'price' => 450000,
                'condition' => 'bekas_baik',
                'description' => 'Tas gunung original Eiger, kapasitas 40L. Kondisi baik, tidak ada sobekan. Cocok untuk hiking dan camping.',
                'status' => 'available',
                'stock' => 5,
                'location' => 'Malang',
            ],
            [
                'name' => 'Jaket Denim Levi\'s 501',
                'price' => 850000,
                'condition' => 'bekas_baik',
                'description' => 'Jaket denim klasik Levi\'s 501, ukuran L. Warna vintage fade alami, kondisi terawat tanpa bolong.',
                'status' => 'available',
                'stock' => 3,
                'location' => 'Bandung',
            ],
            [
                'name' => 'Jam Tangan Seiko 5 Sports',
                'price' => 2100000,
                'condition' => 'baru',
                'description' => 'Jam tangan automatic Seiko 5 Sports, movement 4R36, water resistant 100m. Garansi internasional 3 tahun.',
                'status' => 'available',
                'stock' => 6,
                'location' => 'Surabaya',
            ],
            [
                'name' => 'Kacamata Ray-Ban Aviator',
                'price' => 1850000,
                'condition' => 'bekas_baik',
                'description' => 'Kacamata hitam klasik Ray-Ban Aviator, lensa polarized. Frame gold, kondisi mulus dengan case original.',
                'status' => 'available',
                'stock' => 4,
                'location' => 'Denpasar',
            ],
            [
                'name' => 'Sepatu Converse Chuck 70s High',
                'price' => 1200000,
                'condition' => 'bekas_sedang',
                'description' => 'Converse Chuck 70s High warna hitam, ukuran 42. Kondisi masih bagus, sol masih tebal. Dipakai beberapa kali saja.',
                'status' => 'available',
                'stock' => 2,
                'location' => 'Palembang',
            ],
            [
                'name' => 'Gentong Kulit Original',
                'price' => 350000,
                'condition' => 'baru',
                'description' => 'Dompet kulit asli sapi, handmade oleh pengrajin lokal. Desain slim, banyak slot kartu. Garansi kulit 1 tahun.',
                'status' => 'available',
                'stock' => 20,
                'location' => 'Garut',
            ],

            // Rumah Tangga
            [
                'name' => 'Robot Vacuum Xiaomi X10',
                'price' => 4999000,
                'condition' => 'baru',
                'description' => 'Robot vacuum dengan auto empty station, navigasi laser, daya hisap 4000Pa. Bisa pel sekaligus vacuum.',
                'status' => 'available',
                'stock' => 5,
                'location' => 'Jakarta Utara',
            ],
            [
                'name' => 'Kursi Gaming Secretlab Titan',
                'price' => 6500000,
                'condition' => 'bekas_baik',
                'description' => 'Kursi gaming premium Secretlab Titan Evo 2022, ukuran regular. Material SoftWeave, 4D armrest, lumbar support.',
                'status' => 'available',
                'stock' => 2,
                'location' => 'Bogor',
            ],
            [
                'name' => 'Lampu Philips Hue Starter Kit',
                'price' => 2800000,
                'condition' => 'baru',
                'description' => 'Smart lighting Philips Hue dengan 4 lampu warna + bridge. Kontrol via app, bisa voice control Alexa/Google.',
                'status' => 'available',
                'stock' => 8,
                'location' => 'Tangerang Selatan',
            ],
            [
                'name' => 'Meja Kerja Minimalis',
                'price' => 750000,
                'condition' => 'bekas_baik',
                'description' => 'Meja kerja kayu minimalis ukuran 100x50cm. Kokoh, ada laci. Cocok untuk WFH. Bisa antar area Jabodetabek.',
                'status' => 'available',
                'stock' => 3,
                'location' => 'Depok',
            ],
            [
                'name' => 'Air Purifier Sharp FP-J80Y',
                'price' => 3200000,
                'condition' => 'bekas_baik',
                'description' => 'Pembersih udara Sharp dengan Plasmacluster, cocok untuk ruangan besar 62m². Filter masih baru, performa optimal.',
                'status' => 'available',
                'stock' => 2,
                'location' => 'Cikarang',
            ],
            [
                'name' => 'Kompor Listrik Philips',
                'price' => 650000,
                'condition' => 'baru',
                'description' => 'Kompor listrik 2 tungku, hemat energi, aman tanpa api. Cocok untuk apartemen dan kos. Garansi resmi 1 tahun.',
                'status' => 'available',
                'stock' => 12,
                'location' => 'Jakarta Timur',
            ],

            // Hobi & Koleksi
            [
                'name' => 'Lego Millennium Falcon UCS',
                'price' => 9500000,
                'condition' => 'baru',
                'description' => 'Lego Star Wars UCS Millennium Falcon 75192, 7541 pieces. Segel masih utuh, collector item yang langka.',
                'status' => 'available',
                'stock' => 1,
                'location' => 'Jakarta Pusat',
            ],
            [
                'name' => 'Gitar Fender Player Stratocaster',
                'price' => 11000000,
                'condition' => 'bekas_baik',
                'description' => 'Gitar listrik Fender Player Stratocaster, made in Mexico. Warna sunburst, kondisi prima. Include softcase dan strap.',
                'status' => 'available',
                'stock' => 1,
                'location' => 'Bandung',
            ],
            [
                'name' => 'Board Game Catan Collector\'s Edition',
                'price' => 1200000,
                'condition' => 'baru',
                'description' => 'Board game Catan edisi collector dengan komponen premium kayu. Lengkap dan segel. Cocok untuk hadiah.',
                'status' => 'available',
                'stock' => 4,
                'location' => 'Surabaya',
            ],
            [
                'name' => 'Action Figure Nendoroid Spider-Man',
                'price' => 650000,
                'condition' => 'baru',
                'description' => 'Nendoroid Spider-Man Into the Spider-Verse. Poseable, lengkap dengan accessories dan face plates. Good Smile Company.',
                'status' => 'available',
                'stock' => 6,
                'location' => 'Medan',
            ],
            [
                'name' => 'Vinyl Record Taylor Swift 1989',
                'price' => 850000,
                'condition' => 'baru',
                'description' => 'Vinil Taylor Swift 1989 Taylor\'s Version, limited edition blue vinyl. Masih segel, kondisi mint.',
                'status' => 'available',
                'stock' => 3,
                'location' => 'Yogyakarta',
            ],
            [
                'name' => 'Sepatu Futsal Specs Accelerator',
                'price' => 380000,
                'condition' => 'bekas_sedang',
                'description' => 'Sepatu futsal Specs Accelerator Lightspeed, ukuran 43. Kondisi masih layak pakai, sol masih ada grip.',
                'status' => 'available',
                'stock' => 1,
                'location' => 'Makassar',
            ],
        ];

        foreach ($products as $product) {
            $product['user_id'] = $users->random()->id;
            $product['category_id'] = $categories->random()->id;
            Product::create($product);
        }

        $this->command->info('Berhasil membuat ' . count($products) . ' produk dummy!');
    }
}
