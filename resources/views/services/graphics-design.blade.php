@extends('layouts.app')

@section('title', 'Professional Graphic Design, Publishing & Image Editing | Crowns IT')
@section('meta_description', 'Crowns IT delivers premium graphic design, logo design, book cover & formatting, KDP publishing uploads, Amazon A+ content, social media posters, and high-volume e-commerce photo editing.')

@section('content')
@php
    $sections = $sections ?? collect();
    $heroBackground = $sections->get('hero_background');
    $serviceImages = [
        'service_logo' => $sections->get('service_logo'),
        'service_book_cover' => $sections->get('service_book_cover'),
        'service_formatting' => $sections->get('service_formatting'),
        'service_amazon_aplus' => $sections->get('service_amazon_aplus'),
        'service_social' => $sections->get('service_social'),
        'service_business_card' => $sections->get('service_business_card'),
        'service_flyer' => $sections->get('service_flyer'),
        'service_brochure' => $sections->get('service_brochure'),
    ];
    $portfolioImages = [
        $sections->get('portfolio_1'),
        $sections->get('portfolio_2'),
        $sections->get('portfolio_3'),
        $sections->get('portfolio_4'),
        $sections->get('portfolio_5'),
        $sections->get('portfolio_6'),
        $sections->get('portfolio_7'),
        $sections->get('portfolio_8'),
        $sections->get('portfolio_9'),
        $sections->get('portfolio_10'),
        $sections->get('portfolio_11'),
        $sections->get('portfolio_12'),
        $sections->get('portfolio_13'),
        $sections->get('portfolio_14'),
    ];
    $getImageUrl = fn ($slug, $fallback) => optional($sections->get($slug))->image_url ?? $fallback;
    $getAltText = fn ($slug, $fallback) => optional($sections->get($slug))->alt_text ?? $fallback;
@endphp
<style>
.graphics-page {
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
  --accent4: #d9f99d;
  --shadow: rgba(34, 197, 94, 0.08);
  --line: rgba(34, 197, 94, 0.12);
  --bg-dark: #f0f0ee;
  --bg-card: rgba(255, 255, 255, 0.03);

  --green: #22c55e;
  --green-dark: #16a34a;
  --green-light: #dcfce7;
  --navy: #1a2744;
  --gray-text: #6b7280;
}

.graphics-page::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  pointer-events: none;
  z-index: -1;
  opacity: 0.35;
}

.graphics-page *,
.graphics-page *::before,
.graphics-page *::after {
  box-sizing: border-box;
}

.graphics-page {
  color: var(--text);
}

/* Hero Section */
.hero {
  min-height: 100vh;
  display: flex;
  align-items: center;
  padding: 160px 48px 80px;
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
  width: 600px;
  height: 600px;
  background: radial-gradient(circle, rgba(34, 197, 94, 0.18) 0%, transparent 70%);
  top: -100px;
  left: -100px;
}

.orb-2 {
  width: 500px;
  height: 500px;
  background: radial-gradient(circle, rgba(134, 239, 172, 0.16) 0%, transparent 70%);
  top: 100px;
  right: -100px;
  animation-delay: -6s;
}

.orb-3 {
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(34, 197, 94, 0.1) 0%, transparent 70%);
  bottom: 0;
  left: 40%;
  animation-delay: -3s;
}

@keyframes drift {
  0% { transform: translate(0, 0) scale(1); }
  100% { transform: translate(30px, 40px) scale(1.05); }
}

.hero-inner {
  max-width: 1200px;
  margin: 0 auto;
  width: 100%;
  display: grid;
  grid-template-columns: 1.2fr 1fr;
  gap: 60px;
  align-items: center;
  position: relative;
  z-index: 1;
}

.hero h1 {
  font-family: 'Sora', sans-serif;
  font-size: clamp(2.8rem, 5vw, 4.2rem);
  font-weight: 900;
  line-height: 1.1;
  letter-spacing: -0.03em;
  margin-bottom: 24px;
  animation: fadeUp 0.8s ease both;
}

