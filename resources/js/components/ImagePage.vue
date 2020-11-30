<template>
    <div class="col-12">
        <div class>
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title"><span style="color: red">Folder name</span></h4>
                        </div>
                        <div class="ml-auto">
                            <div class="dl">
                                <button type="button" class="btn btn-primary" @click="newModall()" style="border:0"><i class="fas fa-folder-plus" style="font-size:23px;padding: 0 10px"></i></button>
                                <button type="button" class="btn btn-primary" @click="newModal()" style="border:0"><i class="far fa-images" style="font-size:23px;padding: 0 10px"></i></button>

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
                                                <h5 class="modal-title" id="exampleModalLongTitle" >
                                                    New image
                                                    <br />
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form
                                                @submit.prevent="upll()"
                                                enctype="multipart/form-data"
                                            >
                                                <div class="modal-body">
                                                    <div class="custom-file">
                                                        <input
                                                            type="file"
                                                            name="path"
                                                            class="custom-file-input"
                                                            id="customFileLangHTML"
                                                            @change="onInputChange"
                                                            multiple
                                                        />
                                                        <label class="custom-file-label" for="customFileLangHTML"  data-browse="image file">Choose file</label>
                                                    </div>
                                                    <input type="hidden" name="_token" :value="csrf" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button  type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="modal fade"
                                    id="exampleModalLongg"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="exampleModalLongTitle"
                                    aria-hidden="true"
                                >
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"  >
                                                    New folder
                                                    <br />
                                                </h5>
                                                <!-- <h5 class="modal-title"  v-if="editmode">
                                                    Update folder
                                                    <br />
                                                </h5> -->
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form
                                                @submit.prevent="upl()"
                                                enctype="multipart/form-data"
                                            >
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label >Folder name :</label>
                                                        <input
                                                            type="text"
                                                            name="path"
                                                            class="form-control"
                                                            v-model="form.path"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Folder Color :</label>
                                                        <div class="radio-toolbar" style="text-align:center">

                                                            <input type="radio" id="1E88E5" name="color"   value="#1E88E5" v-model="form.color">
                                                            <label for="1E88E5" style="background-color: #1E88E5!important;"></label>

                                                            <input type="radio" id="EF5350" name="color"   value="#EF5350" v-model="form.color">
                                                            <label for="EF5350" style="background-color: #EF5350!important;"></label>

                                                            <input type="radio" id="00897B" name="color"   value="#00897B" v-model="form.color">
                                                            <label for="00897B" style="background-color: #00897B!important;"></label>

                                                            <input type="radio" id="FFC107" name="color"   value="#FFC107" v-model="form.color">
                                                            <label for="FFC107" style="background-color: #FFC107!important;"></label>

                                                            <input type="radio" id="F4511E" name="color"   value="#F4511E" v-model="form.color">
                                                            <label for="F4511E" style="background-color: #F4511E!important;"></label>

                                                            <input type="radio" id="546E7A" name="color"   value="#546E7A" v-model="form.color">
                                                            <label for="546E7A" style="background-color: #546E7A!important;"></label>

                                                            <input type="radio" id="1DE9B6" name="color"   value="#1DE9B6" v-model="form.color">
                                                            <label for="1DE9B6" style="background-color: #1DE9B6!important;"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button  type="submit" class="btn btn-primary" >Save</button>
                                                    <!-- <button  type="submit" class="btn btn-primary" v-if="editmode">Update</button> -->

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
                <div>

                    <div class="container" id="gallery">
                        <div v-for="slider in sliders" :key="slider.id" class="img pics rounded all " :class="slider.category" style="text-align: center; " :style="{'background-image' : 'url(/images/' +slider.path +')'}">
                            <div v-if="slider.category ==0">
                                <div class="img all" style="background: rgba(0,0,0,0.3)" :class="slider.category">
                                    <div style="margin-top:90px;"  class="all" :class="slider.category">
                                        <a data-fancybox="gallery" :href="'/images/' + slider.path"  class="zoom"><i class="fas fa-search" style="opacity : 1; z-index:3"></i></a>
                                    </div>
                                    <div style="margin-top: 64px ; margin-right:5px; " class="float-right all" :class="slider.category">
                                        <a  @click="deleteImage(slider.id)"  class="zoom" >
                                            <i class="fas fa-trash align-bottom " style="opacity : 1; z-index:3"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div v-if="slider.category ==1">
                                <a>
                                    <i class="fas fa-folder shadoww" style="font-size: 100px" :style="' color:' + slider.color "></i>
                                    <br>
                                    <p style="font-size: 16px" :style="' color:' + slider.color ">{{slider.path}}</p>
                                </a>
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
                ip : '/image/',
                editmode: false,
                sliders: {},
                form: new Form({
                    id: "",
                    path: "",
                    color : "",
                    folder_id :"",
                    category : ""
                }),
                csrf: document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            };
        },
        methods: {
            newModal() {
                this.editmode = false;
                $("#exampleModalLong").modal("show");
                                this.form.category = 0;

            },
            newModall() {
                this.editmode = false;
                $("#exampleModalLongg").modal("show");
                this.form.category = 1;
            },
            upl() {
                this.form.post("/createImage")
                    .then((data) => {
                        $("#exampleModalLongg").modal("hide");
                        this.loadSliders();
                    })
                    .catch(() =>
                    {
                            $("#exampleModalLongg").modal("hide")
                    });
            },
             upll() {
                this.form.post("/createImagee")
                    .then((data) => {
                        $("#exampleModalLong").modal("hide");
                        this.loadSliders();
                    })
                    .catch(() =>
                    {
                            $("#exampleModalLong").modal("hide")
                    });
            },
            onInputChange(e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                reader.onloadend = file => {
                    this.form.path = reader.result;
                };
                reader.readAsDataURL(file);
            },
            loadSliders() {
                axios.get("/listImage").then(({ data }) => (this.sliders = data));
            },

            deleteImage(id){
                this.form.delete("/deleteImage/"+ id)
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
    .gallery {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        -webkit-column-width: 33%;
        -moz-column-width: 33%;
        column-width: 33%; }
    .gallery .pics {
        -webkit-transition: all 350ms ease;
        transition: all 350ms ease; }
    .gallery .animation {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1); }

    @media (max-width: 450px) {
        .gallery {
            -webkit-column-count: 1;
            -moz-column-count: 1;
            column-count: 1;
            -webkit-column-width: 100%;
            -moz-column-width: 100%;
            column-width: 100%;
        }
    }

    @media (max-width: 400px) {
        .btn.filter {
            padding-left: 1.1rem;
            padding-right: 1.1rem;
        }
    }

    .img {
        float:  left!important;
        width:  200px!important;
        height: 200px!important;
        background-size: cover!important;
        margin-right: 10px!important;
        margin-bottom: 10px!important;
    }
    .img2 {
        float:  left!important;
        width:  200px!important;
        height: 200px!important;
        background-size: cover!important;
        margin-right: 10px!important;
        background-color: Black !important;
        opacity: 0.2!important;
    }
    .zoom {
        font-size: 20px!important;
        color: #ffffff!important;
    }

    .zoom:hover
    {
        font-size:  20px!important;
        color : #3490dc!important;
    }
</style>
