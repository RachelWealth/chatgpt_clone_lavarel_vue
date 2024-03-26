<script>
import ChatLayout from "@/Layouts/ChatLayout.vue";
import { useForm } from "@inertiajs/vue3";
const form = useForm({
    promt: "",
});

const submit = () => {
    console.log(form.promt);
    form.post("/chat");
};

export default {
    components: {
        ChatLayout,
    },
    setup() {
        return {
            form,
            submit,
        };
    },
};
</script>
<template>
    <ChatLayout>
        <template #aside>
            <div></div>
        </template>
        <div class="w-full flex text-white"></div>
        <template #form>
            <section class="px-6 top-0">
                <div class="w-full">
                    <div class="relative flex-1 flex items-center">
                        <input
                            type="text"
                            class="w-full bg-slate-700 text-white rounded-lg"
                            placeholder="Ask YL Laravel AI"
                            v-model="form.promt"
                            @keyup.enter="submit"
                        />

                        <div
                            class="absolute inset-y-0 right-0 flex items-center pl-3"
                        >
                            <svg
                                class="w-6 h-6 -ml-8 text-slate-200"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                strokeWidth="{1.5}"
                                stroke="currentColor"
                                className="w-6 h-6"
                            >
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                                />
                            </svg>
                        </div>
                    </div>
                </div>
            </section>
        </template>
    </ChatLayout>
</template>



<style></style>
