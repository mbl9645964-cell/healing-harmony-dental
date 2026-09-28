/* Healing Harmony Dental Clinic — site interactions (built from scratch) */
(function(){
  "use strict";

  document.addEventListener("DOMContentLoaded", function(){

    /* Sticky header shadow */
    var header = document.querySelector(".site-header");
    if(header){
      var onScroll = function(){ header.classList.toggle("scrolled", window.scrollY > 8); };
      onScroll();
      window.addEventListener("scroll", onScroll, { passive:true });
    }

    /* Mobile nav drawer */
    var toggle = document.querySelector("[data-nav-toggle]");
    var drawer = document.querySelector("[data-mobile-nav]");
    var scrim = document.querySelector("[data-nav-scrim]");
    var closeBtn = document.querySelector("[data-nav-close]");
    function setNav(open){
      if(drawer) drawer.classList.toggle("open", open);
      if(scrim) scrim.classList.toggle("show", open);
      if(toggle) toggle.setAttribute("aria-expanded", open ? "true" : "false");
      document.body.style.overflow = open ? "hidden" : "";
    }
    if(toggle) toggle.addEventListener("click", function(){ setNav(!drawer.classList.contains("open")); });
    if(closeBtn) closeBtn.addEventListener("click", function(){ setNav(false); });
    if(scrim) scrim.addEventListener("click", function(){ setNav(false); });
    document.querySelectorAll(".mobile-nav a").forEach(function(a){ a.addEventListener("click", function(){ setNav(false); }); });

    /* Reveal on scroll */
    var reveals = document.querySelectorAll("[data-reveal]");
    if("IntersectionObserver" in window && reveals.length){
      var io = new IntersectionObserver(function(entries){
        entries.forEach(function(e){
          if(e.isIntersecting){ e.target.classList.add("in"); io.unobserve(e.target); }
        });
      }, { threshold:.1, rootMargin:"0px 0px -6% 0px" });
      reveals.forEach(function(el){ io.observe(el); });
    } else {
      reveals.forEach(function(el){ el.classList.add("in"); });
    }

    /* WhatsApp enquiry form -> opens WhatsApp with the message */
    document.querySelectorAll("form[data-wa-form]").forEach(function(f){
      f.addEventListener("submit", function(e){
        e.preventDefault();
        var name = (f.querySelector('[name="name"]') || {}).value || "";
        var msg = (f.querySelector('[name="message"]') || {}).value || "";
        var text = "Hello Healing Harmony Dental Clinic, my name is " + name + ". " + msg;
        var url = "https://wa.me/919811000000?text=" + encodeURIComponent(text.trim());
        window.open(url, "_blank", "noopener");
        var note = f.querySelector(".form__msg");
        if(note){ note.classList.add("ok"); note.textContent = "Opening WhatsApp so you can send this straight to our team."; }
      });
    });

  });
})();
