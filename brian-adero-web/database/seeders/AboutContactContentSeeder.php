<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContent;

class AboutContactContentSeeder extends Seeder
{
    public function run()
    {
        $content = [
            // About Page Content
            [
                'key' => 'about.page.title',
                'value' => 'About Brian Adero',
                'type' => 'text'
            ],
            [
                'key' => 'about.page.subtitle',
                'value' => 'A steadfast commitment to legal excellence, integrity, and the pursuit of justice for every client.',
                'type' => 'text'
            ],
            [
                'key' => 'about.section.title',
                'value' => 'Dedicated to Your Legal Success',
                'type' => 'text'
            ],
            [
                'key' => 'about.page.bio',
                'value' => '<p>Brian Adero is an Advocate of the High Court of Kenya with extensive experience in civil litigation, corporate law, and family matters. With a passion for justice and a commitment to ethical practice, Brian has successfully represented clients in complex legal disputes across multiple jurisdictions.</p>

<p>Admitted to the bar in 2018, Brian has built a reputation for meticulous case preparation, strategic thinking, and unwavering dedication to client success. His approach combines deep legal knowledge with practical business acumen, ensuring clients receive not just legal advice, but comprehensive solutions tailored to their unique circumstances.</p>

<p>Beyond the courtroom, Brian is committed to pro bono work and community service, believing that access to justice should not be a privilege but a fundamental right for all Kenyans.</p>',
                'type' => 'richtext'
            ],
            [
                'key' => 'about.value1.title',
                'value' => 'Integrity',
                'type' => 'text'
            ],
            [
                'key' => 'about.value1.desc',
                'value' => 'Upholding the highest ethical standards in every case, ensuring transparency and trust.',
                'type' => 'text'
            ],
            [
                'key' => 'about.value2.title',
                'value' => 'Excellence',
                'type' => 'text'
            ],
            [
                'key' => 'about.value2.desc',
                'value' => 'Pursuing superior outcomes through diligent preparation, thorough research, and strategic advocacy.',
                'type' => 'text'
            ],
            [
                'key' => 'about.cta.title',
                'value' => 'Ready to Discuss Your Case?',
                'type' => 'text'
            ],
            [
                'key' => 'about.cta.text',
                'value' => 'Schedule a consultation today and let me provide the legal guidance and representation you need to achieve your objectives.',
                'type' => 'text'
            ],

            // Contact Page Content
            [
                'key' => 'contact.hero.subtitle',
                'value' => 'Get In Touch',
                'type' => 'text'
            ],
            [
                'key' => 'contact.hero.title',
                'value' => 'Contact Me',
                'type' => 'text'
            ],
            [
                'key' => 'contact.hero.desc',
                'value' => 'Reach out for legal consultations, inquiries, or representation. I am here to help you navigate your legal challenges with confidence.',
                'type' => 'text'
            ],
            [
                'key' => 'contact.office.title',
                'value' => 'Office Information',
                'type' => 'text'
            ],
            [
                'key' => 'contact.office.desc',
                'value' => '<p>My office is open Monday through Friday, from 8:00 AM to 5:00 PM. I am available for consultations by appointment.</p><p>Whether you need urgent legal assistance or wish to schedule a detailed consultation, feel free to reach out via phone, email, or the contact form below. I typically respond to all inquiries within 24 hours.</p>',
                'type' => 'richtext'
            ],
            [
                'key' => 'contact.phone',
                'value' => '+254 721 485 244',
                'type' => 'text'
            ],
            [
                'key' => 'contact.email',
                'value' => 'omongeadero@gmail.com',
                'type' => 'text'
            ],
            [
                'key' => 'contact.location',
                'value' => 'Nairobi, Kenya',
                'type' => 'text'
            ],
            [
                'key' => 'contact.hours',
                'value' => 'Monday - Friday, 8:00 AM - 5:00 PM',
                'type' => 'text'
            ],
        ];

        foreach ($content as $item) {
            SiteContent::updateOrCreate(
                ['key' => $item['key']],
                [
                    'value' => $item['value'],
                    'type' => $item['type']
                ]
            );
        }

        $this->command->info('About and Contact page content seeded successfully!');
    }
}
