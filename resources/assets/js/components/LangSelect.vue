<template>
    <div>
        <select class="w3-select w3-border w3-text-black w3-large w3-white" v-model="def" @change="selectChange">
            <option class="w3-text-black w3-white w3-large" :value="en">English</option>
            <option class="w3-text-black w3-white w3-large" :value="zh_tw">繁體中文</option>
        </select>
        <!--for refresh the new page, not shown-->
        <a id="language-page-link" :href="url" style="display:none;">language page</a>
    </div>
</template>

<script>
    export default {
        props:['default_value'],

        data () {
            return {
                en: "en",
                zh_tw: "zh_tw",
                url: "/language?lang=",
                def: this.default_value,
            }
        },

        methods: {
            selectChange() {
                //alert(this.def);
                this.url += event.target.value;
                $("#language-page-link").attr({"href": this.url});
                $("#language-page-link")[0].click();
            },
        },

    }
</script>
