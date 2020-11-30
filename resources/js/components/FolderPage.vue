<template>
    <div class="col-12">
        <div class>
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Folders</h4>
                        </div>
                        <div class="ml-auto">
                            <div class="dl">
                                <button type="button" class="btn btn-primary" @click="newModal()" style="border:0"><i class="fas fa-folder-plus" style="font-size:23px;padding: 0 10px"></i></button>
                                <div
                                    class="modal fade"
                                    id="exampleModalLong"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="exampleModalLongTitle"
                                    aria-hidden="true"
                                >
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"  v-if="!editmode">
                                                    New folder
                                                    <br />
                                                </h5>
                                                <h5 class="modal-title"  v-if="editmode">
                                                    Update folder
                                                    <br />
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form
                                                @submit.prevent=" editmode ? edit() : upl()"
                                                enctype="multipart/form-data"
                                            >
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label >Folder name :</label>
                                                        <input
                                                            type="text"
                                                            name="name"
                                                            class="form-control"
                                                            v-model="form.name"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Folder Color :</label>
                                                        <div class="radio-toolbar" style="text-align:center">

                                                            <input type="radio" id="1E88E5" name="color"  v-model="form.color" value="#1E88E5">
                                                            <label for="1E88E5" style="background-color: #1E88E5!important;"></label>

                                                            <input type="radio" id="EF5350" name="color"  v-model="form.color" value="#EF5350">
                                                            <label for="EF5350" style="background-color: #EF5350!important;"></label>

                                                            <input type="radio" id="00897B" name="color"  v-model="form.color" value="#00897B">
                                                            <label for="00897B" style="background-color: #00897B!important;"></label>

                                                            <input type="radio" id="FFC107" name="color"  v-model="form.color" value="#FFC107">
                                                            <label for="FFC107" style="background-color: #FFC107!important;"></label>

                                                            <input type="radio" id="F4511E" name="color"  v-model="form.color" value="#F4511E">
                                                            <label for="F4511E" style="background-color: #F4511E!important;"></label>

                                                            <input type="radio" id="546E7A" name="color"  v-model="form.color" value="#546E7A">
                                                            <label for="546E7A" style="background-color: #546E7A!important;"></label>

                                                            <input type="radio" id="1DE9B6" name="color"  v-model="form.color" value="#1DE9B6">
                                                            <label for="1DE9B6" style="background-color: #1DE9B6!important;"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button  type="submit" class="btn btn-primary" v-if="!editmode">Save</button>
                                                    <button  type="submit" class="btn btn-primary" v-if="editmode">Update</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div  style="width: 200px;text-align: center;margin-bottom: 20px" class="float-left" v-for="slider in sliders" :key="slider.id">
                            <a :href="'/folderImage/'+ slider.id"  >
                                <i class="fas fa-folder shadoww" style="font-size: 100px" :style="' color:' + slider.color "></i>
                                <br>
                                <p style="font-size: 16px" :style="' color:' + slider.color ">{{slider.name}}</p>
                            </a>

                            <div class="dropdown dropleft settings" style=" margin-top: -76px; margin-left: -2; margin-left: -80px;">
                                <a class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog " style="color : white ; font-size: 20px" ></i>                                 </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" :href="'/folderImage/'+ slider.id" target="_blank">
                                        <i class="far fa-folder-open"></i> Open in new page
                                    </a>
                                    <a class="dropdown-item" @click="editModal(slider) ; editmode = true " href="#">

                                        <i class="far fa-edit"></i> Edit
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"  @click="deleteFolder(slider.id)" style="color:red" href="#">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        created() {
            this.loadSliders();
            // setInterval(() => this.loadSliders(), 1500);
        },
        data() {
            return {
                editmode: false,
                sliders: {},
                settings : false,
                form: new Form({
                    id: "",
                    name: "",
                    color: ""
                })
            };
        },
        methods: {
            newModal() {
                this.editmode = false;
                this.form.reset();
                $("#exampleModalLong").modal("show");
            },
            editModal(folder) {
                this.editmode = true;
                $("#exampleModalLong").modal("show");
                this.form.fill(folder);
            },
            upl() {
                this.form.post("/createFolder")
                    .then((data) => {
                        $("#exampleModalLong").modal("hide");
                        this.loadSliders();
                    })
                    .catch(() =>
                    {
                        $("#exampleModalLong").modal("hide")
                    });
            },

            edit(id) {
                this.form.put("/updateFolder/" + this.form.id)
                    .then((data) => {
                        $("#exampleModalLong").modal("hide");
                        this.loadSliders();
                    })
                    .catch(() =>
                    {
                        $("#exampleModalLong").modal("hide")
                    });
            },
            loadSliders() {
                axios.get("/listFoldervue").then(({ data }) => (this.sliders = data));
            },
            deleteFolder(id){
                this.form.delete("/deleteFolder/"+ id)
                    .then((data) => {
                        this.loadSliders();
                    })
                    .catch(() =>
                    {
                    });
            }

        }
    };
</script>
<style>
    .radio-toolbar {
        margin: 10px;
    }

    .radio-toolbar input[type="radio"] {
        opacity: 0;
        position: fixed;
        width: 0;
    }

    .radio-toolbar label {
        display: inline-block;
        padding: 20px 20px;
        font-family: sans-serif, Arial;
        border-radius: 100%;
        opacity: 0.6;
        margin-right: 5px;
    }

    .radio-toolbar label:hover {
        background-color: #dfd;
    }


    .radio-toolbar input[type="radio"]:checked + label {
        opacity: 1;

    }

    .shadoww {
        filter: drop-shadow( 3px 3px 2px rgba(0, 0, 0, .7));
        /* Similar syntax to box-shadow */
    }
    .shadoww:hover {
        filter: drop-shadow( 3px 3px 2px rgba(0, 0, 0, .0));
        /* Similar syntax to box-shadow */
    }
    .dropleft .dropdown-toggle::before{
        display: none !important;
    }

    .settings{
        opacity: 0;
    }
    .settings:hover{
        opacity: 1;
    }

</style>
