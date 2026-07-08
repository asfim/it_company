@extends('layouts.app')

@section('title', 'Crowns IT Blog | Technology, Code & Design Insights from the Best Software Company')
@section('meta_description', 'Explore tech, design, and growth marketing guides from Crowns IT (Crown IT) - a premier software agency and custom software development company.')

@section('content')
<style>
.blog-page {
  position: relative;
  background: #f0f0ee;
  --bg: #f0f0ee;
  --bg2: #f7faf3;
  --card: rgba(255, 255, 255, 0.95);
  --surface: rgba(255, 255, 255, 0.88);
  --border: rgba(34, 197, 94, 0.14);
  --text: var(--navy);
  --muted: #4b5563;
  --accent: var(--green);
  --accent2: #16a34a;
  --accent3: #10b981;
  --shadow: rgba(34, 197, 94, 0.08);
  --line: rgba(34, 197, 94, 0.12);

  --green: #22c55e;
  --green-dark: #16a34a;
  --green-light: #dcfce7;
  --navy: #1a2744;
  --gray-text: #6b7280;
  
  color: var(--text);
}

.blog-page::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  pointer-events: none;
  z-index: -1;
  opacity: 0.35;
}

.blog-page *,
.blog-page *::before,
.blog-page *::after {
  box-sizing: border-box;
}

/* Hero Section */
.blog-hero {
  padding: 160px 48px 60px;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.orb {
  position: absolute;
  border-radius: 50%;
  filter: blur(120px);
  pointer-events: none;
  animation: drift 12s ease-in-out infinite alternate;
}

.orb-1 {
  width: 500px;
  height: 500px;
  background: radial-gradient(circle, rgba(34, 197, 94, 0.15) 0%, transparent 70%);
  top: -100px;
  left: -100px;
}

.orb-2 {
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(134, 239, 172, 0.12) 0%, transparent 70%);
  bottom: 0;
  right: -100px;
  animation-delay: -6s;
}

@keyframes drift {
  0% { transform: translate(0, 0) scale(1); }
  100% { transform: translate(30px, 40px) scale(1.05); }
}

