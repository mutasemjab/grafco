<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Career;
use App\Models\AvailablePosition;

class CareerSeeder extends Seeder
{
    public function run()
    {
        // Create main career content
        $career = Career::create([
            'name_en' => 'Achievement is essential in our business',
            'name_ar' => 'الإنجاز أساسي في أعمالنا',
            'description_en' => "It is our Human Resource mission to obtain the right individuals to be part of our team and give them the right care as an employee. We realize this mission will help us fulfill our company's expectation to grow and prosper in the years to come. We offer a full benefits package to our full–time employees and encourage personal career growth. We are excited to see what your experience and expertise can bring to our company.",
            'description_ar' => 'مهمتنا في الموارد البشرية هي الحصول على الأفراد المناسبين ليكونوا جزءًا من فريقنا ومنحهم الرعاية المناسبة كموظفين. ندرك أن هذه المهمة ستساعدنا في تحقيق توقعات شركتنا للنمو والازدهار في السنوات القادمة. نقدم حزمة مزايا كاملة لموظفينا بدوام كامل ونشجع النمو المهني الشخصي. نحن متحمسون لرؤية ما يمكن أن تجلبه خبرتك وخبراتك إلى شركتنا.',
            'bottom_name_en' => 'Send us your resume',
            'bottom_name_ar' => 'أرسل سيرتك الذاتية',
            'bottom_description_en' => 'Send your resume to: <strong>Graphic Supplies</strong> Human Resource Manager, P.O. Box 2153, Sinking Spring, PA 19608 OR e-mail: <strong>graphic@GraphicSupplies.com</strong>. To schedule an appointment: Call 610–678–8630 and ask for Human Resources.',
            'bottom_description_ar' => 'أرسل سيرتك الذاتية إلى: <strong>جرافيك سبلايز</strong> مدير الموارد البشرية، ص.ب 2153، سينكينج سبرينج، PA 19608 أو البريد الإلكتروني: <strong>graphic@GraphicSupplies.com</strong>. لتحديد موعد: اتصل على 610-678-8630 واطلب الموارد البشرية.',
        ]);

        // Create available positions
        $positions = [
            [
                'name_en' => 'Customer Service',
                'name_ar' => 'خدمة العملاء',
                'photo' => 'positions/customer-service.png', // You can change to actual image path
                'career_id' => $career->id,
            ],
            [
                'name_en' => 'Sales & Marketing',
                'name_ar' => 'المبيعات والتسويق',
                'photo' => 'positions/sales-marketing.png',
                'career_id' => $career->id,
            ],
            [
                'name_en' => 'Offset Press Operator',
                'name_ar' => 'مشغل مطبعة أوفست',
                'photo' => 'positions/press-operator.png',
                'career_id' => $career->id,
            ],
            [
                'name_en' => 'Graphic Designer',
                'name_ar' => 'مصمم جرافيك',
                'photo' => 'positions/graphic-designer.png',
                'career_id' => $career->id,
            ],
            [
                'name_en' => 'Web Developer',
                'name_ar' => 'مطور ويب',
                'photo' => 'positions/web-developer.png',
                'career_id' => $career->id,
            ],
            [
                'name_en' => 'Project Manager',
                'name_ar' => 'مدير المشروع',
                'photo' => 'positions/project-manager.png',
                'career_id' => $career->id,
            ],
            [
                'name_en' => 'Quality Control Specialist',
                'name_ar' => 'أخصائي مراقبة الجودة',
                'photo' => 'positions/quality-control.png',
                'career_id' => $career->id,
            ],
            [
                'name_en' => 'Production Supervisor',
                'name_ar' => 'مشرف الإنتاج',
                'photo' => 'positions/production-supervisor.png',
                'career_id' => $career->id,
            ],
            [
                'name_en' => 'Accountant',
                'name_ar' => 'محاسب',
                'photo' => 'positions/accountant.png',
                'career_id' => $career->id,
            ],
            [
                'name_en' => 'Human Resources Specialist',
                'name_ar' => 'أخصائي موارد بشرية',
                'photo' => 'positions/hr-specialist.png',
                'career_id' => $career->id,
            ],
        ];

        foreach ($positions as $position) {
            AvailablePosition::create($position);
        }
    }
}