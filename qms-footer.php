<?php
/*******************************************************************************************************
 * Plugin Name: Qms Footer
 * Plugin URI: httpp://#
 * Description: Customize widget on footer create copyright, address and hwo create it 
 * Author: Fandy Fardian
 * Version: 3.8.0
 * Author URI: http://#/
 *
 ************************************************************************************************************/
class Qms_Footer extends WP_Widget {

    private $_sosmedLists = array(
            'fb'=>'https://facebook.com',
            'flickr'=>'http://flicker.com',
            'twitter'=>'https://twitter.com',
            'gplus' => 'https://plus.google.com',
            'rss' =>'#', );
	public function __construct() {
		$qms_opts = array('classname' => 'qms_footer', 'description' => __( "Customize widget on footer add copyright, address"));
			parent::__construct('qms-footer', $name = __('Qms Footer Widget'), $qms_opts);
			$this->alt_option_name = 'qms_widget';	
	}

	public function form($instance) {
        $sosmed = array(
            'fb'=>'https://facebook.com',
            'flickr'=>'http://flicker.com',
            'twitter'=>'https://twitter.com',
            'gplus' => 'https://plus.google.com',
            'rss' =>'#', );
        $this->_sosmedLists = $sosmed;
        $copyright      = isset($instance['copyright']) ? $instance['copyright'] :'';
        $href_trgt      = !empty($instance['href_trgt']) ? $instance['href_trgt'] :'';
        $href_cntnt     = !empty($instance['href_cntnt']) ? $instance['href_cntnt'] :'';
        $href_corp      = !empty($instance['href_corp']) ? $instance['href_corp'] :'';
        $corp           = !empty($instance['corp']) ? $instance['corp'] :'';
        $address        = !empty($instance['address']) ? $instance['address'] :'';
        $phone          = !empty($instance['phone']) ? $instance['phone'] :'';
        $fax            = !empty($instance['fax']) ? $instance['fax'] :'';
        $email          = !empty($instance['email']) ? $instance['email'] :'';
        
		?>
		<p><label><?php _e('Copyright');?>:</label>
			<span class="add-on">&copy;</span>
            	<input type="text" style="background-color: white;" class="flat display-copy" value="<?php echo $copyright; ?>" 
                id="<?php echo $this->get_field_id('copyright'); ?>" name="<?php echo $this->get_field_name('copyright'); ?>">
            	<br>
            	<em>What do you want to write after Copyright</em>	
        </p>
        <p><label><?php _e('Link Target');?>:</label>
			     	<input type="text" style="background-color: white;" class="flat display-copy" value="<?php echo $href_trgt; ?>"
                    id="<?php echo $this->get_field_id('href_trgt'); ?>" name="<?php echo $this->get_field_name('href_trgt'); ?>">
            	<br>
            	<em>Href address to describe developer or desaigner</em>	
        </p>
        <p><label><?php _e('Link Label');?>:</label>
			     	<input type="text" style="background-color: white;" class="flat display-copy" value='<?php echo $href_cntnt; ?>'
                    id="<?php echo $this->get_field_id('href_cntnt'); ?>" name="<?php echo $this->get_field_name('href_cntnt'); ?>">
            	<br>
            	<em>Label on Anchor element ex: your name or your Company </em>	
        </p>
        <p><label><?php _e('Link Corporate');?>:</label>
                    <input type="text" style="background-color: white;" class="flat display-copy" valur = "<?php echo $href_corp; ?>"
                    id="<?php echo $this->get_field_id('href_corp'); ?>" name="<?php echo $this->get_field_name('href_corp'); ?>">
                <br>
                <em>Href address to describe your Company</em>    
        </p>
        <p><label><?php _e('Company Name');?>:</label>
                    <input type="text" style="background-color: white;" class="flat display-copy" value = "<?php echo $corp; ?>" 
                    id="<?php echo $this->get_field_id('corp'); ?>" name="<?php echo $this->get_field_name('corp'); ?>">
                <br>
                <em>Label of your Company </em> 
        </p>
        <p><label><?php _e('Addrees');?>:</label>
                    <input type="text" style="background-color: white;" class="flat display-copy"  value="<?php echo $address; ?>"
                    id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>">
                <br>
                <em>Address of your Company </em> 
        </p>
        <p><label><?php _e('Phone');?>:</label>
                    <input type="text" style="background-color: white;" class="flat display-copy" value="<?php echo $phone; ?>" 
                    id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>">
                <br>
                <em>Phone of your Company </em> 
        </p>
        <p><label><?php _e('Fax');?>:</label>
                    <input type="text" style="background-color: white;" class="flat display-copy" value = "<?php echo $fax; ?>" 
                    id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>">
                <br>
                <em>Fax of your Company </em> 
        </p>
        <p><label><?php _e('Email');?>:</label>
                    <input type="text" style="background-color: white;" class="flat display-copy" value="<?php echo $email; ?>"
                    id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>">
                <br>
                <em>Email of your Company </em> 
        </p>
        <p><label><?php _e('Your Social Company');?>:</label>
                <ul>
                <?php

                foreach ($sosmed as $idx => $val) :?>
                <?php $checked= (isset($instance[$idx])) ? 'checked="checked"' : ''; ?>
                <?php $value = (isset($instance[$idx . '_user'])) ? $instance[$idx . '_user'] : ''; print_r($value); ?>
                    <li><div>
                        <input class="checkbox" type="checkbox" <?php echo $checked; ?> id="<?php echo $this->get_field_id( $idx ); ?>" 
                        name="<?php echo $this->get_field_name( $idx ); ?>"
                        style="background-color: white;" class="widefat qms-sidebar-checkbox"/><?php echo $idx; ?>
                    </div>
                    <div><span><?php __('User Name');?></span>
                    <span><input class="text" type="text" value="<?php echo $value; ?>"
                         id="<?php echo $this->get_field_id( $idx . '_user' ); ?>" 
                        name="<?php echo $this->get_field_name( $idx . '_user' ); ?>"
                        style="background-color: white;" class="widefat qms-sidebar-text"/></span>                    
                    </div>    
                    </li>
                   
                <?php
                endforeach;

                ?>
                </ul>
            <br/>
            <em>If you check the category, Categories your selected will be exclude on query.</em>
        </p>

        <?php
	}

