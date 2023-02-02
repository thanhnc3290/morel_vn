<!-- Giỏ Hàng -->
<form class="variations_form cart" action="#" method="post" enctype='multipart/form-data' data-product_id="2240"><table class="variations" cellspacing="0">
        <tbody>
            <tr>
                <td class="label"><label for="size-and-configuration">Kích thước và cấu hình</label></td>
                <td class="value"> 
                    <select
                        onchange="select_product_option()"
                        id="size-and-configuration" 
                        class="wc-default-select" 
                        name="attribute_size-and-configuration" 
                        data-attribute_name="attribute_size-and-configuration"
                        data-show_option_none="yes">
                        <option value="none">Lựa Chọn</option>
                        <?php if($info->option_name_1 !== ''): ?><option value="option_name_1"><?php echo $info->option_name_1 ?></option><?php endif; ?>
                        <?php if($info->option_name_2 !== ''): ?><option value="option_name_2"><?php echo $info->option_name_2 ?></option><?php endif; ?>
                        <?php if($info->option_name_3 !== ''): ?><option value="option_name_3"><?php echo $info->option_name_3 ?></option><?php endif; ?>
                        <?php if($info->option_name_4 !== ''): ?><option value="option_name_4"><?php echo $info->option_name_4 ?></option><?php endif; ?>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="single_variation_wrap">
        <div class="price-range-wrap"> 
            <span id="option_price_list" class="price"> 
                <span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_1 * $site_info->currency_vnd); ?> VND</bdi></span> 
                <?php if($info->option_price_4 > '0'): ?>
                &ndash;
                <span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_4 * $site_info->currency_vnd); ?> VND</bdi></span> 
                <?php else: ?>
                    <?php if($info->option_price_3 > '0'): ?>
                &ndash;
                <span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_3 * $site_info->currency_vnd); ?> VND</bdi></span> 
                    <?php else: ?>
                        <?php if($info->option_price_2 > '0'): ?>
                &ndash;
                <span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_2 * $site_info->currency_vnd); ?> VND</bdi></span> 
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </span>
        </div>
        <div class="woocommerce-variation single_variation"></div>
        <div class="woocommerce-variation-add-to-cart variations_button">
            <div class="buttons-wrap">
                <div class="quantity"> 
                    <input class="btn-qty minus" type="button" value="-" />
                    <input type="number" step="1" min="1" name="quantity" value="1" title="Qty"  class="input-text qty text" inputmode="numeric" /> 
                    <input class="btn-qty plus" type="button" value="+">
                </div> 
                <button type="submit" class="single_add_to_cart_button button alt" style="font-family:Roboto !important;">Đặt Mua</button>
                <a href="#" class="entry-link find-a-dealer-link"> 
                    <span class="btn-text" style="font-family:Roboto !important;"> Tìm Đại Lý</span> 
                </a>
            </div> 
            <input type="hidden" name="add-to-cart" value="2240" /> 
            <input type="hidden" name="product_id" value="2240" /> 
            <input type="hidden" name="variation_id" class="variation_id" value="0" />
        </div>
    </div>
</form>
<!-- End Giỏ Hàng-->

<script>
    //function tạo link đặt hàng
    function select_product_option() {
        var optionSelected = document.getElementById('size-and-configuration').value;
        if(optionSelected == 'none'){
            document.getElementById('option_price_list').innerHTML = `
                <span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_1 * $site_info->currency_vnd); ?> VND</bdi></span> 
                <?php if($info->option_price_4 > '0'): ?>
                &ndash;
                <span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_4 * $site_info->currency_vnd); ?> VND</bdi></span> 
                <?php else: ?>
                    <?php if($info->option_price_3 > '0'): ?>
                &ndash;
                <span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_3 * $site_info->currency_vnd); ?> VND</bdi></span> 
                    <?php else: ?>
                        <?php if($info->option_price_2 > '0'): ?>
                &ndash;
                <span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_2 * $site_info->currency_vnd); ?> VND</bdi></span> 
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            `;
        }
        if(optionSelected == 'option_name_1'){
            document.getElementById('option_price_list').innerHTML = `<span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_1 * $site_info->currency_vnd); ?> VND</bdi></span>`;
        }
        if(optionSelected == 'option_name_2'){
            document.getElementById('option_price_list').innerHTML = `<span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_2 * $site_info->currency_vnd); ?> VND</bdi></span>`;
        }
        if(optionSelected == 'option_name_3'){
            document.getElementById('option_price_list').innerHTML = `<span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_3 * $site_info->currency_vnd); ?> VND</bdi></span>`;
        }
        if(optionSelected == 'option_name_4'){
            document.getElementById('option_price_list').innerHTML = `<span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($info->option_price_4 * $site_info->currency_vnd); ?> VND</bdi></span>`;
        }
    };
</script>