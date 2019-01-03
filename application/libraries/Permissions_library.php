<?php
class Permissions_library {
	
	
	/**
	 * IoC
	 * @var Illuminate\Foundation\Application
	 */
	protected $app;
	
	protected $moduleName="";
	
	protected $modulePath="";
	
    private $ci;
    function __construct() {
		$this->ci =& get_instance();

		//Jika user status login maka perbarui permission untuk user yang bersangkutan
		if($this->ci->tank_auth->is_logged_in()){
			$roles = $this->ci->db
			->join('permissions','permissions.id = role_permission.permission_id')
			->select('role_permission.*,permissions.name')
			->get('role_permission')->result();
			$arr_roles = [];
			foreach($roles as $obj_roles){
				$arr_roles[$obj_roles->permission_id] = $obj_roles->name;
			}
			$this->ci->session->set_userdata(array('roles'	=> $arr_roles));
		}

    }

	public function assignPermission($permission){
        $this->ci->db->insert('permissions',[
            'name' => $permission['name'],
            'description' => $permission['description'],
            'status' => 1
        ]);
		$permission_id = $this->ci->db->insert_id();
        $this->ci->db->insert('role_permission',[
            'role_id' => 1,
            'role_parent' => 0,
            'permission_id' => $permission_id,
        ]);
	}
	
	public function hasPermission($route=''){
		$role_id = $this->ci->session->userdata('role_id');
		if ($route ==''){
			$route = uri_string();
			if (strpos($route, '/') > 0){
				$pos = strpos($route, '/') + 1;
				$route = substr($route, $pos);
				if (strpos($route, 'edit')){
					$rpos = strrpos($route, '/');
					$route = substr($route, 0, $rpos);
				}
				$permission = "mod-".str_replace("/", "-", $route);
			}else{
				$permission = "context-".str_replace("/", "-", $route);
			}
		}else{
			$permission = $route;
		}
		
		$array_role = $this->ci->session->userdata('roles'); //(!empty($this->ci->session->userdata('roles')))?$_ENV['roles']:\Session::get('roles');
     	$result = array_filter($array_role, function($elem) use($permission) {
			if (stripos($elem, $permission) !== false) {
		        return true;
		    }
		    return false;
		  });

		if ($result){
			return true;	
		}else{
			return false;
		} 
		
	}
	
	public function canAdd(){ 
		$role_id = $this->ci->session->userdata('role_id');
		$route = uri_string();
		$pos = strpos($route, '/') + 1;
		$context = substr($route, 0, strpos($route, '/'));
		$route = substr($route, $pos);
		$permission = "mod-".str_replace(".", "-", $route)."-create";
		$check = $this->hasPermission($permission);
		if ($check > 0){
			return true;	
		}else{
			return false;
		} 
		
	}

	public function canEdit(){ 
		$role_id = $this->ci->session->userdata('role_id');
		$route = uri_string();
		$pos = strpos($route, '/') + 1;
		$context = substr($route, 0, strpos($route, '/'));
		$route = substr($route, $pos);
		$permission = "mod-".str_replace(".", "-", $route)."-edit";
		
		$check = $this->hasPermission($permission);

		if ($check > 0){
			return true;	
		}else{
			return false;
		} 
		
	}
	
	public function canDel(){
		$role_id = $this->ci->session->userdata('role_id');
		$route = uri_string();
		$pos = strpos($route, '/') + 1;
		$context = substr($route, 0, strpos($route, '/'));
		$route = substr($route, $pos);
		$permission = "mod-".str_replace(".", "-", $route)."-delete";
		
		$check = $this->hasPermission($permission);
		
		if ($check > 0){
			return true;
		}else{
			return false;
		} 
		
	}
	
}
