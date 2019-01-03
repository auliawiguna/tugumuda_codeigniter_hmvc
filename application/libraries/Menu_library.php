<?php
if (!defined("BASEPATH")) exit("No direct script access allowed");
class Menu_library  {
    private $ci;
    function __construct() {
		$this->ci =& get_instance();
        
    }
    //protected $open_menu ="<ul class=\"nav nav-sidebar\">";
    //protected $open_submenu ="<ul class=\"dropdown-menu first-menu\">";

    protected $open_menu ="<ul class='sidebar-menu'>";
    protected $open_submenu = '<ul class="treeview-menu">';
    
    public function createMenu($set_active = null){
        $str_menu = $this->open_menu;
        $contexts = $this->ci->db->where('is_nav_bar', 1)->where('flag', 1)->order_by('order')->get('contexts')->result();
        foreach($contexts as &$context ){
            $contextName = strtolower(str_replace(" ", "", $context->name));
            if ($this->ci->permissions_library->hasPermission('context-'.$contextName)){
                $route = uri_string();
                //$active=(strpos($route, $contextName)!==false)?"open":"";
                if ($context->path !='') {
                    if (strtolower($context->name) == 'dashboard'){
                        $str_menu.="<li>";
                        $str_menu.="<a href='".url('')."/dashboard'><i class='fa fa-dashboard'></i><span>".$context->name."</span></a>";
                        $str_menu.="</li>";                    
                    }
                    else{
                        $str_menu.="<li class='treeview'>";
                        $str_menu.="<i class='fa ".$context->icons."'></i><span>".$context->name."</span><i class='fa fa-angle-left pull-right'></i>";
                        $str_menu.="</li>";                    
                    }
                }else{
                    $str_menu.="<li class='treeview'>";
                    $str_menu.="<a href='#'><i class='fa ".$context->icons."'></i><span>".$context->name."</span><i class='fa fa-angle-left pull-right'></i></a>";
                    $str_menu.=$this->createSubMenu($context->name, $context->id, $set_active);
                    $str_menu.="</li>";
                }
            }            
        }
        $str_menu.="</ul>";
        return $str_menu;        
    }
    

    private function createSubMenu($context, $context_id, $set_active){
        $str_submenu = $this->open_submenu;
        $modules = $this->ci->db
        ->join('contexts','contexts.id = modules.id_context')
        ->select('modules.*')
        ->where('modules.id_parent', '0')
        ->where('modules.flag', 1)
        ->where('modules.id_context', $context_id)
        ->order_by('modules.order')        
        ->get('modules')->result();

        foreach($modules as &$module ){
            $module_name = str_replace(" ", "", $module->name);
            if ($this->ci->permissions_library->hasPermission('mod-'.strtolower($module_name).'-index')){

                if($module->icons == ''){
                    $icon = 'fa-dot-circle-o';
                }else{
                    $icon = $module->icons;
                }

                $class_active = '';
                if($module->path == $set_active) {
                    $class_active = 'active';
                }

                $str_submenu.="<li class='".$class_active."'>
                    <a id='menu-akhir' href='".url($module->path)."' data-path='".url('beranda?tab=').urlencode($module->path)."'>
                        <i class='fa ".$icon."'></i>".$module->name."
                    </a>
                </li>";
            }
        }
        $str_submenu.="</ul>";
        return $str_submenu;
    }

	private function createSubSubMenu($parent_id){
		$str_subsubmenu="<ul class=\"dropdown-menu\">";
        $str_subsubmenu .="<li role=\"presentation\" class=\"dropdown-header\">Sub Menu</li>";
		$modules = ModulesModel::where('id_parent', $parent_id)
		->where('flag', 1)
		->orderBy('order')->get();
		foreach($modules as $module ){
			$module_name = str_replace(" ", "", $module->name);
			if (\PermissionsLibrary::hasPermission('mod-'.strtolower($module_name).'-index')){
				$have_child = ModulesModel::where('id_parent',$module->id)->count();
				if ($have_child > 0){
					$str_subsubmenu.="<li  class=\"dropdown-submenu\"><a href=\"". $module->path ."\">";
					$str_subsubmenu.="<span class=\"glyphicon ". $module->icons ."\"></span> ". $module->name  ." </a>";
					
					$str_subsubmenu.=$this->createSubSubMenu($module->id);
				}else{
					$str_subsubmenu.="<li><a href=\"". $module->path ."\" class=\"".\Config::get('claravel::ajax')."\">";
					$str_subsubmenu.="<span class=\"glyphicon ". $module->icons ."\"></span> ". $module->name  ." </a>";
				}
				$str_subsubmenu.="</li>";
			}
		} 
        $str_subsubmenu.="</ul>";
		return $str_subsubmenu;							  
	}
}

