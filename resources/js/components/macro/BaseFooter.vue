
    
<template>
    <footer class="my-3 py-3">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="box_image">
                            <a href="http://home"></a>
                            <img src="https://loghi-famosi.com/wp-content/uploads/2020/07/Airbnb-Logo.png" alt="logo">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h6>
                            Sito regolarmente registrato presso Boolean.
                            Tutti i diritti riservati.
                            La responsabilità legale è di chi ci crede.
                        </h6>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <ul>
                        <li><a href="http://www.facebook.com"></a><img src="https://icons-for-free.com/iconfiles/png/512/facebook+high+quality+media+social+social+media+square+icon-1320192615308993674.png" alt="FB"></li>
                        <li><a href="http://www.twitter.com"></a><img src="https://upload.wikimedia.org/wikipedia/it/0/09/Twitter_bird_logo.png?20160903181542" alt="TW"></li>
                        <li><a href="http://www.youtube.com"></a><img src="https://cdn.icon-icons.com/icons2/2699/PNG/512/youtube_logo_icon_168737.png" alt="YT"></li>
                        <li><a href="http://www.pinterest.com"></a><img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Pinterest-logo.png" alt="PT"></li>
                        </ul>
                    </div>
                </div>    
            </div>
        </div>  
        <div class="footer_bottom py-3">
            <p>Fatto con passione da Tania, Emanuele, Ettore, Ivan e Marcello</p>
        </div>
    </footer>
</template>


<script>
export default {
    name: 'BaseFooter',
}
</script>

<style lang="scss" scoped>
    footer{
        text-align: center;
        color: #F7F7FF;
        background-color: #495867;
    }
    ul{
        display: flex;
        text-transform: uppercase;
        list-style: none;
        // column-gap: 2rem;
        li{
            // display: flex;
            padding: .250rem;
            align-items: center;
            justify-content: center;
            // gap: .625rem;
        }
    }
    .container{
        justify-content:space-between;
    }
    img{
        width: 100%;
    }
    img:hover {
        box-shadow: .250rem .250rem .250rem .250rem #788BFF;
    }
</style> 

