//
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-mobile-nav]').forEach((nav) => {
        const toggle = nav.querySelector('[data-mobile-nav-toggle]');
        const menu = nav.querySelector('[data-mobile-nav-menu]');
        const openIcon = nav.querySelector('[data-mobile-nav-open-icon]');
        const closeIcon = nav.querySelector('[data-mobile-nav-close-icon]');
        const links = nav.querySelectorAll('[data-mobile-nav-link]');

        if (!toggle || !menu) {
            return;
        }

        const setOpen = (isOpen) => {
            menu.hidden = !isOpen;
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            openIcon?.classList.toggle('hidden', isOpen);
            closeIcon?.classList.toggle('hidden', !isOpen);
        };

        toggle.addEventListener('click', () => {
            setOpen(menu.hidden);
        });

        links.forEach((link) => {
            link.addEventListener('click', () => setOpen(false));
        });
    });

    document.querySelectorAll('[data-testimonial-slider]').forEach((slider) => {
        const track = slider.querySelector('[data-testimonial-track]');
        const dots = Array.from(slider.querySelectorAll('[data-testimonial-dot]'));
        const previous = slider.querySelector('[data-testimonial-prev]');
        const next = slider.querySelector('[data-testimonial-next]');
        const originalSlides = Array.from(slider.querySelectorAll('.testimonial-slide'));
        let logicalIndex = 0;
        let trackIndex = originalSlides.length;

        if (!track || originalSlides.length === 0) {
            return;
        }

        const appendClones = () => {
            originalSlides.forEach((slide) => {
                const clone = slide.cloneNode(true);
                clone.setAttribute('aria-hidden', 'true');
                track.append(clone);
            });

            [...originalSlides].reverse().forEach((slide) => {
                const clone = slide.cloneNode(true);
                clone.setAttribute('aria-hidden', 'true');
                track.prepend(clone);
            });
        };

        appendClones();

        const slides = Array.from(track.querySelectorAll('.testimonial-slide'));

        const setTransition = (enabled) => {
            track.style.transitionDuration = enabled ? '' : '0ms';
        };

        const updateSlider = (animate = true) => {
            const slide = slides[trackIndex];
            const sliderRect = slider.getBoundingClientRect();
            const slideRect = slide.getBoundingClientRect();
            const offset = slide.offsetLeft - ((sliderRect.width - slideRect.width) / 2);

            setTransition(animate);
            track.style.transform = `translateX(-${offset}px)`;

            slides.forEach((item, index) => {
                item.classList.toggle('is-active', index === trackIndex);
            });

            dots.forEach((dot, index) => {
                dot.setAttribute('aria-current', index === logicalIndex ? 'true' : 'false');
            });
        };

        const moveTo = (index) => {
            logicalIndex = (index + originalSlides.length) % originalSlides.length;
            trackIndex += index > logicalIndex && Math.abs(index - logicalIndex) > 1 ? -1 : 1;
            updateSlider(true);
        };

        const moveBy = (direction) => {
            logicalIndex = (logicalIndex + direction + originalSlides.length) % originalSlides.length;
            trackIndex += direction;
            updateSlider(true);
        };

        previous?.addEventListener('click', () => moveBy(-1));
        next?.addEventListener('click', () => moveBy(1));

        dots.forEach((dot) => {
            dot.addEventListener('click', () => {
                const nextIndex = Number(dot.dataset.testimonialDot);
                const distance = nextIndex - logicalIndex;
                logicalIndex = nextIndex;
                trackIndex += distance;
                updateSlider(true);
            });
        });

        track.addEventListener('transitionend', () => {
            if (trackIndex >= originalSlides.length * 2) {
                trackIndex -= originalSlides.length;
                updateSlider(false);
            }

            if (trackIndex < originalSlides.length) {
                trackIndex += originalSlides.length;
                updateSlider(false);
            }
        });

        window.addEventListener('resize', () => updateSlider(false));
        updateSlider(false);
    });

    document.querySelectorAll('[data-process-accordion]').forEach((accordion) => {
        const items = Array.from(accordion.querySelectorAll('[data-process-item]'));

        const setPanelState = (item, open, animate = true) => {
            const trigger = item.querySelector('[data-process-trigger]');
            const panel = item.querySelector('[data-process-panel]');
            const plus = item.querySelector('[data-process-plus]');
            const minus = item.querySelector('[data-process-minus]');

            if (!trigger || !panel) {
                return;
            }

            trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
            item.classList.toggle('is-open', open);
            plus?.classList.toggle('hidden', open);
            minus?.classList.toggle('hidden', !open);

            if (!animate) {
                panel.style.height = open ? 'auto' : '0px';
                panel.style.opacity = open ? '1' : '0';
                return;
            }

            if (open) {
                panel.style.height = '0px';
                panel.style.opacity = '0';
                requestAnimationFrame(() => {
                    panel.style.height = `${panel.scrollHeight}px`;
                    panel.style.opacity = '1';
                });
                return;
            }

            panel.style.height = `${panel.scrollHeight}px`;
            panel.style.opacity = '1';
            requestAnimationFrame(() => {
                panel.style.height = '0px';
                panel.style.opacity = '0';
            });
        };

        items.forEach((item) => {
            const trigger = item.querySelector('[data-process-trigger]');
            const panel = item.querySelector('[data-process-panel]');
            const isOpen = item.classList.contains('is-open');

            if (!trigger || !panel) {
                return;
            }

            setPanelState(item, isOpen, false);

            panel.addEventListener('transitionend', (event) => {
                if (event.propertyName === 'height' && item.classList.contains('is-open')) {
                    panel.style.height = 'auto';
                }
            });

            trigger.addEventListener('click', () => {
                const shouldOpen = trigger.getAttribute('aria-expanded') !== 'true';

                items.forEach((otherItem) => {
                    if (otherItem !== item) {
                        setPanelState(otherItem, false);
                    }
                });

                setPanelState(item, shouldOpen);
            });
        });
    });
});
