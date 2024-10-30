<div class="postbox">
    <h3 class="hndle"><span><?php _e('Easy Digital Downloads','haet_mail'); ?></span></h3>
    <div style="" class="inside">
        <table class="form-table">
            <tbody>

                <tr>
                    <th scope="row">
                        <label for="haet_mail_plugins_easy-digital-downloads_content_font"><?php _e('Item Font','haet_mail'); ?></label>
                    </th>
                    <td>
                        <select  id="haet_mail_plugins_easy-digital-downloads_content_font" name="haet_mail_plugins[easy-digital-downloads][contentfont]">
                            <?php foreach ($fonts as $font => $display_name) :?>
                                <option value="<?php echo $font; ?>" <?php echo ($plugin_options['easy-digital-downloads']['contentfont']==$font?'selected':''); ?>><?php echo $display_name; ?></option>     
                            <?php endforeach; ?>
                        </select>

                        <select name="haet_mail_plugins[easy-digital-downloads][content_align]">
                            <option value="left" <?php echo ($plugin_options['easy-digital-downloads']['content_align']=="left"?"selected":""); ?>><?php _e('Left','haet_mail'); ?></option>
                            <option value="center" <?php echo ($plugin_options['easy-digital-downloads']['content_align']=="center"?"selected":""); ?>><?php _e('Center','haet_mail'); ?></option>
                            <option value="right" <?php echo ($plugin_options['easy-digital-downloads']['content_align']=="right"?"selected":""); ?>><?php _e('Right','haet_mail'); ?></option>
                        </select>
                        
                        <select  id="haet_mail_plugins_easy-digital-downloads_content_fontsize" name="haet_mail_plugins[easy-digital-downloads][contentfontsize]">
                            <?php for ($fontsize=12; $fontsize<=50; $fontsize++) :?>
                                <option value="<?php echo $fontsize; ?>" <?php echo ($plugin_options['easy-digital-downloads']['contentfontsize']==$fontsize?'selected':''); ?>><?php echo $fontsize; ?>px</option>       
                            <?php endfor; ?>
                        </select>

                        <input type="text" class="color" id="haet_mail_plugins_easy-digital-downloads_content_color" name="haet_mail_plugins[easy-digital-downloads][contentcolor]" value="<?php echo $plugin_options['easy-digital-downloads']['contentcolor']; ?>">

                        <input type="hidden" name="haet_mail_plugins[easy-digital-downloads][contentbold]" value="0">
                        <input type="checkbox" id="haet_mail_plugins_easy-digital-downloads_content_bold" name="haet_mail_plugins[easy-digital-downloads][contentbold]" value="1" <?php echo ($plugin_options['easy-digital-downloads']['contentbold']==1?'checked':''); ?>>
                        <label for="haet_mail_plugins_easy-digital-downloads_content_bold"><?php _e('Bold','haet_mail'); ?></label>
                        
                        &nbsp;&nbsp; 
                        
                        <input type="hidden" name="haet_mail_plugins[easy-digital-downloads][contentitalic]" value="0">
                        <input type="checkbox" id="haet_mail_plugins_easy-digital-downloads_content_italic" name="haet_mail_plugins[easy-digital-downloads][contentitalic]" value="1" <?php echo ($plugin_options['easy-digital-downloads']['contentitalic']==1?'checked':''); ?>>
                        <label for="haet_mail_plugins_easy-digital-downloads_content_italic"><?php _e('Italic','haet_mail'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="haet_mail_plugins_easy-digital-downloads_variation_font"><?php _e('Variation Font','haet_mail'); ?></label>
                    </th>
                    <td>
                        <select  id="haet_mail_plugins_easy-digital-downloads_variation_font" name="haet_mail_plugins[easy-digital-downloads][variationfont]">
                            <?php foreach ($fonts as $font => $display_name) :?>
                                <option value="<?php echo $font; ?>" <?php echo ($plugin_options['easy-digital-downloads']['variationfont']==$font?'selected':''); ?>><?php echo $display_name; ?></option>     
                            <?php endforeach; ?>
                        </select>
                        
                        <select  id="haet_mail_plugins_easy-digital-downloads_variation_fontsize" name="haet_mail_plugins[easy-digital-downloads][variationfontsize]">
                            <?php for ($fontsize=12; $fontsize<=50; $fontsize++) :?>
                                <option value="<?php echo $fontsize; ?>" <?php echo ($plugin_options['easy-digital-downloads']['variationfontsize']==$fontsize?'selected':''); ?>><?php echo $fontsize; ?>px</option>       
                            <?php endfor; ?>
                        </select>

                        <input type="text" class="color" id="haet_mail_plugins_easy-digital-downloads_variation_color" name="haet_mail_plugins[easy-digital-downloads][variationcolor]" value="<?php echo $plugin_options['easy-digital-downloads']['variationcolor']; ?>">

                        <input type="hidden" name="haet_mail_plugins[easy-digital-downloads][variationbold]" value="0">
                        <input type="checkbox" id="haet_mail_plugins_easy-digital-downloads_variation_bold" name="haet_mail_plugins[easy-digital-downloads][variationbold]" value="1" <?php echo ($plugin_options['easy-digital-downloads']['variationbold']==1?'checked':''); ?>>
                        <label for="haet_mail_plugins_easy-digital-downloads_variation_bold"><?php _e('Bold','haet_mail'); ?></label>
                        
                        &nbsp;&nbsp; 
                        
                        <input type="hidden" name="haet_mail_plugins[easy-digital-downloads][variationitalic]" value="0">
                        <input type="checkbox" id="haet_mail_plugins_easy-digital-downloads_variation_italic" name="haet_mail_plugins[easy-digital-downloads][variationitalic]" value="1" <?php echo ($plugin_options['easy-digital-downloads']['variationitalic']==1?'checked':''); ?>>
                        <label for="haet_mail_plugins_easy-digital-downloads_variation_italic"><?php _e('Italic','haet_mail'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="haet_mail_plugins_easy-digital-downloads_link_font"><?php _e('Link Font','haet_mail'); ?></label>
                    </th>
                    <td>
                        <select  id="haet_mail_plugins_easy-digital-downloads_link_font" name="haet_mail_plugins[easy-digital-downloads][linkfont]">
                            <?php foreach ($fonts as $font => $display_name) :?>
                                <option value="<?php echo $font; ?>" <?php echo ($plugin_options['easy-digital-downloads']['linkfont']==$font?'selected':''); ?>><?php echo $display_name; ?></option>     
                            <?php endforeach; ?>
                        </select>
                        
                        <select  id="haet_mail_plugins_easy-digital-downloads_link_fontsize" name="haet_mail_plugins[easy-digital-downloads][linkfontsize]">
                            <?php for ($fontsize=12; $fontsize<=50; $fontsize++) :?>
                                <option value="<?php echo $fontsize; ?>" <?php echo ($plugin_options['easy-digital-downloads']['linkfontsize']==$fontsize?'selected':''); ?>><?php echo $fontsize; ?>px</option>       
                            <?php endfor; ?>
                        </select>

                        <input type="text" class="color" id="haet_mail_plugins_easy-digital-downloads_link_color" name="haet_mail_plugins[easy-digital-downloads][linkcolor]" value="<?php echo $plugin_options['easy-digital-downloads']['linkcolor']; ?>">

                        <input type="hidden" name="haet_mail_plugins[easy-digital-downloads][linkbold]" value="0">
                        <input type="checkbox" id="haet_mail_plugins_easy-digital-downloads_link_bold" name="haet_mail_plugins[easy-digital-downloads][linkbold]" value="1" <?php echo ($plugin_options['easy-digital-downloads']['linkbold']==1?'checked':''); ?>>
                        <label for="haet_mail_plugins_easy-digital-downloads_link_bold"><?php _e('Bold','haet_mail'); ?></label>
                        
                        &nbsp;&nbsp; 
                        
                        <input type="hidden" name="haet_mail_plugins[easy-digital-downloads][linkitalic]" value="0">
                        <input type="checkbox" id="haet_mail_plugins_easy-digital-downloads_link_italic" name="haet_mail_plugins[easy-digital-downloads][linkitalic]" value="1" <?php echo ($plugin_options['easy-digital-downloads']['linkitalic']==1?'checked':''); ?>>
                        <label for="haet_mail_plugins_easy-digital-downloads_link_italic"><?php _e('Italic','haet_mail'); ?></label>

                        &nbsp;&nbsp; 
                        
                        <input type="hidden" name="haet_mail_plugins[easy-digital-downloads][linkunderline]" value="0">
                        <input type="checkbox" id="haet_mail_plugins_easy-digital-downloads_link_underline" name="haet_mail_plugins[easy-digital-downloads][linkunderline]" value="1" <?php echo ($plugin_options['easy-digital-downloads']['linkunderline']==1?'checked':''); ?>>
                        <label for="haet_mail_plugins_easy-digital-downloads_link_underline"><?php _e('Underline','haet_mail'); ?></label>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Products border','haet_mail'); ?></label></th>
                    <td>
                        <input type="text" class="color" id="haet_mail_plugins_easy-digital-downloads_products_bordercolor" name="haet_mail_plugins[easy-digital-downloads][products_bordercolor]" value="<?php echo ( isset($plugin_options['easy-digital-downloads']['products_bordercolor']) ? $plugin_options['easy-digital-downloads']['products_bordercolor'] : '#000'); ?>">

                        <input type="hidden" name="haet_mail_plugins[easy-digital-downloads][products_border_outer_v]" value="0">
                        <input type="checkbox" id="haet_mail_plugins_easy-digital-downloads_products_border_outer_v" name="haet_mail_plugins[easy-digital-downloads][products_border_outer_v]" value="1" <?php echo (isset($plugin_options['easy-digital-downloads']['products_border_outer_v']) && $plugin_options['easy-digital-downloads']['products_border_outer_v']==1 ?'checked':''); ?>>
                        <label for="haet_mail_plugins_easy-digital-downloads_products_border_outer_v" class="border-choice-label">
                            <table class="border-choice border-choice-outer-v"><tr><td></td><td></td></tr><tr><td></td><td></td></tr></table>
                        </label>
    
                        <input type="hidden" name="haet_mail_plugins[easy-digital-downloads][products_border_top]" value="0">
                        <input type="checkbox" id="haet_mail_plugins_easy-digital-downloads_products_border_top" name="haet_mail_plugins[easy-digital-downloads][products_border_top]" value="1" <?php echo (isset($plugin_options['easy-digital-downloads']['products_border_top']) && $plugin_options['easy-digital-downloads']['products_border_top']==1 ?'checked':''); ?>>
                        <label for="haet_mail_plugins_easy-digital-downloads_products_border_top" class="border-choice-label">
                            <table class="border-choice border-choice-top"><tr><td></td><td></td></tr><tr><td></td><td></td></tr></table>
                        </label>
                        
                        <input type="hidden" name="haet_mail_plugins[easy-digital-downloads][products_border_inner_h]" value="0">
                        <input type="checkbox" id="haet_mail_plugins_easy-digital-downloads_products_border_inner_h" name="haet_mail_plugins[easy-digital-downloads][products_border_inner_h]" value="1" <?php echo (isset($plugin_options['easy-digital-downloads']['products_border_inner_h']) && $plugin_options['easy-digital-downloads']['products_border_inner_h']==1 ?'checked':''); ?>>
                        <label for="haet_mail_plugins_easy-digital-downloads_products_border_inner_h" class="border-choice-label">
                            <table class="border-choice border-choice-inner-h"><tr><td></td><td></td></tr><tr><td></td><td></td></tr></table>
                        </label>

                        <input type="hidden" name="haet_mail_plugins[easy-digital-downloads][products_border_bottom]" value="0">
                        <input type="checkbox" id="haet_mail_plugins_easy-digital-downloads_products_border_bottom" name="haet_mail_plugins[easy-digital-downloads][products_border_bottom]" value="1" <?php echo (isset($plugin_options['easy-digital-downloads']['products_border_bottom']) && $plugin_options['easy-digital-downloads']['products_border_bottom']==1 || !isset($plugin_options['easy-digital-downloads'])?'checked':''); ?>>
                        <label for="haet_mail_plugins_easy-digital-downloads_products_border_bottom" class="border-choice-label">
                            <table class="border-choice border-choice-bottom"><tr><td></td><td></td></tr><tr><td></td><td></td></tr></table>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="haet_mailheaderpadding"><?php _e('Padding','haet_mail'); ?></label>
                    </th>
                    <td>
                        <?php _e('top','haet_mail'); ?>:
                        <input type="number" min="0" max="50" step="1" 
                            value="<?php echo $plugin_options['easy-digital-downloads']['item_paddingtop']; ?>" 
                            id="haet_mail_plugins_easy-digital-downloads_item_paddingtop" 
                            name="haet_mail_plugins[easy-digital-downloads][item_paddingtop]">
                        &nbsp;&nbsp; 
                        <?php _e('right','haet_mail'); ?>:
                        <input type="number" min="0" max="50" step="1" 
                            value="<?php echo $plugin_options['easy-digital-downloads']['item_paddingright']; ?>" 
                            id="haet_mail_plugins_easy-digital-downloads_item_paddingright" 
                            name="haet_mail_plugins[easy-digital-downloads][item_paddingright]">
                        &nbsp;&nbsp; 
                        <?php _e('bottom','haet_mail'); ?>:
                        <input type="number" min="0" max="50" step="1" 
                            value="<?php echo $plugin_options['easy-digital-downloads']['item_paddingbottom']; ?>" 
                            id="haet_mail_plugins_easy-digital-downloads_item_paddingbottom" 
                            name="haet_mail_plugins[easy-digital-downloads][item_paddingbottom]">
                        &nbsp;&nbsp; 
                        <?php _e('left','haet_mail'); ?>:
                        <input type="number" min="0" max="50" step="1" 
                            value="<?php echo $plugin_options['easy-digital-downloads']['item_paddingleft']; ?>" 
                            id="haet_mail_plugins_easy-digital-downloads_item_paddingleft" 
                            name="haet_mail_plugins[easy-digital-downloads][item_paddingleft]">
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
<div class="postbox">
    <div style="" class="inside">
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Preview EDD mail','haet_mail'); ?></label></th>
                    <td>
                        <select id="haet_mail_plugins_easy-digital-downloads_preview_order" name="haet_mail_plugins[easy-digital-downloads][preview_order]" >
                            <?php foreach ($order_ids as $order_id) :?>
                                <option value="<?php echo $order_id; ?>" <?php echo ($plugin_options['easy-digital-downloads']['preview_order']==$order_id?'selected':''); ?>><?php echo __('Order #','haet_mail').$order_id; ?></option>       
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label><?php _e('Send test mails','haet_mail'); ?></label></th>
                    <td>
                        <?php _e('Go to the EDD email settings to send a test mail and see the results in your mail client.','haet_mail'); ?>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
<?php 

?>