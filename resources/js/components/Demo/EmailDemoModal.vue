<template>
    <div v-show="open" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicons: mail -->
                            <svg class="h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Email service is powered by <span class="text-[#FF5959]">Mailgun</span> (Test Mode).
                            </h3>

                            <div class="text-sm text-gray-700 leading-6 mt-2">
                                <p>
                                    I'm using Mailgun's Sandbox subdomain for testing. You have to contact me before you continue or you might get an error.
                                </p>

                                <p class="mt-4">Email: <span class="text-blue-500">yca@duck.com</span></p>
                                <p class="mt-2">Telegram: <a href="https://t.me/ywaychitaung" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:underline">https://t.me/ywaychitaung</a></p>
                                <p class="mt-2">Check My Website: <a href="https://www.ywaychitaung.com" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:underline">https://www.ywaychitaung.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="open = false" type="button" class="modal-button">
                        I've already verfied my email
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'

export default {
    setup() {
        const open = ref(true)

        return {
            open
        }
    }
}
</script>