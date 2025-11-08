<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consumable;
use App\Models\ConsumableProduct;

class ConsumableSeeder extends Seeder
{
    public function run()
    {
        // HD Saphira
        $hdSaphira = Consumable::create([
            'photo' => 'consumables/hd-saphira-logo.png',
            'name_en' => 'HD Saphira',
            'name_ar' => 'HD سافيرا',
            'description_en' => 'Other variants like Saphira 80x or 80c use a "medium ground surface finish" intended to balance ink lay–down and dot sharpness. The Blanket Premier version is a conventional offset blanket of thickness ~1.96 mm, 4 layers, with excellent release and dot sharpness.',
            'description_ar' => 'المتغيرات الأخرى مثل Saphira 80x أو 80c تستخدم "تشطيب سطح أرضي متوسط" يهدف إلى موازنة وضع الحبر وحدة النقطة. نسخة Blanket Premier هي بطانية أوفست تقليدية بسمك ~1.96 مم، 4 طبقات، مع إطلاق ممتاز وحدة نقطة.',
            'key_features_en' => [
                'Thickness: Approx. 1.95 mm (nominal, per ISO 12636)',
                'Layers: 4 plies of fabric in the blanket\'s internal structure',
                'Elongation: < 0.70 % at 500 N / 50 mm',
                'Color (surface): Blue'
            ],
            'key_features_ar' => [
                'السماكة: تقريبًا 1.95 مم (اسمي، وفقًا لـ ISO 12636)',
                'الطبقات: 4 طبقات من القماش في الهيكل الداخلي للبطانية',
                'الاستطالة: < 0.70% عند 500 نيوتن / 50 مم',
                'اللون (السطح): أزرق'
            ],
            'order' => 1,
        ]);

        // Add products for HD Saphira
        ConsumableProduct::create([
            'photo' => 'consumables/products/prod1.png',
            'name_en' => '720HP Hydraulic Guillotine',
            'name_ar' => 'مقصلة هيدروليكية 720HP',
            'consumable_id' => $hdSaphira->id,
        ]);

        ConsumableProduct::create([
            'photo' => 'consumables/products/prod2.png',
            'name_en' => '520HP Hydraulic Guillotine',
            'name_ar' => 'مقصلة هيدروليكية 520HP',
            'consumable_id' => $hdSaphira->id,
        ]);

        ConsumableProduct::create([
            'photo' => 'consumables/products/prod3.png',
            'name_en' => 'LM-650N Roll Laminator',
            'name_ar' => 'لامينيتر رول LM-650N',
            'consumable_id' => $hdSaphira->id,
        ]);

        // Starflex
        $starflex = Consumable::create([
            'photo' => 'consumables/starflex-logo.png',
            'name_en' => 'Starflex',
            'name_ar' => 'ستارفليكس',
            'description_en' => 'Starflex media delivers high-quality results for outdoor and indoor signage with durable, weather-resistant surfaces and consistent color reproduction.',
            'description_ar' => 'توفر وسائط Starflex نتائج عالية الجودة للافتات الخارجية والداخلية مع أسطح متينة ومقاومة للطقس وإعادة إنتاج ألوان متسقة.',
            'key_features_en' => [
                'Frontlit and backlit options',
                'Excellent printability on most wide-format printers',
                'Good dimensional stability',
                'Available in multiple widths and thicknesses'
            ],
            'key_features_ar' => [
                'خيارات إضاءة أمامية وخلفية',
                'قابلية طباعة ممتازة على معظم الطابعات واسعة التنسيق',
                'استقرار أبعاد جيد',
                'متوفر بعدة عروض وسماكات'
            ],
            'order' => 2,
        ]);

        // Add products for Starflex
        ConsumableProduct::create([
            'photo' => 'consumables/products/starflex-prod1.jpg',
            'name_en' => 'Starflex Frontlit 440gsm',
            'name_ar' => 'ستارفليكس إضاءة أمامية 440gsm',
            'consumable_id' => $starflex->id,
        ]);

        ConsumableProduct::create([
            'photo' => 'consumables/products/starflex-prod2.jpg',
            'name_en' => 'Starflex Backlit 510gsm',
            'name_ar' => 'ستارفليكس إضاءة خلفية 510gsm',
            'consumable_id' => $starflex->id,
        ]);

        ConsumableProduct::create([
            'photo' => 'consumables/products/starflex-prod3.jpg',
            'name_en' => 'Starflex Mesh Banner',
            'name_ar' => 'لافتة شبكية ستارفليكس',
            'consumable_id' => $starflex->id,
        ]);
    }
}