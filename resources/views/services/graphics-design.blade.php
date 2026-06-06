@extends('layouts.app')

@section('title', 'Graphics Design Services')

@section('content')
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
  --accent-blue: #3b82f6;
  --accent-purple: #8b5cf6;
  --text-main: #ffffff;
  --text-dim: #a1a1aa;
  --glass-border: rgba(255, 255, 255, 0.1);
  --glow-blue: rgba(59, 130, 246, 0.5);
  --glow-purple: rgba(139, 92, 246, 0.5);
  --primary-orange: #EB5424;

  --green: #22c55e;
  --green-dark: #16a34a;
  --green-light: #dcfce7;
  --navy: #1a2744;
  --gray-text: #6b7280;
  --red-accent: #ef4444;
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
  0% {
    transform: translate(0, 0) scale(1);
  }
  100% {
    transform: translate(30px, 40px) scale(1.05);
  }
}

.hero-inner {
  max-width: 1200px;
  margin: 0 auto;
  width: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  position: relative;
  z-index: 1;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 14px;
  background: rgba(34, 197, 94, 0.12);
  border: 1px solid rgba(34, 197, 94, 0.25);
  border-radius: 100px;
  font-size: 0.8rem;
  color: #166534;
  margin-bottom: 28px;
  animation: fadeUp 0.8s ease both;
}

.badge-dot {
  width: 6px;
  height: 6px;
  background: var(--accent);
  border-radius: 50%;
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0%,
  100% {
    opacity: 1;
    transform: scale(1);
  }
  50% {
    opacity: 0.5;
    transform: scale(0.8);
  }
}

.hero h1 {
  font-family: 'Sora', sans-serif;
  font-size: clamp(2.8rem, 5vw, 4.5rem);
  font-weight: 900;
  line-height: 1.05;
  letter-spacing: -0.03em;
  margin-bottom: 24px;
  animation: fadeUp 0.8s ease 0.1s both;
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
  max-width: 480px;
  margin-bottom: 40px;
  animation: fadeUp 0.8s ease 0.2s both;
}

