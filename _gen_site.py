#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Healing Harmony Dental Clinic — from-scratch static site generator.
Built independently: own markup patterns, own CSS (assets/css/site.css),
own JS (assets/js/site.js). Not derived from any other theme."""
import os

BASE = os.path.dirname(os.path.abspath(__file__))
IMG = "_preview_img/"

PHONE_DISPLAY = "+91 98110 00000"
PHONE_TEL = "tel:+919811000000"
WA_NUM = "919811000000"
def wa(msg):
    import urllib.parse
    return f"https://wa.me/{WA_NUM}?text={urllib.parse.quote(msg)}"
WA_BOOK = wa("Hello Healing Harmony Dental Clinic, I would like to book an appointment.")
WA_CHAT = wa("Hello Healing Harmony Dental Clinic, how can I help you?")
EMAIL = "hello@healingharmonydental.in"
ADDRESS = "219, M Block Road, Greater Kailash II, New Delhi – 110048"
MAPS = "https://www.google.com/maps/search/Healing+Harmony+Dental+Clinic+Greater+Kailash+II"
HOURS = "Mon–Sat · 10:00 am – 8:00 pm"
IG = "https://www.instagram.com/healingharmonydental"
FB = "https://www.facebook.com/healingharmonydental"

NAV = [
    ("index.html", "Home"),
    ("about.html", "About"),
    ("treatments.html", "Treatments"),
    ("doctors.html", "Doctors"),
    ("clinic.html", "Clinic"),
    ("journal.html", "Journal"),
    ("contact.html", "Contact"),
]

# ---------------------------------------------------------------- icons ----
def ic(path, size=18):
    return f'<svg class="ic" viewBox="0 0 24 24" width="{size}" height="{size}" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{path}</svg>'

I_PHONE = ic('<path d="M6.5 3h3l1.5 5-2 1.5a12 12 0 0 0 5.5 5.5L16 18l5 1.5v3a1 1 0 0 1-1.1 1A18 18 0 0 1 3.5 6.1 1 1 0 0 1 4.5 5"/>')
I_WA = '<svg class="ic" viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true"><path d="M17.47 14.38c-.29-.14-1.7-.84-1.96-.94-.26-.1-.45-.14-.64.15-.19.29-.74.94-.91 1.13-.17.19-.34.21-.62.07-.29-.14-1.21-.45-2.3-1.42-.85-.76-1.42-1.7-1.59-1.98-.17-.29-.02-.44.13-.58.13-.13.29-.34.43-.51.14-.17.19-.29.29-.48.1-.19.05-.36-.02-.51-.07-.14-.64-1.55-.88-2.12-.23-.55-.47-.48-.64-.48h-.55c-.19 0-.5.07-.76.36-.26.29-1 .98-1 2.38 0 1.4 1.02 2.76 1.17 2.95.14.19 2.01 3.08 4.88 4.32.68.29 1.21.47 1.63.6.68.22 1.31.19 1.8.12.55-.08 1.7-.69 1.94-1.36.24-.67.24-1.24.17-1.36-.07-.12-.26-.19-.55-.33z"/><path d="M12 .9C5.87.9.9 5.87.9 12c0 1.95.51 3.86 1.48 5.55L.8 23.1l5.68-1.49A11.06 11.06 0 0 0 12 23.1c6.13 0 11.1-4.97 11.1-11.1S18.13.9 12 .9zm0 20.2c-1.72 0-3.4-.46-4.87-1.34l-.35-.21-3.37.89.9-3.29-.23-.35A9.06 9.06 0 0 1 2.9 12 9.1 9.1 0 1 1 12 21.1z"/></svg>'
I_CLOCK = ic('<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>')
I_PIN = ic('<path d="M12 21s7-5.5 7-11a7 7 0 1 0-14 0c0 5.5 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/>')
I_ARROW = ic('<path d="M5 12h14M13 6l6 6-6 6"/>')
I_MAIL = ic('<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M4 7l8 6 8-6"/>')
I_TOOTH = ic('<path d="M12 5.2c-1.6-1.3-3.1-1.9-4.5-1.5-1.9.5-3.2 2.2-3.2 4.5 0 1.7.4 2.9.9 4.5.3 1.3.4 2.6.6 4 .2 1.5.5 3.3 1.7 3.3s1.3-1.4 1.6-2.8c.3-1.3.6-2.6 1.5-2.6s1.2 1.3 1.5 2.6c.3 1.4.5 2.8 1.6 2.8 1.2 0 1.5-1.8 1.7-3.3.2-1.4.3-2.7.6-4 .5-1.6.9-2.8.9-4.5 0-2.3-1.3-4-3.2-4.5-1.4-.4-2.9.2-4.5 1.5z"/>', 22)
I_IG = ic('<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>', 15)
I_FB = '<svg class="ic" viewBox="0 0 24 24" width="15" height="15" fill="currentColor" aria-hidden="true"><path d="M14 8h2V5h-2c-1.7 0-3 1.3-3 3v2H9v3h2v6h3v-6h2l1-3h-3V8.5c0-.3.2-.5.5-.5z"/></svg>'
I_STAR = ic('<path d="M12 3l2.6 5.6L20 9.5l-4 4 1 5.9L12 16.6 7 19.4l1-5.9-4-4 5.4-.9z"/>', 15)
I_MENU = '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M3 6h18M3 12h18M3 18h18"/></svg>'
I_CLOSE = '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>'

HERO_PATTERN = '''<svg class="hero__pattern" viewBox="0 0 1200 700" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
<g stroke="#F6EFE1" stroke-opacity="0.12" fill="none" stroke-width="1.1">
<path d="M-80 640 Q 0 560 80 640 T 240 640 T 400 640 T 560 640 T 720 640 T 880 640 T 1040 640 T 1200 640 T 1360 640"/>
<path d="M-80 686 Q 0 610 80 686 T 240 686 T 400 686 T 560 686 T 720 686 T 880 686 T 1040 686 T 1200 686 T 1360 686" stroke-opacity="0.07"/>
</g>
<g stroke="#C98A6B" stroke-opacity="0.4" fill="none" stroke-width="1.3" transform="translate(1010,50)">
<path d="M0 150 C 12 90 12 40 0 0"/>
<path d="M0 112 C -24 100 -42 76 -46 50"/>
<path d="M0 76 C 24 64 42 40 46 14"/>
<path d="M0 38 C -18 28 -30 10 -32 -8"/>
</g>
</svg>'''

# ---------------------------------------------------------------- shell ----
def page(title, description, body, active="", extra_head=""):
    def _nav_item(href, label):
        cur = ' aria-current="page"' if href == active else ""
        return f'<li><a href="{href}"{cur}>{label}</a></li>'
    nav_links = "".join(_nav_item(href, label) for href, label in NAV)
    mobile_links = "".join(f'<li><a href="{href}">{label}</a></li>' for href, label in NAV)
    return f'''<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{title} — Healing Harmony Dental Clinic</title>
<meta name="description" content="{description}">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,400;1,9..144,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/site.css">
<link rel="icon" href="{IMG}favicon.png">
{extra_head}
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>

<div class="topbar"><div class="wrap topbar__row">
<div class="topbar__info">
<a href="{PHONE_TEL}">{I_PHONE}<span>{PHONE_DISPLAY}</span></a>
<a href="{WA_CHAT}" target="_blank" rel="noopener">{I_WA}<span>WhatsApp</span></a>
<span>{I_CLOCK}<span>{HOURS}</span></span>
</div>
<div class="topbar__soc">
<a href="{IG}" target="_blank" rel="noopener" aria-label="Instagram">{I_IG}</a>
<a href="{FB}" target="_blank" rel="noopener" aria-label="Facebook">{I_FB}</a>
<a href="{MAPS}" target="_blank" rel="noopener" aria-label="Directions">{I_PIN}</a>
</div>
</div></div>

<header class="site-header" data-header>
<div class="wrap nav">
<a class="brand" href="index.html">
<span class="brand__mark">{I_TOOTH}</span>
<span class="brand__word"><span class="brand__name">Healing Harmony</span><span class="brand__tag">Dental Clinic</span></span>
</a>
<ul class="nav__menu">{nav_links}</ul>
<a class="btn nav__cta" href="{WA_BOOK}" target="_blank" rel="noopener">Book an Appointment</a>
<button class="nav__toggle" data-nav-toggle aria-label="Open menu" aria-expanded="false">{I_MENU}</button>
</div>
</header>

<div class="nav-scrim" data-nav-scrim></div>
<nav class="mobile-nav" data-mobile-nav aria-label="Mobile">
<button class="mobile-nav__close" data-nav-close aria-label="Close menu">{I_CLOSE}</button>
<ul>{mobile_links}</ul>
<a class="btn" style="width:100%;justify-content:center" href="{WA_BOOK}" target="_blank" rel="noopener">Book an Appointment</a>
</nav>

<main id="main">
{body}
</main>

<footer class="site-footer">
<div class="wrap footer-grid">
<div>
<p class="footer-brand__name">Healing Harmony Dental Clinic</p>
<p class="footer-brand__stmt">A calm, specialist-led dental practice in Greater Kailash II — considered care, gently delivered.</p>
<div class="footer-soc">
<a href="{IG}" target="_blank" rel="noopener" aria-label="Instagram">{I_IG}</a>
<a href="{FB}" target="_blank" rel="noopener" aria-label="Facebook">{I_FB}</a>
<a href="{MAPS}" target="_blank" rel="noopener" aria-label="Directions">{I_PIN}</a>
</div>
</div>
<div class="footer-col"><h5>Explore</h5><ul>
<li><a href="about.html">About</a></li><li><a href="treatments.html">Treatments</a></li>
<li><a href="doctors.html">Doctors</a></li><li><a href="clinic.html">Clinic</a></li>
<li><a href="journal.html">Journal</a></li></ul></div>
<div class="footer-col"><h5>Treatments</h5><ul>
<li><a href="treatments.html#implants">Dental Implants</a></li><li><a href="treatments.html#root-canal">Root Canal Therapy</a></li>
<li><a href="treatments.html#cosmetic">Cosmetic Dentistry</a></li><li><a href="treatments.html#aligners">Aligners &amp; Orthodontics</a></li></ul></div>
<div class="footer-col"><h5>Visit</h5><ul>
<li>{ADDRESS}</li><li><a href="{PHONE_TEL}">{PHONE_DISPLAY}</a></li>
<li><a href="mailto:{EMAIL}">{EMAIL}</a></li><li>{HOURS}</li></ul></div>
</div>
<div class="wrap footer-bottom">
<span>&copy; 2026 Healing Harmony Dental Clinic. All rights reserved.</span>
<span><a href="privacy.html">Privacy Policy</a><a href="disclaimer.html">Medical Disclaimer</a></span>
</div>
</footer>

<a class="wa-fab" href="{WA_CHAT}" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">{I_WA}</a>
<nav class="mobar" aria-label="Quick contact"><div class="mobar__row">
<a href="{PHONE_TEL}">{I_PHONE}<span>Call</span></a>
<a href="{WA_CHAT}" target="_blank" rel="noopener">{I_WA}<span>Chat</span></a>
<a class="is-primary" href="{WA_BOOK}" target="_blank" rel="noopener">{I_ARROW}<span>Book</span></a>
</div></nav>

<script src="assets/js/site.js"></script>
</body>
</html>'''

def section_head(kicker, title, intro="", center=False, light=False):
    c = " is-center" if center else ""
    ec = "eyebrow--center" if center else ""
    el = "eyebrow--light" if light else ""
    out = f'<div class="section-head{c}" data-reveal><span class="eyebrow {ec} {el}">{kicker}</span><h2 class="display-2">{title}</h2>'
    if intro:
        out += f'<p class="lead" style="margin-top:1rem">{intro}</p>'
    return out + "</div>"

print("partials ready")

# ============================================================== INDEX =====
def build_index():
    hero = f'''<section class="hero">
{HERO_PATTERN}
<div class="wrap hero__inner">
<div class="hero__grid">
<div class="hero__text" data-reveal>
<span class="hero__eyebrow">Greater Kailash II &middot; New Delhi</span>
<h1 class="hero__title">Dentistry, practised <em>quietly</em> and well.</h1>
<p class="hero__lead">A specialist-led practice built around unhurried appointments, careful listening, and treatment that is explained before it is done.</p>
<div class="hero__actions">
<a class="btn" href="{WA_BOOK}" target="_blank" rel="noopener">Book an Appointment</a>
<a class="text-link text-link--light" href="{WA_CHAT}" target="_blank" rel="noopener">{I_WA}<span>WhatsApp us</span></a>
<a class="text-link text-link--light" href="{PHONE_TEL}">{I_PHONE}<span>{PHONE_DISPLAY}</span></a>
</div>
<dl class="hero__ticket">
<div><dt>Address</dt><dd>219, M Block Road, GK&#8209;II</dd></div>
<div><dt>Hours</dt><dd>{HOURS}</dd></div>
<div><dt>Approach</dt><dd>One patient, one appointment, full attention</dd></div>
</dl>
</div>
<div class="hero__media" data-reveal>
<figure class="hero__frame"><img src="{IMG}treatment-green.jpg" alt="A treatment room at Healing Harmony Dental Clinic"><span class="hero__frame__tag">The clinic &middot; Greater Kailash II</span></figure>
</div>
</div>
</div>
</section>'''

    factstrip = f'''<section class="factstrip"><div class="wrap factstrip__row" data-reveal>
<div class="fact"><span class="fact__no">01</span><h3>Specialist-led</h3><p>Prosthodontics, endodontics and implantology, each handled by a specialist.</p></div>
<div class="fact"><span class="fact__no">02</span><h3>Unhurried care</h3><p>Longer appointments and no conveyor-belt scheduling.</p></div>
<div class="fact"><span class="fact__no">03</span><h3>Modern technique</h3><p>Digital imaging and microscope-assisted procedures where they help.</p></div>
<div class="fact"><span class="fact__no">04</span><h3>Clearly explained</h3><p>You always know what is being done, and why, before it happens.</p></div>
</div></section>'''

    intro = f'''<section class="section bg-card"><div class="wrap split">
<div data-reveal>
<span class="eyebrow">Our approach</span>
<h2 class="display-2">Considered dentistry, without the theatre.</h2>
<p class="lead" style="margin-top:1.3rem">We keep the practice deliberately calm: fewer appointments booked per hour, more time spent listening, and treatment plans that are written down and explained — not rushed through between patients.</p>
<p class="muted" style="margin-top:1rem">Every case that needs a specialist’s eye — root canal therapy, implants, full-mouth rehabilitation — is planned by someone who does that work every day, not as a side interest.</p>
<a class="text-link" style="margin-top:1.6rem" href="about.html">More on how we work{I_ARROW}</a>
</div>
<div class="split__media" data-reveal>
<figure class="frame frame--tall"><img src="{IMG}treatment-room.jpg" alt="A treatment room at Healing Harmony Dental Clinic"></figure>
</div>
</div></section>'''

    treatments_teaser = f'''<section class="section bg-band"><div class="wrap">
{section_head("What we treat", "A full range of dental care, under one roof.", "From routine hygiene to complex restorative and cosmetic work — handled by the specialist it actually needs.")}
<ul class="tlist" data-reveal>
<li><a href="treatments.html#implants"><span class="tlist__thumb"><img src="{IMG}blog/implants.jpg" alt=""></span><span class="tlist__body"><h3>Dental Implants</h3><p>Titanium implants, including sinus-lift procedures where the bone needs support.</p></span><span class="tlist__arrow">{I_ARROW}</span></a></li>
<li><a href="treatments.html#root-canal"><span class="tlist__thumb"><img src="{IMG}services/root-canal.jpg" alt=""></span><span class="tlist__body"><h3>Root Canal Therapy</h3><p>Microscope-assisted endodontics, often completed in a single visit.</p></span><span class="tlist__arrow">{I_ARROW}</span></a></li>
<li><a href="treatments.html#cosmetic"><span class="tlist__thumb"><img src="{IMG}services/cosmetic.jpg" alt=""></span><span class="tlist__body"><h3>Cosmetic Dentistry</h3><p>Veneers, whitening and smile design, kept natural rather than uniform.</p></span><span class="tlist__arrow">{I_ARROW}</span></a></li>
<li><a href="treatments.html#aligners"><span class="tlist__thumb"><img src="{IMG}blog/aligners.jpg" alt=""></span><span class="tlist__body"><h3>Aligners &amp; Orthodontics</h3><p>Clear aligners and fixed braces for adults and teenagers.</p></span><span class="tlist__arrow">{I_ARROW}</span></a></li>
</ul>
<p style="margin-top:2.2rem" data-reveal><a class="text-link" href="treatments.html">View every treatment{I_ARROW}</a></p>
</div></section>'''

    values = f'''<section class="section bg-ink"><div class="wrap">
{section_head("Why patients stay", "Care that holds up to scrutiny.", "", light=True)}
<div class="values" data-reveal>
<div class="value"><span class="value__no">i.</span><div><h3 class="value__t">Nothing is oversold</h3><p class="value__d">If a treatment isn’t needed yet, we say so — even when it costs us the sale.</p></div></div>
<div class="value"><span class="value__no">ii.</span><div><h3 class="value__t">One specialist per discipline</h3><p class="value__d">Prosthodontics, endodontics and implantology are handled by people who specialise in exactly that.</p></div></div>
<div class="value"><span class="value__no">iii.</span><div><h3 class="value__t">Sterilisation taken seriously</h3><p class="value__d">Single-use instruments where it matters, and hospital-grade sterilisation for everything else.</p></div></div>
<div class="value"><span class="value__no">iv.</span><div><h3 class="value__t">A practice that remembers you</h3><p class="value__d">Your history and preferences travel with you — no re-explaining at every visit.</p></div></div>
</div>
</div></section>'''

    team_teaser = f'''<section class="section bg-card"><div class="wrap">
<div style="display:flex;align-items:flex-end;justify-content:space-between;gap:2rem;flex-wrap:wrap;margin-bottom:clamp(2rem,4vw,3rem)" data-reveal>
<div><span class="eyebrow">The team</span><h2 class="display-2">Familiar faces, every visit.</h2></div>
<a class="text-link" href="doctors.html">Meet the team{I_ARROW}</a>
</div>
<div class="team-grid" data-reveal>
<article class="person"><a class="person__photo" href="doctors.html"><img src="{IMG}doctors/member-1.jpg" alt=""></a><div class="person__body"><h3 class="person__name">Dr. [Your Dentist]</h3><p class="person__role">Founder &amp; Prosthodontist</p><p class="person__qual">BDS, MDS (Prosthodontics)</p></div></article>
<article class="person"><a class="person__photo" href="doctors.html"><img src="{IMG}doctors/member-2.jpg" alt=""></a><div class="person__body"><h3 class="person__name">Dr. [Your Dentist]</h3><p class="person__role">Endodontist &amp; Implantologist</p><p class="person__qual">BDS, MSc (Endodontics)</p></div></article>
<article class="person"><a class="person__photo" href="doctors.html"><img src="{IMG}doctors/member-3.jpg" alt=""></a><div class="person__body"><h3 class="person__name">Dr. [Your Dentist]</h3><p class="person__role">Prosthodontist &amp; Implantologist</p><p class="person__qual">BDS, MDS (Prosthodontics)</p></div></article>
</div>
</div></section>'''

    reviews = f'''<section class="section bg-band"><div class="wrap split split--rev">
<div class="split__media" data-reveal><figure class="frame frame--tall"><img src="{IMG}reception.jpg" alt="Reception at Healing Harmony Dental Clinic"></figure></div>
<div data-reveal>
<span class="eyebrow">Patient trust</span>
<h2 class="display-2">Read as families describe us.</h2>
<div style="margin-top:2rem">
<div class="quote"><blockquote>Excellent team of doctors providing the best treatment in the area — I’m not scared of dental treatment anymore.</blockquote><cite>Patient review</cite></div>
<div class="quote"><blockquote>Well equipped clinic with a good team of experienced doctors. Very clean and well managed.</blockquote><cite>Patient review</cite></div>
</div>
<a class="text-link" style="margin-top:1.8rem" href="{MAPS}" target="_blank" rel="noopener">Read reviews on Google{I_ARROW}</a>
</div>
</div></section>'''

    cta = f'''<section class="ctaband"><div class="wrap ctaband__row" data-reveal>
<div><span class="eyebrow eyebrow--light">Book your visit</span><h2>Ready when you are.</h2><p>Message us on WhatsApp or call the clinic — new patients are always welcome.</p></div>
<div class="ctaband__btns"><a class="btn btn--cream" href="{WA_BOOK}" target="_blank" rel="noopener">Book an Appointment</a><a class="text-link text-link--light" href="{WA_CHAT}" target="_blank" rel="noopener">Chat with us{I_ARROW}</a></div>
</div></section>'''

    body = hero + factstrip + intro + treatments_teaser + values + team_teaser + reviews + cta
    return page(
        "Specialist-Led Dental Clinic in Greater Kailash II, New Delhi",
        "Healing Harmony Dental Clinic — a specialist-led, unhurried dental practice in Greater Kailash II, New Delhi.",
        body, active="index.html"
    )

open(os.path.join(BASE, "index.html"), "w", encoding="utf-8").write(build_index())
print("index.html written")

# ============================================================== ABOUT =====
def build_about():
    hero = f'''<section class="section" style="padding-top:clamp(3rem,6vw,4.5rem)"><div class="wrap">
<nav aria-label="Breadcrumb" class="muted" style="font-size:.85rem;margin-bottom:1.6rem"><a href="index.html">Home</a> / About</nav>
<span class="eyebrow">About the practice</span>
<h1 class="display-1" style="max-width:16ch">A practice built around attention, not volume.</h1>
<p class="lead" style="margin-top:1.4rem;max-width:60ch">Healing Harmony Dental Clinic is a specialist-led practice in Greater Kailash II, New Delhi — built on a simple idea: dentistry works best when nobody is rushed.</p>
</div></section>'''

    story = f'''<section class="section bg-card"><div class="wrap split split--rev">
<div class="split__media" data-reveal><figure class="frame frame--tall"><img src="{IMG}treatment-suite.jpg" alt="Treatment suite"></figure></div>
<div data-reveal>
<span class="eyebrow">Why we exist</span>
<h2 class="display-2">Most dental anxiety isn’t about pain — it’s about being rushed.</h2>
<p class="lead" style="margin-top:1.3rem">We built Healing Harmony around the opposite instinct: longer appointments, plans explained in plain language, and a specialist for every discipline rather than one generalist covering everything.</p>
<p class="muted" style="margin-top:1rem">It means we see fewer patients in a day than a typical clinic. We think that trade is worth making.</p>
</div>
</div></section>'''

    values = f'''<section class="section bg-ink"><div class="wrap">
{section_head("How we work", "A short list of things we take seriously.", "", light=True)}
<div class="values" data-reveal>
<div class="value"><span class="value__no">i.</span><div><h3 class="value__t">Listening comes first</h3><p class="value__d">Every visit starts with your concerns, not our checklist.</p></div></div>
<div class="value"><span class="value__no">ii.</span><div><h3 class="value__t">Plans in writing</h3><p class="value__d">You leave knowing what was found, what is recommended, and why — with no pressure to decide immediately.</p></div></div>
<div class="value"><span class="value__no">iii.</span><div><h3 class="value__t">Specialist by discipline</h3><p class="value__d">Prosthodontics, endodontics and implantology are each led by someone trained specifically in that field.</p></div></div>
<div class="value"><span class="value__no">iv.</span><div><h3 class="value__t">Technology in service of comfort</h3><p class="value__d">Digital imaging and microscope-assisted procedures are used where they genuinely improve the outcome — not for their own sake.</p></div></div>
</div>
</div></section>'''

    cta = f'''<section class="ctaband"><div class="wrap ctaband__row" data-reveal>
<div><span class="eyebrow eyebrow--light">Meet the team</span><h2>Get to know who will treat you.</h2><p>Every doctor’s background, training and focus — in full.</p></div>
<div class="ctaband__btns"><a class="btn btn--cream" href="doctors.html">Meet the Doctors</a></div>
</div></section>'''

    body = hero + story + values + cta
    return page("About", "The philosophy behind Healing Harmony Dental Clinic, Greater Kailash II.", body, active="about.html")

open(os.path.join(BASE, "about.html"), "w", encoding="utf-8").write(build_about())
print("about.html written")

# ========================================================== TREATMENTS ====
def build_treatments():
    hero = f'''<section class="section" style="padding-top:clamp(3rem,6vw,4.5rem)"><div class="wrap">
<nav aria-label="Breadcrumb" class="muted" style="font-size:.85rem;margin-bottom:1.6rem"><a href="index.html">Home</a> / Treatments</nav>
<span class="eyebrow">Treatments</span>
<h1 class="display-1" style="max-width:18ch">Every treatment, handled by the right specialist.</h1>
<p class="lead" style="margin-top:1.4rem;max-width:60ch">From routine hygiene to complex restorative and cosmetic work. If something needs a second opinion, we’ll tell you before you ask.</p>
</div></section>'''

    items = [
        ("implants", "blog/implants.jpg", "Dental Implants", "Titanium implants replace missing teeth at the root, preserving jaw bone and avoiding the need to cut down neighbouring teeth. Sinus-lift procedures are planned in advance where the upper jaw needs extra support."),
        ("root-canal", "services/root-canal.jpg", "Root Canal Therapy", "Microscope-assisted endodontics to save a tooth that would otherwise need extraction. Most cases are completed in a single, comfortable visit."),
        ("cosmetic", "services/cosmetic.jpg", "Cosmetic Dentistry", "Veneers, professional whitening and smile design — planned around your natural proportions rather than a uniform ‘perfect smile’ template."),
        ("crowns-bridges", "blog/crowns.jpg", "Crowns &amp; Bridges", "Tooth-coloured ceramic crowns and bridges that restore damaged teeth or replace missing ones, matched carefully to your bite and shade."),
        ("aligners", "blog/aligners.jpg", "Aligners &amp; Orthodontics", "Clear aligners and fixed braces for adults and teenagers, planned digitally from the first consultation."),
        ("laser", "services/laser.jpg", "Laser Dentistry", "Minimally invasive laser treatment for gum care and select surgical procedures, often with less discomfort and faster healing."),
        ("oral-surgery", "services/oral-surgery.jpg", "Oral &amp; Maxillofacial Surgery", "Complex extractions and surgical procedures, handled with careful planning and clear aftercare guidance."),
        ("family", "blog/specialist-care.jpg", "Family &amp; Preventive Dentistry", "Check-ups, cleaning, fillings and fluoride care for every member of the family, from first visit onward."),
        ("whitening", "blog/whitening.jpg", "Teeth Whitening", "Professional, supervised whitening that is safe for enamel and kind to sensitive teeth — done properly, it is a safe procedure."),
    ]
    lis = []
    for i, (anchor, img, title, desc) in enumerate(items, start=1):
        lis.append(f'<li id="{anchor}"><a href="{WA_BOOK}" target="_blank" rel="noopener"><span class="tlist__thumb"><img src="{IMG}{img}" alt=""></span><span class="tlist__body"><h3>{title}</h3><p>{desc}</p></span><span class="tlist__arrow">{I_ARROW}</span></a></li>')
    listing = f'''<section class="section bg-card"><div class="wrap">
<ul class="tlist" data-reveal>{"".join(lis)}</ul>
</div></section>'''

    cta = f'''<section class="ctaband"><div class="wrap ctaband__row" data-reveal>
<div><span class="eyebrow eyebrow--light">Not sure what you need?</span><h2>Tell us the problem — we’ll recommend the treatment.</h2></div>
<div class="ctaband__btns"><a class="btn btn--cream" href="{WA_BOOK}" target="_blank" rel="noopener">WhatsApp Us</a></div>
</div></section>'''

    body = hero + listing + cta
    return page("Treatments", "The full range of dental treatments offered at Healing Harmony Dental Clinic.", body, active="treatments.html")

open(os.path.join(BASE, "treatments.html"), "w", encoding="utf-8").write(build_treatments())
print("treatments.html written")

# ============================================================= DOCTORS ====
def build_doctors():
    hero = f'''<section class="section" style="padding-top:clamp(3rem,6vw,4.5rem)"><div class="wrap">
<nav aria-label="Breadcrumb" class="muted" style="font-size:.85rem;margin-bottom:1.6rem"><a href="index.html">Home</a> / Doctors</nav>
<span class="eyebrow">The team</span>
<h1 class="display-1" style="max-width:16ch">Familiar faces, every visit.</h1>
<p class="lead" style="margin-top:1.4rem;max-width:60ch">A small, consistent team — which means the person examining you today is the one who will see your treatment through.</p>
</div></section>'''

    docs = [
        ("member-1", "Dr. [Your Dentist]", "Founder &amp; Prosthodontist", "BDS, MDS (Prosthodontics)",
         "Leads full-mouth rehabilitation, crowns, bridges and implant-supported restorations — with a focus on function that lasts, not just appearance."),
        ("member-2", "Dr. [Your Dentist]", "Endodontist &amp; Certified Implantologist", "BDS, MSc (Endodontics)",
         "Specialises in microscope-assisted root canal therapy and precision implant placement, trained in both India and the UK."),
        ("member-3", "Dr. [Your Dentist]", "Prosthodontist &amp; Certified Implantologist", "BDS, MDS (Prosthodontics)",
         "Focuses on veneers, smile design and full-mouth rehabilitation, with meticulous attention to natural-looking detail."),
    ]
    cards = []
    for slug, name, role, qual, bio in docs:
        cards.append(f'''<article class="person" data-reveal>
<div class="person__photo"><img src="{IMG}doctors/{slug}.jpg" alt="{name}"></div>
<div class="person__body"><h3 class="person__name">{name}</h3><p class="person__role">{role}</p><p class="person__qual">{qual}</p><p class="person__bio">{bio}</p></div>
</article>''')
    grid = f'''<section class="section bg-card"><div class="wrap"><div class="team-grid">{"".join(cards)}</div></div></section>'''

    cta = f'''<section class="ctaband"><div class="wrap ctaband__row" data-reveal>
<div><span class="eyebrow eyebrow--light">Book a consultation</span><h2>Meet the team in person.</h2></div>
<div class="ctaband__btns"><a class="btn btn--cream" href="{WA_BOOK}" target="_blank" rel="noopener">Book an Appointment</a></div>
</div></section>'''

    body = hero + grid + cta
    return page("Doctors", "Meet the specialists at Healing Harmony Dental Clinic, Greater Kailash II.", body, active="doctors.html")

open(os.path.join(BASE, "doctors.html"), "w", encoding="utf-8").write(build_doctors())
print("doctors.html written")

# ============================================================== CLINIC ====
def build_clinic():
    hero = f'''<section class="section" style="padding-top:clamp(3rem,6vw,4.5rem)"><div class="wrap">
<nav aria-label="Breadcrumb" class="muted" style="font-size:.85rem;margin-bottom:1.6rem"><a href="index.html">Home</a> / Clinic</nav>
<span class="eyebrow">The clinic</span>
<h1 class="display-1" style="max-width:16ch">A calm, considered space.</h1>
<p class="lead" style="margin-top:1.4rem;max-width:60ch">Inside the Physiocare centre on M Block Road, Greater Kailash II — designed to feel unhurried from the moment you walk in.</p>
</div></section>'''

    gallery = f'''<section class="section bg-card"><div class="wrap">
<div class="gallery" data-reveal>
<figure class="frame g1"><img src="{IMG}reception.jpg" alt="Reception"><span class="frame__tag">Reception</span></figure>
<figure class="frame g2"><img src="{IMG}treatment-room.jpg" alt="Treatment room"><span class="frame__tag">Treatment room</span></figure>
<figure class="frame g3"><img src="{IMG}treatment-suite.jpg" alt="Treatment suite"><span class="frame__tag">Treatment suite</span></figure>
<figure class="frame g4"><img src="{IMG}xray-room.jpg" alt="Imaging"><span class="frame__tag">Digital imaging</span></figure>
<figure class="frame g5"><img src="{IMG}treatment-green.jpg" alt="Treatment area"><span class="frame__tag">Treatment area</span></figure>
</div>
</div></section>'''

    access = f'''<section class="section bg-ink"><div class="wrap split">
<div data-reveal><span class="eyebrow eyebrow--light">Getting here</span><h2 class="display-2" style="color:var(--cream)">Easy to find, easy to reach.</h2><p class="muted" style="margin-top:1.2rem">{ADDRESS}, on the ground floor of the Physiocare centre. Lift and stairlift access are available for patients who need it.</p><a class="text-link text-link--light" style="margin-top:1.4rem" href="{MAPS}" target="_blank" rel="noopener">Open in Google Maps{I_ARROW}</a></div>
<div class="split__media" data-reveal><figure class="frame frame--wide"><img src="{IMG}stairlift.jpg" alt="Accessible entrance"></figure></div>
</div></section>'''

    body = hero + gallery + access
    return page("Clinic", "Inside Healing Harmony Dental Clinic, Greater Kailash II, New Delhi.", body, active="clinic.html")

open(os.path.join(BASE, "clinic.html"), "w", encoding="utf-8").write(build_clinic())
print("clinic.html written")

# ============================================================= JOURNAL ====
def build_journal():
    hero = f'''<section class="section" style="padding-top:clamp(3rem,6vw,4.5rem)"><div class="wrap">
<nav aria-label="Breadcrumb" class="muted" style="font-size:.85rem;margin-bottom:1.6rem"><a href="index.html">Home</a> / Journal</nav>
<span class="eyebrow">The journal</span>
<h1 class="display-1" style="max-width:16ch">Notes on modern dentistry.</h1>
<p class="lead" style="margin-top:1.4rem;max-width:60ch">Short, honest notes — written for patients, not search engines.</p>
</div></section>'''

    posts = [
        ("blog/aligners.jpg", "Clear Aligners or Braces: A Considered Choice", "Straightening teeth is no longer a choice between metal and nothing — but aligners are not the right fit for every case. The honest answer depends on how complex the movement needed is, and how disciplined you can be about wearing them."),
        ("blog/hygiene.jpg", "Protecting Your Teeth Between Visits", "Most dental problems are quieter and slower than people expect, which is exactly why small daily habits matter more than any single appointment. Flossing before brushing, not after, changes more than most people realise."),
        ("blog/whitening.jpg", "Teeth Whitening, Done Safely", "Professional whitening, supervised properly, is safe and effective. The risk isn’t the whitening itself — it’s doing it without checking for existing sensitivity, cavities or thin enamel first."),
    ]
    cards = []
    for img, title, excerpt in posts:
        cards.append(f'''<article style="border-top:1px solid var(--line);padding:clamp(1.8rem,3vw,2.4rem) 0" data-reveal>
<div class="split" style="grid-template-columns:220px 1fr;align-items:start;gap:clamp(1.4rem,3vw,2.4rem)">
<figure class="frame frame--sq"><img src="{IMG}{img}" alt=""></figure>
<div><h3 class="display-3">{title}</h3><p class="muted" style="margin-top:.6rem">{excerpt}</p></div>
</div></article>''')
    listing = f'<section class="section bg-card"><div class="wrap">{"".join(cards)}<div class="rule" style="margin-top:0"></div></div></section>'

    body = hero + listing
    return page("Journal", "Notes on modern dentistry from Healing Harmony Dental Clinic.", body, active="journal.html")

open(os.path.join(BASE, "journal.html"), "w", encoding="utf-8").write(build_journal())
print("journal.html written")

# ============================================================= CONTACT ====
def build_contact():
    hero = f'''<section class="section" style="padding-top:clamp(3rem,6vw,4.5rem)"><div class="wrap">
<nav aria-label="Breadcrumb" class="muted" style="font-size:.85rem;margin-bottom:1.6rem"><a href="index.html">Home</a> / Contact</nav>
<span class="eyebrow">Get in touch</span>
<h1 class="display-1" style="max-width:16ch">Let’s find you a time.</h1>
<p class="lead" style="margin-top:1.4rem;max-width:60ch">Message us on WhatsApp, call the clinic, or send a note below — we usually reply the same day.</p>
</div></section>'''

    grid = f'''<section class="section bg-card"><div class="wrap contact-grid">
<div data-reveal>
<div class="contact-card"><h3>{I_PIN}Visit</h3><p>{ADDRESS}</p><a class="text-link" href="{MAPS}" target="_blank" rel="noopener">Get directions{I_ARROW}</a></div>
<div class="contact-card"><h3>{I_CLOCK}Hours</h3><p>{HOURS}</p></div>
<div class="contact-card"><h3>{I_PHONE}Contact</h3><p><a href="{PHONE_TEL}">{PHONE_DISPLAY}</a><br><a href="mailto:{EMAIL}">{EMAIL}</a></p><a class="text-link" href="{WA_BOOK}" target="_blank" rel="noopener">WhatsApp us{I_ARROW}</a></div>
</div>
<div data-reveal>
<form data-wa-form>
<div class="formfield"><label for="cf-name">Your name</label><input id="cf-name" name="name" type="text" required></div>
<div class="formfield"><label for="cf-phone">Phone number</label><input id="cf-phone" name="phone" type="tel"></div>
<div class="formfield"><label for="cf-msg">How can we help?</label><textarea id="cf-msg" name="message" required></textarea></div>
<button class="btn" type="submit" style="width:100%;justify-content:center">Send via WhatsApp</button>
<p class="form__msg"></p>
</form>
</div>
</div></section>'''

    body = hero + grid
    return page("Contact", "Contact Healing Harmony Dental Clinic, Greater Kailash II, New Delhi.", body, active="contact.html")

open(os.path.join(BASE, "contact.html"), "w", encoding="utf-8").write(build_contact())
print("contact.html written")

# ====================================================== PRIVACY/DISCLAIMER
def build_legal(title, active, paras):
    hero = f'''<section class="section" style="padding-top:clamp(3rem,6vw,4.5rem)"><div class="wrap">
<nav aria-label="Breadcrumb" class="muted" style="font-size:.85rem;margin-bottom:1.6rem"><a href="index.html">Home</a> / {title}</nav>
<span class="eyebrow">Legal</span>
<h1 class="display-1" style="max-width:18ch">{title}</h1>
</div></section>'''
    body_paras = "".join(f'<p class="muted" style="margin-bottom:1.2rem">{p}</p>' for p in paras)
    content = f'<section class="section bg-card"><div class="wrap" style="max-width:70ch">{body_paras}</div></section>'
    body = hero + content
    return page(title, f"{title} — Healing Harmony Dental Clinic.", body, active=active)

open(os.path.join(BASE, "privacy.html"), "w", encoding="utf-8").write(build_legal(
    "Privacy Policy", "privacy.html",
    [
        "Healing Harmony Dental Clinic respects your privacy. Information you share with us — by phone, WhatsApp, email or the contact form on this site — is used only to respond to your enquiry and to manage your care.",
        "We do not sell or share your personal information with third parties for marketing purposes. Clinical records are kept confidential and handled in line with standard medical record-keeping practice.",
        "If you have questions about how your information is handled, please contact us directly at " + EMAIL + ".",
    ]
))
print("privacy.html written")

open(os.path.join(BASE, "disclaimer.html"), "w", encoding="utf-8").write(build_legal(
    "Medical Disclaimer", "disclaimer.html",
    [
        "The content on this website is provided for general informational purposes only and is not a substitute for professional dental advice, diagnosis or treatment.",
        "Always consult a qualified dentist regarding any dental concern before making treatment decisions. Individual results vary from patient to patient depending on clinical circumstances.",
        "In a dental emergency, please call the clinic directly at " + PHONE_DISPLAY + ".",
    ]
))
print("disclaimer.html written")
