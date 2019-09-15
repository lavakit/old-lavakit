<template>
    <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-for="(item, index) in list" :key="index" class="breadcrumb-item" :class="{ active: isLast(index)}">
                <span v-if="isLast(index)">
                    {{ showName(item) }}
                </span>
                <router-link v-else :to="{name: item.name}">
                    <i :class="showIcon(item)" v-if="isFirst(index)"></i>
                    {{ showName(item) }}
                </router-link>
            </li>
        </ol>
    </nav>
</template>

<script>
    export default {
        name: "lavakit-breadcrumb",
        props: {
            list: {
                type: Array,
                required: true,
                default: () => [],
            },
        },
        methods: {
            isFirst (index) {
                return index === 0;
            },
            isLast (index) {
                return index === this.list.length - 1;
            },
            showName(item) {
                if (item.meta && item.meta.breadcrumb) {
                    item = item.meta && item.meta.breadcrumb
                } else {
                    item = item.name
                }

                return this.trans(item);
            },
            showIcon (item) {
                if (item.meta && item.meta.icon) {
                    item = item.meta && item.meta.icon
                } else {
                    item = 'ik ik-home';
                }

                return item;
            }
        },
    }
</script>