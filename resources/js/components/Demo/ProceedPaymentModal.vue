<template>
    <button @click="open = true" class="button w-full">Checkout</button>

    <div v-show="open" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicons: credit-card -->
                            <svg class="h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>

                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Payment is powered by <span class="text-[#7632FF]">Stripe</span> (Test Mode).
                            </h3>

                            <div class="text-sm text-gray-700 leading-6 mt-2">
                                <p>
                                    I'm using Stripe Prebuilt Checkout page.
                                    <span class="text-red-500">For any reason, don't enter your credit/debit card details. I won't take responsibility for that.</span>
                                </p>

                                <p class="mt-4">Here is the testing card. You can test with it.</p>

                                <p class="mt-4">Card Number: 4242 4242 4242 4242</p>
                                <p class="mt-2">Expire: 06/{{ (new Date().getFullYear() + 3).toString().substring(2) }}</p>
                                <p class="mt-2">CVC: 123</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form action="checkout" method="POST">
                        <input type="hidden" name="_token" :value="csrf">

                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white hover:bg-blue-500 text-base font-medium text-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Proceed to Payment
                        </button>
                    </form>

                    <button @click="open = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
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
        const open = ref(false)
        const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

        return {
            csrf,
            open
        }
    }
}
</script>