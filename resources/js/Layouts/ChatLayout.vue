<template>
    <aside
        id="aside"
        class="ml-[-100%] fixed z-10 top-0 pb-3 px-4 w-full flex flex-col justify-center h-screen border-r bg-white transtion duration-300 md:w-4/12 lg:ml-0 lg:w-[20%] 2xl:w-[15%]"
    >
        <div>
            <slot name="aside"> </slot>
        </div>
    </aside>
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]  h-screen">
        <div class="pt-6"></div>
        <div
            id="question-input"
            class="fixed z-20 lg:w-[75%] py-2 xl:w-[80%] 2xl:w-[85%] bottom-0 h-28 bg-slate-900 bg-opacity-10"
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
