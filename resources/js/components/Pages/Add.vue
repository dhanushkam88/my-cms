<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Page</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-3 mb-2">
                                <div class="form-group">
                                    <label>Parent Page</label>
                                    <select class="form-control" v-model="pages.parent_id">
                                        <option value="" hidden>Select Parent Page</option>
                                        <option v-for="page in parentPages" :value="page.id" :key="page.id">{{ page.title }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3 mb-2">
                                <div class="form-group">
                                    <label>Slug <small>(Ex: page/page)</small></label>
                                    <input type="text" class="form-control" v-model="pages.slug">
                                </div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label>Title <small style="color: red">*</small></label>
                                    <input type="text" class="form-control" v-model="pages.title">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Page Content</label>
                                    <textarea class="form-control" v-model="pages.content"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <router-link :to="{ name: 'pagesList' }" class="btn btn-danger">Back</router-link>
                                <button type="submit" class="btn btn-primary" :disabled="isSaveDisabled">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "add-pages",
    data() {
        return {
            pages: {
                parent_id: "",
                slug: "",
                title: "",
                content: ""
            },
            parentPages: [] // Array to hold parent pages fetched from API
        };
    },
    computed: {
        isSaveDisabled() {
            return !this.pages.title;
        }
    },
    methods: {
        async create() {
            await this.axios
                .post("/api/pages", this.pages)
                .then((response) => {
                    this.$router.push({ name: "pagesList" });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async fetchParentPages() {
            // Fetch parent pages from API and populate parentPages array
            try {
                const response = await this.axios.get("/api/pages");
                this.parentPages = response.data;
                console.log(this.parentPages);
            } catch (error) {
                console.error("Error fetching parent pages:", error);
            }
        }
    },
    mounted() {
        // Fetch parent pages when the component is mounted
        this.fetchParentPages();
    }
};
</script>
