<?php
require(dirname(__FILE__, 5) . '/wp-load.php');
global $wpdb;
$setting_array = $wpdb->get_row("SELECT * FROM woonectio_popup_settings WHERE id = 0");
?>

<style>
    .woonectio_popup {
        max-width: 300px;
        width: 100%;
        height: <?php switch($setting_array->size){
            case 'standart':
                echo "100px";
                break;
                case 'medium':
                    echo "200px";
                    break;
                    case 'big':
                        echo "300px";

        }?>;

        position: fixed;
        top: calc(90% - <?php switch($setting_array->size){
            case 'standart':
                echo "50px";
                break;
                case 'medium':
                    echo "150px";
                    break;
                    case 'big':
                        echo "250px";

        }?>);
        left: <?php echo $setting_array->position === 'left' ? "5%" : "80%"?>;
        z-index: 99999;
        box-shadow: 0 0 10px -2px rgb(0 0 0 / 30%);
        padding: 0.5% 5%;
        border-radius: 5px;
        text-decoration: none !important;
        cursor: pointer;

        display: flex;
        align-items: <?php echo $setting_array->size === 'standart' ? 'center' : 'start'?>;
        justify-content: center;

        background-color: <?php echo $setting_array->background_color?>;
    }

    .woonectio_popup > .popup_text > b {
        color: <?php echo $setting_array->strong_tags_color?>;
    }

    .popup_image {
        min-width: 84px;
        min-height: 84px;
        background: darkgrey;
        border-radius: 10px;
        position: relative;
    }

    .popup_image > .star {
        font-size: 30px;
        position: absolute;
        top: 38px;
        left: 54px;
    }

    .popup_text {
        min-width: 178px;
        min-height: 84px;
        margin-left: 10px;
        font-size: <?php echo $setting_array->font_size_desktop."px"?>;
        color: <?php echo $setting_array->text_color?>;
    }

    .popup_close {
        position: absolute;
        overflow: hidden;
        height: 20px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        top: 5px;
        left: 92.5%;
        background: <?php echo $setting_array->close_button_background_color?>;
        border-radius: 50%;
        color: <?php echo $setting_array->close_button_color?>;
        font-size: 16px;
    }

    @media (max-width: 850px) {
        .popup_text {
            font-size: <?php echo $setting_array->font_size_desktop."px"?>;
        }
    }
</style>

<!--STYLE FOR SIDECARD-->
<style>
    #sidecard_apnel{
        position: fixed;
        width: 100%;
        background-color: white;
        bottom: calc(100% - 60px);
        z-index: 999999999999;
        height: 60px;
        display: flex;
        flex-wrap: wrap;
        padding: 4px;
        flex-direction: row;
        justify-content: center;
        align-content: center;
        box-shadow: 0 0 10px -2px rgb(0 0 0 / 30%);
    }

    #sidecard_apnel > .wrapper{
        height: 60px;
        max-width: 900px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    #sidecard_apnel > .wrapper > .wrapper-image{
        display: inline-flex;
        flex-direction: row;
    }

    #sidecard_apnel > .wrapper > .wrapper-image > .img{
        width: 55px;
        height: 55px;
        background-color: darkgrey;
        border-radius: 10px;
        margin-right: 15px;
    }

    #sidecard_apnel > .wrapper > .wrapper-count > .button{
        margin-left: 15px;
        background-color: black;
        box-shadow: 0 0 10px -2px rgb(0 0 0 / 30%);
        padding: 3px 5px;
        color: white;
        border-radius: 10px;
    }
</style>

<?php
global $product;
if(!empty($product)){
echo '<div id="sidecard_apnel">
    <div class="wrapper">
        <div class="wrapper-image">
            <div class="img">'.wc_get_product($product->get_id())->get_image().'</div>
            '.$product->name.'<br>'.$product->price.'
        </div>
        <form class="wrapper-count" id="sideform">
            <input type="number" id="points" name="points">
            <input type="hidden" id="cardid" value="'.$product->get_id().'">
            <button type="submit" class="button">add to cart</button>
        </form>
    </div>
</div>';

    }
?>
