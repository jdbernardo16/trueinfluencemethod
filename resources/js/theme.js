/**
 * Theme JavaScript
 * Handles interactivity for the True Influence Method WordPress theme
 */

(function () {
    "use strict";

    // ============================================
    // Sticky Header
    // ============================================
    const initStickyHeader = function () {
        const header = document.getElementById("site-header");
        if (!header) return;

        const handleScroll = function () {
            if (window.scrollY > 50) {
                header.classList.remove("bg-transparent", "py-6");
                header.classList.add(
                    "bg-[#0f203d]/95",
                    "backdrop-blur-sm",
                    "py-4",
                    "shadow-lg",
                );
            } else {
                header.classList.remove(
                    "bg-[#0f203d]/95",
                    "backdrop-blur-sm",
                    "py-4",
                    "shadow-lg",
                );
                header.classList.add("bg-transparent", "py-6");
            }
        };

        window.addEventListener("scroll", handleScroll);
        handleScroll(); // Initial check
    };

    // ============================================
    // Mobile Menu Toggle
    // ============================================
    const initMobileMenu = function () {
        const toggleButton = document.getElementById("mobile-menu-toggle");
        const mobileMenu = document.getElementById("mobile-menu");
        const hamburgerIcon = document.getElementById("hamburger-icon");
        const closeIcon = document.getElementById("close-icon");
        const mobileMenuLinks = document.querySelectorAll(".mobile-menu-link");

        if (!toggleButton || !mobileMenu) return;

        const toggleMenu = function () {
            const isOpen = mobileMenu.classList.toggle("hidden");
            hamburgerIcon.classList.toggle("hidden");
            closeIcon.classList.toggle("hidden");
            toggleButton.setAttribute("aria-expanded", !isOpen);
            document.body.style.overflow = isOpen ? "" : "hidden";
        };

        toggleButton.addEventListener("click", toggleMenu);

        // Close menu when clicking links
        mobileMenuLinks.forEach((link) => {
            link.addEventListener("click", () => {
                if (!mobileMenu.classList.contains("hidden")) {
                    toggleMenu();
                }
            });
        });

        // Close menu on escape key
        document.addEventListener("keydown", (e) => {
            if (
                e.key === "Escape" &&
                !mobileMenu.classList.contains("hidden")
            ) {
                toggleMenu();
            }
        });
    };

    // ============================================
    // Desktop Dropdown Menus
    // ============================================
    const initDropdowns = function () {
        const dropdownToggles = document.querySelectorAll(".dropdown-toggle");
        const dropdownMenu = document.getElementById("dropdown-menu");
        const dropdownDescription = document.querySelector(
            "#dropdown-description p",
        );

        if (!dropdownMenu) return;

        // Build dropdown content dynamically from the menu structure
        const dropdownSections =
            dropdownMenu.querySelectorAll("[data-dropdown]");
        const dropdownContent = {};

        dropdownSections.forEach((section) => {
            const dropdownId = section.getAttribute("data-dropdown");
            if (dropdownId) {
                dropdownContent[dropdownId] = {
                    section: section,
                    description: section.getAttribute("data-description") || "",
                };
            }
        });

        let activeDropdown = null;

        dropdownToggles.forEach((toggle) => {
            toggle.addEventListener("click", (e) => {
                e.stopPropagation();
                const dropdownId = toggle.getAttribute("data-dropdown");

                if (!dropdownId) return;

                // Toggle current dropdown
                if (activeDropdown === dropdownId) {
                    closeDropdown();
                } else {
                    openDropdown(dropdownId);
                }
            });
        });

        function openDropdown(id) {
            // Close any open dropdown
            closeDropdown();

            // Show dropdown menu
            dropdownMenu.classList.remove("hidden");

            // Show specific content
            Object.keys(dropdownContent).forEach((key) => {
                if (dropdownContent[key].section) {
                    dropdownContent[key].section.classList.add("hidden");
                }
            });

            if (dropdownContent[id] && dropdownContent[id].section) {
                dropdownContent[id].section.classList.remove("hidden");
            }

            // Update description
            if (dropdownDescription) {
                dropdownDescription.textContent = "";
                document
                    .getElementById("dropdown-description")
                    .classList.add("hidden");
            }

            if (dropdownContent[id] && dropdownContent[id].description) {
                if (dropdownDescription) {
                    dropdownDescription.textContent =
                        dropdownContent[id].description;
                    document
                        .getElementById("dropdown-description")
                        .classList.remove("hidden");
                }
            }

            // Update aria-expanded
            const toggle = document.querySelector(
                `.dropdown-toggle[data-dropdown="${id}"]`,
            );
            if (toggle) {
                toggle.setAttribute("aria-expanded", "true");
            }

            activeDropdown = id;
        }

        function closeDropdown() {
            if (activeDropdown) {
                const toggle = document.querySelector(
                    `.dropdown-toggle[data-dropdown="${activeDropdown}"]`,
                );
                if (toggle) {
                    toggle.setAttribute("aria-expanded", "false");
                }
            }
            dropdownMenu.classList.add("hidden");

            // Hide description
            if (dropdownDescription) {
                dropdownDescription.textContent = "";
                document
                    .getElementById("dropdown-description")
                    .classList.add("hidden");
            }

            activeDropdown = null;
        }

        // Close dropdown when clicking outside
        document.addEventListener("click", (e) => {
            if (
                !e.target.closest(".dropdown-toggle") &&
                !e.target.closest("#dropdown-menu")
            ) {
                closeDropdown();
            }
        });

        // Close dropdown on escape key
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") {
                closeDropdown();
            }
        });
    };

    // ============================================
    // Mobile Dropdown Toggles
    // ============================================
    const initMobileDropdowns = function () {
        const mobileDropdownToggles = document.querySelectorAll(
            ".mobile-dropdown-toggle",
        );

        mobileDropdownToggles.forEach((toggle) => {
            toggle.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();

                const dropdownId = toggle.getAttribute("data-dropdown");

                if (!dropdownId) return;

                // Find the parent menu item and its sub-menu
                const parentItem = toggle.closest(".menu-item-has-children");

                if (parentItem) {
                    const linksContainer =
                        parentItem.querySelector(".sub-menu");

                    if (linksContainer) {
                        linksContainer.classList.toggle("hidden");
                        toggle.setAttribute(
                            "aria-expanded",
                            !linksContainer.classList.contains("hidden"),
                        );
                    }
                }
            });
        });
    };

    // ============================================
    // Smooth Scroll
    // ============================================
    const initSmoothScroll = function () {
        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener("click", function (e) {
                const href = this.getAttribute("href");
                if (href === "#") return;

                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition =
                        elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth",
                    });
                }
            });
        });
    };

    // ============================================
    // FAQ Accordion
    // ============================================
    const initFAQAccordion = function () {
        const faqItems = document.querySelectorAll(".faq-item");

        faqItems.forEach((item) => {
            const question = item.querySelector(".faq-question");
            const answer = item.querySelector(".faq-answer");

            if (!question || !answer) return;

            question.addEventListener("click", () => {
                const isOpen = !item.classList.contains("active");

                // Close all other FAQ items
                faqItems.forEach((otherItem) => {
                    otherItem.classList.remove("active");
                    const otherAnswer = otherItem.querySelector(".faq-answer");
                    if (otherAnswer) {
                        otherAnswer.style.maxHeight = "0";
                    }
                });

                // Toggle current item
                if (isOpen) {
                    item.classList.add("active");
                    answer.style.maxHeight = answer.scrollHeight + "px";
                }
            });
        });
    };

    // ============================================
    // Floating Particles (Hero Section)
    // ============================================
    const initParticles = function () {
        const particlesContainer = document.getElementById(
            "particles-container",
        );
        if (!particlesContainer) return;

        const particleCount = 20;

        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement("div");
            particle.className =
                "absolute w-1 h-1 bg-[#d4b478]/20 rounded-full animate-float";
            particle.style.left = Math.random() * 100 + "%";
            particle.style.top = Math.random() * 100 + "%";
            particle.style.animationDelay = Math.random() * 5 + "s";
            particle.style.animationDuration = 8 + Math.random() * 4 + "s";
            particlesContainer.appendChild(particle);
        }
    };

    // ============================================
    // Newsletter Form
    // ============================================
    const initNewsletterForm = function () {
        const form = document.getElementById("newsletter-form");
        if (!form) return;

        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const email = form.querySelector('input[type="email"]').value;

            // Here you would typically send the email to your newsletter service
            // For now, we'll just show an alert
            alert("Thank you for subscribing! We'll be in touch soon.");
            form.reset();
        });
    };

    // ============================================
    // Initialize All Features
    // ============================================
    const init = function () {
        initStickyHeader();
        initMobileMenu();
        initDropdowns();
        initMobileDropdowns();
        initSmoothScroll();
        initFAQAccordion();
        initParticles();
        initNewsletterForm();
    };

    // Run initialization when DOM is ready
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", init);
    } else {
        init();
    }
})();
