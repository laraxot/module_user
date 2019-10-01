<?php
namespace Modules\User\Models\Panels;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

//--- Services --
use Modules\Xot\Services\StubService;
use Modules\Xot\Services\RouteService;
use Modules\Theme\Services\ThemeService;


use Modules\Xot\Models\Panels\XotBasePanel;

class UserPanel extends XotBasePanel {
	/**
	 * The model the resource corresponds to.
	 *
	 * @var string
	 */
	public static $model = 'Modules\User\Models\User';

	/**
	 * The single value that should be used to represent the resource when being displayed.
	 *
	 * @var string
	 */
	public static $title = "title"; 

	/**
	 * The columns that should be searched.
	 *
	 * @var array
	 */
	public static $search = [];
	/**
	* The relationships that should be eager loaded on index queries.
	*
	* @var array
	*/
	public static function with(){
	  return [];
	}

	public function search(){
		return [];
	}

	/**
	 * on select the option id
	 *
	 */

	public function optionId($row){
		return $row->area_id;
	}

	/**
	 * on select the option label 
	 *
	 */

	public function optionLabel($row){
		return $row->area_define_name;
	}

	/**
	 * Get the fields displayed by the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array

		'col_bs_size' => 6,
		'sortable' => 1,
		'rules' => 'required',
		'rules_messages' => ['it'=>['required'=>'Nome Obbligatorio']],
		'value'=>'..',

	 */
	public function indexNav(){
		return null;
	}

	/**
	 * Build an "index" query for the given resource.
	 *
	 * @param  Request  $request
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */

	public static function indexQuery(Request $request, $query){
		//return $query->where('auth_user_id', $request->user()->auth_user_id);
		return $query; 
	}

	/**
	 * Build a "relatable" query for the given resource.
	 *
	 * This query determines which instances of the model may be attached to other resources.
	 *
	 * @param  Request  $request
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public static function relatableQuery(Request $request, $query){
		//return $query->where('auth_user_id', $request->user()->auth_user_id);
		 //return $query->where('user_id', $request->user()->id);
	}



	public static function fields(){
		return array (
  0 => 
  (object)(array(
     'type' => 'String',
     'name' => 'name',
     'rules' => 'required',
     'comment' => NULL,
  )),
  1 => 
  (object)(array(
     'type' => 'String',
     'name' => 'email',
     'rules' => 'required',
     'comment' => NULL,
  )),
  2 => 
  (object)(array(
     'type' => 'String',
     'name' => 'password',
     'rules' => 'required',
     'comment' => NULL,
  )),
);
	}
	 
	/**
	 * Get the tabs available 
	 *
	 * @return array  
	 */
	public function tabs(){
		$tabs_name = [];
		return $tabs_name;
	}
	/**
	 * Get the cards available for the request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function cards(Request $request){
		return [];
	}

	/**
	 * Get the filters available for the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function filters(Request $request=null){
		return [];
	}

	/**
	 * Get the lenses available for the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function lenses(Request $request){
		return [];
	}

	/**
	 * Get the actions available for the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function actions(Request $request=null){
		return [];
	}

	public function name(){
		return $this->row->name;
	}

	public function avatar($size = 100) {
        $email = \md5(\mb_strtolower(\trim($this->row->email)));
        $default = \urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }

	public function areas(){
		$areas=collect(\Module::all())->map(function($item){
			$src = \mb_strtolower($item->name.'::img/icon.png');
        	$src = ThemeService::asset($src);

			return (object)[
				'area_define_name'=>$item->name,
				'active'=>false,
				'url'=>url('admin/'.\mb_strtolower($item->name)),
				'icon_src'=>$src,

			];
		})->all();

		return $areas;
	}

	public function isSuperAdmin(){
		return true;
	}

}
