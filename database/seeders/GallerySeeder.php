<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $company = Company::first();
        if (!$company) {
            return;
        }

        // Sample gallery images (using existing paths from view)
        $images = [
            'assets/uploads/vadi-koltuk-yikama-referanslar-04.png',
            'assets/uploads/vadi-koltuk-yikama-referanslar-03.png',
            'assets/uploads/vadi-koltuk-yikama-referanslar-07.png',
            'assets/uploads/vadi-koltuk-yikama-referanslar-02.png',
            'assets/uploads/vadi-koltuk-yikama-referanslar-11.png',
            'assets/uploads/vadi-koltuk-yikama-referanslar-12.png',
        ];

        foreach ($images as $index => $image) {
            Gallery::create([
                'company_id' => $company->id,
                'title' => 'Gallery Image ' . ($index + 1),
                'image' => $image,
                'type' => 'image',
                'order' => $index + 1,
                'status' => '1',
            ]);
        }

        // Sample videos (from view)
        $videos = [
            [
                'title' => 'Karcher Buharlı Koltuk Yıkama',
                'video_url' => 'https://www.youtube.com/embed/7XdCtZ2tLmk',
                'order' => 1,
            ],
            [
                'title' => 'İşyeri Koltuk, Sandalye Yıkama',
                'video_url' => 'https://www.youtube.com/embed/goY1AN84efQ',
                'order' => 2,
            ],
            [
                'title' => 'Dumankaya Konsept',
                'video_url' => 'https://www.youtube.com/embed/t5eYVzfs_fI',
                'order' => 3,
            ],
        ];

        foreach ($videos as $video) {
            Gallery::create([
                'company_id' => $company->id,
                'type' => 'video',
                'status' => '1',
                ...$video
            ]);
        }
    }
}
