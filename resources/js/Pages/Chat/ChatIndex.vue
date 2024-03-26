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
                    <input type="text" class="w-full bg-slate-700 text-white rounded-lg"
                    placeholder="Ask YL Laravel AI">
                  </div>
                </div>
            </section>
        </template>
    </ChatLayout>
</template>

<script>
import ChatLayout from "@/Layouts/ChatLayout.vue";
export default {
    components: {
        ChatLayout,
    },
};
</script>

<style></style>
