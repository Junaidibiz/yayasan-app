<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Yayasan Daarul Multazam' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        brand: {
                            DEFAULT: "#8AB71E",
                            dark: "#547404",
                            gold: "#C7912E",
                            bgLight: "#F6F8F1",
                            bgDark: "#1A1D14"
                        },
                    },
                    fontFamily: {
                        sans: ["Plus Jakarta Sans", "sans-serif"]
                    },
                },
            },
        };
    </script>
    <style>
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
    </style>
</head>

<body
    class="font-sans bg-brand-bgLight text-zinc-800 dark:bg-brand-bgDark dark:text-zinc-100 transition-colors duration-300">

    <x-frontend.header />

    <main class="pt-24">
        {{ $slot }}
    </main>

    <x-frontend.footer />

    <script>
        // Dark Mode Logic
        const themeToggleBtn = document.getElementById("theme-toggle");
        const themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
        const themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

        if (localStorage.getItem("color-theme") === "dark" || (!("color-theme" in localStorage) && window.matchMedia(
                "(prefers-color-scheme: dark)").matches)) {
            document.documentElement.classList.add("dark");
            themeToggleLightIcon?.classList.remove("hidden");
        } else {
            document.documentElement.classList.remove("dark");
            themeToggleDarkIcon?.classList.remove("hidden");
        }

        themeToggleBtn?.addEventListener("click", function() {
            themeToggleDarkIcon.classList.toggle("hidden");
            themeToggleLightIcon.classList.toggle("hidden");
            if (localStorage.getItem("color-theme") === "light") {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            }
        });

        // Mobile Menu
        const mobileMenuBtn = document.getElementById("mobile-menu-btn");
        const mobileMenu = document.getElementById("mobile-menu");
        mobileMenuBtn?.addEventListener("click", () => mobileMenu.classList.toggle("hidden"));

        // Scroll Effect
        window.addEventListener("scroll", () => {
            const navbar = document.getElementById("navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("py-0", "shadow-lg");
            } else {
                navbar.classList.remove("py-0", "shadow-lg");
            }
        });
    </script>
</body>

</html>
