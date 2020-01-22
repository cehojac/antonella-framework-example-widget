<?php
namespace VWXYZ;
      
class URLWidget extends \WP_Widget
{
    /**
     * Please complete the public variables
    */
    public $name_widget='Mostrar una URL con Antonella  '; // <--complete this

    public $options=
    [
        'classname'=>'form', // <-- complete this
        'description'=>'Vamos a agregar un ejemplo para la clase de Antonella Framework' // <-- complete this
    ];

    public $form_values=
    [
        //Example: 
        'title'=>'the best plugin', 'url'=>'https://antonellaframework.com'
    ];
   
    
    public function __construct()
    {
        $this->WP_Widget('URLWidget', $this->name_widget, $this->options);
    }

    function form($instance) {
        // Build the Admin's Widget form
        $instance = wp_parse_args((array)$instance, $this->form_values);
        $html="";
        foreach ($instance as $key=>$inst)
        {
            $html.="<p>$key<input class='widefat' type='text' name='{$this->get_field_name($key)}' value='".esc_attr($inst)."'/></p>";
        }
        echo $html;
    }
    function update($new_instance, $old_instance) {
        // Save the Widget Options
        $instances = $old_instance;
        foreach($new_instance as $key => $value)
        {
            $instances[$key]= sanitize_text_field($new_instance[$key]);
        }
        return $instances;
    }
    function widget($args, $instance) {
        //Build the code for show the widget in plubic zone.
        extract($args);
        $html=" {$instance['title']} {$instance['url']} ";
        // you can edit this function for make the html//
        //
        ////////////////////////////////////////////////
        echo $html;
    }

}