.hero-actions {
  display: flex;
  gap: 16px;
  align-items: center;
  animation: fadeUp 0.8s ease 0.3s both;
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
  animation: fadeUp 0.8s ease 0.4s both;
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

.hero-visual {
  display: grid;
  grid-template-columns: 1fr 1.2fr;
  gap: 80px;
  align-items: center;
}

.ba-showcase {
  display: contents;
}

.ba-showcase-text {
  animation: fadeUp 0.8s ease 0.2s both;
}

.ba-showcase-text h2 {
  font-size: 2.8rem;
  font-weight: 900;
  line-height: 1.2;
  margin-bottom: 24px;
  color: var(--text);
}

.ba-showcase-text p {
  font-size: 1rem;
  line-height: 1.7;
  color: var(--muted);
  margin-bottom: 32px;
}

.feature-list {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.feature-item {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 0.95rem;
  color: var(--text);
  font-weight: 500;
}

.feature-item i {
  color: var(--accent);
  font-size: 1.1rem;
}

.ba-box {
  position: relative;
  width: 100%;
  height: 100%;
  border-radius: 20px;
  overflow: hidden;
  aspect-ratio: 4/3;
  background: var(--card);
  border: 1px solid var(--border);
  box-shadow: 0 40px 80px rgba(0, 0, 0, 0.18);
  animation: fadeUp 0.8s ease 0.3s both;
}

.ba-image-container {
  position: relative;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.slider-image {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.image-before {
  z-index: 2;
}

.image-after {
  z-index: 1;
}

.ba-slider {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: ew-resize;
  z-index: 3;
  appearance: none;
  -webkit-appearance: none;
  background: transparent;
  border: none;
  padding: 0;
  margin: 0;
}

.ba-slider::-webkit-slider-thumb {
  appearance: none;
  -webkit-appearance: none;
  width: 50px;
  height: 100%;
  background: transparent;
  cursor: ew-resize;
  border: none;
}

.ba-slider::-moz-range-thumb {
  width: 50px;
  height: 100%;
  background: transparent;
  cursor: ew-resize;
  border: none;
}

.ba-line {
  position: absolute;
  left: 50%;
  top: 0;
  bottom: 0;
  width: 2px;
  background: rgba(255, 255, 255, 0.6);
  transform: translateX(-50%);
  z-index: 4;
  pointer-events: none;
}

.ba-button {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 50px;
  height: 50px;
  background: var(--accent);
  border-radius: 999px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-size: 1.2rem;
  box-shadow: 0 8px 24px rgba(34, 197, 94, 0.4);
  z-index: 5;
  pointer-events: none;
}

.floating-tag {
  position: absolute;
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 10px;
  padding: 10px 14px;
  font-size: 0.78rem;
  font-weight: 500;
  display: flex;
  align-items: center;
  gap: 8px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
}

.floating-tag-2 {
  bottom: -16px;
  left: -20px;
  color: var(--accent2);
}

.ft-icon {
  font-size: 1rem;
}

@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(24px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

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
  animation: scroll-logos 20s linear infinite;
  width: max-content;
}

.logos-strip:hover .logos-track {
  animation-play-state: paused;
}

@keyframes scroll-logos {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}

.logo-item {
  font-family: 'Sora', sans-serif;
  font-weight: 700;
  font-size: 1rem;
  color: rgba(26, 39, 68, 0.65);
  white-space: nowrap;
  letter-spacing: -0.02em;
  transition: color 0.3s;
}

.logo-item:hover {
  color: rgba(26, 39, 68, 0.9);
}

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

.section h2,
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
  font-size: 1rem;
  line-height: 1.7;
  max-width: 500px;
  margin-bottom: 60px;
}

.svc-tabs-nav {
  display: flex;
  border-bottom: 1px solid var(--border);
  margin-bottom: 56px;
  gap: 0;
}

.svc-tab {
  flex: 1;
  padding: 16px 12px;
  background: none;
  border: none;
  border-bottom: 2px solid transparent;
  color: var(--muted);
  font-size: 0.88rem;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.25s;
  text-align: center;
  position: relative;
  bottom: -1px;
}

.svc-tab:hover {
  color: var(--text);
}

.svc-tab.active {
  color: var(--text);
  border-bottom: 2px solid var(--accent);
}

.svc-panel {
  display: none;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
  animation: fadeUp 0.45s ease both;
}

.svc-panel.active {
  display: grid;
}

.svc-left h3 {
  font-family: 'Sora', sans-serif;
  font-size: 1.9rem;
  font-weight: 900;
  letter-spacing: -0.03em;
  margin-bottom: 16px;
  color: var(--text);
}

.svc-left p {
  color: var(--muted);
  font-size: 0.95rem;
  line-height: 1.75;
  margin-bottom: 28px;
  max-width: 420px;
}

.svc-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 36px;
}

.svc-tag {
  padding: 5px 14px;
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid var(--border);
  border-radius: 100px;
  font-size: 0.78rem;
  color: var(--muted);
  transition: all 0.2s;
}

.svc-tag:hover {
  border-color: var(--accent);
  color: var(--accent);
}

.svc-read-more {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 28px;
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 100px;
  color: var(--text);
  font-size: 0.9rem;
  font-weight: 500;
  background: rgba(255, 255, 255, 0.03);
  backdrop-filter: blur(8px);
  cursor: pointer;
  text-decoration: none;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.svc-read-more:hover {
  border-color: rgba(34, 197, 94, 0.5);
  background: rgba(34, 197, 94, 0.1);
  color: #166534;
  transform: translateX(4px);
  box-shadow: 0 4px 14px rgba(34, 197, 94, 0.15);
}

.svc-visual {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 20px;
  aspect-ratio: 4 / 3;
  display: flex;
  align-items: stretch;
  justify-content: center;
  position: relative;
  overflow: hidden;
}

.vis-ba {
  display: flex;
  width: 100%;
  height: 100%;
}

.vis-ba-side {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 12px;
  padding: 24px;
  position: relative;
}

.vis-ba-lbl {
  position: absolute;
  top: 16px;
  font-size: 0.65rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  padding: 3px 10px;
  border-radius: 100px;
}

.vis-ba-lbl.b {
  left: 14px;
  background: rgba(255, 255, 255, 0.07);
  color: var(--muted);
}

.vis-ba-lbl.a {
  right: 14px;
  background: rgba(34, 197, 94, 0.15);
  color: #166534;
}

.vis-ba-divider {
  width: 1px;
  background: rgba(255, 255, 255, 0.12);
  position: relative;
  flex-shrink: 0;
}

.vis-ba-handle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 32px;
  height: 32px;
  background: var(--accent);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.75rem;
  color: #fff;
  box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.2);
}

.vis-product-before,
.vis-product-after {
  width: 100%;
  height: 130px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.5rem;
}

.vis-product-before {
  background: linear-gradient(135deg, #eef9ef, #d8f0db);
  filter: saturate(1) brightness(1);
}

.vis-product-after {
  background: linear-gradient(135deg, #f0f7f0, #dbeee1);
  background-image: linear-gradient(rgba(34, 197, 94, 0.08) 1px, transparent 1px), linear-gradient(90deg, rgba(34, 197, 94, 0.08) 1px, transparent 1px);
  background-size: 20px 20px;
}

.vis-export-pill {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: var(--green);
  color: #fff;
  border-radius: 24px;
  padding: 8px 20px;
  font-size: 0.85rem;
  font-weight: 600;
  position: absolute;
  top: 20px;
  left: 20px;
  box-shadow: 0 6px 20px rgba(34, 197, 94, 0.35);
}

.vis-export-menu {
  position: absolute;
  top: 58px;
  left: 20px;
  background: rgba(255, 255, 255, 0.92);
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 14px 20px;
  min-width: 170px;
  backdrop-filter: blur(12px);
}

.vis-export-menu div {
  font-size: 1rem;
  font-weight: 600;
  color: var(--text);
  padding: 5px 0;
}

.vis-img-grid {
  position: absolute;
  top: 16px;
  right: 16px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 6px;
  width: 150px;
}

.vis-img-thumb {
  height: 56px;
  border-radius: 8px;
}

.vis-img-thumb:nth-child(1) {
  background: linear-gradient(135deg, #dcfce7, #bbf7d0);
}

.vis-img-thumb:nth-child(2) {
  background: linear-gradient(135deg, #e7f7ec, #c8eed1);
}

.vis-img-thumb:nth-child(3) {
  background: linear-gradient(135deg, #d9f2df, #b6e6c0);
}

.vis-img-thumb:nth-child(4) {
  background: linear-gradient(135deg, #ecf8f0, #d3f0d9);
}

.vis-retouch {
  display: flex;
  gap: 20px;
  align-items: center;
  justify-content: center;
  padding: 32px;
  width: 100%;
  height: 100%;
  flex-direction: column;
}

.vis-retouch-row {
  display: flex;
  gap: 20px;
  align-items: center;
  width: 100%;
  justify-content: center;
}

.vis-bag {
  width: 96px;
  height: 120px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.8rem;
}

.vis-bag.before {
  background: linear-gradient(135deg, #e7f7ec, #d1edd8);
  filter: saturate(1) brightness(1);
}

.vis-bag.after {
  background: linear-gradient(135deg, #eef9f1, #dcf3e2);
}

.vis-arrow-icon,
.vis-ghost-arrow {
  font-size: 1.2rem;
  color: var(--muted);
}

.vis-bars {
  width: 100%;
}

.vis-bar-row {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 8px;
}

.vis-bar-label {
  font-size: 0.72rem;
  color: var(--muted);
  width: 100px;
  flex-shrink: 0;
}

.vis-bar-track {
  flex: 1;
  height: 5px;
  background: rgba(255, 255, 255, 0.06);
  border-radius: 3px;
  overflow: hidden;
}

.vis-bar-fill {
  height: 100%;
  border-radius: 3px;
}

.vis-clip {
  display: flex;
  gap: 20px;
  align-items: center;
  justify-content: center;
  padding: 32px;
  width: 100%;
  height: 100%;
}

.vis-clip-shape {
  width: 90px;
  height: 130px;
  border-radius: 10px;
  background: rgba(34, 197, 94, 0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.5rem;
  position: relative;
  flex-shrink: 0;
}

.vis-clip-shape::after {
  content: '';
  position: absolute;
  inset: -4px;
  border: 2px dashed rgba(34, 197, 94, 0.45);
  border-radius: 13px;
}

.vis-clip-dot {
  width: 8px;
  height: 8px;
  background: var(--accent);
  border-radius: 50%;
  position: absolute;
}

.vis-code-block {
  flex: 1;
  background: rgba(255, 255, 255, 0.92);
  border: 1px solid var(--border);
  border-radius: 10px;
  padding: 16px;
  font-family: 'Roboto Mono', monospace;
  font-size: 0.72rem;
  color: var(--navy);
  line-height: 1.8;
}

.vis-code-kw {
  color: var(--accent);
}

.vis-code-val {
  color: var(--accent3);
}

.vis-ghost {
  display: flex;
  gap: 24px;
  align-items: center;
  justify-content: center;
  padding: 32px;
  width: 100%;
  height: 100%;
}

.vis-shirt {
  width: 90px;
  height: 118px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.8rem;
}

.vis-shirt.filled {
  background: linear-gradient(135deg, #dcfce7, #bbf7d0);
}

.vis-shirt.ghost {
  border: 2px dashed rgba(255, 255, 255, 0.15);
  background: rgba(255, 255, 255, 0.02);
  position: relative;
}

.vis-shirt.ghost::after {
  content: '3D';
  position: absolute;
  bottom: 8px;
  right: 8px;
  font-size: 0.6rem;
  color: var(--accent3);
  font-weight: 700;
  letter-spacing: 0.1em;
}

.vis-ghost-tag {
  position: absolute;
  bottom: 16px;
  left: 50%;
  transform: translateX(-50%);
  background: rgba(0, 229, 195, 0.12);
  border: 1px solid rgba(0, 229, 195, 0.3);
  border-radius: 100px;
  padding: 5px 14px;
  font-size: 0.7rem;
  color: var(--accent3);
  font-weight: 600;
  white-space: nowrap;
}

.how-it-works {
  padding: 100px 48px;
  background: var(--bg2);
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}

.how-inner {
  max-width: 1200px;
  margin: 0 auto;
}

.steps-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2px;
  margin-top: 60px;
  position: relative;
}

.steps-grid::before {
  content: '';
  position: absolute;
  top: 40px;
  left: 10%;
  right: 10%;
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--accent), transparent);
}

.step-card {
  background: var(--bg);
  border: 1px solid var(--border);
  padding: 40px 32px;
  position: relative;
  transition: all 0.3s;
}

.step-card:first-child {
  border-radius: 20px 0 0 20px;
}

.step-card:last-child {
  border-radius: 0 20px 20px 0;
}

.step-card:hover {
  background: var(--card);
}

.step-number {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 0.75rem;
  font-weight: 900;
  letter-spacing: 0.15em;
  color: var(--accent);
  margin-bottom: 24px;
}

.step-num-circle {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  border: 1px solid rgba(34, 197, 94, 0.4);
  background: rgba(34, 197, 94, 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.85rem;
  font-weight: 900;
}

.step-card h3 {
  font-size: 1.05rem;
  font-weight: 700;
  margin-bottom: 10px;
  letter-spacing: -0.02em;
}

.step-card p {
  color: var(--muted);
  font-size: 0.875rem;
  line-height: 1.7;
}

.pricing-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  margin-top: 60px;
}

.pricing-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 20px;
  padding: 40px;
  position: relative;
  transition: all 0.3s;
}

.pricing-card:hover {
  transform: translateY(-4px);
}

.pricing-card.featured {
  background: linear-gradient(135deg, rgba(34, 197, 94, 0.15) 0%, rgba(34, 197, 94, 0.08) 100%);
  border-color: rgba(34, 197, 94, 0.25);
  box-shadow: 0 0 0 1px rgba(34, 197, 94, 0.1), 0 40px 80px rgba(34, 197, 94, 0.08);
}

.pricing-badge {
  display: inline-block;
  padding: 4px 12px;
  background: var(--accent);
  color: #fff;
  border-radius: 100px;
  font-size: 0.7rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  margin-bottom: 20px;
}

.pricing-plan {
  font-size: 1.2rem;
  font-weight: 700;
  margin-bottom: 8px;
}

.pricing-desc {
  color: var(--muted);
  font-size: 0.875rem;
  margin-bottom: 32px;
}

.pricing-price {
  display: flex;
  align-items: baseline;
  gap: 4px;
  margin-bottom: 32px;
}

.price-currency {
  font-size: 1.2rem;
  color: var(--muted);
  font-weight: 300;
}

.price-amount {
  font-size: 3rem;
  font-weight: 900;
  letter-spacing: -0.04em;
}

.price-unit {
  font-size: 0.85rem;
  color: var(--muted);
}

.pricing-features {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 12px;
  margin-bottom: 36px;
}

.pricing-features li {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 0.9rem;
  color: var(--muted);
}

.pricing-features li::before {
  content: '✓';
  width: 20px;
  height: 20px;
  background: rgba(34, 197, 94, 0.15);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.65rem;
  color: var(--accent);
  font-weight: 700;
}

.pricing-features li.disabled {
  opacity: 0.35;
}

.pricing-features li.disabled::before {
  content: '✕';
  background: rgba(255, 255, 255, 0.04);
  color: var(--muted);
}

.btn-pricing {
  width: 100%;
  padding: 14px;
  border-radius: 10px;
  font-size: 0.95rem;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.2s;
  text-align: center;
  text-decoration: none;
  display: block;
  border: 1px solid var(--border);
  background: transparent;
  color: var(--text);
}

.btn-pricing.solid {
  background: var(--accent);
  border-color: var(--accent);
  color: #fff;
}

.btn-pricing:hover {
  opacity: 0.85;
  transform: translateY(-1px);
}

.testimonials-section {
  padding: 100px 48px;
  background: var(--bg2);
  border-top: 1px solid var(--border);
}

.testimonials-inner {
  max-width: 1200px;
  margin: 0 auto;
}

.testimonials-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  margin-top: 60px;
}

.testimonial-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 20px;
  padding: 32px;
  transition: all 0.3s;
}

.testimonial-card:hover {
  border-color: rgba(34, 197, 94, 0.35);
  transform: translateY(-3px);
}

.testimonial-stars {
  display: flex;
  gap: 3px;
  margin-bottom: 20px;
  color: #ffd166;
  font-size: 0.9rem;
}

.testimonial-text {
  color: #475569;
  font-size: 0.92rem;
  line-height: 1.75;
  margin-bottom: 28px;
  font-style: italic;
}

.testimonial-author {
  display: flex;
  align-items: center;
  gap: 12px;
}

.author-avatar {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  font-size: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 600;
}

.author-name {
  font-weight: 500;
  font-size: 0.9rem;
}

.author-role {
  font-size: 0.78rem;
  color: var(--muted);
}

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

.faq-section,
.webapp-faq-section {
  padding: 100px 48px;
  background: var(--bg2);
  border-top: 1px solid var(--border);
}

.faq-inner,
.faq-container {
  max-width: 800px;
  margin: 0 auto;
}

.faq-header {
  display: grid;
  gap: 14px;
  text-align: center;
  margin-bottom: 48px;
}

.faq-header h2 {
  font-size: clamp(2rem, 4vw, 2.8rem);
}

.faq-header h2 span {
  color: var(--accent);
}

.faq-header p {
  color: var(--muted);
  max-width: 680px;
  margin: 0 auto;
}

.faq-item {
  border-bottom: 1px solid var(--border);
}

.faq-item:first-of-type {
  border-top: 1px solid var(--border);
}

.faq-question {
  width: 100%;
  background: none;
  border: none;
  color: var(--text);
  font-family: inherit;
  font-size: 1.1rem;
  font-weight: 600;
  text-align: left;
  padding: 24px 0;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: color 0.2s;
}

.faq-question:hover {
  color: var(--accent);
}

.faq-icon {
  font-size: 1.5rem;
  font-weight: 300;
  transition: transform 0.3s ease;
  color: var(--muted);
}

.faq-item.active .faq-icon {
  transform: rotate(45deg);
  color: var(--accent2);
}

.faq-answer {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease, padding-bottom 0.3s ease;
  color: var(--muted);
  font-size: 0.95rem;
  line-height: 1.7;
  padding-bottom: 0;
}

.faq-item.active .faq-answer {
  max-height: 800px;
  padding-bottom: 24px;
}

.faq-answer p {
  margin: 0;
}

.section-label.center {
  justify-content: center;
  display: flex;
}

.marquee-wrapper {
  display: flex;
  flex-direction: column;
  gap: 24px;
  width: 100vw;
  overflow: hidden;
}

.marquee-track {
  display: flex;
  gap: 24px;
  width: max-content;
}

.marquee-track.left {
  animation: scroll-right 40s linear infinite;
}

.marquee-track.right {
  animation: scroll-left 40s linear infinite;
}

.marquee-track:hover {
  animation-play-state: paused;
}

@keyframes scroll-left {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(calc(-50% - 12px));
  }
}

@keyframes scroll-right {
  0% {
    transform: translateX(calc(-50% - 12px));
  }
  100% {
    transform: translateX(0);
  }
}

.tc-card {
  width: 360px;
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 12px;
  padding: 24px;
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
  gap: 16px;
  text-align: left;
  transition: transform 0.3s, border-color 0.3s;
}

.tc-card:hover {
  transform: translateY(-4px);
  border-color: rgba(34, 197, 94, 0.4);
}

.tc-header {
  display: flex;
  align-items: center;
  gap: 12px;
}

.tc-avatar {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  font-size: 1rem;
  color: #fff;
}

.tc-name {
  font-weight: 600;
  font-size: 0.95rem;
  color: var(--text);
}

.tc-role {
  font-size: 0.8rem;
  color: var(--muted);
}

.tc-stars {
  color: #f59e0b;
  font-size: 0.9rem;
  letter-spacing: 2px;
}

.tc-text {
  font-size: 0.9rem;
  color: #d1d5db;
  line-height: 1.6;
}

.cta-section {
  padding: 100px 48px;
}

.cta-inner {
  max-width: 680px;
  margin: 0 auto;
}

.cta-actions {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
}

.section-sub.center {
  margin: 0 auto 60px;
  text-align: center;
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

.gallery-intro {
  text-align: center;
  max-width: 600px;
  margin: 0 auto 60px;
}

.gallery-intro h2 {
  font-size: 2.5rem;
  font-weight: 900;
  color: var(--text);
  margin-bottom: 16px;
  line-height: 1.2;
  letter-spacing: -0.02em;
}

.gallery-intro p {
  font-size: 0.95rem;
  color: var(--muted);
  line-height: 1.5;
  margin-bottom: 24px;
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

.badge-studio {
  color: var(--accent);
}

.badge-ai {
  color: var(--accent3);
}

.badge-ugc {
  color: var(--accent2);
}

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

.clock-section {
  background: var(--bg);
  color: var(--text);
  padding: 100px 48px;
  position: relative;
  overflow: hidden;
}

.clock-header {
  text-align: center;
  padding-top: 30px;
  margin-bottom: 20px;
}

.clock-header h2 {
  font-family: 'Sora', sans-serif;
  font-size: 2.2rem;
  font-weight: 900;
  margin-bottom: 10px;
}

.clock-header p {
  color: var(--muted);
}

.clock-wrapper {
  position: relative;
  width: 620px;
  height: 620px;
  margin: 50px auto;
  font-family: 'Sora', sans-serif;
}

.center-circle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 240px;
  height: 240px;
  border-radius: 50%;
  background: var(--green);
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 20px;
  font-weight: 600;
  color: #fff;
  box-shadow: 0 0 60px rgba(34, 197, 94, 0.35);
}

.feature {
  position: absolute;
  width: 190px;
  padding: 14px;
  border-radius: 16px;
  background: rgba(255, 255, 255, 0.07);
  border: 1px solid rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(12px);
  text-align: center;
  font-size: 13px;
  cursor: pointer;
  transition: 0.3s;
}

.feature:hover {
  transform: scale(1.08);
  border: 1px solid var(--green);
  z-index: 10;
}

.f1 {
  top: 9%;
  left: 50%;
  transform: translate(-50%, 0);
}

.f2 {
  top: 20%;
  right: 5%;
}

.f3 {
  top: 50%;
  right: -5%;
  transform: translate(0, -50%);
}

.f4 {
  bottom: 20%;
  right: 5%;
}

.f5 {
  bottom: 10%;
  left: 50%;
  transform: translate(-50%, 0);
}

.f6 {
  bottom: 20%;
  left: 5%;
}

.f7 {
  top: 50%;
  left: -5%;
  transform: translate(0, -50%);
}

.f8 {
  top: 20%;
  left: 5%;
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
  .how-it-works,
  .faq-section {
    padding: 60px 20px;
  }
  .svc-panel.active {
    grid-template-columns: 1fr;
    gap: 32px;
  }
  .svc-tabs-nav {
    overflow-x: auto;
  }
  .svc-tab {
    font-size: 0.78rem;
    padding: 12px 8px;
    white-space: nowrap;
  }
  .steps-grid {
    grid-template-columns: 1fr 1fr;
  }
  .step-card:first-child {
    border-radius: 20px 0 0 0;
  }
  .step-card:last-child {
    border-radius: 0 0 20px 0;
  }
  .pricing-grid,
  .testimonials-grid {
    grid-template-columns: 1fr;
  }
  .footer-top {
    grid-template-columns: 1fr 1fr;
    gap: 40px;
  }
  .footer-bottom {
    flex-direction: column;
    align-items: flex-start;
  }
  .cta-section {
    padding: 60px 20px;
  }
  .faq-section {
    padding: 60px 20px;
  }
}

@media (max-width: 600px) {
  .masonry-grid {
    column-count: 2;
  }
  .gallery-intro h2 {
    font-size: 2rem;
  }
}

@media (max-width: 400px) {
  .masonry-grid {
    column-count: 1;
  }
}
</style>

<div class="graphics-page">
  <section class="hero">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="hero-inner">
      <div class="hero-content">

        <h1>Your Images,<br><em>Perfected</em><br>at Scale.</h1>
        <p class="hero-sub">Professional photo editing studio for e-commerce. Background removal, retouching, clipping path & more — delivered fast, with studio-grade quality.</p>
        <div class="hero-actions">
          <a href="#" class="btn-primary btn-large">Start Free Trial</a>
          <a href="#" class="btn-ghost btn-large">View Pricing</a>
        </div>
        <div class="hero-stats">
          <div class="stat-item"><strong>2M+</strong><span>Images Edited</span></div>
          <div class="stat-item"><strong>24hr</strong><span>Turnaround</span></div>
          <div class="stat-item"><strong>99.8%</strong><span>Satisfaction Rate</span></div>
        </div>
      </div>


          <div class="ba-box ba-container reveal">
            <div class="ba-image-container">
              <img class="image-after slider-image" src="{{ asset('images/webapp_ecommerce.png') }}" alt="Edited Product">
              <img class="image-before slider-image" src="{{ asset('images/webapp_hero_bg.png') }}" alt="Raw Product">
            </div>
            <input type="range" min="0" max="100" value="50" class="ba-slider">
            <div class="ba-line"></div>
            <div class="ba-button"><i class="fa-solid fa-left-right"></i></div>
          </div>


    </div>
  </section>

  <div class="logos-strip">
    <div class="logos-label">Trusted by leading e-commerce platforms & brands</div>
    <div class="logos-track">
      <div class="logo-item">Shopify</div>
      <div class="logo-item">BigCommerce</div>
      <div class="logo-item">WooCommerce</div>
      <div class="logo-item">Amazon</div>
      <div class="logo-item">Etsy</div>
      <div class="logo-item">Magento</div>
      <div class="logo-item">eBay</div>
      <div class="logo-item">Wix</div>
      <div class="logo-item">Shopify</div>
      <div class="logo-item">BigCommerce</div>
      <div class="logo-item">WooCommerce</div>
      <div class="logo-item">Amazon</div>
      <div class="logo-item">Etsy</div>
      <div class="logo-item">Magento</div>
      <div class="logo-item">eBay</div>
      <div class="logo-item">Wix</div>
    </div>
  </div>

  <section class="section" id="services">
    <div class="section-label">What We Offer</div>
    <h2>Studio-Grade Services<br>for E-commerce</h2>
    <p class="section-sub">Every service is handled by expert editors with a quality guarantee — so your products always look their best.</p>

    <div class="svc-tabs-nav" role="tablist">
      <button class="svc-tab active" onclick="switchSvcTab(0)" role="tab" aria-selected="true">Background Removal</button>
      <button class="svc-tab" onclick="switchSvcTab(1)" role="tab" aria-selected="false">Photo Retouching</button>
      <button class="svc-tab" onclick="switchSvcTab(2)" role="tab" aria-selected="false">Clipping Path</button>
      <button class="svc-tab" onclick="switchSvcTab(3)" role="tab" aria-selected="false">Ghost Mannequin</button>
    </div>

    <div class="svc-panel active" id="svc-panel-0">
      <div class="svc-left reveal">
        <h3>Background Removal</h3>
        <p>Precise, clean background removal for product images. Perfect for white backgrounds, custom scenes, or transparent PNG exports — delivered at any scale.</p>
        <div class="svc-tags">
          <span class="svc-tag">White Background</span>
          <span class="svc-tag">Transparent PNG</span>
          <span class="svc-tag">Custom BG</span>
          <span class="svc-tag">Bulk Orders</span>
        </div>
        <a href="#" class="btn-primary" style="margin-top:20px;">Read More →</a>
      </div>
      <div class="svc-visual reveal">
          <div class="ba-box ba-container reveal">
            <div class="ba-image-container">
              <img class="image-after slider-image" src="{{ asset('images/webapp_ecommerce.png') }}" alt="Edited Product">
              <img class="image-before slider-image" src="{{ asset('images/webapp_hero_bg.png') }}" alt="Raw Product">
            </div>
            <input type="range" min="0" max="100" value="50" class="ba-slider">
            <div class="ba-line"></div>
            <div class="ba-button"><i class="fa-solid fa-left-right"></i></div>
          </div>
      </div>
    </div>

    <div class="svc-panel" id="svc-panel-1">
      <div class="svc-left reveal">
        <h3>Photo Retouching</h3>
        <p>Professional retouching to enhance product appeal — color correction, blemish removal, shadow enhancement, and high-end finishing for studio-quality results.</p>
        <div class="svc-tags">
          <span class="svc-tag">Color Grading</span>
          <span class="svc-tag">Skin Retouching</span>
          <span class="svc-tag">Shadow Add</span>
          <span class="svc-tag">High-End Finish</span>
        </div>
        <a href="#" class="btn-primary" style="margin-top:20px;">Read More →</a>
      </div>
      <div class="svc-visual reveal">
        <div class="ba-box ba-container reveal">
          <div class="ba-image-container">
            <img class="image-after slider-image" src="{{ asset('images/webapp_ecommerce.png') }}" alt="Edited Product">
            <img class="image-before slider-image" src="{{ asset('images/webapp_hero_bg.png') }}" alt="Raw Product">
          </div>
          <input type="range" min="0" max="100" value="50" class="ba-slider">
          <div class="ba-line"></div>
          <div class="ba-button"><i class="fa-solid fa-left-right"></i></div>
        </div>
      </div>
    </div>

    <div class="svc-panel" id="svc-panel-2">
      <div class="svc-left reveal">
        <h3>Clipping Path</h3>
        <p>Pixel-perfect clipping paths for complex shapes, multi-layer products, and high-resolution imagery that demands precision and clean, sharp edges.</p>
        <div class="svc-tags">
          <span class="svc-tag">Complex Shapes</span>
          <span class="svc-tag">Multi-layer</span>
          <span class="svc-tag">High Resolution</span>
          <span class="svc-tag">Illustrator Path</span>
        </div>
        <a href="#" class="btn-primary" style="margin-top:20px;">Read More →</a>
      </div>
      <div class="svc-visual reveal">
        <div class="ba-box ba-container reveal">
          <div class="ba-image-container">
            <img class="image-after slider-image" src="{{ asset('images/webapp_ecommerce.png') }}" alt="Edited Product">
            <img class="image-before slider-image" src="{{ asset('images/webapp_hero_bg.png') }}" alt="Raw Product">
          </div>
          <input type="range" min="0" max="100" value="50" class="ba-slider">
          <div class="ba-line"></div>
          <div class="ba-button"><i class="fa-solid fa-left-right"></i></div>
        </div>
      </div>
    </div>

    <div class="svc-panel" id="svc-panel-3">
      <div class="svc-left reveal">
        <h3>Ghost Mannequin</h3>
        <p>Remove mannequins or models from clothing shots for a professional, consistent 3D hollow-man effect across your entire fashion catalog.</p>
        <div class="svc-tags">
          <span class="svc-tag">Hollow Man Effect</span>
          <span class="svc-tag">Neck Joint</span>
          <span class="svc-tag">Sleeve Join</span>
          <span class="svc-tag">Fashion Ready</span>
        </div>
        <a href="#" class="btn-primary" style="margin-top:20px;">Read More →</a>
      </div>
      <div class="svc-visual reveal">
        <div class="ba-box ba-container reveal">
          <div class="ba-image-container">
            <img class="image-after slider-image" src="{{ asset('images/webapp_ecommerce.png') }}" alt="Edited Product">
            <img class="image-before slider-image" src="{{ asset('images/webapp_hero_bg.png') }}" alt="Raw Product">
          </div>
          <input type="range" min="0" max="100" value="50" class="ba-slider">
          <div class="ba-line"></div>
          <div class="ba-button"><i class="fa-solid fa-left-right"></i></div>
        </div>
      </div>
    </div>
  </section>

  <section class="how-it-works" id="how">
    <div class="gallery-intro reveal">
      <h2>For whatever you sell,<br>wherever you sell</h2>
      <p>Content creation curated and built by experts to meet the needs of all the modern ecommerce and marketing platforms powering your business.</p>
      <div class="cta-actions">
        <a href="#" class="btn-primary btn-large">Talk to an expert</a>
        <a href="#" class="btn-ghost btn-large">Get started</a>
      </div>
    </div>

    <div class="masonry-grid">
      <div class="masonry-item reveal">
        <img src="https://ix-marketing.imgix.net/focalpoint.png?auto=format,compress&w=1446" alt="Peaches" style="aspect-ratio: 1/1;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?auto=format&fit=crop&q=80&w=400" alt="Cat" style="aspect-ratio: 4/3;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1600607686527-6fb886090705?auto=format&fit=crop&q=80&w=400" alt="Living room" style="aspect-ratio: 1/1;" />
        <div class="masonry-badge badge-ai"><span>✨</span> AI</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&q=80&w=400" alt="Outdoors" style="aspect-ratio: 4/5;" />
        <div class="masonry-badge badge-ugc"><span>📱</span> UGC</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1579992357154-faf4bde95b3d?auto=format&fit=crop&q=80&w=400" alt="Coffee" style="aspect-ratio: 3/4;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=400" alt="People" style="aspect-ratio: 16/9;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&q=80&w=400" alt="Pool" style="aspect-ratio: 4/5;" />
        <div class="masonry-badge badge-ugc"><span>📱</span> UGC</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=400" alt="Bottle" style="aspect-ratio: 1/1;" />
        <div class="masonry-badge badge-ai"><span>✨</span> AI</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1556228578-0d85b1a4d571?auto=format&fit=crop&q=80&w=400" alt="Product" style="aspect-ratio: 1/1;" />
        <div class="masonry-badge badge-ai"><span>✨</span> AI</div>
      </div>
      <div class="masonry-blue-box reveal">
        <h3>MAKING THE<br>INTERNET A MORE<br>BEAUTIFUL PLACE.</h3>
        <div class="year">SINCE 2019</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1534030347209-467a5b0ad3e6?auto=format&fit=crop&q=80&w=400" alt="Men eating pill" style="aspect-ratio: 4/3;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&q=80&w=400" alt="Tennis" style="aspect-ratio: 4/5;" />
        <div class="masonry-badge badge-ugc"><span>📱</span> UGC</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://ix-marketing.imgix.net/bg-remove_after.png?auto=format,compress&w=1446" alt="Pouch" style="aspect-ratio: 4/3;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&q=80&w=400" alt="Baby" style="aspect-ratio: 1/1;" />
        <div class="masonry-badge badge-ugc"><span>📱</span> UGC</div>
      </div>
      <div class="masonry-item reveal">
        <img src="https://images.unsplash.com/photo-1601288496920-b6154fe3626a?auto=format&fit=crop&q=80&w=400" alt="Swimwear" style="aspect-ratio: 4/5;" />
        <div class="masonry-badge badge-studio"><span>📷</span> STUDIO</div>
      </div>
    </div>
  </section>

  <section class="clock-section" id="benefits">
    <div class="clock-header reveal">
      <h2>Virtual Image Editing Benefits</h2>
      <p>Click any feature to see details in center</p>
    </div>
    <div class="clock-wrapper reveal">
      <div class="center-circle" id="centerBox">Virtual Image<br>Editing Platform</div>
      <div class="feature f1" onclick="showDetail(this)">💰 Cost-efficient outsourcing<div class="data" hidden>Cost-efficient outsourcing exceptional support and perfect results for thousands of images per day, delivered within 24 hours by highly trained professionals.</div></div>
      <div class="feature f2" onclick="showDetail(this)">🎁 First 3 Photos Free<div class="data" hidden>We offer the first 3 photo edits completely free to help you start without any cost.</div></div>
      <div class="feature f3" onclick="showDetail(this)">⚡ Super Easy Management<div class="data" hidden>Intuitive interface makes editing easy even for beginners and creators.</div></div>
      <div class="feature f4" onclick="showDetail(this)">💳 Affordable Pricing<div class="data" hidden>Transparent pricing with simple and easy payment system.</div></div>
      <div class="feature f5" onclick="showDetail(this)">🔒 Data Security<div class="data" hidden>End-to-end encryption ensures your data remains safe and protected.</div></div>
      <div class="feature f6" onclick="showDetail(this)">🚀 Fast Delivery<div class="data" hidden>Ultra-fast delivery system with minutes turnaround time.</div></div>
      <div class="feature f7" onclick="showDetail(this)">☁️ Unlimited Upload<div class="data" hidden>Upload unlimited photos with secure cloud storage system.</div></div>
      <div class="feature f8" onclick="showDetail(this)">🎯 Pro Quality<div class="data" hidden>Highly trained professionals ensure perfect quality results.</div></div>
    </div>
  </section>

  {{-- <section class="testimonials-section" id="reviews" style="overflow: hidden; width: 100vw; position: relative; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw; padding: 100px 0;">
    <div style="text-align: center; max-width: 600px; margin: 0 auto 50px; padding: 0 20px;">
      <div class="section-label center" style="margin-bottom:16px;">Client Reviews</div>
      <h2 style="font-family: 'Sora', sans-serif;">What Our Clients Say</h2>
      <p class="section-sub center" style="margin: 0 auto;">Trusted by e-commerce brands around the world to make their products look exceptional.</p>
    </div>
    <div class="marquee-wrapper">
      <div class="marquee-track left">
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:var(--green);">SM</div>
            <div>
              <div class="tc-name">Sarah Mitchell</div>
              <div class="tc-role">Owner, StyleHouse Boutique</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"Infotecsourz completely transformed how we handle product photography. The turnaround is fast and the quality is consistently excellent. Our conversion rates improved noticeably after switching."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:#ef4444;">JR</div>
            <div>
              <div class="tc-name">James Rodriguez</div>
              <div class="tc-role">E-commerce Manager, GearPeak</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"We process over 1,000 images per month and Infotecsourz handles it seamlessly. The Shopify integration is a game changer — images go straight to our store without any manual work."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:#10b981;">AL</div>
            <div>
              <div class="tc-name">Ayesha Lim</div>
              <div class="tc-role">Creative Director, Lumière Fashion</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"The ghost mannequin service is exceptional. Our fashion catalog looks incredibly professional now. Clients often comment on how polished our product images look compared to competitors."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:var(--green-dark);">DW</div>
            <div>
              <div class="tc-name">David Wang</div>
              <div class="tc-role">Founder, Urban Kicks</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"We needed clean cuts for complex sneaker shapes. Infotecsourz delivered pixel-perfect clipping paths within 12 hours. We've never looked back since using their clipping service!"</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:var(--green);">SM</div>
            <div>
              <div class="tc-name">Sarah Mitchell</div>
              <div class="tc-role">Owner, StyleHouse Boutique</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"Infotecsourz completely transformed how we handle product photography. The turnaround is fast and the quality is consistently excellent. Our conversion rates improved noticeably after switching."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:#ef4444;">JR</div>
            <div>
              <div class="tc-name">James Rodriguez</div>
              <div class="tc-role">E-commerce Manager, GearPeak</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"We process over 1,000 images per month and Infotecsourz handles it seamlessly. The Shopify integration is a game changer — images go straight to our store without any manual work."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:#10b981;">AL</div>
            <div>
              <div class="tc-name">Ayesha Lim</div>
              <div class="tc-role">Creative Director, Lumière Fashion</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"The ghost mannequin service is exceptional. Our fashion catalog looks incredibly professional now. Clients often comment on how polished our product images look compared to competitors."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:var(--green-dark);">DW</div>
            <div>
              <div class="tc-name">David Wang</div>
              <div class="tc-role">Founder, Urban Kicks</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"We needed clean cuts for complex sneaker shapes. Infotecsourz delivered pixel-perfect clipping paths within 12 hours. We've never looked back since using their clipping service!"</p>
        </div>
      </div>
      <div class="marquee-track right">
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:#f59e0b;">TC</div>
            <div>
              <div class="tc-name">Thomas Chen</div>
              <div class="tc-role">Marketing Lead, TechNova</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"Their background removal API saved us countless hours during our Q3 launch. It handles high-volume requests flawlessly and the quality output feels incredibly natural on dark mode."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:#f43f5e;">EN</div>
            <div>
              <div class="tc-name">Elena Nunez</div>
              <div class="tc-role">Brand Manager, GlowCosmetics</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"I love how they handle skin retouching! The edits always maintain the original texture without looking overly airbrushed. Our beauty products shine thanks to their amazing team."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:#0ea5e9;">MK</div>
            <div>
              <div class="tc-name">Michael Knox</div>
              <div class="tc-role">CEO, ActiveWear Co.</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"Switching to Infotecsourz for our sports apparel line changed everything. The delivery is extremely fast, and the ghost mannequin effects are spot-on every single time."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:var(--green-dark);">ST</div>
            <div>
              <div class="tc-name">Sarah Thompson</div>
              <div class="tc-role">Dropshipper</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"As a solo dropshipper, I rely heavily on their service to polish bulk supplier photos. They always turn sub-par images into premium studio highlights with their color grading."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:#f59e0b;">TC</div>
            <div>
              <div class="tc-name">Thomas Chen</div>
              <div class="tc-role">Marketing Lead, TechNova</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"Their background removal API saved us countless hours during our Q3 launch. It handles high-volume requests flawlessly and the quality output feels incredibly natural on dark mode."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:#f43f5e;">EN</div>
            <div>
              <div class="tc-name">Elena Nunez</div>
              <div class="tc-role">Brand Manager, GlowCosmetics</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"I love how they handle skin retouching! The edits always maintain the original texture without looking overly airbrushed. Our beauty products shine thanks to their amazing team."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:#0ea5e9;">MK</div>
            <div>
              <div class="tc-name">Michael Knox</div>
              <div class="tc-role">CEO, ActiveWear Co.</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"Switching to Infotecsourz for our sports apparel line changed everything. The delivery is extremely fast, and the ghost mannequin effects are spot-on every single time."</p>
        </div>
        <div class="tc-card">
          <div class="tc-header">
            <div class="tc-avatar" style="background:var(--green-dark);">ST</div>
            <div>
              <div class="tc-name">Sarah Thompson</div>
              <div class="tc-role">Dropshipper</div>
            </div>
          </div>
          <div class="tc-stars">★★★★★</div>
          <p class="tc-text">"As a solo dropshipper, I rely heavily on their service to polish bulk supplier photos. They always turn sub-par images into premium studio highlights with their color grading."</p>
        </div>
      </div>
    </div>
  </section> --}}

  <section class="cta-section">
    <div class="cta-inner">
      <div class="section-label" style="justify-content:center; display:flex;">Get Started Today</div>
      <h2>Ready to Elevate Your<br><em>Product Images?</em></h2>
      <p>Join 2,000+ e-commerce brands that trust Infotecsourz for studio-quality photo editing. Try it free — no credit card required.</p>
      <div class="cta-actions">
        <a href="#" class="btn-primary btn-large">Start Free Trial →</a>
        <a href="#" class="btn-ghost btn-large">Request a Quote</a>
      </div>
    </div>
  </section>

  <section class="webapp-faq-section">
    <div class="faq-container reveal">
      <div class="faq-header">
        <h2>Frequently Asked <span>Questions</span></h2>
        <p>Everything you need to know about our image editing services and delivery process.</p>
      </div>

      <div class="faq-list">
        <div class="faq-item">
          <div class="faq-question">
            <h3>What is your standard turnaround time?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Our standard delivery time is 24 hours. For enterprise clients and urgent requests, we also offer rush processing which can deliver your edits in as little as 6 to 12 hours.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>Do you offer a free trial?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Yes! We offer your first 3 image edits completely free. This allows you to evaluate our quality and workflow before deciding to commit to a larger batch or subscription plan.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>How do I submit my images for editing?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>You can easily upload your images through our secure web portal, or simply integrate with our Shopify / BigCommerce apps to automatically sync and download images directly to your store's platform.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>Are my images kept secure?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>Absolutely. We use end-to-end encryption for all transfers and guarantee high standard data security. Your files will never be shared or used anywhere else without your explicit permission.</p>
          </div>
        </div>

        <div class="faq-item">
          <div class="faq-question">
            <h3>What types of edits do you specialize in?</h3>
            <span class="faq-icon"><i class="fa-solid fa-plus"></i></span>
          </div>
          <div class="faq-answer">
            <p>We cover end-to-end e-commerce editing including precise clipping paths, background removal, ghost mannequin effects, high-end skin and product retouching, and expert color styling.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    function switchSvcTab(index) {
      document.querySelectorAll('.svc-tab').forEach((t, i) => {
        t.classList.toggle('active', i === index);
        t.setAttribute('aria-selected', i === index);
      });
      document.querySelectorAll('.svc-panel').forEach((p, i) => {
        p.classList.toggle('active', i === index);
      });
      document.querySelectorAll('#svc-panel-' + index + ' .reveal').forEach(el => {
        el.classList.remove('in-view');
        setTimeout(() => el.classList.add('in-view'), 60);
      });
    }

    function showDetail(el) {
      const text = el.querySelector('.data').innerText;
      document.getElementById('centerBox').innerHTML = text;
    }

    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
          setTimeout(() => entry.target.classList.add('in-view'), i * 80);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });
    reveals.forEach(el => observer.observe(el));

    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
      const question = item.querySelector('.faq-question');
      const icon = item.querySelector('.faq-icon i');
      question.addEventListener('click', () => {
        const activeItem = document.querySelector('.faq-item.active');
        if (activeItem && activeItem !== item) {
          activeItem.classList.remove('active');
          activeItem.querySelector('.faq-icon i').className = 'fa-solid fa-plus';
        }
        item.classList.toggle('active');
        if (item.classList.contains('active')) {
          icon.className = 'fa-solid fa-minus';
        } else {
          icon.className = 'fa-solid fa-plus';
        }
      });
    });

    function initBeforeAfterSlider() {
      const containers = document.querySelectorAll('.ba-container');
      containers.forEach(container => {
        const slider = container.querySelector('.ba-slider');
        const imageBefore = container.querySelector('.image-before');
        const line = container.querySelector('.ba-line');
        const button = container.querySelector('.ba-button');

        if (!slider || !imageBefore) return;

        const updateSlider = (value) => {
          imageBefore.style.width = value + '%';
          line.style.left = value + '%';
          button.style.left = value + '%';
        };

        slider.addEventListener('input', (e) => {
          updateSlider(e.target.value);
        });

        updateSlider(50);
      });
    }

    document.addEventListener('DOMContentLoaded', initBeforeAfterSlider);
  </script>
</div>
@endsection
