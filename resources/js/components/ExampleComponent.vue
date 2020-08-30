<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ title }}</div>
                    <div class="card-body">
                        <div
                            class="d-flex  bd-highlight justify-content-around"
                        >
                            <button
                                v-for="(choice, index) in randomChoices"
                                :key="index"
                                type="button"
                                class="btn btn-primary p-2 bd-highlight "
                                @click="toAnswer(choice['is_answer'])"
                            >
                                {{ choice["choice"] }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["question", "choices", "title"],
    computed: {
        randomChoices() {
            for (let i = this.choices.length - 1; i >= 0; --i) {
                let rand = Math.floor(Math.random() * (i + 1));
                [this.choices[i], this.choices[rand]] = [
                    this.choices[rand],
                    this.choices[i]
                ];
            }
            return this.choices;
        }
    },

    mounted() {
        console.log("Component mounted.");
    },

    methods: {
        toAnswer(ans) {
            for (let i = this.choices.length - 1; i >= 0; --i) {
                console.log(this.choices[i]["is_answer"]);
                if (this.choices[i]["is_answer"]) {
                    this.choicetrue = this.choices[i]["choice"];
                }
            }
            console.log(this.choicetrue);
            this.choice1 = this.choicetrue;
            if (ans) {
                this.$router.push({ name: "AnswerTrue" });
            } else {
                this.$router.push({ name: "AnswerFalse" });
            }
        }
    }
};
</script>
