(function () {
  document.documentElement.classList.remove('no-js');
  document.documentElement.classList.add('js');

  const config = window.tinyEditorialNav || {};
  const toggle = document.getElementById('mobile-toggle');
  const nav = document.getElementById('primary-nav');
  const mobileQuery = window.matchMedia('(max-width: 959px)');
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (toggle && nav) {
    const focusableSelector = 'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])';
    let lastFocusedBeforeMenu = null;

    function getFocusables() {
      return Array.from(nav.querySelectorAll(focusableSelector)).concat([toggle]).filter(Boolean);
    }

    function setMenuState(open, restoreFocus = true) {
      if (!mobileQuery.matches) {
        open = false;
      }
      nav.classList.toggle('open', open);
      document.body.classList.toggle('nav-open', open);
      toggle.classList.toggle('is-open', open);
      toggle.setAttribute('aria-expanded', String(open));
      toggle.setAttribute('aria-label', open ? (config.close || 'Close menu') : (config.open || 'Open menu'));

      if (mobileQuery.matches) {
        nav.setAttribute('aria-hidden', String(!open));
      } else {
        nav.removeAttribute('aria-hidden');
      }

      if (open) {
        lastFocusedBeforeMenu = document.activeElement;
        const firstFocusable = getFocusables().find(el => el !== toggle) || toggle;
        window.setTimeout(() => {
          if (firstFocusable && typeof firstFocusable.focus === 'function') {
            firstFocusable.focus({ preventScroll: true });
          }
        }, 30);
      } else if (restoreFocus && lastFocusedBeforeMenu && mobileQuery.matches) {
        window.setTimeout(() => lastFocusedBeforeMenu.focus?.(), 0);
      }
    }

    function syncResponsiveMenuState() {
      if (mobileQuery.matches) {
        if (!nav.classList.contains('open')) {
          nav.setAttribute('aria-hidden', 'true');
        }
      } else {
        setMenuState(false, false);
        nav.removeAttribute('aria-hidden');
      }
    }

    toggle.addEventListener('click', () => setMenuState(!nav.classList.contains('open')));
    nav.addEventListener('click', event => {
      if (event.target && event.target.closest('a') && mobileQuery.matches) {
        setMenuState(false, false);
      }
    });
    document.addEventListener('click', event => {
      if (!mobileQuery.matches || !nav.classList.contains('open')) return;
      if (nav.contains(event.target) || toggle.contains(event.target)) return;
      setMenuState(false);
    });
    document.addEventListener('keydown', event => {
      if (!mobileQuery.matches || !nav.classList.contains('open')) return;
      if (event.key === 'Escape') {
        event.preventDefault();
        setMenuState(false);
        return;
      }
      if (event.key === 'Tab') {
        const focusables = getFocusables();
        if (!focusables.length) return;
        const first = focusables[0];
        const last = focusables[focusables.length - 1];
        if (event.shiftKey && document.activeElement === first) {
          event.preventDefault();
          last.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
          event.preventDefault();
          first.focus();
        }
      }
    });

    if (typeof mobileQuery.addEventListener === 'function') {
      mobileQuery.addEventListener('change', syncResponsiveMenuState);
    } else if (typeof mobileQuery.addListener === 'function') {
      mobileQuery.addListener(syncResponsiveMenuState);
    }
    syncResponsiveMenuState();
  }

  const scrollBtn = document.getElementById('scrollTop');
  if (scrollBtn) {
    window.addEventListener('scroll', () => {
      scrollBtn.classList.toggle('visible', window.scrollY > 400);
    }, { passive: true });
    scrollBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: !reduceMotion && config.smoothScroll ? 'smooth' : 'auto' });
    });
  }

  document.querySelectorAll('.element-copy-button[data-copy-target]').forEach(button => {
    const originalText = button.textContent;
    button.addEventListener('click', async () => {
      const target = document.getElementById(button.getAttribute('data-copy-target'));
      const text = target ? target.textContent : '';
      if (!text) return;
      try {
        if (navigator.clipboard && navigator.clipboard.writeText) {
          await navigator.clipboard.writeText(text);
        } else {
          const range = document.createRange();
          range.selectNodeContents(target);
          const selection = window.getSelection();
          selection.removeAllRanges();
          selection.addRange(range);
          document.execCommand('copy');
          selection.removeAllRanges();
        }
        button.textContent = config.copied || 'Copied';
      } catch (error) {
        button.textContent = config.copyFailed || 'Select and copy manually';
      }
      window.setTimeout(() => {
        button.textContent = originalText || config.copy || 'Copy HTML';
      }, 1800);
    });
  });

})();
