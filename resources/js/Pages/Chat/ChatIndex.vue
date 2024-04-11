<script setup>
import ChatLayout from "@/Layouts/ChatLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { defineProps } from "vue";
import ChatContent from "@/Components/ChatContent.vue";
const props = defineProps({
    messages: Array,
    chat: null | Object,
});

const form = useForm({
    promt: "",
});

const submit = () => {
    console.log(form.promt);
    try {
        form.post("/chat");
    } catch (error) {
        console.log(error);
    }
};
</script>
<template>
    <ChatLayout>
        <template #aside>
            <ul class="p-2">
                <template v-for="message in messages" :key="message.id">
                    <li
                        class="px-4 py-2 my-2 flex justify-between font-semibold text-white bg-slate-900 hover:bg-slate-700 rounded-lg duration-200"
                    >
                        <Link :href="`/chat${message.id}`">{{
                            message.context[0].content
                        }}</Link>
                    </li>
                </template>
            </ul>
        </template>
        <div id="content" class="w-full flex text-white">
            <template v-if="chat">
                <div class="w-full flex h-full bg-slate-900">
                    <div class="w-full overflow-auto">
                        <template
                            v-for="(content, index) in chat?.context"
                            :key="index"
                        >
                            <ChatContent :content="content"> </ChatContent>
                        </template>
                    </div>
                </div>
            </template>
        </div>
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
