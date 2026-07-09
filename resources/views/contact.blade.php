@extends('layouts.app')

@section('title', 'Contact Crowns IT | Connect with Our Software Agency')
@section('meta_description', 'Get in touch with Crowns IT (Crown IT) - the best software company and development agency. Request a free quote for web development and software engineering.')

@section('content')
    <!-- Hero -->
    <section class="about-hero">
        <div class="about-hero-inner reveal">
            <span class="about-eyebrow">Contact Us</span>
            <h1>Let's Build Something <span>Great Together</span></h1>
            <p>Have a project in mind or need expert advice? Reach out to our team — we'd love to hear from you. We typically respond within 24 hours on business days.</p>
        </div>
    </section>

    <!-- Contact Main -->
    <section class="contact-main-section">
        <div class="contact-layout reveal">
            <!-- Contact Info -->
            <div class="contact-info-panel">
                <h2>Get In <span style="color: var(--green);">Touch</span></h2>
                <p>Whether you need a new website, custom software, marketing support, or creative design — our team is ready to help you move forward with confidence.</p>

                <div class="contact-info-cards">
                    <div class="contact-info-card">
                        <div class="contact-info-icon"><i data-lucide="map-pin"></i></div>
                        <div>
                            <h4>Office Address</h4>
                            <p>{{ \App\Models\HomepageSetting::getValue('contact_address', '123 Tech Avenue, Dhaka, Bangladesh') }}</p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <div class="contact-info-icon"><i data-lucide="phone"></i></div>
                        <div>
                            <h4>Phone</h4>
                            <p><a href="tel:{{ \App\Models\HomepageSetting::getValue('contact_phone', '+8801234567890') }}">{{ \App\Models\HomepageSetting::getValue('contact_phone', '+880 1234 567 890') }}</a></p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <div class="contact-info-icon"><i data-lucide="mail"></i></div>
                        <div>
                            <h4>Email</h4>
                            <p><a href="mailto:{{ \App\Models\HomepageSetting::getValue('contact_email', 'info@crownsit.com') }}">{{ \App\Models\HomepageSetting::getValue('contact_email', 'info@crownsit.com') }}</a></p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <div class="contact-info-icon"><i data-lucide="clock"></i></div>
                        <div>
                            <h4>Working Hours</h4>
                            <p>{!! nl2br(e(\App\Models\HomepageSetting::getValue('contact_working_hours', "Sat – Thu: 9:00 AM – 6:00 PM\nFriday: Closed"))) !!}</p>
                        </div>
                    </div>
                </div>

                <div class="contact-social-block">
                    <h4>Follow Us</h4>
                    <div class="contact-socials">
                        @foreach(\App\Models\SocialLink::orderBy('sort_order')->get() as $link)
                            @php
                                $iconClass = match($link->platform) {
                                    'facebook' => 'fa-brands fa-facebook-f',
                                    'twitter', 'x' => 'fa-brands fa-x-twitter',
                                    'instagram' => 'fa-brands fa-instagram',
                                    'linkedin' => 'fa-brands fa-linkedin-in',
                                    'youtube' => 'fa-brands fa-youtube',
                                    'github' => 'fa-brands fa-github',
                                    'tiktok' => 'fa-brands fa-tiktok',
                                    'pinterest' => 'fa-brands fa-pinterest-p',
                                    'whatsapp' => 'fa-brands fa-whatsapp',
                                    default => 'fa-solid fa-globe',
                                };
                            @endphp
                            <a href="{{ $link->url }}" target="_blank" aria-label="{{ $link->platform }}"><i class="{{ $iconClass }}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-panel">
                <h3>Send Us a Message</h3>
                <p class="contact-form-sub">Fill out the form below and we'll get back to you as soon as possible.</p>

                @if(session('success'))
                    <div class="contact-alert contact-alert-success">
                        <i data-lucide="check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="contact-alert contact-alert-error">
                        <i data-lucide="alert-circle"></i>
                        Please fix the errors below and try again.
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="contact-form-row">
                        <div class="contact-field">
                            <label for="name">Full Name <span>*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Your name" required>
                            @error('name')<span class="contact-field-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="contact-field">
                            <label for="email">Email Address <span>*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                            @error('email')<span class="contact-field-error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="contact-form-row">
                        <div class="contact-field">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+880 1XXX XXXXXX">
                            @error('phone')<span class="contact-field-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="contact-field">
                            <label for="service">Service Interested In</label>
                            <select id="service" name="service">
                                <option value="">Select a service</option>
                                <option value="Web Application" @selected(old('service') == 'Web Application')>Web Application</option>
                                <option value="Web Development" @selected(old('service') == 'Web Development')>Web Development</option>
                                <option value="Custom Software" @selected(old('service') == 'Custom Software')>Custom Software</option>
                                <option value="Digital Marketing" @selected(old('service') == 'Digital Marketing')>Digital Marketing</option>
                                <option value="Graphics Design" @selected(old('service') == 'Graphics Design')>Graphics Design</option>
                                <option value="UI/UX Design" @selected(old('service') == 'UI/UX Design')>UI/UX Design</option>
                                <option value="Other" @selected(old('service') == 'Other')>Other</option>
                            </select>
                            @error('service')<span class="contact-field-error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="contact-field">
                        <label for="subject">Subject <span>*</span></label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="How can we help?" required>
                        @error('subject')<span class="contact-field-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="contact-field">
                        <label for="message">Message <span>*</span></label>
                        <textarea id="message" name="message" rows="5" placeholder="Tell us about your project..." required>{{ old('message') }}</textarea>
                        @error('message')<span class="contact-field-error">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn-read-more contact-submit-btn">
                        Send Message <i data-lucide="send"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Map / Branch -->
    <section class="contact-map-section">
        <div class="contact-map-inner reveal">
            <div class="contact-map-text">
                <span class="about-eyebrow">Our Office</span>
                <h2>Visit Our <span style="color: var(--green);">Dhaka Branch</span></h2>
                <p>Located in the heart of Dhaka's tech district, our office is open for in-person meetings by appointment. Schedule a visit and let's discuss your project face to face.</p>
                <a href="{{ \App\Models\HomepageSetting::getValue('contact_map_link', 'https://maps.google.com/?q=Dhaka,Bangladesh') }}" target="_blank" rel="noopener" class="btn-read-more" style="margin-top: 1rem;">
                    Open in Google Maps <i data-lucide="external-link"></i>
                </a>
            </div>
            <div class="contact-map-embed">
                <iframe
                    src="{{ \App\Models\HomepageSetting::getValue('contact_map_embed', 'https://maps.google.com/maps?q=Dhaka%2C%20Bangladesh&z=13&output=embed') }}"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Crowns IT office location on Google Maps">
                </iframe>
            </div>
        </div>
    </section>

    <!-- FAQ quick -->
    <section class="contact-faq-section">
        <div class="about-section-head reveal">
            <span class="about-eyebrow">Before You Reach Out</span>
            <h2>Quick <span style="color: var(--green);">Answers</span></h2>
        </div>
        <div class="contact-faq-grid reveal">
            <div class="contact-faq-card">
                <h4>How fast do you respond?</h4>
                <p>We aim to reply to all inquiries within 24 hours on business days. Urgent requests can call us directly.</p>
            </div>
            <div class="contact-faq-card">
                <h4>Is the consultation free?</h4>
                <p>Yes! Initial consultation and project estimation are completely free with no obligation.</p>
            </div>
            <div class="contact-faq-card">
                <h4>Do you work with international clients?</h4>
                <p>Absolutely. We serve clients in Bangladesh and internationally via remote collaboration.</p>
            </div>
        </div>
    </section>
@endsection
