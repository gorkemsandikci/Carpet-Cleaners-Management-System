<?php

namespace Database\Seeders;

use App\Models\Abouts;
use Illuminate\Database\Seeder;

class AboutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = \App\Models\Company::first();
        if (!$company) {
            return;
        }

        Abouts::create([
            'company_id' => $company->id,
            'key' => 'about_us',
            'name' => 'Hakkımızda',
            'title' => 'Vizyon ve Misyonumuz',
            'content' => '<h3 data-fontsize="20" data-lineheight="30px">Profesyonel Ekip, Son Teknoloji Cihazlar</h3>
<p>Firmamız olarak kaliteli hizmeti herkesin alabilmesi için uygun fiyatlarımız ve son teknoloji cihazlarımız ile kendimizi geliştiriyoruz. Yaptığımız işin hakkını vermek ve profesyonel olarak hizmet vermek için her geçen gün kullandığımız cihazlarımızı güncelliyor, ekibimizi büyütüyor ve kaliteli hizmet için eğitimler ile destekliyoruz.</p>
<h3 data-fontsize="20" data-lineheight="30px">Kaliteli Hizmet, %100 Müşteri Memnuniyeti</h3>
<p>Ev veya iş yerlerinizde en çok kullandığınız eşyalarınızın temizliği konusunda hizmet sunuyoruz. Uzun yıllara dayanan tecrübemiz sayesinde en ince ayrıntısına kadar detaylı ve titiz bir hizmet veriyoruz. Bu sayede siz değerli müşterilerimiz bizi tercih ediyorsunuz ve biz de her geçen gün büyüyor ve kalitemizi artırmayı amaçlıyoruz.</p>
<h3 data-fontsize="20" data-lineheight="30px">Yüzlerce Referans ve Etkili Sonuç</h3>
<p>Sosyal medya hesaplarımızdaki paylaşımlara göz atabilir, yaptığımız işleri görebilirsiniz. Özellikle yaptığımız işler ile ilgili öncesi sonrası hallerini paylaşarak sizlere sonuçlarımızı ve kaliteli işçiliğimizi göstermeyi amaçlıyoruz. Hemen iletişime geçebilirsiniz.</p>'
        ]);
    }
}
