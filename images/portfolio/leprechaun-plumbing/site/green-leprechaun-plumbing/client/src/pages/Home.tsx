import { useEffect, useRef, useState } from "react";
import "@/styles/green-leprechaun.css";

/* ─── SVG ICONS ──────────────────────────────────────────── */
const PhoneIcon = () => (
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
  </svg>
);
const LocationIcon = () => (
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
  </svg>
);
const InfoIcon = () => (
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M12 2a10 10 0 1 0 0 20A10 10 0 0 0 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
  </svg>
);
const ClockIcon = () => (
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/>
  </svg>
);
const StarIcon = () => (
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
  </svg>
);
const ShieldIcon = () => (
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
  </svg>
);
const CheckIcon = () => (
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
  </svg>
);
const SendIcon = () => (
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
  </svg>
);
const PersonIcon = () => (
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/>
  </svg>
);
const PrevIcon = () => (
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
  </svg>
);
const NextIcon = () => (
  <svg viewBox="0 0 24 24" fill="currentColor">
    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
  </svg>
);

/* ─── LOGO SVG ───────────────────────────────────────────── */
const LogoSVG = () => (
  <svg viewBox="0 0 60 60" className="logo-svg">
    <circle cx="30" cy="22" r="10" fill="#c9a227" opacity="0.15"/>
    <circle cx="20" cy="32" r="10" fill="#c9a227" opacity="0.15"/>
    <circle cx="40" cy="32" r="10" fill="#c9a227" opacity="0.15"/>
    <circle cx="30" cy="22" r="8" fill="none" stroke="#c9a227" strokeWidth="1.5"/>
    <circle cx="20" cy="32" r="8" fill="none" stroke="#c9a227" strokeWidth="1.5"/>
    <circle cx="40" cy="32" r="8" fill="none" stroke="#c9a227" strokeWidth="1.5"/>
    <rect x="28" y="36" width="4" height="14" rx="2" fill="#c9a227"/>
    <path d="M26 20 Q30 16 34 20" fill="none" stroke="#1a4a2e" strokeWidth="2" strokeLinecap="round"/>
  </svg>
);

/* ─── TESTIMONIALS DATA ──────────────────────────────────── */
const testimonials = [
  {
    initials: "MR",
    name: "Michael R.",
    location: "La Jolla, CA",
    text: "Green Leprechaun came out within 45 minutes on a Sunday night when our main line backed up. The plumber was professional, explained everything clearly, and had us fixed in under two hours. Absolutely outstanding service.",
  },
  {
    initials: "ST",
    name: "Sarah T.",
    location: "Point Loma, CA",
    text: "I've used three different plumbers in San Diego over the years and Green Leprechaun is on another level. They found a slab leak two other companies missed, gave me a fair price, and completed the repair with zero damage to my floors. I won't call anyone else.",
  },
  {
    initials: "DK",
    name: "David K.",
    location: "North Park, CA",
    text: "Had them repipe my entire 1960s home. The crew was meticulous — they patched every wall they opened, cleaned up completely, and the water pressure is incredible now. Worth every penny and the price was very competitive.",
  },
  {
    initials: "JM",
    name: "Jennifer M.",
    location: "Chula Vista, CA",
    text: "The tankless water heater installation was flawless. They walked me through every step, handled the permits, and the unit has been perfect for 8 months. Their technician even noticed a small gas line issue and fixed it at no extra charge.",
  },
];

/* ─── STAR RATING ────────────────────────────────────────── */
const Stars = () => (
  <div className="tc-stars">
    {[1,2,3,4,5].map(i => (
      <svg key={i} viewBox="0 0 20 20" className="star">
        <path d="M10 1l2.39 4.84 5.34.78-3.87 3.77.91 5.32L10 13.27l-4.77 2.44.91-5.32L2.27 6.62l5.34-.78z" fill="#c9a227"/>
      </svg>
    ))}
  </div>
);

