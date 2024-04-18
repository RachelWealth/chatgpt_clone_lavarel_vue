<template>
    <aside
        id="aside"
        class="fixed z-10 top-0 pb-3 px-4 flex justify-center h-screen border-r bg-white transtion duration-300 sm:w-[0%] sm:px-0 md:w-[20%] lg:ml-0 2xl:w-[15%]"
    >
        <div class="relative top-0 w-full">
            <slot name="aside"> </slot>
        </div>
    </aside>
    <div
        class="ml-auto mb-6 sm:w-[100%] md:w-[80%] xl:w-[80%] 2xl:w-[85%] h-screen"
    >
        <div class="pt-6 w-full h-screen bg-slate-900">
            <main>
                <slot />
            </main>
        </div>
        <div
            id="question-input"
            class="fixed z-20 py-2 sm:w-[100%] md:w-[80%] xl:w-[80%] 2xl:w-[85%] bottom-0 h-28 bg-slate-900 bg-opacity-10"
        >
            <slot name="form" />
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style>
#aside {
    background: #171717;
}
#question-input {
    background: #212121;
}
</style>
