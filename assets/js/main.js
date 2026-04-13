/**
 * Dallas Web Pro — main.js
 * Scroll reveal, nav scroll state, hero staggered entrance.
 */

( function () {
	'use strict';

	/* ─── Scroll Reveal ──────────────────────── */
	const revealEls = document.querySelectorAll( '.reveal' );

	if ( revealEls.length && 'IntersectionObserver' in window ) {
		const revealObserver = new IntersectionObserver(
			( entries ) => {
				entries.forEach( ( entry ) => {
					if ( entry.isIntersecting ) {
						entry.target.classList.add( 'is-visible' );
						revealObserver.unobserve( entry.target );
					}
				} );
			},
			{ threshold: 0.09 }
		);

		revealEls.forEach( ( el ) => revealObserver.observe( el ) );
	} else {
		// Fallback — no IntersectionObserver support
		revealEls.forEach( ( el ) => el.classList.add( 'is-visible' ) );
	}

	/* ─── Nav Scroll State ───────────────────── */
	const header = document.getElementById( 'site-header' );

	if ( header ) {
		const onScroll = () => {
			header.classList.toggle( 'scrolled', window.scrollY > 30 );
		};

		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll(); // Run on load in case page is already scrolled
	}

	/* ─── Hero Staggered Entrance ────────────── */
	const heroContent = document.querySelector( '.hero-content' );

	if ( heroContent ) {
		const children = Array.from( heroContent.children );
		const ease     = 'cubic-bezier(0.16, 1, 0.3, 1)';

		// Set initial hidden state
		children.forEach( ( el ) => {
			el.style.opacity   = '0';
			el.style.transform = 'translateY(22px)';
			el.style.transition = `opacity 0.9s ${ ease }, transform 0.9s ${ ease }`;
		} );

		// Stagger reveal after paint
		requestAnimationFrame( () => {
			setTimeout( () => {
				children.forEach( ( el, i ) => {
					const delay = 0.18 + i * 0.11;
					el.style.transitionDelay = `${ delay }s`;
					el.style.opacity         = '1';
					el.style.transform       = 'none';
				} );
			}, 60 );
		} );
	}

	/* ─── Mobile Nav Toggle ──────────────────── */
	const navToggle = document.getElementById( 'nav-toggle' );
	const navMenu   = document.getElementById( 'primary-nav' );

	if ( navToggle && navMenu ) {
		navToggle.addEventListener( 'click', () => {
			const isOpen = navMenu.classList.toggle( 'is-open' );
			navToggle.setAttribute( 'aria-expanded', isOpen );
		} );

		/* Mobile submenu accordion */
		navMenu.querySelectorAll( '.menu-item-has-children > a' ).forEach( ( link ) => {
			link.addEventListener( 'click', ( e ) => {
				/* Only intercept on mobile (nav toggle visible) */
				if ( window.getComputedStyle( navToggle ).display === 'none' ) return;
				e.preventDefault();
				link.parentElement.classList.toggle( 'is-open' );
			} );
		} );
	}

} )();

