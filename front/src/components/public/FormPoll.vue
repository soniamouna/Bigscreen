<script>
import ModalLinkResponses from './ModalLinkResponses.vue';
export default {
    props: {
        questions: {
            type: Array,
            default: () => [],
        },
    },
    data() {
        return {
            responses: [],
        };
    },
   
    components: { ModalLinkResponses }
};
</script>

<template>
    <div>
            <!-- Informations about the question -->
            <form >
                <!-- Informations about the question -->
                <div v-for="(question, i) in questions" :key="question.id">
                    <div>
                        <h1>Question {{ question.id }}/{{ questions.length }}</h1>
                        <p>{{ question.title }}</p>
                    </div>
                    <!--Choices -->
                    <div>
                        <!-- Type A -->
                        <div v-if="question.type === 'A'">
                            <div v-for="(choice, index) in question.choices" :key="index">
                                <input type="radio" :value="choice" :name="question.id" v-model="responses[i]"
                                    required />
                                <label> {{ choice }} </label>
                            </div>
                        </div>
                        <!-- Type B -->

                        <div v-else-if="question.type === 'B'">
                            <input type="email" v-if="question.id === 1" maxlength="255" v-model="responses[i]" />
                            <textarea maxlength="255" v-else v-model="responses[i]" required></textarea>
                        </div>
                        <!-- Type C -->

                        <div v-else-if="question.type === 'C'" v-for="index in 5" :key="index">
                            <input type="radio" :value="index" :name="question.id" v-model="responses[i]" required />
                            <label> {{ index }} </label>
                        </div>
                    </div>
                </div>

                  
            <div>
                <ModalLinkResponses :responses="this.responses" />
            </div>
        </form>
    </div>
</template>

<style>

</style>
