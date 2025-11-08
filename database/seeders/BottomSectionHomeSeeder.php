<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BottomSectionHome;

class BottomSectionHomeSeeder extends Seeder
{
    public function run()
    {
        BottomSectionHome::create([
            'name_en' => 'Graphic Supplies Co.',
            'name_ar' => 'شركة جرافيك للمستلزمات',
            'short_description_en' => 'Your trusted partner for print, cut, and finishing equipment across the Middle East.',
            'short_description_ar' => 'شريكك الموثوق لمعدات الطباعة والقص والتشطيب في جميع أنحاء الشرق الأوسط.',
            'tall_description_en' => 'Graphic Supplies Co. is a leading provider of high-quality printing, cutting, and finishing equipment across the Middle East. With a strong commitment to excellence and innovation, we serve as a trusted partner for print service providers, sign makers, and creative professionals seeking reliable solutions that deliver precision, efficiency, and outstanding results.',
            'tall_description_ar' => 'شركة جرافيك للمستلزمات هي مزود رائد لمعدات الطباعة والقص والتشطيب عالية الجودة في جميع أنحاء الشرق الأوسط. مع التزام قوي بالتميز والابتكار، نعمل كشريك موثوق لمقدمي خدمات الطباعة وصانعي اللافتات والمحترفين المبدعين الذين يبحثون عن حلول موثوقة توفر الدقة والكفاءة ونتائج متميزة.',
            'photo' => 'bottom-section/about-hero.jpg', // Make sure to copy the image to storage/app/public/bottom-section/
        ]);
    }
}