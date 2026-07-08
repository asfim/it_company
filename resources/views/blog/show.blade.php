@extends('layouts.app')

@section('title', $post->title . ' | Crowns IT Blog')
@section('meta_description', $post->excerpt)

@section('content')
<style>
.blog-detail-page {
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
  
  --green: #22c55e;
  --navy: #1a2744;
  --gray-text: #6b7280;
  
  color: var(--text);
  padding: 140px 24px 80px;
}

.blog-detail-page::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  pointer-events: none;
  z-index: -1;
  opacity: 0.35;
}

.detail-container {
  max-width: 900px;
  margin: 0 auto;
}

.back-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  color: var(--muted);
  text-decoration: none;
  font-weight: 600;
  font-size: 0.9rem;
  margin-bottom: 32px;
  transition: color 0.3s;
}

.back-btn:hover {
  color: var(--accent2);
}

.post-header {
  margin-bottom: 40px;
}

.post-category-badge {
  display: inline-block;
  background: var(--navy);
  color: #fff;
  padding: 6px 16px;
  border-radius: 100px;
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  text-transform: uppercase;
  margin-bottom: 20px;
}

.post-title {
  font-family: 'Sora', sans-serif;
  font-size: clamp(2rem, 4.5vw, 3.2rem);
  font-weight: 900;
  line-height: 1.15;
  letter-spacing: -0.02em;
  margin-bottom: 24px;
}

.post-meta-details {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 24px;
  border-bottom: 1px solid var(--border);
  padding-bottom: 24px;
}

.meta-author {
  display: flex;
  align-items: center;
  gap: 12px;
}

.meta-avatar {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: var(--accent);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 0.95rem;
}

.meta-author-info .name {
  font-weight: 700;
  font-size: 0.95rem;
}

.meta-author-info .role {
  font-size: 0.75rem;
  color: var(--muted);
}

.meta-post-info {
  display: flex;
  gap: 16px;
  font-size: 0.88rem;
  color: var(--muted);
  font-weight: 500;
}

.meta-post-info span {
  display: flex;
  align-items: center;
  gap: 6px;
}

.post-cover-wrapper {
  border-radius: 24px;
  overflow: hidden;
  margin-bottom: 48px;
  border: 1px solid var(--border);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.04);
}

.post-cover-img {
  width: 100%;
  height: auto;
  max-height: 500px;
  object-fit: cover;
  display: block;
}

.post-body-content {
  font-size: 1.1rem;
  line-height: 1.8;
  color: #374151;
}

.post-body-content p {
  margin-bottom: 28px;
}

/* Related Posts */
.related-posts-section {
  max-width: 1200px;
  margin: 80px auto 0;
  border-top: 1px solid var(--border);
  padding-top: 60px;
}

.related-title {
  font-family: 'Sora', sans-serif;
  font-size: 1.8rem;
  font-weight: 800;
  margin-bottom: 32px;
  text-align: center;
}

.related-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 32px;
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
  height: 180px;
  position: relative;
  overflow: hidden;
}

.card-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
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
}

.card-body-content {
  padding: 24px;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.card-body-content h3 {
  font-family: 'Sora', sans-serif;
  font-size: 1.1rem;
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
  font-size: 0.85rem;
  line-height: 1.6;
  color: var(--muted);
  margin-bottom: 20px;
  flex-grow: 1;
}

.author-info {
  display: flex;
  align-items: center;
  gap: 12px;
  border-top: 1px solid rgba(0, 0, 0, 0.05);
  padding-top: 16px;
}

.author-avatar {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: var(--navy);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 0.8rem;
}

.author-details .name {
  font-weight: 700;
  font-size: 0.8rem;
  color: var(--text);
}

.author-details .role {
  font-size: 0.7rem;
  color: var(--muted);
}

@media (max-width: 768px) {
  .blog-detail-page {
    padding: 120px 16px 60px;
  }
  .related-grid {
    grid-template-columns: 1fr;
  }
  .post-meta-details {
    flex-direction: column;
    align-items: flex-start;
    gap: 16px;
  }
}
</style>

<div class="blog-detail-page">
  <div class="detail-container">
    <a href="{{ route('blog') }}" class="back-btn">
      <i class="fa-solid fa-arrow-left"></i> Back to Insights
    </a>

    <article>
      <header class="post-header">
        <span class="post-category-badge">
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
        <h1 class="post-title">{{ $post->title }}</h1>

        <div class="post-meta-details">
          <div class="meta-author">
            <div class="meta-avatar">{{ $post->author_avatar_text }}</div>
            <div class="meta-author-info">
              <div class="name">{{ $post->author_name }}</div>
              <div class="role">{{ $post->author_role }}</div>
            </div>
          </div>
          <div class="meta-post-info">
            <span><i class="fa-regular fa-calendar"></i> {{ $post->created_at->format('M d, Y') }}</span>
            <span><i class="fa-regular fa-clock"></i> {{ $post->read_time }}</span>
          </div>
        </div>
      </header>

      @if($post->image_url)
        <div class="post-cover-wrapper animate__animated animate__fadeIn">
          <img class="post-cover-img" src="{{ asset($post->image_url) }}" alt="{{ $post->title }}">
        </div>
      @endif

      <div class="post-body-content">
        {!! nl2br(e($post->content)) !!}
      </div>
    </article>
  </div>

  <!-- Related Posts Section -->
  @if($relatedPosts->count() > 0)
    <section class="related-posts-section">
      <h2 class="related-title">Recommended Reading</h2>
      <div class="related-grid">
        @foreach($relatedPosts as $related)
          <div class="blog-card">
            <div class="card-img-wrapper">
              <span class="card-tag">
                @if($related->category == 'dev')
                  DEVELOPMENT
                @elseif($related->category == 'design')
                  DESIGN & UX
                @elseif($related->category == 'publishing')
                  AMAZON PUBLISHING
                @else
                  GROWTH MARKETING
                @endif
              </span>
              <img class="card-img" src="{{ asset($related->image_url) }}" alt="{{ $related->title }}">
            </div>
            <div class="card-body-content">
              <h3><a href="{{ route('blog.show', $related->slug) }}">{{ $related->title }}</a></h3>
              <p>{{ $related->excerpt }}</p>
              <div class="author-info">
                <div class="author-avatar">{{ $related->author_avatar_text }}</div>
                <div class="author-details">
                  <div class="name">{{ $related->author_name }}</div>
                  <div class="role">{{ $related->author_role }}</div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>
  @endif
</div>
@endsection