( function () {
	'use strict';

	/* ─── Reveal Left / Right ────────────────── */
	const dirEls = document.querySelectorAll( '.reveal-left, .reveal-right' );

	if ( dirEls.length && 'IntersectionObserver' in window ) {
		const dirObserver = new IntersectionObserver(
			( entries ) => {
				entries.forEach( ( entry ) => {
					if ( entry.isIntersecting ) {
						entry.target.classList.add( 'is-visible' );
						dirObserver.unobserve( entry.target );
					}
				} );
			},
			{ threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
		);
		dirEls.forEach( ( el ) => dirObserver.observe( el ) );
	} else {
		dirEls.forEach( ( el ) => el.classList.add( 'is-visible' ) );
	}

	/* ─── Parallax ───────────────────────────── */
	const parallaxSec = document.querySelector( '.js-parallax' );
	const parallaxBg  = document.querySelector( '.js-parallax-bg' );

	if ( parallaxSec && parallaxBg ) {
		const onParallaxScroll = () => {
			const rect     = parallaxSec.getBoundingClientRect();
			const viewH    = window.innerHeight;
			const progress = ( viewH - rect.top ) / ( viewH + rect.height );
			const offset   = ( progress - 0.5 ) * 200; // 200px max shift — visible parallax
			parallaxBg.style.transform = `translateY(${ offset.toFixed( 2 ) }px)`;
		};

		window.addEventListener( 'scroll', onParallaxScroll, { passive: true } );
		onParallaxScroll();
	}

	/* ─── Stat Counter ───────────────────────── */
	const statEls = document.querySelectorAll( '.sd-stat-num[data-target]' );

	if ( statEls.length && 'IntersectionObserver' in window ) {
		const statObserver = new IntersectionObserver(
			( entries ) => {
				entries.forEach( ( entry ) => {
					if ( ! entry.isIntersecting ) return;
					const el     = entry.target;
					const target = parseInt( el.dataset.target, 10 );
					const suffix = el.querySelector( 'span' )?.textContent || '';
					let start    = null;
					const dur    = 1400;

					const step = ( ts ) => {
						if ( ! start ) start = ts;
						const progress = Math.min( ( ts - start ) / dur, 1 );
						const eased    = 1 - Math.pow( 1 - progress, 3 );
						el.innerHTML   = Math.round( eased * target ) + `<span>${ suffix }</span>`;
						if ( progress < 1 ) requestAnimationFrame( step );
					};

					requestAnimationFrame( step );
					statObserver.unobserve( el );
				} );
			},
			{ threshold: 0.5 }
		);
		statEls.forEach( ( el ) => statObserver.observe( el ) );
	}

} )();

/* ════════════════════════════════════════════════
   HERO FLOATING CODE — typewriter engine
   Only runs on pages with the floating code widget
════════════════════════════════════════════════ */
( function () {
  'use strict';

  const out        = document.getElementById( 'code-output' );
  if ( ! out ) return;

  const nums       = document.getElementById( 'line-nums' );
  const filenameEl = document.getElementById( 'code-filename' );

  /* ── Snippets ── */
  const snippets = [
    {
      tab: 'index.html',
      lines: [
        [ {c:'t-cmt',t:'<!-- Hero Section -->'} ],
        [ {c:'t-punct',t:'<'},{c:'t-tag',t:'section'},{c:'t-plain',t:' '},{c:'t-attr',t:'class'},{c:'t-punct',t:'="'},{c:'t-val',t:'page-hero'},{c:'t-punct',t:'">'}],
        [ {c:'t-plain',t:'  '},{c:'t-punct',t:'<'},{c:'t-tag',t:'div'},{c:'t-plain',t:' '},{c:'t-attr',t:'class'},{c:'t-punct',t:'="'},{c:'t-val',t:'wrap'},{c:'t-punct',t:'">'}],
        [ {c:'t-plain',t:'    '},{c:'t-punct',t:'<'},{c:'t-tag',t:'span'},{c:'t-plain',t:' '},{c:'t-attr',t:'class'},{c:'t-punct',t:'="'},{c:'t-val',t:'eyebrow'},{c:'t-punct',t:'">'}],
        [ {c:'t-plain',t:'      Services'} ],
        [ {c:'t-plain',t:'    '},{c:'t-punct',t:'</'},{c:'t-tag',t:'span'},{c:'t-punct',t:'>'}],
        [ {c:'t-plain',t:'    '},{c:'t-punct',t:'<'},{c:'t-tag',t:'h1'},{c:'t-plain',t:' '},{c:'t-attr',t:'class'},{c:'t-punct',t:'="'},{c:'t-val',t:'hero-h1'},{c:'t-punct',t:'">'}],
        [ {c:'t-plain',t:'      Web Development'} ],
        [ {c:'t-plain',t:'    '},{c:'t-punct',t:'</'},{c:'t-tag',t:'h1'},{c:'t-punct',t:'>'}],
        [ {c:'t-plain',t:'    '},{c:'t-punct',t:'<'},{c:'t-tag',t:'a'},{c:'t-plain',t:' '},{c:'t-attr',t:'href'},{c:'t-punct',t:'="'},{c:'t-val',t:'#contact'},{c:'t-punct',t:'"'}],
        [ {c:'t-plain',t:'       '},{c:'t-attr',t:'class'},{c:'t-punct',t:'="'},{c:'t-val',t:'btn-primary'},{c:'t-punct',t:'">'}],
        [ {c:'t-plain',t:'      Start Your Project'} ],
        [ {c:'t-plain',t:'    '},{c:'t-punct',t:'</'},{c:'t-tag',t:'a'},{c:'t-punct',t:'>'}],
        [ {c:'t-plain',t:'  '},{c:'t-punct',t:'</'},{c:'t-tag',t:'div'},{c:'t-punct',t:'>'}],
        [ {c:'t-punct',t:'</'},{c:'t-tag',t:'section'},{c:'t-punct',t:'>'}],
      ]
    },
    {
      tab: 'style.css',
      lines: [
        [ {c:'t-cmt',t:'/* ── Brand Tokens ── */'} ],
        [ {c:'t-sel',t:':root'},{c:'t-plain',t:' {'}],
        [ {c:'t-plain',t:'  '},{c:'t-prop',t:'--navy'},{c:'t-punct',t:':'},{c:'t-plain',t:'     '},{c:'t-hex',t:'#0b1622'},{c:'t-punct',t:';'}],
        [ {c:'t-plain',t:'  '},{c:'t-prop',t:'--gold'},{c:'t-punct',t:':'},{c:'t-plain',t:'     '},{c:'t-hex',t:'#c9a84c'},{c:'t-punct',t:';'}],
        [ {c:'t-plain',t:'  '},{c:'t-prop',t:'--cream'},{c:'t-punct',t:':'},{c:'t-plain',t:'    '},{c:'t-hex',t:'#f5f0e8'},{c:'t-punct',t:';'}],
        [ {c:'t-plain',t:'}'}],
        [ {c:'t-plain',t:''}],
        [ {c:'t-cmt',t:'/* ── Hero ── */'}],
        [ {c:'t-sel',t:'.page-hero'},{c:'t-plain',t:' {'}],
        [ {c:'t-plain',t:'  '},{c:'t-prop',t:'background'},{c:'t-punct',t:':'},{c:'t-plain',t:'  '},{c:'t-unit',t:'var'},{c:'t-punct',t:'('},{c:'t-prop',t:'--navy'},{c:'t-punct',t:');'}],
        [ {c:'t-plain',t:'  '},{c:'t-prop',t:'min-height'},{c:'t-punct',t:':'},{c:'t-plain',t:'  '},{c:'t-unit',t:'100vh'},{c:'t-punct',t:';'}],
        [ {c:'t-plain',t:'  '},{c:'t-prop',t:'display'},{c:'t-punct',t:':'},{c:'t-plain',t:'     '},{c:'t-unit',t:'grid'},{c:'t-punct',t:';'}],
        [ {c:'t-plain',t:'  '},{c:'t-prop',t:'grid-template-columns'},{c:'t-punct',t:':'}],
        [ {c:'t-plain',t:'    '},{c:'t-unit',t:'1fr 1fr'},{c:'t-punct',t:';'}],
        [ {c:'t-plain',t:'}'}],
      ]
    },
    {
      tab: 'index.html',
      lines: [
        [ {c:'t-cmt',t:'<!-- Services Grid -->'}],
        [ {c:'t-punct',t:'<'},{c:'t-tag',t:'section'},{c:'t-plain',t:' '},{c:'t-attr',t:'class'},{c:'t-punct',t:'="'},{c:'t-val',t:'sd-services'},{c:'t-punct',t:'">'}],
        [ {c:'t-plain',t:'  '},{c:'t-punct',t:'<'},{c:'t-tag',t:'div'},{c:'t-plain',t:' '},{c:'t-attr',t:'class'},{c:'t-punct',t:'="'},{c:'t-val',t:'sd-cards-grid'},{c:'t-punct',t:'">'}],
        [ {c:'t-plain',t:'    '},{c:'t-cmt',t:'<!-- Card 01 -->'}],
        [ {c:'t-plain',t:'    '},{c:'t-punct',t:'<'},{c:'t-tag',t:'div'},{c:'t-plain',t:' '},{c:'t-attr',t:'class'},{c:'t-punct',t:'="'},{c:'t-val',t:'sd-card reveal'},{c:'t-punct',t:'">'}],
        [ {c:'t-plain',t:'      '},{c:'t-punct',t:'<'},{c:'t-tag',t:'span'},{c:'t-plain',t:' '},{c:'t-attr',t:'class'},{c:'t-punct',t:'="'},{c:'t-val',t:'sd-card-num'},{c:'t-punct',t:'">'},{c:'t-plain',t:'01'},{c:'t-punct',t:'</'},{c:'t-tag',t:'span'},{c:'t-punct',t:'>'}],
        [ {c:'t-plain',t:'      '},{c:'t-punct',t:'<'},{c:'t-tag',t:'h3'},{c:'t-punct',t:'>'},{c:'t-plain',t:'Custom Website Design'},{c:'t-punct',t:'</'},{c:'t-tag',t:'h3'},{c:'t-punct',t:'>'}],
        [ {c:'t-plain',t:'      '},{c:'t-punct',t:'<'},{c:'t-tag',t:'p'},{c:'t-punct',t:'>'}],
        [ {c:'t-plain',t:'        Bespoke websites crafted'}],
        [ {c:'t-plain',t:'        around your brand identity.'}],
        [ {c:'t-plain',t:'      '},{c:'t-punct',t:'</'},{c:'t-tag',t:'p'},{c:'t-punct',t:'>'}],
        [ {c:'t-plain',t:'    '},{c:'t-punct',t:'</'},{c:'t-tag',t:'div'},{c:'t-punct',t:'>'}],
        [ {c:'t-plain',t:'  '},{c:'t-punct',t:'</'},{c:'t-tag',t:'div'},{c:'t-punct',t:'>'}],
        [ {c:'t-punct',t:'</'},{c:'t-tag',t:'section'},{c:'t-punct',t:'>'}],
      ]
    }
  ];

  let sIdx = 0, lIdx = 0, cIdx = 0, deleting = false;

  const CHAR = 26, LINE = 170, DONE = 3000, DEL = 10;

  function esc( s ) {
    return s.replace( /&/g, '&amp;' ).replace( /</g, '&lt;' ).replace( />/g, '&gt;' );
  }
  function total( toks ) { return toks.reduce( ( s, t ) => s + t.t.length, 0 ); }

  function renderPartial( toks, upTo ) {
    let h = '', n = 0;
    for ( const t of toks ) {
      if ( n >= upTo ) break;
      h += `<span class="${ t.c }">${ esc( t.t.slice( 0, upTo - n ) ) }</span>`;
      n += t.t.length;
    }
    return h;
  }
  function renderFull( toks ) {
    return toks.map( t => `<span class="${ t.c }">${ esc( t.t ) }</span>` ).join( '' );
  }

  function rebuild() {
    const s = snippets[ sIdx ];
    let h = '';
    for ( let i = 0; i < lIdx; i++ ) {
      h += `<span class="code-line">${ renderFull( s.lines[ i ] ) }</span>`;
    }
    if ( lIdx < s.lines.length ) {
      h += `<span class="code-line">${ renderPartial( s.lines[ lIdx ], cIdx ) }</span>`;
    }
    out.innerHTML = h;
    nums.innerHTML = '';
    for ( let i = 1; i <= lIdx + 1; i++ ) {
      const d = document.createElement( 'div' );
      d.className = 'line-num';
      d.textContent = i;
      nums.appendChild( d );
    }
    if ( filenameEl ) filenameEl.textContent = s.tab;
  }

  function tick() {
    const s = snippets[ sIdx ];
    if ( ! deleting ) {
      if ( lIdx >= s.lines.length ) {
        setTimeout( () => { deleting = true; tick(); }, DONE );
        return;
      }
      const tot = total( s.lines[ lIdx ] );
      if ( cIdx < tot ) { cIdx++; rebuild(); setTimeout( tick, CHAR ); }
      else { lIdx++; cIdx = 0; rebuild(); setTimeout( tick, LINE ); }
    } else {
      if ( lIdx === 0 && cIdx === 0 ) {
        deleting = false;
        sIdx = ( sIdx + 1 ) % snippets.length;
        lIdx = 0; cIdx = 0;
        out.innerHTML = ''; nums.innerHTML = '';
        if ( filenameEl ) filenameEl.textContent = snippets[ sIdx ].tab;
        setTimeout( tick, 400 );
        return;
      }
      if ( cIdx > 0 ) { cIdx--; rebuild(); setTimeout( tick, DEL ); }
      else { lIdx--; cIdx = total( s.lines[ lIdx ] ); rebuild(); setTimeout( tick, DEL ); }
    }
  }

  tick();
} )();