.hero h1 em {
  font-style: normal;
  background: linear-gradient(135deg, var(--accent) 0%, var(--accent2) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.hero-sub {
  font-size: 1.1rem;
  color: var(--muted);
  line-height: 1.7;
  max-width: 540px;
  margin-bottom: 40px;
  animation: fadeUp 0.8s ease 0.1s both;
}

.hero-actions {
  display: flex;
  gap: 16px;
  align-items: center;
  animation: fadeUp 0.8s ease 0.2s both;
}

.btn-large {
  padding: 16px 36px;
  font-size: 1.05rem;
  border-radius: 50px;
}

.hero-stats {
  display: flex;
  gap: 40px;
  margin-top: 56px;
  animation: fadeUp 0.8s ease 0.3s both;
}

.stat-item strong {
  display: block;
  font-family: 'Sora', sans-serif;
  font-size: 1.8rem;
  font-weight: 900;
  color: var(--text);
}

.stat-item span {
  font-size: 0.82rem;
  color: var(--muted);
}

/* Before-After Sketch to Vector Box */
.ba-box {
  position: relative;
  width: 100%;
  border-radius: 24px;
  overflow: hidden;
  aspect-ratio: 4/3;
  background: var(--card);
  border: 1px solid var(--border);
  box-shadow: 0 40px 80px rgba(0, 0, 0, 0.1);
  animation: fadeUp 0.8s ease 0.2s both;
}

.ba-image-container {
  position: relative;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.image-after {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}

.image-before {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  width: 50%;
  overflow: hidden;
  z-index: 2;
  border-right: 2px solid rgba(255, 255, 255, 0.7);
}

.image-after img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.before-uploaded-img {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  object-fit: cover;
  display: block;
  max-width: none;
  pointer-events: none;
}

.ba-slider {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: ew-resize;
  z-index: 5;
  appearance: none;
  -webkit-appearance: none;
  background: transparent;
  border: none;
  padding: 0;
  margin: 0;
}

.ba-line {
  position: absolute;
  left: 50%;
  top: 0;
  bottom: 0;
  width: 2px;
  background: rgba(255, 255, 255, 0.8);
  transform: translateX(-50%);
  z-index: 3;
  pointer-events: none;
}

.ba-button {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 44px;
  height: 44px;
  background: var(--accent);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  pointer-events: none;
}

/* Card Visual Before-After Override */
.card-visual-art .ba-box {
  width: 100%;
  height: 100%;
  border-radius: 0;
  border: none;
  box-shadow: none;
  aspect-ratio: auto;
  animation: none;
}
.card-visual-art .ba-button {
  width: 32px;
  height: 32px;
  font-size: 0.8rem;
}
.card-visual-art .clipping-overlay-svg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 4;
}

/* Sketch & Vector Canvas Designs */
.sketch-canvas-inner {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  background: #fbfbf9;
  background-image:
    linear-gradient(rgba(59, 130, 246, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(59, 130, 246, 0.04) 1px, transparent 1px);
  background-size: 20px 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.sketch-layout-guides {
  position: relative;
  width: 160px;
  height: 160px;
  border: 1px dashed rgba(59, 130, 246, 0.3);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sketch-layout-guides::before,
.sketch-layout-guides::after {
  content: '';
  position: absolute;
  background: rgba(59, 130, 246, 0.2);
}

.sketch-layout-guides::before { width: 200px; height: 1px; }
.sketch-layout-guides::after { height: 200px; width: 1px; }

.sketch-logo-symbol {
  font-size: 4rem;
  color: rgba(30, 64, 175, 0.4);
  transform: rotate(-8deg);
  font-weight: 300;
  font-family: 'Courier New', monospace;
}

.sketch-brand-name {
  margin-top: 24px;
  font-family: 'Courier New', Courier, monospace;
  font-weight: bold;
  font-size: 1.3rem;
  color: rgba(30, 64, 175, 0.5);
  letter-spacing: 4px;
  text-transform: uppercase;
}

.vector-canvas {
  background: #0f172a;
  background-image:
    linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
  background-size: 20px 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.vector-logo-glow {
  position: relative;
  width: 160px;
  height: 160px;
  border: 2px solid var(--accent);
  border-radius: 50%;
  background: radial-gradient(circle, rgba(34, 197, 94, 0.15) 0%, transparent 75%);
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 0 40px rgba(34, 197, 94, 0.25);
}

/* Vector control points */
.vector-anchor {
  position: absolute;
  width: 8px;
  height: 8px;
  background: #fff;
  border: 1.5px solid var(--accent);
  border-radius: 50%;
  z-index: 2;
}
.anchor-n { top: -5px; left: calc(50% - 4px); }
.anchor-e { right: -5px; top: calc(50% - 4px); }
.anchor-s { bottom: -5px; left: calc(50% - 4px); }
.anchor-w { left: -5px; top: calc(50% - 4px); }

.vector-logo-symbol {
  font-size: 4.5rem;
  color: #fff;
  filter: drop-shadow(0 0 12px var(--accent));
  animation: logoGlow 2.5s infinite alternate ease-in-out;
}

@keyframes logoGlow {
  0% { filter: drop-shadow(0 0 8px rgba(34, 197, 94, 0.6)); }
  100% { filter: drop-shadow(0 0 20px rgba(34, 197, 94, 0.9)); transform: scale(1.03); }
}

.vector-brand-name {
  margin-top: 24px;
  font-family: 'Sora', sans-serif;
  font-weight: 800;
  font-size: 1.4rem;
  color: #fff;
  letter-spacing: 5px;
  text-transform: uppercase;
  background: linear-gradient(135deg, #fff 30%, var(--accent) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* Trust Strip */
.logos-strip {
  padding: 48px;
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
  overflow: hidden;
  position: relative;
}

.logos-label {
  text-align: center;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.15em;
  color: var(--muted);
  margin-bottom: 32px;
}

.logos-track {
  display: flex;
  gap: 60px;
  align-items: center;
  animation: scroll-logos 25s linear infinite;
  width: max-content;
}

.logos-strip:hover .logos-track {
  animation-play-state: paused;
}

@keyframes scroll-logos {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.logo-item {
  font-family: 'Sora', sans-serif;
  font-weight: 700;
  font-size: 1.1rem;
  color: rgba(26, 39, 68, 0.65);
  white-space: nowrap;
  letter-spacing: -0.02em;
  transition: color 0.3s;
}

.logo-item:hover {
  color: rgba(26, 39, 68, 0.95);
}

/* Section styling */
.section {
  padding: 100px 48px;
  max-width: 1200px;
  margin: 0 auto;
}

.section-label {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.15em;
  color: var(--accent);
  margin-bottom: 20px;
  font-weight: 700;
}

.section-label::before {
  content: '';
  width: 24px;
  height: 1px;
  background: var(--accent);
}

.section h2 {
  font-family: 'Sora', sans-serif;
  font-size: clamp(2rem, 3.5vw, 3rem);
  font-weight: 900;
  letter-spacing: -0.03em;
  line-height: 1.1;
  margin-bottom: 16px;
}

.section-sub {
  color: var(--muted);
  font-size: 1.05rem;
  line-height: 1.7;
  max-width: 560px;
  margin-bottom: 60px;
}

/* Category Filter Tabs */
.filter-tabs-container {
  display: flex;
  justify-content: center;
  margin-bottom: 50px;
  border-bottom: 1px solid var(--border);
  padding-bottom: 1px;
  flex-wrap: wrap;
  gap: 10px;
}

.filter-btn {
  background: none;
  border: none;
  padding: 16px 28px;
  font-family: 'Sora', sans-serif;
  font-size: 0.95rem;
  font-weight: 600;
  color: var(--muted);
  cursor: pointer;
  transition: all 0.3s ease;
  border-bottom: 3px solid transparent;
  margin-bottom: -2px;
}

.filter-btn:hover {
  color: var(--text);
}

.filter-btn.active {
  color: var(--accent2);
  border-bottom-color: var(--accent);
}

/* Services Card Grid */
.services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 32px;
}

.service-card-wrapper {
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.service-card-wrapper.in-view {
  opacity: 1;
  transform: translateY(0);
}

.service-card {
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

.service-card:hover {
  transform: translateY(-8px);
  border-color: rgba(34, 197, 94, 0.3);
  box-shadow: 0 20px 40px rgba(34, 197, 94, 0.08);
}

/* Card Visual Mockups */
.card-visual-container {
  height: 180px;
  background: #f7faf3;
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  border-bottom: 1px solid var(--border);
}

.card-icon-tag {
  position: absolute;
  top: 16px;
  left: 16px;
  width: 38px;
  height: 38px;
  border-radius: 10px;
  background: #fff;
  border: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  color: var(--accent2);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
  z-index: 3;
}

.card-visual-art {
  /* width: 100%; */
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  transition: transform 0.4s ease;
}

.service-card:hover .card-visual-art {
  transform: scale(1.05);
}

/* 1. Logo Visual */
.vis-logo-grid {
  position: absolute;
  width: 110px;
  height: 110px;
  border: 1px solid rgba(34, 197, 94, 0.15);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.vis-logo-grid::before {
  content: '';
  position: absolute;
  width: 130px;
  height: 1px;
  background: rgba(34, 197, 94, 0.12);
  transform: rotate(45deg);
}
.vis-logo-circle {
  width: 70px;
  height: 70px;
  border: 2px solid var(--accent);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #fff;
  font-size: 1.8rem;
  color: var(--navy);
  box-shadow: 0 4px 15px rgba(34, 197, 94, 0.15);
}

/* 2. Book Cover Visual */
.vis-book-3d {
  width: 90px;
  height: 124px;
  background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
  border-radius: 4px 8px 8px 4px;
  box-shadow: 5px 10px 20px rgba(0,0,0,0.15);
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 12px;
  transform: perspective(400px) rotateY(-15deg);
  border-left: 3px solid #334155;
  transition: transform 0.4s ease;
}
.service-card:hover .vis-book-3d {
  transform: perspective(400px) rotateY(-8deg) translateY(-4px);
}
.vis-book-front-tag {
  font-size: 0.5rem;
  font-weight: 800;
  letter-spacing: 1px;
  color: var(--accent);
  text-transform: uppercase;
}
.vis-book-title {
  font-family: 'Sora', sans-serif;
  font-size: 0.65rem;
  font-weight: 800;
  color: #fff;
  line-height: 1.2;
}
.vis-book-author {
  font-size: 0.5rem;
  color: #94a3b8;
  border-top: 1px solid rgba(255,255,255,0.1);
  padding-top: 4px;
}

/* 3. Book Formatting Visual */
.vis-format-spread {
  display: flex;
  gap: 12px;
  background: #fff;
  padding: 12px;
  border-radius: 8px;
  border: 1px solid var(--border);
  box-shadow: 0 4px 15px rgba(0,0,0,0.03);
}
.vis-format-page {
  width: 60px;
  height: 85px;
  border: 1px solid rgba(34, 197, 94, 0.1);
  background: #fafaf9;
  padding: 8px 6px;
  display: flex;
  flex-direction: column;
  gap: 5px;
}
.vis-format-header {
  height: 2px;
  width: 100%;
  background: rgba(34, 197, 94, 0.25);
  margin-bottom: 4px;
}
.vis-format-dropcap {
  width: 12px;
  height: 12px;
  background: var(--accent);
  color: #fff;
  font-size: 0.5rem;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
  float: left;
  margin-right: 3px;
}
.vis-format-line {
  height: 2px;
  background: #e2e8f0;
  width: 100%;
}
.vis-format-line.short { width: 70%; }

/* 4. Book Uploading Visual */
.vis-upload-cloud {
  background: #fff;
  padding: 16px 20px;
  border-radius: 12px;
  border: 1px solid var(--border);
  box-shadow: 0 8px 24px rgba(0,0,0,0.04);
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 160px;
}
.vis-upload-status {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.72rem;
  font-weight: 700;
  color: var(--accent2);
}
.vis-upload-progress {
  height: 5px;
  background: #f1f5f9;
  border-radius: 3px;
  overflow: hidden;
  position: relative;
}
.vis-upload-bar {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  background: var(--accent);
  width: 90%;
  animation: uploadAnimate 3s infinite alternate ease-in-out;
}
@keyframes uploadAnimate {
  0% { width: 40%; }
  100% { width: 95%; }
}
.vis-upload-kdp {
  font-size: 0.6rem;
  color: var(--muted);
  display: flex;
  justify-content: space-between;
}

/* 5. Amazon A+ Visual */
.vis-aplus-box {
  width: 170px;
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 8px;
  padding: 8px;
  display: flex;
  flex-direction: column;
  gap: 6px;
  box-shadow: 0 6px 18px rgba(0,0,0,0.03);
}
.vis-aplus-hero {
  height: 48px;
  background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
  border-radius: 4px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.55rem;
  font-weight: bold;
  color: var(--green-dark);
}
.vis-aplus-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 6px;
}
.vis-aplus-col {
  height: 34px;
  background: #f8fafc;
  border-radius: 4px;
  border: 1px solid #f1f5f9;
}

/* 6. Social Media Poster Visual */
.vis-social-card {
  width: 140px;
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 12px;
  padding: 8px;
  box-shadow: 0 10px 24px rgba(0,0,0,0.04);
  display: flex;
  flex-direction: column;
  gap: 6px;
}
.vis-social-header {
  display: flex;
  align-items: center;
  gap: 6px;
}
.vis-social-avatar {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background: var(--accent);
}
.vis-social-dotname {
  height: 4px;
  width: 40px;
  background: #e2e8f0;
  border-radius: 2px;
}
.vis-social-post {
  height: 70px;
  background: linear-gradient(135deg, #ecfdf5 0%, #10b981 100%);
  border-radius: 6px;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-size: 0.65rem;
  font-weight: 800;
  letter-spacing: 1px;
}

/* 7. Business Card Visual */
.vis-bcard-container {
  position: relative;
  width: 160px;
  height: 100px;
}
.vis-bcard {
  width: 120px;
  height: 68px;
  border-radius: 6px;
  background: #fff;
  border: 1px solid var(--border);
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  position: absolute;
  padding: 10px;
}
.vis-bcard.front {
  top: 0;
  left: 0;
  z-index: 2;
  background: #fff;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.vis-bcard.back {
  bottom: 0;
  right: 0;
  z-index: 1;
  background: #1e293b;
  border-color: #334155;
  display: flex;
  align-items: center;
  justify-content: center;
}
.vis-bcard-title {
  font-weight: 800;
  font-size: 0.55rem;
  color: var(--navy);
}
.vis-bcard-job {
  font-size: 0.45rem;
  color: var(--muted);
}
.vis-bcard-dots {
  display: flex;
  gap: 3px;
}
.vis-bcard-dots span {
  width: 3px;
  height: 3px;
  border-radius: 50%;
  background: var(--accent);
}

/* 8. Flyer Visual */
.vis-flyer-paper {
  width: 85px;
  height: 120px;
  background: #fff;
  border: 1px solid var(--border);
  box-shadow: 0 8px 20px rgba(0,0,0,0.05);
  border-radius: 4px;
  padding: 8px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transform: rotate(-3deg);
  transition: transform 0.3s ease;
}
.service-card:hover .vis-flyer-paper {
  transform: rotate(0deg) translateY(-2px);
}
.vis-flyer-header {
  font-weight: 900;
  font-size: 0.55rem;
  color: var(--accent2);
  text-align: center;
  letter-spacing: 0.5px;
}
.vis-flyer-graphic {
  height: 50px;
  border-radius: 3px;
  background: radial-gradient(circle, #d9f99d 0%, #22c55e 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  color: #fff;
}
.vis-flyer-footer {
  height: 4px;
  background: #e2e8f0;
  border-radius: 2px;
}

/* 9. Brochure Visual */
.vis-brochure-3d {
  display: flex;
  width: 140px;
  height: 95px;
  perspective: 400px;
}
.vis-brochure-panel {
  flex: 1;
  border: 1px solid rgba(34, 197, 94, 0.15);
  background: #fff;
  padding: 8px 6px;
  display: flex;
  flex-direction: column;
  gap: 4px;
  box-shadow: 0 6px 15px rgba(0,0,0,0.03);
}
.vis-brochure-panel.left {
  transform: rotateY(25deg);
  border-radius: 4px 0 0 4px;
  transform-origin: right center;
}
.vis-brochure-panel.center {
  z-index: 2;
  background: #fafaf9;
}
.vis-brochure-panel.right {
  transform: rotateY(-25deg);
  border-radius: 0 4px 4px 0;
  transform-origin: left center;
}

/* 10. Background Removal Visual */
.vis-bgremove-container {
  width: 140px;
  height: 90px;
  border-radius: 8px;
  border: 1px solid var(--border);
  box-shadow: 0 4px 15px rgba(0,0,0,0.03);
  position: relative;
  overflow: hidden;
  display: flex;
}
.bgremove-side {
  flex: 1;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.bgremove-side.left {
  background: #f1f5f9;
  border-right: 1px dashed rgba(34, 197, 94, 0.4);
}
.bgremove-side.right {
  background-image: linear-gradient(45deg, #cbd5e1 25%, transparent 25%),
                    linear-gradient(-45deg, #cbd5e1 25%, transparent 25%),
                    linear-gradient(45deg, transparent 75%, #cbd5e1 75%),
                    linear-gradient(-45deg, transparent 75%, #cbd5e1 75%);
  background-size: 8px 8px;
}
.bgremove-item {
  font-size: 1.8rem;
  color: var(--navy);
}
.bgremove-side.right .bgremove-item {
  color: var(--accent2);
}

/* 11. Photo Retouching Visual */
.vis-retouch-comparison {
  width: 140px;
  height: 90px;
  border-radius: 8px;
  border: 1px solid var(--border);
  box-shadow: 0 4px 15px rgba(0,0,0,0.03);
  position: relative;
  overflow: hidden;
  display: flex;
}
.retouch-side {
  flex: 1;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.retouch-side.left {
  background: #cbd5e1;
}
.retouch-side.right {
  background: linear-gradient(135deg, #ecfdf5 0%, #a7f3d0 100%);
}
.retouch-icon {
  font-size: 1.6rem;
  color: #64748b;
}
.retouch-side.right .retouch-icon {
  color: var(--accent2);
  filter: drop-shadow(0 0 8px rgba(34,197,94,0.6));
}

/* 12. Clipping Path Visual */
.vis-clipping-path {
  position: relative;
  width: 110px;
  height: 110px;
  border-radius: 50%;
  border: 1px solid rgba(34, 197, 94, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
}
.clipping-item {
  font-size: 2.2rem;
  color: #cbd5e1;
}
.clipping-vector-path {
  position: absolute;
  width: 76px;
  height: 76px;
  border: 1.5px dashed var(--accent);
  border-radius: 50%;
}
.clipping-pen {
  position: absolute;
  top: 10px;
  right: 10px;
  color: var(--accent2);
  font-size: 1.1rem;
}

/* 13. Ghost Mannequin Visual */
.vis-ghost-mannequin {
  position: relative;
  width: 130px;
  height: 90px;
  border-radius: 8px;
  background: #fff;
  border: 1px solid var(--border);
  box-shadow: 0 4px 15px rgba(0,0,0,0.03);
  display: flex;
  align-items: center;
  justify-content: center;
}
.ghost-apparel {
  font-size: 2.4rem;
  color: rgba(34, 197, 94, 0.15);
  position: relative;
}
.ghost-apparel::after {
  content: '3D';
  position: absolute;
  bottom: 0;
  right: -10px;
  font-size: 0.55rem;
  background: var(--accent);
  color: #fff;
  padding: 1px 4px;
  border-radius: 3px;
  font-weight: 800;
}
.ghost-hollow-dots {
  position: absolute;
  inset: 12px;
  border: 1.5px dashed rgba(34, 197, 94, 0.45);
  border-radius: 6px;
}

/* Card Body Content */
.card-content-area {
  padding: 28px;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.service-card h3 {
  font-family: 'Sora', sans-serif;
  font-size: 1.3rem;
  font-weight: 800;
  margin-bottom: 12px;
  color: var(--text);
}

.service-card p {
  font-size: 0.92rem;
  line-height: 1.6;
  color: var(--muted);
  margin-bottom: 24px;
  flex-grow: 1;
}

.card-features-list {
  list-style: none;
  padding: 0;
  margin: 0 0 28px 0;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.card-features-list li {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 0.88rem;
  font-weight: 500;
  color: var(--text);
}

.card-features-list li i {
  color: var(--accent);
  font-size: 0.95rem;
}

.btn-card-action {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 12px 24px;
  border-radius: 12px;
  border: 1px solid var(--border);
  background: rgba(34, 197, 94, 0.03);
  color: var(--text);
  font-size: 0.9rem;
  font-weight: 600;
  cursor: pointer;
  text-decoration: none;
  transition: all 0.3s ease;
}

.btn-card-action:hover {
  background: var(--accent);
  color: #fff;
  border-color: var(--accent);
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(34, 197, 94, 0.2);
}

/* Masonry Showcase Section */
.masonry-showcase {
  padding: 100px 48px;
  background: var(--bg2);
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}

.masonry-intro {
  text-align: center;
  max-width: 600px;
  margin: 0 auto 60px;
}

.masonry-intro h2 {
  font-size: 2.5rem;
  font-weight: 900;
  color: var(--text);
  margin-bottom: 16px;
  line-height: 1.2;
  letter-spacing: -0.02em;
}

.masonry-intro p {
  font-size: 0.95rem;
  color: var(--muted);
}

.masonry-grid {
  column-count: 4;
  column-gap: 16px;
  max-width: 1200px;
  margin: 0 auto;
}

.masonry-item {
  break-inside: avoid;
  margin-bottom: 16px;
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  background: var(--surface);
  border: 1px solid var(--border);
}

.masonry-item img {
  width: 100%;
  display: block;
  object-fit: cover;
  height: auto;
}

.masonry-badge {
  position: absolute;
  bottom: 12px;
  right: 12px;
  background: var(--surface);
  color: var(--text);
  padding: 4px 10px;
  border-radius: 16px;
  font-size: 0.70rem;
  font-weight: 900;
  display: flex;
  align-items: center;
  gap: 6px;
  border: 1px solid var(--border);
}

.badge-studio { color: var(--accent); }
.badge-ai { color: var(--accent3); }
.badge-ugc { color: var(--accent2); }

.masonry-blue-box {
  background: var(--accent);
  color: #fff;
  padding: 30px 24px;
  height: 250px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  border-radius: 12px;
  break-inside: avoid;
  margin-bottom: 16px;
  position: relative;
  border: 1px solid rgba(255, 255, 255, 0.1);
  box-shadow: 0 10px 30px rgba(34, 197, 94, 0.2);
}

.masonry-blue-box h3 {
  font-size: 1.8rem;
  font-weight: 900;
  line-height: 1.1;
  text-transform: uppercase;
  margin: 0;
}

.masonry-blue-box .year {
  position: absolute;
  bottom: 15px;
  right: 15px;
  background: rgba(0, 0, 0, 0.2);
  padding: 4px 10px;
  border-radius: 4px;
  font-weight: 900;
  font-size: 0.9rem;
  transform: rotate(-3deg);
}

/* Benefits Section styling */
.benefits-section {
  padding: 100px 48px;
  background: var(--bg);
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}

.benefits-inner {
  max-width: 1200px;
  margin: 0 auto;
}

.benefits-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  align-items: center;
  margin-top: 60px;
}

.benefits-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.benefit-card-box {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 18px;
  padding: 28px;
  transition: all 0.3s ease;
  cursor: pointer;
}

.benefit-card-box:hover {
  transform: translateY(-4px);
  border-color: var(--accent);
  box-shadow: 0 12px 30px rgba(34, 197, 94, 0.06);
}

.benefit-icon-wrapper {
  width: 44px;
  height: 44px;
  border-radius: 12px;
  background: var(--green-light);
  color: var(--accent2);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  margin-bottom: 16px;
}

.benefit-card-box h3 {
  font-family: 'Sora', sans-serif;
  font-size: 1.1rem;
  font-weight: 700;
  margin-bottom: 8px;
  color: var(--text);
}

.benefit-card-box p {
  font-size: 0.85rem;
  line-height: 1.6;
  color: var(--muted);
}

.benefits-interactive-wheel {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  aspect-ratio: 1/1;
  max-width: 500px;
  margin: 0 auto;
}

.benefits-circle-outline {
  position: absolute;
  width: 80%;
  height: 80%;
  border: 1px dashed rgba(34, 197, 94, 0.25);
  border-radius: 50%;
}

.benefits-wheel-center {
  position: absolute;
  width: 180px;
  height: 180px;
  background: var(--accent);
  border-radius: 50%;
  z-index: 5;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: #fff;
  font-family: 'Sora', sans-serif;
  font-weight: 700;
  font-size: 1rem;
  padding: 24px;
  box-shadow: 0 10px 40px rgba(34, 197, 94, 0.4);
  line-height: 1.4;
  transition: all 0.3s ease;
}

.wheel-node {
  position: absolute;
  width: 46px;
  height: 46px;
  border-radius: 50%;
  background: var(--card);
  border: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  cursor: pointer;
  z-index: 6;
  transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.wheel-node:hover {
  transform: scale(1.18);
  border-color: var(--accent);
  background: var(--green-light);
  color: var(--accent2);
}

/* Position nodes circularly */
.wn-1 { top: 3%; left: 50%; transform: translate(-50%, 0); }
.wn-2 { top: 17%; right: 15%; }
.wn-3 { top: 50%; right: 3%; transform: translate(0, -50%); }
.wn-4 { bottom: 17%; right: 15%; }
.wn-5 { bottom: 3%; left: 50%; transform: translate(-50%, 0); }
.wn-6 { bottom: 17%; left: 15%; }
.wn-7 { top: 50%; left: 3%; transform: translate(0, -50%); }
.wn-8 { top: 17%; left: 15%; }

/* FAQ Accordion Styling */
.faq-section {
  padding: 100px 48px;
  background: var(--bg2);
  border-top: 1px solid var(--border);
}

.faq-container {
  max-width: 800px;
  margin: 0 auto;
}

.faq-header {
  text-align: center;
  margin-bottom: 56px;
}

.faq-header h2 {
  font-size: clamp(2rem, 4vw, 2.8rem);
  font-family: 'Sora', sans-serif;
  font-weight: 900;
}

.faq-header h2 span {
  color: var(--accent);
}

.faq-header p {
  color: var(--muted);
  margin-top: 10px;
}

.faq-list {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.faq-item {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 14px;
  overflow: hidden;
  transition: all 0.3s ease;
}

.faq-item.active {
  border-color: rgba(34, 197, 94, 0.3);
  box-shadow: 0 10px 25px rgba(34, 197, 94, 0.04);
}

.faq-question {
  width: 100%;
  background: none;
  border: none;
  padding: 24px;
  text-align: left;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.faq-question h3 {
  font-family: 'Sora', sans-serif;
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--text);
  margin: 0;
  padding-right: 20px;
  line-height: 1.4;
}

.faq-icon {
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background: #f1f5f9;
  color: var(--muted);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.85rem;
  transition: all 0.3s ease;
  flex-shrink: 0;
}

.faq-item.active .faq-icon {
  background: var(--green-light);
  color: var(--accent2);
  transform: rotate(180deg);
}

.faq-answer {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease, padding 0.3s ease;
  color: var(--muted);
  font-size: 0.95rem;
  line-height: 1.7;
}

.faq-item.active .faq-answer {
  max-height: 400px;
  padding: 0 24px 24px 24px;
  border-top: 1px solid rgba(0, 0, 0, 0.02);
}

.faq-answer p {
  margin: 0;
}

/* CTA Section */
.cta-section {
  padding: 100px 48px;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.cta-section::before {
  content: '';
  position: absolute;
  width: 800px;
  height: 800px;
  background: radial-gradient(circle, rgba(34, 197, 94, 0.1) 0%, transparent 70%);
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  pointer-events: none;
}

.cta-inner {
  max-width: 680px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

.cta-inner h2 {
  font-size: clamp(2.2rem, 4vw, 3.5rem);
  margin-bottom: 20px;
  font-family: 'Sora', sans-serif;
  font-weight: 900;
  line-height: 1.1;
}

.cta-inner h2 em {
  font-style: normal;
  background: linear-gradient(135deg, var(--accent) 0%, var(--accent2) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.cta-inner p {
  color: var(--muted);
  font-size: 1.05rem;
  line-height: 1.7;
  margin-bottom: 40px;
}

.cta-actions {
  display: flex;
  gap: 16px;
  justify-content: center;
  align-items: center;
}

.btn-primary {
  display: inline-flex;
  align-items: center;
  gap: 0.7rem;
  padding: 11px 26px;
  border: none;
  border-radius: 50px;
  background: var(--green);
  color: #fff;
  font-size: 0.95rem;
  font-weight: 600;
  letter-spacing: 0.02em;
  cursor: pointer;
  transition: 0.3s;
  text-decoration: none;
  justify-content: center;
  box-shadow: 0 4px 20px rgba(34, 197, 94, 0.35);
}

.btn-primary:hover {
  background: var(--green-dark);
  transform: translateY(-2px);
  box-shadow: 0 8px 28px rgba(34, 197, 94, 0.45);
}

.btn-ghost {
  padding: 11px 26px;
  border: 1px solid rgba(34, 197, 94, 0.25);
  border-radius: 50px;
  background: #ffffff;
  color: var(--navy);
  font-size: 0.95rem;
  font-weight: 500;
  letter-spacing: 0.02em;
  cursor: pointer;
  transition: 0.3s;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

.btn-ghost:hover {
  border-color: var(--green);
  background: var(--green-light);
  color: var(--green-dark);
  transform: translateY(-2px);
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(24px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Responsive Overrides */
@media (max-width: 1024px) {
  .services-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .hero {
    padding: 140px 20px 60px;
  }
  .hero-inner {
    grid-template-columns: 1fr;
    gap: 40px;
  }
  .section,
  .masonry-showcase,
  .benefits-section,
  .faq-section {
    padding: 60px 20px;
  }
  .services-grid {
    grid-template-columns: 1fr;
  }
  .benefits-layout {
    grid-template-columns: 1fr;
    gap: 40px;
  }
  .benefits-grid {
    grid-template-columns: 1fr;
  }
  .filter-btn {
    padding: 12px 18px;
    font-size: 0.85rem;
  }
  .cta-section {
    padding: 60px 20px;
  }
  .masonry-grid {
    column-count: 2;
  }
}

@media (max-width: 500px) {
  .masonry-grid {
    column-count: 1;
  }
}
</style>

<div class="graphics-page">
  <!-- Hero Section -->
  <section class="hero">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="hero-inner">
      <div class="hero-content">
        <h1 style="font-size: 60px !important;">Creative Graphics & <br><em>Brand identity</em> Studio.</h1>
        <p class="hero-sub">{{ $heroBackground?->description ?? 'Crowns IT delivers award-winning brand visuals, professional KDP book layouts, and high-volume e-commerce photo editing. From sketch draft to pixel-perfect vector finishing, we scale your creative assets.' }}</p>
        <div class="hero-actions">
          <a href="{{ url('/') }}#contact" class="btn-primary btn-large">Start Your Project</a>
          <a href="#services" class="btn-ghost btn-large">Explore Services</a>
        </div>
        <div class="hero-stats">
          <div class="stat-item"><strong>2M+</strong><span>Images Edited</span></div>
          <div class="stat-item"><strong>1k+</strong><span>Projects Delivered</span></div>
          <div class="stat-item"><strong>24hr</strong><span>Draft Turnaround</span></div>
        </div>
      </div>

      <!-- Before After Sketch to Vector Slider -->
      <div class="ba-box reveal">
        <div class="ba-image-container">
          <!-- After (Vector Canvas / Custom Image) -->
          <div class="image-after @if(!$getImageUrl('hero_after_image', null)) vector-canvas @endif">
            @if($getImageUrl('hero_after_image', null))
              <img src="{{ $getImageUrl('hero_after_image', null) }}" alt="{{ $getAltText('hero_after_image', 'Finished Graphic') }}" />
            @else
              <div class="vector-logo-glow">
                <span class="vector-anchor anchor-n"></span>
                <span class="vector-anchor anchor-e"></span>
                <span class="vector-anchor anchor-s"></span>
                <span class="vector-anchor anchor-w"></span>
                <i class="fa-solid fa-gem vector-logo-symbol"></i>
              </div>
              <div class="vector-brand-name">Crowns IT</div>
            @endif
          </div>
          <!-- Before (Sketch Canvas / Custom Image) -->
          <div class="image-before">
            @if($getImageUrl('hero_before_image', null))
              <img src="{{ $getImageUrl('hero_before_image', null) }}" alt="{{ $getAltText('hero_before_image', 'Original Sketch') }}" class="before-uploaded-img" />
            @else
              <div class="sketch-canvas-inner">
                <div class="sketch-layout-guides">
                  <i class="fa-regular fa-gem sketch-logo-symbol"></i>
                </div>
                <div class="sketch-brand-name">Draft Layout</div>
              </div>
            @endif
          </div>
        </div>
        <input type="range" min="0" max="100" value="50" class="ba-slider">
        <div class="ba-line"></div>
        <div class="ba-button"><i class="fa-solid fa-left-right"></i></div>
      </div>
    </div>
  </section>

  <!-- Trusted Platforms Strip -->
  <div class="logos-strip">
    <div class="logos-label">Delivering Compliant & Industry-Standard Assets For</div>
    <div class="logos-track">
      <div class="logo-item">Amazon KDP</div>
      <div class="logo-item">IngramSpark</div>
      <div class="logo-item">Shopify</div>
      <div class="logo-item">Facebook Ads</div>
      <div class="logo-item">Instagram</div>
      <div class="logo-item">Lulu Publishing</div>
      <div class="logo-item">Google Merchants</div>
      <div class="logo-item">Printful</div>
      <div class="logo-item">Amazon KDP</div>
      <div class="logo-item">IngramSpark</div>
      <div class="logo-item">Shopify</div>
      <div class="logo-item">Facebook Ads</div>
      <div class="logo-item">Instagram</div>
      <div class="logo-item">Lulu Publishing</div>
      <div class="logo-item">Google Merchants</div>
      <div class="logo-item">Printful</div>
    </div>
  </div>

  <!-- Services Showcase Section -->
  <section class="section" id="services">
    <div class="section-label">Our Creative Suite</div>
    <h2>Bespoke Design & Image Editing</h2>
    <p class="section-sub">From custom logos and book designs to bulk e-commerce photo retouching, explore our full design capabilities.</p>

    <!-- Category Filter Tabs -->
    <div class="filter-tabs-container">
      <button class="filter-btn active" onclick="filterServices('all', this)">All Services</button>
      <button class="filter-btn" onclick="filterServices('brand', this)">Brand & Marketing</button>
      <button class="filter-btn" onclick="filterServices('publishing', this)">Publishing & Amazon</button>
      <button class="filter-btn" onclick="filterServices('ecommerce', this)">E-Commerce Image Editing</button>
    </div>

    <!-- Services Cards Grid -->
    <div class="services-grid">
      <!-- 1. Logo Design -->
      <div class="service-card-wrapper reveal" data-category="brand">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-pen-nib"></i></span>
            <div class="card-visual-art" style="padding:0; overflow:hidden;">
              <img src="{{ $getImageUrl('service_logo', 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_logo', 'Logo Design') }}" style="width:80%; height:80%; object-fit:cover; display:block; transition: transform 0.4s ease;" />
            </div>
          </div>
          <div class="card-content-area">
            <h3>Logo Design</h3>
            <p>Craft a powerful visual mark that anchors your brand. We design bespoke, memorable logos that reflect your core values and stand out across print and digital media.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> 100% Vector Source Files</li>
              <li><i class="fa-solid fa-circle-check"></i> Complete Brand Style Guides</li>
              <li><i class="fa-solid fa-circle-check"></i> High-Res Web & Print Formats</li>
              <li><i class="fa-solid fa-circle-check"></i> Full Copyright Ownership</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Request Logo Concept</a>
          </div>
        </div>
      </div>

      <!-- 2. Book Cover Design -->
      <div class="service-card-wrapper reveal" data-category="publishing">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-book"></i></span>
            <div class="card-visual-art">
              <div class="card-visual-art" style="padding:0; overflow:hidden;">
                <img src="{{ $getImageUrl('service_book_cover', 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_book_cover', 'Book Cover Design') }}" style="width:80%; height:80%; object-fit:cover; display:block; transition: transform 0.4s ease;" />
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>Book Cover Design</h3>
            <p>They do judge a book by its cover. We craft stunning paperback, hardcover, and Kindle covers that capture your story's essence and drive readers to click.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> KDP & IngramSpark Ready</li>
              <li><i class="fa-solid fa-circle-check"></i> Front, Spine, & Back Wraps</li>
              <li><i class="fa-solid fa-circle-check"></i> High-Fidelity 3D Mockups</li>
              <li><i class="fa-solid fa-circle-check"></i> Genre-aligned Typography</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Design My Cover</a>
          </div>
        </div>
      </div>

      <!-- 3. Book Formatting -->
      <div class="service-card-wrapper reveal" data-category="publishing">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-paragraph"></i></span>
            <div class="card-visual-art">
              <div class="card-visual-art" style="padding:0; overflow:hidden;">
                <img src="{{ $getImageUrl('service_formatting', 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_formatting', 'Book Formatting') }}" style="width:80%; height:80%; object-fit:cover; display:block; transition: transform 0.4s ease;" />
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>Book Formatting</h3>
            <p>Ensure a flawless reading experience. We type-set and format book interiors for digital e-readers (EPUB) and physical printers with correct margins and gutter offsets.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> Reflowable & Fixed EPUB layouts</li>
              <li><i class="fa-solid fa-circle-check"></i> PDF Print Ready (with Bleed)</li>
              <li><i class="fa-solid fa-circle-check"></i> Elegant drop-caps & headers</li>
              <li><i class="fa-solid fa-circle-check"></i> Dynamic Table of Contents</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Format My Manuscript</a>
          </div>
        </div>
      </div>

      <!-- 4. Book Uploading on Amazon -->
      <div class="service-card-wrapper reveal" data-category="publishing">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-cloud-arrow-up"></i></span>
            <div class="card-visual-art">
              <div class="vis-upload-cloud">
                <div class="vis-upload-status"><i class="fa-solid fa-circle-notch fa-spin"></i> Uploading...</div>
                <div class="vis-upload-progress">
                  <div class="vis-upload-bar"></div>
                </div>
                <div class="vis-upload-kdp">
                  <span>KDP Dashboard</span>
                  <span>95%</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>KDP Publishing Setup</h3>
            <p>Skip the setup headache. We manage the entire publishing upload process on Amazon KDP, configuring tax setup, title metadata, keywords, and categories correctly.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> Category & Keyword Optimization</li>
              <li><i class="fa-solid fa-circle-check"></i> Pricing & Royalty Strategy</li>
              <li><i class="fa-solid fa-circle-check"></i> Quality Check & Pre-review</li>
              <li><i class="fa-solid fa-circle-check"></i> Print-On-Demand Integration</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Publish My Book</a>
          </div>
        </div>
      </div>

      <!-- 5. Amazon A+ Content Design -->
      <div class="service-card-wrapper reveal" data-category="publishing">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-puzzle-piece"></i></span>
            <div class="card-visual-art">
              <div class="card-visual-art" style="padding:0; overflow:hidden;">
                <img src="{{ $getImageUrl('service_amazon_aplus', 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_amazon_aplus', 'Amazon A+ Content') }}" style="width:80%; height:80%; object-fit:cover; display:block; transition: transform 0.4s ease;" />
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>Amazon A+ Content</h3>
            <p>Convert more casual browsers into book buyers. We design rich product descriptions with graphical banners, feature grids, and book comparison tables.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> Professional Header Banners</li>
              <li><i class="fa-solid fa-circle-check"></i> Product Comparison Charts</li>
              <li><i class="fa-solid fa-circle-check"></i> Fully Compliant KDP Modules</li>
              <li><i class="fa-solid fa-circle-check"></i> Conversion Rate Optimization</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Design A+ Layout</a>
          </div>
        </div>
      </div>

      <!-- 6. Social Media Poster Design -->
      <div class="service-card-wrapper reveal" data-category="brand">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-share-nodes"></i></span>
            <div class="card-visual-art">
              <div class="card-visual-art" style="padding:0; overflow:hidden;">
                <img src="{{ $getImageUrl('service_social', 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_social', 'Social Media Poster') }}" style="width:80%; height:80%; object-fit:cover; display:block; transition: transform 0.4s ease;" />
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>Social Media Poster</h3>
            <p>Stop the scroll with high-impact visuals. We design brand-aligned templates, ad banners, and promotional posters tailored for Instagram, Facebook, and LinkedIn.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> Platform-specific Dimensions</li>
              <li><i class="fa-solid fa-circle-check"></i> Dynamic Ad Copy Integration</li>
              <li><i class="fa-solid fa-circle-check"></i> Source Files Included</li>
              <li><i class="fa-solid fa-circle-check"></i> Cohesive Brand Themes</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Get Social Assets</a>
          </div>
        </div>
      </div>

      <!-- 7. Business Card Design -->
      <div class="service-card-wrapper reveal" data-category="brand">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-address-card"></i></span>
            <div class="card-visual-art">
              <div class="card-visual-art" style="padding:0; overflow:hidden;">
                <img src="{{ $getImageUrl('service_business_card', 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_business_card', 'Business Card Design') }}" style="width:80%; height:80%; object-fit:cover; display:block; transition: transform 0.4s ease;" />
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>Business Card Design</h3>
            <p>Leave a memorable connection at networking events. We design modern, executive-grade business cards that merge stunning typography with crisp layout balance.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> Standard & Custom Trim Sizes</li>
              <li><i class="fa-solid fa-circle-check"></i> CMYK Print-Ready Files</li>
              <li><i class="fa-solid fa-circle-check"></i> Double-sided Layout Options</li>
              <li><i class="fa-solid fa-circle-check"></i> Minimalist & Corporate Designs</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Design Business Card</a>
          </div>
        </div>
      </div>

      <!-- 8. Flyer Design -->
      <div class="service-card-wrapper reveal" data-category="brand">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-paperclip"></i></span>
            <div class="card-visual-art">
              <div class="card-visual-art" style="padding:0; overflow:hidden;">
                <img src="{{ $getImageUrl('service_flyer', 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_flyer', 'Flyer Design') }}" style="width:80%; height:80%; object-fit:cover; display:block; transition: transform 0.4s ease;" />
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>Flyer Design</h3>
            <p>Promote your events, services, or product launches with bold layouts. We craft high-contrast, easy-to-read flyers optimized for print distribution and email attachment.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> High-Resolution CMYK Exports</li>
              <li><i class="fa-solid fa-circle-check"></i> Content Hierarchy Layouts</li>
              <li><i class="fa-solid fa-circle-check"></i> Corporate, Event, & Retail Styles</li>
              <li><i class="fa-solid fa-circle-check"></i> Commercial Use Licensing</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Design Flyer Promo</a>
          </div>
        </div>
      </div>

      <!-- 9. Brochure Design -->
      <div class="service-card-wrapper reveal" data-category="brand">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-folder-open"></i></span>
            <div class="card-visual-art">
              <div class="card-visual-art" style="padding:0; overflow:hidden;">
                <img src="{{ $getImageUrl('service_brochure', 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_brochure', 'Brochure Design') }}" style="width:80%; height:80%; object-fit:cover; display:block; transition: transform 0.4s ease;" />
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>Brochure Design</h3>
            <p>Tell your comprehensive brand story in a clean folding booklet. We design professional bi-fold and tri-fold brochures that break down complex solutions into digestible reading layouts.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> Bi-fold & Tri-fold Panels</li>
              <li><i class="fa-solid fa-circle-check"></i> Structured Information Design</li>
              <li><i class="fa-solid fa-circle-check"></i> Pixel-Perfect Margins & Folds</li>
              <li><i class="fa-solid fa-circle-check"></i> Web Digital PDF Distribution</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Request Brochure Layout</a>
          </div>
        </div>
      </div>

      <!-- 10. Background Removal -->
      <div class="service-card-wrapper reveal" data-category="ecommerce">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-scissors"></i></span>
            <div class="card-visual-art" style="padding:0; overflow:hidden; width:100%; height:100%;">
              <div class="ba-box">
                <div class="ba-image-container">
                  <!-- After Image -->
                  <div class="image-after">
                    <img src="{{ $getImageUrl('service_bgremove_after', 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_bgremove_after', 'Background Removal After') }}" />
                  </div>
                  <!-- Before Image -->
                  <div class="image-before">
                    <img src="{{ $getImageUrl('service_bgremove_before', 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_bgremove_before', 'Background Removal Before') }}" class="before-uploaded-img" />
                  </div>
                </div>
                <input type="range" min="0" max="100" value="50" class="ba-slider">
                <div class="ba-line"></div>
                <div class="ba-button"><i class="fa-solid fa-left-right"></i></div>
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>Background Removal</h3>
            <p>Clean, pixel-perfect background removal for product images. Ideal for white marketplace backgrounds, transparent PNG exports, or custom web compositions at high volumes.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> Transparent PNG & JPEG exports</li>
              <li><i class="fa-solid fa-circle-check"></i> Hand-drawn Vector Pen Paths</li>
              <li><i class="fa-solid fa-circle-check"></i> Bulk Image Processing</li>
              <li><i class="fa-solid fa-circle-check"></i> Soft Shadow/Reflection Options</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Request Free Trial</a>
          </div>
        </div>
      </div>

      <!-- 11. Photo Retouching -->
      <div class="service-card-wrapper reveal" data-category="ecommerce">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-wand-magic-sparkles"></i></span>
            <div class="card-visual-art" style="padding:0; overflow:hidden; width:100%; height:100%;">
              <div class="ba-box">
                <div class="ba-image-container">
                  <!-- After Image -->
                  <div class="image-after">
                    <img src="{{ $getImageUrl('service_retouch_after', 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_retouch_after', 'Photo Retouching After') }}" />
                  </div>
                  <!-- Before Image -->
                  <div class="image-before">
                    <img src="{{ $getImageUrl('service_retouch_before', 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&q=80&w=600&sat=-40&con=-10') }}" alt="{{ $getAltText('service_retouch_before', 'Photo Retouching Before') }}" class="before-uploaded-img" />
                  </div>
                </div>
                <input type="range" min="0" max="100" value="50" class="ba-slider">
                <div class="ba-line"></div>
                <div class="ba-button"><i class="fa-solid fa-left-right"></i></div>
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>Photo Retouching</h3>
            <p>Professional photo edits that enhance product appeal. We optimize color balance, remove blemishes, adjust brightness, and add natural drop shadows.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> Color Correction & Grading</li>
              <li><i class="fa-solid fa-circle-check"></i> Blemish & Dust Spot Removal</li>
              <li><i class="fa-solid fa-circle-check"></i> Drop & Cast Shadow Additions</li>
              <li><i class="fa-solid fa-circle-check"></i> E-Commerce Platform Ready</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Enhance My Photos</a>
          </div>
        </div>
      </div>

      <!-- 12. Clipping Path -->
      <div class="service-card-wrapper reveal" data-category="ecommerce">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-bezier-curve"></i></span>
            <div class="card-visual-art" style="padding:0; overflow:hidden; width:100%; height:100%;">
              <div class="ba-box">
                <div class="ba-image-container">
                  <!-- After Image -->
                  <div class="image-after">
                    <img src="{{ $getImageUrl('service_clipping_after', 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_clipping_after', 'Clipping Path After') }}" />
                    <svg class="clipping-overlay-svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                      <path d="M15,50 C15,25 35,15 50,15 C65,15 85,25 85,50 C85,75 65,85 50,85 C35,85 15,75 15,50 Z" stroke="var(--accent)" stroke-width="2" fill="none" stroke-dasharray="4,4" />
                      <circle cx="50" cy="15" r="2" fill="#fff" stroke="var(--accent2)" stroke-width="1" />
                      <circle cx="85" cy="50" r="2" fill="#fff" stroke="var(--accent2)" stroke-width="1" />
                      <circle cx="50" cy="85" r="2" fill="#fff" stroke="var(--accent2)" stroke-width="1" />
                      <circle cx="15" cy="50" r="2" fill="#fff" stroke="var(--accent2)" stroke-width="1" />
                    </svg>
                  </div>
                  <!-- Before Image -->
                  <div class="image-before">
                    <img src="{{ $getImageUrl('service_clipping_before', 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&q=80&w=600&con=-20') }}" alt="{{ $getAltText('service_clipping_before', 'Clipping Path Before') }}" class="before-uploaded-img" />
                  </div>
                </div>
                <input type="range" min="0" max="100" value="50" class="ba-slider">
                <div class="ba-line"></div>
                <div class="ba-button"><i class="fa-solid fa-left-right"></i></div>
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>Clipping Path</h3>
            <p>Precision vector clipping paths for highly complex outlines. Essential for clean cutouts, multi-layer designs, and high-resolution commercial publications.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> Hand-Drawn Photoshop Paths</li>
              <li><i class="fa-solid fa-circle-check"></i> Multi-Layer Clipping Tracks</li>
              <li><i class="fa-solid fa-circle-check"></i> Complex Silhouette Mapping</li>
              <li><i class="fa-solid fa-circle-check"></i> Layered TIFF/PSD Exports</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Order Precision Paths</a>
          </div>
        </div>
      </div>

      <!-- 13. Ghost Mannequin -->
      <div class="service-card-wrapper reveal" data-category="ecommerce">
        <div class="service-card">
          <div class="card-visual-container">
            <span class="card-icon-tag"><i class="fa-solid fa-shirt"></i></span>
            <div class="card-visual-art" style="padding:0; overflow:hidden; width:100%; height:100%;">
              <div class="ba-box">
                <div class="ba-image-container">
                  <!-- After Image -->
                  <div class="image-after">
                    <img src="{{ $getImageUrl('service_ghost_after', 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_ghost_after', 'Ghost Mannequin After') }}" />
                  </div>
                  <!-- Before Image -->
                  <div class="image-before">
                    <img src="{{ $getImageUrl('service_ghost_before', 'https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&q=80&w=600') }}" alt="{{ $getAltText('service_ghost_before', 'Ghost Mannequin Before') }}" class="before-uploaded-img" />
                  </div>
                </div>
                <input type="range" min="0" max="100" value="50" class="ba-slider">
                <div class="ba-line"></div>
                <div class="ba-button"><i class="fa-solid fa-left-right"></i></div>
              </div>
            </div>
          </div>
          <div class="card-content-area">
            <h3>Ghost Mannequin</h3>
            <p>Create a professional 3D hollow-man effect. We combine mannequin apparel photos with inside tag shots to build consistent clothing catalogs.</p>
            <ul class="card-features-list">
              <li><i class="fa-solid fa-circle-check"></i> Invisible Mannequin Effect</li>
              <li><i class="fa-solid fa-circle-check"></i> Neck Joint Compositions</li>
              <li><i class="fa-solid fa-circle-check"></i> Sleeve & Lining Extensions</li>
              <li><i class="fa-solid fa-circle-check"></i> High Volume Catalog Speed</li>
            </ul>
            <a href="{{ url('/') }}#contact" class="btn-card-action">Get Apparel Mockup</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Masonry Portfolio Showcase -->
  <section class="masonry-showcase" id="portfolio">
    <div class="masonry-intro reveal">
      <h2>For whatever you sell,<br>wherever you sell</h2>
      <p>Content creation curated and built by experts to meet the needs of all the modern ecommerce and marketing platforms powering your business.</p>
      <div class="cta-actions" style="margin-top: 30px;">
        <a href="{{ url('/') }}#contact" class="btn-primary btn-large">Talk to an expert</a>
        <a href="{{ url('/') }}#contact" class="btn-ghost btn-large">Get started</a>
      </div>
    </div>

    <div class="masonry-grid">
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_1', 'https://ix-marketing.imgix.net/focalpoint.png?auto=format,compress&w=1446') }}" alt="{{ $getAltText('portfolio_1', 'Portfolio Image 1') }}" style="aspect-ratio: 1/1;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_2', 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_2', 'Portfolio Image 2') }}" style="aspect-ratio: 4/3;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_3', 'https://images.unsplash.com/photo-1600607686527-6fb886090705?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_3', 'Portfolio Image 3') }}" style="aspect-ratio: 1/1;" />
        <div class="masonry-badge badge-ai"><span>✨</span> AI</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_4', 'https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_4', 'Portfolio Image 4') }}" style="aspect-ratio: 4/5;" />
        <div class="masonry-badge badge-ugc"><span>📱</span> UGC</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_5', 'https://images.unsplash.com/photo-1579992357154-faf4bde95b3d?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_5', 'Portfolio Image 5') }}" style="aspect-ratio: 3/4;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_6', 'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_6', 'Portfolio Image 6') }}" style="aspect-ratio: 16/9;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_7', 'https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_7', 'Portfolio Image 7') }}" style="aspect-ratio: 4/5;" />
        <div class="masonry-badge badge-ugc"><span>📱</span> UGC</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_8', 'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_8', 'Portfolio Image 8') }}" style="aspect-ratio: 1/1;" />
        <div class="masonry-badge badge-ai"><span>✨</span> AI</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_11', 'https://images.unsplash.com/photo-1556228578-0d85b1a4d571?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_11', 'Portfolio Image 11') }}" style="aspect-ratio: 1/1;" />
        <div class="masonry-badge badge-ai"><span>✨</span> AI</div>
      </div>
      <div class="masonry-blue-box reveal">
        <h3>MAKING THE<br>INTERNET A MORE<br>BEAUTIFUL PLACE.</h3>
        <div class="year">SINCE 2019</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_9', 'https://images.unsplash.com/photo-1534030347209-467a5b0ad3e6?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_9', 'Portfolio Image 9') }}" style="aspect-ratio: 4/3;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_10', 'https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_10', 'Portfolio Image 10') }}" style="aspect-ratio: 4/5;" />
        <div class="masonry-badge badge-ugc"><span>📱</span> UGC</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_12', 'https://ix-marketing.imgix.net/bg-remove_after.png?auto=format,compress&w=1446') }}" alt="{{ $getAltText('portfolio_12', 'Portfolio Image 12') }}" style="aspect-ratio: 4/3;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_13', 'https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_13', 'Portfolio Image 13') }}" style="aspect-ratio: 1/1;" />
        <div class="masonry-badge badge-ugc"><span>📱</span> UGC</div>
      </div>
      <div class="masonry-item reveal">
        <img src="{{ $getImageUrl('portfolio_14', 'https://images.unsplash.com/photo-1601288496920-b6154fe3626a?auto=format&fit=crop&q=80&w=400') }}" alt="{{ $getAltText('portfolio_14', 'Portfolio Image 14') }}" style="aspect-ratio: 4/5;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="benefits-section" id="benefits">
    <div class="benefits-inner">
      <div class="section-label">Why Partner With Us</div>
      <h2>Engineered for Creative Success</h2>
      <p class="section-sub">Discover the standards of design precision, commercial protection, and publishing compliance we build into every single project.</p>

      <div class="benefits-layout">
        <!-- Interactive Wheel Visual -->
        <div class="benefits-interactive-wheel reveal">
          <div class="benefits-circle-outline"></div>
          <div class="benefits-wheel-center" id="centerBox">Crowns IT<br>Design Standards</div>
          <div class="wheel-node wn-1" onclick="showBenefitDetail('Unique Design Concepts', 'We craft custom visual solutions from scratch to guarantee your brand has an authentic and original identity.')">🎨</div>
          <div class="wheel-node wn-2" onclick="showBenefitDetail('Vector Source Files', 'Receive fully organized source formats (Adobe Illustrator, Photoshop, PDF) for seamless future updates.')">📂</div>
          <div class="wheel-node wn-3" onclick="showBenefitDetail('KDP Compliance Guarantee', 'Every book cover and interior format is tested to pass Amazon\'s strict layout constraints without rejection.')">📚</div>
          <div class="wheel-node wn-4" onclick="showBenefitDetail('Print-Ready CMYK Formats', 'Documents are exported with precise bleeds, high-resolution CMYK profiles, and print-shop guidelines.')">🖨️</div>
          <div class="wheel-node wn-5" onclick="showBenefitDetail('Full Commercial Rights', 'Once finalized, you own 100% of the intellectual property rights and copyrights to all assets.')">💼</div>
          <div class="wheel-node wn-6" onclick="showBenefitDetail('Revision Guarantee', 'We work collaboratively with you, refining typography, colors, and layout structures until you are completely thrilled.')">🔄</div>
          <div class="wheel-node wn-7" onclick="showBenefitDetail('Quick Draft Turnaround', 'Get initial layout concepts and drafts in as little as 24 to 48 hours for fast deployment.')">⚡</div>
          <div class="wheel-node wn-8" onclick="showBenefitDetail('Dedicated Creative Director', 'Collaborate directly with a professional lead designer who guides your project from sketch to completion.')">🤝</div>
        </div>

        <!-- Static details list -->
        <div class="benefits-grid reveal">
          <div class="benefit-card-box">
            <div class="benefit-icon-wrapper"><i class="fa-solid fa-certificate"></i></div>
            <h3>100% Original Artwork</h3>
            <p>No templates or stock duplicates. We sketch, vector, and hand-craft custom layouts unique to your business profile.</p>
          </div>
          <div class="benefit-card-box">
            <div class="benefit-icon-wrapper"><i class="fa-solid fa-check-double"></i></div>
            <h3>Zero-Rejection Guarantee</h3>
            <p>Our book designs strictly adhere to KDP and IngramSpark formatting constraints. We fix any formatting errors for free.</p>
          </div>
          <div class="benefit-card-box">
            <div class="benefit-icon-wrapper"><i class="fa-solid fa-images"></i></div>
            <h3>Bulk Processing Scale</h3>
            <p>Process thousands of photos daily. Our e-commerce clipping path and retouching scales seamlessly to any catalogue size.</p>
          </div>
          <div class="benefit-card-box">
            <div class="benefit-icon-wrapper"><i class="fa-solid fa-scale-balanced"></i></div>
            <h3>IP Transfer Included</h3>
            <p>Full intellectual property transfer on project delivery. You retain complete commercial rights to sell or patent your logos and book assets.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="faq-section" id="faq">
    <div class="faq-container reveal">
      <div class="faq-header">
        <h2>Frequently Asked <span>Questions</span></h2>
        <p>Answers to common queries regarding our custom graphic design, KDP publishing, and bulk photo editing workflows.</p>
      </div>

      <div class="faq-list">
        <div class="faq-item">
          <div class="faq-question">
            <h3>Do I get full ownership and copyright of the final designs?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Yes, absolutely. Once the design project is finalized and complete payment is settled, 100% of the copyrights and commercial intellectual property rights are transferred to you. We deliver all high-resolution source vector files for your brand's archives.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>What is Amazon A+ Content, and how does it help book sales?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Amazon A+ Content allows authors and publishers to add rich visual modules, banner graphics, comparison charts, and detailed branding to their book detail page on Amazon. This boosts visual storytelling, captures reader trust, and can increase book purchase conversion rates by up to 10% to 15%.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>What is the difference between E-book and Print formatting?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>E-books (Kindle / EPUB formats) require reflowable HTML code, allowing text to automatically scale and adjust to different screens, fonts, and orientation. Print books require fixed, print-ready typesetting with strict margins, gutter offsets for binding, running headers, and page numbering. We specialize in formatting both formats flawlessly.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>Can you assist with uploading my book directly to Amazon KDP?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Yes. We guide you through the entire Amazon KDP publishing process. This includes configuring your book pricing, optimizing KDP keyword strings, selecting matching categories for better rankings, uploading formatted files, and solving any layout warnings in the book previewer before publishing.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>What source files will I receive for print marketing assets?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>We deliver high-resolution, print-ready PDF files set in CMYK color mode with correct bleed margins. We also provide fully layered and organized design source files (Adobe Illustrator <code>.ai</code>, Photoshop <code>.psd</code>, or vector <code>.svg</code> formats) so you or your printers can make future adjustments easily.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>What is your standard turnaround time for e-commerce image editing?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Our standard turnaround time for bulk product background removal, retouching, and clipping path orders is 24 hours. For rush requirements, we offer express delivery within 6 to 12 hours depending on volume.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>Do you offer a free trial for product photo editing?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Yes. We provide up to 3 free test image edits so you can evaluate our pixel precision, shadow rendering, and cutout accuracy before committing to a larger order or subscription.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>How do we upload and submit bulk images to your team?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>You can upload assets securely through our central client dashboard, share links via Dropbox, Google Drive, or WeTransfer, or connect your Shopify/WooCommerce store to let our systems sync your product feeds directly.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section">
    <div class="cta-inner">
      <div class="section-label" style="justify-content:center; display:flex;">Start Creating</div>
      <h2>Ready to Elevate Your<br><em>Visuals & E-Commerce?</em></h2>
      <p>Partner with Crowns IT to design professional branding assets, compliant book layouts, and high-volume e-commerce edits. Get a custom draft quote today.</p>
      <div class="cta-actions">
        <a href="{{ url('/') }}#contact" class="btn-primary btn-large">Get Started Now →</a>
        <a href="{{ url('/') }}#contact" class="btn-ghost btn-large">Request a Quote</a>
      </div>
    </div>
  </section>
</div>

@push('scripts')
<script>
  // Before-After Sliders
  function initBeforeAfterSliders() {
    const containers = document.querySelectorAll('.ba-box');
    containers.forEach(container => {
      const slider = container.querySelector('.ba-slider');
      const imageBefore = container.querySelector('.image-before');
      const line = container.querySelector('.ba-line');
      const button = container.querySelector('.ba-button');
      const inner = container.querySelector('.sketch-canvas-inner');
      const uploadedImg = container.querySelector('.before-uploaded-img');

      if (!slider || !imageBefore) return;

      const updateSlider = (value) => {
        imageBefore.style.width = value + '%';
        if (line) line.style.left = value + '%';
        if (button) button.style.left = value + '%';
        
        const currentWidth = container.offsetWidth;
        if (inner) {
          inner.style.width = currentWidth + 'px';
        }
        if (uploadedImg) {
          uploadedImg.style.width = currentWidth + 'px';
        }
      };

      slider.addEventListener('input', (e) => {
        updateSlider(e.target.value);
      });

      // Handle resize
      window.addEventListener('resize', () => {
        updateSlider(slider.value);
      });

      // Recalculate slider width when visibility changes (tab filter display change)
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            updateSlider(slider.value);
          }
        });
      }, { threshold: 0.05 });
      observer.observe(container);

      updateSlider(50);
    });
  }

  // Filter Services Grid
  function filterServices(category, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const cards = document.querySelectorAll('.service-card-wrapper');
    cards.forEach(card => {
      if (category === 'all' || card.getAttribute('data-category') === category) {
        card.style.display = 'block';
        card.classList.remove('in-view');
        // Small delay to trigger animation
        setTimeout(() => card.classList.add('in-view'), 40);
      } else {
        card.style.display = 'none';
      }
    });

    // Trigger window resize event after cards animate in to update slider layout widths
    setTimeout(() => {
      window.dispatchEvent(new Event('resize'));
    }, 150);
  }

  // Benefits Detail Switch
  function showBenefitDetail(title, description) {
    const centerBox = document.getElementById('centerBox');
    if (centerBox) {
      centerBox.innerHTML = `<strong>${title}</strong><br><span style="font-size:0.75rem; font-weight:normal; display:block; margin-top:6px; line-height:1.3;">${description}</span>`;
      centerBox.style.background = 'var(--navy)';
      centerBox.style.fontSize = '0.85rem';
    }
  }

  // FAQ Accordion
  function initFaqAccordion() {
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
      const question = item.querySelector('.faq-question');
      question.addEventListener('click', () => {
        const activeItem = document.querySelector('.faq-item.active');
        if (activeItem && activeItem !== item) {
          activeItem.classList.remove('active');
        }
        item.classList.toggle('active');
      });
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
    initBeforeAfterSliders();
    initFaqAccordion();
    initScrollReveal();
  });
</script>
@endpush
@endsection
