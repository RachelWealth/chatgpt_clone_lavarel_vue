<script setup>
import ChatLayout from "@/Layouts/ChatLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { defineProps, ref, onMounted  } from "vue";
import ChatContent from "@/Components/ChatContent.vue";


const promtInput = ref(null);
const chatContainer = ref(null);
const showDeleteButton = ref(false);

const props = defineProps({
    messages: Array,
    chat: null | Object,
});

const form = useForm({
    promt: "",
});

const submit = () => {
    try {
        form.post(`/chat/${props.chat.id}`, {
        onFinish: () => clear(),
    });
    form.promt=""
    } catch (error) {
        console.log(error);
    }
};


const scrollToBottom = () => {
    if (props.chat) {
        const el = chatContainer.value;
        el.scrollTop = el.scrollHeight;
    }
};

const clear = () => {
    form.promt = "";
    promtInput.value.focus();
    scrollToBottom();
};
onMounted(() => {
    clear();
});
</script>
<template>
    <ChatLayout>
        <template #aside>
            <ul class="p-2 w-full ">
                <template v-for="message in messages" :key="message.id">
                    <li
                        class="px-4 w-full py-2 my-2 flex justify-between font-semibold text-white bg-slate-900 hover:bg-slate-700 rounded-lg duration-200">
                        <Link :href="`/chat/${message.id}`">
                        {{ message.context.length > 0 ? message.context[0].content : 'New chat' }}
                        </Link>

                    </li>
                </template>
            </ul>
        </template>
        <div id="content" class="w-full flex text-white">
            <template v-if="chat">
                <div class="w-full flex h-full bg-slate-900">
                    <div class="w-full overflow-auto pb-36" ref="chatContainer">
                        <template v-for="(content, index) in chat?.context" :key="index">
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
                        <input type="text" class="w-full bg-slate-700 text-white rounded-lg"
                            placeholder="Ask YL Laravel AI" v-model="form.promt" @keyup.enter="submit"
                            :disabled="form.processing" ref="promtInput" />

                        <div class="absolute inset-y-0 right-0 flex items-center pl-3">
                            <svg class="w-6 h-6 -ml-8 text-slate-200" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" strokeWidth="{1.5}" stroke="currentColor" className="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                            </svg>
                            <div class="dot-typing -ml-20" v-if="form.processing">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </template>
    </ChatLayout>
</template>

<style>
.dot-typing {
    position: relative;
    left: -9999px;
    width: 10px;
    height: 10px;
    border-radius: 5px;
    background-color: #9880ff;
    color: #9880ff;
    box-shadow: 9984px 0 0 0 #9880ff, 9999px 0 0 0 #9880ff,
        10014px 0 0 0 #9880ff;
    animation: dot-typing 1.5s infinite linear;
}

@keyframes dot-typing {
    0% {
        box-shadow: 9984px 0 0 0 #9880ff, 9999px 0 0 0 #9880ff,
            10014px 0 0 0 #9880ff;
    }

    16.667% {
        box-shadow: 9984px -10px 0 0 #9880ff, 9999px 0 0 0 #9880ff,
            10014px 0 0 0 #9880ff;
    }

    33.333% {
        box-shadow: 9984px 0 0 0 #9880ff, 9999px 0 0 0 #9880ff,
            10014px 0 0 0 #9880ff;
    }

    50% {
        box-shadow: 9984px 0 0 0 #9880ff, 9999px -10px 0 0 #9880ff,
            10014px 0 0 0 #9880ff;
    }

    66.667% {
        box-shadow: 9984px 0 0 0 #9880ff, 9999px 0 0 0 #9880ff,
            10014px 0 0 0 #9880ff;
    }

    83.333% {
        box-shadow: 9984px 0 0 0 #9880ff, 9999px 0 0 0 #9880ff,
            10014px -10px 0 0 #9880ff;
    }

    100% {
        box-shadow: 9984px 0 0 0 #9880ff, 9999px 0 0 0 #9880ff,
            10014px 0 0 0 #9880ff;
    }
}
</style>
