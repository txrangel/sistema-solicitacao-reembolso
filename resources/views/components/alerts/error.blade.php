<div id="toast-danger" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 10000)" class="z-50 fixed top-6 right-6 -ml-52 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 rounded-lg shadow bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg bg-red-800 text-red-200">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ml-3 text-sm font-normal text-white break-words w-9/12">{{ __(session('message')) }}</div>
    <div x-on:click.prevent="show = false" class="ml-auto -mx-1.5 -my-1.5 rounded-lg p-1.5 inline-flex h-8 w-8 text-gray-500 hover:text-white bg-gray-800 hover:bg-gray-700 cursor-pointer">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Error icon</span>
    </div>
</div>