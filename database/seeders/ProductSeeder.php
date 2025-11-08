<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductSpecification;
use App\Models\ProductDownload;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
         
        // Create Brands
        $brands = [
            ['name' => 'Heidelberg', 'photo' => 'brands/heidelberg.png'],
            ['name' => 'Kyocera', 'photo' => 'brands/kyocera.png'],
            ['name' => 'Fujifilm', 'photo' => 'brands/fujifilm.png'],
            ['name' => 'Amsky', 'photo' => 'brands/amsky.png'],
            ['name' => 'PrintMaster', 'photo' => 'brands/printmaster.png'],
            ['name' => 'Roland', 'photo' => 'brands/roland.png'],
            ['name' => 'Epson', 'photo' => 'brands/epson.png'],
        ];

        foreach ($brands as $brandData) {
            Brand::create($brandData);
        }

        // Create Main Categories
        $categories = [
            [
                'name_en' => 'Pre Press',
                'name_ar' => 'ما قبل الطباعة',
                'slug' => 'pre-press',
                'parent_id' => null,
                'sort_order' => 1,
            ],
            [
                'name_en' => 'Digital Production',
                'name_ar' => 'الإنتاج الرقمي',
                'slug' => 'digital-production',
                'parent_id' => null,
                'sort_order' => 2,
            ],
            [
                'name_en' => 'Sign and Graphic',
                'name_ar' => 'اللافتات والجرافيك',
                'slug' => 'sign-graphic',
                'parent_id' => null,
                'sort_order' => 3,
            ],
            [
                'name_en' => 'Laser',
                'name_ar' => 'الليزر',
                'slug' => 'laser',
                'parent_id' => null,
                'sort_order' => 4,
            ],
            [
                'name_en' => 'Web Systems',
                'name_ar' => 'أنظمة الويب',
                'slug' => 'web-systems',
                'parent_id' => null,
                'sort_order' => 5,
            ],
            [
                'name_en' => 'Finishing Machine',
                'name_ar' => 'آلات التشطيب',
                'slug' => 'finishing-machine',
                'parent_id' => null,
                'sort_order' => 6,
            ],
        ];

        foreach ($categories as $catData) {
            Category::create($catData);
        }

        // Create Subcategories for Digital Production
        $digitalProd = Category::where('slug', 'digital-production')->first();
        
        $subcategories = [
            [
                'name_en' => 'Offset',
                'name_ar' => 'أوفست',
                'slug' => 'offset',
                'parent_id' => $digitalProd->id,
                'sort_order' => 1,
            ],
            [
                'name_en' => 'Computer to Plate',
                'name_ar' => 'الكمبيوتر إلى اللوحة',
                'slug' => 'computer-to-plate',
                'parent_id' => $digitalProd->id,
                'sort_order' => 2,
            ],
            [
                'name_en' => 'Digital',
                'name_ar' => 'رقمي',
                'slug' => 'digital',
                'parent_id' => $digitalProd->id,
                'sort_order' => 3,
            ],
        ];

        foreach ($subcategories as $subData) {
            Category::create($subData);
        }

        // Sample Products
        $this->createSampleProducts();
    }

    private function createSampleProducts()
    {
        $heidelbergBrand = Brand::where('name', 'Heidelberg')->first();
        $kyoceraBrand = Brand::where('name', 'Kyocera')->first();
        $printMasterBrand = Brand::where('name', 'PrintMaster')->first();
        
        $prepressCategory = Category::where('slug', 'pre-press')->first();
        $digitalCategory = Category::where('slug', 'digital-production')->first();
        $offsetSubcategory = Category::where('slug', 'offset')->first();
        
        // Product 1: 720HP Hydraulic Guillotine
        $product1 = Product::create([
            'name_en' => '720HP Hydraulic Guillotine',
            'name_ar' => 'المقصلة الهيدروليكية 720HP',
            'slug' => '720hp-hydraulic-guillotine',
            'subtitle_en' => 'High-performance hydraulic paper cutting machine',
            'subtitle_ar' => 'آلة قص ورق هيدروليكية عالية الأداء',
            'description_en' => 'Professional hydraulic guillotine for precise paper cutting with advanced safety features.',
            'description_ar' => 'مقصلة هيدروليكية احترافية لقص الورق بدقة مع ميزات أمان متقدمة.',
            'model' => '720HP',
            'main_image' => 'products/720hp-main.jpg',
            'thumbnail' => 'products/720hp-thumb.jpg',
            'price' => null,
            'show_price' => false,
            'category_id' => $prepressCategory->id,
            'brand_id' => $heidelbergBrand->id,
            'sort_order' => 1,
            'is_featured' => true,
            'is_active' => true,
        ]);

        // Add features for product 1
        $features1 = [
            ['feature_en' => 'Cutting width up to 720mm', 'feature_ar' => 'عرض القطع يصل إلى 720 مم'],
            ['feature_en' => 'Hydraulic clamp pressure', 'feature_ar' => 'ضغط المشبك الهيدروليكي'],
            ['feature_en' => 'Programmable back gauge', 'feature_ar' => 'مقياس خلفي قابل للبرمجة'],
            ['feature_en' => 'Safety light curtain', 'feature_ar' => 'ستارة ضوئية للسلامة'],
        ];

        foreach ($features1 as $index => $feature) {
            ProductFeature::create([
                'product_id' => $product1->id,
                'feature_en' => $feature['feature_en'],
                'feature_ar' => $feature['feature_ar'],
                'sort_order' => $index + 1,
            ]);
        }

        // Product 2: 8305 Paper Folder
        $product2 = Product::create([
            'name_en' => '8305 Paper Folder',
            'name_ar' => 'آلة طي الورق 8305',
            'slug' => '8305-paper-folder',
            'subtitle_en' => 'Versatile eco-solvent printer for indoor/outdoor graphics',
            'subtitle_ar' => 'طابعة صديقة للبيئة متعددة الاستخدامات للرسومات الداخلية والخارجية',
            'description_en' => 'Advanced paper folding machine with multiple folding patterns and high-speed operation.',
            'description_ar' => 'آلة طي ورق متقدمة مع أنماط طي متعددة وتشغيل عالي السرعة.',
            'model' => '8305',
            'main_image' => 'products/8305-main.jpg',
            'thumbnail' => 'products/8305-thumb.jpg',
            'price' => null,
            'show_price' => false,
            'category_id' => $digitalCategory->id,
            'brand_id' => $printMasterBrand->id,
            'sort_order' => 2,
            'is_featured' => true,
            'is_active' => true,
        ]);

        // Add features for product 2
        $features2 = [
            ['feature_en' => '8-color ink system for expanded gamut', 'feature_ar' => 'نظام حبر 8 ألوان لنطاق موسع'],
            ['feature_en' => 'Energy-efficient heating system', 'feature_ar' => 'نظام تدفئة موفر للطاقة'],
            ['feature_en' => 'Media tracking sensors', 'feature_ar' => 'مستشعرات تتبع الوسائط'],
            ['feature_en' => 'Low odor inks', 'feature_ar' => 'أحبار منخفضة الرائحة'],
        ];

        foreach ($features2 as $index => $feature) {
            ProductFeature::create([
                'product_id' => $product2->id,
                'feature_en' => $feature['feature_en'],
                'feature_ar' => $feature['feature_ar'],
                'sort_order' => $index + 1,
            ]);
        }

        // Add specifications for product 2
        $specs = [
            ['label_en' => 'Model', 'label_ar' => 'الموديل', 'value_en' => '8305 Paper Folder', 'value_ar' => 'آلة طي الورق 8305'],
            ['label_en' => 'Category', 'label_ar' => 'الفئة', 'value_en' => 'Eco-Solvent Printer', 'value_ar' => 'طابعة صديقة للبيئة'],
            ['label_en' => 'Brand', 'label_ar' => 'العلامة التجارية', 'value_en' => 'PrintMaster', 'value_ar' => 'برينت ماستر'],
            ['label_en' => 'Print Width', 'label_ar' => 'عرض الطباعة', 'value_en' => '3.2m', 'value_ar' => '3.2 متر'],
            ['label_en' => 'Print Speed', 'label_ar' => 'سرعة الطباعة', 'value_en' => '80 m²/hr', 'value_ar' => '80 متر مربع/ساعة'],
            ['label_en' => 'Technology', 'label_ar' => 'التقنية', 'value_en' => 'Eco-Solvent', 'value_ar' => 'صديقة للبيئة'],
            ['label_en' => 'Resolution', 'label_ar' => 'الدقة', 'value_en' => '1440 dpi', 'value_ar' => '1440 نقطة'],
            ['label_en' => 'Automation', 'label_ar' => 'الأتمتة', 'value_en' => 'Take-up reel', 'value_ar' => 'بكرة الالتقاط'],
        ];

        foreach ($specs as $index => $spec) {
            ProductSpecification::create([
                'product_id' => $product2->id,
                'label_en' => $spec['label_en'],
                'label_ar' => $spec['label_ar'],
                'value_en' => $spec['value_en'],
                'value_ar' => $spec['value_ar'],
                'sort_order' => $index + 1,
            ]);
        }

        // Add downloads for product 2
        ProductDownload::create([
            'product_id' => $product2->id,
            'title_en' => 'Product Catalog',
            'title_ar' => 'كتالوج المنتج',
            'file_path' => 'downloads/8305-catalog.pdf',
            'file_type' => 'PDF',
            'file_size' => '3.1 MB',
            'updated_date' => '2025-08-01',
            'sort_order' => 1,
        ]);

        ProductDownload::create([
            'product_id' => $product2->id,
            'title_en' => 'Print Master Guide',
            'title_ar' => 'دليل الطباعة الرئيسي',
            'file_path' => 'downloads/print-master-guide.pdf',
            'file_type' => 'PDF',
            'file_size' => '950 KB',
            'updated_date' => '2025-08-01',
            'sort_order' => 2,
        ]);

        // Add more sample products
        $this->createAdditionalProducts($prepressCategory, $heidelbergBrand);
        $this->createAdditionalProducts($offsetSubcategory, $kyoceraBrand);
    }

    private function createAdditionalProducts($category, $brand)
    {
        $products = [
            [
                'name_en' => '520HP Hydraulic Guillotine',
                'name_ar' => 'المقصلة الهيدروليكية 520HP',
                'model' => '520HP',
            ],
            [
                'name_en' => '310M Paper Cutter',
                'name_ar' => 'قاطع الورق 310M',
                'model' => '310M',
            ],
            [
                'name_en' => '430M Manual Guillotine',
                'name_ar' => 'المقصلة اليدوية 430M',
                'model' => '430M',
            ],
        ];

        foreach ($products as $index => $productData) {
            Product::create([
                'name_en' => $productData['name_en'],
                'name_ar' => $productData['name_ar'],
                'slug' => Str::slug($productData['name_en']) . '-' . Str::slug($category->name_en) . '-' . Str::slug($brand->name),
                'subtitle_en' => 'Professional printing equipment',
                'subtitle_ar' => 'معدات طباعة احترافية',
                'model' => $productData['model'],
                'main_image' => 'products/default.jpg',
                'thumbnail' => 'products/default-thumb.jpg',
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'sort_order' => $index + 10,
                'is_active' => true,
            ]);
        }
    }
}