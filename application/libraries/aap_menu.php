<?php
/**
 *
 * Dynmic_menu.php
 *
 */
class aap_menu {

    private $ci;                // for CodeIgniter Super Global Reference.

    private $id_menu            = 'id="menu"';
    private $class_menu         = 'id="flexmenu1" class="flexdropdownmenu"'; // CSS Menu Bar http://aapialang.co.id/icare//assets/menu/menu.css
//    private $class_menu         = 'class="menu"'; // CSS Menu Bar http://aapialang.co.id/icare//assets/menu/menu.css
    private $class_parent       = 'class="parent';
    private $class_last         = 'class="last"';
    
    private $sb_id_menu            = 'id="menu"';
    private $sb_class_menu         = 'class="menu"'; // CSS Menu Bar http://aapialang.co.id/icare//assets/menu/menu.css
    private $sb_class_parent       = 'class="parent';
    private $sb_class_last         = 'class="last"';

    // --------------------------------------------------------------------

    /**
     * PHP5        Constructor
     *
     */
    function __construct()
    {
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
    }

    function get_aap_Config($id="")
    {
        $query = $this->db->query('SELECT config_value FROM aap_config WHERE config_name= '.dbClean($id).'order by config_value DESC');	
        
         foreach ($query->result() as $row)
		return $row->config_value;
    }

   
    // --------------------------------------------------------------------

    /**
     * build_menu($table, $type)
     *
     * Description:
     *
     * builds the Dynaminc dropdown menu
     * $table allows for passing in a MySQL table name for different menu tables.
     * $type is for the type of menu to display ie; topmenu, mainmenu, sidebar menu
     * or a footer menu.
     *
     * @param    string    the MySQL database table name.
     * @param    string    the type of menu to display.
     * @return    string    $html_out using CodeIgniter achor tags.
     */
    function build_menu($grp = 0, $table = 'aap_menu', $type = '0')
    {
        $menu = array();
        $q =    'SELECT aap_menu.title, aap_menu.id, aap_menu.link_type, aap_menu.page_id, aap_menu.module_name, aap_menu.url, aap_menu.uri, aap_menu.dyn_group_id, aap_menu.position, aap_menu.target, aap_menu.parent_id, aap_menu.is_parent, aap_menu.show_menu, aap_menu.time_add, aap_menu.time_update, aap_menu.user_add, aap_menu.user_update
                        FROM aap_groups
                        INNER JOIN aap_group_menus ON aap_group_menus.aap_groups_id = aap_groups.id
                        INNER JOIN aap_menu ON aap_menu.id = aap_group_menus.aap_menu_id
                        WHERE aap_groups.id = '.$grp.'
                        ORDER BY `aap_menu`.`id` ASC ';
 
         $query = $this->ci->db->query($q);
        if ($query->num_rows() > 0)
        {
           
            $baris_row = 1;
            foreach ($query->result() as $row)
            {
                $menu[$baris_row]['baris']              = $baris_row;
                $menu[$baris_row]['id']                 = $row->id;
                $menu[$baris_row]['title']              = $row->title;
                $menu[$baris_row]['link']               = $row->link_type;
                $menu[$baris_row]['page']               = $row->page_id;
                $menu[$baris_row]['module']             = $row->module_name;
                $menu[$baris_row]['url']                = $row->url;
                $menu[$baris_row]['uri']                = $row->uri;
                $menu[$baris_row]['dyn_group']          = $row->dyn_group_id;
                $menu[$baris_row]['position']           = $row->position;
                $menu[$baris_row]['target']             = $row->target;
                $menu[$baris_row]['parent']             = $row->parent_id;
                $menu[$baris_row]['is_parent']          = $row->is_parent;
                $menu[$baris_row]['show']               = $row->show_menu;
                $baris_row = $baris_row + 1;
            }
        }

        $query->free_result();    // The $query result object will no longer be available

        // ----------------------------------------------------------------------
        
        // now we will build the dynamic menus.
         $html_out  = ""."\n";
//        $html_out  = "\t".'<div '.$this->id_menu.'>'."\n";

        /**
         * check $type for the type of menu to display.
         *
         * ( 0 = top menu ) ( 1 = horizontal ) ( 2 = vertical ) ( 3 = footer menu ).
         */
        switch ($type)
        {
            case 0:            // 0 = top menu
                $html_out .= "\t\t".'<ul '.$this->class_menu.'>'."\n";
                break;

            case 1:            // 1 = horizontal menu
                $html_out .= "\t\t".'<ul '.$this->class_menu.'>'."\n";
                break;

            case 2:            // 2 = sidebar menu
                break;

            case 3:            // 3 = footer menu
                break;

            default:        // default = horizontal menu
                $html_out .= "\t\t".'<ul '.$this->class_menu.'>'."\n";

                break;
        }
 
        // loop through the $menu array() and build the parent menus.
        for ($i = 1; $i <= count($menu); $i++)
        {
            if (is_array($menu[$i]))    // must be by construction but let's keep the errors home
            {
                if ($menu[$i]['show'] && $menu[$i]['parent'] == 0)     // are we allowed to see this menu?
                {
                    if ($menu[$i]['is_parent'] == TRUE)
                    {
                        // CodeIgniter's anchor(uri segments, text, attributes) tag.
                        $html_out .= "\t\t\t".'<li>'.anchor($menu[$i]['url'].'" '.$this->class_parent, '<span>'.$menu[$i]['title'].'</span>');
                    }
                    else
                    {
                        $html_out .= "\t\t\t\t".'<li>'.anchor($menu[$i]['url'], '<span>'.$menu[$i]['title'].'86654</span>');
                    }
                    // loop through and build all the child submenus.
                    $html_out .= $this->get_childs($menu, $menu[$i]['id']);
                    $html_out .= '</li>'."\n";
                }
            }
        }
        $html_out .= "\t\t\t".'<li><a href="'.base_url().'logout" class="parent"><span>Log-Out</span></a></li>'. "\n";
        $html_out .= "\t\t".'</ul>' . "\n";
//        $html_out .= "\t".'</div>' . "\n";
        return $html_out;
    }  
	    /**
     * get_childs($menu, $parent_id) - SEE Above Method.
     *
     * Description:
     *
     * Builds all child submenus using a recurse method call.
     *
     * @param    mixed    $menu    array()
     * @param    string    $parent_id    id of parent calling this method.
     * @return    mixed    $html_out if has subcats else FALSE
     */
    function get_childs($menu, $parent_id)
    {
        $has_subcats = FALSE;

        $html_out  = '';
//        $html_out .= "\n\t\t\t\t".'<div>'."\n";
        $html_out .= "\t\t\t\t\t".'<ul>'."\n";

        for ($i = 1; $i <= count($menu); $i++)
        {
            if ($menu[$i]['show'] && $menu[$i]['parent'] == $parent_id)    // are we allowed to see this menu?
            {
                $has_subcats = TRUE;

                if ($menu[$i]['is_parent'] == TRUE)
                {
                    $html_out .= "\t\t\t\t\t\t".'<li>'.anchor($menu[$i]['url'].'" '.$this->class_parent, '<span>'.$menu[$i]['title'].'</span>');
                }
                else
                {
                    $html_out .= "\t\t\t\t\t\t".'<li>'.anchor($menu[$i]['url'], '<span>'.$menu[$i]['title'].'</span>');
                }

                // Recurse call to get more child submenus.
                $html_out .= $this->get_childs($menu, $menu[$i]['id']);

                $html_out .= '</li>' . "\n";
            }
        }

        $html_out .= "\t\t\t\t\t".'</ul>' . "\n";
//         $html_out .= "\t\t\t\t".'</div>' . "\n";

        return ($has_subcats) ? $html_out : FALSE;
    }

