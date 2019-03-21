
<style>
    
    .margin-category{
        border-top: 4px solid #faa819;
    }

    .image-categories{
        width: 100%;
        height: 100%;
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

</style>
<div class="row margin-category">
    <div class="margin-title">CATEGORIES</div>

    <div id="outer_wrapper">
        <div id="inner_wrapper">
            <?php foreach($records as $index => $record): ?>

                <div class="box">

                    <a href="<?php echo base_url('cring_category_item/detail_category/'.$record->kategori_id);?>">
                        <img src="<?php echo $record->kategori_image;?>" class="image-categories"/>
                        <div class="overlay">
                            <div class="text-overlay"><?php echo $record->kategori_name ?></div>
                        </div>
                    </a>
                
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

