<?php 
// Creating the widget 
class Plugin_Currency_Widget extends WP_Widget {
  
  	/**
     * Output object.
     *
     * @access  private
     */
    private $output;

    /**
     * Construct.
     */
	function __construct() {

		parent::__construct(
		  
		// Base ID of your widget
		'plugin_currency_widget', 
		
		// Widget name will appear in UI
		__('Currency Parser', 'plugin_currency'), 
		  
		// Widget description
		array( 
			'description' => __( 'Weekly currency parser', 'plugin_currency' ), ) 
		);
	}
	  
	// Creating widget front-end
	  
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		  
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
	  
		/**
		 * This is where you run the code and display the output
		 */

		function plugin_currency_table(){

			$cash_link= "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
			$cashless_link="https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11";

			$cash_get_content = file_get_contents($cash_link);
			$cashless_get_content = file_get_contents($cashless_link);

			$cash_item = json_decode( $cash_get_content, true);
			$cashless_item =json_decode( $cashless_get_content, true);
		?>
			<nav>
				<h3><?php echo date("d.m.Y"); ?></h3>
			  <div class="nav nav-tabs" id="nav-tab" role="tablist">
			    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo __('Cash Rate', 'plugin_currency'); ?></button>
			    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><?php  echo __('Cashless Rate', 'plugin_currency'); ?></button>		    
			  </div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
			  	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			  		<table>
						<thead>
							<tr>
								<th><?php echo __('Currency', 'plugin_currency'); ?></th>
								<th><?php echo __('Buy', 'plugin_currency'); ?></th>
								<th><?php echo __('Sale', 'plugin_currency'); ?></th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach($cash_item as $item){ ?>
								<tr>
									<th><?php echo $item['ccy']; ?></th>
									<td><?php echo $item['buy']; ?></td>
									<td><?php echo $item['sale']; ?></td>
								</tr>
							<?php	
							} ?>
						</tbody>
					</table>  
			  	</div>
			  	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
			  		<table>
						<thead>
							<tr>
								<th><?php echo __('Currency', 'plugin_currency'); ?></th>
								<th><?php echo __('Buy', 'plugin_currency'); ?></th>
								<th><?php echo __('Sale', 'plugin_currency'); ?></th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach($cashless_item as $key){ ?>
								<tr>
									<th><?php echo $key['ccy']; ?></th>
									<td><?php echo $key['buy']; ?></td>
									<td><?php echo $key['sale']; ?></td>
								</tr>
							<?php	
							} ?>
						</tbody>
					</table>  
			  	</div>
			  
			</div>
			<?php
			   
		}

		echo plugin_currency_table();

		echo $args['after_widget'];
	}
          
	// Widget Backend 
	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {

		$title = $instance[ 'title' ];

		} else {

		$title = __( 'New title', 'plugin_currency' );

			}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
      
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
 
 
// Class wpb_widget ends here
} 
 