     function build_sidebar($grp = 0)
    {
        $menu = array();
        $q =    'SELECT * 
            FROM aap_config 
            WHERE aap_config.config_name = "sidebar" AND
            aap_config.config_desc = "0"';
         $query = $this->ci->db->query($q);
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $menu['id']               = $row->id;
                $menu['value']          = $row->config_value;
            }
        }

        $query->free_result();
        $html_out  = $menu['value'];
        return $html_out;
    }  
	    /**
     * get_childs($menu, $parent_id) - SEE Above Method.
     *
     * Description:
     *
     * Builds all child submenus using a recurse method call.
     *
     * @param    mixed    $menu    array()
     * @param    string    $parent_id    id of parent calling this method.
     * @return    mixed    $html_out if has subcats else FALSE
     */
    function get_childs_sidebar($menu, $parent_id)
    {
        $has_subcats = FALSE;

        $html_out  = '';
//        $html_out .= "\n\t\t\t\t".'<div>'."\n";
        $html_out .= "\t\t\t\t\t".'<ul>'."\n";

        for ($i = 1; $i <= count($menu); $i++)
        {
            if ($menu[$i]['show'] && $menu[$i]['parent'] == $parent_id)    // are we allowed to see this menu?
            {
                $has_subcats = TRUE;

                if ($menu[$i]['is_parent'] == TRUE)
                {
                    $html_out .= "\t\t\t\t\t\t".'<li>'.anchor($menu[$i]['url'].'" '.$this->class_parent, '<span>'.$menu[$i]['title'].'</span>');
                }
                else
                {
                    $html_out .= "\t\t\t\t\t\t".'<li>'.anchor($menu[$i]['url'], '<span>'.$menu[$i]['title'].'</span>');
                }

                // Recurse call to get more child submenus.
                $html_out .= $this->get_childs($menu, $i);

                $html_out .= '</li>' . "\n";
            }
        }

        $html_out .= "\t\t\t\t\t".'</ul>' . "\n";
//         $html_out .= "\t\t\t\t".'</div>' . "\n";

        return ($has_subcats) ? $html_out : FALSE;
    }   

}

// ------------------------------------------------------------------------
// End of Dynamic_menu Library Class.

// ------------------------------------------------------------------------
/* End of file Dynamic_menu.php */
/* Location: ../application/libraries/Dynamic_menu.php */  