.blog-hero-content {
  max-width: 800px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

.blog-hero h1 {
  font-family: 'Sora', sans-serif;
  font-size: clamp(2.5rem, 5vw, 3.8rem);
  font-weight: 900;
  line-height: 1.1;
  letter-spacing: -0.03em;
  margin-bottom: 20px;
}

.blog-hero h1 em {
  font-style: normal;
  background: linear-gradient(135deg, var(--accent) 0%, var(--accent2) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.blog-hero p {
  font-size: 1.1rem;
  color: var(--muted);
  line-height: 1.7;
  max-width: 580px;
  margin: 0 auto 40px;
}

/* Featured Section */
.featured-section {
  max-width: 1200px;
  margin: 0 auto 80px;
  padding: 0 48px;
}

.featured-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 24px;
  overflow: hidden;
  display: grid;
  grid-template-columns: 1.2fr 1fr;
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.03);
  transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}

.featured-card:hover {
  border-color: rgba(34, 197, 94, 0.35);
  box-shadow: 0 30px 60px rgba(34, 197, 94, 0.08);
}

.featured-img-wrapper {
  position: relative;
  overflow: hidden;
  height: 100%;
  min-height: 350px;
}

.featured-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.featured-card:hover .featured-img {
  transform: scale(1.03);
}

.featured-tag {
  position: absolute;
  top: 24px;
  left: 24px;
  background: var(--navy);
  color: #fff;
  padding: 6px 14px;
  border-radius: 100px;
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  text-transform: uppercase;
  z-index: 2;
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.featured-content {
  padding: 48px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.post-meta {
  display: flex;
  align-items: center;
  gap: 16px;
  font-size: 0.82rem;
  color: var(--muted);
  margin-bottom: 20px;
  font-weight: 500;
}

.post-meta span {
  display: flex;
  align-items: center;
  gap: 6px;
}

.featured-content h2 {
  font-family: 'Sora', sans-serif;
  font-size: clamp(1.8rem, 3vw, 2.3rem);
  font-weight: 800;
  line-height: 1.2;
  margin-bottom: 16px;
  letter-spacing: -0.02em;
}

.featured-content h2 a {
  color: var(--text);
  text-decoration: none;
  transition: color 0.3s;
}

.featured-content h2 a:hover {
  color: var(--accent2);
}

.featured-content p {
  font-size: 0.98rem;
  line-height: 1.7;
  color: var(--muted);
  margin-bottom: 32px;
}

.author-info {
  display: flex;
  align-items: center;
  gap: 12px;
  border-top: 1px solid rgba(0, 0, 0, 0.05);
  padding-top: 24px;
}

.author-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: var(--navy);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 0.9rem;
}

.author-details .name {
  font-weight: 700;
  font-size: 0.9rem;
  color: var(--text);
}

.author-details .role {
  font-size: 0.75rem;
  color: var(--muted);
}

/* Categories & Filters */
.blog-filters-section {
  max-width: 1200px;
  margin: 0 auto 40px;
  padding: 0 48px;
  display: flex;
  justify-content: center;
}

.filter-btn-group {
  display: flex;
  gap: 10px;
  background: rgba(255, 255, 255, 0.6);
  padding: 6px;
  border-radius: 100px;
  border: 1px solid var(--border);
  flex-wrap: wrap;
  justify-content: center;
}

.blog-filter-btn {
  background: none;
  border: none;
  padding: 10px 24px;
  font-family: 'Sora', sans-serif;
  font-size: 0.88rem;
  font-weight: 600;
  color: var(--muted);
  cursor: pointer;
  transition: all 0.3s ease;
  border-radius: 100px;
}

.blog-filter-btn:hover {
  color: var(--text);
}

.blog-filter-btn.active {
  background: var(--accent);
  color: #fff;
  box-shadow: 0 6px 15px rgba(34, 197, 94, 0.25);
}

/* Post Grid */
.posts-grid-section {
  max-width: 1200px;
  margin: 0 auto 100px;
  padding: 0 48px;
}

.blog-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 32px;
}

.blog-card-wrapper {
  opacity: 0;
  transform: translateY(30px);
  animation: revealCard 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

@keyframes revealCard {
  to { opacity: 1; transform: translateY(0); }
}

.blog-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 20px;
  overflow: hidden;
  height: 100%;
  display: flex;
  flex-direction: column;
  transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
}

.blog-card:hover {
  transform: translateY(-8px);
  border-color: rgba(34, 197, 94, 0.3);
  box-shadow: 0 20px 40px rgba(34, 197, 94, 0.08);
}

.card-img-wrapper {
  height: 200px;
  position: relative;
  overflow: hidden;
}

.card-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.5s ease;
}

.blog-card:hover .card-img {
  transform: scale(1.05);
}