    public function update( $new_instance, $old_instance) {

        $instance = $old_instace;
        $instance = $new_instance;
        
        return $instance;
    }

    public function widget( $args, $instance ) {
    
        ob_start();
        ?>
            <div class="container clearfix">
            <ul class="list-social pull-right">
                <?php foreach($this->_sosmedLists as $key => $val):?>
                    <?php if(isset($instance[$key])):?>
                        <li><a class="icon-<?php echo $key?>" href="<?php echo $val.'/'.$instance[$key . '_user'];?>"></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>    
            </ul>
            <div class="privacy pull-left">&copy; 2015 | Develop by 
			<?php if(!empty($instance['copyright'])) : ?>
				<a href="<?php echo $instance['href_trgt'];?>" target="_blank"><?php echo $instance['copyright'];?></a>
			<?php else:?>	
				<a href="http://fardian.id" target="_blank">Fandy Fardian</a>
			<?php endif; ?>			| Using 
			<?php if(!empty($instance['href_cntnt'])) : ?>
				<a href="<?php echo $instance['href_corp'];?>" target="_blank"><?php echo $instance['href_cntnt']; ?></a>
			<?php else : ?>
                <a href="http://twitter.github.com/bootstrap/" target="_blank">Bootstrap</a>
			<?php endif;?>		| <br>
                <?php if(!empty($instance['corp'])) :?>
                    <strong ><i class="icon-globe">&nbsp;</i>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo $instance['corp']; ?></a>
                    </strong>
                <?php endif;?>
                    <br>
            <?php if(isset($instance['address'])&&!empty($instance['address'])): ?>
                <adress>
                    <i class="icon-envlope">&nbsp;</i><?php echo $instance['address'];?><br>
                    <?php if(isset($instance['phone'])&&!empty($instance['phone'])) : ?>
                    <abbr title="Phone">P:</abbr> (+62) <?php echo $instance['phone']; ?>
                    <?php endif; ?>
                    <?php if(isset($instance['fax'])&&!empty($instance['fax'])) : ?>
                     <abbr title="Fax">F:</abbr> (+62) <?php echo $instance['phone']; ?><br>
                    <?php endif; ?>
                    <?php if(isset($instance['email'])&&!empty($instance['email'])) : ?>
                    <abbr title="Email">Email:</abbr><a href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a><br>
                    <?php endif; ?>
                </adress>
             <?php endif; ?>   
            </div>
          </div>
        <?php
        if ( ! $this->is_preview() ) {
            $cache[ $args['widget_id'] ] = ob_get_flush();
            wp_cache_set( 'Qms_Footer', $cache, 'widget' );
        } else {
            ob_end_flush();
        }
    }
}

add_action('init', 'qumis_widgets_init');
function qumis_widgets_init() {
    register_widget('Qms_Footer');

    if (!is_admin()) {
       $url = plugins_url('qms-footer');
       wp_enqueue_style('Qms_Footer', $url.'/kumis.css');
       
    }
        /**
     * Fires after all default WordPress widgets have been registered.
     *
     * @since 2.2.0
     */
    do_action( 'widgets_init' );
}