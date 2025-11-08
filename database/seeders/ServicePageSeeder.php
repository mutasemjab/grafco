<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicePage;
use App\Models\ServicePageSection;

class ServicePageSeeder extends Seeder
{
    public function run()
    {
        // Software & Our Service Page
        $softwarePage = ServicePage::create([
            'slug' => 'software',
            'name_en' => 'Software & Our service',
            'name_ar' => 'البرمجيات وخدماتنا',
            'title_en' => 'Our Services',
            'title_ar' => 'خدماتنا',
            'subtitle_en' => 'Comprehensive support throughout the entire equipment lifecycle',
            'subtitle_ar' => 'دعم شامل طوال دورة حياة المعدات بالكامل',
            'order' => 1,
        ]);

        // Spare Parts Section
        ServicePageSection::create([
            'service_page_id' => $softwarePage->id,
            'photo' => 'services/spare-parts.png',
            'title_en' => 'Spare Parts',
            'title_ar' => 'قطع الغيار',
            'description_en' => 'Genuine OEM parts with regional stock. Fast delivery and technical support for all installations.',
            'description_ar' => 'قطع غيار OEM أصلية مع مخزون إقليمي. توصيل سريع ودعم فني لجميع التركيبات.',
            'features_en' => [
                'Genuine OEM parts only',
                'Local inventory',
                'Same/next-day delivery',
                'Technical installation support'
            ],
            'features_ar' => [
                'قطع غيار OEM أصلية فقط',
                'مخزون محلي',
                'التوصيل في نفس اليوم/اليوم التالي',
                'دعم التركيب الفني'
            ],
            'image_right' => false,
            'order' => 1,
        ]);

        // Training & Certification Section
        ServicePageSection::create([
            'service_page_id' => $softwarePage->id,
            'photo' => 'services/training.png',
            'title_en' => 'Training & Certification',
            'title_ar' => 'التدريب والشهادات',
            'description_en' => 'Comprehensive operator training programs from basic to advanced levels. Certification available.',
            'description_ar' => 'برامج تدريب شاملة للمشغلين من المستويات الأساسية إلى المتقدمة. شهادة متاحة.',
            'features_en' => [
                'On-site or at training center',
                'Multi-level courses',
                'Operator certification',
                'Ongoing refresher sessions'
            ],
            'features_ar' => [
                'في الموقع أو في مركز التدريب',
                'دورات متعددة المستويات',
                'شهادة المشغل',
                'جلسات تنشيطية مستمرة'
            ],
            'image_right' => true,
            'order' => 2,
        ]);

        // Maintenance & Support Section
        ServicePageSection::create([
            'service_page_id' => $softwarePage->id,
            'photo' => 'services/maintenance.png',
            'title_en' => 'Maintenance & Support',
            'title_ar' => 'الصيانة والدعم',
            'description_en' => 'Preventive maintenance programs and rapid response Extended warranty options available.',
            'description_ar' => 'برامج الصيانة الوقائية والاستجابة السريعة خيارات الضمان الممتد متاحة.',
            'features_en' => [
                '24/7 technical hotline',
                'Scheduled preventive maintenance',
                'Priority parts availability',
                'Remote diagnostics'
            ],
            'features_ar' => [
                'خط ساخن فني على مدار الساعة',
                'صيانة وقائية مجدولة',
                'توفر قطع الغيار ذات الأولوية',
                'التشخيص عن بعد'
            ],
            'image_right' => false,
            'order' => 3,
        ]);

        // Book an Appointment Page
        $appointmentPage = ServicePage::create([
            'slug' => 'appointment',
            'name_en' => 'Book an appointment',
            'name_ar' => 'احجز موعد',
            'title_en' => 'Book an appointment',
            'title_ar' => 'احجز موعد',
            'subtitle_en' => 'Schedule a visit from our technical or sales team',
            'subtitle_ar' => 'جدولة زيارة من فريقنا الفني أو المبيعات',
            'order' => 2,
        ]);

        ServicePageSection::create([
            'service_page_id' => $appointmentPage->id,
            'photo' => 'services/appointment.jpg',
            'title_en' => 'Book an appointment',
            'title_ar' => 'احجز موعد',
            'description_en' => 'Schedule a visit from our technical or sales team to review your equipment, workflows, and future projects.',
            'description_ar' => 'جدولة زيارة من فريقنا الفني أو المبيعات لمراجعة معداتك وسير العمل والمشاريع المستقبلية.',
            'features_en' => [
                'On-site equipment assessment',
                'Production workflow review',
                'Upgrade and expansion planning',
                'Demo sessions for new solutions'
            ],
            'features_ar' => [
                'تقييم المعدات في الموقع',
                'مراجعة سير عمل الإنتاج',
                'تخطيط الترقية والتوسع',
                'جلسات تجريبية للحلول الجديدة'
            ],
            'image_right' => true,
            'order' => 1,
        ]);

        // Request for Parts Page
        $partsPage = ServicePage::create([
            'slug' => 'parts',
            'name_en' => 'Request for parts',
            'name_ar' => 'طلب قطع الغيار',
            'title_en' => 'Request for parts',
            'title_ar' => 'طلب قطع الغيار',
            'subtitle_en' => 'Submit your spare parts requirements',
            'subtitle_ar' => 'أرسل متطلبات قطع الغيار الخاصة بك',
            'order' => 3,
        ]);

        ServicePageSection::create([
            'service_page_id' => $partsPage->id,
            'photo' => 'services/parts.jpg',
            'title_en' => 'Request for parts',
            'title_ar' => 'طلب قطع الغيار',
            'description_en' => 'Submit your spare parts requirements and our team will confirm availability, pricing, and delivery options.',
            'description_ar' => 'أرسل متطلبات قطع الغيار الخاصة بك وسيقوم فريقنا بتأكيد التوفر والتسعير وخيارات التسليم.',
            'features_en' => [
                'OEM-certified spare parts',
                'Express shipment options',
                'Compatibility verification',
                'Installation guidance from experts'
            ],
            'features_ar' => [
                'قطع غيار معتمدة من OEM',
                'خيارات الشحن السريع',
                'التحقق من التوافق',
                'إرشادات التركيب من الخبراء'
            ],
            'image_right' => false,
            'order' => 1,
        ]);
    }
}