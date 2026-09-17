# Healing Harmony Dental — Custom WordPress Theme

A calm, editorial WordPress theme for **Healing Harmony Dental Clinic** — a boutique, single-chair dental studio inside the Physiocare centre on M Block Road, **Greater Kailash II, New Delhi**.

> ⭐ 5.0 on Google · 6 reviews · Open till 8 pm
> 📍 219, M Block Road, Greater Kailash II, New Delhi, Delhi 110048

## Design

- **Palette:** sage / olive green · warm wood · off-white ivory · warm ink — drawn from the clinic's real interior (olive dental chair, cane furniture, clean white walls).
- **Type:** Fraunces (editorial display serif) + Inter (UI sans).
- **Hero:** full-bleed **fading background slideshow** with auto-advance, dots, and reduced-motion support.
- Scroll reveals, count-up stats, sticky header, mobile nav drawer, and a sticky mobile Call / Directions / WhatsApp bar.

## Features

- Fully functional **without any page builder** — pure PHP templates.
- Custom post types: **Doctors**, **Services (Treatments)**, **Testimonials**, **FAQs** (with meta boxes).
- **Customizer** panels for contact details, hours, hero copy, slideshow images and social links — real GK-II defaults pre-filled.
- **Dentist / LocalBusiness JSON-LD schema** with address, hours and aggregate rating.
- Click-to-WhatsApp and click-to-call throughout.
- Graceful fallbacks: every homepage section shows curated placeholder content until you add your own posts.
- Light hardening, translation-ready, responsive down to phone widths.

## Installation

1. Zip this folder (or use the provided `healing-harmony-dental.zip`).
2. WordPress → **Appearance → Themes → Add New → Upload Theme** → activate.
3. **Settings → Reading →** set a static homepage (the theme uses `front-page.php` automatically).
4. **Appearance → Customize** → fill in real phone / WhatsApp / email, and upload hero slideshow + gallery photos.
5. Add **Doctors** and **Services** from the WordPress admin — they flow into the homepage automatically.

## Replacing the placeholder photos

The bundled images in `assets/images/gallery/` are tasteful sage-toned placeholders.
- **Hero slideshow:** Customize → *Homepage — Hero* → upload up to 4 images.
- **Gallery / team / services:** upload via the media library and set featured images on the CPT posts.

## Structure

```
functions.php          bootstrap → loads /inc modules
inc/                   setup, enqueue, template-tags, customizer, post-types, schema, security
template-parts/        hero, intro, services, why, doctors, gallery, reviews, cta
assets/css/theme.css   full design system
assets/js/theme.js     slideshow, nav, reveal, counters
```

---

Custom build for Healing Harmony Dental Clinic, Greater Kailash II, New Delhi.
