@extends('layouts.admin')

@section('page-title', 'Site Content Manager')
@section('page-subtitle', 'Edit all website content (Homepage, About, Contact)')

@section('content')
    <style>
        .tab-button {
            transition: all 0.2s;
        }

        .tab-button.active {
            background-color: #1e293b;
            color: white;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>

    <div class="max-w-6xl">
        <!-- Tab Navigation -->
        <div class="bg-white rounded-t-lg border border-slate-200 border-b-0">
            <div class="flex gap-2 p-4 overflow-x-auto">
                <button onclick="switchTab('homepage')"
                    class="tab-button active px-6 py-3 rounded-lg font-medium whitespace-nowrap">
                    Homepage
                </button>
                <button onclick="switchTab('about')" class="tab-button px-6 py-3 rounded-lg font-medium whitespace-nowrap">
                    About Page
                </button>
                <button onclick="switchTab('contact')"
                    class="tab-button px-6 py-3 rounded-lg font-medium whitespace-nowrap">
                    Contact Page
                </button>

                <button onclick="switchTab('testimonials')"
                    class="tab-button px-6 py-3 rounded-lg font-medium whitespace-nowrap">
                    Testimonials
                </button>
                <button onclick="switchTab('legal')" class="tab-button px-6 py-3 rounded-lg font-medium whitespace-nowrap">
                    Legal Pages
                </button>
            </div>
        </div>

        <form action="{{ route('admin.content.update', 1) }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-b-lg border border-slate-200 p-8">
            @csrf
            @method('PUT')

            <!-- Homepage Tab -->
            <div id="homepage-tab" class="tab-content active space-y-8">
                <!-- Hero Section -->
                <div class="border-b border-slate-200 pb-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Hero Section</h3>

                    <div class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Hero Title Line 1</label>
                                <input type="text" name="content[hero.title.line1]"
                                    value="{{ $content['hero.title.line1']->value ?? 'Justice' }}"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                                <p class="mt-1 text-xs text-slate-500">First line of the main title</p>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Hero Title Line 2
                                    (Italic)</label>
                                <input type="text" name="content[hero.title.line2]"
                                    value="{{ $content['hero.title.line2']->value ?? 'Requires' }}"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Hero Title Line 3</label>
                            <input type="text" name="content[hero.title.line3]"
                                value="{{ $content['hero.title.line3']->value ?? 'Clarity.' }}"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Hero Description</label>
                            <textarea name="content[hero.description]" rows="3"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg summernote">{{ $content['hero.description']->value ?? 'I provide strategic counsel for businesses and individuals, ensuring your rights are protected with unwavering integrity and precision.' }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Hero Profile Image</label>
                            <input type="file" name="hero_image" accept="image/*"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                            <p class="mt-1 text-xs text-slate-500">Current: brian.jpeg (Leave empty to keep current image)
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Floating Card Quote</label>
                            <textarea name="content[hero.floating.quote]" rows="2"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg">{{ $content['hero.floating.quote']->value ?? 'Excellence is not an act, but a habit.' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- About Section (on Homepage) -->
                <div class="border-b border-slate-200 pb-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">About Section (Homepage)</h3>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Section Title</label>
                            <input type="text" name="content[home.about.title]"
                                value="{{ $content['home.about.title']->value ?? 'About Brian' }}"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Subtitle</label>
                            <input type="text" name="content[home.about.subtitle]"
                                value="{{ $content['home.about.subtitle']->value ?? 'Since 2020' }}"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Quote</label>
                            <textarea name="content[home.about.quote]" rows="3"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg">{{ $content['home.about.quote']->value ?? 'I believe that effective legal representation goes beyond merely knowing the law; it requires understanding the unique human and business dynamics behind every case.' }}</textarea>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Paragraph 1</label>
                                <textarea name="content[home.about.p1]" rows="4"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg summernote">{{ $content['home.about.p1']->value ?? 'With 4 years of experience practicing at the High Court, I have built a reputation for meticulous preparation and strategic advocacy. My approach is client-centric, ensuring that you are not just represented, but truly heard and understood.' }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Paragraph 2</label>
                                <textarea name="content[home.about.p2]" rows="4"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg summernote">{{ $content['home.about.p2']->value ?? 'Whether navigating complex corporate disputes or sensitive family matters, my commitment remains the same: to provide ethical, aggressive, and effective counsel that secures your future.' }}</textarea>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Signature Image</label>
                            <input type="file" name="signature_image" accept="image/*"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                            <p class="mt-1 text-xs text-slate-500">Upload your signature image (Leave empty to keep current)
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Quote Section -->
                <div class="border-b border-slate-200 pb-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Featured Quote Section</h3>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Main Quote</label>
                        <textarea name="content[quote.main]" rows="3"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg">{{ $content['quote.main']->value ?? 'I don\'t just win cases; I secure futures. Your success is my singular mission.' }}</textarea>
                    </div>
                </div>

                <!-- Experience Section -->
                <div class="border-b border-slate-200 pb-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Experience Section</h3>

                    <div id="experience-list" class="space-y-6">
                        <!-- Rendered by JS -->
                    </div>

                    <button type="button" onclick="addExperience()"
                        class="mt-4 px-4 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 font-bold text-sm transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Position
                    </button>

                    <!-- Hidden Input for Storage -->
                    <input type="hidden" name="content[home.experience]" id="experienceInput">
                </div>



                <!-- Education Section -->
                <div class="border-b border-slate-200 pb-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Education Section</h3>

                    <div id="education-list" class="space-y-6">
                        <!-- Rendered by JS -->
                    </div>

                    <button type="button" onclick="addEducation()"
                        class="mt-4 px-4 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 font-bold text-sm transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Education
                    </button>

                    <input type="hidden" name="content[home.education]" id="educationInput">
                </div>



                <!-- Achievements Section -->
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Achievements Section</h3>

                    <div id="achievements-list" class="grid md:grid-cols-2 gap-6 mb-6">
                        <!-- Rendered by JS -->
                    </div>

                    <button type="button" onclick="addAchievement()"
                        class="px-4 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 font-bold text-sm transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Achievement
                    </button>

                    <input type="hidden" name="content[home.achievements]" id="achievementsInput">
                </div>


                <!-- Practice Areas Section -->
                <div class="border-t border-slate-200 pt-8 mb-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Practice Areas (Services)</h3>
                    <p class="text-sm text-slate-600 mb-4">Manage the services displayed in the "Areas of Practice" section.
                    </p>

                    <div id="practice-areas-list" class="space-y-4 mb-6">
                        <!-- Rendered by JS -->
                    </div>

                    <button type="button" onclick="addPracticeArea()"
                        class="px-4 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 font-bold text-sm transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Service
                    </button>

                    <input type="hidden" name="content[home.practice_areas]" id="practiceAreasInput">
                </div>


                <!-- Social Media Links Section -->
                <div class="border-t border-slate-200 pt-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Social Media Links (Footer)</h3>
                    <p class="text-sm text-slate-600 mb-4">Manage social media platform links displayed in the footer.</p>

                    <div id="social-media-list" class="space-y-4 mb-6">
                        <!-- Rendered by JS -->
                    </div>

                    <button type="button" onclick="addSocialMedia()"
                        class="px-4 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 font-bold text-sm transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Social Platform
                    </button>

                    <input type="hidden" name="content[footer.social_media]" id="socialMediaInput">
                </div>

            </div>

            <!-- About Page Tab -->
            <div id="about-tab" class="tab-content hidden space-y-6">
                <h3 class="text-xl font-bold text-slate-900 mb-6">About Page Content</h3>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Page Title</label>
                        <input type="text" name="content[about.page.title]"
                            value="{{ $content['about.page.title']->value ?? 'About Brian Adero' }}"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Page Subtitle</label>
                        <textarea name="content[about.page.subtitle]" rows="2"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg">{{ $content['about.page.subtitle']->value ?? 'A steadfast commitment to legal excellence, integrity, and the pursuit of justice for every client.' }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Section Title</label>
                        <input type="text" name="content[about.section.title]"
                            value="{{ $content['about.section.title']->value ?? 'Dedicated to Your Legal Success' }}"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Full Biography</label>
                        <textarea name="content[about.page.bio]" rows="10"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg summernote">{{ $content['about.page.bio']->value ?? '' }}</textarea>
                        <p class="mt-1 text-xs text-slate-500">Use double line breaks for new paragraphs.</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 p-6 bg-slate-50 rounded-lg">
                        <div class="md:col-span-2 font-bold text-slate-900">Value 1</div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Title</label>
                            <input type="text" name="content[about.value1.title]"
                                value="{{ $content['about.value1.title']->value ?? 'Integrity' }}"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Description</label>
                            <input type="text" name="content[about.value1.desc]"
                                value="{{ $content['about.value1.desc']->value ?? 'Upholding the highest ethical standards in every case.' }}"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 p-6 bg-slate-50 rounded-lg">
                        <div class="md:col-span-2 font-bold text-slate-900">Value 2</div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Title</label>
                            <input type="text" name="content[about.value2.title]"
                                value="{{ $content['about.value2.title']->value ?? 'Excellence' }}"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Description</label>
                            <input type="text" name="content[about.value2.desc]"
                                value="{{ $content['about.value2.desc']->value ?? 'Pursuing superior outcomes through diligent preparation.' }}"
                                class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">
                        </div>
                    </div>

                    <div class="p-6 bg-slate-50 rounded-lg">
                        <h4 class="font-bold text-slate-900 mb-4">Call to Action Section</h4>
                        <div class="grid gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">CTA Title</label>
                                <input type="text" name="content[about.cta.title]"
                                    value="{{ $content['about.cta.title']->value ?? 'Ready to Discuss Your Case?' }}"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">CTA Text</label>
                                <textarea name="content[about.cta.text]" rows="2"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">{{ $content['about.cta.text']->value ?? 'Schedule a consultation today and let me provide the legal guidance you need.' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">About Page Portrait Image</label>
                        <input type="file" name="about_portrait" accept="image/*"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                        <p class="mt-1 text-xs text-slate-500">Upload portrait image for about page</p>
                    </div>
                </div>
            </div>

            <!-- Contact Page Tab -->
            <div id="contact-tab" class="tab-content space-y-6 hidden">
                <h3 class="text-xl font-bold text-slate-900 mb-6">Contact Page Information</h3>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="md:col-span-2 p-6 bg-slate-50 rounded-lg mb-4">
                        <h4 class="font-bold text-slate-900 mb-4">Hero Section</h4>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Subtitle</label>
                                <input type="text" name="content[contact.hero.subtitle]"
                                    value="{{ $content['contact.hero.subtitle']->value ?? 'Get In Touch' }}"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Main Title</label>
                                <input type="text" name="content[contact.hero.title]"
                                    value="{{ $content['contact.hero.title']->value ?? 'Contact Me' }}"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Description</label>
                                <input type="text" name="content[contact.hero.desc]"
                                    value="{{ $content['contact.hero.desc']->value ?? 'Reach out for legal consultations, inquiries, or representation.' }}"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2 p-6 bg-slate-50 rounded-lg mb-4">
                        <h4 class="font-bold text-slate-900 mb-4">Office Information Section</h4>
                        <div class="grid gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Section Title</label>
                                <input type="text" name="content[contact.office.title]"
                                    value="{{ $content['contact.office.title']->value ?? 'Office Info' }}"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Section Description</label>
                                <textarea name="content[contact.office.desc]" rows="2"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white summernote">{{ $content['contact.office.desc']->value ?? 'My office is open Monday through Friday, from 8:00 AM to 5:00 PM. I am available for consultations by appointment.' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Phone Number</label>
                        <input type="text" name="content[contact.phone]"
                            value="{{ $content['contact.phone']->value ?? '+254 721 485 244' }}"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                        <input type="email" name="content[contact.email]"
                            value="{{ $content['contact.email']->value ?? 'omongeadero@gmail.com' }}"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Appointment Booking URL</label>
                        <input type="url" name="content[general.booking_url]"
                            value="{{ $content['general.booking_url']->value ?? '' }}"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg block"
                            placeholder="https://calendly.com/your-link">
                        <p class="mt-1 text-xs text-slate-500">Enter a booking link (e.g. Calendly). If set, a "Book
                            Consultation" button will appear in the website header.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Location</label>
                        <input type="text" name="content[contact.location]"
                            value="{{ $content['contact.location']->value ?? 'Nairobi, Kenya' }}"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Office Hours</label>
                        <input type="text" name="content[contact.hours]"
                            value="{{ $content['contact.hours']->value ?? 'Monday - Friday, 8:00 AM - 5:00 PM' }}"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg">
                    </div>
                </div>
            </div>

            <!-- Testimonials Tab -->
            <div id="testimonials-tab" class="tab-content space-y-8 hidden">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900">Client Reviews</h3>
                        <p class="text-sm text-slate-500">Manage client testimonials displayed on the homepage.</p>
                    </div>
                    <button type="button" onclick="addTestimonial()"
                        class="px-4 py-2 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Review
                    </button>
                </div>

                <div id="testimonials-list" class="grid md:grid-cols-2 gap-6">
                    <!-- Dynamic Testimonials will be rendered here -->
                </div>

                <input type="hidden" name="content[home.testimonials]" id="testimonialsInput">
            </div>

            <!-- Legal Pages Tab -->
    <div id="legal-tab" class="tab-content space-y-8 hidden">
        <h3 class="text-xl font-bold text-slate-900 mb-6">Legal Pages Content</h3>
        <p class="text-sm text-slate-600 mb-4">Manage content for Privacy Policy and Terms of Service pages.</p>

        <!-- Privacy Policy -->
        <div class="p-6 bg-slate-50 rounded-lg">
            <h4 class="font-bold text-slate-900 mb-4">Privacy Policy</h4>
            <textarea name="content[legal.privacy]" rows="10"
                class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white summernote">{{ $content['legal.privacy']->value ?? '' }}</textarea>
        </div>

        <!-- Terms of Service -->
        <div class="p-6 bg-slate-50 rounded-lg">
            <h4 class="font-bold text-slate-900 mb-4">Terms of Service</h4>
            <textarea name="content[legal.terms]" rows="10"
                class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white summernote">{{ $content['legal.terms']->value ?? '' }}</textarea>
        </div>
    </div>

    <input type="hidden" name="page" value="all">

    <!-- Save Button -->
    <div class="flex items-center justify-between pt-8 border-t border-slate-200 mt-8">
        <div class="text-sm text-slate-600">
            <svg class="w-5 h-5 inline-block mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Changes save immediately to your website
        </div>
        <button type="submit"
            class="px-8 py-4 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition-all duration-300 shadow-lg hover:shadow-xl font-bold tracking-wide flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save All Changes
        </button>
    </div>
    </form>
    </div>

    <script>
        console.log('Admin Content Scripts Loading...');

        function switchTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            document.getElementById(tabName + '-tab').classList.add('active');
            event.target.classList.add('active');
        }

        // --- Global Helper ---
        window.safeConfirm = function (title, msg, callback) {
            // Try using the custom modal if it exists AND is functional
            if (typeof window.openConfirmModal === 'function') {
                try {
                    const modal = document.getElementById('confirmationModal');
                    const confirmBtn = document.getElementById('confirmActionBtn');

                    // Verify modal elements exist before using custom modal
                    if (modal && confirmBtn) {
                        window.openConfirmModal(title, msg, callback);
                        return;
                    }
                } catch (e) {
                    console.error('Custom modal failed:', e);
                }
            }

            // Fallback to native confirm
            if (window.confirm(msg || 'Are you sure?')) {
                callback();
            }
        };

        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM Ready, Initializing Data...');

            // --- Experience Section ---
            let savedExperience = @json(json_decode($content->get('home.experience')?->value ?? '[]', true));
            const defaultExperience = [
                { period: '2023 - Present', title: 'Senior Associate Advocate', company: 'Ochieng & Associates', desc: 'Leading the corporate litigation department, overseeing complex merger disputes and high-value commercial arbitration.' },
                { period: '2021 - 2023', title: 'Associate Advocate', company: 'Mutuso Dhahabu & Co. Advocates', desc: 'Specialized in Family Law and Civil Litigation. Managed a verified caseload of 40+ active files.' },
                { period: '2020 - 2021', title: 'Legal Trainee', company: 'Kenya School of Law', desc: 'Completed pupillage with distinction. Drafted pleadings and legal opinions.' }
            ];

            // Ensure Array
            if (!Array.isArray(savedExperience)) savedExperience = null;
            let experienceData = savedExperience || defaultExperience;

            window.renderExperience = function () {
                const container = document.getElementById('experience-list');
                if (!container) return;
                container.innerHTML = '';
                experienceData.forEach((item, index) => {
                    const row = document.createElement('div');
                    row.className = 'p-6 bg-slate-50 rounded-lg relative group';
                    row.innerHTML = `
                                                                                <button type="button" onclick="removeExperience(${index})" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-opacity">
                                                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                                                </button>
                                                                                <div class="grid md:grid-cols-2 gap-4">
                                                                                    <div><label class="block text-sm font-bold text-slate-700 mb-2">Period</label><input type="text" value="${item.period || ''}" oninput="updateExperience(${index}, 'period', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                                                    <div><label class="block text-sm font-bold text-slate-700 mb-2">Job Title</label><input type="text" value="${item.title || ''}" oninput="updateExperience(${index}, 'title', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                                                    <div class="md:col-span-2"><label class="block text-sm font-bold text-slate-700 mb-2">Company</label><input type="text" value="${item.company || ''}" oninput="updateExperience(${index}, 'company', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                                                    <div class="md:col-span-2"><label class="block text-sm font-bold text-slate-700 mb-2">Description</label><textarea rows="3" oninput="updateExperience(${index}, 'desc', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">${item.desc || ''}</textarea></div>
                                                                                </div>`;
                    container.appendChild(row);
                });
                document.getElementById('experienceInput').value = JSON.stringify(experienceData);
            };
            window.addExperience = function () { experienceData.push({ period: '', title: '', company: '', desc: '' }); renderExperience(); };
            window.removeExperience = function (index) { safeConfirm('Remove Experience', 'Remove this experience entry?', () => { experienceData.splice(index, 1); renderExperience(); }); };
            window.updateExperience = function (index, key, value) { experienceData[index][key] = value; document.getElementById('experienceInput').value = JSON.stringify(experienceData); };

            // --- Education Section ---
            let savedEducation = @json(json_decode($content->get('home.education')?->value ?? '[]', true));
            const defaultEducation = [
                { degree: 'Post Graduate Diploma', institution: 'Kenya School of Law', year: '2021', desc: 'ATP completion with honors.' },
                { degree: 'Bachelor of Laws (LL.B)', institution: 'University of Nairobi', year: '2019', desc: 'Second Class Honors (Upper Division).' }
            ];

            if (!Array.isArray(savedEducation)) savedEducation = null;
            let educationData = savedEducation || defaultEducation;

            window.renderEducation = function () {
                const container = document.getElementById('education-list');
                if (!container) return;
                container.innerHTML = '';
                educationData.forEach((item, index) => {
                    const row = document.createElement('div');
                    row.className = 'p-6 bg-slate-50 rounded-lg relative group';
                    row.innerHTML = `
                                                                                <button type="button" onclick="removeEducation(${index})" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-opacity">
                                                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                                                </button>
                                                                                <div class="grid md:grid-cols-2 gap-4">
                                                                                    <div class="md:col-span-2"><label class="block text-sm font-bold text-slate-700 mb-2">Degree/Qualification</label><input type="text" value="${item.degree || ''}" oninput="updateEducation(${index}, 'degree', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                                                    <div><label class="block text-sm font-bold text-slate-700 mb-2">Institution</label><input type="text" value="${item.institution || ''}" oninput="updateEducation(${index}, 'institution', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                                                    <div><label class="block text-sm font-bold text-slate-700 mb-2">Year</label><input type="text" value="${item.year || ''}" oninput="updateEducation(${index}, 'year', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                                                    <div class="md:col-span-2"><label class="block text-sm font-bold text-slate-700 mb-2">Description</label><textarea rows="2" oninput="updateEducation(${index}, 'desc', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">${item.desc || ''}</textarea></div>
                                                                                </div>`;
                    container.appendChild(row);
                });
                document.getElementById('educationInput').value = JSON.stringify(educationData);
            };
            window.addEducation = function () { educationData.push({ degree: '', institution: '', year: '', desc: '' }); renderEducation(); };
            window.removeEducation = function (index) { safeConfirm('Remove Education', 'Remove this education entry?', () => { educationData.splice(index, 1); renderEducation(); }); };
            window.updateEducation = function (index, key, value) { educationData[index][key] = value; document.getElementById('educationInput').value = JSON.stringify(educationData); };

            // --- Achievements Section ---
            let savedAchievements = @json(json_decode($content->get('home.achievements')?->value ?? '[]', true));
            const defaultAchievements = [
                { number: '2023', title: 'Top litigator', desc: 'Law Society of Kenya (Nairobi Branch)' },
                { number: '50+', title: 'Cases Won', desc: 'High Court & Magistrates Court' },
                { number: '98%', title: 'Client Satisfaction', desc: 'Based on exit surveys' },
                { number: 'Pro', title: 'Pro Bono Award', desc: 'Service to Community' }
            ];

            if (!Array.isArray(savedAchievements)) savedAchievements = null;
            let achievementsData = savedAchievements || defaultAchievements;

            window.renderAchievements = function () {
                const container = document.getElementById('achievements-list');
                if (!container) return;
                container.innerHTML = '';
                achievementsData.forEach((item, index) => {
                    const row = document.createElement('div');
                    row.className = 'p-6 bg-slate-50 rounded-lg relative group h-full';
                    row.innerHTML = `
                                                                                <button type="button" onclick="removeAchievement(${index})" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-opacity">
                                                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                                                </button>
                                                                                <div class="space-y-4">
                                                                                    <div><label class="block text-sm font-bold text-slate-700 mb-2">Number/Year</label><input type="text" value="${item.number || ''}" oninput="updateAchievement(${index}, 'number', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                                                    <div><label class="block text-sm font-bold text-slate-700 mb-2">Title</label><input type="text" value="${item.title || ''}" oninput="updateAchievement(${index}, 'title', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                                                    <div><label class="block text-sm font-bold text-slate-700 mb-2">Description</label><input type="text" value="${item.desc || ''}" oninput="updateAchievement(${index}, 'desc', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                                                </div>`;
                    container.appendChild(row);
                });
                document.getElementById('achievementsInput').value = JSON.stringify(achievementsData);
            };
            window.addAchievement = function () { achievementsData.push({ number: '', title: '', desc: '' }); renderAchievements(); };
            window.removeAchievement = function (index) { safeConfirm('Remove Achievement', 'Remove this achievement?', () => { achievementsData.splice(index, 1); renderAchievements(); }); };
            window.updateAchievement = function (index, key, value) { achievementsData[index][key] = value; document.getElementById('achievementsInput').value = JSON.stringify(achievementsData); };

            // --- Social Media Section ---
            let savedSocialMedia = @json(json_decode($content->get('footer.social_media')?->value ?? '[]', true));
            const defaultSocialMedia = [
                { platform: 'Twitter', url: 'https://twitter.com/', icon: 'twitter' },
                { platform: 'LinkedIn', url: 'https://linkedin.com/', icon: 'linkedin' },
                { platform: 'Facebook', url: 'https://facebook.com/', icon: 'facebook' }
            ];

            if (!Array.isArray(savedSocialMedia)) savedSocialMedia = null;
            let socialMediaData = savedSocialMedia || defaultSocialMedia;

            window.renderSocialMedia = function () {
                const container = document.getElementById('social-media-list');
                if (!container) return;
                container.innerHTML = '';
                socialMediaData.forEach((item, index) => {
                    const row = document.createElement('div');
                    row.className = 'p-6 bg-slate-50 rounded-lg relative group';
                    row.innerHTML = `
                                                                        <button type="button" onclick="removeSocialMedia(${index})" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-opacity">
                                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                                        </button>
                                                                        <div class="grid md:grid-cols-2 gap-4">
                                                                            <div>
                                                                                <label class="block text-sm font-bold text-slate-700 mb-2">Platform</label>
                                                                                <select onchange="updateSocialMedia(${index}, 'platform', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">
                                                                                    <option value="Twitter" ${item.platform === 'Twitter' ? 'selected' : ''}>Twitter</option>
                                                                                    <option value="LinkedIn" ${item.platform === 'LinkedIn' ? 'selected' : ''}>LinkedIn</option>
                                                                                    <option value="Facebook" ${item.platform === 'Facebook' ? 'selected' : ''}>Facebook</option>
                                                                                    <option value="Instagram" ${item.platform === 'Instagram' ? 'selected' : ''}>Instagram</option>
                                                                                    <option value="YouTube" ${item.platform === 'YouTube' ? 'selected' : ''}>YouTube</option>
                                                                                    <option value="GitHub" ${item.platform === 'GitHub' ? 'selected' : ''}>GitHub</option>
                                                                                    <option value="TikTok" ${item.platform === 'TikTok' ? 'selected' : ''}>TikTok</option>
                                                                                    <option value="WhatsApp" ${item.platform === 'WhatsApp' ? 'selected' : ''}>WhatsApp</option>
                                                                                </select>
                                                                            </div>
                                                                            <div><label class="block text-sm font-bold text-slate-700 mb-2">URL</label><input type="url" value="${item.url || ''}" oninput="updateSocialMedia(${index}, 'url', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white" placeholder="https://"></div>
                                                                        </div>`;
                    container.appendChild(row);
                });
                document.getElementById('socialMediaInput').value = JSON.stringify(socialMediaData);
            };
            window.addSocialMedia = function () { socialMediaData.push({ platform: 'Twitter', url: '' }); renderSocialMedia(); };
            window.removeSocialMedia = function (index) { safeConfirm('Remove Platform', 'Remove this social media platform?', () => { socialMediaData.splice(index, 1); renderSocialMedia(); }); };
            window.updateSocialMedia = function (index, key, value) { socialMediaData[index][key] = value; document.getElementById('socialMediaInput').value = JSON.stringify(socialMediaData); };

            // --- Testimonials Section ---
            let savedTestimonials = @json(json_decode($content->get('home.testimonials')?->value ?? '[]', true));
            if (!Array.isArray(savedTestimonials)) savedTestimonials = null;
            let testimonialsData = savedTestimonials || [
                { name: 'John Doe', role: 'CEO, Tech Corp', review: 'Brian provided excellent legal counsel during our merger. Highly recommended.' }
            ];

            window.renderTestimonials = function () {
                const container = document.getElementById('testimonials-list');
                if (!container) return;
                container.innerHTML = '';
                testimonialsData.forEach((item, index) => {
                    const row = document.createElement('div');
                    row.className = 'p-6 bg-slate-50 rounded-lg relative group';
                    row.innerHTML = `
                                                <button type="button" onclick="removeTestimonial(${index})" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-opacity">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                                <div class="space-y-4">
                                                    <div><label class="block text-sm font-bold text-slate-700 mb-2">Client Name</label><input type="text" value="${item.name || ''}" oninput="updateTestimonial(${index}, 'name', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                    <div><label class="block text-sm font-bold text-slate-700 mb-2">Role / Company</label><input type="text" value="${item.role || ''}" oninput="updateTestimonial(${index}, 'role', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                    <div><label class="block text-sm font-bold text-slate-700 mb-2">Review</label><textarea rows="3" oninput="updateTestimonial(${index}, 'review', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">${item.review || ''}</textarea></div>
                                                </div>`;
                    container.appendChild(row);
                });
                document.getElementById('testimonialsInput').value = JSON.stringify(testimonialsData);
            };
            window.addTestimonial = function () { testimonialsData.push({ name: '', role: '', review: '' }); renderTestimonials(); };
            window.removeTestimonial = function (index) { safeConfirm('Remove Review', 'Remove this testimonial?', () => { testimonialsData.splice(index, 1); renderTestimonials(); }); };
            window.updateTestimonial = function (index, key, value) { testimonialsData[index][key] = value; document.getElementById('testimonialsInput').value = JSON.stringify(testimonialsData); };

            // --- Practice Areas Section ---
            let savedPracticeAreas = @json(json_decode($content->get('home.practice_areas')?->value ?? '[]', true));
            if (!Array.isArray(savedPracticeAreas)) savedPracticeAreas = null;
            let practiceAreasData = savedPracticeAreas || [
                { title: 'Corporate Law', icon: 'Building', desc: 'Company formation, contracts, compliance.' },
                { title: 'Civil Litigation', icon: 'Gavel', desc: 'Representation in disputes and advocacy.' },
                { title: 'Family Law', icon: 'Users', desc: 'Divorce, custody, and succession matters.' }
            ];

            const practiceIcons = ['Building', 'Gavel', 'Users', 'Scale', 'Briefcase', 'FileText', 'Shield'];

            window.renderPracticeAreas = function () {
                const container = document.getElementById('practice-areas-list');
                if (!container) return;
                container.innerHTML = '';
                practiceAreasData.forEach((item, index) => {
                    const row = document.createElement('div');
                    row.className = 'p-6 bg-slate-50 rounded-lg relative group';

                    let iconOptions = practiceIcons.map(icon => `<option value="${icon}" ${item.icon === icon ? 'selected' : ''}>${icon}</option>`).join('');

                    row.innerHTML = `
                                                        <button type="button" onclick="removePracticeArea(${index})" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-opacity">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                        </button>
                                                        <div class="grid md:grid-cols-2 gap-4">
                                                            <div><label class="block text-sm font-bold text-slate-700 mb-2">Service Title</label><input type="text" value="${item.title || ''}" oninput="updatePracticeArea(${index}, 'title', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white"></div>
                                                            <div>
                                                                <label class="block text-sm font-bold text-slate-700 mb-2">Icon</label>
                                                                <select onchange="updatePracticeArea(${index}, 'icon', this.value)" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">
                                                                    ${iconOptions}
                                                                </select>
                                                            </div>
                                                            <div class="md:col-span-2"><label class="block text-sm font-bold text-slate-700 mb-2">Description</label><textarea oninput="updatePracticeArea(${index}, 'desc', this.value)" rows="2" class="w-full px-4 py-3 border border-slate-300 rounded-lg bg-white">${item.desc || ''}</textarea></div>
                                                        </div>`;
                    container.appendChild(row);
                });
                document.getElementById('practiceAreasInput').value = JSON.stringify(practiceAreasData);
            };
            window.addPracticeArea = function () { practiceAreasData.push({ title: '', icon: 'Gavel', desc: '' }); renderPracticeAreas(); };
            window.removePracticeArea = function (index) { safeConfirm('Remove Service', 'Remove this practice area?', () => { practiceAreasData.splice(index, 1); renderPracticeAreas(); }); };
            window.updatePracticeArea = function (index, key, value) { practiceAreasData[index][key] = value; document.getElementById('practiceAreasInput').value = JSON.stringify(practiceAreasData); };

            // Initial Render
            renderExperience();
            renderEducation();
            renderAchievements();
            renderPracticeAreas();
            renderSocialMedia();
            renderTestimonials();
        });
    </script>

    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- jQuery (required for Summernote) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['codeview', 'help']]
                ]
            });
        });
    </script>
@endsection