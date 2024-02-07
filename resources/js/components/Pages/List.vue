<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"pagesAddParent"}' class="btn btn-primary">Create Parent Page</router-link>
            <router-link :to='{name:"pagesAdd"}' class="btn btn-primary">Create Sub Page</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pages</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>PARENT_ID</th>
                                <th>SLUG</th>
                                <th>TITLE</th>
                                <th>CONTENT</th>
                            </tr>
                            </thead>
                            <tbody v-if="pages.length > 0">
                            <tr v-for="(page,key) in pages" :key="key">
                                <td>{{ page.id }}</td>
                                <td>{{ page.parent_id }}</td>
                                <td>{{ page.slug }}</td>
                                <td>{{ page.title }}</td>
                                <td>{{ page.content }}</td>
                                <td>
                                    <button type="button" @click="deletePages(page.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="4" align="center">No Pages Found.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:"pages",
    data(){
        return{
            pages:[]
        }
    },
    mounted(){
        this.getPages()
    },
    methods:{
        async getPages(){
            await this.axios.get('/api/pages').then(response=>{
                this.pages = response.data
            }).catch(error=>{
                console.log(error)
                this.pages = []
            })
        },
        deletePages(id){
            if(confirm("Are you sure to delete this Page ?")){
                this.axios.delete('/api/pages/'+id).then(response=>{
                    this.getPages()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