/* ─── COUNTER HOOK ───────────────────────────────────────── */
function useCounter(target: number, duration = 2200) {
  const [count, setCount] = useState(0);
  const [started, setStarted] = useState(false);
  const ref = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const el = ref.current;
    if (!el) return;
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting && !started) {
          setStarted(true);
          observer.disconnect();
        }
      },
      { threshold: 0.5 }
    );
    observer.observe(el);
    return () => observer.disconnect();
  }, [started]);

  useEffect(() => {
    if (!started) return;
    const start = performance.now();
    const easeOutQuart = (t: number) => 1 - Math.pow(1 - t, 4);
    const update = (now: number) => {
      const progress = Math.min((now - start) / duration, 1);
      setCount(Math.round(target * easeOutQuart(progress)));
      if (progress < 1) requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
  }, [started, target, duration]);

  return { count, ref };
}

/* ─── STAT ITEM ──────────────────────────────────────────── */
function StatItem({ target, suffix, label }: { target: number; suffix: string; label: string }) {
  const { count, ref } = useCounter(target);
  return (
    <div className="stat-item" ref={ref}>
      <div>
        <span className="stat-number">{count.toLocaleString()}</span>
        <span className="stat-plus">{suffix}</span>
      </div>
      <div className="stat-label">{label}</div>
    </div>
  );
}

/* ─── REVEAL HOOK ────────────────────────────────────────── */
function useReveal() {
  const ref = useRef<HTMLDivElement>(null);
  const [visible, setVisible] = useState(false);

  useEffect(() => {
    const el = ref.current;
    if (!el) return;
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setVisible(true);
          observer.disconnect();
        }
      },
      { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
    );
    observer.observe(el);
    return () => observer.disconnect();
  }, []);

  return { ref, visible };
}

/* ─── REVEAL WRAPPER ─────────────────────────────────────── */
function Reveal({ children, delay = 0, className = "" }: { children: React.ReactNode; delay?: number; className?: string }) {
  const { ref, visible } = useReveal();
  return (
    <div
      ref={ref}
      className={`reveal ${visible ? "visible" : ""} ${className}`}
      style={{ transitionDelay: `${delay}s` }}
    >
      {children}
    </div>
  );
}

