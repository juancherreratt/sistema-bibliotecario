<div
    x-data="{ show: false, message: '' }"
    x-on:notify.window="message = $event.detail; show = true; setTimeout(() => show = false, 4000)"
    x-show="show"
    x-transition
    class="fixed top-4 right-4 z-50 rounded-md bg-green-600 text-white px-4 py-2 shadow-lg text-sm"
    style="display: none;"
>
    <span x-text="message"></span>
</div>
