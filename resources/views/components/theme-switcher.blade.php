<button type="button"
    class="relative inline-flex p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200"
    x-data="{
        darkMode: localStorage.getItem('darkMode') === 'true',
        toggle() {
            this.darkMode = !this.darkMode;
            this.$dispatch('dark-mode-toggled', this.darkMode);
        }
    }" @click="toggle()" aria-label="Toggle dark mode">
    <!-- Sun icon -->
    <svg x-cloak x-show="!darkMode" x-transition:enter="transition-transform duration-200"
        x-transition:enter-start="rotate-180 opacity-0" x-transition:enter-end="rotate-0 opacity-100"
        class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
            clip-rule="evenodd" />
    </svg>

    <!-- Moon icon -->
    <svg x-cloak x-show="darkMode" x-transition:enter="transition-transform duration-200"
        x-transition:enter-start="-rotate-90 opacity-0" x-transition:enter-end="rotate-0 opacity-100"
        class="w-6 h-6 text-indigo-200" fill="currentColor" viewBox="0 0 20 20">
        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
    </svg>

    <!-- Focus ring and background animation -->
    <span
        class="absolute inset-0 rounded-lg ring-2 ring-offset-2 ring-offset-white dark:ring-offset-gray-800 ring-transparent peer-focus:ring-blue-500"
        aria-hidden="true"></span>
</button>

<style>
    [x-cloak] {
        display: none !important;
    }

    /* Add smooth transition for all color changes */
    *,
    ::before,
    ::after {
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 200ms;
    }
</style>
