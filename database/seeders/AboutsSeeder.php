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
        Abouts::create([
            'key' => 'about_us',
            'name' => 'Hakkımızda',
            'title' => 'Vizyon ve Misyonumuz',
            'content' => '<h3 data-fontsize="20" data-lineheight="30px">Profesyonel Ekip, Son Teknoloji Cihazlar</h3>
<p>Padişah&amp;Beyefendi Halı Koltuk Perde Yıkama firması olarak kaliteli hizmeti herkesin
                                alabilmesi için uygun fiyatımız ve son
                                teknoloji cihazlarımız ile kendimizi geliştiriyoruz. Yaptığımız işin hakkını vermek ve
                                profesyonel
                                olarak hizmet vermek için her geçen gün kullandığımız cihazlarımızı güncelliyor,
                                ekibimizi büyütüyor ve
                                kaliteli hizmet için eğitimler ile destekliyoruz.</p>
<h3 data-fontsize="20" data-lineheight="30px">Kaliteli Hizmet, %100 Müşteri Memnuniyeti</h3>
<p>Ev veya iş yerlerinizde en çok kullandığınız eşyalardan olan koltuk ve perdelerinizin
                                temizliği
                                konusunda hizmet sunuyoruz. Uzun yıllara dayanan tecrübemiz sayesinde en ince
                                ayrıntısına kadar detaylı
                                ve titiz bir temizlik hizmeti veriyoruz. Bu sayede siz değerli müşterilerimiz bizi
                                tercih ediyorsunuz ve
                                biz de Padişah&amp;Beyefendi Halı Koltuk Perde Yıkama olarak her geçen gün büyüyor ve
                                kalitemizi artırmayı amaçlıyoruz.</p>
<h3 data-fontsize="20" data-lineheight="30px">Yüzlerce Referans ve Etkili Sonuç</h3>
<p>instagram adresimiz&nbsp;<a href="https://www.instagram.com/vadikoltukyikama" rel="noopener" target="_blank">@vadikoltukyikama</a>&nbsp;sayfasındaki
                                paylaşımlara göz atabilir, yaptığımız işleri
                                görebilirsiniz. Özellikle yaptığımız işler ile ilgili öncesi sonrası hallerini
                                paylaşarak sizlere
                                sonuçlarımızı ve kaliteli işçiliğimizi göstermeyi amaçlıyoruz. Siz de ev ve iş
                                yerinizdeki her türden
                                kumaşa sahip koltuklarınızın temizlenmesi ile ilgili hemen iletişime geçebilirsiniz.</p>'
        ]);
    }
}
