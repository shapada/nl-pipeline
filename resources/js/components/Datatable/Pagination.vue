<template>
    <nav class="pagination">
        <span>
            {{ pagination.from }} - {{ pagination.to }} of {{ pagination.total }}
        </span>
        <a v-if="pagination.prePageUrl" clas="btn Prevbtn-sm" @click="$emit('prev')">
            Prev
        </a>
        <a class="btn btn-sm" v-else :disabled="true">
            Prev
        </a>

        <a v-if="pagination.nextPageUrl" clas="btn btn-sm" @click="$emit('next')">
            Next
        </a>
        <a class="btn btn-sm" v-else :disabled="true">
            Next
        </a>
    </nav>
</template>
<script>
export default {
    props: [ 'pagination' ]
}
</script>