.card-tag {
  position: absolute;
  top: 16px;
  left: 16px;
  background: var(--card);
  color: var(--text);
  padding: 5px 12px;
  border-radius: 100px;
  font-size: 0.7rem;
  font-weight: 700;
  letter-spacing: 0.02em;
  text-transform: uppercase;
  border: 1px solid var(--border);
  box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

.card-body-content {
  padding: 28px;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.card-body-content h3 {
  font-family: 'Sora', sans-serif;
  font-size: 1.2rem;
  font-weight: 800;
  margin-bottom: 12px;
  line-height: 1.35;
}

.card-body-content h3 a {
  color: var(--text);
  text-decoration: none;
  transition: color 0.3s;
}

.card-body-content h3 a:hover {
  color: var(--accent2);
}

.card-body-content p {
  font-size: 0.88rem;
  line-height: 1.6;
  color: var(--muted);
  margin-bottom: 24px;
  flex-grow: 1;
}

/* Newsletter Section */
.newsletter-section {
  padding: 100px 48px;
  background: var(--bg2);
  border-top: 1px solid var(--border);
}

.newsletter-box {
  max-width: 800px;
  margin: 0 auto;
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 28px;
  padding: 60px;
  text-align: center;
  position: relative;
  overflow: hidden;
  box-shadow: 0 20px 50px rgba(34, 197, 94, 0.05);
}

.newsletter-box::before {
  content: '';
  position: absolute;
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(34, 197, 94, 0.08) 0%, transparent 70%);
  top: -200px;
  right: -200px;
  pointer-events: none;
}

.newsletter-box h2 {
  font-family: 'Sora', sans-serif;
  font-size: clamp(1.8rem, 3.5vw, 2.5rem);
  font-weight: 900;
  margin-bottom: 14px;
}

.newsletter-box p {
  color: var(--muted);
  font-size: 1rem;
  max-width: 500px;
  margin: 0 auto 36px;
  line-height: 1.6;
}

.subscribe-form {
  display: flex;
  gap: 12px;
  max-width: 500px;
  margin: 0 auto;
  background: #f1f5f9;
  padding: 6px;
  border-radius: 50px;
  border: 1px solid var(--border);
}

.subscribe-form input {
  flex: 1;
  border: none;
  background: none;
  padding: 12px 24px;
  font-size: 0.95rem;
  outline: none;
  font-family: inherit;
  color: var(--text);
}

.subscribe-form button {
  background: var(--accent);
  color: #fff;
  border: none;
  padding: 12px 30px;
  border-radius: 50px;
  font-weight: 600;
  font-size: 0.95rem;
  cursor: pointer;
  transition: all 0.3s;
  box-shadow: 0 4px 15px rgba(34, 197, 94, 0.25);
}

.subscribe-form button:hover {
  background: var(--green-dark);
  transform: translateY(-1px);
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(24px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Responsive Overrides */
@media (max-width: 1024px) {
  .blog-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .blog-hero {
    padding: 140px 20px 40px;
  }
  .featured-section,
  .blog-filters-section,
  .posts-grid-section,
  .newsletter-section {
    padding: 0 20px;
  }
  .featured-card {
    grid-template-columns: 1fr;
  }
  .featured-content {
    padding: 32px;
  }
  .blog-grid {
    grid-template-columns: 1fr;
  }
  .newsletter-box {
    padding: 40px 24px;
  }
  .subscribe-form {
    flex-direction: column;
    background: none;
    border: none;
    padding: 0;
    gap: 12px;
  }
  .subscribe-form input {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 50px;
    padding: 16px 24px;
  }
  .subscribe-form button {
    padding: 16px;
  }
}
</style>

<div class="blog-page">
  <!-- Hero Section -->
  <section class="blog-hero">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="blog-hero-content">
      <h1>Crowns IT <em>Tech Hub</em></h1>
      <p>Expert opinions, guides, and engineering stories from our software development, design, and growth marketing teams.</p>
    </div>
  </section>

  <!-- Featured Post Section -->
  @if($featured)
  <section class="featured-section reveal">
    <div class="featured-card">
      <div class="featured-img-wrapper">
        <span class="featured-tag">Featured Article</span>
        <img class="featured-img" src="{{ asset($featured->image_url) }}" alt="{{ $featured->title }}">
      </div>
      <div class="featured-content">
        <div class="post-meta">
          <span class="post-cat" style="color:var(--accent2); font-weight:700;">
            @if($featured->category == 'dev')
              <i class="fa-solid fa-code"></i> DEVELOPMENT
            @elseif($featured->category == 'design')
              <i class="fa-solid fa-palette"></i> DESIGN & UX
            @elseif($featured->category == 'publishing')
              <i class="fa-solid fa-book"></i> AMAZON PUBLISHING
            @else
              <i class="fa-solid fa-bullhorn"></i> GROWTH MARKETING
            @endif
          </span>
          <span><i class="fa-regular fa-clock"></i> {{ $featured->read_time }}</span>
        </div>
        <h2><a href="{{ route('blog.show', $featured->slug) }}">{{ $featured->title }}</a></h2>
        <p>{{ $featured->excerpt }}</p>
        <div class="author-info">
          <div class="author-avatar">{{ $featured->author_avatar_text }}</div>
          <div class="author-details">
            <div class="name">{{ $featured->author_name }}</div>
            <div class="role">{{ $featured->author_role }}</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif

  <!-- Categories Filters Menu -->
  <section class="blog-filters-section">
    <div class="filter-btn-group">
      <button class="blog-filter-btn active" onclick="filterBlog('all', this)">All Insights</button>
      <button class="blog-filter-btn" onclick="filterBlog('dev', this)">Development</button>
      <button class="blog-filter-btn" onclick="filterBlog('design', this)">Design & UX</button>
      <button class="blog-filter-btn" onclick="filterBlog('publishing', this)">Amazon Publishing</button>
      <button class="blog-filter-btn" onclick="filterBlog('marketing', this)">Growth Marketing</button>
    </div>
  </section>

  <!-- Blog Cards Grid Section -->
  <section class="posts-grid-section">
    <div class="blog-grid">
      @foreach($posts as $post)
      <div class="blog-card-wrapper" data-category="{{ $post->category }}">
        <div class="blog-card">
          <div class="card-img-wrapper">
            <span class="card-tag">
              @if($post->category == 'dev')
                DEVELOPMENT
              @elseif($post->category == 'design')
                DESIGN & UX
              @elseif($post->category == 'publishing')
                AMAZON PUBLISHING
              @else
                GROWTH MARKETING
              @endif
            </span>
            <img class="card-img" src="{{ asset($post->image_url) }}" alt="{{ $post->title }}">
          </div>
          <div class="card-body-content">
            <div class="post-meta">
              <span><i class="fa-regular fa-calendar"></i> {{ $post->created_at->format('M d, Y') }}</span>
              <span><i class="fa-regular fa-clock"></i> {{ $post->read_time }}</span>
            </div>
            <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
            <p>{{ $post->excerpt }}</p>
            <div class="author-info">
              <div class="author-avatar" style="background:var(--accent);">{{ $post->author_avatar_text }}</div>
              <div class="author-details">
                <div class="name">{{ $post->author_name }}</div>
                <div class="role">{{ $post->author_role }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  <!-- Newsletter Signup Section -->
  <section class="newsletter-section">
    <div class="newsletter-box reveal">
      <h2>Stay Ahead of the Curve</h2>
      <p>Subscribe to get the latest tech insights, design systems guides, and publishing tutorials delivered straight to your inbox.</p>
      <form class="subscribe-form" onsubmit="event.preventDefault(); alert('Subscribed successfully!');">
        <input type="email" placeholder="Enter your business email" required>
        <button type="submit">Subscribe</button>
      </form>
    </div>
  </section>
</div>

@push('scripts')
<script>
  // Filter Blog Grid
  function filterBlog(category, btn) {
    document.querySelectorAll('.blog-filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const cards = document.querySelectorAll('.blog-card-wrapper');
    cards.forEach(card => {
      if (category === 'all' || card.getAttribute('data-category') === category) {
        card.style.display = 'block';
        card.style.animation = 'none';
        // Trigger reflow to restart animation
        card.offsetHeight; 
        card.style.animation = 'revealCard 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards';
      } else {
        card.style.display = 'none';
      }
    });
  }

  // Scroll Reveal Observer
  function initScrollReveal() {
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
          setTimeout(() => entry.target.classList.add('in-view'), i * 60);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.05 });
    reveals.forEach(el => observer.observe(el));
  }

  document.addEventListener('DOMContentLoaded', () => {
    initScrollReveal();
  });
</script>
@endpush
@endsection