/* ─── MAIN COMPONENT ─────────────────────────────────────── */
export default function Home() {
  const [mobileOpen, setMobileOpen] = useState(false);
  const [scrolled, setScrolled] = useState(false);
  const [floatingVisible, setFloatingVisible] = useState(false);
  const [testimonialIndex, setTestimonialIndex] = useState(0);
  const [formSubmitted, setFormSubmitted] = useState(false);
  const autoplayRef = useRef<ReturnType<typeof setInterval> | null>(null);

  const cardsPerView = () => (typeof window !== "undefined" && window.innerWidth <= 768 ? 1 : 2);
  const totalSlides = () => Math.ceil(testimonials.length / cardsPerView());

  // Scroll effects
  useEffect(() => {
    const onScroll = () => {
      setScrolled(window.scrollY > 80);
      setFloatingVisible(window.scrollY > 600);
    };
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  // Testimonial autoplay
  useEffect(() => {
    autoplayRef.current = setInterval(() => {
      setTestimonialIndex(i => (i + 1) % totalSlides());
    }, 5000);
    return () => { if (autoplayRef.current) clearInterval(autoplayRef.current); };
  }, []);

  const goToSlide = (idx: number) => {
    setTestimonialIndex(Math.max(0, Math.min(idx, totalSlides() - 1)));
    if (autoplayRef.current) clearInterval(autoplayRef.current);
    autoplayRef.current = setInterval(() => {
      setTestimonialIndex(i => (i + 1) % totalSlides());
    }, 5000);
  };

  const prevSlide = () => goToSlide(testimonialIndex <= 0 ? totalSlides() - 1 : testimonialIndex - 1);
  const nextSlide = () => goToSlide(testimonialIndex >= totalSlides() - 1 ? 0 : testimonialIndex + 1);

  const scrollTo = (id: string) => {
    const el = document.getElementById(id);
    if (!el) return;
    const top = el.getBoundingClientRect().top + window.scrollY - 72;
    window.scrollTo({ top, behavior: "smooth" });
    setMobileOpen(false);
  };

  const handleFormSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setFormSubmitted(true);
  };

  const slideOffset = testimonialIndex * (100 / cardsPerView());

  return (
    <>
      {/* ── TOP BAR ── */}
      <div className="top-bar">
        <div className="top-bar-inner">
          <span className="top-bar-item">
            <span className="tb-icon"><LocationIcon /></span>
            Serving All of San Diego County
          </span>
          <span className="top-bar-divider">|</span>
          <span className="top-bar-item">
            <span className="tb-icon"><InfoIcon /></span>
            Licensed &amp; Insured
          </span>
          <span className="top-bar-divider">|</span>
          <span className="top-bar-item gold">
            <span className="tb-icon"><ClockIcon /></span>
            24/7 Emergency Service
          </span>
          <span className="top-bar-divider">|</span>
          <a href="tel:+16195550192" className="top-bar-phone">
            <span className="tb-icon"><PhoneIcon /></span>
            (619) 555-0192
          </a>
        </div>
      </div>

      {/* ── NAVIGATION ── */}
      <header className={`site-header${scrolled ? " scrolled" : ""}`} id="site-header">
        <nav className="nav-container">
          <a href="#" className="nav-logo" onClick={e => { e.preventDefault(); window.scrollTo({ top: 0, behavior: "smooth" }); }}>
            <div className="logo-mark"><LogoSVG /></div>
            <div className="logo-text">
              <span className="logo-name">Green Leprechaun</span>
              <span className="logo-sub">Plumbing &amp; Drain</span>
            </div>
          </a>

          <button
            className={`nav-toggle${mobileOpen ? " open" : ""}`}
            onClick={() => setMobileOpen(v => !v)}
            aria-label="Toggle navigation"
            aria-expanded={mobileOpen}
          >
            <span style={mobileOpen ? { transform: "rotate(45deg) translate(5px, 5px)" } : {}} />
            <span style={mobileOpen ? { opacity: 0 } : {}} />
            <span style={mobileOpen ? { transform: "rotate(-45deg) translate(5px, -5px)" } : {}} />
          </button>

          <ul className={`nav-links${mobileOpen ? " open" : ""}`}>
            {[["services","Services"],["about","About"],["why-us","Why Us"],["testimonials","Reviews"],["service-areas","Service Areas"],["contact","Contact"]].map(([id, label]) => (
              <li key={id}><button className="nav-link" onClick={() => scrollTo(id)}>{label}</button></li>
            ))}
          </ul>

          <a href="tel:+16195550192" className="nav-cta">
            <span className="cta-phone-icon"><PhoneIcon /></span>
            Schedule Service
          </a>
        </nav>
      </header>

      {/* ── HERO ── */}
      <section className="hero" id="hero">
        <div className="hero-bg">
          <div className="hero-overlay" />
          <div className="hero-pattern" />
          <img
            src="https://d2xsxph8kpxj0f.cloudfront.net/310519663246177651/8ZE65LAt5Kuye4JYoGBsXU/hero-plumbing-manifold_a93c8c96.jpeg"
            alt="Professional plumbing manifold installation"
            className="hero-img"
            loading="eager"
          />
        </div>
        <div className="hero-content">
          <div className="hero-text-col">
            <h1 className="hero-headline animate-in" style={{ animationDelay: "0.2s" }}>
              <span className="headline-line">Expert Plumbing.</span>
              <span className="headline-line gold-text">Done Right.</span>
              <span className="headline-line">Every Time.</span>
            </h1>
            <div className="hero-actions animate-in" style={{ animationDelay: "0.65s" }}>
              <button className="btn btn-hero-primary" onClick={() => scrollTo("contact")}>
                Schedule Service
              </button>
              <a href="tel:+16195550192" className="btn btn-hero-secondary">
                (619) 555-0192
              </a>
            </div>
          </div>
          <div className="hero-van-col animate-in" style={{ animationDelay: "0.4s" }}>
            <img
              src="https://d2xsxph8kpxj0f.cloudfront.net/310519663246177651/8ZE65LAt5Kuye4JYoGBsXU/van-image-2-full-size_81843c69.png"
              alt="Green Leprechaun Plumbing service van"
              className="hero-van-img"
              loading="eager"
            />
          </div>
        </div>

      </section>

      {/* ── FEATURE CARDS ── */}
      <section className="feature-cards">
        <Reveal className="feature-card">
          <img src="https://d2xsxph8kpxj0f.cloudfront.net/310519663246177651/8ZE65LAt5Kuye4JYoGBsXU/card-pipes_92011004.jpeg" alt="Upfront Pricing" className="fc-bg-img" />
          <div className="fc-overlay" />
          <div className="fc-content">
            <h3>Upfront Pricing</h3>
            <p>No hidden fees, no surprises. We quote before we start — always.</p>
          </div>
        </Reveal>
        <Reveal className="feature-card" delay={0.15}>
          <img src="https://d2xsxph8kpxj0f.cloudfront.net/310519663246177651/8ZE65LAt5Kuye4JYoGBsXU/card-plumber-hands_32b8b14f.jpeg" alt="Master Plumbers" className="fc-bg-img" />
          <div className="fc-overlay" />
          <div className="fc-content">
            <h3>Master Plumbers</h3>
            <p>Every technician is a licensed master plumber with 10+ years experience.</p>
          </div>
        </Reveal>
        <Reveal className="feature-card" delay={0.3}>
          <img src="https://d2xsxph8kpxj0f.cloudfront.net/310519663246177651/8ZE65LAt5Kuye4JYoGBsXU/card-copper-pipes_a7efb016.jpeg" alt="Award-Winning Service" className="fc-bg-img" />
          <div className="fc-overlay" />
          <div className="fc-content">
            <h3>Award-Winning Service</h3>
            <p>Recognized as San Diego's top plumbing company three years running.</p>
          </div>
        </Reveal>
      </section>

      {/* ── SERVICES ── */}
      <section className="services-section" id="services">
        {/* Parallax pipe-grid SVG background */}
        <div className="services-parallax-bg" aria-hidden="true">
          <svg className="services-bg-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="xMidYMid slice">
            <defs>
              <pattern id="pipeGrid" x="0" y="0" width="120" height="120" patternUnits="userSpaceOnUse">
                {/* Horizontal pipe */}
                <line x1="0" y1="60" x2="120" y2="60" stroke="rgba(13,51,32,0.07)" strokeWidth="4"/>
                {/* Vertical pipe */}
                <line x1="60" y1="0" x2="60" y2="120" stroke="rgba(13,51,32,0.07)" strokeWidth="4"/>
                {/* Elbow joints */}
                <circle cx="60" cy="60" r="7" fill="none" stroke="rgba(13,51,32,0.1)" strokeWidth="2"/>
                <circle cx="60" cy="60" r="3" fill="rgba(13,51,32,0.08)"/>
                {/* Corner dots */}
                <circle cx="0" cy="0" r="3" fill="rgba(13,51,32,0.05)"/>
                <circle cx="120" cy="0" r="3" fill="rgba(13,51,32,0.05)"/>
                <circle cx="0" cy="120" r="3" fill="rgba(13,51,32,0.05)"/>
                <circle cx="120" cy="120" r="3" fill="rgba(13,51,32,0.05)"/>
              </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#pipeGrid)"/>
          </svg>
        </div>
        <div className="section-container">
          <Reveal>
            <div className="section-header services-header">
              <span className="section-label">What We Do</span>
              <h2 className="section-title">Complete Plumbing Solutions<br/><span className="gold-text">For Every Situation</span></h2>

            </div>
          </Reveal>
          <div className="services-grid">
            {[
              { delay: 0,   title: "Emergency Plumbing",         desc: "Burst pipes, major leaks, sewage backups — we respond within 60 minutes, 24 hours a day, 7 days a week.",                                                          link: "Get Emergency Help" },
              { delay: 0.1, title: "Drain Cleaning & Hydrojetting", desc: "Professional hydrojetting and snaking to clear even the most stubborn blockages — kitchen, bath, and main sewer lines.",                                        link: "Learn More" },
              { delay: 0.2, title: "Water Heater Services",       desc: "Repair, replacement, and installation of traditional tank and tankless water heaters. Same-day service available.",                                               link: "Get a Quote" },
              { delay: 0.3, title: "Leak Detection & Repair",     desc: "Advanced electronic leak detection technology finds hidden leaks behind walls and under slabs without destructive digging.",                                    link: "Find My Leak" },
              { delay: 0.4, title: "Sewer Line Services",         desc: "Camera inspections, trenchless sewer repair, and full replacements. We diagnose before we dig.",                                                               link: "Inspect My Sewer" },
              { delay: 0.5, title: "Repiping & Pipe Repair",      desc: "Full home repiping with copper or PEX, plus targeted repairs for corroded, leaking, or damaged pipes.",                                                         link: "Get Repiping Quote" },
            ].map(({ delay, title, desc, link }) => (
              <Reveal key={title} delay={delay} className="service-card-wrapper">
                <div className="service-card glass-card">
                  <div className="glass-card-top-bar" />
                  <div className="sc-content">
                    <h3>{title}</h3>
                    <p>{desc}</p>
                    <button className="sc-link" onClick={() => scrollTo("contact")}>{link}</button>
                  </div>
                </div>
              </Reveal>
            ))}
          </div>
        </div>
      </section>

      {/* ── ABOUT ── */}
      <section className="about-section" id="about">
        <div className="about-bg-pattern" />
        <div className="section-container about-grid">
          <Reveal className="about-image-wrap">
            <div className="about-img-frame">
              <img
                src="https://d2xsxph8kpxj0f.cloudfront.net/310519663246177651/8ZE65LAt5Kuye4JYoGBsXU/pex-6419128_1d48840f.jpg"
                alt="Master plumber tightening pipe fittings"
                className="about-img"
                loading="lazy"
              />
            </div>
          </Reveal>

          <Reveal delay={0.2} className="about-content">
            <span className="section-label">Our Story</span>
            <h2 className="section-title">San Diego's Most Trusted<br/><span className="gold-text">Plumbing Specialists</span></h2>
            <p className="about-lead">Green Leprechaun Plumbing was founded on a simple belief: homeowners deserve honest, expert plumbing service without the runaround.</p>
            <p className="about-body">For over two decades, we've served San Diego families and businesses with the same commitment to quality that built our reputation. Every technician on our team is a licensed master plumber — not an apprentice, not a trainee. When we show up at your door, you're getting the best.</p>
            <p className="about-body">We believe in upfront pricing, clean workmanship, and standing behind every job we do. That's not a marketing line — it's how we've earned thousands of five-star reviews across San Diego County.</p>
            <div className="about-values">
              {[
                { label: "Licensed & Insured", sub: "C-36 Plumbing Contractor License" },
                { label: "San Diego Based", sub: "Locally owned & operated" },
                { label: "5-Star Rated", sub: "1,200+ verified Google reviews" },
              ].map(({ label, sub }) => (
                <div className="value-item" key={label}>
                  <div className="value-icon">
                    <svg viewBox="0 0 32 32"><path d="M16 2L4 8v8c0 7.73 5.14 14.96 12 16.93C22.86 30.96 28 23.73 28 16V8L16 2z" fill="none" stroke="#c9a227" strokeWidth="2"/><path d="M11 16l3 3 7-7" stroke="#c9a227" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/></svg>
                  </div>
                  <div><strong>{label}</strong><span>{sub}</span></div>
                </div>
              ))}
            </div>

          </Reveal>
        </div>
      </section>

      {/* ── STATS ── */}
      <section className="stats-section" id="why-us">
        <div className="section-container">
          <Reveal>
            <div className="stats-header">
              <span className="section-label light">By The Numbers</span>
              <h2 className="section-title light">Why San Diego Chooses<br/><span className="gold-text">Green Leprechaun</span></h2>
            </div>
          </Reveal>
          <div className="stats-grid">
            <StatItem target={20} suffix="+" label="Years in Business" />
            <StatItem target={8602} suffix="+" label="Jobs Completed" />
            <StatItem target={1200} suffix="+" label="5-Star Reviews" />
            <StatItem target={43} suffix=" min" label="Emergency Response" />
          </div>
          <div className="why-grid">
            {[
              { title: "Guaranteed Work", desc: "Every repair is backed by our 2-year labor guarantee. If it fails, we fix it free.", icon: <svg viewBox="0 0 48 48"><path d="M24 6c-9.94 0-18 8.06-18 18s8.06 18 18 18 18-8.06 18-18S33.94 6 24 6z" fill="none" stroke="#c9a227" strokeWidth="2.5"/><path d="M16 24l5 5 11-11" stroke="#c9a227" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"/></svg> },
              { title: "Transparent Quotes", desc: "Written estimates before any work begins. The price we quote is the price you pay.", icon: <svg viewBox="0 0 48 48"><rect x="10" y="8" width="28" height="32" rx="3" fill="none" stroke="#c9a227" strokeWidth="2.5"/><path d="M16 18h16M16 24h16M16 30h10" stroke="#c9a227" strokeWidth="2" strokeLinecap="round"/></svg> },
              { title: "On-Time Arrival", desc: "We respect your time. Our plumbers arrive in the promised window — every time.", icon: <svg viewBox="0 0 48 48"><circle cx="24" cy="24" r="18" fill="none" stroke="#c9a227" strokeWidth="2.5"/><path d="M24 14v10l6 6" stroke="#c9a227" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"/></svg> },
              { title: "Clean Job Sites", desc: "We treat your home with respect — shoe covers, drop cloths, and full cleanup every visit.", icon: <svg viewBox="0 0 48 48"><path d="M24 6c-9.94 0-18 8.06-18 18s8.06 18 18 18 18-8.06 18-18S33.94 6 24 6z" fill="none" stroke="#c9a227" strokeWidth="2.5"/><path d="M16 24c0-4.42 3.58-8 8-8 2.21 0 4.21.9 5.66 2.34" stroke="#c9a227" strokeWidth="2.5" strokeLinecap="round"/><path d="M32 24c0 4.42-3.58 8-8 8-2.21 0-4.21-.9-5.66-2.34" stroke="#c9a227" strokeWidth="2.5" strokeLinecap="round"/><path d="M30 20l4-4M18 28l-4 4" stroke="#c9a227" strokeWidth="2" strokeLinecap="round"/></svg> },
            ].map(({ title, desc, icon }, i) => (
              <Reveal key={title} delay={i * 0.1} className="why-item">
                <div className="why-icon">{icon}</div>
                <h4>{title}</h4>
                <p>{desc}</p>
              </Reveal>
            ))}
          </div>
        </div>
      </section>

      {/* ── TESTIMONIALS ── */}
      <section className="testimonials-section" id="testimonials">
        <div className="section-container">
          <Reveal>
            <div className="section-header">
              <span className="section-label">What Clients Say</span>
              <h2 className="section-title">Real Reviews From<br/><span className="gold-text">Real San Diegans</span></h2>
            </div>
          </Reveal>
          <div className="testimonials-track-wrap">
            <div
              className="testimonials-track"
              style={{ transform: `translateX(-${slideOffset}%)` }}
            >
              {testimonials.map(({ initials, name, location, text }) => (
                <div className="testimonial-card" key={name}>
                  <Stars />
                  <blockquote>"{text}"</blockquote>
                  <div className="tc-author">
                    <div className="tc-avatar">{initials}</div>
                    <div><strong>{name}</strong><span>{location}</span></div>
                  </div>
                </div>
              ))}
            </div>
            <div className="testimonials-nav">
              <button className="tn-btn" onClick={prevSlide} aria-label="Previous review"><PrevIcon /></button>
              <div className="tn-dots">
                {Array.from({ length: totalSlides() }).map((_, i) => (
                  <button
                    key={i}
                    className={`tn-dot${i === testimonialIndex ? " active" : ""}`}
                    onClick={() => goToSlide(i)}
                    aria-label={`Go to slide ${i + 1}`}
                  />
                ))}
              </div>
              <button className="tn-btn" onClick={nextSlide} aria-label="Next review"><NextIcon /></button>
            </div>
          </div>
        </div>
      </section>

      {/* ── SERVICE AREAS ── */}
      <section className="areas-section" id="service-areas">
        <div className="areas-bg-pattern" />
        <div className="section-container">
          <Reveal>
            <div className="section-header">
              <span className="section-label">Where We Work</span>
              <h2 className="section-title" style={{ color: "white" }}>Proudly Serving<br/><span className="gold-text">All of San Diego County</span></h2>
              <p className="section-desc" style={{ color: "rgba(255,255,255,0.6)", margin: "0 auto" }}>From the coast to the inland valleys, our master plumbers are ready to serve your neighborhood.</p>
            </div>
          </Reveal>
          <div className="areas-grid">
            {["San Diego (Downtown)","La Jolla","Chula Vista","El Cajon","Santee","Lakeside","Spring Valley","National City","Coronado","Point Loma","Ocean Beach","Pacific Beach","Mission Hills","North Park","Hillcrest","Mission Valley","Kearny Mesa","Clairemont","Mira Mesa","Poway"].map((area, i) => (
              <Reveal key={area} delay={i * 0.05} className="area-item">
                <span className="area-dot" />{area}
              </Reveal>
            ))}
          </div>
          <Reveal>
            <div className="areas-cta">
              <p>Don't see your area? <strong>Call us</strong> — we likely serve you too.</p>
              <a href="tel:+16195550192" className="btn btn-gold">Call (619) 555-0192</a>
            </div>
          </Reveal>
        </div>
      </section>

      {/* ── CONTACT ── */}
      <section className="contact-section" id="contact">
        <div className="contact-bg">
          <div className="contact-overlay" />
          <div className="contact-pattern" />
        </div>
        <div className="section-container contact-grid">
          <Reveal className="contact-info">
            <span className="section-label light">Get In Touch</span>
            <h2 className="section-title light">Ready to Solve Your<br/><span className="gold-text">Plumbing Problem?</span></h2>
            <p className="contact-desc">Whether it's an emergency or a planned project, our team is ready to help. Call us now or fill out the form for a free estimate.</p>
            <div className="contact-details">
              <a href="tel:+16195550192" className="contact-detail-item">
                <div className="cd-icon"><PhoneIcon /></div>
                <div><span className="cd-label">Call or Text</span><strong>(619) 555-0192</strong></div>
              </a>
              <div className="contact-detail-item">
                <div className="cd-icon"><ClockIcon /></div>
                <div><span className="cd-label">Hours</span><strong>24/7 Emergency Service</strong></div>
              </div>
              <div className="contact-detail-item">
                <div className="cd-icon"><LocationIcon /></div>
                <div><span className="cd-label">Service Area</span><strong>All of San Diego County</strong></div>
              </div>
            </div>
          </Reveal>

          <Reveal delay={0.2} className="contact-form-wrap">
            {formSubmitted ? (
              <div className="form-success">
                <div className="form-success-icon">
                  <svg viewBox="0 0 24 24" fill="white"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                </div>
                <h3>Request Received!</h3>
                <p>Thank you! We'll contact you within 30 minutes during business hours. For emergencies, please call <strong>(619) 555-0192</strong> directly.</p>
              </div>
            ) : (
              <form className="contact-form" onSubmit={handleFormSubmit}>
                <h3>Get a Free Estimate</h3>
                <div className="form-row">
                  <div className="form-group">
                    <label htmlFor="fname">First Name</label>
                    <input type="text" id="fname" name="fname" placeholder="John" required />
                  </div>
                  <div className="form-group">
                    <label htmlFor="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" placeholder="Smith" required />
                  </div>
                </div>
                <div className="form-group">
                  <label htmlFor="phone">Phone Number</label>
                  <input type="tel" id="phone" name="phone" placeholder="(619) 555-0000" required />
                </div>
                <div className="form-group">
                  <label htmlFor="email">Email Address</label>
                  <input type="email" id="email" name="email" placeholder="john@example.com" />
                </div>
                <div className="form-group">
                  <label htmlFor="service">Service Needed</label>
                  <select id="service" name="service">
                    <option value="">Select a service...</option>
                    <option>Emergency Plumbing</option>
                    <option>Drain Cleaning / Hydrojetting</option>
                    <option>Water Heater Repair / Installation</option>
                    <option>Leak Detection &amp; Repair</option>
                    <option>Sewer Line Services</option>
                    <option>Repiping &amp; Pipe Repair</option>
                    <option>Other</option>
                  </select>
                </div>
                <div className="form-group">
                  <label htmlFor="message">Describe the Issue</label>
                  <textarea id="message" name="message" rows={4} placeholder="Tell us what's going on..." />
                </div>
                <button type="submit" className="btn btn-gold btn-full">
                  Send My Request
                  <span className="btn-icon"><SendIcon /></span>
                </button>
                <p className="form-disclaimer">We'll respond within 30 minutes during business hours. For emergencies, please call directly.</p>
              </form>
            )}
          </Reveal>
        </div>
      </section>

      {/* ── FOOTER ── */}
      <footer className="site-footer">
        <div className="footer-top">
          <div className="footer-container">
            <div className="footer-brand">
              <a href="#" className="nav-logo footer-logo" onClick={e => { e.preventDefault(); window.scrollTo({ top: 0, behavior: "smooth" }); }}>
                <div className="logo-mark"><LogoSVG /></div>
                <div className="logo-text">
                  <span className="logo-name">Green Leprechaun</span>
                  <span className="logo-sub">Plumbing &amp; Drain</span>
                </div>
              </a>
              <p className="footer-tagline">San Diego's most trusted plumbing specialists. Licensed, insured, and dedicated to excellence since 2004.</p>
              <div className="footer-contact-quick">
                <a href="tel:+16195550192" className="footer-phone">(619) 555-0192</a>
                <span className="footer-hours">Available 24/7 for Emergencies</span>
              </div>
            </div>
            <div className="footer-nav-group">
              <h4>Services</h4>
              <ul>
                {["Emergency Plumbing","Drain Cleaning","Water Heater Services","Leak Detection","Sewer Line Services","Repiping"].map(s => (
                  <li key={s}><button onClick={() => scrollTo("services")}>{s}</button></li>
                ))}
              </ul>
            </div>
            <div className="footer-nav-group">
              <h4>Company</h4>
              <ul>
                {[["about","About Us"],["testimonials","Reviews"],["service-areas","Service Areas"],["contact","Contact"]].map(([id, label]) => (
                  <li key={id}><button onClick={() => scrollTo(id)}>{label}</button></li>
                ))}
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
            <div className="footer-nav-group">
              <h4>Service Areas</h4>
              <ul>
                {["San Diego","La Jolla","Chula Vista","El Cajon","Point Loma","Pacific Beach"].map(a => (
                  <li key={a}><button onClick={() => scrollTo("service-areas")}>{a}</button></li>
                ))}
              </ul>
            </div>
          </div>
        </div>
        <div className="footer-bottom">
          <div className="footer-container footer-bottom-inner">
            <p>&copy; 2024 Green Leprechaun Plumbing &amp; Drain. All rights reserved. | C-36 License #123456</p>
            <div className="footer-badges">
              <span className="footer-badge">Licensed</span>
              <span className="footer-badge">Bonded</span>
              <span className="footer-badge">Insured</span>
            </div>
          </div>
        </div>
      </footer>

      {/* ── FLOATING CTA ── */}
      <div className={`floating-cta${floatingVisible ? " visible" : ""}`}>
        <a href="tel:+16195550192" className="floating-btn">
          <span style={{ width: 18, height: 18, display: "flex" }}><PhoneIcon /></span>
          <span>Emergency? Call Now</span>
        </a>
      </div>
    </>
  );
}
