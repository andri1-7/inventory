
<style>
    
    .margin-hot-items{
        margin-top:40px;
        border-top: 4px solid #faa819;
    }

    .image-categories{
        width: 100%;
        height: 100%;
        background-image: black;
    }

    #carousel .slide {
        display: inline-block;
    }

    #outer_wrapper {  
        overflow: scroll;  
        width:100%;
    }
    #outer_wrapper #inner_wrapper {
        width:6000px; /* If you have more elements, increase the width accordingly */
    }

    #outer_wrapper #inner_wrapper div.box { /* Define the properties of inner block */
        position: relative;
        width: 3%;
        height:20%;
        float: left;
        margin: 0 14px 0 0;
    }

    .margin-title{
        margin-top: 10px;
        margin-bottom:10px;
        padding:5px;
        font-weight: bold;
    }

    .overlay{
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background-color: rgba(0,0,0,0.4);
        text-align: center;
    }

    .text-overlay{
        position: relative;
        top: 50%;
        transform: translateY(-50%); 
        font-size: 15px;
        color:white;
    }

</style>
<div class="row margin-hot-items">
    <div class="margin-title">Daftar Produk</div>
    <div id="outer_wrapper">
        <div id="inner_wrapper">
            <?php foreach($list_product as $record): ?>

                <div class="box">
                    <!-- <a href="<?php echo base_url('app/detail_item/'.$record->id);?>"> -->
                        <img src="<?php echo base_url('upload/product_image/'.$record->product_image); ?>" class="image-categories" alt="cring-cring product" /><br />
                        <div class="overlay">
                            <div class="text-overlay"><?php echo $record->product_name ?></div>
                        </div>
                    <!-- </a> -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
