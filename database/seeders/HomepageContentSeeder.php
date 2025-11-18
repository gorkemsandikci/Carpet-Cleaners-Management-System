<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\HomepageContent;
use Illuminate\Database\Seeder;

class HomepageContentSeeder extends Seeder
{
    public function run(): void
    {
        $company = Company::first();
        if (!$company) {
            return;
        }

        // Slider items
        $sliders = [
            [
                'title' => 'Profesyonel Hizmet',
                'content' => null,
                'image' => 'assets/uploads/koltuk-7.jpg',
                'button_text' => 'Detaylı Bilgi Al!',
                'button_link' => '#',
                'order' => 1,
            ],
            [
                'title' => 'Tüm İhtiyaçlarınız İçin Profesyonel Çözümler',
                'content' => null,
                'image' => 'assets/uploads/koltuk-8.jpg',
                'button_text' => 'Randevu Al!',
                'button_link' => '#',
                'order' => 2,
            ],
            [
                'title' => 'Profesyonel Ekip, Profesyonel Hizmet!',
                'content' => null,
                'image' => 'assets/uploads/koltuk6.jpg',
                'button_text' => 'Randevu Al!',
                'button_link' => '#',
                'order' => 3,
            ],
        ];

        foreach ($sliders as $slider) {
            HomepageContent::create([
                'company_id' => $company->id,
                'section_key' => 'slider',
                'status' => '1',
                ...$slider
            ]);
        }

        // About section
        HomepageContent::create([
            'company_id' => $company->id,
            'section_key' => 'about',
            'title' => 'Hakkımızda',
            'content' => 'Profesyonel ekibimiz ile eşyalarınızın türüne özel son teknoloji cihazlar, uygun temizlik maddeleri ve uzman personel hizmet veriyoruz. Hızlı teslimat ve güvenilir hizmet sunuyoruz. 7/24 ücretsiz randevu alabilirsiniz. Geniş hizmet ağımız ve garantili çalışma prensibimiz ile hizmetinizdeyiz.',
            'image' => 'assets/uploads/slider1-3.png',
            'status' => '1',
            'order' => 1,
        ]);

        // Features
        $features = [
            [
                'title' => 'Randevu Alın',
                'content' => 'Size en uygun gün ve saat için randevu alın. Ekibimiz tam zamanında orda olur.',
                'order' => 1,
            ],
            [
                'title' => 'Yıkama İşlemi Yapılsın',
                'content' => 'Eşyanıza özel cihazlar ve temizleyiciler ile uzman ekibimiz detaylı temizliği yapsın.',
                'order' => 2,
            ],
            [
                'title' => 'Memnuniyetinizi Paylaşın',
                'content' => 'İşlem sonrası diğer müşterilerimiz gibi sizde mutluluğunuzu arkadaşlarınızla paylaşın.',
                'order' => 3,
            ],
        ];

        foreach ($features as $feature) {
            HomepageContent::create([
                'company_id' => $company->id,
                'section_key' => 'features',
                'status' => '1',
                ...$feature
            ]);
        }

        // Services title
        HomepageContent::create([
            'company_id' => $company->id,
            'section_key' => 'services_title',
            'title' => 'HİZMETLER',
            'content' => 'PROFESYONEL OLARAK SUNDUĞUMUZ',
            'status' => '1',
            'order' => 1,
        ]);

        // FAQ
        $faqs = [
            [
                'title' => 'Neden Profesyonel Hizmet Almalıyım?',
                'content' => 'Profesyonel hizmet almak, işinizin doğru ve kaliteli yapılmasını sağlar. Uzman ekip ve son teknoloji cihazlar ile en iyi sonuçları alırsınız.',
                'order' => 1,
            ],
            [
                'title' => 'Hizmet Süresi Ne Kadar?',
                'content' => 'Hizmet süresi işin kapsamına göre değişiklik göstermektedir. Detaylı bilgi için iletişime geçebilirsiniz.',
                'order' => 2,
            ],
        ];

        foreach ($faqs as $faq) {
            HomepageContent::create([
                'company_id' => $company->id,
                'section_key' => 'faq',
                'status' => '1',
                ...$faq
            ]);
        }

        // Counters
        $counters = [
            ['title' => 'Son Teknoloji Makineler', 'content' => '100', 'order' => 1],
            ['title' => 'Profesyonel Hizmet', 'content' => '100', 'order' => 2],
            ['title' => 'Uygun Fiyat', 'content' => '100', 'order' => 3],
            ['title' => 'Alanında Tecrübeli Ekip', 'content' => '100', 'order' => 4],
        ];

        foreach ($counters as $counter) {
            HomepageContent::create([
                'company_id' => $company->id,
                'section_key' => 'counters',
                'status' => '1',
                ...$counter
            ]);
        }
    }
}
