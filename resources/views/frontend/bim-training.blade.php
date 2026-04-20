@extends('layouts.master')

@php
$meta_title = "BIM (Revit) Professional Training Program | Eshan Buildwell";
$meta_description = "Learn complete BIM 3D, 4D, and 5D workflow with live project training using Autodesk Revit, Navisworks, and DiRoots at Eshan Buildwell.";
$keywords = "BIM Training, Revit Training, Navisworks, DiRoots, 3D BIM, 4D Planning, 5D Costing, Eshan Buildwell";
@endphp

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop
@section('meta_keywords'){{ $keywords }}@stop

@section('content')
<style>
    /* ── Google Font for certificate cursive ── */
    @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');

    /* ════════════════════════════════════════
       PAGE SHELL
    ════════════════════════════════════════ */
    .bim-flyer-page {
        background:
            radial-gradient(circle at top right, rgba(232, 119, 34, 0.10), transparent 28%),
            linear-gradient(180deg, #f7f8fb 0%, #ffffff 32%, #f5f6f8 100%);
    }

    .bim-flyer-wrap {
        padding: 42px 0 70px;
    }

    .bim-flyer-shell {
        background: #fff;
        border: 1px solid rgba(26, 42, 74, 0.08);
        border-radius: 28px;
        box-shadow: 0 26px 60px rgba(26, 42, 74, 0.10);
        overflow: hidden;
    }

    /* ════════════════════════════════════════
       HERO — real construction photo bg
    ════════════════════════════════════════ */
    .bim-hero {
        position: relative;
        padding: 64px 34px 46px;
        background:
            linear-gradient(135deg, rgba(26, 42, 74, 0.96) 0%, rgba(26, 42, 74, 0.85) 55%, rgba(232, 119, 34, 0.80) 100%),
            url('https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1400&q=80') center/cover no-repeat;
        color: #fff;
    }

    .bim-hero::after {
        content: '';
        position: absolute;
        inset: auto 0 0;
        height: 6px;
        background: linear-gradient(90deg, var(--orange), #ffb067);
    }

    .bim-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 9px 16px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.14);
        border: 1px solid rgba(255, 255, 255, 0.12);
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        font-weight: 700;
        margin-bottom: 16px;
    }

    .bim-hero h1 {
        font-size: clamp(2.25rem, 5vw, 4.25rem);
        line-height: 0.98;
        margin-bottom: 16px;
        color: #fff;
    }

    .bim-hero p {
        max-width: 760px;
        color: rgba(255, 255, 255, 0.86);
        font-size: 1.02rem;
        line-height: 1.8;
        margin-bottom: 0;
    }

    .bim-dimensions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 28px;
    }

    .bim-chip {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.14);
        color: #fff;
        font-weight: 700;
        font-size: 0.92rem;
    }

    .bim-chip i { color: #ffd2ab; }

    .bim-hero-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.4fr) minmax(300px, 0.8fr);
        gap: 28px;
        align-items: end;
    }

    .bim-hero-panel {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.10);
        backdrop-filter: blur(10px);
        border-radius: 22px;
        padding: 24px;
    }

    .bim-hero-stats {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .bim-stat {
        padding: 18px 16px;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.08);
        text-align: center;
    }

    .bim-stat strong {
        display: block;
        color: #fff;
        font-size: 2rem;
        line-height: 1;
        font-family: 'Barlow Condensed', sans-serif;
    }

    .bim-stat span {
        display: block;
        margin-top: 7px;
        color: rgba(255, 255, 255, 0.72);
        font-size: 0.82rem;
    }

    /* ════════════════════════════════════════
       BODY
    ════════════════════════════════════════ */
    .bim-body { padding: 34px; }

    .bim-highlight {
        background: linear-gradient(135deg, rgba(232, 119, 34, 0.10), rgba(26, 42, 74, 0.05));
        border: 1px solid rgba(232, 119, 34, 0.18);
        border-left: 5px solid var(--orange);
        border-radius: 20px;
        padding: 22px 22px 20px;
        margin-bottom: 34px;
    }

    .bim-highlight h3 { color: var(--navy); margin-bottom: 8px; font-size: 1.45rem; }
    .bim-highlight p  { margin-bottom: 0; color: var(--text); }

    /* About — two column with photo */
    .bim-about-grid {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 36px;
        align-items: center;
        margin-bottom: 34px;
    }

    .bim-about-photo {
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 14px 40px rgba(26, 42, 74, 0.14);
    }

    .bim-about-photo img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        display: block;
    }

    /* ════════════════════════════════════════
       LEARN GRID
    ════════════════════════════════════════ */
    .bim-section-head {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 20px;
        margin-bottom: 22px;
        flex-wrap: wrap;
    }

    .bim-section-head h2 { margin-bottom: 0; color: var(--navy); font-size: 2rem; }
    .bim-section-head p  { margin-bottom: 0; color: var(--muted); max-width: 560px; }

    .bim-learn-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
    }

    .bim-learn-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 22px;
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        height: 100%;
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .bim-learn-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-md);
        border-color: rgba(232, 119, 34, 0.25);
    }

    .bim-learn-top {
        background: var(--navy);
        color: #fff;
        padding: 18px 20px;
        min-height: 96px;
    }

    .bim-learn-top span {
        display: inline-flex;
        width: 44px; height: 44px;
        border-radius: 14px;
        align-items: center; justify-content: center;
        background: rgba(255,255,255,0.12);
        margin-bottom: 12px;
        color: #ffd1a8;
        font-size: 1.2rem;
    }

    .bim-learn-top h4  { margin: 0; font-size: 1.4rem; color: #fff; }

    .bim-learn-top small {
        display: block;
        color: rgba(255,255,255,0.68);
        font-family: 'Barlow', sans-serif;
        font-size: 0.8rem;
        margin-top: 3px;
    }

    .bim-learn-body { padding: 20px; }

    .bim-learn-list  { list-style: none; padding: 0; margin: 0; }

    .bim-learn-list li {
        display: flex;
        gap: 10px;
        align-items: flex-start;
        color: var(--text);
        font-size: 0.93rem;
        padding: 8px 0;
    }

    .bim-learn-list i { color: var(--orange); margin-top: 4px; flex-shrink: 0; }

    /* ════════════════════════════════════════
       TOOLS ROW
    ════════════════════════════════════════ */
    .bim-tools-row {
        display: grid;
        grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
        gap: 22px;
        margin-top: 38px;
    }

    .bim-tool-card,
    .bim-register-card,
    .bim-contact-card,
    .bim-faq-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 24px;
        box-shadow: var(--shadow-sm);
    }

    .bim-tool-card { padding: 26px; }

    .bim-tool-title {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
    }

    .bim-tool-icon {
        width: 56px; height: 56px;
        border-radius: 18px;
        background: var(--orange-lt);
        color: var(--orange);
        display: inline-flex;
        align-items: center; justify-content: center;
        font-size: 1.4rem;
        flex-shrink: 0;
    }

    .bim-tool-title h3,
    .bim-register-card h3,
    .bim-contact-card h3 { margin: 0; color: var(--navy); font-size: 1.6rem; }

    .bim-tool-title p { margin: 4px 0 0; color: var(--muted); font-size: 0.92rem; }

    /* ── Trainer box — real photo ── */
    .bim-trainer-box {
        background: linear-gradient(135deg, rgba(232,119,34,0.08), rgba(26,42,74,0.04));
        border: 1px solid rgba(232,119,34,0.12);
        border-radius: 18px;
        padding: 18px;
        margin: 18px 0 20px;
    }

    .bim-trainer-photo-row {
        display: flex;
        gap: 14px;
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .bim-trainer-photo {
        width: 76px; height: 88px;
        border-radius: 12px;
        overflow: hidden;
        flex-shrink: 0;
        box-shadow: 0 4px 14px rgba(26,42,74,0.18);
    }

    .bim-trainer-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        display: block;
    }

    .bim-trainer-box strong {
        display: block;
        color: var(--navy);
        font-size: 1.06rem;
        margin-bottom: 2px;
    }

    .bim-trainer-box .sub {
        font-size: 0.82rem;
        color: var(--orange);
        font-weight: 600;
    }

    .bim-bullets { list-style: none; padding: 0; margin: 0; }

    .bim-bullets li {
        display: flex;
        gap: 10px;
        align-items: flex-start;
        padding: 7px 0;
        font-size: 0.94rem;
    }

    .bim-bullets i { color: var(--orange); margin-top: 4px; }

    .bim-feature-ribbon {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin: 28px 0 10px;
    }

    .bim-feature-pill {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 11px 16px;
        border-radius: 999px;
        background: #fff;
        border: 1px solid rgba(26,42,74,0.10);
        box-shadow: 0 4px 14px rgba(26,42,74,0.05);
        color: var(--navy);
        font-size: 0.88rem;
        font-weight: 600;
    }

    .bim-feature-pill i { color: var(--orange); }

    /* ════════════════════════════════════════
       REGISTRATION CARD
    ════════════════════════════════════════ */
    .bim-register-card {
        padding: 26px;
        background: linear-gradient(180deg, #fff 0%, #fcfcfd 100%);
        position: sticky;
        top: 110px;
    }

    .bim-mini-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 13px;
        background: var(--orange-lt);
        color: var(--orange);
        border-radius: 999px;
        font-size: 0.78rem;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.08em;
        margin-bottom: 14px;
    }

    .bim-register-card p { color: var(--muted); margin-bottom: 18px; }

    .bim-form-grid { display: grid; gap: 12px; }

    .bim-form-grid input,
    .bim-form-grid select,
    .bim-form-grid textarea {
        width: 100%;
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 13px 15px;
        font-size: 0.92rem;
        color: var(--text);
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
        background: #fff;
        font-family: inherit;
    }

    .bim-form-grid input:focus,
    .bim-form-grid select:focus,
    .bim-form-grid textarea:focus {
        border-color: var(--orange);
        box-shadow: 0 0 0 4px rgba(232, 119, 34, 0.10);
    }

    .bim-form-grid textarea { min-height: 90px; resize: vertical; }

    .bim-form-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

    .bim-radio-row {
        display: flex;
        gap: 22px;
        align-items: center;
        padding: 4px 0;
    }

    .bim-radio-row label {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--navy);
        font-weight: 600;
        font-size: 0.93rem;
        cursor: pointer;
    }

    .bim-radio-row input[type="radio"] {
        width: 16px; height: 16px;
        accent-color: var(--orange);
        padding: 0;
    }

    .bim-submit {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        width: 100%;
        padding: 14px 18px;
        border: none;
        border-radius: 999px;
        background: var(--orange);
        color: #fff;
        font-weight: 700;
        font-size: 1rem;
        transition: background .2s ease, transform .2s ease;
        cursor: pointer;
        font-family: inherit;
    }

    .bim-submit:hover { background: var(--orange-dk); transform: translateY(-1px); }

    .bim-register-meta { display: grid; gap: 12px; margin-top: 18px; }

    .bim-register-meta div {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        padding: 12px 0;
        border-top: 1px solid rgba(26,42,74,0.08);
    }

    .bim-register-meta i {
        width: 38px; height: 38px;
        border-radius: 50%;
        background: var(--orange-lt);
        color: var(--orange);
        display: inline-flex;
        justify-content: center;
        align-items: center;
        flex-shrink: 0;
    }

    .bim-register-meta strong { display: block; color: var(--navy); font-size: 0.95rem; margin-bottom: 2px; }

    /* ════════════════════════════════════════
       CONTACT CARD
    ════════════════════════════════════════ */
    .bim-contact-card {
        margin-top: 30px;
        padding: 24px 26px;
        background: linear-gradient(135deg, rgba(26,42,74,0.98), rgba(36,53,88,0.96));
        color: #fff;
        border-color: rgba(255,255,255,0.08);
    }

    .bim-contact-card h3,
    .bim-contact-card p,
    .bim-contact-card a { color: #fff; }

    .bim-contact-card p { color: rgba(255,255,255,0.72); margin-bottom: 18px; }

    .bim-contact-list { list-style: none; padding: 0; margin: 0; display: grid; gap: 12px; }

    .bim-contact-list li { display: flex; gap: 12px; align-items: flex-start; }

    .bim-contact-list i { color: #ffc28d; margin-top: 4px; }

    /* ════════════════════════════════════════
       CERTIFICATE — proper gold design
    ════════════════════════════════════════ */
    .bim-cert-section {
        margin-top: 42px;
        padding: 36px;
        background: linear-gradient(135deg, #12293a 0%, #0a1e2d 100%);
        border-radius: 24px;
    }

    .bim-cert-section-head {
        margin-bottom: 28px;
    }

    .bim-cert-section-head h2 {
        color: #fff;
        font-size: 1.9rem;
        margin-bottom: 8px;
    }

    .bim-cert-section-head p {
        color: rgba(255,255,255,0.62);
        font-size: 0.94rem;
        margin: 0;
    }

    .bim-cert-outer {
        background: linear-gradient(160deg, #fffdf5 0%, #fff8e0 60%, #fdf0c0 100%);
        border-radius: 16px;
        border: 3px double #D4A017;
        box-shadow:
            0 12px 44px rgba(184,134,11,0.32),
            0 0 0 1px rgba(212,160,23,0.3);
        overflow: hidden;
        position: relative;
        max-width: 720px;
        margin: 0 auto;
    }

    /* Inner inset border */
    .bim-cert-outer::before {
        content: '';
        position: absolute;
        inset: 8px;
        border: 1px solid rgba(184,134,11,0.28);
        border-radius: 10px;
        pointer-events: none;
        z-index: 0;
    }

    /* Top header bar */
    .bim-cert-topbar {
        background: #1A3A4A;
        padding: 11px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        position: relative;
        z-index: 1;
    }

    .bim-cert-topbar .cb {
        display: flex;
        flex-direction: column;
        gap: 3px;
    }

    .bim-cert-topbar .cb span {
        display: block;
        height: 2.5px;
        background: var(--orange);
        border-radius: 2px;
    }

    .bim-cert-topbar .cb span:nth-child(1) { width: 16px; }
    .bim-cert-topbar .cb span:nth-child(2) { width: 10px; }
    .bim-cert-topbar .cb span:nth-child(3) { width: 16px; }

    .bim-cert-topbar .org-name {
        color: #fff;
        font-weight: 800;
        font-size: 13px;
        letter-spacing: 1px;
        font-family: inherit;
    }

    /* Certificate inner content */
    .bim-cert-inner {
        padding: 22px 30px 26px;
        position: relative;
        z-index: 1;
    }

    /* Corner ornaments */
    .bim-cert-corner {
        position: absolute;
        font-size: 20px;
        color: #D4A017;
        opacity: 0.55;
        line-height: 1;
    }

    .bim-cert-corner.tl { top: 14px; left: 18px; }
    .bim-cert-corner.tr { top: 14px; right: 18px; transform: scaleX(-1); }
    .bim-cert-corner.bl { bottom: 14px; left: 18px; transform: scaleY(-1); }
    .bim-cert-corner.br { bottom: 14px; right: 18px; transform: scale(-1,-1); }

    .bim-cert-divider {
        height: 2px;
        background: linear-gradient(90deg, transparent, #D4A017, transparent);
        margin: 10px 0;
        border: none;
    }

    .bim-cert-ornament {
        text-align: center;
        color: #D4A017;
        font-size: 18px;
        letter-spacing: 10px;
        margin-bottom: 4px;
        opacity: 0.65;
    }

    .bim-cert-label {
        font-size: 10.5px;
        color: #999;
        text-align: center;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 2px;
    }

    .bim-cert-title {
        font-family: 'Great Vibes', cursive;
        font-size: 38px;
        color: #B8860B;
        text-align: center;
        line-height: 1.1;
        margin-bottom: 2px;
    }

    .bim-cert-awarded {
        font-size: 11px;
        color: #aaa;
        text-align: center;
        letter-spacing: 0.5px;
        margin-bottom: 3px;
    }

    .bim-cert-name {
        font-family: 'Great Vibes', cursive;
        font-size: 30px;
        color: #1A3A4A;
        text-align: center;
        line-height: 1.25;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }

    .bim-cert-body-text {
        font-size: 11px;
        color: #777;
        text-align: center;
        line-height: 1.75;
        margin-bottom: 12px;
        padding: 0 10px;
    }

    .bim-cert-course-box {
        background: rgba(26,58,74,0.07);
        border: 1px solid rgba(26,58,74,0.16);
        border-radius: 8px;
        padding: 10px 16px;
        text-align: center;
        font-size: 11px;
        color: #555;
        margin-bottom: 16px;
        line-height: 1.65;
    }

    .bim-cert-course-box strong {
        color: #1A3A4A;
        font-weight: 700;
        font-size: 12px;
        display: block;
        margin-bottom: 2px;
    }

    .bim-cert-footer-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 10px;
        margin-top: 8px;
        flex-wrap: wrap;
    }

    .bim-cert-sig {
        text-align: center;
        flex: 1;
        min-width: 120px;
    }

    .bim-cert-sig-name {
        font-family: 'Great Vibes', cursive;
        font-size: 26px;
        color: #1A3A4A;
        line-height: 1;
    }

    .bim-cert-sig-line {
        width: 110px;
        height: 1px;
        background: #D4A017;
        margin: 5px auto 3px;
    }

    .bim-cert-sig-role {
        font-size: 9.5px;
        color: #888;
        line-height: 1.5;
        text-align: center;
    }

    .bim-cert-seal {
        width: 66px; height: 66px;
        border-radius: 50%;
        background: radial-gradient(circle at 38% 38%, #fffbee, #ffe48a);
        border: 2.5px solid #D4A017;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: 8px;
        font-weight: 700;
        color: #1A3A4A;
        text-align: center;
        line-height: 1.4;
        box-shadow: 0 3px 14px rgba(184,134,11,0.28);
        flex-shrink: 0;
    }

    .bim-cert-seal .seal-big {
        font-size: 15px;
        font-weight: 900;
        color: var(--orange);
        line-height: 1;
        font-family: inherit;
        letter-spacing: 0.5px;
    }

    .bim-cert-qr {
        width: 54px; height: 54px;
        flex-shrink: 0;
        background:
            repeating-conic-gradient(#222 0% 25%, #fff 0% 50%)
            0 0/8px 8px;
        border-radius: 5px;
        border: 2.5px solid #222;
    }

    /* ════════════════════════════════════════
       FAQ
    ════════════════════════════════════════ */
    .bim-faq-wrap { margin-top: 38px; }

    .bim-faq-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .bim-faq-card {
        padding: 22px;
        height: 100%;
    }

    .bim-faq-card h4 {
        display: flex;
        gap: 10px;
        align-items: flex-start;
        color: var(--navy);
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    .bim-faq-card h4 i { color: var(--orange); margin-top: 3px; }
    .bim-faq-card p    { margin-bottom: 0; color: var(--muted); font-size: 0.95rem; }

    /* ════════════════════════════════════════
       BOTTOM BAR
    ════════════════════════════════════════ */
    .bim-bottom-bar {
        margin-top: 32px;
        padding-top: 24px;
        border-top: 1px solid rgba(26,42,74,0.10);
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 16px;
        align-items: center;
    }

    .bim-note-list { display: flex; flex-wrap: wrap; gap: 12px 18px; }

    .bim-note-list span {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--navy);
        font-size: 0.86rem;
        font-weight: 600;
    }

    .bim-note-list i { color: var(--orange); }
    .bim-brand-note  { color: var(--muted); font-size: 0.82rem; }

    /* ════════════════════════════════════════
       RESPONSIVE
    ════════════════════════════════════════ */
    @media (max-width: 1199px) {
        .bim-learn-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }

    @media (max-width: 991px) {
        .bim-hero-grid,
        .bim-about-grid,
        .bim-tools-row,
        .bim-faq-grid { grid-template-columns: 1fr; }

        .bim-register-card { position: static; }
    }

    @media (max-width: 767px) {
        .bim-flyer-wrap { padding: 22px 0 50px; }
        .bim-hero, .bim-body { padding: 24px 18px; }
        .bim-hero-stats, .bim-learn-grid { grid-template-columns: 1fr; }
        .bim-section-head h2 { font-size: 1.6rem; }
        .bim-bottom-bar { align-items: flex-start; }
        .bim-form-row-2 { grid-template-columns: 1fr; }
        .bim-cert-section { padding: 22px 16px; }
        .bim-cert-title { font-size: 28px; }
        .bim-cert-name  { font-size: 24px; }
    }
</style>

<div class="bim-flyer-page">
    <div class="container bim-flyer-wrap">
        <div class="bim-flyer-shell">

            {{-- ══════════════════ HERO ══════════════════ --}}
            <section class="bim-hero">
                <div class="bim-hero-grid">
                    <div>
                        <span class="bim-eyebrow">
                            <i class="bi bi-mortarboard-fill"></i> BIM Professional Training Program
                        </span>
                        <h1>BIM (Revit)<br>Professional Training</h1>
                        <p>
                            Learn complete BIM workflow from 3D design to 4D planning and 5D costing with live project
                            training using Autodesk Revit, Navisworks, and DiRoots. The program is designed for civil
                            engineers, architects, and working professionals who want practical, industry-ready skills.
                        </p>

                        <div class="bim-dimensions">
                            <span class="bim-chip"><i class="bi bi-box-seam-fill"></i> 3D Design</span>
                            <span class="bim-chip"><i class="bi bi-calendar-week-fill"></i> 4D Planning</span>
                            <span class="bim-chip"><i class="bi bi-bar-chart-fill"></i> 5D Costing</span>
                        </div>

                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <a href="#bim-register" class="btn-est">Enroll Now <i class="bi bi-chevron-right"></i></a>
                            <a href="https://wa.me/919015444490?text=Hi%2C%20I%20want%20details%20about%20the%20BIM%20Training%20Program."
                               target="_blank" class="btn-cta-outline">WhatsApp for Details</a>
                        </div>
                    </div>

                    <div class="bim-hero-panel">
                        <div class="bim-hero-stats">
                            <div class="bim-stat">
                                <strong>₹4,999/-</strong>
                                <span>Course Fee</span>
                            </div>
                            <div class="bim-stat">
                                <strong>3 Months</strong>
                                <span>Duration</span>
                            </div>
                            <div class="bim-stat">
                                <strong style="font-size: 1.4rem;">Tues/Thur/Sat</strong>
                                <span>6:30 PM - 8:00 PM</span>
                            </div>
                            <div class="bim-stat">
                                <strong style="font-size: 1.4rem;">28th April</strong>
                                <span>Offline Batch Starting</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ══════════════════ BODY ══════════════════ --}}
            <div class="bim-body">

                {{-- About — with building photo --}}
                <div class="bim-about-grid">
                    <div class="bim-highlight" style="margin-bottom:0;">
                        <h3>About the Training Program</h3>
                        <p>
                            This BIM training program is built around real project-based learning. You will understand how to
                            develop building models, coordinate planning, generate quantity takeoff, and support costing
                            workflows using the same digital tools used in modern construction execution.
                        </p>
                        <p class="mt-3" style="margin-bottom:0; color:var(--text);">
                            The course covers complete workflow from design (3D) to planning (4D) and costing (5D) —
                            giving you end-to-end practical BIM skills that are industry-ready from day one.
                        </p>
                    </div>
                    <div class="bim-about-photo">
                        <img
                            src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8YWJvdXQlMjB1c3xlbnwwfHwwfHx8MA%3D%3D"
                            alt="Live BIM construction project training"
                            loading="lazy"
                        />
                    </div>
                </div>

                {{-- Section head --}}
                <div class="bim-section-head mt-4">
                    <div><h2>What You Will Learn</h2></div>
                    <p>Structured modules focused on architecture, structure, planning, and costing so learners can move from software basics to complete BIM workflow understanding.</p>
                </div>

                {{-- Learn grid --}}
                <div class="bim-learn-grid">
                    <article class="bim-learn-card">
                        <div class="bim-learn-top">
                            <span><i class="bi bi-building"></i></span>
                            <h4>Architecture</h4>
                            <small>3D BIM Modeling</small>
                        </div>
                        <div class="bim-learn-body">
                            <ul class="bim-learn-list">
                                <li><i class="bi bi-check-circle-fill"></i> Architectural Modelling (Walls, Doors, Windows, Floors, Roofs, Stairs)</li>
                                <li><i class="bi bi-check-circle-fill"></i> Materials & Visualization</li>
                                <li><i class="bi bi-check-circle-fill"></i> Annotation & Documentation</li>
                                <li><i class="bi bi-check-circle-fill"></i> Site & Topography</li>
                                <li><i class="bi bi-check-circle-fill"></i> Families (Parametric)</li>
                            </ul>
                        </div>
                    </article>

                    <article class="bim-learn-card">
                        <div class="bim-learn-top">
                            <span><i class="bi bi-bezier2"></i></span>
                            <h4>Structure</h4>
                            <small>3D Structural Workflow</small>
                        </div>
                        <div class="bim-learn-body">
                            <ul class="bim-learn-list">
                                <li><i class="bi bi-check-circle-fill"></i> Structural Columns & Beams</li>
                                <li><i class="bi bi-check-circle-fill"></i> Foundations (Isolated, Raft, Pile Cap)</li>
                                <li><i class="bi bi-check-circle-fill"></i> Structural Floors</li>
                                <li><i class="bi bi-check-circle-fill"></i> Rebar Modelling</li>
                                <li><i class="bi bi-check-circle-fill"></i> Structural Detailing</li>
                            </ul>
                        </div>
                    </article>

                    <article class="bim-learn-card">
                        <div class="bim-learn-top">
                            <span><i class="bi bi-clock-history"></i></span>
                            <h4>Planning</h4>                            <small>4D Coordination</small>
                        </div>
                        <div class="bim-learn-body">
                            <ul class="bim-learn-list">
                                <li><i class="bi bi-check-circle-fill"></i> Project Scheduling (Time)</li>
                                <li><i class="bi bi-check-circle-fill"></i> 4D Simulation with Revit Plugins</li>
                                <li><i class="bi bi-check-circle-fill"></i> Resource Planning</li>
                                <li><i class="bi bi-check-circle-fill"></i> Progress Tracking</li>
                                <li><i class="bi bi-check-circle-fill"></i> Construction Sequence</li>
                            </ul>
                        </div>
                    </article>

                    <article class="bim-learn-card">
                        <div class="bim-learn-top">
                            <span><i class="bi bi-cash-coin"></i></span>
                            <h4>Costing</h4>
                            <small>5D BIM Workflow</small>
                        </div>
                        <div class="bim-learn-body">
                            <ul class="bim-learn-list">
                                <li><i class="bi bi-check-circle-fill"></i> Quantity Takeoff (QTO)</li>
                                <li><i class="bi bi-check-circle-fill"></i> Cost Estimation</li>
                                <li><i class="bi bi-check-circle-fill"></i> 5D BIM with Plugins</li>
                                <li><i class="bi bi-check-circle-fill"></i> BOQ & Cost Reports</li>
                                <li><i class="bi bi-check-circle-fill"></i> Budget vs Actual Tracking</li>
                            </ul>
                        </div>
                    </article>
                </div>

                {{-- Tools + Registration --}}
                <div class="bim-tools-row">
                    <div>
                        <div class="bim-tool-card">
                            <div class="bim-tool-title">
                                <span class="bim-tool-icon"><i class="bi bi-boxes"></i></span>
                                <div>
                                    <h3>Tools &amp; Software</h3>
                                    <p>Industry tools covered during the BIM workflow training.</p>
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <h4 style="color:var(--navy); margin-bottom:10px;">Autodesk Revit</h4>
                                    <ul class="bim-bullets">
                                        <li><i class="bi bi-check-lg"></i> Complete BIM modeling for architecture and structure</li>
                                        <li><i class="bi bi-check-lg"></i> Family creation, documentation, and schedules</li>
                                        <li><i class="bi bi-check-lg"></i> Real project based workflow understanding</li>
                                    </ul>

                                    {{-- Trainer box with real photo --}}
                                    <div class="bim-trainer-box">
                                        <div class="bim-trainer-photo-row">
                                            <div class="bim-trainer-photo">
                                                <img
                                                    src="{{ asset('assets/images/ceo.jpeg') }}"
                                                    alt="Er. Gagandeep Rajput – Trainer, Eshan Buildwell"
                                                    loading="lazy"
                                                />
                                            </div>
                                            <div>
                                                <strong>Er. Gagandeep Rajput</strong>
                                                <div class="sub">Construction & BIM Specialist</div>
                                            </div>
                                        </div>
                                        <ul class="bim-bullets mt-1">
                                            <li><i class="bi bi-dot"></i> 15+ Years Major BIM Projects for Top Constructors</li>
                                            <li><i class="bi bi-dot"></i> 5+ Years as Revit Architecture Trainer</li>
                                            <li><i class="bi bi-dot"></i> BIM Estimation & Costing Expert</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h4 style="color:var(--navy); margin-bottom:10px;">More Tools We Use</h4>
                                    <ul class="bim-bullets">
                                        <li><i class="bi bi-check-lg"></i> Autodesk Navisworks</li>
                                        <li><i class="bi bi-check-lg"></i> DI Roots (5D Costing)</li>
                                        <li><i class="bi bi-check-lg"></i> DS Costing</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-4" style="color:var(--navy); font-size:1.1rem; text-transform: uppercase;">Program Outcome</h4>
                        <p style="margin-bottom: 10px; font-size: 0.95rem; color: var(--muted);">After completion, participants will be able to:</p>
                        <div class="bim-feature-ribbon" style="margin-top: 0;">
                            <span class="bim-feature-pill"><i class="bi bi-diagram-3-fill"></i> Develop complete BIM model (3D • 4D • 5D)</span>
                            <span class="bim-feature-pill"><i class="bi bi-file-earmark-text-fill"></i> Generate working drawings & BOQs</span>
                            <span class="bim-feature-pill"><i class="bi bi-people-fill"></i> Perform basic BIM coordination</span>
                        </div>
                    </div>

                    <aside>
                        {{-- Registration form --}}
                        <div class="bim-register-card" id="bim-register">
                            <span class="bim-mini-badge"><i class="bi bi-fire"></i> Limited Seats Available</span>
                            <h3>BIM Training Registration</h3>
                            <p>Fill your details and we will contact you for batch confirmation and fee details.</p>

                            <form class="bim-form-grid" id="bimTrainingForm" novalidate>
                                <div class="bim-form-row-2">
                                    <input type="text"  id="bimName"   placeholder="Your full name"   required>
                                    <input type="tel"   id="bimPhone"  placeholder="Mobile number"    required>
                                </div>
                                <input  type="email" id="bimEmail"         placeholder="Email address">
                                <input  type="text"  id="bimQualification" placeholder="B.E Civil / B.Arch / Diploma">
                                <div class="bim-radio-row">
                                    <label><input type="radio" name="bimMode" value="Offline" checked> Offline Training (Delhi)</label>
                                </div>
                                <textarea id="bimMessage" placeholder="Weekday or weekend batch preference?"></textarea>
                                <button type="submit" class="bim-submit">
                                    <i class="bi bi-whatsapp"></i> Enroll Now via WhatsApp
                                </button>
                            </form>

                            <div class="bim-register-meta">
                                <div>
                                    <i class="bi bi-calendar-check"></i>
                                    <div>
                                        <strong>Training Format</strong>
                                        <span>Practical sessions with live project guidance</span>
                                    </div>
                                </div>
                                <div>
                                    <i class="bi bi-journal-check"></i>
                                    <div>
                                        <strong>Coverage</strong>
                                        <span>3D modeling, 4D planning, and 5D costing workflow</span>
                                    </div>
                                </div>
                                <div>
                                    <i class="bi bi-telephone-fill"></i>
                                    <div>
                                        <strong>Quick Contact</strong>
                                        <span>Call or WhatsApp: +91 901544490</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Contact card --}}
                        <div class="bim-contact-card">
                            <h3>Contact Details</h3>
                            <p>Reach us directly for batch timing, fees, and seat availability.</p>
                            <ul class="bim-contact-list">
                                <li>
                                    <i class="bi bi-telephone-fill"></i>
                                    <div><a href="tel:+919015444490">+91 901544490</a></div>
                                </li>
                                <li>
                                    <i class="bi bi-envelope-fill"></i>
                                    <div><a href="mailto:learning@eshanbuildwell.com">learning@eshanbuildwell.com</a></div>
                                </li>
                                <li>
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <div>E-02/38, Sector 16, Rohini, Delhi – 110089</div>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>

                {{-- ══════════════════ CERTIFICATE ══════════════════ --}}
                <div class="bim-cert-section">
                    <div class="bim-cert-section-head">
                        <h2>Program Certificate</h2>
                        <p>Every student who completes the BIM Professional Training Program receives an official Eshan Buildwell certificate recognising their skills in 3D, 4D, and 5D BIM workflow.</p>
                    </div>

                    <div class="bim-cert-outer">
                        {{-- Corner ornaments --}}
                        <span class="bim-cert-corner tl">❧</span>
                        <span class="bim-cert-corner tr">❧</span>
                        <span class="bim-cert-corner bl">❧</span>
                        <span class="bim-cert-corner br">❧</span>

                        {{-- Top bar --}}
                        <div class="bim-cert-topbar">
                            <div class="cb">
                                <span></span><span></span><span></span>
                            </div>
                            <span class="org-name">ESHAN BUILDWELL INDIA</span>
                        </div>

                        {{-- Body --}}
                        <div class="bim-cert-inner">
                            <div class="bim-cert-ornament">✦ &nbsp; ✦ &nbsp; ✦</div>
                            <hr class="bim-cert-divider">

                            <div class="bim-cert-label">This is to proudly certify that</div>
                            <div class="bim-cert-title">Certificate of Completion</div>
                            <div class="bim-cert-awarded">has been awarded to</div>
                            <div class="bim-cert-name">Er. Your Name Here</div>

                            <hr class="bim-cert-divider">

                            <div class="bim-cert-body-text">
                                Has successfully completed the <strong>BIM Professional Training Program</strong> conducted
                                by Eshan Buildwell India with dedication, hard work, and outstanding performance in
                                all practical sessions and project-based assignments.
                            </div>

                            <div class="bim-cert-course-box">
                                <strong>BIM Professional Training Program</strong>
                                Architecture &amp; Structure (3D) &nbsp;·&nbsp; Planning (4D) &nbsp;·&nbsp; Costing (5D)<br>
                                <span style="font-size:10px; color:#888;">Tools: Autodesk Revit &nbsp;·&nbsp; Navisworks &nbsp;·&nbsp; DiRoots Plugins</span>
                            </div>

                            <hr class="bim-cert-divider">

                            <div class="bim-cert-footer-row">
                                <div class="bim-cert-sig">
                                    <div class="bim-cert-sig-name">Gagandeep</div>
                                    <div class="bim-cert-sig-line"></div>
                                    <div class="bim-cert-sig-role">
                                        Er. Gagandeep Rajput<br>
                                        Founder &amp; Director<br>
                                        Eshan Buildwell India
                                    </div>
                                </div>

                                <div class="bim-cert-seal">
                                    <div class="seal-big">BIM</div>
                                    <div>CERTIFIED</div>
                                    <div>ESHAN</div>
                                    <div>BUILDWELL</div>
                                </div>

                                <div class="bim-cert-qr" title="Scan to verify"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ══════════════════ FAQ ══════════════════ --}}

                {{-- Bottom bar --}}
                <div class="bim-bottom-bar">
                    <div class="bim-note-list">
                        <span><i class="bi bi-check-circle-fill"></i> Real construction project context</span>
                        <span><i class="bi bi-check-circle-fill"></i> Complete BIM workflow exposure</span>
                        <span><i class="bi bi-check-circle-fill"></i> BOQ and documentation support</span>
                        <span><i class="bi bi-check-circle-fill"></i> Personal attention in small batches</span>
                    </div>
                    <div class="bim-brand-note">Eshan Buildwell India &nbsp;|&nbsp; BIM Training Wing</div>
                </div>

            </div>{{-- /bim-body --}}
        </div>{{-- /bim-flyer-shell --}}
    </div>{{-- /container --}}

    {{-- CTA Strip --}}
    <section class="cta-strip">
        <div class="container">
            <h2>Ready to Start Your BIM Journey?</h2>
            <p>Join the next batch and learn BIM workflow with practical project-based guidance.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="#bim-register" class="btn-cta-lg">Register Now <i class="bi bi-chevron-right ms-2"></i></a>
                <a href="https://wa.me/919015444490?text=Hi%2C%20I%20want%20to%20enroll%20in%20the%20BIM%20Training%20Program."
                   target="_blank" class="btn-cta-outline">WhatsApp Us</a>
            </div>
        </div>
    </section>
</div>{{-- /bim-flyer-page --}}

@push('scripts')
<script>
    document.getElementById('bimTrainingForm')?.addEventListener('submit', function (e) {
        e.preventDefault();

        const name          = document.getElementById('bimName')?.value.trim()          || '';
        const phone         = document.getElementById('bimPhone')?.value.trim()         || '';
        const email         = document.getElementById('bimEmail')?.value.trim()         || '';
        const qualification = document.getElementById('bimQualification')?.value.trim() || '';
        const message       = document.getElementById('bimMessage')?.value.trim()       || '';
        const mode          = document.querySelector('input[name="bimMode"]:checked')?.value || '';

        const text = [
            'Hello, I want to enroll in the BIM Training Program.',
            name          ? 'Name: '          + name          : '',
            phone         ? 'Mobile: '        + phone         : '',
            email         ? 'Email: '         + email         : '',
            qualification ? 'Qualification: ' + qualification : '',
            mode          ? 'Mode: '          + mode          : '',
            message       ? 'Message: '       + message       : ''
        ].filter(Boolean).join('\n');

        window.open('https://wa.me/919015444490?text=' + encodeURIComponent(text), '_blank');
    });
</script>
@endpush

@endsection