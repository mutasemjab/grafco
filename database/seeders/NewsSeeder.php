<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $newsData = [
            [
                'date_of_news' => Carbon::create(2025, 1, 15),
                'photo' => 'news/news-1.jpg',
                'name_en' => 'New Partnership with Leading Printing Technology Provider',
                'name_ar' => 'شراكة جديدة مع مزود رائد لتكنولوجيا الطباعة',
                'description_en' => 'Graphic Supplies Co. is proud to announce a strategic partnership with a leading global manufacturer of wide-format printing equipment. This collaboration will bring cutting-edge printing solutions to our customers across the Middle East, enhancing our product portfolio with innovative UV and eco-solvent printing technologies.',
                'description_ar' => 'تفخر شركة جرافيك للمستلزمات بالإعلان عن شراكة استراتيجية مع شركة تصنيع عالمية رائدة لمعدات الطباعة واسعة التنسيق. ستجلب هذه الشراكة حلول طباعة متطورة لعملائنا في جميع أنحاء الشرق الأوسط، مما يعزز مجموعة منتجاتنا بتقنيات طباعة UV وصديقة للبيئة مبتكرة.',
            ],
            [
                'date_of_news' => Carbon::create(2024, 12, 20),
                'photo' => 'news/news-2.jpg',
                'name_en' => 'Opening New Service Center in Amman',
                'name_ar' => 'افتتاح مركز خدمة جديد في عمان',
                'description_en' => 'We are excited to announce the opening of our new state-of-the-art service center in Amman, Jordan. This facility will provide faster response times and enhanced technical support for all our customers in the region, featuring fully equipped workshops and trained engineers.',
                'description_ar' => 'يسعدنا أن نعلن عن افتتاح مركز الخدمة الجديد المتطور في عمان، الأردن. ستوفر هذه المنشأة أوقات استجابة أسرع ودعم فني محسّن لجميع عملائنا في المنطقة، وتتميز بورش عمل مجهزة بالكامل ومهندسين مدربين.',
            ],
            [
                'date_of_news' => Carbon::create(2024, 11, 10),
                'photo' => 'news/news-3.jpg',
                'name_en' => 'Successful Participation in Print Expo 2024',
                'name_ar' => 'مشاركة ناجحة في معرض الطباعة 2024',
                'description_en' => 'Graphic Supplies Co. successfully participated in the Print Expo 2024, showcasing our latest range of large format printers, cutting equipment, and finishing solutions. The event saw tremendous interest from industry professionals and resulted in several new partnerships.',
                'description_ar' => 'شاركت شركة جرافيك للمستلزمات بنجاح في معرض الطباعة 2024، حيث عرضت أحدث مجموعة من الطابعات كبيرة الحجم ومعدات القطع وحلول التشطيب. شهد الحدث اهتمامًا كبيرًا من المهنيين في الصناعة وأسفر عن العديد من الشراكات الجديدة.',
            ],
            [
                'date_of_news' => Carbon::create(2024, 10, 5),
                'photo' => 'news/news-4.jpg',
                'name_en' => 'Launch of Eco-Friendly Printing Solutions',
                'name_ar' => 'إطلاق حلول الطباعة الصديقة للبيئة',
                'description_en' => 'In line with our commitment to sustainability, we are launching a new line of eco-friendly printing solutions. These products use water-based inks and energy-efficient technologies, helping our customers reduce their environmental footprint while maintaining exceptional print quality.',
                'description_ar' => 'تماشيًا مع التزامنا بالاستدامة، نطلق خط إنتاج جديد من حلول الطباعة الصديقة للبيئة. تستخدم هذه المنتجات أحبار قائمة على الماء وتقنيات موفرة للطاقة، مما يساعد عملاءنا على تقليل بصمتهم البيئية مع الحفاظ على جودة طباعة استثنائية.',
            ],
            [
                'date_of_news' => Carbon::create(2024, 9, 18),
                'photo' => 'news/news-5.jpg',
                'name_en' => 'Training Program for Technical Engineers',
                'name_ar' => 'برنامج تدريبي للمهندسين الفنيين',
                'description_en' => 'We successfully completed an intensive training program for our technical engineers, covering the latest advances in wide-format printing technology, maintenance procedures, and customer service excellence. Our team is now better equipped to serve our valued customers.',
                'description_ar' => 'أكملنا بنجاح برنامجًا تدريبيًا مكثفًا لمهندسينا الفنيين، يغطي أحدث التطورات في تكنولوجيا الطباعة واسعة التنسيق وإجراءات الصيانة والتميز في خدمة العملاء. فريقنا الآن مجهز بشكل أفضل لخدمة عملائنا الكرام.',
            ],
            [
                'date_of_news' => Carbon::create(2024, 8, 25),
                'photo' => 'news/news-6.jpg',
                'name_en' => 'Expansion into Palestinian Market',
                'name_ar' => 'التوسع في السوق الفلسطيني',
                'description_en' => 'Graphic Supplies Co. is expanding its operations into Palestine, bringing our comprehensive range of printing and finishing equipment to a new market. This expansion includes establishing local service support and maintaining our commitment to excellence in customer service.',
                'description_ar' => 'تقوم شركة جرافيك للمستلزمات بتوسيع عملياتها إلى فلسطين، حيث نقدم مجموعتنا الشاملة من معدات الطباعة والتشطيب إلى سوق جديدة. يتضمن هذا التوسع إنشاء دعم خدمة محلي والحفاظ على التزامنا بالتميز في خدمة العملاء.',
            ],
            [
                'date_of_news' => Carbon::create(2024, 7, 12),
                'photo' => 'news/news-7.jpg',
                'name_en' => 'Award for Excellence in Customer Service',
                'name_ar' => 'جائزة التميز في خدمة العملاء',
                'description_en' => 'We are honored to receive the Excellence in Customer Service Award from the Middle East Print Industry Association. This recognition reflects our dedication to providing outstanding support and service to all our customers throughout the region.',
                'description_ar' => 'يشرفنا أن نتلقى جائزة التميز في خدمة العملاء من جمعية صناعة الطباعة في الشرق الأوسط. يعكس هذا التقدير تفانينا في تقديم دعم وخدمة متميزة لجميع عملائنا في جميع أنحاء المنطقة.',
            ],
            [
                'date_of_news' => Carbon::create(2024, 6, 8),
                'photo' => 'news/news-8.jpg',
                'name_en' => 'Introduction of New Textile Printing Line',
                'name_ar' => 'تقديم خط طباعة المنسوجات الجديد',
                'description_en' => 'Graphic Supplies Co. introduces a revolutionary textile printing line featuring advanced sublimation and direct-to-fabric technologies. This new addition to our portfolio enables businesses to produce high-quality textile prints with exceptional color vibrancy and durability.',
                'description_ar' => 'تقدم شركة جرافيك للمستلزمات خط طباعة منسوجات ثوري يتميز بتقنيات التسامي المتقدمة والطباعة المباشرة على القماش. تمكن هذه الإضافة الجديدة إلى محفظتنا الشركات من إنتاج مطبوعات منسوجات عالية الجودة بحيوية ألوان استثنائية ومتانة.',
            ],
            [
                'date_of_news' => Carbon::create(2023, 12, 15),
                'photo' => 'news/news-9.jpg',
                'name_en' => 'Year-End Customer Appreciation Event',
                'name_ar' => 'حدث تقدير العملاء نهاية العام',
                'description_en' => 'We hosted our annual customer appreciation event, bringing together clients, partners, and industry professionals. The event featured product demonstrations, technical workshops, and networking opportunities, strengthening our relationships with the printing community.',
                'description_ar' => 'استضفنا حدث تقدير العملاء السنوي، حيث جمعنا العملاء والشركاء والمهنيين في الصناعة. تضمن الحدث عروض توضيحية للمنتجات وورش عمل فنية وفرص للتواصل، مما عزز علاقاتنا مع مجتمع الطباعة.',
            ],
            [
                'date_of_news' => Carbon::create(2023, 10, 20),
                'photo' => 'news/news-10.jpg',
                'name_en' => 'Launch of 24/7 Technical Support Hotline',
                'name_ar' => 'إطلاق خط ساخن للدعم الفني على مدار الساعة',
                'description_en' => 'Understanding the critical nature of production environments, Graphic Supplies Co. has launched a 24/7 technical support hotline. Our expert engineers are now available around the clock to assist with any technical issues, minimizing downtime for our customers.',
                'description_ar' => 'إدراكًا للطبيعة الحرجة لبيئات الإنتاج، أطلقت شركة جرافيك للمستلزمات خطًا ساخنًا للدعم الفني على مدار الساعة طوال أيام الأسبوع. مهندسونا الخبراء متاحون الآن على مدار الساعة للمساعدة في أي مشكلات فنية، مما يقلل من وقت التوقف عن العمل لعملائنا.',
            ],
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }
    }
}